<?php $sso_user_data = $this->session->userdata('sso_user_data'); ?>
<!-- Row -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Mohon lengkapi data anda sebelum dapat mengakses sistem kepegawaian.</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-wrap">
                                <form action="<?= base_url('main/cek_data_pegawai') ?>" method="post">
                                    <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" value="<?= $staff['username']; ?>">
                                    <input type="hidden" class="form-control" id="id_staff" name="id_staff" value="<?= $staff['id_staff']; ?>">
                                    <div class="form-body">
                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Data <?= $sso_user_data->nama ?></h6>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Nama</label>
                                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?= set_value('nama'); ?>">
                                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Tempat Lahir</label>
                                                    <input type="text" id="tpt_lahir" name="tpt_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= set_value('tpt_lahir'); ?>">
                                                    <?= form_error('tpt_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Tgl Lahir</label>
                                                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="dd/mm/yyyy" value="<?= set_value('tgl_lahir'); ?> " autocomplete="off">
                                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Telpon</label>
                                                    <input type="text" id="telpon" name="telpon" class="form-control" placeholder="Telpon" value="<?= set_value('telpon'); ?>">
                                                    <?= form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Email</label>
                                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Alamat KTP</label>
                                                    <input type="text" id="alamat_ktp" name="alamat_ktp" class="form-control" placeholder="Alamat" value="<?= set_value('alamat_ktp'); ?>">
                                                    <?= form_error('alamat_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Alamat Domisili</label>
                                                    <input type="text" id="alamat_dom" name="alamat_dom" class="form-control" placeholder="Alamat" value="<?= set_value('alamat_dom'); ?>">
                                                    <?= form_error('alamat_dom', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Status</label>
                                                    <input type="text" id="status" name="status" class="form-control" placeholder="Status" value="<?= set_value('status'); ?>">
                                                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">No Rekening BNI</label>
                                                    <input type="text" id="no_rek_bni" name="no_rek_bni" class="form-control" placeholder="No Rekening" value="<?= set_value('no_rek_bni'); ?>">
                                                    <?= form_error('no_rek_bni', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Golongan Darah</label>
                                                    <input type="text" id="gol_dar" name="gol_dar" class="form-control" placeholder="Golongan Darah" value="<?= set_value('gol_dar'); ?>">
                                                    <?= form_error('gol_dar', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Agama</label>
                                                    <input type="text" id="agama" name="agama" class="form-control" placeholder="Agama" value="<?= set_value('agama'); ?>">
                                                    <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">No KTP</label>
                                                    <input type="text" id="no_ktp" name="no_ktp" class="form-control" placeholder="No KTP" value="<?= set_value('no_ktp'); ?>">
                                                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->

                                        <div class="seprator-block"></div>

                                        <h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>Data Lainnya.</h6>
                                        <hr>
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Nama Ibu Kandung</label>
                                                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="<?= set_value('nama_ibu'); ?>">
                                                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Data Orang Tua</label>
                                                    <input type="text" id="data_ortu" name="data_ortu" class="form-control" placeholder="Data Ortu" value="<?= set_value('data_ortu'); ?>">
                                                    <?= form_error('data_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Data Keluarga Inti</label>
                                                    <input type="text" id="data_kel_inti" name="data_kel_inti" class="form-control" placeholder="Data Keluarga Inti" value="<?= set_value('data_kel_inti'); ?>">
                                                    <?= form_error('data_kel_inti', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Riwayat Pendidikan</label>
                                                    <input type="text" id="riwayat_pend" name="riwayat_pend" class="form-control" placeholder="Riwayat Pendidikan" value="<?= set_value('riwayat_pend'); ?>">
                                                    <?= form_error('riwayat_pend', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Pelatihan yang diikuti</label>
                                                    <input type="text" id="pelatihan" name="pelatihan" class="form-control" placeholder="Pelatihan" value="<?= set_value('pelatihan'); ?>">
                                                    <?= form_error('pelatihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Riwayat Pekerjaan / Jabatan</label>
                                                    <input type="text" id="riwayat_pek" name="riwayat_pek" class="form-control" placeholder="Riwayat Pekerjaan" value="<?= set_value('riwayat_pek'); ?>">
                                                    <?= form_error('riwayat_pek', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">No STR</label>
                                                    <input type="text" id="no_str" name="no_str" class="form-control" placeholder="No STR" value="<?= set_value('no_str'); ?>">
                                                    <?= form_error('no_str', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Masa Berlaku STR</label>
                                                    <input type="date" id="masa_str" name="masa_str" class="form-control" placeholder="Masa Berlaku" value="<?= set_value('masa_str'); ?>">
                                                    <?= form_error('masa_str', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                        <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">No SIP</label>
                                                    <input type="text" id="no_sip" name="no_sip" class="form-control" placeholder="No SIP" value="<?= set_value('no_sip'); ?>">
                                                    <?= form_error('no_sip', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Masa Berlaku SIP</label>
                                                    <input type="date" id="masa_sip" name="masa_sip" class="form-control" placeholder="Masa Berlaku" value="<?= set_value('masa_sip'); ?>">
                                                    <?= form_error('masa_sip', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!-- /Row -->
                                    </div>
                                    <div class="form-actions mt-10">
                                        <button type="submit" class="btn btn-success  mr-10"> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->