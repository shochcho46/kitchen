
<!-- jquery-ui --> 
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap tag input-->
<script src="<?php echo base_url('assets/js/bootstrap-tagsinput.js') ?>" type="text/javascript"></script>
<!-- lobipanel -->
<script src="<?php echo base_url('assets/js/lobipanel.min.js') ?>" type="text/javascript"></script>
<!-- Pace js -->
<script src="<?php echo base_url('assets/js/pace.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/js/fastclick.min.js') ?>" type="text/javascript"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/js/select2.min.js') ?>" type="text/javascript"></script>
<!-- bootstrap timepicker -->
<script src="<?php echo base_url('assets/js/jquery-ui-sliderAccess.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery-ui-timepicker-addon.min.js') ?>" type="text/javascript"></script>
<!-- tinymce js -->
<script src="<?php echo base_url('assets/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<!-- dataTables js -->
<script src="<?php echo base_url('assets/datatables/js/dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.colVis.min.js') ?>" type="text/javascript"></script>

<!-- AdminBD frame -->
<script src="<?php echo base_url('assets/js/frame.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.confirm.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/fontawesome-iconpicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/toastr/toastr.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/pusher.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/mousetrap-master/mousetrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/print.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/masonry-package.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/images.loaded.js') ?>" type="text/javascript"></script>
<!-- End Core Plugins -->

<!-- Dashboard js -->
<script src="<?php echo base_url('assets/js/dashboard.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/ordermanage/order/showljslang') ?>" type="text/javascript"></script>
<!-- End Theme label Script-->
<script>
var baseurl='<?php echo base_url(); ?>';
$(document).ready(function () {
$(document).on('click', '.sa-clicon', function(){
 swal.close();
 });
$(document).on('click', '.onprocessg', function(){
  var datavalue = 'onprocess=1';
  $.ajax({
	type: "POST",
	url: "<?php echo base_url()?>ordermanage/order/onprocessajax",
	data: datavalue,
	success: function(data){
		$("#onprocesslist").html(data);
		}
	});
 });	    
var todayorderlist=$('#onprocessing').DataTable({ 
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
$(document).on('click', '.todlist', function(){
  todayorderlist.ajax.reload();
  //load_unseen_notification();
 });
var onlineoredrlist=$('#Onlineorder').DataTable({ 
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
					url :"<?php echo base_url()?>ordermanage/order/onlinellorder", // json datasource
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

                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 			var pageTotal = pageTotal.toFixed(2); 
 			var total = total.toFixed(2); 
            // Update footer
            $( api.column( 8 ).footer() ).html(
                pageTotal +' ( '+ total +' total)'
            );
        }
    		});


			
$(document).on('click', '.seelist', function(){
  onlineoredrlist.ajax.reload();
  //load_unseen_notification();
 });
var qroredrlist=$('#myqrorder').DataTable({ 
        responsive: true, 
        paging: true,
        dom: 'Bfrtip',
        "createdRow": function ( row, data, index ) {
                       // $('td', row).eq(10).addClass("hidetd");
						if( data[10] == 1 ){
                                $(row).css('background-color', '#e5cc34c4');
                            }
						else{
                                $(row).css('background-color', '#ffffff');
                            }
                    },
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
					url :"<?php echo base_url()?>qrapp/qrmodule/allqrorder", // json datasource
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
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 			var pageTotal = pageTotal.toFixed(2); 
 			var total = total.toFixed(2); 
            // Update footer
            $( api.column( 8 ).footer() ).html(
                pageTotal +' ( '+ total +' total)'
            );
        }
    		});
$(document).on('click', '#todayqrorder', function(){
	//$("#qrorder").empty();
  qroredrlist.ajax.reload();
  //alert("HI");
  //load_unseen_notification();
 });
$(document).on('click', '#cancelreason', function(){ 
				$("#cancelord").modal('hide');
				var ordid=$("#mycanorder").val();
				var reason=$("#canreason").val();
				var dataString = 'status=1&onprocesstab=1&acceptreject=0&reason='+reason+'&orderid='+ordid;
				$.ajax({
						type: "POST",
						url: "<?php echo base_url()?>ordermanage/order/acceptnotify",
						data: dataString,
						success: function(data){
							$("#onprocesslist").html(data);
							//$("#canreason").('');
							conlose.log(prevsltab);
							swal("Rejected", "Your Order is Cancel", "success");
							prevsltab.trigger('click');
							load_unseen_notification();
							//onlineoredrlist.ajax.reload();
							//$("#cancelicon_"+ordid).hide(); 
							//$("#accepticon_"+ordid).hide();
							 
						}
					});
			});
$(document).on('click', '.aceptorcancel', function(){ 
				var ordid= $(this).attr("data-id");//$("#aceptorcancelordid").val();
				swal({
			title: "Order Confirmation",
			text: "Are You Accept Or Reject this Order??",
			type: "success",			
			showCancelButton: true,			
			confirmButtonColor: "#28a745",
			confirmButtonText: "Accept",
			cancelButtonText: "Reject",
			closeOnConfirm: false,
			closeOnCancel: true,
			showCloseButton: true,
		},
		   function (isConfirm) {
			if (isConfirm) {
				var dataString = 'status=1&acceptreject=1&reason=&orderid='+ordid;
					 $.ajax({
							type: "POST",
							url: "<?php echo base_url()?>ordermanage/order/acceptnotify",
							data: dataString,
							success: function(data){
								swal("Accepted", "Your Order is Accepted", "success");
								prevsltab.trigger('click');
								conlose.log(prevsltab);
								//onlineoredrlist.ajax.reload();
								 load_unseen_notification();
								 
								//$("#accepticon_"+ordid).hide();
							}
						});
			} else {
				$("#cancelord").modal('show');
				$("#canordid").html(ordid);
				$("#mycanorder").val(ordid);
				    
			}
		});
			});
$(document).on('click', '.cancelorder', function(){ 
				var ordid= $(this).attr("data-id");//$("#aceptorcancelordid").val();
				$("#cancelord").modal('show');
				$("#canordid").html(ordid);
				$("#mycanorder").val(ordid);
			});  
var allsalesreport=$('#myslreportsf').DataTable({ 
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
					url :"<?php echo base_url()?>report/reports/allsellrpt", // json datasource
					type: "post",
					"data": function ( data ) {
						data.ctypeoption = $('#ctypeoption').val();
						data.status = $('#status').val();
						data.date_fr = $('#from_date').val();
						data.date_to = $('#to_date').val();
					},
					dataSrc: function ( data ) {
           				TotalCardPayment = data.cardpayments;
						 OnlinePayment = data.Onlinepayment;
						 CashPayment = data.Cashpayment;
           				return data.data;
        			 } 
				  },
		drawCallback: function( settings ) {
        var api = this.api();
 
        $( api.column(0).footer() ).html(
          'Total Card Payments: '+TotalCardPayment+'<br/>  Total Online Payments: '+OnlinePayment+'<br/>  Total Cash Payments: '+CashPayment
            );
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
			//discount
			 totaldiscount = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            discountTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			var discountTotal = discountTotal.toFixed(2); 
 			var totaldiscount = totaldiscount.toFixed(2); 
			//thirdparty
			totalcommision = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            commisionTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			var commisionTotal = commisionTotal.toFixed(2); 
 			var totalcommision = totalcommision.toFixed(2);
			//Total Amount	
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
			$( api.column( 5 ).footer() ).html(
                discountTotal +' ( '+ totaldiscount +' total)'
            );
			$( api.column( 6 ).footer() ).html(
                commisionTotal +' ( '+ totalcommision +' total)'
            );
            $( api.column( 7 ).footer() ).html(
                pageTotal +' ( '+ total +' total)'
            );
        }
    		});
			
$('#mysreport').click(function(){ 
				allsalesreport.ajax.reload();  
			});

var allsalesreportgt=$('#myslreportsf2').DataTable({ 
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
					url :"<?php echo base_url()?>report/reports/allsellgtrpt", // json datasource
					type: "post",
					"data": function ( data ) {
						data.ctypeoption = $('#ctypeoption').val();
						data.status = $('#status').val();
						data.date_fr = $('#from_date').val();
						data.date_to = $('#to_date').val();
					},
					dataSrc: function ( data ) {
           				TotalCardPayment = data.cardpayments;
						 OnlinePayment = data.Onlinepayment;
						 CashPayment = data.Cashpayment;
           				return data.data;
        			 } 
				  },
		drawCallback: function( settings ) {
        var api = this.api();
 
        $( api.column(0).footer() ).html(
          'Total Card Payments: '+TotalCardPayment+'<br/>  Total Online Payments: '+OnlinePayment+'<br/>  Total Cash Payments: '+CashPayment
            );
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
			//discount
			 totaldiscount = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            discountTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			var discountTotal = discountTotal.toFixed(2); 
 			var totaldiscount = totaldiscount.toFixed(2); 
			//thirdparty
			totalcommision = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            commisionTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			var commisionTotal = commisionTotal.toFixed(2); 
 			var totalcommision = totalcommision.toFixed(2);
			//Total Amount	
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
			$( api.column( 5 ).footer() ).html(
                discountTotal +' ( '+ totaldiscount +' total)'
            );
			$( api.column( 6 ).footer() ).html(
                commisionTotal +' ( '+ totalcommision +' total)'
            );
            $( api.column( 7 ).footer() ).html(
                pageTotal +' ( '+ total +' total)'
            );
        }
    		});
$('#mysreport2').click(function(){ 
				allsalesreportgt.ajax.reload();  
			});
	});


	 $('.social-icon').iconpicker();
	  function load_unseen_reservation(view = ''){
  $.ajax({
   url: "<?php echo base_url()?>reservation/reservation/notification",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    if(data.unseen_reservation > 0){
     $('.reservenotif').html(data.unseen_reservation);
    }
   }
  });
 }
	  load_unseen_reservation();
	 setInterval(function(){ 
	  load_unseen_reservation(); 
	 }, 1000);
</script>
<script>
                        $('#fullscreen').on('click', function () {
                            $('.pe-7s-expand1').toggleClass('fullscreen-active');
                        });
                        //Fullscreen API
                        $(function () {
                            var requestFullscreen = function (ele) {
                                if (ele.requestFullscreen) {
                                    ele.requestFullscreen();
                                } else if (ele.webkitRequestFullscreen) {
                                    ele.webkitRequestFullscreen();
                                } else if (ele.mozRequestFullScreen) {
                                    ele.mozRequestFullScreen();
                                } else if (ele.msRequestFullscreen) {
                                    ele.msRequestFullscreen();
                                } else {
                                    console.log("Fullscreen API is not supported.");
                                }
                            };
                            var exitFullscreen = function () {
                                if (document.exitFullscreen) {
                                    document.exitFullscreen();
                                } else if (document.webkitExitFullscreen) {
                                    document.webkitExitFullscreen();
                                } else if (document.mozCancelFullScreen) {
                                    document.mozCancelFullScreen();
                                } else if (document.msExitFullscreen) {
                                    document.msExitFullscreen();
                                } else {
                                    console.log("Fullscreen API is not supported.");
                                }
                            };

                            var fsDocButton = document.getElementById("fullscreen");
                            var fsExitDocButton = document.getElementById("fullscreen");

                            fsDocButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                requestFullscreen(document.documentElement);
                            });

                            fsExitDocButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                exitFullscreen();
                            });
                        });
		$(function() {

        var $container = $('.grid');
        $container.imagesLoaded(function() {
            $container.masonry({
                itemSelector: '.grid-col',
                columnWidth: '.grid-sizer',
                percentPosition: true
            });
        });

        //Reinitialize masonry inside each panel after the relative tab link is clicked - 
        $('a[data-toggle=tab]').each(function() {
            var $this = $(this);

            $this.on('shown.bs.tab', function() {

                $container.imagesLoaded(function() {
                    $container.masonry({
                        itemSelector: '.grid-col',
                        columnWidth: '.grid-sizer',
                        percentPosition: true
                    });
                });

            }); //end shown
        }); //end each

    });

    $(function() {
        $(".selectall").click(function() {
            $(this).parent().parent().siblings().find(".individual").prop("checked", $(this).prop("checked"));
        });
    });
		$('#respritbl').DataTable({ 
        responsive: true, 
        paging: true,
        dom: 'Bfrtip', 
        "lengthMenu": [[ 25, 50, 100, 150, 200, 500, -1], [ 25, 50, 100, 150, 200, 500, "All"]], 
        buttons: [  
            {extend: 'copy', className: 'btn-sm',footer: true}, 
            {extend: 'csv', title: 'Report', className: 'btn-sm',footer: true}, 
            {extend: 'excel', title: 'Report', className: 'btn-sm', title: 'exportTitle',footer: true}, 
            {extend: 'pdf', title: 'Report', className: 'btn-sm',footer: true}, 
            {extend: 'print', className: 'btn-sm',footer: true},
			{extend: 'colvis', className: 'btn-sm',footer: true}  
        ],
		"searching": true,
		  "processing": true
    		});
          var languagelist=$('#langtab').DataTable({ 
        responsive: true, 
        paging: true,
         dom: 'Bfrtip', 
        "lengthMenu": [[ 25, 50, 100, 150, 200, 500, -1], [ 25, 50, 100, 150, 200, 500, "All"]], 
        buttons: [  ],
		"searching": true,
		  "processing": true,
            "serverSide": true,
				 "ajax":{
					url :"<?php echo base_url()?>setting/language/searchlang/<?php echo $this->uri->segment(4)?>", // json datasource
					type: "post",
					"data": function ( data ) {
						
					}
					
				  },
				  "oSearch": {
            "bSmart": false, 
            "bRegex": true,
            "sSearch": ""                
        }
    		}); 
        </script>

<!-- Include module Script -->
<?php
    $path = 'application/modules/';
    $map  = directory_map($path);
    if (is_array($map) && sizeof($map) > 0)
    foreach ($map as $key => $value) {
        $js   = str_replace("\\", '/', $path.$key.'assets/js/script.js'); 
        if (file_exists($js)) {
           echo "<script src=".base_url($js)."?v=1.4 type=\"text/javascript\"></script>";
        }   
    }   
?>
