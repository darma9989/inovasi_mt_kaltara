<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid text-center">
    
                    <div class="box-header">
                        <h3 class='box-title' style="vertical-align:middle;">OWNER GROUP | ASSURANCE |  </h3>
                    </div>
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                <th width="35px" style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-blue' rowspan=1>NO</th>
                <th width="200px" style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-blue' colspan=1>LABEL ODP</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-red' colspan=1>INCIDENT</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-blue' colspan=1>NAMA TEAM</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-red' colspan=1>IN / SC / NAMA PELANGGAN</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-green' colspan=1>RFO / PERBAIKAN / KENDALA</th>
                </tr>
            </thead>
            <tr>
            <?php
                $no=0;
                    foreach($data->result_array() as $i):
                        $nama_sto=$i['nama_sto'];
                        $label_odp=$i['label_odp'];
                        $nama_kendala=$i['nama_kendala'];
                        $nama_team=$i['nama_team'];
                        $in_sc_nama=$i['in_sc_nama'];
                        $rfo=$i['rfo'];
                        $no++;
            ?>
                    <tr>
                    <td>
                        <?php echo $no;?>
                    </td>
                    <td>
                        <?php echo $label_odp;?>
                    </td>
                    <td>
                    <?php echo $nama_kendala;?>
                    </td>
                    <td>
                    <?php echo $nama_team;?>
                    </td>
                    <td>
                    <?php echo $in_sc_nama;?>
                    </td>
                    <td>
                    <?php echo $rfo;?>
                    </td>
                    </tr>
            <?php 
                endforeach;
            
            ?>                    
	        </tr>
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>