<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TEAM</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Team <?php echo form_error('nama_team') ?></td><td><input type="text" class="form-control" name="nama_team" id="nama_team" placeholder="Nama Team" value="<?php echo $nama_team; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_team" value="<?php echo $id_team; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('team') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>