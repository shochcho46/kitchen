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
											<th><?php echo $name; ?></th>
                                            <th><?php echo "Total amount"; ?></th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
									$totalprice=0;
									$td4 = 0;
									
									if($items) { 
										
									foreach($items as $item){
										$totalprice=$item->totalamount;
									
									if($item->ProductName == 2){
										$td1 = "Pick up";
										$td2 = $item->totalamount; 
									}
									else{
										$td3 = "Dinning";
										$td4 = $td4+$item->totalamount; 
									}

											
									 }
									 if(isset($td1)):
									 	?>
									<tr>
																					
                                                <td><?php echo $td1;?></td>
												
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $td2;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												
											</tr>
										<?php endif; 
										if(isset($td3)):?>
											<tr>
																					
                                                <td><?php echo $td3;?></td>
												
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $td4;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												
											</tr>
											<?php endif; ?>
											<?php
										
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="1" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_sale') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>
</div>                                