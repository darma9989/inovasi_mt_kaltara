<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Maintenance_harian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Label Odp</th>
		<th>Foto Odp</th>
		<th>Foto Redaman Sebelum</th>
		<th>Taging Odp</th>
		<th>Id Kendala</th>
		<th>In Sc Nama</th>
		<th>Id Req</th>
		<th>Id Zone</th>
		<th>Datetime Lapor</th>
		<th>Date Lapor</th>
		
            </tr><?php
            foreach ($maintenance_harian_data as $maintenance_harian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $maintenance_harian->label_odp ?></td>
		      <td><?php echo $maintenance_harian->foto_odp ?></td>
		      <td><?php echo $maintenance_harian->foto_redaman_sebelum ?></td>
		      <td><?php echo $maintenance_harian->taging_odp ?></td>
		      <td><?php echo $maintenance_harian->id_kendala ?></td>
		      <td><?php echo $maintenance_harian->in_sc_nama ?></td>
		      <td><?php echo $maintenance_harian->id_req ?></td>
		      <td><?php echo $maintenance_harian->id_zone ?></td>
		      <td><?php echo $maintenance_harian->datetime_lapor ?></td>
		      <td><?php echo $maintenance_harian->date_lapor ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>