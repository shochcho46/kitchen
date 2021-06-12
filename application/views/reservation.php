 <!--Start About Us-->
    <section class="about_us sect_pad bg_img_area">
        <div class="bg_img_left wow fadeIn" data-wow-delay="0.5s"></div>
        <div class="container">
        <?php if ($this->session->flashdata('message')) { ?>
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
                    <?php } ?>
            <div class="row about_inner">
                <div class="col-lg-5 col-xl-6 text-center wow fadeIn">
                    <div class="sect_title mb-4">
                        <h2 class="curve_title"><?php echo $banner_story[0]->title;?></h2>
                        <h3 class="big_title"><?php echo $banner_story[0]->subtitle;?></h3>
                    </div>
                    <div class="aboutus_text mb-lg-0 mb-5">
                    <?php $story=$this->db->select('*')->from('tbl_widget')->where('widgetid',9)->get()->row();?>
                        <p class="mb-4"> <?php echo $story->widget_desc;?></p>
                        <a href="<?php echo $banner_story[0]->slink;?>" class="simple_btn">Read more</a>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="row">
                    <?php foreach($banner_story as $story){?>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="img_part mb-4 mb-sm-0 wow fadeIn" data-wow-delay="0.4s">
                                <img src="<?php echo base_url(!empty($story->image)?$story->image:'dummyimage/263x332.jpg'); ?>" class="img-fluid" alt="<?php echo $story->title?>">
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Reserve Table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body editinfo">
                                
                            </div>
                           <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Confirm Reservation</button>
                            </div>-->
                        </div>
                    </div>
                </div>
    <!--End About Us-->
    
    <!--Reservation Area-->
    <section class="reservation-area sect_pad bg_two">
        <div class="container">
            <div class="sect_title mb-5 text-center">
            <?php $reservation=$this->db->select('*')->from('tbl_widget')->where('widgetid',6)->get()->row();?>
                <h2 class="curve_title"><?php echo $reservation->widget_name;?></h2>
                <h3 class="mb-3 big_title"><?php echo $reservation->widget_title;?></h3>
                <?php echo $reservation->widget_desc;?>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form class="main-reservaton-form" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                <label for="reservation_person"><i class="ti-face-smile"></i></label>
                                <input type="number" name="reservation_person" id="reservation_person" placeholder="Total Person">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                <label for="reservation_date"><i class="ti-calendar"></i></label>
                                <input type="text" name="reservation_date" id="reservation_date" placeholder="Expected Date" class="datepickerreserve">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <label for="reservation_time"><i class="ti-alarm-clock"></i></label>
                                <input type="text" name="reservation_time" id="reservation_time" placeholder="Expected Time">
                            </div>
                            <div class="col-lg-3 col-md-6">
                            <input name="checkurl" id="checkurl" type="hidden" value="<?php echo base_url("hungry/checkavailablity"); ?>" />
                                <button type="button" class="simple_btn" onclick="checkavailablity()">Check Availablity</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--End Reservation Area-->
    
    <!--Start Table Chart-->
    <section class="table_chart" id="searchreservation">
       <!-- <div class="container">
            <div class="row table_chart_inner py-5">
                <div class="col-md-4 col-sm-6 text-center mb-3">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/1.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center mb-3">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/8.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center mb-3">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/3.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center mb-3">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/2.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center mb-3">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/6.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center mb-3">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/2.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center mb-3 mb-md-0">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/7.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/4.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <a href="#" data-toggle="modal" data-target="#bookinfo">
                        <img src="<?php echo base_url();?>assets_web/images/reservation/8.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>-->
    </section>
    <!--End Table Chart-->