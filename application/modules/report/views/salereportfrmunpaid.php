<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
	document.body.style.marginTop="0px";
    window.print();
    document.body.innerHTML = originalContents;
}

function getreport(){
	/*var from_date=$('#from_date').val();
	var to_date=$('#to_date').val();*/
		var memberid=$('#memberid').val();

	/*if(from_date==''){
		alert("Please select from date");
		return false;
		}
	if(to_date==''){
		alert("Please select To date");
		return false;
		}*/
	var myurl =baseurl+'report/reports/<?php echo $view;?>';
	    var dataString = 'memberid='+memberid;
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('#getresult2').html(data);
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
		  "processing": true,
		
    		});
		 } 
	});
	}
function generatereport(){
	var from_date=$('#from_date').val();
	var to_date=$('#to_date').val();
	if(from_date==''){
		alert("Please select from date");
		return false;
		}
	if(to_date==''){
		alert("Please select To date");
		return false;
		}
	var myurl =baseurl+'report/reports/generaterpt';
	    var dataString = "from_date="+from_date+'&to_date='+to_date;
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 //$('#getresult2').html(data);
		 } 
	});
	}
	/*22-09*/

	function createMargeorder(orderid){
    var url = 'showpaymentmodal/'+orderid;

    getAjaxModal(url);
   
    
    }
	
function mergeorderlist(){
	var values = $('input[name="margeorder"]:checked').map(function() {
		  return $(this).val();
		}).get().join(',');
    var dataString = 'orderid='+values;
    	$.ajax({
		   url: "<?php echo base_url()?>ordermanage/order/mergemodal",
		   method:"POST",
		   data: dataString,
		   success:function(data){
			$("#payprint_marge").modal('show');
			$("#modal-ajaxview").html(data);
			$('#get-order-flag').val('2');
		   }
		  });
   }
    $(document).on('click','#add_new_payment_type',function(){
        var orderid = $('#get-order-id').val()
          var url= '<?php echo base_url()?>ordermanage/order/showpaymentmodal/'+orderid+'/1';
         $.ajax({
             type: "GET",
             url: url,
             success: function(data) {
              $('#add_new_payment').append(data);
              var length = $(".number").length;
              $(".number:eq("+(length-1)+")").val(parseFloat($("#pay-amount").text()));
             
        }

        }); 


        });
    $(document).on('click','.close_div',function(){
        
        $(this).parent('div').remove();
        changedueamount();
    });
	  function changedueamount(){
        var inputval = parseFloat(0);
        var maintotalamount = $('#due-amount').text();
        
        $(".number").each(function(){
           var inputdata= parseFloat($(this).val());
            inputval = inputval+inputdata;

        });
       
           restamount=(parseFloat(maintotalamount))-(parseFloat(inputval));
            var changes=restamount.toFixed(2);
            if(changes <=0){
                $("#change-amount").text(Math.abs(changes));
                $("#pay-amount").text(0);
            }
            else{
                $("#change-amount").text(0);
                $("#pay-amount").text(changes);
            }
            
    }
function showhidecard(element){
        var cardtype = $(element).val();
        var data = $(element).closest('div.row').next().find('div.cardarea');
      
            if(cardtype==4){
            $("#isonline").val(0);
            $(element).closest('div.row').next().find('div.cardarea').hide();
            $("#assigncard_terminal").val('');
            $("#assignbank").val('');
            $("#assignlastdigit").val('');
            }
            else if(cardtype==1){
            $("#isonline").val(0);
            $(element).closest('div.row').next().find('div.cardarea').show();
            }
            else{
                $("#isonline").val(1);
                $(element).closest('div.row').next().find('div.cardarea').hide();
                $("#assigncard_terminal").val('');
                $("#assignbank").val('');
                $("#assignlastdigit").val('');
                }
    }
 function printRawHtml(view) {
      printJS({
        printable: view,
        type: 'raw-html',
		onPrintDialogClose: printJobComplete        
      });
    }
function printJobComplete() {
	location.reload();
}
function margeorderconfirmorcancel(){
    var thisForm = $('#paymodal-multiple-form');
    var formdata = new FormData(thisForm[0]);
        $.ajax({
        type: "POST",
        url: "<?php echo base_url()?>ordermanage/order/changeMargeorder",
        data: formdata,
        processData: false,
        contentType: false,
        success:function(data){
            $('#payprint_marge').modal('hide');
			printRawHtml(data);
					
        },
  
    });
    }

    function margeorder(){
        var totaldue = 0;
        $(".marg-check").each(function() {
            
            if ($(this).is(":checked")){
                var id = $(this).val();
               totaldue = parseFloat($('#due-'+id).text())+totaldue;
               
            }
            $('#pay-amount-marg').text(totaldue);
            $('#totalamount_marge').val(totaldue); 
            $('#paidamount_marge').val(totaldue);               
            });
     }

</script>
<style type="text/css">
        @media print {
            a[href]:after {
                content: none !important;
            }
        }
    </style>
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo $title; ?></legend>
                    </fieldset>
                    <div class="row">
			<div class="col-sm-12">
		        <div class="panel panel-default">
		            <div class="panel-body"> 
		                <?php echo form_open('report/index',array('class' => 'form-inline'))?>
		                <?php date_default_timezone_set("Asia/Dhaka"); $today = date('d-m-Y'); ?>
		                    <div class="form-group">
		                        <label class="" for="from_date"><?php echo display('start_date') ?></label>
		                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" readonly="readonly" >
		                    </div> 

		                    <div class="form-group">
		                        <label class="" for="to_date"><?php echo display('end_date') ?></label>
		                        <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo "To"; ?>" value="<?php echo $today?>" readonly="readonly">
		                    </div> 
		                     <div class="form-group">
		                        <label class="" for="to_date"><?php echo display('ordid'); ?></label>
		                        <input type="text" name="memberid" class="form-control" id="memberid" placeholder="<?php echo display('ordid'); ?>" >
		                    </div> 
		                   
		                    <a  class="btn btn-success" onclick="getreport()"><?php echo display('search') ?></a>
                            <!--<a  class="btn btn-success" onclick="generatereport()"><?php //echo "Report Generate"; ?></a>-->
		                    <a  class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo "Print"; ?></a>
		                   </div>
		                  
 							
		               <?php echo form_close()?>
		            </div>
		        </div>
		    </div>
	    </div>
					<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                    <h4><?php echo display('sell_report') ?></h4>
		                </div>
		            </div>
		            <div class="panel-body">
		            	<div id="purchase_div" style="margin-left:2px;">
			            	<div class="text-center">
								<h3> <?php echo $setting->storename;?> </h3>
								<h4><?php echo $setting->address;?> </h4>
								<h4> <?php echo "Print Date" ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>
			                <div class="table-responsive" id="getresult2">
			                    
			                </div>
			            </div>
			            <div class="text-right">
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
                </div> 
            </div>
        </div>
    </div>
    <!-- 22-09 -->
<div id="payprint_marge" class="modal fade  bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg" id="modal-ajaxview">
 
        </div>

    </div>
