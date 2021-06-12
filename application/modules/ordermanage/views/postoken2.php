<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Printable area start -->
<div style="margin:0 auto;overflow: hidden;float: left;">
	                    <div class="panel-body">
	                        <div class="table-responsive m-b-20">
	                            <table border="0" style="width:100%;">
      <tr>
        <td>

          <table border="0" width="100%">
            <!--<tr>
              <td align="center"><b><?php //echo $customerinfo->customer_name;?></b>
                <?php //echo $customerinfo->customer_address;?>
                <?php //echo $customerinfo->customer_phone;?>
              </td>
            </tr>-->
            <tr>
              <td align="center"><nobr><date><?php echo display('token_no')?>:<?php echo $orderinfo->tokenno;?></nobr></td>
            </tr>
          </table>
          <table width="100%">
            <tr>
              <td>Q</th>
              <td><?php echo display('item')?></td>
              <td><?php echo display('size')?></td>
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
              <td align="left"><nobr><?php echo $item->ProductName;?><nobr></td>
              <td align="left"><nobr><?php echo $item->variantName;?><nobr></td>
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
			 ?>
            <tr>
            	<td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
            </tr>  
          </table>
        </td>
      </tr>
      <tr>
      	<td align="center"><?php if(!empty($tableinfo)){ echo display('table').$tableinfo->tablename;}?> | <?php echo display('ord_number');?>:<?php echo $orderinfo->order_id;?></td>
      </tr>
    </table>
        </div>
    </div>
</div>
