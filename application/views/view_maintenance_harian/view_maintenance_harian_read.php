<div class="content-wrapper">
    
    <section class="content">
    <div class="col-md-6">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DETAIL DATA MAINTENANCE HARIAN | <?php echo $label_odp; ?> | <?php echo $datetime_lapor; ?></h3>
            </div>
            
<table class='table table-bordered>'        

	   
	    <tr><td width='200'>FISIK ODP <?php echo form_error('foto_odp') ?></td>
		<td>
            <img src="<?php echo base_url()?>assets\evident/<?php echo $foto_odp;?>" class="thumbnail" width="200px" height="200px" border="1">
		</td>
		</tr>

	    <tr><td width='200'>REDAMAN SEBELUM <?php echo form_error('foto_redaman_sebelum') ?></td>
		<td>
            <img src="<?php echo base_url()?>assets\evident/<?php echo $foto_redaman_sebelum;?>" class="thumbnail" width="200px" height="200px" border="1">
		</td>
		</tr>
	    
        <tr><td width='200'>KOORDINAT <?php echo form_error('taging_odp') ?></td><td> 
            <a target = '_blank' href="<?php echo $taging_odp;?>"> Koordinat </a>
        </td></tr>
	    
		<tr><td width='200'>KENDALA <?php echo form_error('id_kendala') ?></td>
		<td>
            <?php echo $nama_kendala; ?>
		</td>
		</tr>
	    
        <tr><td width='200'>IN / SC / NAMA <?php echo form_error('in_sc_nama') ?></td><td> 
            <?php echo $in_sc_nama; ?>
        </td></tr>

	    <tr><td width='200'>REQUESTER <?php echo form_error('id_req') ?></td>
		<td>
            <?php echo $nama_req; ?>	
		</td>
		</tr>

	    <tr><td width='200'>ZONE <?php echo form_error('id_zone') ?></td>
		<td>
		    <?php echo $nama_zone; ?>
		</td>
		</tr>
	</table></form>        </div>
</div>


<div class="col-md-6">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DATA PROCESS MAINTENANCE HARIAN | <?php echo $label_odp; ?> | <?php echo $datetime_selesai; ?> </h3>
            </div>
            
<table class='table table-bordered>'        

	    <tr><td width='200'>REDAMAN SESUDAH <?php echo form_error('foto_redaman_sesudah') ?></td>
		<td>
            <img src="<?php echo base_url()?>assets\evident/<?php echo $foto_redaman_sesudah;?>" class="thumbnail" width="200px" height="200px" border="1">
		</td>
		</tr>

	    <tr><td width='200'>NAMA TEAM <?php echo form_error('id_team') ?></td>
		<td>
		    <?php echo $nama_team; ?>
		</td>
		</tr>
	    
        <tr><td width='200'>RFO / DETAIL PERBAIKAN <?php echo form_error('rfo') ?></td><td> 
            <?php echo $rfo; ?>
        </td></tr>
	    
		<tr><td width='200'>KERUSAKAN <?php echo form_error('nama_kategori_rfo_detail') ?></td><td> 
            <?php echo $nama_kategori_rfo_detail; ?>
        </td></tr>

		<tr><td width='200'>LINGKUP <?php echo form_error('nama_kategori_rfo') ?></td><td> 
            <?php echo $nama_kategori_rfo; ?>
        </td></tr>

        <tr><td width='200'>MATERIAL <?php echo form_error('material') ?></td><td> 
            <?php echo $material; ?>
        </td></tr>
	    
	    <tr><td width='200'>STATUS PEKERJAAN <?php echo form_error('id_status') ?></td>
		<td>
            <?php echo $nama_status; ?>
		</td>
		</tr>

	    <tr><td width='200'>DURASI <?php echo form_error('id_status') ?></td>
		<td>
            <?php echo $durasi; ?>
		</td>
		</tr>

	    <tr><td></td><td>
	    <a href="<?php echo site_url('view_maintenance_harian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>