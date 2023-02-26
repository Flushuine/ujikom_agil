<!doctype html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        .word-table {
            border: 1px solid black !important;
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            border: 1px solid black !important;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h2>M_dosen List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama Dosen</th>
            <th>NIDN Dosen</th>
            <th>Jenis Kelamin Dosen</th>
            <th>Kode Jabatan Dosen</th>
            <th>Status Dosen</th>


        </tr><?php
                foreach ($m_dosen_data as $m_dosen) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $m_dosen->nm_dosen ?></td>
                <td><?php echo $m_dosen->nidn_dosen ?></td>
                <td><?php echo $m_dosen->jns_klmn_dosen ?></td>
                <td><?php echo $m_dosen->kd_jabatan_dosen ?></td>
                <td><?php echo $m_dosen->status_dosen ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>