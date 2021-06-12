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
											<th><?php echo display('date'); ?></th>
                                            <th><?php echo display('item_name')?></th>
											<th><?php echo display('varient_name')?></th>
                                            <th><?php echo display('quantity'); ?></th>
                                            <th><?php echo display('price'); ?></th>
											<th><?php echo display('total_ammount'); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$totalprice=0;
									if($preport) { 
									foreach($preport as $pitem){
										$totalprice=$totalprice+$pitem->price*$pitem->qty;
									?>
											<tr>
												<td><?php $originalDate = $pitem->order_date;
									echo $newDate = date("d-M-Y", strtotime($originalDate));
									 ?></td>
												<td><?php echo $pitem->ProductName;?></td>
                                                <td><?php echo $pitem->variantName;?></td>
												<td><?php echo $pitem->qty;?></td>
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $pitem->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
                                                <td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $pitem->price*$pitem->qty;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
											</tr>
									<?php } 
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_sale') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>
</div>                                