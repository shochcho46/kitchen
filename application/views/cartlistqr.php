<h6 class="cart_heading">Cart List</h6>
                    <?php $totalqty=0;
if(!empty($this->cart->contents())){ $totalqty= count($this->cart->contents());} ;?>
					<?php 
					$calvat=0;
					$discount=0;
					$itemtotal=0;
					$pvat=0;
					$totalamount=0;
					$subtotal=0;
					if($cart = $this->cart->contents()){
						 
								      $totalamount=0;
									  $subtotal=0;
									  $pvat=0;
									
									?>
                    <ul class="list-unstyled cart_list">
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
                        <li>
                            <h6><?php echo $item['name'];
                                if(!empty($item['addonsid'])){
											echo "<br>";
											echo $item['addonname'].' -Qty:'.$item['addonsqty'];
											}?> <span>(<?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $item['price'];?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}
								if(!empty($item['addonsid'])){
											echo "+";
											if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}
											echo $item['addontpr'];
											if($this->storecurrency->position=2){echo $this->storecurrency->curr_icon;}
											}
										?>)</span></h6>
                            <div class="d-flex">
                                <div class="cart_counter d-flex">
                                    <button onclick="updatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'del')" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" name="qty" id="sst3" maxlength="12" value="<?php echo $item['qty'];?>" title="Quantity:" class="input-text qty">
                                        <button onclick="updatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'add')" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                </div>
                                <button class="btn dlt_btn"  onclick="removetocart('<?php echo $item['rowid']?>')"><i class="fa fa-trash"></i></button>
                            </div>
                        </li>
                         <?php } ?> 
                        <li>
                            <h6>Total</h6>
                            <p> <?php if(!empty($this->cart->contents())){
					$itemtotal=$totalamount+$subtotal;
									$totalqty=0;
                            $totalamount=0;
							$pvat=0;
							$discount=0;
                            if($this->cart->contents()>0){ 
                            $totalqty= count($this->cart->contents());
							$itemprice=0;
							$pvat=0;
							$discount=0;
							foreach ($this->cart->contents() as $item){
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
											$itemprice=$itemprice+$item['addontpr'];
											}
										else{
											$itemprice=$itemprice;
											}
								 $totalamount=$itemprice+$totalamount;										
								}
                           	                           
                            
							
							       if($this->settinginfo->vat>0){
										$calvat=$totalamount*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
							 /*if($this->settinginfo==1){
					            $discount=$totalamount*$discount/100;
				            }*/	
						 $totalamount2=$totalamount+$calvat-$discount;	
						 }
				
					?><input type="hidden" class="form-control" id="cartamount" value="<?php echo $totalamount+$calvat-$discount;?>">
					<input type="hidden" class="form-control" id="totalvat" value="<?php echo $calvat;?>">
                    <input type="hidden" class="form-control" id="totaldiscount" value="<?php echo $discount;?>">
                    <input type="hidden" class="form-control" id="mainsubtotal" value="<?php echo $totalamount;?>">
					<?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $itemtotal;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?><?php } ?></p>
                        </li>
                    </ul>
                    <?php } ?>
					<?php  $totalqty=0;
                            $totalamount=0;
							$pvat=0;
							$discount=0;
                            if($this->cart->contents()>0){ 
                            $totalqty= count($this->cart->contents());
							$itemprice=0;
							$pvat=0;
							$discount=0;
							foreach ($this->cart->contents() as $item){
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
											$itemprice=$itemprice+$item['addontpr'];
											}
										else{
											$itemprice=$itemprice;
											}									
									$totalamount=$itemprice+$totalamount;								
								}
                            	                           
                            } 
								if($this->settinginfo->vat>0){
										$calvat=$totalamount*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
										
							?>
                             <ul class="list-unstyled cart_list">
                    	<li><h6>Vat</h6>
                        <p><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $calvat;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                        </li>
                        <li><h6>Discount</h6>
                        <p><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $discount;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                        </li>
                        <li><h6>Total</h6>
                        <p><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $totalamount+$calvat-$discount;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                        </li>
                    </ul>