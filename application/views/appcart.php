<?php $webinfo= $this->webinfo;
$storeinfo=$this->settinginfo;
 $currency=$this->storecurrency;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Green Chilli is a simple Restaurent and Cafe website">

    <title><?php echo $title;?></title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url((!empty($this->settinginfo->favicon)?$this->settinginfo->favicon:'assets_web/images/favicon.png')) ?>">

    <!--====== Plugins CSS Files =======-->
    <link href="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/themify-icons/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/animate-css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/metismenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/clockpicker/clockpicker.min.css" rel="stylesheet">

    <!--====== Custom CSS Files ======-->
    <link href="<?php echo base_url();?>assets_web/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/css/new.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/css/responsive.css" rel="stylesheet">
     <script src="<?php echo base_url();?>assets_web/js/jquery-3.3.1.min.js"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
    <![endif]-->
</head>

<body>

    <!-- Preloader -->
    <div class="preloader"></div>

    <!--START HEADER TOP-->
    <header class="header_top_area only-sm">

        <div class="header_top light">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="sidebar-toggle-btn">
                        <button type="button" id="sidebarCollapse" class="btn">
                            <i class="ti-menu"></i>
                        </button>
                    </div>
                    <a class="" href="<?php echo base_url();?>qr-menu">
                        <img src="<?php echo base_url(!empty($webinfo->logo)?$webinfo->logo:'dummyimage/168x65.jpg'); ?>" alt="">
                    </a>
                    <div class="noti-part">
                        <?php
                        if($this->session->userdata('CusUserID')!=""){?>
                        <a href="<?php echo base_url().'apporedrlist';?>" style="cursor: pointer;"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>&nbsp;&nbsp;
                         <?php } ?>
                        <i class="fa fa-bell-o"></i>
                    </div>
                </nav>
                <nav id="sidebar" class="sidebar-nav">
                    <div id="dismiss">
                        <i class="ti-close"></i>
                    </div>
                    <ul class="metismenu list-unstyled" id="mobile-menu">
                        <?php
                        if($this->session->userdata('CusUserID')!=""){?>
                          <li><a href="<?php echo base_url().'apporedrlist';?>">My Order List</a></li>  
                        <?php } ?>
                       </ul>
                </nav>
                <div class="overlay"></div>
            </div>
        </div>

    </header>
    <!--END HEADER TOP-->

    <section class="item_cart only-sm mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="mycartlist">
                    <h6 class="cart_heading">Cart List</h6>
                    <?php $totalqty=0;
if(!empty($this->cart->contents())){ $totalqty= count($this->cart->contents());} ;?>
					<?php 
					$calvat=0;
					$discount=0;
					$itemtotal=0;
					$pvat=0;
					$totalamount=0;
					$subtotal=0;
					if($cart = $this->cart->contents()){
						 
								      $totalamount=0;
									  $subtotal=0;
									  $pvat=0;
									
									?>
                    <ul class="list-unstyled cart_list">
                    	<?php $i=0; 
						foreach ($cart as $item){
										$itemprice= $item['price']*$item['qty'];
										$iteminfo=$this->hungry_model->getiteminfo($item['pid']);
										$vatcalc=$itemprice*$iteminfo->productvat/100;
										$pvat=$pvat+$vatcalc;
										if($iteminfo->OffersRate>0){
											$discal=$itemprice*$iteminfo->OffersRate/100;
											$discount=$discal+$discount;
											}
										else{
											$discount=$discount;
											}
										if(!empty($item['addonsid'])){
											$nittotal=$item['addontpr'];
											$itemprice=$itemprice+$item['addontpr'];
											}
										else{
											$nittotal=0;
											$itemprice=$itemprice;
											}
										 $totalamount=$totalamount+$nittotal;
										 $subtotal=$subtotal+$item['price']*$item['qty'];
									$i++;
									?>
                        <li>
                            <h6><?php echo $item['name'];
                                if(!empty($item['addonsid'])){
											echo "<br>";
											echo $item['addonname'].' -Qty:'.$item['addonsqty'];
											}?> <span>(<?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $item['price'];?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}
								if(!empty($item['addonsid'])){
											echo "+";
											if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}
											echo $item['addontpr'];
											if($this->storecurrency->position=2){echo $this->storecurrency->curr_icon;}
											}
										?>)</span></h6>
                            <div class="d-flex">
                                <div class="cart_counter d-flex">
                                    <button onclick="updatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'del')" class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" name="qty" id="sst3" maxlength="12" value="<?php echo $item['qty'];?>" title="Quantity:" class="input-text qty">
                                        <button onclick="updatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'add')" class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                </div>
                                <button class="btn dlt_btn"  onclick="removetocart('<?php echo $item['rowid']?>')"><i class="fa fa-trash"></i></button>
                            </div>
                        </li>
                         <?php } ?> 
                        <li>
                            <h6>Sub Total</h6>
                            <p> <?php if(!empty($this->cart->contents())){
					$itemtotal=$totalamount+$subtotal;
									if($this->settinginfo->vat>0){
										$calvat=$itemtotal*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
					?><input type="hidden" class="form-control" id="cartamount" value="<?php echo $totalamount+$calvat-$discount;?>">
					
					<?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $itemtotal;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?><?php } ?></p>
                        </li>
                    </ul>
                   
                    <?php } ?>
                    <?php  $totalqty=0;
                            $totalamount=0;
							$pvat=0;
							$discount=0;
                            if($this->cart->contents()>0){ 
                            $totalqty= count($this->cart->contents());
							$itemprice=0;
							$pvat=0;
							$discount=0;
							foreach ($this->cart->contents() as $item){
										$itemprice= $item['price']*$item['qty'];
								        $iteminfo=$this->hungry_model->getiteminfo($item['pid']);
										$vatcalc=$itemprice*$iteminfo->productvat/100;
										$pvat=$pvat+$vatcalc;
										if($iteminfo->OffersRate>0){
											$discal=$itemprice*$iteminfo->OffersRate/100;
											$discount=$discal+$discount;
											}
										else{
											$discount=$discount;
											}
								if(!empty($item['addonsid'])){
											$itemprice=$itemprice+$item['addontpr'];
											}
										else{
											$itemprice=$itemprice;
											}	
										$totalamount=$itemprice+$totalamount;								
										}
                           	                           
								if($this->settinginfo->vat>0){
										$calvat=$totalamount*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
							/*if($this->settinginfo->discount_type==1){
					            $discount=$totalamount*$discount/100;
				            }
			                if($this->settinginfo==1){
					            $scharge=$totalamount*$scharge/100;
				            }*/
							?>
                             <ul class="list-unstyled cart_list">
                    	<li><h6>Vat</h6>
                        <p><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $calvat;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                        </li>
                        <li><h6>Discount</h6>
                        <p><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $discount;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                        </li>
                        <li><h6>Total</h6>
                        <p><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $itemtotal+$calvat-$discount;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            
            <form action="<?php echo base_url();?>hungry/placeorderqr" method="post" class="order_form">
            <input name="vat" id="vat" type="hidden" value="<?php echo $calvat;?>" />
            <input name="invoice_discount" id="invoice_discount" type="hidden" value="<?php echo $discount;?>" />
            <input name="orggrandTotal" id="orggrandTotal" type="hidden" value="<?php echo $totalamount;?>" />
            <div class="row">
                <div class="col-12">
                		<div class="form-group row mb-0">
                            <label for="table" class="col-6 col-form-label">Table</label>
                            <div class="col-6">
                                <input type="text" readonly class="form-control-plaintext text-right" id="table" value="<?php echo $this->session->userdata('tableid');?>">
                            </div>
                        </div>                		
                        <div class="form-group">
                            <label for="orderNotes" class="col-form-label">Order Notes</label>
                            <textarea type="text" class="form-control" id="orderNotes" name="ordernote"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="customerName" class="col-form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" name="customerName" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                            <input type="hidden" class="form-control" id="grandtotal" name="grandtotal" value="<?php echo $totalamount+$calvat-$discount;?>">
                            <input name="service_charge" type="hidden" value="0" />
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="check_order" style="padding-bottom: 65px;">
                        <h6 class="my-3">Place Order</h6>
                        <!-- /.End of product list table -->
                        <div class="payment-block" id="payment">
                               <?php if(!empty($shippinginfo)){
								   $p=0;
								   foreach($shippinginfo as $payment){
									   $p++;
									   ?>
 	                           <div class="payment-item">
                                <input type="radio" name="card_type" id="payment_method_cre<?php echo $p;?>" data-parent="#payment" data-target="#description_cre<?php echo $p;?>" value="<?php echo $payment->payment_method_id;?>" <?php if($payment->payment_method_id==4){ echo "checked";}?> class="">
                                <label for="payment_method_cre<?php echo $p;?>"> <?php echo $payment->payment_method;?> </label>
                            </div>
                            	<?php } } ?>
                            
                        </div>
                        <!-- /.End of payment method --> 
                        
                        <div class="fixed_area only-sm" style="padding:0;">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="d-flex align-items-center justify-content-between">
<input class="btn btn-success btn-block" style="border:none;" name="" type="submit" value="Place order" />
</div>
</div>
</div>
</div>
</div>
                    </div>
                </div>
            </div>
             </form>
        </div>
    </section>


    <!--====== SCRIPTS JS ======-->
    <script src="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/clockpicker/clockpicker.min.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="<?php echo base_url();?>assets_web/js/custom.js"></script>

    <script>
        $('.category_slider').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            nav: false,
            navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
            responsive: {
                0: {
                    items: 4
                },
                400: {
                    items: 4
                },
                480: {
                    items: 5
                },
                650: {
                    items: 6
                }
            }
        });

        function scrollNav() {
            $('.goto').click(function() {
                $(".active").removeClass("active");
                $(this).addClass("active");

                $('html, body').stop().animate({
                    scrollTop: $($(this).attr('href')).offset().top - 200
                }, 500);
                return false;
            });
        }
        scrollNav();

        $(".simple_btn").click(function() {
            $(this).addClass("d-none");
            $(this).siblings(".cart_counter").addClass("active");
        });
	  function updatecart(id,qty,status){
		if(status=="del" && qty==0){
			return false;
			}
		else{
		 var geturl='<?php echo base_url();?>hungry/cartupdateqr';
		 var dataString = "CartID="+id+"&qty="+qty+"&Udstatus="+status;
		  $.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 $('#mycartlist').html(data);
				 var cartamount=$("#cartamount").val();
				 var totalvat=$("#totalvat").val();
				 var subtotal=$("#mainsubtotal").val();
				 var totaldiscount=$("#totaldiscount").val();
				 $("#grandtotal").val(cartamount);
				 $("#vat").val(totalvat);
				 $("#invoice_discount").val(totaldiscount);
				 $("#orggrandTotal").val(subtotal);
			 } 
		});
		}
	}
	function removetocart(rid){
		 var geturl='<?php echo base_url();?>hungry/removetocartdetailsqr';
		 var dataString = "rowid="+rid;
		  $.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 $('#mycartlist').html(data);
				var cartamount=$("#cartamount").val();
				 var totalvat=$("#totalvat").val();
				 var totaldiscount=$("#totaldiscount").val();
				 var subtotal=$("#mainsubtotal").val();
				 $("#grandtotal").val(cartamount);
				 $("#vat").val(totalvat);
				 $("#invoice_discount").val(totaldiscount);
				 $("#orggrandTotal").val(subtotal);
					
			 } 
		});
		}
      </script>
</body>

</html>
