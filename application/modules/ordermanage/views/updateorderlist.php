<div class="table-wrapper-scroll-y productclist">
								<table class="table table-fixed table-bordered table-hover bg-white" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center"><?php echo display('item')?> </th>
                                            <th class="text-center"><?php echo display('varient_name')?></th>
                                            <th class="text-center" style="width:100px;"><?php echo display('unit_price')?></th> 
                                            <th class="text-center" style="width:100px;"><?php echo display('qty');?></th> 
                                            <th class="text-center"><?php echo display('total_price')?></th> 
                                            <th class="text-center"><?php echo display('action')?></th> 
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
											$text='&nbsp;&nbsp;<a class="text-right adonsmore" onclick="expand('.$i.')">More..</a>';
											$x=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
													$x++;
												}
											$nittotal=$adonsprice;
											$itemprice=$itemprice+$adonsprice;
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
                                     	<?php echo $item->ProductName;?><?php echo $text;?>
                                        </td>
                                        <td>
                                        <?php echo $item->variantName;?>
                                        </td>
                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                        <td class="text-right"><input type="hidden" class="exists_qty" name="select_qty_<?php echo $item->menu_id?>" id="select_qty_<?php echo $item->menu_id?>_<?php echo $item->varientid?>" value="<?php echo $item->menuqty;?>"><?php echo $item->menuqty;?></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                        <td class="text-right"><?php if($this->permission->method('ordermanage','delete')->access()){?><a class="btn btn-danger btn-sm btnrightalign" onclick="deletecart(<?php echo $item->row_id;?>,<?php echo $item->order_id;?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?></td>
                                     </tr>
                                    <?php 
									if(!empty($item->add_on_id)){
										$y=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$y];?>
                                                    <tr class="bg-deep-purple get_<?php echo $i;?> hasaddons" id="expandcol_<?php echo $i;?>">
                                                        <td colspan="2">
                                                        <?php echo $adonsinfo->add_on_name;?>
                                                        </td>
                                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                                        <td class="text-right"><?php echo $addonsqty[$y];?></td>
                                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price*$addonsqty[$y];?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                                        <td class="text-right">&nbsp;</td>
                                                     </tr>
									<?php $y++;
												}
										 }
									}
									 $itemtotal=$totalamount+$subtotal;
									 $calvat=$itemtotal*$settinginfo->vat/100;
									 ?>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong><?php echo display('subtotal')?></strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemtotal;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>
                                </div>
                                <input name="subtotal" id="subtotal" type="hidden" value="<?php echo $itemtotal;?>" />
<table class="table table-bordered bg-white">
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong><?php echo display('discount')?><?php if($settinginfo->discount_type==0){ echo "(".$currency->curr_icon.")";}else{ echo "(%)";}?></strong></td>
                                    <td class="text-right" style="width:28%">
                                            <strong>
                                            <?php $discount=0;
											if(empty($billinfo)){
												$discount=0;
												}
												else{
													if($settinginfo->discount_type==0){
													$discount=$billinfo->discount;
													}
													else{
														$discount=$billinfo->discount*100/$billinfo->total_amount;
														}
													$disamount=$billinfo->discount;
												} 
												?>
                                                <input name="distype" id="distype" type="hidden" value="<?php echo $settinginfo->discount_type;?>" />
                                                <input name="sdtype" id="sdtype" type="hidden" value="<?php echo $settinginfo->service_chargeType;?>" />
                                            <input name="invoice_discount" class="text-right" id="discount" type="number" placeholder="0.00" onkeyup="sumcalculation()" value="<?php echo $discount;?>" />
                                            
                                            </strong>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong><?php echo display('service_chrg')?></strong></td>
                                    <td class="text-right" style="width:28%">
                                            <strong> <?php $servicecharge=0;
											if(empty($billinfo)){
												$servicecharge=0;
												}
												else{
													if($settinginfo->service_chargeType==0){
													$servicecharge=$billinfo->service_charge;
													}
													else{
														$servicecharge=$billinfo->service_charge*100/$billinfo->total_amount;
														}
													$sdamount=$billinfo->service_charge;
											       } 
												?>
                                            <input name="service_charge" class="text-right" id="scharge" type="number" placeholder="0.00" onkeyup="sumcalculation()" value="<?php echo $servicecharge;?>" />
                                           
                                            </strong>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong><?php echo display('vat_tax')?></strong></td>
                                    <td class="text-right" style="width:28%">
                                    <?php
											/*if(empty($calvat)){
												$calvat=0;
												}
												else{ $calvat=$billinfo->VAT;
											$billinfo->VAT; }*/
												?>
                                    <input id="vat" name="vat" type="hidden" value="<?php echo $calvat;?>" />
                                            <strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong><?php echo display('grand_total')?></strong></td>
                                    <td class="text-right" style="width:28%">
                                    <input name="tgtotal" type="hidden" value="<?php echo $calvat+$itemtotal+$sdamount-$disamount;?>" id="tgtotal" />
                                            <input name="orginattotal" id="orginattotal" type="hidden" value="<?php echo $calvat+$itemtotal+$sdamount-$disamount;?>" /><input name="grandtotal" id="grandtotal" type="hidden" value="<?php echo $calvat+$itemtotal+$sdamount-$disamount;?>"><?php if($currency->position==1){echo $currency->curr_icon;}?> <strong id="gtotal"><?php echo $calvat+$itemtotal+$sdamount-$disamount;?></strong> <?php if($currency->position==2){echo $currency->curr_icon;}?>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                
                                </table>