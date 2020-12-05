<!-- Author : Fitra Arrafiq -->
<script>
    console.log('test')
    document.addEventListener("DOMContentLoaded", function(event) {
        table = $('#myData').DataTable({
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
                    url: "<?php echo site_url('pengajuan_izin/izin/delete'); ?>/" + id,
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
                            <button class="btn btn-primary btn-xs" style="margin-right: 20px;" data-toggle="modal" data-target="#modal_tambahstok">
                                <li class="fa fa-pencil"></li> Kelola Data Jenis Izin
                            </button>
                            <button class="btn btn-success btn-xs" style="margin-right: 20px;" data-toggle="modal" data-target="#modalAdd">
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
                                <table class="table table-hover display " id="myData">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>Tools</th>
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
                                            <th>Keterangan SDM</th>
                                            <th>Upload Bukti Izin</th>
                                            <th>Status</th>
                                            <th>Jenis Izin</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="modalAdd" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <li class="fa fa-list"></li> Form Pengajuan Izin
                            </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <?php echo form_open('pengajuan_izin/izin/addData', array('id' => 'form_inputan', 'method' => 'post', 'enctype' => 'multipart/form-data')); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Kode Izin<span class="required"></span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="id_izin" name="id_izin" value="<?php echo $getMaxId; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Nama Pegawai<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <select name="id_pegawai" id="id_pegawai" class="form-control select2" required>
                                                <option value="">Pilih Pegawai</option>
                                                <?php foreach ($getPegawai as $row) { ?>
                                                    <option value="<?php echo $row->id_pegawai ?>"><?php echo $row->nama; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Lama Izin<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="lama_izin" name="lama_izin" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Tanggal Mulai<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Tanggal Berakhir<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Jadwal Off<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="jadwal_off" name="jadwal_off" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Konfirmasi KA Unit<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="acc_kaunit" name="acc_kaunit" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Keterangan KA Unit<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="ket_kaunit" name="ket_kaunit" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Konfirmasi KA Bidang<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="acc_kabid" name="acc_kabid" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Keterangan KA Bidang<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="ket_kabid" name="ket_kabid" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Konfirmasi KA Bidang SDM<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="acc_kabid_sdm" name="acc_kabid_sdm" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Keterangan KA Bidang SDM<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="ket_sdm" name="ket_sdm" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Bukti Izin<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="file" id="bukti_izin" name="bukti_izin" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Status<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="status" name="status" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3">Jenis Izin<span class="required">*</span></label>
                                        <div class="col-md-8 xdisplay_inputx form-group row ">
                                            <input type="text" id="id_jenis_izin" name="id_jenis_izin" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        </div>
                        <?php echo form_close() ?>
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