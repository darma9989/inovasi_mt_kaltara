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
        <h2>Process_maintenance_harian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Maintenance Harian</th>
		<th>Foto Redaman Sesudah</th>
		<th>Id Team</th>
		<th>Rfo</th>
		<th>Material</th>
		<th>Waktu Selesai</th>
		<th>Id Status</th>
		
            </tr><?php
            foreach ($process_maintenance_harian_data as $process_maintenance_harian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $process_maintenance_harian->id_maintenance_harian ?></td>
		      <td><?php echo $process_maintenance_harian->foto_redaman_sesudah ?></td>
		      <td><?php echo $process_maintenance_harian->id_team ?></td>
		      <td><?php echo $process_maintenance_harian->rfo ?></td>
		      <td><?php echo $process_maintenance_harian->material ?></td>
		      <td><?php echo $process_maintenance_harian->waktu_selesai ?></td>
		      <td><?php echo $process_maintenance_harian->id_status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>