<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA STO</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Sto <?php echo form_error('nama_sto') ?></td><td><input type="text" class="form-control" name="nama_sto" id="nama_sto" placeholder="Nama Sto" value="<?php echo $nama_sto; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_sto" value="<?php echo $id_sto; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('sto') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>