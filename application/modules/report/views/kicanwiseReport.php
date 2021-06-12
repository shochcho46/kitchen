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
																		
									?>
											<tr>
																					
                                                <td><?php echo $items['kiname'];?></td>
												
												<td style="text-align: right;"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $items['totalprice'];?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
												
											</tr>

								
									</tbody>
									<tfoot>
										<tr>
											<td colspan="1" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_sale') ?> </b></td>
											<td style="text-align: right;"><b><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $items['totalprice'];?> <?php if($currency->position==2){echo $currency->curr_icon;}?></b></td>
										</tr>
									</tfoot>
			                    </table>
</div>                                