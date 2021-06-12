<table class="table table-fixed table-bordered table-hover bg-white" id="onprocessing" style="width:100%;">
                                    <thead>
                                         <tr>
                                                <th class="text-center"><?php echo display('sl');?>. </th>
                                                <th class="text-center"><?php echo display('invoice');?> </th>
                                                <th class="text-center"><?php echo display('customer_name');?></th>
                                                <th class="text-center"><?php echo display('customer_type');?></th> 
                                                <th class="text-center"><?php echo display('waiter');?></th> 
                                                <th class="text-center"><?php echo display('tabltno');?></th> 
                                                <th class="text-center"><?php echo display('ordate');?></th>
                                                <th class="text-right"><?php echo display('amount');?></th>
                                                <th class="text-center"><?php echo display('action');?></th>  
                                            </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7" style="text-align:right"><?php echo display('total');?>:</th>
                                            <th colspan="2" style="text-align:center"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <script type="text/javascript">
                                $(document).ready(function () {
                                        
                                $('#onprocessing').DataTable({ 
                                        responsive: true, 
                                        paging: true,
                                         dom: 'Bfrtip', 
                                        "lengthMenu": [[ 25, 50, 100, 150, 200, 500, -1], [ 25, 50, 100, 150, 200, 500, "All"]], 
                                        buttons: [  
                                            {extend: 'copy', className: 'btn-sm',footer: true}, 
                                            {extend: 'csv', title: 'ExampleFile', className: 'btn-sm',footer: true}, 
                                            {extend: 'excel', title: 'ExampleFile', className: 'btn-sm', title: 'exportTitle',footer: true}, 
                                            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm',footer: true}, 
                                            {extend: 'print', className: 'btn-sm',footer: true},
                                            {extend: 'colvis', className: 'btn-sm',footer: true}  
                                            
                                        ],
                                        "searching": true,
                                          "processing": true,
                                                 "serverSide": true,
                                                 "ajax":{
                                                    url :"<?php echo base_url()?>ordermanage/order/todayallorder", // json datasource
                                                    type: "post"  // type of method  ,GET/POST/DELETE
                                                  },
                                            "footerCallback": function ( row, data, start, end, display ) {
                                            var api = this.api(), data;
                                 
                                            // Remove the formatting to get integer data for summation
                                            var intVal = function ( i ) {
                                                return typeof i === 'string' ?
                                                    i.replace(/[\$,]/g, '')*1 :
                                                    typeof i === 'number' ?
                                                        i : 0;
                                            };
                                 
                                            // Total over all pages
                                            total = api
                                                .column( 7 )
                                                .data()
                                                .reduce( function (a, b) {
                                                    return intVal(a) + intVal(b);
                                                }, 0 );
                                 
                                            // Total over this page
                                            pageTotal = api
                                                .column( 7, { page: 'current'} )
                                                .data()
                                                .reduce( function (a, b) {
                                                    return intVal(a) + intVal(b);
                                                }, 0 );
                                            var pageTotal = pageTotal.toFixed(2); 
                                            var total = total.toFixed(2); 
                                            // Update footer
                                            $( api.column( 7 ).footer() ).html(
                                                pageTotal +' ( '+ total +' total)'
                                            );
                                        }
                                            });
                                });
            
                                </script>