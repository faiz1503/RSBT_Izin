<!DOCTYPE html>
<html>
<head>
	<title>Print out <?=$page_title?></title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="content">
		<table style="width: 100%">
			<tr>
				<td>
					<img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
				</td>
				<td>
					<p><b>RS. Bakti Timah Karimun</b></p>
					<p>Jl. Canggai Putri, Teluk Uma, Kec. Tebing</p>
					<p>Kab. Karimun, Prov. Kepulauan Riau, Indonesia</p>
					<p>Telp. 0777 7367085, Fax. 0777 7367176</p>
				</td>
			</tr>
		</table>
		<hr>
		<h3 class="center">
			PERSETUJUAN UMUM <i>(GENERAL CONSENT)</i><br>
			RAWAT JALAN
		</h3>
		<p>Saya yang bertanda tangan di bawah ini :</p>
		<p>Nama:..............................................................(L / P)</p>
		<p>Alamat:</p>
		<p>Telepon            : </p>
		<p>Hubungan dengan pasien: Saya sendiriSuami/IstriOrang tua kandung</p>
		<p>Anak kandungLain-lain : ........................................</p>
		<p>Karena kondisi medis pasien, saya dengan ini memberikan persetujuan sebagai wakil dari pasien :</p>
		<p>Nama:..............................................................(L / P)</p>
		<p>Alamat:  ....................................................</p>
		<p>Telepon:   </p>
		<p>Dengan ini saya :</p>
		<p>1.	Mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka. Prosedur diagnostik dan perawatan medis termasuk termasuk tetapi tidak terbatas pada electrocardiograms, x-ray, tes darah, terapi fisik dan pemberian obat.</p>
		<p>2.	Sadar bahwa praktik kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada saya.</p>
		<p>3.	Mengerti dan memahami bahwa :</p>
		<p>a.	Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan (termasuk identitas setiap orang yang memberikan atau mengamati pengobatan) setiap saat.</p>
		<p>b.	Saya mengerti dan memahami bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk setiap prosedur/terapi.</p>
		<p>c.	Saya mengerti bahwa banyak dokter pada staf medis RS yang bukan karyawan tetapi staf mitra yang telah diberikan hak untuk menggunakan fasilitas untuk perawatan dan pengobatan pasien mereka.</p>
		<p>d.	Jika diperlukan RS, saya akan berpartisipasi dalam pemilihan dokter yang akan bertanggung jawab untuk perawatan saya selama saya dalam perawatan di RS.</p>
		<p>4.	Memahami informasi yang ada didalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, RS akan menjamin kerahasiaannya.</p>
		<p>5.	Memberi wewenang kepada RS untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan, bila diperlukan untuk memproses klaim jaminan asuransi/perusahaan dan atau jaminan lembaga pemerintah.</p>


	</div>
	<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>
</body>
</html>