<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KENDALA</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Kendala <?php echo form_error('nama_kendala') ?></td><td><input type="text" class="form-control" name="nama_kendala" id="nama_kendala" placeholder="Nama Kendala" value="<?php echo $nama_kendala; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_kendala" value="<?php echo $id_kendala; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kendala') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>