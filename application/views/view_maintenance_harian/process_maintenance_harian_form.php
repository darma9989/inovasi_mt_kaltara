<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PROCESS MAINTENANCE HARIAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>LABEL ODP <?php echo form_error('id_maintenance_harian') ?></td>
		<td>
			<?php echo cmb_dinamis('id_maintenance_harian', 'maintenance_harian', 'label_odp', 'id_maintenance_harian', $id_maintenance_harian) ?>	
		</td>
		</tr>

	    <tr><td width='200'>REDAMAN SESUDAH <?php echo form_error('foto_redaman_sesudah') ?></td>
		<td>
			<input type="file" name="foto_redaman_sesudah">
		</td>
		</tr>

	    <tr><td width='200'>NAMA TEAM <?php echo form_error('id_team') ?></td>
		<td>
			<?php echo cmb_dinamis('id_team', 'tbl_team', 'nama_team', 'id_team', $id_team) ?>	
		</td>
		</tr>
	    
        <tr><td width='200'>RFO / DETAIL PERBAIKAN <?php echo form_error('rfo') ?></td><td> <textarea class="form-control" rows="3" name="rfo" id="rfo" placeholder="RFO / DETAIL PERBAIKAN"><?php echo $rfo; ?></textarea></td></tr>
	    
        <tr><td width='200'>MATERIAL <?php echo form_error('material') ?></td><td> <textarea class="form-control" rows="3" name="material" id="material" placeholder="POENGGUNAAN MATERIAL"><?php echo $material; ?></textarea></td></tr>
	    
	    <tr><td width='200'>STATUS PEKERJAAN <?php echo form_error('id_status') ?></td>
		<td>
			<?php echo cmb_dinamis('id_status', 'tbl_status', 'nama_status', 'id_status', $id_status) ?>	
		</td>
		</tr>

	    <tr><td></td><td><input type="hidden" name="id_process_maintenance_harian" value="<?php echo $id_process_maintenance_harian; ?>" /> 
		<input type="hidden" name="waktu_selesai" value="<?php echo(date("Y-m-d H:i:s")); ?>" />
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('process_maintenance_harian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>