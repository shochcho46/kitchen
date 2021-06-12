 <?php $storeinfo=$this->settinginfo;
 $currency=$this->storecurrency;
 ?>
 <style>
 .myinfotable table th{font-size:14px; padding: .25rem;}
 .myinfotable table td{font-size:14px; padding: .25rem;}
 .img-circle {
    border-radius: 50%;
}
 </style>
  <script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
	// document.body.style.marginTop="-45px";
    window.print();
    document.body.innerHTML = originalContents;
}
</script> 
    
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-xl-3 col-md-4 sidebar">
                    <div class="category_choose p-3 mb-3">
                        <div class="card-header">
                                 <div style="text-align: center;"> <img src="<?php echo base_url(!empty($customerinfo->customer_picture)?$customerinfo->customer_picture:'assets/img/icons/default.jpg'); ?>" width="100px;" height="100px;" class="img-circle"></div>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>myprofile" class="accordion-toggle">My Profile</a></h6>
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>myorderlist" class="accordion-toggle">My Order List</a></h6>
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>myoreservationlist" class="accordion-toggle">My Reservation</a></h6>
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>hungry/logout" class="accordion-toggle">Logout</a></h6>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="need_booking py-4 px-3 mb-3 text-center">
                     <?php $help=$this->db->select('*')->from('tbl_widget')->where('widgetid',11)->get()->row();?>
                        <h6 class="mb-3"><?php echo $help->widget_title;?></h6>
                        <div class="need_booking_inner">
                            <?php echo $help->widget_desc;?>
                        </div>
                    </div>
                   
                </div>
                <div class="col-xl-9 col-md-8">
                <div class="col-sm-12 col-md-12 rating-block myinfotable">
					<div class="panel panel-bd">
                <div class="panel-footer text-right">
						<a  class="btn btn-info" onclick="printDiv('printableArea')" title="Print"><span class="fa fa-print"></span>
						</a>
                    </div>
	                <div id="printableArea">
	                    <div class="panel-body">
	                        <div class="row">
	                            <div class="col-xl-6 col-md-6">
	                                <img src="<?php echo base_url();?><?php echo $storeinfo->logo?>" class="img img-responsive" alt="" style="margin-bottom:20px;height: 55px;">
	                                <br>
	                                <span class="label label-success-outline m-r-15 p-10" ><?php echo display('billing_from') ?></span>
	                                <address style="margin-top:10px">
	                                    <strong><?php echo $storeinfo->storename;?></strong><br>
	                                    <?php echo $storeinfo->address;?><br>
	                                    <abbr><?php echo display('mobile') ?>:</abbr> <?php echo $storeinfo->phone;?><br>
	                                    <abbr><?php echo display('email') ?>:</abbr> 
	                                    <?php echo $storeinfo->email;?><br>
	                                </address>
	                            </div>
	                            <div class="col-xl-6 col-md-6 text-right">
	                                <h2 class="m-t-0"><?php echo display('invoice') ?></h2>
	                                <div><?php echo display('invoice_no') ?>: <?php echo $orderinfo->saleinvoice;?></div>
	                                <div class="m-b-15"><?php echo display('billing_date') ?>: <?php echo $orderinfo->order_date;?></div>
	                                <span class="label label-success-outline m-r-15"><strong><?php echo display('billing_to') ?></strong></span>
	                                 <address style="margin-top:10px">  
	                                    <?php echo $customerinfo->customer_name;?><br>
	                                    <abbr><?php echo display('address') ?>:</abbr>
		                                <c style="width: 10px;margin: 0px;padding: 0px;"><?php echo $customerinfo->customer_address;?></c><br>
	                                    <abbr><?php echo display('mobile') ?>:</abbr><?php echo $customerinfo->customer_phone;?></abbr>
	                                    <br>
	                                    <abbr><?php echo display('email') ?>:</abbr><?php echo $customerinfo->customer_email;?>
	                                   
	                                </address>
	                            </div>
	                        </div> <hr>

	                        <div class="table-responsive m-b-20">
	                            <table class="table table-fixed table-bordered table-hover bg-white" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center">Item </th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center" style="width:100px;">Unit Price</th> 
                                            <th class="text-center" style="width:100px;">Qty</th> 
                                            <th class="text-center">Total Price</th> 
                                        </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; 
								  $totalamount=0;
									  $subtotal=0;
									  $total=$orderinfo->totalamount;
									foreach ($iteminfo as $item){
										$i++;
										$itemprice= $item->price*$item->menuqty;
										$discount=0;
										$adonsprice=0;
										if(!empty($item->add_on_id)){
											$addons=explode(",",$item->add_on_id);
											$addonsqty=explode(",",$item->addonsqty);
											$x=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->hungry_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
													$x++;
												}
											$nittotal=$adonsprice;
											$itemprice=$itemprice;
											}
										else{
											$nittotal=0;
											$text='';
											}
									 	 $totalamount=$totalamount+$nittotal;
										 $subtotal=$subtotal+$item->price*$item->menuqty;
									?>
                                    <tr>
                                        <td>
                                     	<?php echo $item->ProductName;?>
                                        </td>
                                        <td>
                                        <?php echo $item->variantName;?>
                                        </td>
                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                        <td class="text-right"><?php echo $item->menuqty;?></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                     </tr>
                                    <?php 
									if(!empty($item->add_on_id)){
										$y=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->hungry_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$y];?>
                                                    <tr>
                                                        <td colspan="2">
                                                        <?php echo $adonsinfo->add_on_name;?>
                                                        </td>
                                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                                        <td class="text-right"><?php echo $addonsqty[$y];?></td>
                                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price*$addonsqty[$y];?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                                     </tr>
									<?php $y++;
												}
										 }
									}
									 $itemtotal=$totalamount+$subtotal;
									 $calvat=$itemtotal*$storeinfo->vat/100;
									 ?>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong>Subtotal</strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemtotal;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong>Discount</strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?>  <?php $discount=0; if(empty($billinfo)){ echo $discount;} else{echo $discount=$billinfo->discount;} ?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong>Service Charge</strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php $servicecharge=0; if(empty($billinfo)){ echo $servicecharge;} else{echo $servicecharge=$billinfo->service_charge;} ?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong>Vat</strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat=$billinfo->VAT; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong>Grand Total</strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat+$itemtotal+$servicecharge-$discount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>
	                        </div>
	                    </div>
	                </div>

                     
                </div>  

</div>
                </div>
                
            </div>
        </div>
    
   