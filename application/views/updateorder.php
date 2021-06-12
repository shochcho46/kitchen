<?php $webinfo= $this->webinfo;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Green Chilli is a simple Restaurent and Cafe website">

    <title><?php echo $title;?></title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url((!empty($this->settinginfo->favicon)?$this->settinginfo->favicon:'assets_web/images/favicon.png')) ?>">
    <script src="<?php echo base_url();?>assets_web/js/jquery-3.3.1.min.js"></script>
    
    <!--====== Plugins CSS Files =======-->
    <link href="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/themify-icons/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/animate-css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/metismenu/metisMenu.min.css" rel="stylesheet">

    <!--====== Custom CSS Files ======-->
    <link href="<?php echo base_url();?>assets_web/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/css/new.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/css/responsive.css" rel="stylesheet">
     <style>
        .ml-6 {
            margin-left: 6px;
        }

        .full-width {
            width: 100%;
        }

        .item-add-ons {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .item-add-ons .checkbox {
            display: flex;
            align-items: baseline;
        }

        .item-add-ons:last-child {
            border-bottom: 0;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .item-add-ons label {
            font-size: 14px;
        }

        .item-add-ons .cart_counter {
            border-radius: 4px;
            position: relative;
        }

        .item-add-ons .cart_counter .qty {
            padding-right: 22px;
            width: 68px;
            border-radius: 4px;
            height: 30px;
            text-align: left;
            padding-left: 9px;
            color: #6d6d6d;
            font-size: 14px;
        }

        .item-add-ons .cart_counter .items-count {
            position: absolute;
            right: -2px;
            line-height: 15px;
            padding: 0 4px;
            border: 0;
            font-size: 8px;
        }

        .item-add-ons .cart_counter .items-count:hover,
        .item-add-ons .cart_counter .items-count:focus {
            background: transparent;
            color: #04be51;
        }

        .item-add-ons .cart_counter .items-count.increase {
            top: 2px;
        }

        .item-add-ons .cart_counter .items-count.reduced {
            bottom: 2px;
        }

        .modal-addons .simple_btn {
            background: #04be51;
            color: #fff;
            padding: 0 25px;
            border-radius: 25px;
            line-height: 35px;
            margin-top: 0;
        }

    </style>
    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
    <![endif]-->
</head>

<body>
 <div class="modal fade" id="addons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-addons">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Food Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body addonsinfo">
                </div>
                
            </div>
        </div>
    </div>               
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
                    <a class="" href="<?php echo base_url();?>updatemyorder/<?php echo $orderinfo->order_id;?>">
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
                <div class="row category_menu">
                    <div class="col-md-12">  <?php if($this->session->flashdata('message')) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('message') ?>
                    </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('exception')) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('exception') ?>
                    </div>
                    <?php } ?>
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo validation_errors() ?>
                    </div>
                    <?php } 
                    //echo "hdf".$this->session->userdata('CusUserID');
                    ?>
                        <div class="category_slider owl-carousel">
                        	<?php $c=0;
							foreach($categorylist as $category){
							$c++;
							$pgetcat = str_replace(' ', '', $category->Name);
							$phcategoryname = preg_replace("/[^a-zA-Z0-9\s]/", "", $pgetcat);
							?>
                            <div class="item">
                                <div class="img_area">
                                    <a href="#<?php echo $phcategoryname.$c;?>" class="goto">
                                        <img src="<?php echo base_url(!empty($category->CategoryImage)?$category->CategoryImage:'assets/img/icons/default.jpg'); ?>" alt="#" height="62">
                                    </a>
                                </div>
                                <h6 class="category_name"><?php echo $category->Name;?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>

    </header>
    <!--END HEADER TOP-->
    <?php $op=0;
	foreach($categorylist as $category){
	$op++;
	$getcat = str_replace(' ', '', $category->Name);
	$hcategoryname = preg_replace("/[^a-zA-Z0-9\s]/", "", $getcat);
	?>
    <div class="product_sec sec_mar only-sm" id="<?php echo $hcategoryname.$op;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h5 class="sm_heading"><?php echo $category->Name;?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                	<?php $allcat="";
					foreach($category->sub as $subcat){
						$allcat.=$subcat->CategoryID.",";						
					}
					$mainwithsub=$allcat.$category->CategoryID;
					$condition="item_foods.CategoryID IN($mainwithsub)";
					$itemlist=$this->hungry_model->qrmenue($condition);
						$k=0;
						foreach($itemlist as $item){
						$k++;
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
                    <div class="product product--card d-flex align-items-center">
                        <div class="product__thumbnail">
                            <img src="<?php echo base_url(!empty($item->medium_thumb)?$item->medium_thumb:'assets/img/no-image.png'); ?>" class="hoverImg" alt="Product Image">
                        </div>

                        <div class="product_info">

                            <div class="product-desc">
                                <a href="<?php echo base_url().'app-details-update/'.$item->ProductsID.'/'.$item->variantid.'/'.$orderinfo->order_id;?>" class="menu_title"><?php echo $item->ProductName?></a>
                                <p><?php echo substr($item->descrip,0,60); ?></p>
                            </div>

                            <div class="price_area">
                                <div class="d-flex align-items-center">
                                    <p class="price"><?php echo $item->price;?></p>
                                    <a href="#" class="variant_btn"><?php echo $item->variantName;?></a>
                                </div>
                                <?php if($getadons==1){?>
                                <input name="sizeid" type="hidden" id="sizeid_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->variantid;?>" />
                        		<input type="hidden" name="catid" id="catid_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->CategoryID;?>">
                        		<input type="hidden" name="itemname" id="itemname_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->ProductName;?>">
                        		<input type="hidden" name="varient" id="varient_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->variantName;?>">
                        		<input type="hidden" name="cartpage" id="cartpage_<?php echo $item->CategoryID.$k;?>" value="1">
                         		<input name="itemprice" type="hidden" value="<?php echo $item->price;?>" id="itemprice_<?php echo $item->CategoryID.$k;?>" />

									 <?php $myid2=$item->CategoryID.$item->ProductsID.$item->variantid;
									if(count($this->cart->contents())>0){
											$allid2="";
											foreach ($this->cart->contents() as $cartitem){	
												if($cartitem['id']==$myid2){ $allid2.=$myid2.",";?>
                                                <button class="simple_btn d-none" id="backadd<?php echo $item->CategoryID.$k;?>" onClick="addonsitemqr('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)">
                                    <span>add</span>
                                </button>
                                    <div class="cart_counter active" id="removeqtyb<?php echo $item->CategoryID.$k;?>">
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemreduce('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="reduced items-count" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="qty" id="sst<?php echo $item->CategoryID.$k;?>" maxlength="12" value="<?php echo $cartitem['qty'];?>" title="Quantity:" class="input-text qty" onchange="changeqty('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" readonly>
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemincrese('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="increase items-count" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
											<?php } }
											$str2 = implode(',',array_unique(explode(',', $allid2)));
										$myvalue2=trim($str2,',');
										if($myid2!=$myvalue2){?>
										<button class="simple_btn" id="backadd<?php echo $item->CategoryID.$k;?>" onClick="addonsitemqr('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)">
                                    <span>add</span>
                                </button>
                                <div class="cart_counter hidden_cart" id="removeqtyb<?php echo $item->CategoryID.$k;?>">
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemreduce('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="reduced items-count" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="qty" id="sst<?php echo $item->CategoryID.$k;?>" maxlength="12" value="<?php echo $cartitem['qty'];?>" title="Quantity:" class="input-text qty" onchange="changeqty('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" readonly>
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemincrese('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="increase items-count" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
										<?php }
										}
										else{
									?>
								<button class="simple_btn" id="backadd<?php echo $item->CategoryID.$k;?>" onClick="addonsitemqr('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)">
                                    <span>add</span>
                                </button>
								<div class="cart_counter hidden_cart" id="removeqtyb<?php echo $item->CategoryID.$k;?>">
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemreduce('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="reduced items-count" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="qty" id="sst<?php echo $item->CategoryID.$k;?>" maxlength="12" value="1" title="Quantity:" class="input-text qty" onchange="changeqty('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" readonly>
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemincrese('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="increase items-count" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
								<?php } }
								else{
								?>
                                <input name="sizeid" type="hidden" id="sizeid_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->variantid;?>" />
                        		<input type="hidden" name="catid" id="catid_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->CategoryID;?>">
                        		<input type="hidden" name="itemname" id="itemname_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->ProductName;?>">
                        		<input type="hidden" name="varient" id="varient_<?php echo $item->CategoryID.$k;?>" value="<?php echo $item->variantName;?>">
                        		<input type="hidden" name="cartpage" id="cartpage_<?php echo $item->CategoryID.$k;?>" value="1">
                         		<input name="itemprice" type="hidden" value="<?php echo $item->price;?>" id="itemprice_<?php echo $item->CategoryID.$k;?>" />
                               	<?php $myid=$item->CategoryID.$item->ProductsID.$item->variantid;
								if(count($this->cart->contents())>0){	
								//echo "hi";								
									$allid="";
									foreach ($this->cart->contents() as $cartitem){	
									//print_r($cartitem);									
										if($cartitem['id']==$myid){ $allid.=$myid.","; //echo $myid;?>
                                <button class="simple_btn d-none" id="backadd<?php echo $item->CategoryID.$k;?>" onClick="appcart('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)">
                                    <span>add</span>
                                </button>
                                <div class="cart_counter active" id="removeqtyb<?php echo $item->CategoryID.$k;?>">
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemreduce('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="reduced items-count" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="qty" id="sst<?php echo $item->CategoryID.$k;?>" maxlength="12" value="<?php echo $cartitem['qty'];?>" title="Quantity:" class="input-text qty" onchange="changeqty('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" readonly>
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemincrese('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="increase items-count" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <?php }else if($cartitem['id']!=$myid){}?>
                                        
										<?php  }
										$str = implode(',',array_unique(explode(',', $allid)));
										$myvalue=trim($str,',');
										if($myid!=$myvalue){?>
										<button class="simple_btn" id="backadd<?php echo $item->CategoryID.$k;?>" onClick="appcart('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)">
                                    <span>add</span>
                                </button>
                                <div class="cart_counter hidden_cart" id="removeqtyb<?php echo $item->CategoryID.$k;?>">
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemreduce('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="reduced items-count" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="qty" id="sst<?php echo $item->CategoryID.$k;?>" maxlength="12" value="1" title="Quantity:" class="input-text qty" onchange="changeqty('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" readonly>
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemincrese('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="increase items-count" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
										<?php }
								 }
								else{
									//echo "hello";
								?>
                                <button class="simple_btn" id="backadd<?php echo $item->CategoryID.$k;?>" onClick="appcart('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)">
                                    <span>add</span>
                                </button>
                                <div class="cart_counter hidden_cart" id="removeqtyb<?php echo $item->CategoryID.$k;?>">
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemreduce('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="reduced items-count" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="qty" id="sst<?php echo $item->CategoryID.$k;?>" maxlength="12" value="1" title="Quantity:" class="input-text qty" onchange="changeqty('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" readonly>
                                    <button id="<?php echo $item->CategoryID.$k;?>" onclick="itemincrese('<?php echo $item->ProductsID;?>','<?php echo $item->variantid;?>',<?php echo $item->CategoryID.$k;?>)" class="increase items-count" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <?php } } ?>
                            </div>

                        </div>
                    </div>
                    
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
    
     <?php if($this->cart->total()>0){
            $display="block";
            }else{
               $display="none"; 
            }
            ?>
    <div class="fixed_area only-sm" id="fixedarea" style="display:<?php echo $display;?>;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="cart_sm" id="cartitemandprice">
                           <?php  $totalqty=0;
                            $totalamount=0;
                            if($this->cart->contents()>0){ 
                            $totalqty= count($this->cart->contents());
							$itemprice=0;
							foreach ($this->cart->contents() as $item){
								if(!empty($item['addonsid'])){
											$itemprice=$itemprice+$item['addontpr'];
											}
										else{
											$itemprice=$itemprice;
											}
								}
                            $totalamount=$itemprice+$this->cart->total();	
                            echo '<p>'.$totalqty.' Item(s) in cart</p>
                                <h6 class="mb-0">'.$totalamount.'</h6>';
                            } ?>
                        </div>
                        <a href="<?php echo base_url();?>update-summery/<?php echo $orderinfo->order_id;?>" class="btn mr-2">Update Summery <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
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
            loop: false,
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
                }, 300);
                return false;
            });
        }
        scrollNav();

        $(".simple_btn").click(function() {
            $(this).addClass("d-none");
            $(this).siblings(".cart_counter").addClass("active");
			//$(this).siblings(".qty").val(1);
        });
		$(".adonsclose").click(function() {
			var id= $("#mainqrid").val();
           $("#backadd"+id).removeClass("d-none");    
		   $("#removeqtyb"+id).removeClass("active");
		   $("#removeqtyb"+id).addClass("hidden_cart"); 
        });
function changeqty(pid,vid,id) {
    var getqty = $("#sst" + id).val();
    var dataString = "CartID=" + rowid + '&qty=' + getqty;
    var myurl = base_url + 'cartupdate';
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function (data) {
            //$("#cartupdate").html(data);
            /* $("input[name='demo_vertical']").TouchSpin({
             min: 1,
             verticalbuttons: true
             });*/
        }
    });
}
function itemreduce(pid,vid,id) {
    var result = document.getElementById('sst' + id);
    var sstid = result.value;
    if (!isNaN(sstid) && sstid > 0) {
        result.value--;
        //return false;
    }
	if(sstid<=1){
		//alert(sstid+"-"+id);
		$("#sst"+ id).val(1);
	 $("#backadd"+id).removeClass("d-none");
	 $("#removeqtyb"+id).removeClass("active");
	 $("#removeqtyb"+id).addClass("hidden_cart");
	}
	     var reduce="del";
		  var qty=sstid;
         var itemname=$("#itemname_"+id).val();
		 var sizeid=$("#sizeid_"+id).val();
		 var varientname=$("#varient_"+id).val();
		 var price=$("#itemprice_"+id).val();
		 var catid=$("#catid_"+id).val();
	     var myurl ='<?php echo base_url();?>hungry/deltocartqr/';
		 var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid+'&Udstatus='+reduce;
		 $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				  $("#cartitemandprice").html(data);
				  $("#fixedarea").show();
			 } 
		});
}
function itemincrese(pid,vid,id) {
    var result = document.getElementById('sst' + id);
    var sstid = result.value;
    if (!isNaN(sstid)) {
        result.value++;
        //return false;
    }
		 var reduce="addstatus";
 		 var itemname=$("#itemname_"+id).val();
		 var sizeid=$("#sizeid_"+id).val();
		 var varientname=$("#varient_"+id).val();
		 var qty=$("#sst"+id).val();
		 var price=$("#itemprice_"+id).val();
		 var catid=$("#catid_"+id).val();
	     var myurl ='<?php echo base_url();?>addtocartqr/';
		 var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid+'&Udstatus='+reduce;
		 $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				  $("#cartitemandprice").html(data);
				  $("#fixedarea").show();
			 } 
		});
}
function appcart(pid,vid,id){
		 $("#sst"+ id).val(1);
	     var itemname=$("#itemname_"+id).val();
		 var sizeid=$("#sizeid_"+id).val();
		 var varientname=$("#varient_"+id).val();
		 var qty=$("#sst"+id).val();
		 var price=$("#itemprice_"+id).val();
		 var catid=$("#catid_"+id).val();
		 var reduce="insert";
	     var myurl ='<?php echo base_url();?>addtocartqr/';
		 var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid+'&Udstatus='+reduce;
		 $.ajax({
		 	 type: "POST",
			 url: myurl,
			 dataType: "text",
			 async: false,
			 data: dataString,
			 success: function(data) {
				  //alert("Success!!");
				  $("#cartitemandprice").html(data);
				  $("#fixedarea").show();
			 } 
		});
	}
function addonsitemqr(id,sid,type){
		 var myurl='<?php echo base_url();?>hungry/addonsitemqr/'+id;
		 var dataString = "pid="+id+"&sid="+sid+'&type='+type;
		  $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 $('.addonsinfo').html(data);
				 $('#addons').modal('show');
			 } 
		});
	}
function addonsfoodtocart(pid,id,type){
	var addons = [];
	var adonsqty=[];
	 var allprice = 0;
	 var adonsprice = [];
	 var adonsname=[];
				$('input[name="addons"]:checked').each(function() {
					var adnsid=$(this).val();
					var adsqty=$('#addonqty_'+adnsid).val();
					adonsqty.push(adsqty);
				  	addons.push($(this).val());
					
					allprice += parseFloat($(this).attr('role'))*parseInt(adsqty);
					adonsprice.push($(this).attr('role'));
					adonsname.push($(this).attr('title'));
				});
	 var mid= $("#mainqrid").val();	
	 //alert(mid);
	 var reduce="insert";
	 var catid=$("#catid_1"+mid).val();
	 var itemname=$("#itemname_1"+mid).val();
	 var sizeid=$("#sizeid_1"+mid).val();
	 var varientname=$("#varient_1"+mid).val();
	 var qty=$("#sst61_"+mid).val();
	 var price=$("#itemprice_1"+mid).val();	
	 var myurl ='<?php echo base_url();?>addtocartqr/';
	 var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid+'&addonsid='+addons+'&allprice='+allprice+'&adonsunitprice='+adonsprice+'&adonsqty='+adonsqty+'&adonsname='+adonsname+'&Udstatus='+reduce;
		$.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {				 
				 $("#backadd"+mid).addClass("d-none");
				 $('#addons').modal('hide');  
				 $("#cartitemandprice").html(data);
				 $("#fixedarea").show();
				 } 
		});

	}
    </script>
</body>

</html>
