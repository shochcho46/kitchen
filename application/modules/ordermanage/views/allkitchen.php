<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<div id="cancelord" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('can_ord');?></strong>
            </div>
            <div class="modal-body">
            	<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                        <div class="form-group row">
                            <label for="payments" class="col-sm-4 col-form-label"><?php echo display('ordid');?></label>
                            <div class="col-sm-7 customesl">
                            	<span id="canordid"></span>
                                <input name="mycanorder" id="mycanorder" type="hidden" value=""  />
                                <input name="mycanitem" id="mycanitem" type="hidden" value=""  />
                                <input name="myvarient" id="myvarient" type="hidden" value=""/>
                                <input name="mykid" id="mykid" type="hidden" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="canreason" class="col-sm-4 col-form-label"><?php echo display('can_reason');?></label>
                            <div class="col-sm-7 customesl">
                            	  <textarea name="canreason" id="canreason" cols="35" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                        	<div class="col-sm-11" style="padding-right:0;">
                            <button type="button" class="btn btn-success w-md m-b-5" id="itemcancel"><?php echo display('submit');?></button>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>
    		</div>
     
            </div>
        </div>

    </div>

<div class="row">
                   <div class="panel">
                     <div class="panel-body">
                         <div class="text-right"><a style="display:none;" id="fullscreen" href="#"><i class="pe-7s-expand1"></i></a><a href="<?php echo base_url();?>ordermanage/order/allkitchen" class="btn btn-primary btn-md"><i class="fa fa-load-circle" aria-hidden="true"></i>
<?php echo display('ref_page')?></a></div>
                     <div class="row kitchen-tab">
    <div class="col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-pills">
        	<?php $x=0;
			foreach($kitchenlist as $kitchen){ $x++;
			?>
            <li class="<?php if($x==1){echo "active";}?>"><a href="#tab<?php echo $x;?>" data-toggle="tab"><?php echo $kitchen->kitchen_name;?></a></li>
            <?php } ?>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
        <?php 
		 $this->load->model('ordermanage/order_model',	'ordermodel');
		if(!empty($kitcheninfo)){
			
			$k=0;
				foreach($kitcheninfo as $kitchenorderinfo){
					$k++;
					?>
                 <div class="tab-pane fade <?php if($k==1){echo "in active";}?>" id="tab<?php echo $k;?>">
                <div class="panel-body">
                    <div class="grid">
                    <div class="grid-sizer col-vxs-12 col-xs-6 col-md-4 col-lg-3 col-xlg-4"></div>
					    <?php if(!empty($kitchenorderinfo)){
							$t=0;
							 foreach($kitchenorderinfo['orderlist'] as $orderinfo){
								 $t++;
									   ?>
                                 <div class="grid-col col-vxs-12 col-xs-6 col-md-4 col-lg-3 col-xlg-4" id="singlegrid<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
                            <div class="grid-item-content" id="gridcontent<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
                            <?php 
							$alliteminfo=$this->order_model->customerorderkitchen($orderinfo->order_id,$orderinfo->kitchenid);
							//print_r($alliteminfo);
							$allchecked2="";
							$date_arr=array();
							$c=0;
							foreach($alliteminfo as $single){
								$date_arr[$c]=$single->cookedtime;
								$allisexit=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$orderinfo->order_id)->where('kitchenid',$orderinfo->kitchenid)->where('itemid',$single->menu_id)->where('varient',$single->variantid)->get()->num_rows();
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
							?>
                                <div class="food_item <?php if($isaccept==0){ echo "pending";}?>" id="topsec<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
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
                                        <h4 class="kf_info">Cooking time: <span><?php echo max($date_arr);?></span></h4>
                                    </div>
                                    <div class="food_select" id="acceptitem<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
                                    	<?php 
										 $iteminfo=$this->ordermodel->customerorderkitchen($orderinfo->order_id,$orderinfo->kitchenid);
										 $l=0;
										 foreach($iteminfo as $item){
											 $l++;
											 $ischecked=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$orderinfo->order_id)->where('kitchenid',$orderinfo->kitchenid)->where('itemid',$item->menu_id)->where('varient',$item->variantid)->get()->num_rows();?>
                                        <div class="single_item">
                                            <div class="align-center justify-between" style="position: relative; margin-bottom:13px;">
                                                <input id='chkbox-<?php echo $l.$item->kitchenid.$orderinfo->order_id;?>' usemap="<?php echo $orderinfo->order_id;?>" title="<?php echo $item->varientid;?>" alt="<?php echo $isaccept;?>" type='checkbox'  <?php if($ischecked==1 && $isaccept==0){ echo "checked disabled";} if($isaccept==1 && $item->food_status==1){ echo "checked";}?> class="individual" name="item<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>" value="<?php echo $item->menu_id;?>"/>
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
                                                <input id='allSelect<?php echo $orderinfo->order_id;?><?php echo $orderinfo->kitchenid;?>' name="item<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>" type='checkbox' class="selectall" value=""/>
                                                <label for='allSelect<?php echo $orderinfo->order_id;?><?php echo $orderinfo->kitchenid;?>'>
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    All
                                                </label>
                                            </div>
                                            
                                            <div style="display:<?php if($isaccept==1){ echo "block"; }else{ echo "none";}?>" id="isprepare<?php echo $orderinfo->order_id;?><?php echo $orderinfo->kitchenid;?>">
                                                <button class="btn btn-success w-smd lh-30" onclick="onprepare(<?php echo $orderinfo->order_id;?>,<?php echo $orderinfo->kitchenid;?>)">Prepared</button>
                                                <button class="btn btn-info lh-30" onclick="printtoken(<?php echo $orderinfo->order_id;?>,<?php echo $orderinfo->kitchenid;?>)"><i class="fa fa-print"></i></button>
                                            </div>
                                            <div style="display:<?php if($isaccept==0){ echo "block"; }else{ echo "none";}?>" id="isongoing<?php echo $orderinfo->order_id;?><?php echo $orderinfo->kitchenid;?>">
                                                <button class="btn btn-success w-smd lh-30" onclick="orderaccept(<?php echo $orderinfo->order_id;?>,<?php echo $orderinfo->kitchenid;?>)">Accept</button>
                                                <button class="btn btn-danger w-smd lh-30" onclick="ordercancel(<?php echo $orderinfo->order_id;?>,<?php echo $orderinfo->kitchenid;?>)">Reject</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                 
								<?php  }  
								if(empty($kitchenorderinfo['orderlist'])){									
									echo '<div class="col-sm-12"><div style="text-align: center;"><h3>No Order Found!!!</h3> <img src="'.base_url().'assets/img/nofood.png" width="400" /></div></div>';
									}
							 }
							 ?>
                        </div>
                </div>
            </div>
					<?php }
			}
			
			?>
            
        </div>
    </div>

</div>
                      </div>
                   </div>
              </div>


<div class="modal fade modal-warning" id="posprint" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-body" id="kotenpr">
                            
                        </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
<script>
$( window ).load(function() {
  // Run code
  $(".sidebar-mini").addClass('sidebar-collapse');
   setInterval(function(){ 
  window.location.href = "<?php echo base_url();?>ordermanage/order/allkitchen";
 }, 300000);
 
});

function printJobComplete() {
  $("#kotenpr").empty();
}
$('input[type="checkbox"]').click(function(){
    
            if($(this).is(":checked")){
               var menuid=$(this).val();
			   var orderid=$(this).attr('usemap');
			   var varient=$(this).attr('title');
			   var isaccept=$(this).attr('alt');
			   var dataString = 'orderid='+orderid+'&menuid='+menuid+'&varient='+varient+'&status=1';
            }
            else if($(this).is(":not(:checked)")){
                 var menuid=$(this).val();
				 var orderid=$(this).attr('usemap');
				  var varient=$(this).attr('title');
				  var isaccept=$(this).attr('alt');
				  var dataString = 'orderid='+orderid+'&menuid='+menuid+'&varient='+varient+'&status=0';
            }
           if(isaccept==1){
                $.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ordermanage/order/itemisready",
				data: dataString,
				success: function(data){
					
				    }
			    });
            }
          
        });
function orderaccept(ordid,kitid){
	var values = $('input[name="item'+ordid+kitid+'"]:checked').map(function() {
      return $(this).val();
    }).get().join(',');
var varient = $('input[name="item'+ordid+kitid+'"]:checked').map(function() {
      		return $(this).attr('title');
    		}).get().join(',');	
var allvarient=varient+',';
if(values==''){
	swal("Check Item", "Please check at least one item!!", "warning");
	return false;
	}
			 var dataString = 'orderid='+ordid+'&kitid='+kitid+'&itemid='+values+'&varient='+allvarient;
			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ordermanage/order/itemacepted",
				data: dataString,
				success: function(data){
					if(data==1){
					$('input[name="item'+ordid+kitid+'"]:checked').removeAttr('disabled');
					$("#topsec"+ordid+kitid).removeClass("pending");
					$("#isprepare"+ordid+kitid).show();
					$("#isongoing"+ordid+kitid).hide();
					$('input[name="item'+ordid+kitid+'"]:checked').attr('alt',1);
					$('input[name="item'+ordid+kitid+'"]:checked').removeAttr('checked');
					}
					else{
						$('input[name="item'+ordid+kitid+'"]:checked').attr('alt',1);
						$('input[name="item'+ordid+kitid+'"]:checked').prop( "disabled", true );
						}
					//$("#acceptitem"+ordid+kitid).html(data);
					/*if(data==1){
						swal("Accepted", "Item is Accepted", "success");
						}
						else{
						swal("Already Accept", "Item Already accepted Someone!!", "warning");
						}*/
					}
				});
			}
	function ordercancel(ordid,kitid){
		$('#cancelord').modal('show');
		var values = $('input[name="item'+ordid+kitid+'"]:checked:not(:disabled)').map(function() {
      		return $(this).val();
    		}).get().join(',');
		var varient = $('input[name="item'+ordid+kitid+'"]:checked:not(:disabled)').map(function() {
      		return $(this).attr('title');
    		}).get().join(',');	
		$("#canordid").text(ordid);
		$("#mycanorder").val(ordid);
		$("#mykid").val(kitid);
		$("#mycanitem").val(values);
		$("#myvarient").val(varient+',');
	}
	function itemcancel(){
	/*var ordid=$("#mycanorder").val();
	var kid=$("#mykid").val();
	var itemid=$("#mycanitem").val();
	var varient=$("#myvarient").val();
	var reason=$("#canreason").val();
	var dataString = 'reason='+reason+'&item='+itemid+'&orderid='+ordid+'&varient='+varient+'&kid='+kid;
	$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>ordermanage/order/cancelitem",
			data: dataString,
			success: function(data){
				$('#cancelord').modal('hide');
				$("#singlegrid"+ordid+kid).html(data);
				 if($('#singlegrid'+ordid+kid).is(':empty')){
				  alert("is empty");
				  $("#singlegrid"+ordid+kid).remove();
				}
				
				swal("Rejected", "Your Item is Cancel", "success");
			}
		});*/
	
	}
	  $('body').on('click', '#itemcancel', function() {
		  	var ordid=$("#mycanorder").val();
			var kid=$("#mykid").val();
			var itemid=$("#mycanitem").val();
			var varient=$("#myvarient").val();
			var reason=$("#canreason").val();
			var dataString = 'reason='+reason+'&item='+itemid+'&orderid='+ordid+'&varient='+varient+'&kid='+kid;
			$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>ordermanage/order/cancelitem",
			data: dataString,
			success: function(data){
				$('#cancelord').modal('hide');
				$("#singlegrid"+ordid+kid).html(data);
				if (!$('#singlegrid'+ordid+kid).text().length) {
				}
				if($('#singlegrid'+ordid+kid).html().toString().replace(/ /g,'') == "") {
				$("#singlegrid"+ordid+kid).remove();
				var $container = $('.grid');
        $container.imagesLoaded(function() {
            $container.masonry({
                itemSelector: '.grid-col',
                columnWidth: '.grid-sizer',
                percentPosition: true
            });
        });

        $('a[data-toggle=tab]').each(function() {
            var $this = $(this);

            $this.on('shown.bs.tab', function() {

                $container.imagesLoaded(function() {
                    $container.masonry({
                        itemSelector: '.grid-col',
                        columnWidth: '.grid-sizer',
                        percentPosition: true
                    });
                });

            });
        });
				}
				//swal("Rejected", "Your Item is Cancel", "success");
			}
		});
		  });
		 
function onprepare(ordid,kitid){
	var values = $('input[name="item'+ordid+kitid+'"]:checked').map(function() {
      		return $(this).val();
    		}).get().join(',');
		var varient = $('input[name="item'+ordid+kitid+'"]:checked').map(function() {
      		return $(this).attr('title');
    		}).get().join(',');	
		var allvarient=varient+',';
		if(values==''){
		swal("Check Item", "Please check at least one item!!", "warning");
		return false;
		}
		var dataString = 'item='+values+'&orderid='+ordid+'&varient='+allvarient+'&kid='+kitid;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>ordermanage/order/markasdone",
			data: dataString,
			success: function(data){
				var numberOfChecked =$('input[name="item'+ordid+kitid+'"]:checkbox:checked').length;
				var totalCheckboxes = $('input[name="item'+ordid+kitid+'"]:checkbox').length;
				var delonefromall=totalCheckboxes-1;
				if(delonefromall==numberOfChecked || totalCheckboxes==numberOfChecked){
				$("#singlegrid"+ordid+kitid).remove();
				var $container = $('.grid');
        		$container.imagesLoaded(function() {
					$container.masonry({
						itemSelector: '.grid-col',
						columnWidth: '.grid-sizer',
						percentPosition: true
					});
				});
        		$('a[data-toggle=tab]').each(function() {
						var $this = $(this);
			
						$this.on('shown.bs.tab', function() {
			
							$container.imagesLoaded(function() {
								$container.masonry({
									itemSelector: '.grid-col',
									columnWidth: '.grid-sizer',
									percentPosition: true
								});
							});
			
						});
					});
				}
			}
        });
	}
function printtoken(ordid,kitid){
		var dataString = 'orderid='+ordid+'&kid='+kitid;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>ordermanage/order/printtoken",
			data: dataString,
			success: function(data){
				$("#kotenpr").html(data);
				const style = '@page { margin-top: 0px;font-size:18px; }';
				printJS({
					printable: 'kotenpr',
					onPrintDialogClose: printJobComplete,
					type: 'html',
					font_size: '32px;',
					style: style,
					scanStyles: false												
				  })
			}
        });
	}
</script>
