<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default card-view">
									<div class="panel-heading">
										<div class="pull-left">
											<h6 class="panel-title txt-dark">JADWAL DINAS</h6>
										</div>
    <div class="row">
      
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
								<th>GANTI SHIFT</th> 
								<th>JADWAL DINAS</th> 
								<!-- <th>TANGGAL EXPIRED</th> -->
								<th>JAM MASUK</th> 
								<th>JAM PULANG</th> 
								<th>KETERANGAN</th>
                            </tr>
                        </thead>

                        <tbody style="color: black">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Datatables -->

  <!-- Modal -->

  <div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->


        <div class="modal fade " id="modal_tambahstok"  role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" style="display: none;">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <!--modal 1-->

                    <div class="modal-body">
                        <!-- Form body  -->
                        <form class="form-horizontal">
                            <div class="form-body mt-20">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="icon-user mr-10"></i>INFO
                                                        STOK</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="form-wrap">


                                                                <div class="form-body">

                                                                    <hr>
                                                                    <div class="row">

<div class="col-md-6">
    <div class="form-group ">
    <label class="control-label col-md-3">NAMA BARANG</label>
        <div class="col-md-9 has-success">
            <select class="form-control filled-input select2" onchange="tampilStok()" id="inLogistik" >
                    <option value="" >-</option>

                    <?php foreach ($obat as $row) { ?>
                        <option value="<?php echo $row["id_logistik"] . "|" . $row["stok"] . "|" . $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>

                     <?php } ?>

            </select> 

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--/span-->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label
                                                                                    class="control-label col-md-3">STOK
                                                                                    TERSEDIA</label>
                                                                                <div class="col-md-9 has-error">
                                                                                    <input type="text"
                                                                                        class="form-control "
                                                                                        placeholder="KONTAK SALES"
                                                                                        id="inTersedia" disabled=""
                                                                                        value="0">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /Row -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="control-label col-md-3">STOK
                                                                                    ASLI</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="number"
                                                                                        class="form-control "
                                                                                        placeholder="JUMLAH"
                                                                                        id="inStokAsli"
                                                                                        oninput="tampilSelisih()"
                                                                                        value="0">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label
                                                                                    class="control-label col-md-3">SELISIH</label>
                                                                                <div class="col-md-9 has-error">
                                                                                    <input type="text"
                                                                                        class="form-control "
                                                                                        placeholder="KONTAK SALES"
                                                                                        id="inSelisih" disabled=""
                                                                                        value="0">

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="date"
                                                                                        class="form-control txt-dark"
                                                                                        data-toggle="datepicker"
                                                                                        placeholder="JUMLAH"
                                                                                        autocomplete="off"
                                                                                        id="inTglExp">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                    </div>
                                                                    <!-- /Row -->
                                                                    <div class="form-actions mt-10">
                                                                        <button onclick="insertStok()"
                                                                            class="btn btn-success btn-anim  btn-sm"
                                                                            type="button"><i
                                                                                class="icon-rocket"></i><span
                                                                                class="btn-text">Tambah</span></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<!-- /Modal Edit Akun -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->


        <div class="modal fade" id="ModalDetailStok" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default card-view">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">DETAIL STOK OBAT</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="datablestok"
                                                            class="table table-hover display  pb-30">
                                                            <thead>
                                                                <tr>
                                                                    <th>NO</th>
                                                                    <th>NAMA OBAT</th>
                                                                    <th>TANGGAL EXPIRED</th>
                                                                    <th>STOK</th>
                                                                </tr>
                                                            </thead>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div align="right">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <!-- <button type="submit" class="btn btn-success btn-rounded mr-10">Submit</button> -->
                                                        <!-- <button type="button" class="btn btn-default btn-rounded">Cancel</button> -->
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="seprator-block"></div>
<!--end of coba-->
                       
                
 
<script type="text/javascript">


        function insertStok() {
	    
        idFaktur = $("#idStruk").val();
        a=$("#inLogistik").val();  
		splitDiag= a.split("|"); 
        idLogistik = splitDiag[0];
		stok = parseFloat($("#inTersedia").val());
		nama=splitDiag[2];
		asli=  parseFloat($("#inStokAsli").val()); 
        frek=$("#inSelisih").val(); 
        tglExp = $("#inTglExp").val();
        
        var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
        var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
		dataString =   
		 'frek='+ frek  +  '&id_logistik='+ idLogistik
		   + '&id=' + ID  + '&tglExp=' + tglExp  
		; 
// 		  alert(dataString);
		$.ajax({
			type: "POST",
            url: "<?php echo base_url() ?>Stok_obat/insertUpdateStok",
			data: dataString,
			success: function() {

alert("STOK "+nama+" MENJADI "+asli);
// echo "<meta http-equiv='refresh' content='0'>";
// window.location.reload(true); 
        // tampilTambahFaktur();
        $('#datable').DataTable().ajax.reload();
		}
	})
    } 

    
    function tampilHarga() {
        a = $("#inLogistik").val();
        splitDiag = a.split("|");


        harga = parseFloat(splitDiag[1]);
        margin = parseFloat(splitDiag[2]);
        $("#inProdusenObat").val(splitDiag[4]);
        $("#outHarga").val(harga.toFixed(0));

        $("#outHna").val(harga.toFixed(0));
        // $("#inHargaStrukHitung").val(harga.toFixed(0)); 
        $("#outHargaLama").val(convertToRupiah(harga.toFixed(0)));
        $("#inMargin").val(margin.toFixed(2));

        frek = parseFloat($("#inFrek").val());


        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total.toFixed(0)));

    }
    function tampilStok() {
        a = $("#inLogistik").val();  
		splitDiag= a.split("|"); 
		idBarang=splitDiag[0];
		stok=splitDiag[1];
		$("#inTersedia").val(stok);
		$("#inSelisih").val(stok*-1);
    }
    
    function tampilSelisih() {   
		tersedia= parseFloat($("#inTersedia").val()) ;
		asli=  parseFloat($("#inStokAsli").val()); 
      selisih=asli-tersedia;
		$("#inSelisih").val(selisih);  
	}  

</script>
            <!--  -->

<!--tampil data-->

<script type="text/javascript">
    function edit_detail(id_logistik){
       $("#ModalDetailStok").modal('show');
        $('#datablestok').dataTable().fnClearTable();
			$('#datablestok').dataTable().fnDestroy();
			$('#datablestok').DataTable({
				"language": {
					"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
					"sProcessing": "Sedang memproses...",
					"sLengthMenu": "Tampilkan _MENU_ entri",
					"sZeroRecords": "Tidak ditemukan data yang sesuai",
					"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
					"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
					"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
					"sInfoPostFix": "",
					"sSearch": "Cari:",
					"sUrl": "",
					"oPaginate": {
						"sFirst": "Pertama",
						"sPrevious": "Sebelumnya",
						"sNext": "Selanjutnya",
						"sLast": "Terakhir"
					},

				},
				"ajax": {
					"url": '<?php echo base_url('Stok_obat/tampil_detail'); ?>',
					"type": 'POST',
					"data": {
						id_logistik:id_logistik
					},
				},
				"deferRender": true,
				"processing": true,
				"order": [],
				"columnDefs": [{
					"targets": [0],
					"orderable": false,
				}, ],
			});
       
    }

    
		
		

    
    
                

</script>
            <!--  -->

<!--tampil data-->

<script type="text/javascript">
        $(document).ready(function() {

            $('#datable').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Cari:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    },
                },
                "ajax": '<?php echo base_url('Stok_obat/tampil_stok_obat'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        });
        // Make to collapse hidden
        $('.data_hide').addClass('collapse');

        
    </script>

<!--end tampil data-->