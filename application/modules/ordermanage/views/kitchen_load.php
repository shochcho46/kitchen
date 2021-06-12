<?php 
									 if(!empty($ongoingorder)){
									 foreach($ongoingorder as $onprocess){
										 $billtotal=round($onprocess->totalamount);
										  if(($onprocess->orderacceptreject==0 || empty($onprocess->orderacceptreject)) && ($onprocess->cutomertype==2)){}
										 else{
										 ?>
                                  		<div class="col-sm-2">
                                            <div class="hero-widget well well-sm" style="height:auto !important">
                                                    <p style="margin:0;"><label class="text-muted"><strong><?php echo display('table');?>:<?php echo $onprocess->tablename;?></strong></label></p>
                                                    <p style="margin:0;"><label class="text-muted"><strong><?php echo display('tok');?>:<?php echo $onprocess->tokenno;?></strong></label></p>
                                                    <p style="margin:0;"><label class="text-muted"><strong><?php echo display('cookedtime');?>:<?php echo $onprocess->cookedtime;?></strong></label></p>
                                                    <p style="margin:0;"><label class="text-muted"><?php echo display('ord');?>:<?php echo $onprocess->saleinvoice;?></label></p>
                                                    <p style="margin:0;"><label class="text-muted"><?php echo display('view_ord');?>:<?php echo $onprocess->first_name.' '.$onprocess->last_name;?></label></p>
                                                    <a href="javascript:;" onclick="oredrready('<?php echo $onprocess->order_id;?>')" style="display:block;" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Order">View Order</a>
                                            </div>
                                        </div>
                                     <?php } } }
									  else{ 
									   $odmsg=display('no_order_run');
									  echo "<p style='padding-left:12px;'>".$odmsg."</p>";
									  }
									 ?>