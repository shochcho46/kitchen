<div class="modal fade" id="lostpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo "Forgot Password";?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body passwordupdate">
                                           <div class="form-group">
                                                <label class="control-label" for="user_email">Your email</label>
                                                <input type="text" id="user_email2" class="form-control" name="user_email2">
                                            </div>
                                            <a onclick="lostpassword();" class="btn btn-success btn-sm lost-pass">Submit</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
<!--========== Checkout area ==========-->
    <section class="checkout_area sect_pad">
        <div class="container">
        <?php if ($this->session->flashdata('exception')) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('exception') ?>
                    </div>
                    <?php }
					//echo $this->session->userdata('CusUserID');
					 ?>
        <form action="<?php echo base_url();?>hungry/placeorder" method="post" class="row">
                <div class="col-xl-8 col-lg-7">
                <?php if(empty($this->session->userdata('CusUserID'))){?>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <i class="fa fa-question-circle"></i> Returning customer?<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Click here to login</a>
                                </h6>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="user_email">Username or email</label>
                                                <input type="text" id="user_email" class="form-control" name="user_email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="u_pass">Password <abbr class="required" title="required">*</abbr></label>
                                                <input type="password" id="u_pass" class="form-control" name="u_pass">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="checkbox checkbox-success">
                                                <input id="brand1" type="checkbox">
                                                <label for="brand1">Remember me</label>
                                            </div>
                                            <a class="btn btn-success btn-sm search" onclick="logincustomer();">Login</a>
                                            <a class="lost-pass" data-toggle="modal" data-target="#lostpassword" data-dismiss="modal">Lost your password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <i class="fa fa-question-circle"></i> Social sign-in <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Click here to login</a>
                                </h6>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="social-links">
                                        <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="tw"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="gp"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" class="li"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" class="pr"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <i class="fa fa-question-circle"></i> Have a coupon? <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Click here to enter your code</a>
                                </h6>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body coupon">
                                    <div class="form-inline">
                                        <input type="text" class="form-control" id="inputpromo">
                                        <button class="btn btn-success ml-2">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <?php } ?>
                    <div class="billing-form mt-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="billing-title">Billing Address</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-error">
                                    <label class="control-label" for="f_name">First Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="f_name" class="form-control" name="f_name" value="<?php echo (!empty($billinginfo->firstname)?$billinginfo->firstname:null) ?>" required>
                                    <span class="help-block">First Name must be between 1 and 32 characters!</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="l_name">Last Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="l_name" class="form-control" name="l_name" value="<?php echo (!empty($billinginfo->lastname)?$billinginfo->lastname:null) ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="c_name">Company Name</label>
                                    <input type="text" id="c_name" class="form-control" name="c_name" value="<?php echo (!empty($billinginfo->companyname)?$billinginfo->companyname:null) ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <select name="country">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas, The">Bahamas, The</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php echo (!empty($billinginfo->email)?$billinginfo->email:null) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Street address</label>
                                    <input type="text" id="billing_address_1" class="form-control" name="billing_address_1" value="<?php echo (!empty($billinginfo->address)?$billinginfo->address:null) ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="billing_address_2" class="form-control" name="billing_address_2">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="town">Town / City</label>
                                    <input type="text" id="town" class="form-control" name="town" value="<?php echo (!empty($billinginfo->city)?$billinginfo->city:null) ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="district">District <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="district" class="form-control" name="district" value="<?php echo (!empty($billinginfo->district)?$billinginfo->district:null) ?>">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="postcode">Postcode / ZIP</label>
                                            <input type="text" id="postcode" class="form-control" name="postcode" value="<?php echo (!empty($billinginfo->zip)?$billinginfo->zip:null) ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="phone">Phone <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" id="phone" class="form-control" value="<?php echo (!empty($billinginfo->phone)?$billinginfo->phone:null) ?>" placeholder="Add Country Code" name="phone" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(empty($this->session->userdata('CusUserID'))){?>
                        <div class="checkbox checkbox-success" data-toggle="collapse" data-target="#account-pass">
                            <input id="creat_ac" type="checkbox" name="isaccount">
                            <label for="creat_ac">Create an account?</label>
                        </div>
                        <div class="collapse" id="account-pass">
                            <div class="form-group">
                                <label class="control-label" for="ac_pass">Create account password</label>
                                <input type="text" class="form-control" id="ac_pass" name="password">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="checkbox checkbox-success" data-toggle="collapse" data-target="#billind-different-address">
                            <input type="checkbox" id="shipping_address2" name="isdiffship">
                            <label for="shipping_address2">Ship to a different address?</label>
                        </div>
                        <div class="collapse" id="billind-different-address">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-error">
                                        <label class="control-label" for="f_name3">First Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" id="f_name3" class="form-control" name="f_name3" value="<?php echo (!empty($shippinginfo->firstname)?$shippinginfo->firstname:null) ?>">
                                        <span class="help-block">First Name must be between 1 and 32 characters!</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="l_name2">Last Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" id="l_name2" class="form-control" name="l_name2" value="<?php echo (!empty($shippinginfo->lastname)?$shippinginfo->lastname:null) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="c_name2">Company Name</label>
                                        <input type="text" id="c_name2" class="form-control" name="c_name2" value="<?php echo (!empty($shippinginfo->companyname)?$shippinginfo->companyname:null) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                        <select name="country2">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas, The">Bahamas, The</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email2">Email <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" id="email2" name="email2" class="form-control" value="<?php echo (!empty($shippinginfo->email)?$shippinginfo->email:null) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Street address</label>
                                        <input type="text" id="billing_address_3" class="form-control" name="billing_address_3" value="<?php echo (!empty($shippinginfo->address)?$shippinginfo->address:null) ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="billing_address_4" class="form-control" name="billing_address_4">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="town2">Town / City</label>
                                        <input type="text" id="town2" class="form-control" name="town2" value="<?php echo (!empty($shippinginfo->city)?$shippinginfo->city:null) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="district2">District <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" id="district2" class="form-control" name="district2" value="<?php echo (!empty($shippinginfo->district)?$shippinginfo->district:null) ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="postcode2">Postcode / ZIP</label>
                                                <input type="text" id="postcode2" class="form-control" name="postcode2" value="<?php echo (!empty($shippinginfo->zip)?$shippinginfo->zip:null) ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="phone2">Phone <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" id="phone2" class="form-control" placeholder="Add Country Code" name="phone2" value="<?php echo (!empty($shippinginfo->phone)?$shippinginfo->phone:null) ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="ordre_notes">Order notes</label>
                            <textarea class="form-control" id="ordre_notes" rows="5" name="ordre_notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-8">
                    <div class="check_order">
                        <h5 class="text-center">Your order</h5>
                        <?php
if(!empty($this->cart->contents())){ $totalqty= count($this->cart->contents());} ;?>
					<?php 
					$calvat=0;
					$discount=0;
					$itemtotal=0;
					$pvat=0;
					$totalamount=0;
					$subtotal=0;
					if ($cart = $this->cart->contents()){
						 
								      $totalamount=0;
									  $subtotal=0;
									  $pvat=0;
									
									?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr class="cart_item">
                                    <td class="product-name">
                                       <?php echo $item['name'];
									   if(!empty($item['addonsid'])){
											echo "<br>";
											echo $item['addonname'].' -Qty:'.$item['addonsqty'];
											}
									   ?>				 
                                        <strong class="product-sum">× <?php echo $item['qty'];?></strong>												
                                    </td>
                                    <td class="product-total">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo $itemprice;?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                    </td>
                                </tr>
                                <?php } 
								$itemtotal=$totalamount+$subtotal;
									if($this->settinginfo->vat>0){
										$calvat=$itemtotal*$this->settinginfo->vat/100;
									}
									else{
										$calvat=$pvat;
										}
								?> 
                                
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td>
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo $itemtotal;?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                        </strong>
                                        <input name="orggrandTotal" type="hidden" value="<?php echo $itemtotal;?>" />
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Vat</th>
                                    <td>
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo $calvat;?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                        </strong>
                                    <input name="vat" type="hidden" value="<?php echo $calvat;?>" />
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Discount</th>
                                    <td>
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo $discount;?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                        </strong>
                                    </td>
                                </tr>
                                <?php $coupon=0;
							if(!empty($this->session->userdata('couponcode'))){?>
                            <tr class="order-total">
                                    <th>Coupon Discount</th>
                                    <td>
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo $coupon=$this->session->userdata('couponprice');?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                        </strong>
                                    
                                    </td>
                                </tr>
                            <?php }?>
                             <input name="invoice_discount" type="hidden" value="<?php echo $discount+$coupon;?>" />
                                <tr class="order-total">
                                    <th>Service</th>
                                    <td>
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo $this->session->userdata('shippingrate');?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                        </strong>
                                      <input name="service_charge" type="hidden" value="<?php echo $this->session->userdata('shippingrate');?>" />
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?></span><?php echo ($calvat+$itemtotal+$this->session->userdata('shippingrate'))-($discount+$coupon);?><span class="woocommerce-Price-currencySymbol"><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span></span>
                                        </strong><input name="grandtotal" type="hidden" value="<?php echo ($calvat+$itemtotal+$this->session->userdata('shippingrate'))-($discount+$coupon);?>" />
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <?php }?>
                        <!-- /.End of product list table -->
                        <div class="payment-block" id="payment">
                            <?php if(!empty($paymentinfo)){
								foreach($paymentinfo as $payment){
								?>
                            <div class="payment-item">
                                <input type="radio" name="card_type" id="payment_method_cre" data-parent="#payment" data-target="#description_cre" value="<?php echo $payment->payment_method_id;?>" class="" <?php if($payment->payment_method_id==4){ echo "checked";}?>>
                                <label for="payment_method_cre"><?php echo $payment->payment_method;?></label>
                            </div>
                            <?php } } ?>
                        </div>
                        <!-- /.End of payment method --> 
                       <!-- <a href="#" class="btn btn-success btn-block">Place order</a>-->
                        <input class="btn btn-success btn-block" name="" type="submit" value="Place order" />
                    </div>
                </div>
          </form>

        </div>
    </section>
    <!--======== End Checkout area ==========-->
    <script>
    $(document).ready(function () {
    var ckbox = $('#creat_ac');
    $('input').on('click',function () {
        if (ckbox.is(':checked')) {
            $('#ac_pass').attr("required", true);
        } else {
           $('#ac_pass').attr("required", false);
        }
    });
	
	var ckbox2 = $('#shipping_address2');
    $('input').on('click',function () {
        if (ckbox2.is(':checked')) {
			$('#shipping_address2').attr("value", 1);
            $('#f_name3').attr("required", true);
			$('#l_name2').attr("required", true);
			$('#email2').attr("required", true);
			$('#phone2').attr("required", true);
        } else {
			$('#shipping_address2').attr("value", '');
            $('#f_name3').attr("required", false);
			$('#l_name2').attr("required", false);
			$('#email2').attr("required", false);
			$('#phone2').attr("required", false);
        }
    });
});
function logincustomer(){
	var email=$('#user_email').val();
	var pass=$('#u_pass').val();
	var errormessage = '';
	  if(email == ''){ errormessage = errormessage+'<span>Please enter your Phone Or Email.</span>';
			alert("Enter Your Email!!");
			return false;
		}
	if(pass == ''){ errormessage = errormessage+'<span>Password Not Empty.</span>';
		alert("Enter Your Email!!");
			return false;
	}
				var dataString = 'email='+email +'&pass1='+pass;
					$.ajax({
						type: "POST",
						url:'<?php echo base_url();?>hungry/userlogin',
						data: dataString,
						success: function(data){
							var err = data;
							if(err=='404'){
								alert("Failed Login: Check your Email and password!");
								}						   
							else{
							window.location.href= '<?php echo base_url();?>checkout';
						   }
						}
					});
	}
	
function lostpassword(){
	var email=$('#user_email2').val();
	var errormessage = '';
	  if(email == ''){ errormessage = errormessage+'<span>Please enter your Phone Or Email.</span>';
			alert("Enter Your Email!!");
			return false;
		}
	
				var dataString = 'email='+email;
					$.ajax({
						type: "POST",
						url:'<?php echo base_url();?>hungry/passwordrecovery',
						data: dataString,
						success: function(data){
							var err = data;
							if(err=='404'){
								alert("Failed: Email has not been registered yet.!!!");
								}						   
							else{
							alert("Success: We have been sent a email to this "+email+" Email Address. Please check your New Password..!!!");
							window.location.href= '<?php echo base_url();?>checkout';
						   }
						}
					});
	}
    </script>