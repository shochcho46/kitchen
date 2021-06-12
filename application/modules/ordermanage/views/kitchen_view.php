                                    <?php $this->load->model('ordermanage/order_model',	'ordermodel');
										 $alliteminfo=$this->ordermodel->customerorderkitchen($orderinfo->order_id,$kitchenid);
										 $allchecked2="";
							$date_arr=array();
							$c=0;
							foreach($alliteminfo as $single){
								$date_arr[$c]=$single->cookedtime;
								$allisexit=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$orderinfo->order_id)->where('kitchenid',$kitchenid)->where('itemid',$single->menu_id)->where('varient',$single->variantid)->get()->num_rows();
								if($allisexit>0){
								$allchecked2.="1,";
								}
							else{
								$allchecked2.="0,";
								}
								$c++;
							}
						if( strpos($allchecked2, '0') !== false ) {
								  $isaccept= 0;
									}
								 else{
									 $isaccept= 1;
									 }
									if(!empty($alliteminfo)){ 
									 ?>
                                     <div class="grid-item-content" id="gridcontent<?php echo $orderinfo->order_id.$kitchenid;?>">
                                     <div class="food_item <?php if($isaccept==0){ echo "pending";}?>" id="topsec<?php echo $orderinfo->order_id.$kitchenid;?>">
                                    <div class="food_item_top">
                                        <div class="item_inner">
                                            <h4 class="kf_info">Table: <?php echo $orderinfo->table_no;?></h4>
                                            <h4 class="kf_info"><?php echo $orderinfo->first_name.' '.$orderinfo->last_name;?></h4>
                                        </div>
                                        <div class="item_inner">
                                            <h4 class="kf_info">Token: <?php echo $orderinfo->tokenno;?></h4>
                                            <h4 class="kf_info">Order: #<?php echo $orderinfo->order_id;?></h4>
                                        </div>
                                    </div>
                                    <div class="cooking_time">
                                        <h4 class="kf_info">Cooking time: <span><?php if(!empty($date_arr)){echo max($date_arr);}?></span></h4>
                                    </div>
                                    <div class="food_select" id="acceptitem<?php echo $orderinfo->order_id.$kitchenid;?>">
                                    	<?php 
										 $iteminfo=$this->ordermodel->customerorderkitchen($orderinfo->order_id,$kitchenid);
										 $l=0;
										 foreach($iteminfo as $item){
											 $l++;
											 $ischecked=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$orderinfo->order_id)->where('kitchenid',$kitchenid)->where('itemid',$item->menu_id)->where('varient',$item->variantid)->get()->num_rows();?>
                                        <div class="single_item">
                                            <div class="align-center justify-between" style="position: relative; margin-bottom:13px;">
                                                <input id='chkbox-<?php echo $l.$item->kitchenid.$orderinfo->order_id;?>' usemap="<?php echo $orderinfo->order_id;?>" title="<?php echo $item->varientid;?>" alt="<?php echo $isaccept;?>" type='checkbox'  <?php if($ischecked==1 && $isaccept==0){ echo "checked disabled";} if($isaccept==1 && $item->food_status==1){ echo "checked";}?> class="individual" name="item<?php echo $orderinfo->order_id.$item->kitchenid;?>" value="<?php echo $item->menu_id;?>"/>
                                                <label for='chkbox-<?php echo $l.$item->kitchenid.$orderinfo->order_id;?>'>
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                   <div>
                                                        <span style="display:block"><?php echo $item->ProductName;?></span>
                                                      <?php if(!empty($item->varientid)){?><span style="padding:2px;font-size: 14px;font-weight: 400;"><?php echo $item->variantName;?></span><?php } ?>
                                                   </div>
                                                </label>
                                                
                                                <h4 class="quantity"><?php echo $item->menuqty;?>x</h4>
                                            </div>
                                            <?php if(!empty($item->add_on_id)){
												$addons=explode(",",$item->add_on_id);
												$addonsqty=explode(",",$item->addonsqty);
												$p=0;
												?>
                                            <div><?php 
											foreach($addons as $addonsid){
												
												$adonsinfo=$this->ordermodel->read('*', 'add_ons', array('add_on_id' => $addonsid));
											echo $adonsinfo->add_on_name;
											?>(<?php echo $addonsqty[$p];?>), <?php $p++; } ?></div>
                                            <?php }
											if(!empty($item->notes)){
											?>
                                            <div><strong>Notes:</strong> <?php echo $item->notes;?></div>
                                            <?php }?>
                                        </div>
                                        <?php } ?>
                                        <div class="align-center justify-between">
                                            <div class="checkAll">
                                                <input id='allSelect<?php echo $orderinfo->order_id;?><?php echo $kitchenid;?>' name="item<?php echo $orderinfo->order_id.$kitchenid;?>" type='checkbox' class="selectall" value=""/>
                                                <label for='allSelect<?php echo $orderinfo->order_id;?><?php echo $kitchenid;?>'>
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    All
                                                </label>
                                            </div>
                                            
                                            <div style="display:<?php if($isaccept==1){ echo "block"; }else{ echo "none";}?>" id="isprepare<?php echo $orderinfo->order_id;?><?php echo $kitchenid;?>">
                                                <button class="btn btn-success w-smd lh-30" onclick="onprepare(<?php echo $orderinfo->order_id;?>,<?php echo $kitchenid;?>)">Prepared</button>
                                                <button class="btn btn-info lh-30" onclick="printtoken(<?php echo $orderinfo->order_id;?>,<?php echo $kitchenid;?>)"><i class="fa fa-print"></i></button>
                                            </div>
                                            <div style="display:<?php if($isaccept==0){ echo "block"; }else{ echo "none";}?>" id="isongoing<?php echo $orderinfo->order_id;?><?php echo $kitchenid;?>">
                                                <button class="btn btn-success w-smd lh-30" onclick="orderaccept(<?php echo $orderinfo->order_id;?>,<?php echo $kitchenid;?>)">Accept</button>
                                                <button class="btn btn-danger w-smd lh-30" onclick="ordercancel(<?php echo $orderinfo->order_id;?>,<?php echo $kitchenid;?>)">Reject</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <script>
$(function() {

        

    });
$(function() {
        $(".selectall").click(function() {
            $(this).parent().parent().siblings().find(".individual").prop("checked", $(this).prop("checked"));
        });
    });
</script>
                                    <?php } ?>
