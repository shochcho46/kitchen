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
    .btn-xs{padding:4px;line-height: 1; }
    .cart_list li h6 {
    margin-bottom: 0;
    font-size: 14px;
    max-width: initial;
}
.text-nowrap{border:none;}
    </style>
    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
    <![endif]-->
</head>

<body>
 <div class="modal fade" id="vieworder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-addons">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Food Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body popview">
                </div>
                
            </div>
        </div>
    </div>               
    <!-- Preloader -->
    <div class="preloader"></div>

    <!--START HEADER TOP-->
    <header class="header_top_area only-sm">

        <div class="header_top2 light">
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
                        
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>

    </header>
    <!--END HEADER TOP-->

    <div class="product_sec sec_mar only-sm">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                	<center style="text-align: center; font-size: 25px">My Order List</center>
          <table class="table datatable2 table-fixed table-bordered table-hover bg-white table-responsive text-nowrap" id="purchaseTable">
                                <thead>
                                     <tr>   <th class="text-center">Status</th> 
                                            <th class="text-right">Amount</th>
                                            <th class="text-center">Action</th>  
                                        </tr>
                                </thead>
                                <tbody>
                                <?php $i=0;
                                $today=date('Y-m-d');
								foreach($iteminfo as $item){
									$i++;
									?>
                                	<tr>
                                    	
                                        <td class="text-center">
                                        <?php if($item->order_status==1){echo "Pending";}
										if($item->order_status==2){echo "Processing";}
										if($item->order_status==3){echo "Ready";}
										if($item->order_status==4 && $item->orderacceptreject!=1){echo "Pending";}
										if($item->order_status==4 && $item->orderacceptreject==1){echo "Served";}
										//if($item->order_status==4){echo "Served";}
										if($item->order_status==5){echo "Cancel";}
										 ?>
                                       </td>
                                        <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->totalamount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                    	<td class="text-center">
                                         <a onclick="vieworderinfo(<?php echo $item->order_id;?>)"  class="btn btn-xs btn-success" data-toggle="modal" data-target="#vieworder" style="color: #fff;" data-dismiss="modal">View</a>
                                         <?php if(($item->order_status==1 || $item->order_status==2 || $item->order_status==3 || $item->cutomertype==99) && ($item->order_date==$today) && ($item->order_status!=4 ) && ($item->order_status!=5 )){?>
                                         <a href="<?php echo base_url();?>updatemyorder/<?php echo $item->order_id;?>" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="left">Edit</a>
                                         <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>
                    
                </div>
            </div>
        </div>
    </div>

    

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
        function vieworderinfo(orderid){
		 var myurl='<?php echo base_url();?>hungry/appvieworder/'+orderid;
		 var dataString = 'orderid='+orderid;
		  $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 $('.popview').html(data);
				 $('#vieworder').modal('show');
			 } 
		});
	}
    </script>
</body>

</html>
