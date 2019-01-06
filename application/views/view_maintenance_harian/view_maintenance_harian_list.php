<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">REPORT DATA MAINTENANCE HARIAN</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th width="150px">LABEL ODP</th>
                    <th width="75px">KENDALA</th>
                    <th width="200px">NAMA TEAM</th>
                    <th width="500px">IN / SC / NAMA PELANGGAN</th>
                    <th width="300px">FRO / PERBAIKAN</th>
                    <th width="100px">ZONE</th>
                    <th width="100px">WAKTU SELESAI</th>
                    <th width="100x">DURASI</th>
                    <th width="70px">STAUS</th>
                    <th width="50px">Action</th>
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
                    ajax: {"url": "view_maintenance_harian/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_maintenance_harian",
                            "orderable": false
                        },{"data": "label_odp"},{"data": "nama_kendala"},{"data": "nama_team"},{"data": "in_sc_nama"},{"data": "rfo"},{"data": "nama_zone"},{"data": "datetime_selesai"},{"data": "durasi"},{"data": "nama_status"},
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