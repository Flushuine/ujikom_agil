<section class="content">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="box">
                <h2 style="margin-top:0px"><?php echo $button ?> Data Mahasiswa</h2>
                <div class="box-body">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('m_mhs') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div>
        </section>
    </div>
</section>