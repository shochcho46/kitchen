 					<?php $totalqty=0;
if($this->cart->contents()>0){ $totalqty= count($this->cart->contents());} ;?>
                    <input name="totalitem" type="hidden" id="totalitem" value="<?php echo $totalqty;?>" />
					<?php 
					$calvat=0;
					$discount=0;
					$itemtotal=0;
					$pvat=0;
					if ($cart = $this->cart->contents()){
						 $i=0; 
								      $totalamount=0;
									  $subtotal=0;
									  $pvat=0;
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
						
                       
                        
                        <li class="cart-content row">
                            <div class="img-box">
                                <img src="<?php echo base_url(!empty($iteminfo->small_thumb)?$iteminfo->small_thumb:'assets/img/no-image.png'); ?>" class="img-fluid" alt="<?php echo $item['name'];?>">
                            </div>
                            <div class="content">
                                <h6><?php echo $item['name'];?></h6>
                                <p><?php echo $item['qty'];?> X <?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $item['price'];?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                            </div>
                            <div class="delete_box">
                                <a onclick="removecart('<?php echo $item['rowid'];?>')" class="serach">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </li>
                         <?php } 
						 $itemtotal=$totalamount+$subtotal;
									if($this->settinginfo->vat>0){
										$calvat=$itemtotal*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
						 ?>
                        <li>
                            <table class="table total-cost">
                                <tbody>
                                    <tr>
                                        <td>sub-total</td>
                                        <td><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $itemtotal;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></td>
                                    </tr>
                                    <tr>
                                        <td>vat</td>
                                        <td><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $calvat;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $discount;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></td>
                                    </tr>
                                    <!--<tr>
                                        <td>Delivery charge (0%)</td>
                                        <td>$5.00</td>
                                    </tr>-->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total</td>
                                        <td><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $calvat+$itemtotal-$discount;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </li>
                        <li class="cart-footer text-right">
                            <div class="checkout-box">
                                <a href="<?php echo base_url();?>hungry/cart" class="simple_btn mt-0">Go To Checkout</a>
                            </div>
                        </li>
                         <?php } 
										  else{
										  ?>  
                                           <li class="cart-header text-center">
                                                <h6>Cart</h6>
                                            </li>
                                           <?php } ?>