<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid text-center">
    
                    <div class="box-header">
                        <h3 class='box-title' style="vertical-align:middle;">REPORT MAINTENANCE STO</h3>
                    </div>


			<form action="<?php echo base_url('index.php/report_harian_maintenance_harian/hasil_sto')?>" action="GET">
                <div class="box-body">
                <div class="row">
                    <div class="col-xs-2">
                        <input type="text" class="form-control pull-righ" name="cari" id="datex" placeholder="DARI TANGGAL">
                    </div>
                    <div class="col-xs-2">
                        <input type="text" class="form-control pull-righ" name="cari2" id="datey" placeholder="SAMPAI TANGGAL">
                    </div>
                    <div class="col-xs-1">
                        <input class="btn btn-primary" type="submit" value="cari">
                    </div>
                <!-- /.box-body -->
                </div>
                </div>
			</form>

        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                <th width="200px" style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-blue' rowspan=2>STO</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-maroon' colspan=3>OWNER GROUP</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-red' colspan=4>INCIDENT</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-green' colspan=3>ACTUAL RESOLUTION</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-yellow' colspan=5>TIME TO RESOLUTION</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-red' colspan=4>STATUS</th>
                <th width="50x" style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-blue' rowspan=2>TOTAL</th>
                </tr>
                <tr>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>ASSURANCE</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>PROVI</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>REMO</th>
                    
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>SPLITTER</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>ODP</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>RETI</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>LOS</th>

                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>ODP</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>ODC</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>FTM</th>

                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>< 3</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>3 - 6</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>6 - 12</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>12 - 24</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>> 24</th>
                    
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>OPEN</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>PROGGRESS</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>PENDING</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>CLOSE</th>     

                           
                </tr>
            </thead>
            <tr>
         
            <?php
                $total_assurance = 0;
                $total_provisioning = 0;
                $total_remo = 0;
                $total_splitter=0;
                $total_odp=0;
                $total_reti=0;
                $total_los=0;
                $total_ar_odp=0;
                $total_ar_odc=0;
                $total_ar_ftm=0;
                $ttr_3=0;
                $ttr_6=0;
                $ttr_12=0;
                $ttr_24=0;
                $ttr_48=0;
                $total_open=0;
                $total_pending=0;
                $total_progress=0;
                $total_close=0;
                $t_total=0;
                foreach($data->result_array() as $i):
                    $odp_ar=$i['odp_ar'];
                    $odc_ar=$i['odc_ar'];
                    $ftm_ar=$i['ftm_ar'];
                    $nama_sto=$i['nama_sto'];
                    $assurance=$i['assurance'];
                    $provisioning=$i['provisioning'];
                    $remo=$i['remo'];
                    $splitter=$i['splitter'];
                    $odp=$i['odp'];
                    $reti=$i['reti'];
                    $los=$i['los'];
                    $open=$i['open'];
                    $progress=$i['progress'];
                    $pending=$i['pending'];
                    $close=$i['close'];
                    $tiga=$i['tiga'];
                    $tiga_enam=$i['tiga_enam'];
                    $enam_duabelas=$i['enam_duabelas'];
                    $duabelas_duapuluhempat=$i['duabelas_duapuluhempat'];
                    $duapuluhempat_keatas=$i['duapuluhempat_keatas'];
                    $total=$i['total'];
                    $total_assurance += $i['assurance'];
                    $total_provisioning += $i['provisioning'];
                    $total_remo += $i['remo'];
                    $total_splitter += $i['splitter'];
                    $total_odp += $i['odp'];
                    $total_reti += $i['reti'];
                    $total_los += $i['los'];
                    $total_ar_odp +=$i['odp_ar'];
                    $total_ar_odc +=$i['odc_ar'];
                    $total_ar_ftm +=$i['ftm_ar'];
                    $ttr_3 += $i['tiga'];
                    $ttr_6 += $i['tiga_enam'];
                    $ttr_12 += $i['enam_duabelas'];
                    $ttr_24 += $i['duabelas_duapuluhempat'];
                    $ttr_48 += $i['duapuluhempat_keatas'];
                    $total_open+=$i['open'];
                    $total_pending+=$i['pending'];
                    $total_progress+=$i['progress'];
                    $total_close+=$i['close'];
                    $t_total+=$i['total'];
            ?>
                    
                    <tr>
                    <td>
                        <?php echo $nama_sto;?>
                    </td>

                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_assurance?nama_sto=<?php echo $nama_sto ;?>&nama_zone=<?php echo 'assurance' ;?>"><?php echo $assurance;?></a>
                    </td>

                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_assurance?nama_sto=<?php echo $nama_sto ;?>&nama_zone=<?php echo 'provisioning' ;?>"><?php echo $provisioning;?></a>
                    </td>

                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_assurance?nama_sto=<?php echo $nama_sto ;?>&nama_zone=<?php echo 'remo' ;?>"><?php echo $remo;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_incident?nama_sto=<?php echo $nama_sto ;?>&nama_kendala=<?php echo 'splitter' ;?>"><?php echo $splitter;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_incident?nama_sto=<?php echo $nama_sto ;?>&nama_kendala=<?php echo 'odp' ;?>"><?php echo $odp;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_incident?nama_sto=<?php echo $nama_sto ;?>&nama_kendala=<?php echo 'reti' ;?>"><?php echo $reti;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_incident?nama_sto=<?php echo $nama_sto ;?>&nama_kendala=<?php echo 'los' ;?>"><?php echo $los;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_ar?nama_sto=<?php echo $nama_sto ;?>&nama_kategori_rfo=<?php echo 'odp' ;?>"><?php echo $odp_ar;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_ar?nama_sto=<?php echo $nama_sto ;?>&nama_kategori_rfo=<?php echo 'odc' ;?>"><?php echo $odc_ar;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_ar?nama_sto=<?php echo $nama_sto ;?>&nama_kategori_rfo=<?php echo 'ftm' ;?>"><?php echo $ftm_ar;?></a>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_ttr_tiga?nama_sto=<?php echo $nama_sto ;?>&durasi_jam1<?php echo '<3' ;?> or durasi_jam2<?php echo '=3' ;?>"><?php echo $tiga;?></a>
                    </td>
                    <td>
                        <?php echo $tiga_enam;?>
                    </td>
                    <td>
                        <?php echo $enam_duabelas;?>
                    </td>
                    <td>
                        <?php echo $duabelas_duapuluhempat;?>
                    </td>
                    
                    <td style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center'><a style="color:black" href="./detail_sto_ttr_duapuluhempat_keatas?nama_sto=<?php echo $nama_sto ;?>&durasi_jam<?php echo '>24' ;?>"><?php echo $duapuluhempat_keatas;?></a>
                    </td>
                    <td>
                        <?php echo $open;?>
                    </td>
                    <td>
                        <?php echo $progress;?>
                    </td>
                    <td>
                        <?php echo $pending;?>
                    </td>
                    <td>
                        <?php echo $close;?>
                    </td>
                    <td>
                        <?php echo $total;?>
                    </td>
                    </tr>
                    
            <?php 
                endforeach;
            ?>
         
	        </tr>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-red text-center bg-blue'>TOTAL</th>

	        <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_assurance_total?nama_zone=<?php echo 'assurance' ;?>"><?php echo $total_assurance;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_assurance_total?nama_zone=<?php echo 'provisioning' ;?>"><?php echo $total_provisioning;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_assurance_total?nama_zone=<?php echo 'remo' ;?>"><?php echo $total_remo;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_incident_total?nama_kendala=<?php echo 'splitter' ;?>"><?php echo $total_splitter;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_incident_total?nama_kendala=<?php echo 'odp' ;?>"><?php echo $total_odp;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_incident_total?nama_kendala=<?php echo 'reti' ;?>"><?php echo $total_reti;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_incident_total?nama_kendala=<?php echo 'los' ;?>"><?php echo $total_los;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_ar_total?nama_kategori_rfo=<?php echo 'odp' ;?>"><?php echo $total_ar_odp;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_ar_total?nama_kategori_rfo=<?php echo 'odc' ;?>"><?php echo $total_ar_odc;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detail_sto_ar_total?nama_kategori_rfo=<?php echo 'ftm' ;?>"><?php echo $total_ar_ftm;?></a></th>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $ttr_3;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $ttr_6;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $ttr_12;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $ttr_24;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $ttr_48;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_open;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_progress;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_pending;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_close;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $t_total;?></a></th>

        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>