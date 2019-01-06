<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PROCESS MAINTENANCE HARIAN</h3>
                    </div>
        
        <div class="box-body">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="100px">LABEL ODP</th>
                    <th width="100px">FISIK ODP</th>
                    <th width="500px">IN / SC / NAMA PELANGGAN</th>
                    <th>RFO</th>
                    <th width="100px" >SESUDAH</th>
                    <th >MATERIAL</th>
                    <th>MULAI</th>
                    <th>SELESAI</th>
                    <th>STAUS</th>
                    <th width="10px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    scrollX     : true,
                    scrollCollapse: true,
                    ajax: {"url": "process_maintenance_harian/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_process_maintenance_harian",
                            "orderable": false
                        }
                        ,{"data": "label_odp"}
                        ,{"data": "foto_odp"}
                        ,{"data": "in_sc_nama"}
                        ,{"data": "rfo"}
                        ,{"data": "foto_redaman_sesudah"}
                        ,{"data": "material"}
                        ,{"data": "datetime_lapor"}
                        ,{"data": "datetime_selesai"}
                        ,{"data": "nama_status"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);

                        $(row).find('td:eq(2)').html('<img src="<?php echo base_url(); ?>assets/evident/'+data.foto_odp+'"style="height:100px;width:100px;" class="img-thumbnail" />');

                        $(row).find('td:eq(5)').html('<img src="<?php echo base_url(); ?>assets/evident/'+data.foto_redaman_sesudah+'"style="height:100px;width:100px;" class="img-thumbnail" />');

                        if (data.nama_status == "OPEN") {
                            //cell background color
                            $(row).find('td:eq(9)').html('<span class="label label-danger">OPEN</span>');
                        }
                        else if(data.nama_status =="PROGRESS"){
                            $(row).find('td:eq(9)').html('<span class="label label-info">PROGRESS</span>');
                        }
                        else if(data.nama_status =="PENDING"){
                            $(row).find('td:eq(9)').html('<span class="label label-warning">PENDING</span>');
                        }
                        else if(data.nama_status =="CLOSE"){
                            $(row).find('td:eq(9)').html('<span class="label label-success">CLOSE</span>');
                        }

                    }
                });
            });
        </script>