<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Data Pegawai <a href="javascript:void(0)" title="Edit" onclick="edit_pegawai('<?= $pegawai['id_pegawai'] ?>')"><button class="btn btn-danger btn-anim btn-xs"><i class="fa fa-pencil-square-o"></i><span class="btn-text">edit</span></button></a></h6>
                </div>a
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table style="clear: both" class="table table-bordered table-striped" id="user">
                                <tbody>
                                    <tr>
                                        <td><a>Nama</a></td>
                                        <td><a><span id="nama_"><?= $pegawai['nama'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Tempat Lahir</a></td>
                                        <td><a><span id="tpt_lahir_"><?= $pegawai['tpt_lahir'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Tgl Lahir</a></td>
                                        <td><a><span id="tgl_lahir_"><?= tgl_indo($pegawai['tgl_lahir']) ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Telpon</a></td>
                                        <td><a><span id="telpon_"><?= $pegawai['telpon'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Email</a></td>
                                        <td><a><span id="email_"><?= $pegawai['email'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Alamat KTP</a></td>
                                        <td><a><span id="alamat_ktp_"><?= $pegawai['alamat_ktp'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Alamat Domisili</a></td>
                                        <td><a><span id="alamat_dom_"><?= $pegawai['alamat_dom'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Status</a></td>
                                        <td><a><span id="status_"><?= $pegawai['status'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>No Rek BNI</a></td>
                                        <td><a><span id="no_rek_bni_"><?= $pegawai['no_rek_bni'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Gol Darah</a></td>
                                        <td><a><span id="gol_dar_"><?= $pegawai['gol_dar'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Agama</a></td>
                                        <td><a><span id="agama_"><?= $pegawai['agama'] ?></span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table style="clear: both" class="table table-bordered table-striped" id="user">
                                <tbody>
                                    <tr>
                                        <td><a>No KTP</a></td>
                                        <td><a><span id="no_ktp_"><?= $pegawai['no_ktp'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Nama Ibu</a></td>
                                        <td><a><span id="nama_ibu_"><?= $pegawai['nama_ibu'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Data Orang Tua</a></td>
                                        <td><a><span id="data_ortu_"><?= $pegawai['data_ortu'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Keluarga Inti</a></td>
                                        <td><a><span id="data_kel_inti_"><?= $pegawai['data_kel_inti'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Riwayat Pendidikan</a></td>
                                        <td><a><span id="riwayat_pend_"><?= $pegawai['riwayat_pend'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Pelatihan</a></td>
                                        <td><a><span id="pelatihan_"><?= $pegawai['pelatihan'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>No STR</a></td>
                                        <td><a><span id="no_str_"><?= $pegawai['no_str'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Masa Berlaku STR</a></td>
                                        <td><a><span id="masa_str_"><?= tgl_indo($pegawai['masa_str']) ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>No SIP</a></td>
                                        <td><a><span id="no_sip_"><?= $pegawai['no_sip'] ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Masa Berlaku SIP</a></td>
                                        <td><a><span id="masa_sip_"><?= tgl_indo($pegawai['masa_sip']) ?></span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a>Riwayat Pekerjaan</a></td>
                                        <td><a><span id="riwayat_pek_"><?= $pegawai['riwayat_pek'] ?></span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Upload</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#formEditModal"><i class="icon-plus"></i><span class="btn-text">TAMBAH
                                STOK</span></button>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">

                        <div class="table-wrap">
                            <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                            <div class="table-responsive">
                                <table class="table table-hover display pb-30" id="datable">
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

            <!-- Form Edit pegawai Modal-->
            <div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formEditModalLabel">Edit Data Pegawai</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="formEdit">
                                <input type="hidden" value="" name="id_pegawai">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Nama:</label>
                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Tempat Lahir:</label>
                                            <input type="text" id="tpt_lahir" name="tpt_lahir" class="form-control" placeholder="Tempat Lahir">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Tgl Lahir:</label>
                                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Telpon:</label>
                                            <input type="text" id="telpon" name="telpon" class="form-control" placeholder="Telpon">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Email:</label>
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Alamat KTP:</label>
                                            <input type="text" id="alamat_ktp" name="alamat_ktp" class="form-control" placeholder="Alamat">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Alamat Domisili:</label>
                                            <input type="text" id="alamat_dom" name="alamat_dom" class="form-control" placeholder="Alamat">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Status:</label>
                                            <input type="text" id="status" name="status" class="form-control" placeholder="Status">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">No Rekening BNI:</label>
                                            <input type="text" id="no_rek_bni" name="no_rek_bni" class="form-control" placeholder="No Rekening">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Golongan Darah:</label>
                                            <input type="text" id="gol_dar" name="gol_dar" class="form-control" placeholder="Golongan Darah">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Agama:</label>
                                            <input type="text" id="agama" name="agama" class="form-control" placeholder="Agama">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">No KTP:</label>
                                            <input type="text" id="no_ktp" name="no_ktp" class="form-control" placeholder="No KTP">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Nama Ibu Kandung:</label>
                                            <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Data Orang Tua:</label>
                                            <input type="text" id="data_ortu" name="data_ortu" class="form-control" placeholder="Data Ortu">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Data Keluarga Inti:</label>
                                            <input type="text" id="data_kel_inti" name="data_kel_inti" class="form-control" placeholder="Data Keluarga Inti">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Riwayat Pendidikan:</label>
                                            <input type="text" id="riwayat_pend" name="riwayat_pend" class="form-control" placeholder="Riwayat Pendidikan">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Pelatihan yang diikuti:</label>
                                            <input type="text" id="pelatihan" name="pelatihan" class="form-control" placeholder="Pelatihan">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Riwayat Pekerjaan / Jabatan:</label>
                                            <input type="text" id="riwayat_pek" name="riwayat_pek" class="form-control" placeholder="Riwayat Pekerjaan">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">No STR:</label>
                                            <input type="text" id="no_str" name="no_str" class="form-control" placeholder="No STR">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Masa Berlaku STR:</label>
                                            <input type="date" id="masa_str" name="masa_str" class="form-control" placeholder="Masa Berlaku">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">No SIP:</label>
                                            <input type="text" id="no_sip" name="no_sip" class="form-control" placeholder="No SIP">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10">Masa Berlaku SIP:</label>
                                            <input type="date" id="masa_sip" name="masa_sip" class="form-control" placeholder="Masa Berlaku">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="btnUpdate" onclick="update_pegawai()" class="btn btn-success btn-anim btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Simpan</span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Form Edit pegawai Modal-->


            <script>
                function tgl_indo(string) {
                    bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    tanggal = string.split("-")[2];
                    bulan = string.split("-")[1];
                    tahun = string.split("-")[0];

                    return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
                }

                function after_update_pegawai() {
                    $.ajax({
                        url: "<?php echo base_url('data_pegawai/data_pegawai_ajax') ?>",
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            $('#nama_').html(data.nama);
                            $('#tpt_lahir_').html(data.tpt_lahir);
                            $('#tgl_lahir_').html(tgl_indo(data.tgl_lahir));
                            $('#telpon_').html(data.telpon);
                            $('#email_').html(data.email);
                            $('#alamat_ktp_').html(data.alamat_ktp);
                            $('#alamat_dom_').html(data.alamat_dom);
                            $('#status_').html(data.status);
                            $('#no_rek_bni_').html(data.no_rek_bni);
                            $('#gol_dar_').html(data.gol_dar);
                            $('#agama_').html(data.agama);
                            $('#no_ktp_').html(data.no_ktp);
                            $('#nama_ibu_').html(data.nama_ibu);
                            $('#data_ortu_').html(data.data_ortu);
                            $('#data_kel_inti_').html(data.data_kel_inti);
                            $('#riwayat_pend_').html(data.riwayat_pend);
                            $('#pelatihan_').html(data.pelatihan);
                            $('#no_str_').html(data.no_str);
                            $('#masa_str_').html(tgl_indo(data.masa_str));
                            $('#no_sip_').html(data.no_sip);
                            $('#masa_sip_').html(tgl_indo(data.masa_sip));
                            $('#riwayat_pek_').html(data.riwayat_pek);

                        }
                    });
                }

                function edit_pegawai(id_pegawai) {
                    $('#formEdit')[0].reset(); // reset form on modals\
                    $('.form-group').removeClass('has-error'); // clear error class
                    $('.help-block').empty(); // clear error string

                    //Ajax Load data from ajax
                    $.ajax({
                        url: "<?php echo base_url('data_pegawai/edit_pegawai_ajax') ?>/" + id_pegawai,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            $('[name="id_pegawai"]').val(data.id_pegawai);
                            $('[name="nama"]').val(data.nama);
                            $('[name="tpt_lahir"]').val(data.tpt_lahir);
                            $('[name="tgl_lahir"]').datepicker().val(data.tgl_lahir);
                            $('[name="telpon"]').val(data.telpon);
                            $('[name="email"]').val(data.email);
                            $('[name="alamat_ktp"]').val(data.alamat_ktp);
                            $('[name="alamat_dom"]').val(data.alamat_dom);
                            $('[name="status"]').val(data.status);
                            $('[name="no_rek_bni"]').val(data.no_rek_bni);
                            $('[name="gol_dar"]').val(data.gol_dar);
                            $('[name="agama"]').val(data.agama);
                            $('[name="no_ktp"]').val(data.no_ktp);
                            $('[name="nama_ibu"]').val(data.nama_ibu);
                            $('[name="data_ortu"]').val(data.data_ortu);
                            $('[name="data_kel_inti"]').val(data.data_kel_inti);
                            $('[name="riwayat_pend"]').val(data.riwayat_pend);
                            $('[name="pelatihan"]').val(data.pelatihan);
                            $('[name="no_str"]').val(data.no_str);
                            $('[name="masa_str"]').val(data.masa_str);
                            $('[name="no_sip"]').val(data.no_sip);
                            $('[name="masa_sip"]').val(data.masa_sip);
                            $('[name="riwayat_pek"]').val(data.riwayat_pek);

                            $('#formEditModal').modal('show'); // show bootstrap modal when complete loaded
                            $('.modal-title').text('Edit Data Pegawai'); // Set title to Bootstrap modal title
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }

                function update_pegawai() {
                    $('#btnUpdate').text('Updating...'); //change button text
                    $('#btnUpdate').attr('disabled', true); //set button disable 

                    // ajax adding data to database
                    var formData = new FormData($('#formEdit')[0]);
                    $.ajax({
                        url: "<?php echo site_url('data_pegawai/update_pegawai_ajax') ?>",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status) //if success close modal and reload ajax table
                            {
                                $('#formEditModal').modal('hide');
                                after_update_pegawai();

                                $.toast({
                                    heading: 'Success!',
                                    text: 'Data anda telah berhasil diperbarui.',
                                    hideAfter: false,
                                    icon: 'success'
                                })
                            } else {
                                for (var i = 0; i < data.inputerror.length; i++) {
                                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                                }
                                $.toast({
                                    heading: 'Error!',
                                    text: 'Mohon lengkapi data untuk menyimpan data.',
                                    showHideTransition: 'fade',
                                    icon: 'error'
                                })
                            }
                            $('#btnUpdate').text('Update'); //change button text
                            $('#btnUpdate').attr('disabled', false); //set button enable 
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error updating data!');
                            $('#btnUpdate').text('Update'); //change button text
                            $('#btnUpdate').attr('disabled', false); //set button enable 
                        }
                    });
                }
            </script>
