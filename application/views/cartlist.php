
<!--==========Shopping cart area==========-->
    <div class="shopping_cart my-5">
        <div class="container">
            <div class="shopping_cart_inner">
                <div class="table-responsive">
                 					<?php $totalqty=0;
if(!empty($this->cart->contents())){ $totalqty= count($this->cart->contents());} ;?>
					<?php 
					$calvat=0;
					$discount=0;
					$itemtotal=0;
					$pvat=0;
					$totalamount=0;
					$subtotal=0;
					if ($cart = $this->cart->contents()){
						 
								      $totalamount=0;
									  $subtotal=0;
									  $pvat=0;
									
									?>
						
                    <table class="table table-bordered text-center mb-0" <?php if($this->settinginfo->site_align=='RTL'){ echo 'dir="rtl"'; }?>> 
                        <thead> 
                            <tr> 
                                <th>Product</th> 
                                <th>Product Title</th> 
                                <th>Quantity</th> 
                                <th>Price</th> 
                                <th>Total</th> 
                                <th>Remove</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                        <?php $i=0; 
						foreach ($cart as $item){
										$itemprice= $item['price']*$item['qty'];
										$iteminfo=$this->hungry_model->getiteminfo($item['pid']);
										$vatcalc=$itemprice*$iteminfo->productvat/100;
										$pvat=$pvat+$vatcalc;
										if($iteminfo->OffersRate>0){
											$discal=$itemprice*$iteminfo->OffersRate/100;
											$discount=$discal+$discount;
											}
										else{
											$discount=$discount;
											}
										if(!empty($item['addonsid'])){
											$nittotal=$item['addontpr'];
											$itemprice=$itemprice+$item['addontpr'];
											}
										else{
											$nittotal=0;
											$itemprice=$itemprice;
											}
										 $totalamount=$totalamount+$nittotal;
										 $subtotal=$subtotal+$item['price']*$item['qty'];
									$i++;
									?>
                            <tr> 
                                <td class="cart_image"><img src="<?php echo base_url(!empty($iteminfo->small_thumb)?$iteminfo->small_thumb:'assets/img/no-image.png'); ?>" class="img-fluid" alt="<?php echo $item['name'];?>"></td> 
                                <td><?php echo $item['name'];
                                if(!empty($item['addonsid'])){
											echo "<br>";
											echo $item['addonname'].' -Qty:'.$item['addonsqty'];
											}?>
                                </td> 
                                <td>
                                    <div class="cart_counter">
                                        <button onclick="updatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'del')" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" name="qty" id="sst3" maxlength="12" value="<?php echo $item['qty'];?>" title="Quantity:" class="input-text qty">
                                        <button onclick="updatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'add')" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td> 
                                <td><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $item['price'];?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}
								if(!empty($item['addonsid'])){
											echo "<br>";
											if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}
											echo $item['addontpr'];
											if($this->storecurrency->position=2){echo $this->storecurrency->curr_icon;}
											}
										?>
                                </td> 
                                <td><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $itemprice;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></td> 
                                <td>
                                    <a class="serach" onclick="removetocart('<?php echo $item['rowid']?>')">
                                        <i class="ti-close" aria-hidden="true"></i>
                                    </a>
                                </td> 
                            </tr> 
                            <?php } ?> 
                        </tbody> 
                    </table> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--End Shopping cart area-->
    
    <!--Start Calculate Content-->
    <div class="calculate-content my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                &nbsp;
                    <div class="shipping-form">
                        <h2>Select Shipping</h2>
                        <div class="payment-block" id="payment">
                        <?php foreach($shippinginfo as $shipment){?>
                            <div class="payment-item">
                                <input type="radio" name="payment_method" id="payment_method_cre" data-parent="#payment" data-target="#description_cre" value="<?php echo $shipment->shippingrate;?>" required="" class="" onchange="getcheckbox('<?php echo $shipment->shippingrate;?>','<?php echo $shipment->shipping_method;?>');">
                                <label for="payment_method_cre"> <?php echo $shipment->shipping_method;?> - <?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $shipment->shippingrate;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.End of shipping form -->
                </div>
                <div class="col-sm-4">
                    <div class="coupon-form">
                        <h2>Coupon Code</h2>
                        <p>Enter your coupon code if you have one.</p>
                        <form class="coupon" action="<?php echo base_url("checkcoupon") ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="couponcode" name="couponcode" placeholder="Enter your coupon code.." required>
                            </div>
                            <input name="coupon" class="btn" type="submit" value="Apply coupon" />
                        </form>
                    </div>
                    <!-- /.End of coupon -->
                </div>
                <?php if(!empty($this->cart->contents())){
					$itemtotal=$totalamount+$subtotal;
									if($this->settinginfo->vat>0){
										$calvat=$itemtotal*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
					?>
                <div class="col-sm-4">
                    <div class="cart-totals">
                        <h2>Cart Totals</h2>
                        <div class="cart-totals-border my-4 p-4">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value" id="cart-subtotal"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><span id="subtotal"><?php echo $itemtotal;?></span><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></div>
                            </div>
                            <div class="totals-item">
                                <label>Vat </label>
                                <div class="totals-value" id="cart-tax"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><span id="vat"><?php echo $calvat;?></span><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></div>
                            </div>
                            <div class="totals-item">
                                <label>Discount</label>
                                <div class="totals-value" id="Discount-charge"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><span id="discount"><?php echo $discount;?></span><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></div>
                            </div>
                            <?php $coupon=0;
							if(!empty($this->session->userdata('couponcode'))){?>
                            <div class="totals-item">
                                <label>Coupon Discount</label>
                                <div class="totals-value" id="coupDiscount-charge"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><span id="coupdiscount"><?php echo $coupon=$this->session->userdata('couponprice');?></span><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></div>
                            </div>
                            <?php }
							else{
							 ?>
                             <span id="coupdiscount" style="display:none;">0</span>
                             <?php } 
							 
							 ?>
                            <div class="totals-item">
                                <label>Service charge</label>
                                <div class="totals-value" id="Service"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><span id="scharge"><?php echo "0";?></span><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?> <input name="servicecharge" type="hidden" value="0" id="getscharge" /> <input name="servicename" type="hidden" value="" id="servicename" /></div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                <div class="totals-value" id="gtotal"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><span id="grtotal"><?php echo ($calvat+$itemtotal)-($discount+$coupon);?></span><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></div>
                            </div>
                        </div>
                        <a onclick="gotocheckout()" class="checkout serach">Proceed to checkout</a>
                    </div>
                    <!-- /.End of cart totals -->
                </div>
                
                <?php } ?>
            </div>
        </div>
    </div>
    <!--End Calculate Content-->