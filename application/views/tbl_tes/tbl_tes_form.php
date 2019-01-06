<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_TES</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Tanggal Jam <?php echo form_error('tanggal_jam') ?></td><td><input type="date" class="form-control" name="tanggal_jam" id="tanggal_jam" placeholder="Tanggal Jam" value="<?php echo $tanggal_jam; ?>" /></td></tr>
	    <tr><td width='200'>Waktu Selesai <?php echo form_error('waktu_selesai') ?></td><td><input type="text" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai" value="<?php echo $waktu_selesai; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_tes" value="<?php echo $id_tes; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbl_tes') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>