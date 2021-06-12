<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<style>
.listcat{
      color: #fff;
    background: #37a000;
    box-shadow: inset 0 0 0 0 rgba(0,0,0,.4), -2px -3px 5px -2px rgba(0,0,0,.4);
	cursor:pointer;
	padding:5px;
  }
</style>
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php //echo display('unit_update');?></strong>
            </div>
            <div class="modal-body addonsinfo">
            
    		</div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
    <div id="items" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo "Item Information";?></strong>
            </div>
            <div class="modal-body iteminfo">
            
    		</div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>								
    <div class="row">
        <div class="col-sm-12 col-md-12">
                    <div class="panel">
                            <fieldset class="border p-2">
                               <legend  class="w-auto"><?php echo "Update Order" ?></legend>
                            </fieldset>
                           
                            <div class="row">
        
                    <div class="col-sm-6">
                    <input name="url" type="hidden" id="posurl" value="<?php echo base_url("ordermanage/order/getitemlist") ?>" />
                                                        <input name="url" type="hidden" id="productdata" value="<?php echo base_url("ordermanage/order/getitemdata") ?>" />
                                                        <input name="url" type="hidden" id="carturl" value="<?php echo base_url("ordermanage/order/addtocartupdate") ?>" />
                                                        <input name="url" type="hidden" id="cartupdateturl" value="<?php echo base_url("ordermanage/order/poscartupdate") ?>" />
                                                        <input name="url" type="hidden" id="addonexsurl" value="<?php echo base_url("ordermanage/order/posaddonsmenu") ?>" />
                                                        <input name="url" type="hidden" id="removeurl" value="<?php echo base_url("ordermanage/order/removetocart") ?>" />
                        <form class="navbar-search" method="get" action="<?php echo base_url("ordermanage/order/pos_invoice")?>" >
                            <label class="sr-only screen-reader-text" for="search">Search:</label>
                            <div class="input-group">
                                <input type="text" id="product_name" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Please Search Food" />
        
                                <div class="input-group-addon search-categories">
                                </div>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-secondary" id="search_button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="row row-m-3">
                                                    <div class="listcat col-xs-6 col-sm-4 col-md-2 col-p-3" onclick="getslcategory('')">All</div>
                                                    <?php 
													$result = array_diff($categorylist, array("Select Food Category"));
													foreach($result as $key=>$test){ ?>
                                                                    <div class="listcat col-xs-6 col-sm-4 col-md-2 col-p-3" onclick="getslcategory(<?php echo $key;?>)"><?php echo $test;?></div>
													<?php  }?>
                                                   </div>
                        <div class="product-grid">
                            <div class="row row-m-3" id="product_search">
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
                                            <input type="hidden" name="select_product_name" class="select_product_name" value="<?php echo $item->ProductName; if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?>">
                                            <input type="hidden" name="select_product_price" class="select_product_price" value="<?php echo $item->price;?>">
                                            <input type="hidden" name="select_addons" class="select_addons" value="<?php echo $getadons;?>">
                                            
                                        </div>
                                        <div class="panel-footer"><?php echo $item->ProductName;?> (<?php echo $item->variantName;?>)<?php if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?></div>
                                    </div>
                                </div>
                               <?php } ?>
                                                </div>
                        </div>
                    </div>
                     <?php echo form_open_multipart('ordermanage/order/modifyoreder',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                           <input name="url" type="hidden" id="url" value="<?php echo base_url("ordermanage/order/itemlistselect") ?>" />
                            <input name="url" type="hidden" id="addonsurl" value="<?php echo base_url("ordermanage/order/addonsmenu") ?>" />
                            <input name="url" type="hidden" id="carturl" value="<?php echo base_url("ordermanage/order/addtocartupdate") ?>" />
                            <input name="url" type="hidden" id="delurl" value="<?php echo base_url("ordermanage/order/deletetocart") ?>" />
                            <input name="updateid" type="hidden" id="updateid" value="<?php echo $orderinfo->order_id;?>" />
                            <input name="custmercode" type="hidden" id="custmercode" value="<?php echo $customerinfo->cuntomer_no;?>" />
                            <input name="custmername" type="hidden" id="custmername" value="<?php echo $customerinfo->customer_name;?>" />
                            <input name="saleinvoice" type="hidden" id="saleinvoice" value="<?php echo $orderinfo->saleinvoice;?>" />   
                    <div class="col-sm-6">
                        <div class="panel panel-bd">
                            <div class="panel-body">
        
                               <!-- <div class="form-group">
                                    <input type="text" name="product_name" class="form-control" placeholder='Barcode OR QR code scan here ' id="add_item" >
                                </div>-->
                               
                                <div class="client-add">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name <span class="color-red">*</span></label>
                                        <?php $cusid=1;
                                        echo form_dropdown('customer_name',$customerlist,(!empty($orderinfo->customer_id)?$orderinfo->customer_id:null),'class="postform resizeselect form-control" id="customer_name" required') ?>
                                    </div>
                                    <a href="#" class="client-add-btn" aria-hidden="true" data-toggle="modal" data-target="#client-info"><i class="ti-plus m-r-2"></i>New Customer </a>
                                </div>
                                <div class="form-group">
                                    <label for="store_id">Type <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <?php $ctype=1;
                                    echo form_dropdown('ctypeid',$curtomertype,(!empty($orderinfo->cutomertype)?$orderinfo->cutomertype:null),'class="form-control" id="ctypeid" required') ?>
                                </div>
                                
                                 <div id="nonthirdparty">
                                                            <div class="form-group">
                                                                <label for="store_id">Waiter <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                 <?php echo form_dropdown('waiter',$waiterlist,(!empty($orderinfo->waiter_id)?$orderinfo->waiter_id:null),'class="form-control" id="waiter" required') ?>
                                                            </div>
                                                            <div class="form-group" id="tblsec">
                                                                <label for="store_id">Table&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="color-red">*</span></label>
                                                                <?php echo form_dropdown('tableid',$tablelist,(!empty($orderinfo->table_no)?$orderinfo->table_no:null),'class="form-control" id="tableid" required') ?>
                                                            </div>
                                                            </div>
                                                            <div class="form-group" id="thirdparty" style="display:none;">
                                                                <label for="store_id">Delivary Company <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                <?php echo form_dropdown('delivercom',$thirdpartylist,(!empty($orderinfo->isthirdparty)?$orderinfo->isthirdparty:null),'class="form-control" style="width:95%;" id="delivercom" required disabled="disabled"') ?>
                                                            </div>
                                <div class="form-group">
                                                                <input class="form-control" type="hidden" id="order_date" name="order_date" required value="<?php echo date('d-m-Y')?>" />
                                                                <input class="form-control" type="hidden" id="bill_info" name="bill_info" required value="<?php echo $billinfo->bill_status;?>" />
                                                                <input type="hidden" id="card_type" name="card_type" value="<?php echo $billinfo->payment_method_id;?>" />
                                                                <input type="hidden" id="orderstatus" name="orderstatus" value="<?php echo $orderinfo->order_status;?>" />
                                    							<input type="hidden" id="assigncard_terminal" name="assigncard_terminal" value="" />
                                                                <input type="hidden" id="assignbank" name="assignbank" value="" />
                                                                <input type="hidden" id="assignlastdigit" name="assignlastdigit" value="" />
                                    <input type="hidden" id="product_value" name="">
                                </div>
                                <div class="product-list">
                                   <div class="col-sm-12" id="addfoodlist">
                                
                            
                               <div class="table-wrapper-scroll-y productclist">
								<table class="table table-fixed table-bordered table-hover bg-white" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center">Item </th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center" style="width:100px;">Unit Price</th> 
                                            <th class="text-center" style="width:100px;">Qty</th> 
                                            <th class="text-center">Total Price</th> 
                                            <th class="text-center">Action</th> 
                                        </tr>
                                </thead>
                                <tbody>
                                <?php  $this->load->model('ordermanage/order_model','ordermodel');
								$i=0; 
								  $totalamount=0;
									  $subtotal=0;
									  $pvat=0;
									  $total=$orderinfo->totalamount;
									foreach ($iteminfo as $item){
										$i++;
										$itemprice= $item->price*$item->menuqty;
										$iteminfo=$this->ordermodel->getiteminfo($item->menu_id);
										$vatcalc=$itemprice*$iteminfo->productvat/100;
										$pvat=$pvat+$vatcalc;
										$discount=0;
										$adonsprice=0;
										if(!empty($item->add_on_id)){
											$addons=explode(",",$item->add_on_id);
											$addonsqty=explode(",",$item->addonsqty);
											$text='&nbsp;&nbsp;<a class="text-right adonsmore" onclick="expand('.$i.')">More..</a>';
											$x=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
													$x++;
												}
											$nittotal=$adonsprice;
											$itemprice=$itemprice+$adonsprice;
											}
										else{
											$nittotal=0;
											$text='';
											}
									 	 $totalamount=$totalamount+$nittotal;
										 $subtotal=$subtotal+$item->price*$item->menuqty;
									?>
                                    <tr>
                                        <td>
                                     	<?php echo $item->ProductName;?><?php echo $text;?>
                                        </td>
                                        <td>
                                        <?php echo $item->variantName;?>
                                        </td>
                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                        <td class="text-right"><input class="exists_qty" type="hidden" name="select_qty_<?php echo $item->menu_id?>" id="select_qty_<?php echo $item->menu_id?>" value="<?php echo $item->menuqty;?>"><?php echo $item->menuqty;?></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                        <td class="text-right"><?php if($orderinfo->order_status!=4){?><a class="btn btn-danger btn-sm btnrightalign" onclick="deletecart(<?php echo $item->row_id;?>,<?php echo $item->order_id;?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?></td>
                                     </tr>
                                    <?php 
									if(!empty($item->add_on_id)){
										$y=0;
											foreach($addons as $addonsid){
													$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
													$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$y];?>
                                                    <tr class="bg-deep-purple get_<?php echo $i;?> hasaddons" id="expandcol_<?php echo $i;?>">
                                                        <td colspan="2">
                                                        <?php echo $adonsinfo->add_on_name;?>
                                                        </td>
                                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                                        <td class="text-right"><?php echo $addonsqty[$y];?></td>
                                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price*$addonsqty[$y];?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                                        <td class="text-right">&nbsp;</td>
                                                     </tr>
									<?php $y++;
												}
										 }
									}
									$itemtotal=$totalamount+$subtotal;
									if($settinginfo->vat>0){
										$calvat=$itemtotal*$settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
									 ?>
                                    <tr>
                                    	<td class="text-right" colspan="4"><strong>Subtotal</strong></td>
                                        <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemtotal;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>
                                </div>
                                <input name="subtotal" id="subtotal" type="hidden" value="<?php echo $itemtotal;?>" />
                                <table class="table table-bordered bg-white">
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong>Discount<?php if($settinginfo->discount_type==0){ echo "(".$currency->curr_icon.")";}else{ echo "(%)";}?></strong></td>
                                    <td class="text-right" style="width:28%">
                                            <strong>
                                             <?php $servicecharge=0;
											if(empty($billinfo)){
												$servicecharge=0;
												}
											else{
													if($settinginfo->service_chargeType==0){
													$servicecharge=$billinfo->service_charge;
													}
													else{
														$servicecharge=$billinfo->service_charge*100/$billinfo->total_amount;
														}
													$sdamount=$billinfo->service_charge;
											       } 
												?>
                                            <?php $discount=0;
											if(empty($billinfo)){
												$discount=0;
												}
												else{
													if($settinginfo->discount_type==0){
													$discount=$billinfo->discount;
													}
													else{
														$discount=$billinfo->discount*100/$billinfo->total_amount;
														}
													$disamount=$billinfo->discount;
											       } 
												 
												?>
                                                <input name="distype" id="distype" type="hidden" value="<?php echo $settinginfo->discount_type;?>" />
                                                <input name="sdtype" id="sdtype" type="hidden" value="<?php echo $settinginfo->service_chargeType;?>" />
                                            <input name="invoice_discount" class="text-right" id="discount" type="number" placeholder="0.00" onkeyup="sumcalculation()" value="<?php echo $discount;?>" />
                                            
                                            </strong>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong>Service Charge</strong></td>
                                    <td class="text-right" style="width:28%">
                                            <strong>
                                            <input name="service_charge" class="text-right" id="scharge" type="number" placeholder="0.00" onkeyup="sumcalculation()" value="<?php echo $servicecharge;?>" />
                                           
                                            </strong>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong>Vat</strong></td>
                                    <td class="text-right" style="width:28%"><input id="vat" name="vat" type="hidden" value="<?php echo $calvat;?>" />
                                            <strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $calvat;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                <tr>
                                    <td class="text-right" style="width: 49.4%;"><strong>Grand Total</strong></td>
                                    <td class="text-right" style="width:28%"><input name="vat" type="hidden" value="<?php echo $calvat;?>" />
                                    <input name="tgtotal" type="hidden" value="<?php echo $calvat+$itemtotal+$sdamount-$disamount;?>" id="tgtotal" />
                                            <input name="orginattotal" id="orginattotal" type="hidden" value="<?php echo $calvat+$itemtotal+$sdamount-$disamount;?>" /><input name="grandtotal" id="grandtotal" type="hidden" value="<?php echo $calvat+$itemtotal+$sdamount-$disamount;?>" /><?php if($currency->position==1){echo $currency->curr_icon;}?> <strong id="gtotal"><?php echo $calvat+$itemtotal+$sdamount-$disamount;?></strong> <?php if($currency->position==2){echo $currency->curr_icon;}?>
                                        </td>
                                    <td class="text-right" style="width:12.6%;">&nbsp;</td>
                                    </tr>
                                
                                </table>
                            </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="fixedclasspos">
                                                            <div class="bottomarea">
                                                                     <div class="row">
                                                                        <div class="col-sm-6">
                                                                        <div class="col-sm-12">
                                                                            <input type="submit" id="add_payment" class="btn btn-success btn-large cusbtn" name="add-payment" value="Order Update">
                                                                        </div>
                                                                        </div>
                                                                        
                                                                     </div>
                                                                </div>
                                                        </div>
                     </form>   
                </div>
                    </div>
        </div>
    </div>
 <script>

$( window ).load(function() {
  // Run code
  $(".sidebar-mini").addClass('sidebar-collapse');
});
$(document).ready(function () {
	"use strict";
    // select 2 dropdown 
    $("select.form-control:not(.dont-select-me)").select2({
        placeholder: "Select option",
        allowClear: true
    });

      //form validate
    $("#validate").validate();
    $("#add_category").validate();
    $("#customer_name").validate();

    $('.productclist').slimScroll({
        size: '3px',
        height: '345px',
        allowPageScroll: true,
        railVisible: true
    });

    $('.product-grid').slimScroll({
        size: '3px',
        height: '720px',
        allowPageScroll: true,
        railVisible: true
    });

});

$('body').on('keyup', '#product_name', function() {
        var product_name = $(this).val();
        var category_id = $('#category_id').val();
		var myurl= $('#posurl').val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });

 //Product search js
    /*$('body').on('change', '#category_id', function() {
        var product_name = $('#product_name').val();
        var category_id = $('#category_id').val();
		var myurl= $('#posurl').val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });  */  
	 function getslcategory(carid){
	    var product_name = $('#product_name').val();
        var category_id = carid;
		var myurl= $('#posurl').val();
		$.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
	 }  
//Product search button js
    $('body').on('click', '#search_button', function() {
        var product_name = $('#product_name').val();
        var category_id = $('#category_id').val();
		var myurl= $('#posurl').val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });    

//Product search button js
    $('body').on('click', '.select_product', function(e) {
        e.preventDefault();
		var panel = $(this);
        var pid = panel.find('.panel-body input[name=select_product_id]').val();
		var sizeid = panel.find('.panel-body input[name=select_product_size]').val();
		var catid = panel.find('.panel-body input[name=select_product_cat]').val();
		var itemname= panel.find('.panel-body input[name=select_product_name]').val();
		var varientname=panel.find('.panel-body input[name=select_varient_name]').val();
		var qty=1;
		var price=panel.find('.panel-body input[name=select_product_price]').val();
		var hasaddons=panel.find('.panel-body input[name=select_addons]').val();
		var existqty=$('#select_qty_'+pid).val();
		if ($('.exists_qty').length){
		 var existqty=$('#select_qty_'+pid).val();
		}
		else{
		var existqty=0;
		}
		var qty=parseInt(existqty)+parseInt(qty);
		//alert(existqty);
		var updateid=$("#updateid").val();
		if(hasaddons==0){
			var mysound=baseurl+"assets/";
		var audio =["beep-08b.mp3"];
		new Audio(mysound + audio[0]).play();
		var myurl= $('#carturl').val();
		var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid+'&orderid='+updateid;;
	 	 $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 	$('#addfoodlist').html(data);
					var total=$('#grtotal').val();
					var totalitem=$('#totalitem').val();
					$('#item-number').text(totalitem);
					$('#getitemp').val(totalitem);
					var tax=$('#tvat').val();
					//$('#vat').val(tax);
					var discount=$('#tdiscount').val();
					var tgtotal=$('#tgtotal').val();
					$('#calvat').text(tax);
					$('#invoice_discount').val(discount);
					$('#caltotal').text(tgtotal);
					$('#grandtotal').val(tgtotal);
					$('#orggrandTotal').val(tgtotal);
					$('#orginattotal').val(tgtotal);
			 } 
		});
		}
	 else{
			 var geturl=$("#addonexsurl").val();
			 var myurl =geturl+'/'+pid;
		     var dataString = "pid="+pid+"&sid="+sizeid+"&id="+catid;
			$.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 	 $('.addonsinfo').html(data);
				     $('#edit').modal('show');
					 var tax=$('#tvat').val();
					var discount=$('#tdiscount').val();
					var tgtotal=$('#tgtotal').val();
					$('#vat').val(tax);
					$('#calvat').text(tax);
					$('#invoice_discount').val(discount);
					$('#caltotal').text(tgtotal);
					$('#grandtotal').val(tgtotal);
					$('#orggrandTotal').val(tgtotal);
					$('#orginattotal').val(tgtotal);
			 } 
		});
		 }
    });
/*$('body').on('keyup', '#invoice_discount', function() {
  var total_price = $("#grandTotal").val();
  alert(total_price);
    inv_dis = $("#invoice_discount").val(),
    ser_chg = $("#service_charge").val(),
    sum = total_price+ser_chg - inv_dis;
    $("#grandTotal").val(sum.toFixed(2));
});
$('body').on('keyup', '#service_charge', function() {
  
});*/
 //Payment method toggle 
    $(document).ready(function(){
		<?php if($orderinfo->isthirdparty>0){?>
		$("#nonthirdparty").hide();
		$("#thirdparty").show();
		$("#delivercom").prop('disabled', false);
		$("#waiter").prop('disabled', true);
		$("#tableid").prop('disabled', true);
		$("#cardarea").show();
		<?php } else{?>
		$("#nonthirdparty").show();
		$("#thirdparty").hide();
		$("#delivercom").prop('disabled', true);
		$("#waiter").prop('disabled', false);
		$("#tableid").prop('disabled', false);
		$("#cardarea").hide();
		<?php }if($orderinfo->cutomertype==4){?>
		$("#nonthirdparty").show();
		$("#thirdparty").hide();
		$("#tblsec").hide();
		$("#delivercom").prop('disabled', true);
		$("#waiter").prop('disabled', false);
		$("#tableid").prop('disabled', true);
		$("#cardarea").hide();
		<?php } ?>
		 
        $(".payment_button").click(function(){
            $(".payment_method").toggle();

            //Select Option
            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: "Select option",
                allowClear: true
            });
        });
		
		$("#card_typesl").on('change', function(){ 
			var cardtype=$("#card_typesl").val();
			
			$("#card_type").val(cardtype);
			if(cardtype==4){
			$("#isonline").val(0);
			$("#cardarea").hide();
			$("#assigncard_terminal").val('');
			$("#assignbank").val('');
			$("#assignlastdigit").val('');
			}
			else if(cardtype==1){
			$("#isonline").val(0);
			$("#cardarea").show();
			}
			else{
				$("#isonline").val(1);
				$("#cardarea").hide();
				$("#assigncard_terminal").val('');
				$("#assignbank").val('');
				$("#assignlastdigit").val('');
				}
			/*if(cardtype==1){
				$("#cholder").show();
				$("#cnumber").show();
				}
			else{
				$("#cholder").hide();
				$("#cnumber").hide();
				}*/
		});
		$("#ctypeid").on('change', function(){ 
			var customertype=$("#ctypeid").val();
			if(customertype==3){
			$("#delivercom").prop('disabled', false);
			$("#waiter").prop('disabled', true);
			$("#tableid").prop('disabled', true);
			$("#nonthirdparty").hide();
			$("#thirdparty").show();
			}
			else if(customertype==4){
			    $("#nonthirdparty").show();
			    $("#thirdparty").hide();
				$("#tblsec").hide();
				$("#delivercom").prop('disabled', true);
				$("#waiter").prop('disabled', false);
			    $("#tableid").prop('disabled', true);
			}
			else{
				$("#nonthirdparty").show();
			    $("#thirdparty").hide();
				$("#delivercom").prop('disabled', true);
				$("#waiter").prop('disabled', false);
			    $("#tableid").prop('disabled', false);
				}
		});
    });
 </script>