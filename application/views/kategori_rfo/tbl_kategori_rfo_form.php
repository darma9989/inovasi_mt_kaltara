<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_KATEGORI_RFO</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Kategori Rfo <?php echo form_error('nama_kategori_rfo') ?></td><td><input type="text" class="form-control" name="nama_kategori_rfo" id="nama_kategori_rfo" placeholder="Nama Kategori Rfo" value="<?php echo $nama_kategori_rfo; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_kategori_rfo" value="<?php echo $id_kategori_rfo; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_rfo') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>