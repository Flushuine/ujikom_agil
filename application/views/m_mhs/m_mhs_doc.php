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
    <h2>M_mhs List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            

        </tr><?php
                foreach ($m_mhs_data as $m_mhs) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $m_mhs->nama ?></td>
                <td><?php echo $m_mhs->alamat ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>