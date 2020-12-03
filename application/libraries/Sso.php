<?php

class Sso{

	public function __construct() {
		date_default_timezone_set('Asia/Jakarta');

		$this->app_token="sso_sistem_test";
		$this->base_sso="http://localhost:8080/accounts/";
		$this->jquery_src=base_url()."assets/vendors/bower_components/jquery/dist/jquery.min.js";

		$CI=get_instance();
		$data_sso=[
			'base_sso' => $this->base_sso
		];
		$CI->session->set_userdata($data_sso);
		if($CI->input->post('sso_user_token')!=null){
			$token=$CI->input->post('sso_user_token');
			$this->set_token($token);
			$output = [
				'status' => "success"
			];
			echo json_encode($output);
			exit;
		}
		$rsbt_sso_token=$CI->session->userdata('rsbt_sso_token');//sso_user_data
		if($rsbt_sso_token==null){
			$this->get_sso_token();
		}else{
			$this->set_sso_user_data($rsbt_sso_token);
		} 
	}

	function set_token($token){
		$data = [
			'rsbt_sso_token' => $token
		];
		$CI=get_instance();
		$CI->session->set_userdata($data);
		// $this->set_sso_user_data($token);
	}
	function set_sso_user_data($token){
		$headers = array(
			'app_token: '.$this->app_token .'',
			'X-timestamp: '.date('DMY His').'' ,
			'Content-Type: Application/JSON',          
			'Accept: Application/JSON'
		);
	    /**
	    Sending record to API SSO
	    */          
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $this->base_sso."api/getStaffByToken?sso_token=".$token);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $content = curl_exec($ch);
	    $err = curl_error($ch);
	    // print_r($err);    
	    // print_r($content);

        // close cURL resource, and free up system resources
	    curl_close($ch);
	    $content =json_decode($content);
	    $CI=get_instance();
	    if($content->status=="true"){
	    	$data_sso=[
	    		'sso_user_data' => $content->data
	    	];
	    	$CI->session->set_userdata($data_sso);
	    }else{
	    	$CI->session->sess_destroy();
	    	redirect($this->base_sso,"refresh"); 
	    }
	    // exit;
	}

	function get_sso_token(){
		?>
		<script src="<?=$this->jquery_src?>"></script>
		<script type="text/javascript">
			$.ajax({
				url: "<?= $this->base_sso.'api/get_token_login'?>",
				type: 'POST',
				dataType: 'json',
				data: {app_token: '<?= $this->app_token ?>'},
				error: function () {
					redirect_to_sso();
				},
				fail: function () {
					redirect_to_sso();
				},
				success: function (data) {
					if(data.status=="true"){
						set_sso_token(data.token);
					}else{
						redirect_to_sso();
					}
				}
			});
			function redirect_to_sso(){
				window.location.replace("<?=$this->base_sso?>");
			}
			function set_sso_token(token){
				$.ajax({
					url: "<?= base_url()?>",
					type: 'POST',
					dataType: 'json',
					data: {sso_user_token: token},
					success: function (data) {
						// console.log(data.status);
						// console.log("OK");
						location.reload(true);
					}
				});
			}
		</script>
		<?php
		exit;
	}
}

?>