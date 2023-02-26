<section class="content">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="box">
                <h2 style="margin-top:0px"><?php echo $button ?> Data Mahasiswa</h2>
                <div class="box-body">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Kode Prodi <?php echo form_error('kd_prodi') ?></label>
                            <input type="text" class="form-control" name="kd_prodi" id="kd_prodi" placeholder="kode prodi" value="<?php echo $kd_prodi; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Kode Jenis Prodi <?php echo form_error('kd_jenis_prodi') ?></label>
                            <input type="text" class="form-control" name="kd_jenis_prodi" id="kd_jenis_prodi" placeholder="Kode Jenis Prodi" value="<?php echo $kd_jenis_prodi; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nama Prodi <?php echo form_error('nm_prodi') ?></label>
                            <input type="text" class="form-control" name="nm_prodi" id="nm_prodi" placeholder="Nama Prodi" value="<?php echo $nm_prodi; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Status Prodi <?php echo form_error('status_prodi') ?></label>
                            <input type="text" class="form-control" name="status_prodi" id="status_prodi" placeholder="Nama Prodi" value="<?php echo $status_prodi; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Email Prodi <?php echo form_error('email_prodi') ?></label>
                            <input type="text" class="form-control" name="email_prodi" id="email_prodi" placeholder="Nama Prodi" value="<?php echo $email_prodi; ?>" />
                        </div>
                        <input type="hidden" name="kd_prodi" value="<?php echo $kd_prodi; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('m_prodi') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div>
        </section>
    </div>
</section>