<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MAINTENANCE HARIAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
<table class='table table-bordered>'        

 		<tr><td width='200'>STO <?php echo form_error('id_sto') ?></td>
		<td>
			<?php echo cmb_dinamis('id_sto', 'tbl_sto', 'nama_sto', 'id_sto', $id_sto) ?>
		</td></tr>

	    <tr><td width='200'>LABEL ODP <?php echo form_error('label_odp') ?></td><td><input type="text" class="form-control" name="label_odp" id="label_odp" placeholder="CONTOH ODP-TRK-FAA/001" value="<?php echo $label_odp; ?>" /></td></tr>

	    <tr><td width='200'>FISIK ODP <?php echo form_error('foto_odp') ?></td>
		<td>
			<input type="file" name="foto_odp">
		</td></tr>

	    <tr><td width='200'>REDAMAN SEBELUM <?php echo form_error('foto_redaman_sebelum') ?></td>
		<td>
			<input type="file" name="foto_redaman_sebelum">
		</td></tr>
	    
        <tr><td width='200'>KORDINAT <?php echo form_error('taging_odp') ?></td><td> <textarea class="form-control" rows="3" name="taging_odp" id="taging_odp" placeholder="Taging Odp"><?php echo $taging_odp; ?></textarea></td></tr>

	    <tr><td width='200'>KENDALA <?php echo form_error('id_kendala') ?></td>
		<td>
			<?php echo cmb_dinamis('id_kendala', 'tbl_kendala', 'nama_kendala', 'id_kendala', $id_kendala) ?>	
		</td></tr>
	    
        <tr><td width='200'>IN / SC / NAMA PELANGGAN <?php echo form_error('in_sc_nama') ?></td><td> <textarea class="form-control" rows="3" name="in_sc_nama" id="in_sc_nama" placeholder="In Sc Nama"><?php echo $in_sc_nama; ?></textarea></td></tr>

	    <tr><td width='200'>REQUESTER <?php echo form_error('id_req') ?></td>
		<td>
			<?php echo cmb_dinamis('id_req', 'tbl_req', 'nama_req', 'id_req', $id_req) ?>	
		</td></tr>

	    <tr><td width='200'>ZONA <?php echo form_error('id_zone') ?></td>
		<td>
			<?php echo cmb_dinamis('id_zone', 'tbl_zone', 'nama_zone', 'id_zone', $id_zone) ?>
		</td></tr>

	    <tr><td width='200'>WAKTU LAPOR <?php echo form_error('datetime_lapor') ?></td><td><input type="text" class="form-control" name="datetime_lapor" id="date" placeholder="Datetime Lapor" value="<?php echo $datetime_lapor; ?>" /></td></tr>

		<input type="hidden" name="date_lapor" value="<?php echo date("Y-m-d"); ?>" /> 
		
	    <tr><td></td><td><input type="hidden" name="id_maintenance_harian" value="<?php echo $id_maintenance_harian; ?>" /> 

	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('maintenance_harian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>