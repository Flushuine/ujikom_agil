<section class="content">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="box">
                <h2 style="margin-top:0px"><?php echo $button ?> Data Dosen</h2>
                <div class="box-body">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Nama Dosen<?php echo form_error('nm_dosen') ?></label>
                            <input type="text" class="form-control" name="nm_dosen" id="nm_dosen" placeholder="nama dosen" value="<?php echo $nm_dosen; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">NIDN <?php echo form_error('nidn_dosen') ?></label>
                            <input type="text" class="form-control" name="nidn_dosen" id="nidn_dosen" placeholder="nidn dosen" value="<?php echo $nidn_dosen; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Jenis Kelamin <?php echo form_error('jns_klmn_dosen') ?></label>
                            <input type="text" class="form-control" name="jns_klmn_dosen" id="jns_klmn_dosen" placeholder="Jenis Kelamin Dosen" value="<?php echo $jns_klmn_dosen; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Kode Jabatan Dosen <?php echo form_error('kd_jabatan_dosen') ?></label>
                            <input type="text" class="form-control" name="kd_jabatan_dosen" id="kd_jabatan_dosen" placeholder="Jenis Kelamin Dosen" value="<?php echo $kd_jabatan_dosen; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Status <?php echo form_error('status_dosen') ?></label>
                            <input type="text" class="form-control" name="status_dosen" id="status_dosen" placeholder="Jenis Kelamin Dosen" value="<?php echo $status_dosen; ?>" />
                        </div>
                        <input type="hidden" name="no_urut_dosen" value="<?php echo $no_urut_dosen; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('m_dosen') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div>
        </section>
    </div>
</section>