<?php foreach($itemlist as $item){
$isexists=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$item->order_id)->where('itemid',$item->menu_id)->where('varient',$item->variantid)->get()->num_rows();	
?>
<div class="single_item">
                <div class="align-center justify-between" style="position: relative; margin-bottom:13px;">
                  <div>
                    <div> <span style="display:block"><?php echo $item->ProductName;?></span> <span style="padding:2px;font-size: 14px;font-weight: 400;"><?php echo $item->variantName;?></span> </div>
                  </div>
                  <?php if($item->food_status==1){?>
                  <h6 class="quantity" style="color:#3C0">Ready</h6>
                  <?php } ?>
                  <?php if($item->food_status==0){
					  if($isexists>0){
					  ?>
                  <h6 class="quantity">Proccessing</h6>
                  <?php }else{?>
				  <h6 class="quantity">Kitchen Not Accept</h6>
				  <?php }} ?>
                </div>
                <div><?php echo $item->menuqty;?>X </div>
              </div>
              <?php } ?>