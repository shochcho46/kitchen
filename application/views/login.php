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
 <!--Start Login Area-->
    <section class="menu_area sect_pad">
        <div class="container wow fadeIn">
            <div class="row p-4">
                <div class="panel-body">
                                    <p>If you have shopped with us before, please enter your details in the boxes below.</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="user_email">Email</label>
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
                                                <a style="cursor:pointer; margin-left:30px; color:#090;" class="lost-pass" data-toggle="modal" data-target="#lostpassword" data-dismiss="modal">Lost your password?</a>
                                            </div>
                                            <a style="cursor:pointer; color:#FFF;" class="btn btn-success btn-sm search" onclick="logincustomer();">Login</a>&nbsp; OR &nbsp;<a href="<?php echo base_url().'hungry/signup'?>" class="btn btn-success btn-sm search">Register</a>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </section>
    <!--End Login Area-->
    <script>
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
							window.location.href= '<?php echo base_url();?>menu';
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