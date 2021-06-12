 <?php $i=0;
  foreach($itemlist as $item){
	 $i++;
						$this->db->select('*');
									$this->db->from('menu_add_on');
									$this->db->where('menu_id',$item->ProductsID);
									$query = $this->db->get();
									$getadons="";
									if ($query->num_rows() > 0) {
									$getadons = 1;
									}
									else{
										$getadons =  0;
										} 
	  ?>
                            <div class="col-xs-6 col-sm-4 col-md-2 col-p-3">
                            <div class="panel panel-bd product-panel select_product">
                                <div class="panel-body">
                                    <img src="<?php echo base_url(!empty($item->ProductImage)?$item->ProductImage:'assets/img/icons/default.jpg'); ?>" class="img-responsive" alt="<?php echo $item->ProductName;?>">
                                    <input type="hidden" name="select_product_id" class="select_product_id" value="<?php echo $item->ProductsID;?>">
                                    <input type="hidden" name="select_product_size" class="select_product_size" value="<?php echo $item->variantid;?>">
                                    <input type="hidden" name="select_product_cat" class="select_product_cat" value="<?php echo $item->CategoryID;?>">
                                    <input type="hidden" name="select_varient_name" class="select_varient_name" value="<?php echo $item->variantName;?>">
                                    <input type="hidden" name="select_product_name" class="select_product_name" value="<?php echo $item->ProductName;?>">
                                    <input type="hidden" name="select_product_price" class="select_product_price" value="<?php echo $item->price;?>">
                                    <input type="hidden" name="select_addons" class="select_addons" value="<?php echo $getadons;?>">
                                </div>
                                <div class="panel-footer"><span><?php echo $item->ProductName;?> (<?php echo $item->variantName;?>)</span></div>
                            </div>
                        </div>
                       <?php } ?>                            