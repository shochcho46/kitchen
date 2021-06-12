 <style>
 .myinfotable table th{font-size:14px; padding: .25rem;}
 .myinfotable table td{font-size:14px; padding: .25rem;}
 .img-circle {
    border-radius: 50%;
}
 </style>
 <div class="modal fade" id="updatep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo display('update');?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                             <?= form_open_multipart('hungry/updateprofile',array('id'=>'profileupdate')) ?>
                             <input type="hidden" name="Customerid" class="form-control" id="Customerid"  value="<?php echo $customerinfo->customer_id; ?>">
                                  <div class="form-group row">
                                        <label for="name"  class="col-sm-4 col-form-label"><?php echo display('name') ?></label>
                                        <div class="col-sm-8"><input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="John Doe" value="<?php echo (!empty($customerinfo->customer_name)?$customerinfo->customer_name:null) ?>" required></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone"  class="col-sm-4 col-form-label"><?php echo display('mobile') ?></label>
                                        <div class="col-sm-8"><input type="text" name="mobile" class="form-control" id="mobile" placeholder="+8801712121212" value="<?php echo (!empty($customerinfo->customer_phone)?$customerinfo->customer_phone:null) ?>" required></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mail" class="col-sm-4 col-form-label"><?php echo display('email') ?></label>
                                        <div class="col-sm-8"><input type="email" name="email" class="form-control" id="email" placeholder="john@example.com" value="<?php echo (!empty($customerinfo->customer_email)?$customerinfo->customer_email:null) ?>" readonly="readonly" disabled="disabled"></div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="phone"  class="col-sm-4 col-form-label"><?php echo display('password') ?></label>
                                        <div class="col-sm-8"><input type="text" name="password" class="form-control" id="password" placeholder="Password" value="" ></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone"  class="col-sm-4 col-form-label">Profile Picture</label>
                                        <div class="col-sm-8"><input type="file" name="UserPicture" class="form-control" id="UserPicture"></div>
                                        <input type="hidden" name="oldimage" class="form-control" id="oldimage"  value="<?php echo $customerinfo->customer_picture; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label for="message"  class="col-sm-4 col-form-label">Addres</label>
                                        <div class="col-sm-8"><textarea class="form-control" name="address" id="address" rows="3" placeholder="Write Your Address"><?php echo $customerinfo->customer_address; ?></textarea></div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit" class="btn btn-success" ><?php echo display('submit') ?></button>
                                    </div>
                                     <?php echo form_close();?>
                            </div>
                            
                        </div>
                    </div>
                </div>
 <!--Start Menu Area-->
    <section class="menu_area sect_pad">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-xl-3 col-md-4 sidebar">
                    <div class="category_choose p-3 mb-3">
                        <div class="card-header">
                                 <div style="text-align: center;"> <img src="<?php echo base_url(!empty($customerinfo->customer_picture)?$customerinfo->customer_picture:'assets/img/icons/default.jpg'); ?>" width="100px;" height="100px;" class="img-circle"></div>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>myprofile" class="accordion-toggle">My Profile</a></h6>
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>myorderlist" class="accordion-toggle">My Order List</a></h6>
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>myoreservationlist" class="accordion-toggle">My Reservation</a></h6>
                                    <h6 class="panel-title"><a href="<?php echo base_url();?>hungry/logout" class="accordion-toggle">Logout</a></h6>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="need_booking py-4 px-3 mb-3 text-center">
                     <?php $help=$this->db->select('*')->from('tbl_widget')->where('widgetid',11)->get()->row();?>
                        <h6 class="mb-3"><?php echo $help->widget_title;?></h6>
                        <div class="need_booking_inner">
                            <?php echo $help->widget_desc;?>
                        </div>
                    </div>
                   
                </div>
                <div class="col-xl-9 col-md-8">
                <div class="col-sm-12 col-md-12 rating-block myinfotable">
<center style="text-align: center; font-size: 25px">Positional Information</center>
          <table class="table table-hover" width="100%">
            <tbody>
            <tr>
                <th><a class="btn btn-success btn-sm search" data-toggle="modal" data-target="#updatep" data-dismiss="modal" style="color:#FFF;"><strong>Profile Update</strong></a></th>
                <td></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $customerinfo->customer_name;?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $customerinfo->customer_email;?></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><?php echo $customerinfo->customer_phone;?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $customerinfo->customer_address;?></td>
        </tr>
        
</tbody></table>      

</div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Menu Area