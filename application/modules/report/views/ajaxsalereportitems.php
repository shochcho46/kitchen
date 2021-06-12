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
											<?php if($name=="Items Name"){?>
											<th><?php echo "Quantity"; ?></th>
											<?php }?>
                                            <th><?php echo "Total amount"; ?></th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
									$totalprice=0;
									
									if($items) { 
										if($name == "Items Name"){
									foreach($items as $item){
										$totalprice=$totalprice+($item->totalqty*$item->price);
									?>
											<tr>
																					
                                                <td><?php echo $item->ProductName;?></td>
												<td><?php echo $item->totalqty;?></td>
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo ($item->totalqty*$item->price);?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												
											</tr>
									<?php }
									}
									
									else{
										foreach($items as $item){
										$totalprice=$totalprice+$item->totalamount
									?>
											<tr>
																					
                                                <td><?php echo $item->ProductName;?></td>
												
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->totalamount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												
											</tr>

										<?php 
										} 
									}
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="<?php if($name=="Items Name"){ echo 2;}else{ echo 1;}?>" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_sale') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>
</div>                                