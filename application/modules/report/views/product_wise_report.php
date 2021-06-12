<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Product js php -->
<script src="<?php echo base_url()?>assets/js/product.js.php" ></script>

<!-- Stock report start -->
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
	var productid=$('#SchoolHiddenId').val();
	var from_date=$('#from_date').val();
	var to_date=$('#to_date').val();
	if(productid==''){
		alert("Please select Product");
		return false;
		}
	if(from_date==''){
		alert("Please select from date");
		return false;
		}
	if(to_date==''){
		alert("Please select To date");
		return false;
		}
	var myurl =baseurl+'report/reports/productwisereport';
	    var dataString = "from_date="+from_date+'&to_date='+to_date+'&productid='+productid;
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('#stockproduct').html(data);
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
</script>
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo display('stock_report_product_wise') ?></legend>
                    </fieldset>
                    <div class="row">
			<div class="col-sm-12">
		        <div class="panel panel-default">
		            <div class="panel-body"> 
						<?php echo form_open('',array('class' => 'form-vertical','id' => 'validate' ));?>
						<?php date_default_timezone_set("Asia/Dhaka"); $today = date('m-d-Y'); ?>
                        <div class="form-group row">
                            <label for="product_id" class="col-sm-3 col-form-label"><?php echo display('item_name')?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                               <input name="product_name" onclick="producstList();" class="form-control productSelection" placeholder="<?php echo display('item_name') ?>" id="product_name" required="" aria-required="true" type="text">
							   <input class="autocomplete_hidden_value" name="product_id" id="SchoolHiddenId" type="hidden">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="from_date" class="col-sm-3 col-form-label"><?php echo "From" ?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" id="from_date" name="from_date" value="" class="form-control datepicker" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="to_date" class="col-sm-3 col-form-label"><?php echo "To"; ?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                               <input type="text" id="to_date" name="to_date" value="" class="form-control datepicker" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label"></label>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" onclick="getreport()"><?php echo display('search') ?></button>
	                			<a  class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo "Print"; ?></a>
                            </div>
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
		                    <h4><?php echo display('stock_report_product_wise') ?></h4>
		                </div>
		            </div>
		            <div class="panel-body">
						<div id="printableArea" style="margin-left:2px;">
							<div class="text-center">
								<h3> <?php echo $setting->storename;?> </h3>
								<h4 ><?php echo $setting->address;?> </h4>
								<h4> <?php echo "Print Date" ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>
			                <div class="table-responsive" style="margin-top: 10px;" id="stockproduct">
                            <table id="respritbl" class="table table-bordered table-striped table-hover">
			                        <thead>
										<tr>
											<th class="text-center"><?php echo display('item_name') ?></th>
											<th class="text-center"><?php echo display('in_quantity') ?></th>
											<th class="text-center"><?php echo display('out_quantity') ?></th>
											<th class="text-center"><?php echo display('stock') ?></th>
										</tr>
									</thead>
									<tbody>
                                     <?php foreach($allproduct as $stockinfo){?>
									<tr>
											<td><?php echo $stockinfo['ProductName'];?></td>
                                            <td><?php echo $stockinfo['In_Qnty'];?></td>
                                            <td><?php echo $stockinfo['Out_Qnty'];?></td>
                                            <td><?php echo $stockinfo['Stock'];?></td>
                                    </tr>
                                    <?php } ?>
									</tbody>
									
			                    </table>
			                    
			                </div>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
                </div> 
            </div>
        </div>
    </div>

