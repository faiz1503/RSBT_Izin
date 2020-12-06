<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default card-view">
									<div class="panel-heading">
										<div class="pull-left">
											<h6 class="panel-title txt-dark">DAFTAR JUMLAH BARANG</h6>
										</div>
    <div class="row">
    <div class="col-sm-12">
            <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal"
                data-target="#modal_tambahstok"><i class="icon-plus"></i><span class="btn-text">TAMBAH
                    STOK</span></button>
                    
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
								<th>NAMA OBAT</th> 
								<th>HARGA</th> 
								<!-- <th>TANGGAL EXPIRED</th> -->
								<th>GOLONGAN OBAT</th> 
								<th>PRODUSEN</th> 
								<th>SISA STOK</th>   
								<th>TIPE</th>   
								<th>DETAIL</th>
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
                       
                
 