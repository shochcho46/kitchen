       
    <form class="navbar-search" id="paymodal-multiple-form" method="get" action="" >
       <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('sl_payment');?></strong>
            </div>
            <div class="modal-body">
                <div class="row">
        <div class="panel">
            <div class="panel-body">
			<?php 
	   if($ismerge==1){?>
		  <table class="table table-fixed table-bordered table-hover bg-white"  style="width:100%;">
                                    <thead>
                                         <tr>
                                               <th class="text-center"><?php echo display('sl');?>. </th>
                                                <th class="text-center"><?php echo display('ord_num');?> </th>
                                                <th class="text-center"><?php echo display('total_amount');?></th>
                                                <th class="text-center">Paid Amount</th> 
                                                <th class="text-center">Due</th> 
                                                  
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $totaldue =0;
										$totalamount=0;
                                            foreach ($order_info as $order) {
												$totalamount=$order->totalamount+$totalamount;
                                                ?>
                                                <tr>
                                                    <td> <input class="marg-check" type="checkbox" value="<?php echo $order->order_id; ?>" onclick="margeorder()" name="order[]" checked ></td>   
                                                <td><?php echo $order->order_id; ?></td>
                                                <td class="text-right"><?php echo $order->totalamount; ?></td>
                                                 <td class="text-right"><?php echo $order->customerpaid; ?></td>
                                                  <td class="text-right" id="due-<?php echo $order->order_id; ?>">
												  <?php echo $order->totalamount-$order->customerpaid; 
                                                  $totaldue = $totaldue+($order->totalamount-$order->customerpaid)
                                                  ?></td>
                                            </tr>
                                                <?php
                                            }
                                        ?>
                                    
                                    </tbody>
                                  
                                </table> 
		 <?php }
		else{
			       $totaldue = ($order_info->totalamount - $order_info->customerpaid);
				   $totalamount=$order_info->totalamount;

			}
       ?>
       
           
           
                  <div class="col-md-8 row ">
                    <div class="row no-gutters">
                        <div class="form-group col-md-6">
                            <label for="payments" class="col-form-label pb-2"><?php echo display('paymd');?></label>
                           
                                 <?php $card_type=4;
                                  echo form_dropdown('paytype[]',$paymentmethod,(!empty($card_type)?$card_type:null),'class="card_typesl postform resizeselect form-control " onchange="showhidecard(this)"') ?>
                          
                        </div>
                       
                       
                        <div class="form-group col-md-6">
                            <label for="4digit" class="col-form-label pb-2"><?php echo display('cuspayment');?></label>
                            
                                  <input type="number" id="paidamount_marge"  class="form-control number"  name="paidamount[]" value="<?php echo $totaldue; ?>" onkeyup="changedueamount()"  placeholder="0" onclick="givefocus(this)" />
                          
                        </div>
                    </div>
                    <div class="row no-gutters">
                         <div class="cardarea w-100 no-gutters" style="display:none;" >
                        <div class="form-group col-md-6">
                            <label for="card_terminal" class="col-form-label"><?php echo display('crd_terminal');?></label>
                          
                                 <?php echo form_dropdown('card_terminal[]',$terminalist,'','class="postform resizeselect form-control" ') ?>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank" class="col-form-label"><?php echo display('sl_bank');?></label>
                          
                                 <?php echo form_dropdown('bank[]',$banklist,'','class="postform resizeselect form-control" ') ?>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="4digit" class="col-form-label"><?php echo display('lstdigit');?></label>
                           
                                  <input type="text" class="form-control"  name="last4digit[]" value="" />
                            
                        </div>
                       </div>
                        </div>
                         <div class="row col-md-12 m-0" id="add_new_payment" >
                             
                     </div>
                         <div class="form-group text-right">
                            <div class="col-sm-12" style="padding-right:0;">
                            <button type="button" id="add_new_payment_type" class="btn btn-success w-md m-b-5" ><?php echo display('add_new_payment_type');?></button>
                            </div>
                        </div>
                       
                     
                     </div>
                     <div class="col-md-4">
                        <table class="table table-fixed table-bordered table-hover bg-white"  style="width:100%;">
                            <tr>
                                <td>
                                    Total Amount
                                </td>
                                <td id="totalamount_marge">
                                    <?php echo $totalamount; ?>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    Total Due
                                </td>
                                <td id="due-amount">
                                    <?php echo $totaldue; ?>
                                </td>
                                </tr>
                                <tr>
                                 <td>
                                    Payable amout 
                                </td>
                                <td id="pay-amount" >
                                    0
                                </td>
                            </tr>
                            <tr>
                                 <td>
                                    Change Amount 
                                </td>
                                <td  id="change-amount">
                                   
                                </td>
                            </tr>
                                  
                                </table>

                        <div class="grid-container">
                        <input type="button" class="grid-item" name="n1" value="1" onClick="inputNumbersfocus(n1.value)">
                        <input type="button" class="grid-item" name="n2" value="2" onClick="inputNumbersfocus(n2.value)">
                        <input type="button" class="grid-item" name="n3" value="3" onClick="inputNumbersfocus(n3.value)">
                        <input type="button" class="grid-item" name="n4" value="4" onClick="inputNumbersfocus(n4.value)">
                        <input type="button" class="grid-item" name="n5" value="5" onClick="inputNumbersfocus(n5.value)">
                        <input type="button" class="grid-item" name="n6" value="6" onClick="inputNumbersfocus(n6.value)">
                        <input type="button" class="grid-item" name="n7" value="7" onClick="inputNumbersfocus(n7.value)">
                        <input type="button" class="grid-item" name="n8" value="8" onClick="inputNumbersfocus(n8.value)">
                        <input type="button" class="grid-item" name="n9" value="9" onClick="inputNumbersfocus(n9.value)">                         
                        <input type="button" class="grid-item" name="n0" value="0" onClick="inputNumbersfocus(n0.value)"> 
                        <input type="button" class="grid-item" name="n00" value="00" onClick="inputNumbersfocus(n00.value)"> 
                        <input type="button" class="grid-item" name="c0" value="C" placeholder="0" onClick="inputNumbersfocus(c0.value)">   
                       
                        </div>
                       
                        <div class="form-group text-right mt-3">
                            <div class="col-sm-12" style="padding-right:0; margin-top:15px;">
                            <?php  if($ismerge==1){?>
                            <button type="button" id="paidbill" class="btn btn-success w-md m-b-5" onclick="margeorderconfirmorcancel()"><?php echo display('pay_print');?></button>
							<?php }
							else{
							?>
                            <button type="button" class="btn btn-success w-md m-b-5" id="pay_bill" onfocus="submitmultiplepay()"><?php echo display('pay_print');?></button>
                            <input type="hidden" id="get-order-id" name="orderid" value="<?php echo $order_info->order_id; ?>">
                            <?php }?>
                            </div>
                        </div>
                   
                      
                            
                     </div>

                          
                    
                     
                </div>  
            </div>
        </div>
    </div>
</div>
     
    </form>      
    <input type="hidden" id="get-order-flag" value="1">
            <script type="text/javascript">
                $(document).ready(function () {
    "use strict";
    // select 2 dropdown 
    $("select.form-control:not(.dont-select-me)").select2({
        placeholder: "Select option",
        allowClear: true
    });
});

 function changedue(){
		var main=$("#totalamount_marge").val();
		var paid=$("#paidamount_marge").val();
		var change=main-paid;
		$("#change").val(Math.round(change));
	}

            </script>