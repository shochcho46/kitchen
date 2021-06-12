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
											<th class="text-center"><?php echo $name; ?></th>
                                            <th class="text-center"><?php echo "Total amount"; ?></th>
                                            <th class="text-center"><?php echo display('action');?><button class="btn btn-success pull-right" onclick="mergeorderlist()">Merge Order</button></th> 
											
										</tr>
									</thead>
									<tbody>
									<?php 
									$totalprice=0;
									
									if($items) { 
									foreach($items as $item){
										//print_r($item);
									?>
								
											<tr>
																					
                                                <td style="text-align: right;"><?php  echo $item->order_id;?></td>
												
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo ($item->totalamount);?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												  <td style="text-align: right;"><div class="pull-right kitchen-tab" style="background:none; padding:0;">
                                                    <input id='chkbox-<?php echo $item->order_id;?>' type='checkbox' class="individual" name="margeorder" value="<?php echo $item->order_id;?>"/>
                                                <label for='chkbox-<?php echo $item->order_id;?>'>
                                                <!--<div>
                                                        <span style="display:block">Marge</span>
                                                      </div>-->
                                                    <span class="radio-shape" style="margin-right:0">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    
                                                </label>
                                                    </div> </td>
											</tr>
									<?php 
									
									$totalprice=$totalprice+$item->totalamount;
									}
									
									}
									
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="1"  align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_sale') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>
</div>                                