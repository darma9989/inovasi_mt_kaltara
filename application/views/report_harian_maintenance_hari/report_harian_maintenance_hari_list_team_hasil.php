<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid text-center">
    
                    <div class="box-header">
                        <h3 class='box-title' style="vertical-align:middle;">REPORT MAINTENANCE TEAM</h3>
                    </div>
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                <th width="250px" style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-blue' rowspan=2>NAMA TEAM</th>
                <th width="140px" style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-maroon' rowspan=2>STO</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-red' colspan=3>OWNER GROUP</th>
                <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-maroon' colspan=4>INCIDENT</th>
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
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>PROGRESS</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>PENDING</th>
                    <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='text-center bg-gray'>CLOSE</th>     

                           
                </tr>
            </thead>
            <tr>
         
            <?php
            if(count($cari1)>0)
            {
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
                foreach($cari1 as $data):
                    $total_assurance += $data->assurance;
                    $total_provisioning += $data->provisioning;
                    $total_remo += $data->remo;
                    $total_splitter += $data->splitter;
                    $total_odp += $data->odp;
                    $total_reti += $data->reti;
                    $total_los += $data->los;
                    $total_ar_odp +=$data->odp_ar;
                    $total_ar_odc +=$data->odc_ar;
                    $total_ar_ftm +=$data->ftm_ar;
                    $ttr_3 += $data->tiga;
                    $ttr_6 += $data->tiga_enam;
                    $ttr_12 += $data->enam_duabelas;
                    $ttr_24 += $data->duabelas_duapuluhempat;
                    $ttr_48 += $data->duapuluhempat_keatas;
                    $total_open+=$data->open;
                    $total_pending+=$data->pending;
                    $total_progress+=$data->progress;
                    $total_close+=$data->close;
                    $t_total+=$data->total;
            ?>
                    
                    <tr>
                    <td>
                        <?php echo $data->nama_team;?>
                    </td>
                    <td>
                        <?php echo $data->nama_sto;?>
                    </td>
                    <td>
                        <?php echo $data->assurance;?>
                    </td>
                    <td>
                        <?php echo $data->provisioning;?>
                    </td>
                    <td>
                        <?php echo $data->remo;?>
                    </td>
                    <td>
                        <?php echo $data->splitter;?>
                    </td>
                    <td>
                        <?php echo $data->odp;?>
                    </td>
                    <td>
                        <?php echo $data->reti;?>
                    </td>
                    <td>
                        <?php echo $data->los;?>
                    </td>
                    <td>
                        <?php echo $data->odp_ar;?>
                    </td>
                    <td>
                        <?php echo $data->odc_ar;?>
                    </td>
                    <td>
                        <?php echo $data->ftm_ar;?>
                    </td>
                    <td>
                        <?php echo $data->tiga;?>
                    </td>
                    <td>
                        <?php echo $data->tiga_enam;?>
                    </td>
                    <td>
                        <?php echo $data->enam_duabelas;?>
                    </td>
                    <td>
                        <?php echo $data->duabelas_duapuluhempat;?>
                    </td>
                    <td>
                        <?php echo $data->duapuluhempat_keatas;?>
                    </td>
                    <td>
                        <?php echo $data->open;?>
                    </td>
                    <td>
                        <?php echo $data->progress;?>
                    </td>
                    <td>
                        <?php echo $data->pending;?>
                    </td>
                    <td>
                        <?php echo $data->close;?>
                    </td>
                    <td>
                        <?php echo $data->total;?>
                    </td>
                    </tr>

            <?php 
                endforeach;
            }
            ?>
         
	        </tr>

            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-red text-center bg-blue' colspan=2>TOTAL</th>
	        <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_assurance;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_provisioning;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_remo;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_splitter;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_odp;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_reti;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_los;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_ar_odp;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_ar_odc;?></a></th>
            <th style="padding-top: 3px; padding-bottom: 3px;vertical-align:middle;" class='bg-gray text-center'><a style="color:black" href="./detailsuspect4.php?status=pr3&state=working&reg=&source=nossf&prev=monitoringgpon"><?php echo $total_ar_ftm;?></a></th>
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