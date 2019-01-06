<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_tes Read</h2>
        <table class="table">
	    <tr><td>Tanggal Jam</td><td><?php echo $tanggal_jam; ?></td></tr>
	    <tr><td>Waktu Selesai</td><td><?php echo $waktu_selesai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tbl_tes') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>