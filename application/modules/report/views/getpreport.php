<table class="table table-bordered table-striped table-hover" id="respritbl">
			                        <thead>
										<tr>
											<th><?php echo "Purchase Date"; ?></th>
											<th><?php echo "Invoice no."; ?></th>
											<th><?php echo display('supplier_name') ?></th>
											<th><?php echo display('total_ammount') ?></th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$totalprice=0;
									if($preport) { 
									foreach($preport as $pitem){
										$totalprice=$totalprice+$pitem->total_price;
									?>
											<tr>
												<td><?php $originalDate = $pitem->purchasedate;
									echo $newDate = date("d-M-Y", strtotime($originalDate));
									 ?></td>
												<td>
													<?php echo $pitem->invoiceid;?>
												</td>
												<td><?php echo $pitem->supName;?></td>
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $pitem->total_price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
											</tr>
									<?php } 
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_purchase') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>