
<div class="modal fade" id="bookinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-food" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Food Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Item Information</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bacon Cheese Burger</td>
                                <td>25 Inches</td>
                                <td>
                                    <div class="cart_counter">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>$200.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Addons Name</th>
                                <th>Addons Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" name="vehicle1" value="Bike">
                                </td>
                                <td>BBQ Sauce</td>
                                <td>
                                    <div class="cart_counter">
                                        <button onclick="var result = document.getElementById('sst1'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" name="qty" id="sst1" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst1'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>$200.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
<table class="table table-bordered text-center">
                        <thead>
                            <tr>
                               <th>Item Information</th>
                               <th>Size</th>
                               <th>Qty</th> 
                               <th>Price</th>  
                            </tr>
                        </thead>
                        <tbody id="addItem">
                                    <tr>
                                        <td>
                    				<input name="itemname" type="hidden" id="itemname_1<?php echo $type;?>" value="<?php echo $item->ProductName; if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?>" />
                                     	<?php echo $item->ProductName;  if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?>
                                        </td>
                                        <td>
                                        <input name="sizeid" type="hidden" id="sizeid_1<?php echo $type;?>" value="<?php echo $item->variantid;?>" />
                                        <input name="size" type="hidden" value="<?php echo $item->variantName;?>" id="varient_1<?php echo $type;?>" />
                                        <input type="hidden" name="catid" id="catid_1<?php echo $type;?>" value="<?php echo $item->CategoryID;?>">
                                        <?php echo $item->variantName;?>
                                        </td>
                                        <td><div class="cart_counter">
                                        <button onclick="var result = document.getElementById('sst61_<?php echo $type;?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="number" name="itemqty" id="sst61_<?php echo $type;?>" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst61_<?php echo $type;?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                        </td>
                                         <td>
                                        <input name="itemprice" type="hidden" value="<?php echo $item->price;?>" id="itemprice_1<?php echo $type;?>" /><input type="hidden" name="cartpage" id="cartpage_1<?php echo $type;?>" value="<?php if($type=="menu"){echo "1";}else{echo "0";}?>">
                                        <?php echo $item->price;?>
                                        </td>
                                          
                                    </tr>
                                   
                                </tbody>
                    </table>
<table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Addons Name</th>
                                <th>Addons Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                               <?php $k=0;
							   foreach($addonslist as $addons){
								   $k++;
								   ?>
                                    <tr>
                                    	<td><div class="checkbox checkbox-success">
                                    <input type="checkbox" role="<?php echo $addons->price;?>" title="<?php echo $addons->add_on_name;?>" name="addons" value="<?php echo $addons->add_on_id;?>"  id="addons_<?php echo $addons->add_on_id;?>">
                                        <label for="addons_<?php echo $addons->add_on_id;?>"></label>
                                    </div></td>
                                        <td class="text-center"><?php echo $addons->add_on_name;?></td>
                                         <td><div class="cart_counter">
                                        <button onclick="var result = document.getElementById('addonqty_<?php echo $addons->add_on_id;?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="number" name="addonqty" id="addonqty_<?php echo $addons->add_on_id;?>" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                        <button onclick="var result = document.getElementById('addonqty_<?php echo $addons->add_on_id;?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                        </td>
                                        <td class="text-center"><?php echo $addons->price;?></td>
                                    </tr>
                                    
                                    
                                    
                                    <?php } ?>
                                     
                                </tbody>
                    </table>
<div class="calculate-content my-2 text-right">
<?php 
 if($type=="menu"){$flag="menu";}else{ $flag="other";}
?>
<a class="btn btn-success" onclick="addonsfoodtocart(<?php echo $item->ProductsID;?>,1,'<?php echo $flag;?>')">Add To cart</a>
</div>
