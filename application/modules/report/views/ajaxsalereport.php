<style type="text/css">
        @media print {
            a[href]:after {
                content: none !important;
            }
        }
    </style>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover" id="respritbl">
			                        <thead>
										<tr>
											<th><?php echo "Sale Date"; ?></th>
                                            <th><?php echo "Invoice No."; ?></th>
											<th><?php echo "Customer Name"; ?></th>
                                            <th><?php echo display('paymd');?></th>
											<th><?php echo display('order_total'); ?></th>
											<th><?php echo display('vat_tax1')?></th>
											<th><?php echo display('service_chrg')?></th>
											<th><?php echo display('discount')?></th>
											<th><?php echo display('total_ammount'); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$totalprice=0;
									if($preport) { 
									foreach($preport as $pitem){
										$totalprice=$totalprice+$pitem->bill_amount;
									?>
											<tr>
												<td><?php $originalDate = $pitem->order_date;
									echo $newDate = date("d-M-Y", strtotime($originalDate));
									 ?></td>
												<td><a href="<?php echo base_url("ordermanage/order/orderdetails/".$pitem->order_id) ?>" target="_blank">
												<?php echo $pitem->saleinvoice;?>
                                                </a></td>
                                                <td><?php echo $pitem->customer_name;?></td>
												<td><?php echo $pitem->payment_method;?></td>
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $pitem->total_amount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												<td><?php echo $pitem->VAT;?></td>
												<td><?php echo $pitem->service_charge;?></td>
												<td><?php echo $pitem->discount;?></td>
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $pitem->bill_amount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
											</tr>
									<?php } 
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="8" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_sale') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>
</div>                                