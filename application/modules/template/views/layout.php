<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/head') ?>
        <style>
        .loading:after {
  content: ' .';
  animation: dots 1s steps(5, end) infinite;}

@keyframes dots {
  20%, 20% {
    color: rgba(0,0,0,1);
    text-shadow:
      .25em 0 0 rgba(0,0,0,0),
      .5em 0 0 rgba(0,0,0,0);}
  40% {
    color: #F00;
    text-shadow:
      .25em 0 0 rgba(0,0,0,0),
      .5em 0 0 rgba(0,0,0,0);}
  60% {
    text-shadow:
      .25em 0 0 #F00,
      .5em 0 0 rgba(0,0,0,0);}
  80%, 100% {
    text-shadow:
      .25em 0 0 #666,
      .5em 0 0 #666;}}

        </style>
    </head>

    <body class="hold-transition sidebar-mini <?php if(($title=='posinvoiceloading') || ($title=='Counter Dashboard')){ echo "sidebar-collapse pace-done";}?>">
        <!-- Site wrapper -->
       
        <div class="wrapper">
        <?php if($title=='posinvoiceloading'){?>
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
         <?php } ?>
<script>
		$(document).ready(function()
		{
			//setInterval(function(){ $(".loading").hide() }, 1500);
			/*$.confirm({
					text: "Are you Sure to Print This Invoice:",
					confirm: function(button) {
						alert("You just confirmed.");
					},
					cancel: function(button) {
						alert("You cancelled.");
					}
				});*/
			setTimeout(function () {
                $('.page-loader-wrapper').fadeOut();
            }, 2000);
			
		});
        
        </script>
            <header class="main-header"> 
                <?php if($title!='posinvoiceloading'){
				$this->load->view('includes/header');
				}
				?>
            </header>

 
            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar -->
                <?php $this->load->view('includes/sidebar') ?>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php if(($title!='posinvoiceloading') && ($title!='Counter Dashboard')){?>
                <section class="content-header">
                    <div class="header-icon"><i class="pe-7s-home"></i></div>
                    <div class="header-title">
                        <h1><?php if($this->uri->segment(2)=="paymentmethod"){
									$titlename="Payment Method";
								}
								else if($this->uri->segment(2)=="shippingmethod"){
									$titlename="Shipping Method";
									}
							   else if($this->uri->segment(2)=="supplierlist"){
									$titlename="Supplier List";
									}
								else if($this->uri->segment(2)=="restauranttable"){
									$titlename="Restaurant Table";
									}
								else if($this->uri->segment(2)=="customertype"){
									$titlename="Customer Type";
									}
								else if($this->uri->segment(2)=="unitmeasurement"){
									$titlename="Unit Measurement";
									}
								else if($this->uri->segment(2)=="couponlist"){
									$titlename="Coupon List";
									}
								else if($this->uri->segment(2)=="smsetting"){
									$titlename="Sms Setting";
									}
								else if($this->uri->segment(2)=="smsetting"){
									$titlename="Sms Setting";
									}
								else{
									$titlename=str_replace("_", " ", $this->uri->segment(2));
									}
						
						
						
						//Paymentmethod
						//echo (!empty($this->uri->segment(1))?ucfirst($this->uri->segment(1)):null) ?> <!--/--> <?php echo (!empty($titlename)?ucwords($titlename):null) ?></h1>
                        <small><?php echo (!empty($title)?$title:null) ?></small>
                    </div>
                </section>
				<?php } ?>

                <!-- Main content -->
                <div class="content">
                    <!-- load messages -->
                    <?php $this->load->view('includes/messages') ?>
                    <!-- load custom page -->
                    <?php echo $this->load->view($module.'/'.$page) ?>
                </div> <!-- /.content -->


            </div> <!-- /.content-wrapper -->


            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <?php echo (!empty($setting->address)?$setting->address:null) ?> 
                </div>

                <strong>
                    <?php echo (!empty($setting->footer_text)?$setting->footer_text:null) ?>
                </strong>
                    <a href="<?php echo current_url() ?>">
                    <?php echo (!empty($setting->title)?$setting->title:null) ?></a>
            </footer>

            
        </div> <!-- ./wrapper -->
 
        <!-- Start Core Plugins-->
        <?php $this->load->view('includes/js') ?>
        <script>
        var url = window.location;
        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href != url;
        }).parent().removeClass('active');

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
        </script>
    </body>
</html>
