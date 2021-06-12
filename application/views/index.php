<?php $webinfo= $this->webinfo;
if($title!="Menu"){
	$this->session->unset_userdata('product_id');
	$this->session->unset_userdata('categoryid');
	}
    if(!empty($seoterm)){
	$seoinfo=$this->db->select('*')->from('tbl_seoption')->where('title_slug',$seoterm)->get()->row();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $seoinfo->description;?>">
    <meta name="keywords" content="<?php echo $seoinfo->keywords;?>">
    
    <title><?php echo $seoinfo->title;?></title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url((!empty($this->settinginfo->favicon)?$this->settinginfo->favicon:'assets_web/images/favicon.png')) ?>">

    <!--====== Plugins CSS Files =======-->
    <link href="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <?php if($this->settinginfo->site_align=='RTL'){?>
    <link href="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/css/rtl/bootstrap.min.css" rel="stylesheet">
    <?php }?>
    <link href="<?php echo base_url();?>assets_web/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/themify-icons/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/animate-css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/metismenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/plugins/clockpicker/clockpicker.min.css" rel="stylesheet">

    <!--====== Custom CSS Files ======-->
    <link href="<?php echo base_url();?>assets_web/css/style.css" rel="stylesheet">
    <?php if($this->settinginfo->site_align=='RTL'){?>
    <link href="<?php echo base_url();?>assets_web/css/style-rtl.css" rel="stylesheet">
    <?php }?>
    <link href="<?php echo base_url();?>assets_web/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_web/css/custome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_web/css/jquery.rateyo.min.css"/>
    <script src="<?php echo base_url();?>assets_web/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/product.js.php" ></script>
    <script src="<?php echo base_url();?>assets/js/category.js.php" ></script>
 
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
    <![endif]-->
</head>

<body>
   
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!--START HEADER TOP-->
    <header class="header_top_area">
        <div class="header_top">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="" href="<?php echo base_url();?>">
                        <img src="<?php echo base_url(!empty($webinfo->logo)?$webinfo->logo:'dummyimage/168x65.jpg'); ?>" alt="logo">
                    </a>
                   
                    <div class="sidebar-toggle-btn">
                     <a class="nav-link" href="<?php echo base_url();?>cart" id="navbarDropdown3" style="display:inline;color: #fff;">
                                    <i class="ti-shopping-cart"></i><span class="badge badge-notify my-cart-badge" style=";color: #fff; background: #28a745; border-radius: 50px; width: 22px;line-height: 22px; padding:0;"><?php $totalqty=0;
if($this->cart->contents()>0){ $totalqty= count($this->cart->contents());} echo $totalqty;?></span>
                                </a>
                        <button type="button" id="sidebarCollapse" class="btn">
                            <i class="ti-menu"></i>
                        </button>
                        
                    </div>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        	<?php $allmenu=$this->allmenu;
							foreach($allmenu as $menu){
								$dropdown='';
								$dropdownassest='';
								$dropdownaclass='';
								$activeclass='';
								if($menu->menu_name=='Home'){
								$activeclass='active';
								$href=base_url().$menu->menu_slug;
								}
								else{
									$activeclass='';
									$href=base_url().$menu->menu_slug;
									}
								if(!empty($menu->sub)){
									$dropdown='dropdown';
									$dropdownassest='id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
									$dropdownaclass='dropdown-toggle';
									$href='#';
									}
							?>
                            <li class="nav-item <?php echo $dropdown;?> <?php echo $activeclass;?>">
                                <a class="nav-link <?php echo $dropdownaclass;?>" href="<?php echo $href;?>" <?php echo $dropdownassest;?>><?php echo $menu->menu_name;?></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <?php if(!empty($menu->sub)){
									 foreach($menu->sub as $submenu){
										 $menurl=$submenu->menu_slug;
								$menuname=$submenu->menu_name;
								if($submenu->menu_slug=='logout'){
								 $myid = $this->session->userdata('CusUserID');
									if(empty($myid)){
									$menurl="login";
								    $menuname="Login";
									}
								}
										 										 ?>
                                    <a class="dropdown-item" href="<?php echo base_url().$menurl;?>"><?php echo $menuname;?></a>
                                    <?php } }  ?>
                                </div>
                                
                            </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-search"></i>
                                </a>
                                <div class="dropdown-menu search_box" aria-labelledby="navbarDropdown2">
                                    <form class="card card-sm">
                                        <div class="card-body row no-gutters align-items-center">
                                            <div class="col">
                                                <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                            </div>
                                            <!--end of col-->
                                            <div class="col-auto">
                                                <button class="btn btn-lg btn-success" type="submit">Search</button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url();?>cart" id="navbarDropdown3">
                                    <i class="ti-shopping-cart"></i><span class="badge badge-notify my-cart-badge" id="itemnum"><?php $totalqty=0;
if($this->cart->contents()>0){ $totalqty= count($this->cart->contents());} echo $totalqty;?></span>
                                </a>
                                <!--<div class="dropdown-menu cart_box" aria-labelledby="navbarDropdown3">
                                    <p>Your Cart is Empty</p>
                                </div>-->
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /. Navbar -->
                <nav id="sidebar" class="sidebar-nav">
                    <div id="dismiss">
                        <i class="ti-close"></i>
                    </div>
                    <ul class="metismenu list-unstyled" id="mobile-menu">
                    	<?php foreach($allmenu as $menu){
							if($menu->menu_name=='Home'){
								$activeclass='active';
								$mobile='';
								$href=base_url().$menu->menu_slug;
								}
								else{
									$activeclass='';
									$href=base_url().$menu->menu_slug;
									}
								if(!empty($menu->sub)){
									$mobile='aria-expanded="false"';
									$href='#';
									}
							?>
                        <li>
                            <a href="<?php echo $href;?>" <?php echo $mobile;?>><?php echo $menu->menu_name;?> <?php if(!empty($menu->sub)){?><span class="fa arrow"></span><?php } ?></a>
                             <?php if(!empty($menu->sub)){ ?>
                            <ul aria-expanded="false">
                            <?php  foreach($menu->sub as $submenu){
								$menurl=$submenu->menu_slug;
								$menuname=$submenu->menu_name;
								if($submenu->menu_slug=='logout'){
								 $myid = $this->session->userdata('CusUserID');
									if(empty($myid)){
									$menurl="login";
								    $menuname="Login";
									}
								}
								?>
                                <li><a href="<?php echo base_url().$menurl;?>"><?php echo $menuname;?></a></li>
                                <?php } ?>
                            </ul>
                             <?php }  ?>
                        </li>
                        <?php }  ?>
                       
                    </ul>
                </nav>
                <div class="overlay"></div>
            </div>
        </div>
 <?php if($title2=='Welcome to Hungry'){?>
        <!--START SLIDER PART-->
        <div class="main_slider owl-carousel">
       		<?php foreach($slider_info as $slider){?>
            <div class="item">
                <img src="<?php echo base_url(!empty($slider->image)?$slider->image:'dummyimage/1920x902.jpg'); ?>" alt="<?php echo $slider->title?>">
                <div class="item_caption animated_caption">
                    <h3 class="curve_title"><?php echo $slider->title?></h3>
                    <h2><?php echo $slider->subtitle?></h2>
                    <a href="<?php echo $slider->slink?>" class="btn1">See More</a>
                </div>
            </div>
            <?php } ?>
          
        </div>
        <!--END SLIDER PART -->
  <?php }
  else{
  ?>
  <!--PAGE HEADER AREA-->
        <div class="page_header menu_banner_bg">
            <div class="container wow fadeIn">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="page_header_content text-center sect_pad">
                            <h1><?php echo $title;?></h1>
                            <ul class="m-0 nav pt-0 pt-lg-3 justify-content-center">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li class="active"><a href="#"><?php echo $title;?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--PAGE BARNER AREA END-->
        <?php } ?>
    </header>
    <!--END HEADER TOP-->
    <?php if(isset($content)) {echo $content;}?>
    
    
    <!-- Newsletter -->
    <section class="newsletter_area  sect_pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2 class="mb-2">Subscribe to Newsletter</h2>
                    <p class="mb-4">Subscrive to Receive our weekly promotion every month</p>
                    <div class="newsletter-form">
                        <input type="text" class="form-control" placeholder="Enter Your Email" name="youremail" id="youremail">
                        <button class="btn" type="button" onClick="subscribeemail()">subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Newsletter -->
<?php if($title2=='Welcome to Hungry' || $title=='Contact Us'){?>
    <!-- Map Area -->
    <?php $googlemap=$this->db->select('*')->from('tbl_widget')->where('widgetid',14)->where('status',1)->get()->row();
	if(!empty($googlemap)){
	?>
    <section class="map_area">
        <div class="container-fluid">
            <div class="row map_area">
                <div class="map"><?php echo htmlspecialchars_decode($googlemap->widget_desc);?></div>
                <div class="office_address wow fadeIn" data-wow-delay="0.3s">
                <?php $maptxt=$this->db->select('*')->from('tbl_widget')->where('widgetid',4)->get()->row();?>
                    <h2 class="mb-4"><?php echo $maptxt->widget_title;?></h2>
                    <?php echo $maptxt->widget_desc;?>
                    <button class="simple_btn"><span>Get Directions</span></button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Map Area -->
    <?php } } 
	?>
    <!--Footer Area-->
    <div class="footer-area">
        <div class="container">
            <div class="row footer-inner">
            	<?php 
				$footerfirst=$this->db->select('*')->from('tbl_widget')->where('widgetid',1)->where('status',1)->get()->row();
	if(!empty($footerfirst)){
				?>
                <div class="col-lg-4">
                    <div class="footer-logo-area mb-5 mb-lg-0">
                        <div class="footer-logo">
                            <a href="<?php echo base_url();?>"><img src="<?php echo base_url(!empty($webinfo->logo)?$webinfo->logo:'dummyimage/168x65.jpg'); ?>" alt="footer logo"></a>
                        </div>
                        <div class="footer-init">
                        <?php 
						echo $footerfirst->widget_desc;
						?> 
                        </div>
                        <div class="footer-social-bookmark">
                            <ul>
                            <?php //print_r($this->sociallink);
							foreach($this->sociallink as $slink){
								$icon = substr($slink->icon, 4);
								?>
                                <li><a href="<?php echo $slink->socialurl;?>"><i class="fa <?php echo $icon;?>"></i></a></li>
								<?php }?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } 
				$footermiddle=$this->db->select('*')->from('tbl_widget')->where('widgetid',2)->where('status',1)->get()->row();
	if(!empty($footermiddle)){
				?>
                <div class="col-lg-4">
                    <div class="footer_widget mb-5 mb-lg-0">
                        <h4><?php echo $footermiddle->widget_title;?></h4>
                        <div class="footer_widget_body">
                        <?php echo $footermiddle->widget_desc;?>
                        </div>
                    </div>
                </div>
                <?php } 
				$footerlast=$this->db->select('*')->from('tbl_widget')->where('widgetid',3)->where('status',1)->get()->row();
	if(!empty($footerlast)){
				?>
                <div class="col-lg-4">
                    <div class="footer_widget">
                        <h4><?php echo $footerlast->widget_title;?></h4>
                        <div class="footer_widget_body">
                            <div class="footer-address">
                              <?php echo $footerlast->widget_desc;?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="footer-copyright">
                            <?php echo $webinfo->powerbytxt;?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="<?php echo base_url();?>terms">Teams of use</a></li>
                                <li><a href="<?php echo base_url();?>privacy">Privicy Policy</a></li>
                                <li><a href="<?php echo base_url();?>contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer Area-->
    
    <a href="#0" class="cd-top">
        <i class="ti-arrow-up"></i>
    </a>

    
    
    <!--====== SCRIPTS JS ======-->
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/clockpicker/clockpicker.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDHeh9zEbXo-YCWJcicXH2VRwVwAf_tq0"></script>
    <script src="<?php echo base_url();?>assets_web/plugins/gmap/map-active.js"></script>
    <?php if($this->settinginfo->site_align=='RTL'){?>
    <script src="<?php echo base_url();?>assets_web/plugins/bootstrap-4.1.3-dist/js/bootstrap-rtl.js"></script>
    <script src="<?php echo base_url();?>assets_web/js/custom-rtl.js"></script>
    <?php }
	else{
	?>
    <!--===== ACTIVE JS=====-->
    <script src="<?php echo base_url();?>assets_web/js/custom.js"></script>
    <?php } ?>
    <script>
	$(function(){
		$('#navbarTogglerDemo03 ul li a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('#navbarTogglerDemo03 ul li').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})
	});
 
    </script>
     <script>
	
    function checkavailablity(){
		
	   var getdate=$("#reservation_date").val();
		var time= $("#reservation_time").val();
		var people=$("#reservation_person").val();
		var geturl=$("#checkurl").val();
		if(getdate==''){
			alert("Please select date!!!");
			return false;
			}
		if(time==''){
			alert("Please select Time!!!");
			return false;
			}
		if(people=='' || people==0){
			alert("Please enter number of people!!!");
			return false;
			}
		 var dataString = "getdate="+getdate+"&time="+time+"&people="+people;
		 // Call ajax for pass data to other place
		$.ajax({
			type: 'POST',
			url: geturl,
			data: dataString
			}).done(function(data, textStatus, jQxhr){ 
			$('#searchreservation').html(data);
			}).fail(function(jqXhr, textStatus, errorThrown) { 
			alert( "Posting failed." );
			console.log( errorThrown );
			});
		
	   }
	   function editreserveinfo(id){
	    var geturl=$("#url_"+id).val();
	    var myurl =geturl+'/'+id;
	    var sdate=$("#sldate").val();
	    var sltime=$("#sltime").val();
	    var people=$("#people").val();
	    var dataString = "id="+id+"&sdate="+sdate+"&sltime="+sltime+"&people="+people;
	   //alert(myurl);
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.editinfo').html(data);
			  
			   var input = $('#time, #reservation_time').clockpicker({
				placement: 'bottom',
				align: 'left',
				autoclose: true,
				'default': 'now'
			});
			 $('#edit').modal('show');
			
			  $(".datepicker4").datepicker({
        		dateFormat: "dd-mm-yy"
    		}); 
			
		 } 
	});
	}
function addonsitem(id,sid,type){
		 var myurl='<?php echo base_url();?>hungry/addonsitem/'+id;
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
	function searchmenu(id){
		 $("#loadingcon").show();
		 var myurl ='<?php echo base_url();?>searchitem/';
		 var dataString = "catid="+id;
		  $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 $("#loadingcon").hide();
				 $('#loaditem').html(data);
			 } 
		});
		}
	function addtocartitem(pid,id,type){
	     var itemname=$("#itemname_"+id+type).val();
		 var sizeid=$("#sizeid_"+id+type).val();
		 var varientname=$("#varient_"+id+type).val();
		 var qty=$("#sst6"+id+"_"+type).val();
		 var price=$("#itemprice_"+id+type).val();
		 var catid=$("#catid_"+id+type).val();
		 var ismenupage=$("#cartpage"+id+type).val();
	     var myurl ='<?php echo base_url();?>hungry/addtocart/';
	var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid;

		  $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				  if(ismenupage==0){
				 	$('#cartitem').html(data);
					var items=$("#totalitem").val();
				     $(".my-cart-badge").html(items);
				  }
				  else{
					   $('#cartitem').html(data);
					   var items=$("#totalitem").val();
				       $(".my-cart-badge").html(items);
					  }
			 var x = document.getElementById("snackbar"+id);
					x.className = "snackbar show";
					setTimeout(function(){ x.className = x.className.replace("snackbar show", "snackbar"); }, 3000);
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
	 var catid=$("#catid_"+id+type).val();
	 var itemname=$("#itemname_"+id+type).val();
	 var sizeid=$("#sizeid_"+id+type).val();
	 var varientname=$("#varient_"+id+type).val();
	 var qty=$("#sst6"+id+"_"+type).val();
	 var price=$("#itemprice_"+id+type).val();
	 var ismenupage=$("#cartpage"+id+type).val();
	 var myurl ='<?php echo base_url();?>hungry/addtocart/';
	var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid+'&addonsid='+addons+'&allprice='+allprice+'&adonsunitprice='+adonsprice+'&adonsqty='+adonsqty+'&adonsname='+adonsname;
		$.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 if(ismenupage==0){
					 $('#cartitem').html(data);
					 $('#addons').modal('hide');
					  var items=$("#totalitem").val();
				         $(".my-cart-badge").html(items);
				  }
				  else{
					    $('#cartitem').html(data);
						 $('#addons').modal('hide');
						  var items=$("#totalitem").val();
				         $(".my-cart-badge").html(items);
					  }
					var x = document.getElementById("snackbar"+id);
					x.className = "snackbar show";
					setTimeout(function(){ x.className = x.className.replace("snackbar show", "snackbar"); }, 3000);
			 } 
		});

	}
	function addonsitem2(id,sid,type){
var myurl='<?php echo base_url();?>hungry/addonsitem/'+id;
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

function addtocartitem2(pid,id,type){
    var itemname=$("#itemname2_"+id+type).val();
    //alert(itemname);
var sizeid=$("#sizeid2_"+id+type).val();
var varientname=$("#varient2_"+id+type).val();
var qty=$("#sst6"+id+"_"+type).val();
var price=$("#itemprice2_"+id+type).val();
var catid=$("#catid2_"+id+type).val();
var ismenupage=$("#cartpage2"+id+type).val();
    var myurl ='<?php echo base_url();?>hungry/addtocart/';
var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid;

 $.ajax({
type: "POST",
url: myurl,
data: dataString,
success: function(data) {
 if(ismenupage==0){
$('#cartitem').html(data);
var items=$("#totalitem").val();
    $(".my-cart-badge").html(items);
 }
 else{
  $('#cartitem').html(data);
  var items=$("#totalitem").val();
      $(".my-cart-badge").html(items);
 }
var x = document.getElementById("snackbar"+id);
x.className = "snackbar show";
setTimeout(function(){ x.className = x.className.replace("snackbar show", "snackbar"); }, 3000);
}
});
}
	function removecart(rid){
		 var geturl='<?php echo base_url();?>hungry/removetocart';
		 var dataString = "rowid="+rid;
		  $.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 $('#cartitem').html(data);
				 var items=$("#totalitem").val();
				 $(".my-cart-badge").html(items);
				/* var total=$('#grtotal').val();
			     var totalitem=$('#totalitem').val();*/
					
			 } 
		});
	}
	function updatecart(id,qty,status){
		if(status=="del" && qty==0){
			return false;
			}
		else{
		 var geturl='<?php echo base_url();?>hungry/cartupdate';
		 var dataString = "CartID="+id+"&qty="+qty+"&Udstatus="+status;
		  $.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 $('#reloadcart').html(data);
			 } 
		});
		}
	}
	function removetocart(rid){
		 var geturl='<?php echo base_url();?>hungry/removetocartdetails';
		 var dataString = "rowid="+rid;
		  $.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 $('#reloadcart').html(data);
					
			 } 
		});
		}
	function getcheckbox(price,name){
		var servicecharge=price;
		$("#scharge").text(servicecharge);
		$("#servicename").val(name);
		$("#getscharge").val(servicecharge);
		var vat=$("#vat").text();
		var discount=$("#discount").text();
		var totalprice=$("#subtotal").text();
		var coupondis=$("#coupdiscount").text();
		var grandtotal=(parseFloat(totalprice)+parseFloat(vat)+parseFloat(servicecharge))-(parseFloat(discount)+parseFloat(coupondis));
		var grandtotal = grandtotal.toFixed(2); 
		$("#grtotal").text(grandtotal);
		var geturl='<?php echo base_url();?>hungry/setshipping';
		var dataString = "shippingcharge="+price+'&shipname='+name;
		$.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
			 } 
		});
		}
	function gotocheckout(){
		$error=0;
		if($('input[name="payment_method"]:checked').length === 0) {
			$error=1
				 alert("Please select Shipping Method!!");
				 return false;
				 }
		if($error==0){
			window.location.href= '<?php echo base_url();?>checkout';
			}
		}
	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	function subscribeemail(){
		var email=$("#youremail").val();
		if(email==''){
			alert('Please Enter Your email');
			return false;
			}
		if(!IsEmail(email)){
					alert('Please enter a valid Email.');
					return false;
				}
		var geturl='<?php echo base_url();?>hungry/subscribe';
		var dataString = "email="+email;
		$.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 alert("Thanks for Subscription");
			 } 
		});
		}	
	
    </script>
    
</body>
</html>