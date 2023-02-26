<section class="content">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="box">
                <h2 style="margin-top:0px"></h2>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-6">
                        <?php echo anchor(site_url('m_dosen/create'), 'Tambah Data', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-6 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>NIDN Dosen</th>
                                <th>Jenis Kelamin</th>
                                <th>Kode Jabatan Dosen</th>
                                <th>Status Dosen</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                $start = 0;
                                foreach ($m_dosen_data as $m_dosen) {
                                ?>

                                <tr>

                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $m_dosen->nm_dosen ?></td>
                                    <td><?php echo $m_dosen->nidn_dosen ?></td>
                                    <td><?php echo $m_dosen->jns_klmn_dosen ?></td>
                                    <td><?php echo $m_dosen->kd_jabatan_dosen ?></td>
                                    <td><?php echo $m_dosen->status_dosen ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo '  ';
                                        echo anchor(site_url('m_dosen/update/' . $m_dosen->no_urut_dosen), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-warning btn-sm'));
                                        echo '  ';
                                        echo anchor(site_url('m_dosen/delete/' . $m_dosen->no_urut_dosen), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <?php echo anchor(site_url('m_dosen/excel'), 'Excel', 'class="btn btn-primary"'); ?>

                    </div>
        </section>
    </div>
</section>