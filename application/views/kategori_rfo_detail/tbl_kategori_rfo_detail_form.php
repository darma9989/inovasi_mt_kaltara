<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_KATEGORI_RFO_DETAIL</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Kategori Rfo Detail <?php echo form_error('nama_kategori_rfo_detail') ?></td><td><input type="text" class="form-control" name="nama_kategori_rfo_detail" id="nama_kategori_rfo_detail" placeholder="Nama Kategori Rfo Detail" value="<?php echo $nama_kategori_rfo_detail; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_tbl_kategori_rfo_detail" value="<?php echo $id_tbl_kategori_rfo_detail; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_rfo_detail') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>