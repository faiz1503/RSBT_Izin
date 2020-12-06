<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<!-- <h6 class="panel-title txt-dark">PENGAJUAN IZIN PEGAWAI</h6> -->
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="insertIzin('<?= $pegawai['id_pegawai'] ?>')"><i class="icon-plus"></i>
						<span class="btn-text">PENGAJUAN IZIN</span>
						</button>
					</div>
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
											<th>NAMA</th>
											<th>TGL INPUT</th>
											<th>LAMA IZIN</th>
											<th>TGL MULAI</th>
											<th>TGL AKHIR</th>
											<th>JADWAL OFF</th>
											<th>ACC KOR/KAUNIT</th>
											<th>KET</th>
											<th>ACC KABID</th>
											<th>KET</th>
											<th>ACC KABID SDM</th>
											<th>KET</th>
											<th>BUKTI IZIN</th>
											<th>HAPUS</th>
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
					<div class="modal fade " id="formInsertModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<!--modal 1-->
								<div class="modal-body">
									<!-- Form body  -->
									<form class="form-horizontal" id="formEdit">
										<div class="form-body mt-20">
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default card-view">
														<div class="panel-heading">
															<div class="pull-left">
																<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>
																	PENGAJUAN IZIN
																</h6>
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
																						<div class="form-group">
																							<label class="control-label col-md-3">NAMA PEGAWAI</label>
																							<div class="col-md-9 has-error">
																								<input type="text" class="form-control" id="nama" disabled="" name="nama">
																							</div>
																						</div>
																					</div>
																					<!--/span-->
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">NIK</label>
																							<div class="col-md-9 has-error">
																								<input type="text" class="form-control" id="no_ktp" disabled="" name="no_ktp">
																							</div>
																						</div>
																					</div>
																					<!-- /Row -->
																					<div class="col-md-6">
																						<div class="form-group">
																							<label class="control-label col-md-3">UNIT</label>
																							<div class="col-md-9 has-error">
																								<input type="text" class="form-control" id="unit" disabled="" name="unit">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">BIDANG</label>
																							<div class="col-md-9 has-error">
																								<input type="text" class="form-control" id="bidang" disabled="" name="bidang">
																							</div>
																						</div>
																					</div>
																					<!-- /Row -->
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">KEPERLUAN IZIN</label>
																							<div class="col-md-9">
																								<input type="text" class="form-control" placeholder="MASUKKAN KEPERLUAN IZIN" id="jenis_izin" name="jenis_izin">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">TANGGAL MULAI IZIN</label>
																							<div class="col-md-9">
																								<input type="date" class="form-control" placeholder="MASUKKAN TANGGAL MULAI IZIN" id="tgl_mulai" name="tgl_mulai">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">TANGGAL BERAKHIR IZIN</label>
																							<div class="col-md-9">
																								<input type="date" class="form-control" placeholder="MASUKKAN TANGGAL BERAKHIR IZIN" id="tgl_akhir" name="tgl_akhir">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">LAMA IZIN</label>
																							<div class="col-md-9">
																								<input type="text" class="form-control" placeholder="MASUKKAN LAMA IZIN" id="lama_izin" name="lama_izin">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">UPLOAD FILE PENDUKUNG</label>
																							<div class="col-md-9">
																								<input type="file" class="form-control" placeholder="UPLOAD FILE" id="bukti_izin" name="bukti_izin">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">KETERANGAN</label>
																							<div class="col-md-9">
																								<input type="text" class="form-control" placeholder="MASUKKAN KETERANGAN" id="status" name="status">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">JENIS IZIN</label>
																							<div class="col-md-9">
																								<input type="text" class="form-control" placeholder="MASUKKAN KEPERLUAN IZIN" id="jenis_izin" name="jenis_izin">
																							</div>
																						</div>
																					</div>
																					<!--/span-->
																				</div>
																				<!-- /Row -->
																				<div class="form-actions mt-10">
																				<button onclick="insertIzin()" class="btn btn-success btn-anim  btn-sm" type="button">
																					<i class="icon-rocket"></i>
																					<span class="btn-text">Tambah Data</span>
																				</button>
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


					<div class="modal fade" id="ModalDetailStok" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
																	<table id="datablestok" class="table table-hover display  pb-30">
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

			<script>
				function insertIzin(id_pegawai) {
                    $('#formEdit')[0].reset(); // reset form on modals\
                    $('.form-group').removeClass('has-error'); // clear error class
                    $('.help-block').empty(); // clear error string

                    //Ajax Load data from ajax
                    $.ajax({
                        url: "<?php echo base_url('pengajuan_izin/load_pegawai_ajax') ?>/" + id_pegawai,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            $('[name="id_pegawai"]').val(data.id_pegawai);
                            $('[name="nama"]').val(data.nama);
                            $('[name="no_ktp"]').val(data.no_ktp);
                            $('[name="unit"]').val(data.unit);
                            $('[name="bidang"]').val(data.bidang);

                            $('#formInsertModal').modal('show'); // show bootstrap modal when complete loaded
                            $('.modal-title').text('Edit Data Pegawai'); // Set title to Bootstrap modal title
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }
			</script>
