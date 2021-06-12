    <section class="item_cart only-sm mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="mycartlist">
                    <h6 class="cart_heading" style="margin-bottom:0;">View Order</h6>
                    <p style="margin-bottom:15px;">Bill ID: <?php echo $orderinfo->order_id?>,<span class="float-right">Bill Date:<?php echo $orderinfo->order_date?></span></p>
                    <ul class="list-unstyled cart_list">
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
                        <li>
                            <h6><?php echo $item->ProductName;?><span>(<?php if($currency->position==1){echo $currency->curr_icon;}?><?php echo $item->price;?><?php if($currency->position==2){echo $currency->curr_icon;}
								if(!empty($item->add_on_id)){
											echo "+";
											 if($currency->position==1){echo $currency->curr_icon;}
												$y=0;
											$alladonsprice=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->hungry_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$alladonsprice=$alladonsprice+$adonsinfo->price;
													$y++;
											}
											echo $alladonsprice;
											 if($currency->position==2){echo $currency->curr_icon;}
											}
										?>)</span></h6>
                            <div class="d-flex">
                                <div class="cart_counter d-flex">                                    
                                        <input type="text" name="qty" id="sst3" maxlength="12" value="<?php echo $item->menuqty;?>" title="Quantity:" class="input-text qty">                                       
                                </div>                                
                            </div>
                        </li>
                         <?php } 
                          $itemtotal=$totalamount+$subtotal;
						  $calvat=$itemtotal*$storeinfo->vat/100;
                         ?> 
                        <li>
                            <h6>Sub Total</h6>
                            <p><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo  $itemtotal;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></p>
                        </li>
                    </ul>
                   
                    
                        <ul class="list-unstyled cart_list">
                    	<li><h6>Vat</h6>
                        <p><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat=$billinfo->VAT; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></p>
                        </li>
                        <li><h6>Discount</h6>
                        <p><?php if($currency->position==1){echo $currency->curr_icon;}?>  <?php $discount=0; if(empty($billinfo)){ echo $discount;} else{echo $discount=$billinfo->discount;} ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></p>
                        </li>
                        <li><h6>Total</h6>
                        <p><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat+$itemtotal+$servicecharge-$discount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
