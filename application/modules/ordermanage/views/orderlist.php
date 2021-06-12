<div id="cancelord" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong>Order Cancel</strong>
            </div>
            <div class="modal-body">
            	<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                        <div class="form-group row">
                            <label for="payments" class="col-sm-4 col-form-label">Order ID </label>
                            <div class="col-sm-7 customesl">
                            	<span id="canordid"></span>
                                <input name="mycanorder" id="mycanorder" type="hidden" value=""  />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="canreason" class="col-sm-4 col-form-label">Cancel Reason</label>
                            <div class="col-sm-7 customesl">
                            	  <textarea name="canreason" id="canreason" cols="35" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                        	<div class="col-sm-11" style="padding-right:0;">
                            <button type="button" class="btn btn-success w-md m-b-5" id="cancelreason">Submit</button>
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
 <div id="payprint_marge" class="modal fade  bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg" id="modal-ajaxview">
 
        </div>

    </div>
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo $title; ?></legend>
                    </fieldset>
					<div class="row">
                             <div class="col-sm-12" id="findfood">
                                <table class="table datatable2 table-fixed table-bordered table-hover bg-white" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center"><?php echo display('sl')?> </th>
                                            <th class="text-center"><?php echo display('customer_name');?></th>
                                            <th class="text-center"><?php echo display('waiter');?></th> 
                                            <th class="text-center"><?php echo display('table');?></th>
                                            <th class="text-center"><?php echo display('state');?></th> 
                                            <th class="text-center"><?php echo display('ordate');?></th>
                                            <th class="text-right"><?php echo display('amount');?></th>
                                            <th class="text-center"><?php echo display('action');?></th>  
                                        </tr>
                                </thead>
                                <tbody>
                                <?php $i=0;
								foreach($iteminfo as $item){
									$i++;
									?>
                                	<tr>
                                    	<td class="text-center"><?php echo $pagenum+$i;?></td>
                                        <!--<td class="text-center"><?php //echo $item->order_id;?></td>-->
                                        <td class="text-center"><?php echo $item->customer_name;?></td>
                                        <!--<td class="text-center"><?php //echo $item->customer_type;?></td>-->
                                        <td class="text-center"><?php echo $item->first_name.' '.$item->last_name;?></td>
                                        <td class="text-center"><?php echo $item->tablename;?></td>
                                        <td class="text-center">
                                        <?php if($item->order_status==1){echo "Pending";}
										if($item->order_status==2){echo "Processing";}
										if($item->order_status==3){echo "Ready";}
										if($item->order_status==4){echo "Served";}
										if($item->order_status==5){echo "Cancel";}
										 ?>
                                        <!--<select name="status" id="status"  class="form-control">
                                                                <option value="1" <?php if($item->order_status==1){echo "Selected";} ?>>Pending</option>
                                                                <option value="2" <?php if($item->order_status==2){echo "Selected";} ?>>Processing</option>
                                                                <option value="3" <?php if($item->order_status==3){echo "Selected";} ?>>Ready</option>
                                                                <option value="4" <?php if($item->order_status==4){echo "Selected";} ?>>Served</option>
                                                                <option value="5" <?php if($item->order_status==5){echo "Selected";} ?>>Cancel</option>
                                                              </select>-->
										<!--&nbsp;<input type="button" class="btn btn-primary" value="Update" onclick="noteCheck(<?php //echo $item->order_id;?>);">--></td>
                                         <td class="text-center"><?php $originalDate = $item->order_date;
											echo $newDate = date("d-M-Y", strtotime($originalDate));?></td>
                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->totalamount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                    	<td class="text-center">
                                         <?php if($this->permission->method('ordermanage','update')->access()): ?>
                                        <a href="<?php echo base_url("ordermanage/order/orderdetails/$item->order_id") ?>" class=" btn btn-xs btn-info  btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                         <?php endif; ?>
                                         
                                         <?php if($this->permission->method('ordermanage','read')->access()): ?>
                                         <?php if(($item->order_status==1 || $item->order_status==2 || $item->order_status==3) && ($item->orderacceptreject!=1)){?>
                                          <a href="javascript:;" data-id="<?php echo $item->order_id;?>" class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-trash-o"></i></a>&nbsp;
                                          <a href="<?php echo base_url("ordermanage/order/otherupdateorder/$item->order_id") ?>" class="btn btn-xs btn-info btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										  <a href="javascript:;" onclick="createMargeorder(<?php echo $item->order_id;?>,1)" id="hidecombtn_<?php echo $item->order_id;?>" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Make Payment"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
										<?php } ?>
                                         <?php endif; ?>
                                         <?php if($this->permission->method('ordermanage','read')->access()): ?>
                                         <a href="javascript:;" onclick="printPosinvoice(<?php echo $item->order_id;?>)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Pos Invoice"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                                         <?php if(!empty($item->marge_order_id)){?><a href="javascript:;" onclick="printmergeinvoice('<?php echo base64_encode($item->marge_order_id);?>')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Merge Invoice"><i class="fa fa-meetup" aria-hidden="true"></i></a><?php } ?>
                                         <?php endif; ?>
                                         
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>
                            <div class="text-right"><?php echo @$links?></div>
                            </div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
<script>
function noteCheck(id){
	 var ordstatus=$("#status").val();
	 var myurl ='<?php echo base_url("ordermanage/order/ajaxupdateoreder/") ?>';
	 var dataString = "orderid="+id+"&status="+ordstatus;
	}
 function printRawHtml(view) {
      printJS({
        printable: view,
        type: 'raw-html',
        
      });
    }
function createMargeorder(orderid,value=null){
    var url = '<?php echo base_url()?>ordermanage/order/showpaymentmodal/'+orderid;
    callback = function(a){
        $("#modal-ajaxview").html(a);
        $('#get-order-flag').val('2');
    };
    if(value == null){
       
    getAjaxModal(url);
    }
    else{
        getAjaxModal(url,callback); 
    }
   }
 function submitmultiplepay(){
            var thisForm = $('#paymodal-multiple-form');
             var inputval = parseFloat(0);
        var maintotalamount = $('#due-amount').text();
        
        $(".number").each(function(){
           var inputdata= parseFloat($(this).val());
            inputval = inputval+inputdata;

        });
        if(inputval<parseFloat(maintotalamount)){
            
            setTimeout(function () {
                toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
                    
        };
        toastr.error("Pay full amount ", 'Error');
        }, 100); 
        return false;
    }
    var formdata = new FormData(thisForm[0]);
  
        $.ajax({
        type: "POST",
        url: "<?php echo base_url()?>ordermanage/order/paymultiple",
        data: formdata,
        processData: false,
        contentType: false,
        success:function(data){
            var value = $('#get-order-flag').val();
            if(value ==1){
                 setTimeout(function () {
                toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
                  
        };
        toastr.success("payment taken successfully", 'Success');
        $('#payprint_marge').modal('hide');
        $(".home").trigger( "click" );


    }, 100); }
                 else{
                    $('#payprint_marge').modal('hide');
					var ordid=$("#get-order-id").val();
                    printRawHtml(data);
                    $("#hidecombtn_"+ordid).hide();
                 }
            
        },
  
    });
    }
 function printPosinvoice(id){
        var url = '<?php echo base_url()?>ordermanage/order/posorderinvoice/'+id;
         $.ajax({
             type: "GET",
             url: url,
             success: function(data) {
              printRawHtml(data);

        }

        });
 }
 function printmergeinvoice(id){
	 var id=atob(id);
        var url = '<?php echo base_url()?>ordermanage/order/checkprint/'+id;
         $.ajax({
             type: "GET",
             url: url,
             success: function(data) {
              printRawHtml(data);

        }

        });
 }
 
</script>