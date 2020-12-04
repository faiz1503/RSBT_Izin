<!-- Author : Fitra Arrafiq -->
<script>
    console.log('test')
    document.addEventListener("DOMContentLoaded", function(event) {
        table = $('#data').DataTable({
            "processing": true,
            "serverSide": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "responsive": true,
            "dataType": 'JSON',
            // "dom": 'Bfrtip',
            // "buttons": [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ],
            "ajax": {
                "url": "<?php echo site_url('pengajuan_izin/izin/getAllData') ?>",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }
            },
            "order": [
                [0, "desc"]
            ],
            "columnDefs": [{
                "targets": [0],
                "className": "center"
            }]
        });
    });

    var save_method;

    function updateAllTable() {
        table.ajax.reload();
    }

    function tambah() {
        save_method = 'add';
        $('#form_inputan')[0].reset();
        $('.form-group').removeClass('has-error')
            .removeClass('has-success')
            .find('#text-error').remove();
        $('#modal').modal('show');
        $('.reset').show();
    }

    function ubah(id) {
        save_method = 'update';
        $('#form_inputan')[0].reset();
        $('#modal').modal('show');
        $('.form-group').removeClass('has-error')
            .removeClass('has-success')
            .find('#text-error').remove();
        $.ajax({
            url: "<?php echo site_url('manajemen/kesatuan/getById/'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(resp) {
                data = resp.data
                $('[name="id"]').val(data.id);
                $('[name="nama_kesatuan"]').val(data.nama_kesatuan);
                $('.reset').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From Ajax');
            }
        });

    }

    function hapus(id) {
        swal({
                title: "Apakah Yakin Akan Dihapus?",
                type: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonText: "Ya",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    url: "<?php echo site_url('manajemen/kesatuan/delete'); ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success: function(resp) {
                        data = resp.result;
                        updateAllTable();
                        return swal({
                            html: true,
                            timer: 1300,
                            showConfirmButton: false,
                            title: data['msg'],
                            type: data['status']
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error Deleting Data');
                    }
                });
            });
    }


    function simpan() {
        var token_name = '<?php echo $this->security->get_csrf_token_name(); ?>'
        var csrf_hash = ''
        var url;
        if (save_method == 'add') {
            url = '<?php echo base_url() ?>manajemen/kesatuan/addData';
        } else {
            url = '<?php echo base_url() ?>manajemen/kesatuan/update';
        }
        swal({
                title: "Apakah anda sudah yakin ?",
                type: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                cancelButtonText: "Kembali",
                confirmButtonText: "Ya",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: $('#form_inputan').serialize(),
                    dataType: "JSON",
                    success: function(resp) {
                        data = resp.result
                        csrf_hash = resp.csrf['token'];
                        $('#form_inputan input[name=' + token_name + ']').val(csrf_hash);
                        if (data['status'] == 'success') {
                            updateAllTable();
                            $('.form-group').removeClass('has-error')
                                .removeClass('has-success')
                                .find('#text-error').remove();
                            $("#form_inputan")[0].reset();
                            $('#modal').modal('hide');
                        } else {
                            $.each(data['messages'], function(key, value) {
                                var element = $('#' + key);
                                element.closest('div.form-group')
                                    .removeClass('has-error')
                                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                    .find('#text-error')
                                    .remove();
                                element.after(value);
                            });
                        }
                        swal({
                            html: true,
                            timer: 1300,
                            showConfirmButton: false,
                            title: data['msg'],
                            type: data['status']
                        });
                    }

                });
            });
    }
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Pengajuan Izin Pegawai</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-right">
                            <button class="btn btn-success btn-xs" style="margin-right: 20px;" data-toggle="modal" data-target="#modal_tambahstok">
                                <li class="fa fa-plus"></li> Add Data
                            </button>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">

                        <div class="table-wrap">
                            <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                            <div class="table-responsive">
                                <table class="table table-hover display  pb-30" id="myData">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>Nama Pegawai</th>
                                            <th>Lama Izin</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Jadwal Off</th>
                                            <th>Konfirmasi KA Unit</th>
                                            <th>Keterangan KA Unit</th>
                                            <th>Konfirmasi KA Bidang</th>
                                            <th>Keterangan KA Bidang</th>
                                            <th>Konfirmasi KA Bidang SDM</th>
                                            <th>Keterangan KA Bidang SDM</th>
                                            <th>Keterangan SDM</th>
                                            <th>Upload Bukti Izin</th>
                                            <th>Status</th>
                                            <th>Jenis Izin</th>
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


                    <div class="modal fade " id="modal_tambahstok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">


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
                                                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO
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
                                                                                                <select class="form-control filled-input select2" onchange="tampilStok()" id="inLogistik">
                                                                                                    <option value="">-</option>

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
                                                                                            <label class="control-label col-md-3">STOK
                                                                                                TERSEDIA</label>
                                                                                            <div class="col-md-9 has-error">
                                                                                                <input type="text" class="form-control " placeholder="KONTAK SALES" id="inTersedia" disabled="" value="0">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /Row -->
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3">STOK
                                                                                                ASLI</label>
                                                                                            <div class="col-md-9 has-success">
                                                                                                <input type="number" class="form-control " placeholder="JUMLAH" id="inStokAsli" oninput="tampilSelisih()" value="0">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group ">
                                                                                            <label class="control-label col-md-3">SELISIH</label>
                                                                                            <div class="col-md-9 has-error">
                                                                                                <input type="text" class="form-control " placeholder="KONTAK SALES" id="inSelisih" disabled="" value="0">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                                                            <div class="col-md-9 has-success">
                                                                                                <input type="date" class="form-control txt-dark" data-toggle="datepicker" placeholder="JUMLAH" autocomplete="off" id="inTglExp">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                </div>
                                                                                <!-- /Row -->
                                                                                <div class="form-actions mt-10">
                                                                                    <button onclick="insertStok()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>
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