<div class="content-wrapper">
    
    <section class="content">
    <div class="col-md-6">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DETAIL DATA MAINTENANCE HARIAN | <?php echo $label_odp; ?> | <?php echo $datetime_lapor; ?> | <?php echo $nama_sto; ?></h3>
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

        <tr><td></td><td>
	    <a href="<?php echo site_url('maintenance_harian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>

	</table></form>        </div>
</div></div>