<?php $grtotal=0;
$totalitem=0;
 $calvat=0;
$discount=0;
$itemtotal=0;
 $pvat=0;
  $this->load->model('ordermanage/order_model',	'ordermodel');
if ($cart = $this->cart->contents()){?>
<table class="table table-bordered" border="1" width="100%" id="addinvoice">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('item')?></th>
                                            <th><?php echo display('varient_name')?></th>
                                            <th><?php echo display('price');?></th>
                                            <th><?php echo display('qty');?></th>
                                            <th><?php echo display('total');?></th>
                                            <th><?php echo display('action');?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="itemNumber">
                                    <?php $i=0; 
								      $totalamount=0;
									  $subtotal=0;
									 $pvat=0;
									foreach ($cart as $item){
										$itemprice= $item['price']*$item['qty'];
										$iteminfo=$this->ordermodel->getiteminfo($item['pid']);
										$vatcalc=$itemprice*$iteminfo->productvat/100;
										$pvat=$pvat+$vatcalc;
										$discount=0;
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
									$totalitem=$i;
									?>
                                        <tr id="<?php echo $i;?>">
                                            <th id="product_name_MFU4E">  <?php echo  $item['name'];
											if(!empty($item['addonsid'])){
											echo "<br>";
											echo $item['addonname'];
											}
											?></th>
                                            <td>
                                            <?php echo $item['size'];?>
                                            </td>
                                           
                                            <td width="">
                                             <?php echo $item['price'];?>
                                            </td>
                                            <td scope="row">
                                            <a class="btn btn-info btn-sm btnleftalign" onclick="posupdatecart('<?php echo $item['rowid']?>',<?php echo $item['pid']?>,<?php echo $item['qty'];?>,'add')"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            <?php echo $item['qty'];?>
                                            <a class="btn btn-danger btn-sm btnrightalign" onclick="posupdatecart('<?php echo $item['rowid']?>',<?php echo $item['pid']?>,<?php echo $item['qty'];?>,'del')"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                            </td>
                                            <td width="">
                                             <?php echo $itemprice;?>
                                            </td>
                                            
                                            <td width:"80"=""><a class="btn btn-danger btn-sm btnrightalign" onclick="removecart('<?php echo $item['rowid'];?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php } 
									$itemtotal=$totalamount+$subtotal;
										if($settinginfo->vat>0){
										$calvat=$itemtotal*$settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
									$grtotal=$itemtotal;
									?>
                                        
                                    <input name="grandtotal" id="grtotal" type="hidden" value="<?php echo $grtotal;?>" />
                                   
                                    </tbody>
                                </table>
<?php }  
if(!empty($this->cart->contents())){
	$servicecharge=$settinginfo->servicecharge;
	}
else{
	$servicecharge=0;
	}
?>
<input name="subtotal" id="subtotal" type="hidden" value="<?php echo $itemtotal;?>" />
 <input name="totalitem" id="totalitem" type="hidden" value="<?php echo $totalitem;?>" />
                                    <input name="tvat" type="hidden" value="<?php echo $calvat;?>" id="tvat" />
                                    <input name="sc" type="hidden" value="<?php echo $servicecharge;?>" id="sc" />
                                    <input name="tdiscount" type="hidden" value="<?php if($discount>0){echo $discount;}?>" placeholder="0.00" id="tdiscount" />
                                    <input name="tgtotal" type="hidden" value="<?php echo $calvat+$servicecharge+$itemtotal-$discount;?>" id="tgtotal" />
