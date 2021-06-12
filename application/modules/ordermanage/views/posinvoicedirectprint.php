<div id="printableArea" style="width:280px;margin:0 auto;overflow: hidden;float: left;font-size: 13px;">
	                    <div class="panel-body">
	                        <div class="table-responsive m-b-20">
	                            <table border="0">
      <tr>
        <td>

          <table border="0" width="100%">
            <tr>
               <td align="center" style="border-bottom:2px #333 solid;"><span style="font-size: 17pt; font-weight:bold;"><img src="<?php echo base_url();?><?php echo $storeinfo->logo?>" class="img img-responsive" alt="" style="background: rgba(0,0,0,1);height:30px;"><?php //echo $storeinfo->storename;?></span><br>
                    <?php echo $storeinfo->address;?><br>
                    <?php echo $storeinfo->phone;?>
                    </td>
            </tr>
            <tr>
              <td align="center"><b><?php echo $customerinfo->customer_name;?></b>
                <?php //echo $customerinfo->customer_address;?>
                <?php //echo $customerinfo->customer_phone;?>
              </td>
            </tr>
            <tr>
              <td align="center"><nobr><date>Date:<?php echo date('d/m/Y H:i:s')?><time></nobr></td>
            </tr>
          </table>
          <table width="100%">
            <tr>
              <td>Q</th>
              <td>Item</td>
              <td>SIZE</td>
              <td align="right">PRICE</td>
              <td align="right">TOTAL</td>
            </tr>
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
									$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
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
			  <td align="left"><nobr><?php echo $item->menuqty;?></nobr></td>
              <td align="left"><?php echo $item->ProductName;?></td>
              <td align="left"><?php echo $item->variantName;?></td>
              <td align="right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
              <td align="right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
			</tr>
             <?php 
			if(!empty($item->add_on_id)){
				$y=0;
					foreach($addons as $addonsid){
							$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
							$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$y];?>
							<tr>
								<td colspan="2">
								<?php echo $adonsinfo->add_on_name;?>
								</td>
								<td class="text-right"><?php echo $addonsqty[$y];?></td>
								<td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
								<td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price*$addonsqty[$y];?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
							 </tr>
			<?php $y++;
						}
				 }
			}
			 $itemtotal=$totalamount+$subtotal;
			 $calvat=$itemtotal*15/100;
			 
			 $servicecharge=0; 
			 if(empty($billinfo)){ $servicecharge;} 
			 else{$servicecharge=$billinfo->service_charge;}
			 
			 $sdr=0; 
			 if($storeinfo->service_chargeType==1){ 
			 $sdpr=$billinfo->service_charge*100/$billinfo->total_amount;
			 $sdr='('.round($sdpr).'%)';
			 } 
			 else{$sdr='('.$currency->curr_icon.')';}
			 
			  $discount=0; 
			 if(empty($billinfo)){ $discount;} 
			 else{$discount=$billinfo->discount;}
			 
			 $discountpr=0; 
			 if($storeinfo->discount_type==1){ 
			 $dispr=$billinfo->discount*100/$billinfo->total_amount;
			 $discountpr='('.round($dispr).'%)';
			 } 
			 else{$discountpr='('.$currency->curr_icon.')';}
			 ?>
            <tr>
            	<td colspan="5" style="border-top:#333 1px solid;"></td>
            </tr>  
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><?php echo display('subtotal')?></td>
              <td align="right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemtotal;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
            </tr>
            <tr>
           	  <td colspan="5" style="border-top:#333 1px solid;"></td>
            </tr>
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><?php echo display('vat_tax')?>(<?php echo $storeinfo->vat;?>%)</td>
              <td align="right"><nobr><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat=$billinfo->VAT; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
            </tr>
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><?php echo display('discount')?><?php echo $discountpr;?></td>
              <td align="right"><?php if($currency->position==1){echo $currency->curr_icon;}?>  <?php $discount=0; if(empty($billinfo)){ echo $discount;} else{echo $discount=$billinfo->discount;} ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
            </tr>
             <tr>
            	<td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
            </tr>
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3">SD<?php echo $sdr;?></td>
              <td align="right"><?php if($currency->position==1){echo $currency->curr_icon;}?><?php $sdcharge=0; if(empty($billinfo)){ echo $sdcharge;} else{echo $sdcharge=$billinfo->service_charge;} ?><?php if($currency->position==2){echo $currency->curr_icon;}?></td>
            </tr>
            <tr>
            	<td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
            </tr>
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><strong><?php echo display('grand_total')?></strong></td>
              <td align="right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat+$itemtotal+$servicecharge-$discount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></strong></td>
            </tr>
            <tr>
            	<td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
            </tr>
            <?php 
			if($orderinfo->customerpaid>0){
				$customepaid=$orderinfo->customerpaid;
				$changes=$customepaid-$orderinfo->totalamount;
				}
			else{
				$customepaid=$orderinfo->totalamount;
				$changes=0;
				}
			if($billinfo->bill_status==1){?>
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><nobr><?php echo display('customer_paid_amount')?></nobr></td>
              <td align="right"><nobr><?php if($currency->position==1){echo $currency->curr_icon;}?>  <?php echo $customepaid; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></nobr></td>
            </tr>
             <?php } else{ ?>
             <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><nobr><?php echo display('total_due')?></nobr></td>
              <td align="right"><nobr><?php if($currency->position==1){echo $currency->curr_icon;}?>  <?php echo $customepaid; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></nobr></td>
            </tr>
             <?php } ?>
            <tr>
              <td align="left"><nobr></nobr></td>
              <td align="left" colspan="3"><nobr><?php echo display('change_due')?></nobr></td>
              <td align="right"><nobr><?php if($currency->position==1){echo $currency->curr_icon;}?>  <?php echo $changes; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></nobr></td>
            </tr>
            <tr>
            	<td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
            </tr>
          </table>
		<table width="100%">
        	<tr>
            	<td><?php echo display('recept')?>:<?php echo $orderinfo->saleinvoice;?> | <?php echo display('orderno')?>:<?php echo $orderinfo->order_id;?></td>
                <td>User: <?php echo $this->session->userdata('fullname');?></td>
            </tr>
        </table>
        </td>
      </tr>
      <tr>
      	<td><?php echo display('powerbybdtask')?></td>
      </tr>
    </table>
	                        </div>
	                    </div>
	                </div>

