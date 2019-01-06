<div class="content-wrapper">

    <section class="content">
        <div class="col-md-6">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">DATA MAINTENANCE HARIAN |
                        <?php echo $label_odp; ?> |
                        <?php echo $datetime_lapor; ?> |
                        <?php echo $nama_sto; ?>
                    </h3>
                </div>

                <table class='table table-bordered>' <tr>
                    <td width='200'>FISIK ODP
                        <?php echo form_error('foto_odp') ?>
                    </td>
                    <td>
                        <img src="<?php echo base_url()?>assets\evident/<?php echo $foto_odp;?>" class="thumbnail"
                            width="200px" height="200px" border="1">
                    </td>
                    </tr>

                    <tr>
                        <td width='200'>REDAMAN SEBELUM
                            <?php echo form_error('foto_redaman_sebelum') ?>
                        </td>
                        <td>
                            <img src="<?php echo base_url()?>assets\evident/<?php echo $foto_redaman_sebelum;?>" class="thumbnail"
                                width="200px" height="200px" border="1">
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>KOORDINAT
                            <?php echo form_error('taging_odp') ?>
                        </td>
                        <td>
                            <a target='_blank' href="<?php echo $taging_odp;?>"> Koordinat </a>
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>KENDALA
                            <?php echo form_error('id_kendala') ?>
                        </td>
                        <td>
                            <?php echo $nama_kendala; ?>
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>IN / SC / NAMA
                            <?php echo form_error('in_sc_nama') ?>
                        </td>
                        <td>
                            <?php echo $in_sc_nama; ?>
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>REQUESTER
                            <?php echo form_error('id_req') ?>
                        </td>
                        <td>
                            <?php echo $nama_req; ?>
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>ZONE
                            <?php echo form_error('id_zone') ?>
                        </td>
                        <td>
                            <?php echo $nama_zone; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>


                            <a href="<?php echo site_url('maintenance_harian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i>
                                Kembali</a></td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="col-md-6">
            <div class="box box-success	 box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">DATA MAINTENANCE HARIAN |
                        <?php echo $label_odp; ?> |
                        <?php echo $datetime_lapor; ?> |
                        <?php echo $nama_sto; ?>
                    </h3>
                </div>

                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                    <table class='table table-bordered>' <tr>
                        <td width='200'>REDAMAN SESUDAH
                            <?php echo form_error('foto_redaman_sesudah') ?>
                        </td>
                        <td>
                            <input type="file" name="foto_redaman_sesudah">
                        </td>
                        </tr>

                        <tr>
                            <td width='200'>NAMA TEAM
                                <?php echo form_error('id_team') ?>
                            </td>
                            <td>
                                <?php echo cmb_dinamis('id_team', 'tbl_team', 'nama_team', 'id_team', $id_team) ?>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>RFO / DETAIL PERBAIKAN
                                <?php echo form_error('rfo') ?>
                            </td>
                            <td> <textarea class="form-control" rows="3" name="rfo" id="rfo" placeholder="RFO / DETAIL PERBAIKAN"><?php echo $rfo; ?></textarea></td>
                        </tr>

                        <tr>
                            <td width='200'>KERUSAKAN
                                <?php echo form_error('id_tbl_kategori_rfo_detail') ?>
                            </td>
                            <td>
                                <?php echo cmb_dinamis('id_tbl_kategori_rfo_detail', 'tbl_kategori_rfo_detail', 'nama_kategori_rfo_detail', 'id_tbl_kategori_rfo_detail', $id_tbl_kategori_rfo_detail) ?>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>LINGKUP
                                <?php echo form_error('id_kategori_rfo') ?>
                            </td>
                            <td>
                                <?php echo cmb_dinamis('id_kategori_rfo', 'tbl_kategori_rfo', 'nama_kategori_rfo', 'id_kategori_rfo', $id_kategori_rfo) ?>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>MATERIAL
                                <?php echo form_error('material') ?>
                            </td>
                            <td> <textarea class="form-control" rows="3" name="material" id="material" placeholder="POENGGUNAAN MATERIAL"><?php echo $material; ?></textarea></td>
                        </tr>

                        <tr>
                            <td width='200'>WAKTU SELESAI
                                <?php echo form_error('datetime_selesai') ?>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="datetime_selesai" id="date" placeholder="DATE TIME LAPOR"
                                    value="<?php echo $datetime_selesai; ?>" />
                            </td>
                        </tr>


                        <tr>
                            <td width='200'>STATUS PEKERJAAN
                                <?php echo form_error('id_status') ?>
                            </td>
                            <td>
                                <?php echo cmb_dinamis('id_status', 'tbl_status', 'nama_status', 'id_status', $id_status) ?>
                            </td>
                        </tr>
                        <input type="hidden" name="date_selesai" value="<?php echo date('Y-m-d'); ?>" />
                        <input type="hidden" name="id_maintenance_harian" value="<?php echo $id_maintenance_harian; ?>" />
                        <tr>
                            <td></td>
                            <td><input type="hidden" name="id_process_maintenance_harian" value="<?php echo $id_process_maintenance_harian; ?>" />

                                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>
                                    <?php echo $button ?></button>
                                <a href="<?php echo site_url('maintenance_harian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i>
                                    Kembali</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
</div>