<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
	document.body.style.marginTop="0px";
	$("#myslreportsf_filter").hide();
	$(".dt-buttons btn-group").hide();
	$("#myslreportsf_info").hide();
	$("#myslreportsf_paginate").hide();
    window.print();
    document.body.innerHTML = originalContents;
}


</script>
<style type="text/css">
ul.dt-button-collection.dropdown-menu {
	z-index:99999;
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
		                        <label class="" for="discount"><?php echo "Type"; ?></label>
                                 <?php echo form_dropdown('ctypeoption',$ctypeoption,'','class="postform resizeselect form-control" id="ctypeoption"') ?>
		                    </div>
                            <div class="form-group">
		                        <label class="" for="status"><?php echo "Status"; ?></label>
                                <select name="status" class="postform resizeselect form-control" id="status">
                                <option value="" selected="selected">Select Status</option>
                                <option value="1">Paid</option>
                                <option value="0">Unpaid</option>
                                </select>
		                    </div>  
 							<a id="mysreport2" style="padding: 5px;" class="btn btn-success"><?php echo display('search') ?></a>
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
								<table class="table table-bordered table-striped table-hover" id="myslreportsf2">
			                        <thead>
										<tr>
											<th><?php echo "Sale Date"; ?></th>
                                            <th><?php echo "Invoice No."; ?></th>
											<th><?php echo "Member ID"; ?></th>
                                            <th><?php echo "Waiter"; ?></th>
                                            <th><?php echo "Sales Type"; ?></th>
                                            <th><?php echo "Total Discount"; ?></th>
                                            <th><?php echo "Thirdparty Commission"; ?></th>
											<th><?php echo display('total_ammount'); ?></th>
										</tr>
									</thead>
									<tbody>
									
									</tbody>
									<tfoot>
										<tr>
                                        	<th colspan="4" style="text-align:center"></th>
                                            <th style="text-align:right">Total:</th>
                                            <th style="text-align:center"></th>
                                            <th style="text-align:center"></th>
                                            <th style="text-align:center"></th>
                                        </tr>
									</tfoot>
			                    </table>
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
