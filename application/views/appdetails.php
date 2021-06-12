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
    <script src="<?php echo base_url();?>assets_web/js/jquery-3.3.1.min.js"></script>
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

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
    <![endif]-->
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

    <section class="item_details only-sm mt-4">
        <div class="container-fluid">
            <div class="row" style="padding-bottom:65px;">
                <div class="col-12">
                    <div class="img_part">
                        <img src="<?php echo base_url(!empty($iteminfo->bigthumb)?$iteminfo->bigthumb:'dummyimage/555x370.jpg'); ?>" class="img-fluid" alt="<?php echo $iteminfo->ProductName;?>">
                    </div>
                    <div class="item_info">
                        <h6 class="mt-3"><?php echo $iteminfo->ProductName;?></h6>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <p class="mb-0"><i class="fa fa-clock-o mr-2"></i>00:15 MIN</p>
                                <a href="#" class="variant_btn"><?php echo $iteminfo->variantName?></a>
                            </div>
                            <div class="">
                                <p class="price"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo $iteminfo->price;?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></p>
                            </div>
                        </div>
                        
                        <p><?php echo $iteminfo->descrip;?></p>
                        
                        <div class="d-flex align-items-center justify-content-between my-4">
                            <div class="cart_counter d-flex">
                                <button onclick="var result = document.getElementById('sst6999_det'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input type="text" name="qty" id="sst6999_det" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                <button onclick="var result = document.getElementById('sst6999_det'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <input name="sizeid" type="hidden" id="sizeid_999det" value="<?php echo $iteminfo->variantid;?>" />
                                <input type="hidden" name="catid" id="catid_999det" value="<?php echo $iteminfo->CategoryID;?>">
                                <input type="hidden" name="itemname" id="itemname_999det" value="<?php echo $iteminfo->ProductName;?>">
                                <input type="hidden" name="varient" id="varient_999det" value="<?php echo $iteminfo->variantName;?>">
                                <input type="hidden" name="cartpage" id="cartpage_999det" value="0">
                                <input name="itemprice" type="hidden" value="<?php echo $iteminfo->price;?>" id="itemprice_999det" />
                                 <?php $this->db->select('*');
									$this->db->from('menu_add_on');
									$this->db->where('menu_id',$iteminfo->ProductsID);
									$query = $this->db->get();
									$getadons="";
									if ($query->num_rows() > 0) {
									$getadons = 1;
									}
									else{
										$getadons =  0;
										}
										
									$dayname= date('l');
									$this->db->select('*');
									$this->db->from('foodvariable');
									$this->db->where('foodid',$iteminfo->ProductsID);
									$this->db->where('availday',$dayname);
									$query = $this->db->get();
									$avail=$query->row();
									$availavail='';
									$addtocart=1;
									if(!empty($avail)){
												  $availabletime=explode("-",$avail->availtime);
												    $deltime1 =strtotime($availabletime[0]);
													$deltime2 =strtotime($availabletime[1]);
													$Time1=date("h:i:s A", $deltime1);
													$Time2=date("h:i:s A", $deltime2);
													$curtime=date("h:i:s A");
													$gettime = strtotime(date("h:i:s A"));
													if(($gettime>$deltime1) && ($gettime<$deltime2)){
														$availavail='';
														$addtocart=1;
														}
													else{
														$availavail='<h6 class="mt-4">Unavailable</h6>';
														$addtocart=0;
														}
									}
										if($addtocart==1){				
										if($getadons==1){?>
                            <button class="simple_btn" onclick="addonsitemqr(<?php echo $iteminfo->ProductsID;?>,<?php echo $iteminfo->variantid;?>,'other')" data-toggle="modal" data-target="#addons" data-dismiss="modal">
                                <span>add</span>
                            </button>
                            <?php } else{?>
                            <button class="simple_btn"  onclick="appcart(<?php echo $iteminfo->ProductsID;?>,999,'det')">
                                <span>add</span>
                            </button>
                            <?php } } else{ echo $availavail;} ?>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a href="<?php echo base_url();?>qr-app-cart" class="btn mr-2">View Cart <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </section>


    <!--====== SCRIPTS JS ======-->
     <!--====== SCRIPTS JS ======-->
    <script src="<?php echo base_url();?>assets_web/js/jquery-3.3.1.min.js"></script>
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
                }, 300);
                return false;
            });
        }
        scrollNav();

       /* $(".simple_btn").click(function() {
            $(this).addClass("d-none");
            $(this).siblings(".cart_counter").addClass("active");
        });*/

        //        $(window).on('scroll', function() {
        //            if ($(window).scrollTop() > 100) {
        //                $('.category_menu').addClass('menu_fixed');
        //            } else {
        //                $('.category_menu').removeClass('menu_fixed');
        //            }
        //        });
        
        function appcart(pid,vid,id){
		 //$("#sst"+ id).val(1);
	     var itemname=$("#itemname_999"+id).val();
		 var sizeid=$("#sizeid_999"+id).val();
		 var varientname=$("#varient_999"+id).val();
		 var qty=$("#sst6999_"+id).val();
		 var price=$("#itemprice_999"+id).val();
		 var catid=$("#catid_999"+id).val();
		 var reduce="insert";
	     var myurl ='<?php echo base_url();?>hungry/addtocartqr2/';
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
	 var myurl ='<?php echo base_url();?>hungry/addtocartqr2/';
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
