<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<?php 

				/*Firebase Push Notification*/
				/*$url = 'https://fcm.googleapis.com/fcm/send';
$senderid[]="eSYXwe-yNJo:APA91bEvvRnCIto2Brh-S9CMLHyQfSNqPxQEjvuncNHkEYGYJuvKk0EjYWgZ_FhgT8ZwVO__3P-RuYU-VdkLEHvPeoiBohxtfpP4UmxD5rMIBiH8NW2xvNycaIdBX_Pw4xnDQ33dUR36";
      $fields =array(
        "notification"=> array(
                       "title" => 'Rejected',
                       "body" => "Order amount:200", //Can be any message you want to send
                       "icon" =>"",
                       "click_action" => "http://google.com"

                       ),
                   "registration_ids"=> $senderid,
                   "data"=> array(
                     "data" => "something",
                   )
               );

      $fields = json_encode ( $fields );
      $headers = array (
            'Authorization: key=' . "AAAAmN4ekRg:APA91bHDg_gr99QlnGtHD_exg-QuhRc_45Xluti4dmaNGSD0jfuXi3-3M_wv01TihrHlUAWUDI-dlJqr-_wEHeYigIXSjEbsXJfxI4J9x7ugZDOBv07FhAlWIdDvl8zWcKoeeqqPT9Gw",
            'Content-Type: application/json'
      );

      $ch = curl_init ();
      curl_setopt ( $ch, CURLOPT_URL, $url );
      curl_setopt ( $ch, CURLOPT_POST, true );
      curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
      curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

      $result = curl_exec ( $ch );
	  //print_r($result);
      curl_close ( $ch );*/
?>
<style>
.nav-tabs {
    margin: 0;
    padding: 0;
    border: 0;    
}

.nav-tabs > li > a.home {
	color:#FFF;
    background: #318d01;
    border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);
}
.nav-tabs > li > a.ongord {
	color:#FFF;
    background: #5b69bc;
    border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);
}
.nav-tabs > li > a.torder {
	color:#FFF;
    background: #08c;
    border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);
}
.nav-tabs > li > a.comorder {
	color:#FFF;
    background: #45babf;
    border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover {
	color:#37a000;
    background: #F5F5F5;
    box-shadow: inset 0 0 0 0 rgba(0,0,0,.4),-2px -3px 5px -2px rgba(0,0,0,.4);
}

/* Tab Content */
.tab-pane {
    background: #fff;
    box-shadow: 0 0 4px rgba(0,0,0,.4);
    border-radius: 0;
    padding: 10px;
	width:100%;
	position:relative;
}
.btn-group-sm>.btn, .btnleftalign, .btn-group-sm>.btn, .btnrightalign {
    padding: 1px 4px;
    font-size: 10px;
}
.table.table.table-bordered.footersumtotal{width:88%;
    padding-bottom: 0;
    margin-bottom: 0;
}
.table.table.table-bordered.footersumtotal tr td {
    text-align: left;
	padding-bottom:0;
}
.tab-pane table tr th,.tab-pane table tr td{text-align:center;}
.dt-button-collection.dropdown-menu{
	z-index:9999;
	}
.dropdown-menu>li.buttons-columnVisibility>a{
   cursor:pointer;
}
.dropdown-menu>li.buttons-columnVisibility>a:hover {
    background-color: #e1e3e9;
    color: #333;
}
 *:focus {
    outline: none;
}
.calcbody {
    position: fixed;
	left: 30%;
  /*  top: 50%;
    left: 50%;*/
    /*transform: translate(-50%, -50%);*/
    background: #fff;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
    border-radius: 14px;
    padding-bottom: 20px;
    width: 250px;
    
}
.cacldisplay {
    width: 100%;
    height: 45px;
    padding: 45px 0;
    background: #45c203;
    border-top-left-radius: 14px;
    border-top-right-radius: 14px;
}
.calcbuttons {
    padding: 15px 15px 0 15px;
}
.calcrow {
    width: 220px;
    float: left;
}
.calcrow input[type=button] {
    width: 45px;
    height: 45px;
    float: left;
    padding: 0;
    margin: 5px;
    box-sizing: border-box;
    background:#e7f7de;
    border: none;
    font-size: 24px;
    line-height: 24px;
    border-radius: 50%;
    font-weight: 700;
    color: #5E5858;
    cursor: pointer;
    
}
.calcrow button[type=button] {
    width: 45px;
    height: 45px;
    float: left;
    padding: 0;
    margin: 5px;
    box-sizing: border-box;
    background:#e7f7de;
    border: none;
    font-size: 24px;
    line-height: 24px;
    border-radius: 50%;
    font-weight: 700;
    color: #5E5858;
    cursor: pointer;
    
}
.cacldisplay input[type=text] {
    width: 200px;
    height: 36px;
    float: left;
    padding: 0;
    box-sizing: border-box;
    border: none;
    background: none;
    color: #ffffff;
    text-align: right;
    font-weight: 700;
    font-size: 36px;
    line-height:36px;
    margin: 0 25px;
	 outline: none;
    
}
.cacldispla input:focus{
    outline: none;
}

.calcred {
    background: #FF0509 !important;
    color: #ffffff !important;
    
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #37a000;
  padding: 6px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 30px;
  text-align: center;
  }
  .listcat{
      color: #fff;
    background: #37a000;
    box-shadow: inset 0 0 0 0 rgba(0,0,0,.4), -2px -3px 5px -2px rgba(0,0,0,.4);
	cursor:pointer;
	padding:5px;
  }
 .seelist{position:relative;}
 .notif{ display: inline !important;
         position: absolute !important;
         float: right;
         top: -25px;
         right: -15px;
		 background: none !important;
		border: none !important;
		box-shadow: none !important;
		 }
</style>
<script>
    function calcNumbers(result){
		if(result=="C"){
			calc.displayResult.value='';
		}
		else{
        calc.displayResult.value=calc.displayResult.value+result;
		}
        
    }
	
	 function inputNumbers(result){
		if(result=="C"){
			var totalpaid=0;
			$("#paidamount").val('');
			$("#change").val('');
		}
		else{
			var paidamount=$("#paidamount").val();
			var totalpaid=paidamount+result;
			$("#paidamount").val(totalpaid);
			var maintotalamount=$("#maintotalamount").val();
			var restamount=(parseFloat(totalpaid))-(parseFloat(maintotalamount));
			var changes=restamount.toFixed(2);
			$("#change").val(changes);
		}
		
        //placenum.paidamount.value=placenum.paidamount.value+result;
    }
	</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-body" style="padding:0;">
      	<div style="position:relative">
           <div class="calcbody">
        <form name="calc">
        <div class="cacldisplay">
            <input type="text" placeholder="0" name="displayResult" />
        </div>
            <div class="calcbuttons">
            <div class="calcrow">
            <input type="button" name="c0" value="C" placeholder="0" onClick="calcNumbers(c0.value)">
            	<button type="button" data-dismiss="modal" aria-label="Close">
                  <i class="fa fa-power-off" aria-hidden="true"></i>
                </button>
            </div>
              <div class="calcrow">
                  <input type="button" name="b7" value="7" onClick="calcNumbers(b7.value)">
                  <input type="button" name="b8" value="8" onClick="calcNumbers(b8.value)">
                  <input type="button" name="b9" value="9" onClick="calcNumbers(b9.value)">
                  <input type="button" name="addb" value="+" onClick="calcNumbers(addb.value)">
                </div>
                
                <div class="calcrow">
                <input type="button" name="b4" value="4" onClick="calcNumbers(b4.value)">
                  <input type="button" name="b5" value="5" onClick="calcNumbers(b5.value)">
                  <input type="button" name="b6" value="6" onClick="calcNumbers(b6.value)">
                  <input type="button" name="subb" value="-" onClick="calcNumbers(subb.value)">
                </div>
                
                <div class="calcrow">
                <input type="button" name="b1" value="1" onClick="calcNumbers(b1.value)">
                  <input type="button" name="b2" value="2" onClick="calcNumbers(b2.value)">
                  <input type="button" name="b3" value="3" onClick="calcNumbers(b3.value)">
                  <input type="button" name="mulb" value="*" onClick="calcNumbers(mulb.value)">
                </div>
                
                <div class="calcrow">
                <input type="button" name="b0" value="0" onClick="calcNumbers(b0.value)">
                  <input type="button" name="potb" value="." onClick="calcNumbers(potb.value)">
                  <input type="button" name="divb" value="/" onClick="calcNumbers(divb.value)">
                  <input type="button" class="calcred" value="=" onClick="displayResult.value=eval(displayResult.value)">
                </div>
            </div>
        </form>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="payprint" class="modal fade  bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong>Select Your Payment Method</strong>
            </div>
            <div class="modal-body">
            	<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                  <div class="col-md-8">
                        <div class="form-group row">
                            <label for="payments" class="col-sm-4 col-form-label">Payment Method </label>
                            <div class="col-sm-7 customesl">
                            	 <?php $card_type=4;
								  echo form_dropdown('card_typesl',$paymentmethod,(!empty($card_type)?$card_type:null),'class="postform resizeselect form-control" id="card_typesl"') ?>
                            </div>
                        </div>
                        <div id="cardarea" style="display:none; width:100%;" >
                        <div class="form-group row">
                            <label for="card_terminal" class="col-sm-4 col-form-label">Card Terminal </label>
                            <div class="col-sm-7 customesl">
                            	 <?php echo form_dropdown('card_terminal',$terminalist,'','class="postform resizeselect form-control" id="card_terminal"') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-sm-4 col-form-label">Select Bank</label>
                            <div class="col-sm-7 customesl">
                            	 <?php echo form_dropdown('bank',$banklist,'','class="postform resizeselect form-control" id="bank"') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="4digit" class="col-sm-4 col-form-label">Last 4 Digit</label>
                            <div class="col-sm-7 customesl">
                            	  <input type="text" class="form-control" id="last4digit" name="last4digit" value="" />
                            </div>
                        </div>
                       
                        </div>
                        <div class="form-group row">
                            <label for="4digit" class="col-sm-4 col-form-label">Total Amount</label>
                            <div class="col-sm-7 customesl">
                                  <input type="hidden" id="maintotalamount" name="maintotalamount" value="" />
                            	  <input type="text" class="form-control" id="totalamount" name="totalamount" readonly="readonly" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="4digit" class="col-sm-4 col-form-label">Customer Payment</label>
                            <div class="col-sm-7 customesl">
                            	  <input type="text" class="form-control" id="paidamount" name="paidamount" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="4digit" class="col-sm-4 col-form-label">Changes Amount</label>
                            <div class="col-sm-7 customesl">
                            	  <input type="text" class="form-control" id="change" name="change" readonly="readonly" value="" />
                            </div>
                        </div>
                        <div class="form-group text-right">
                        	<div class="col-sm-11" style="padding-right:0;">
                            <button type="button" id="paidbill" class="btn btn-success w-md m-b-5" onclick="orderconfirmorcancel()">Pay Now & Print Invoice</button>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                      <form name="placenum">
                     	<div class="grid-container">
                        <input type="button" class="grid-item" name="n1" value="1" onClick="inputNumbers(n1.value)">
                        <input type="button" class="grid-item" name="n2" value="2" onClick="inputNumbers(n2.value)">
                        <input type="button" class="grid-item" name="n3" value="3" onClick="inputNumbers(n3.value)">
                        <input type="button" class="grid-item" name="n4" value="4" onClick="inputNumbers(n4.value)">
                        <input type="button" class="grid-item" name="n5" value="5" onClick="inputNumbers(n5.value)">
                        <input type="button" class="grid-item" name="n6" value="6" onClick="inputNumbers(n6.value)">
                        <input type="button" class="grid-item" name="n7" value="7" onClick="inputNumbers(n7.value)">
                        <input type="button" class="grid-item" name="n8" value="8" onClick="inputNumbers(n8.value)">
                        <input type="button" class="grid-item" name="n9" value="9" onClick="inputNumbers(n9.value)">
                        <input type="button" class="grid-item" name="n10" value="10" onClick="inputNumbers(n10.value)">
                        <input type="button" class="grid-item" name="n20" value="20" onClick="inputNumbers(n20.value)">
                        <input type="button" class="grid-item" name="n50" value="50" onClick="inputNumbers(n50.value)">
                        <input type="button" class="grid-item" name="n100" value="100" onClick="inputNumbers(n100.value)">
                        <input type="button" class="grid-item" name="n500" value="500" onClick="inputNumbers(n500.value)">
                        <input type="button" class="grid-item" name="n1000" value="1000" onClick="inputNumbers(n1000.value)"> 
                        <input type="button" class="grid-item" name="n0" value="0" onClick="inputNumbers(n0.value)"> 
                        <input type="button" class="grid-item" name="n00" value="00" onClick="inputNumbers(n00.value)"> 
                        <input type="button" class="grid-item" name="c0" value="C" placeholder="0" onClick="inputNumbers(c0.value)">   
                       
                        </div>
                         </form>
                     </div>
                </div>  
            </div>
        </div>
    </div>
    		</div>
     
            </div>
        </div>

    </div>

<div id="paymentsselect" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong>Select Your Payment Method</strong>
            </div>
            <div class="modal-body">
            	<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                        <div class="form-group row">
                            <label for="payments" class="col-sm-4 col-form-label">Payment Method </label>
                            <div class="col-sm-7 customesl">
                            	 <?php $card_type=4;
								  echo form_dropdown('card_typesl',$paymentmethod,(!empty($card_type)?$card_type:null),'class="postform resizeselect form-control" id="card_typesl"') ?>
                            </div>
                        </div>
                        <div id="cardarea" style="display:none; width:100%;" >
                        <div class="form-group row">
                            <label for="card_terminal" class="col-sm-4 col-form-label">Card Terminal </label>
                            <div class="col-sm-7 customesl">
                            	 <?php echo form_dropdown('card_terminal',$terminalist,'','class="postform resizeselect form-control" id="card_terminal"') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-sm-4 col-form-label">Select Bank</label>
                            <div class="col-sm-7 customesl">
                            	 <?php echo form_dropdown('bank',$banklist,'','class="postform resizeselect form-control" id="bank"') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="4digit" class="col-sm-4 col-form-label">Last 4 Digit</label>
                            <div class="col-sm-7 customesl">
                            	  <input type="text" class="form-control" id="last4digit" name="last4digit" value="" />
                            </div>
                        </div>
                        </div>
                        <div class="form-group text-right">
                        	<div class="col-sm-11" style="padding-right:0;">
                            <button type="button" class="btn btn-success w-md m-b-5" onclick="onlinepay()">Pay Now</button>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>
    		</div>
     
            </div>
        </div>

    </div>
    
<div id="cancelord" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong>Order Cancel</strong>
            </div>
            <div class="modal-body">
            	<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                        <div class="form-group row">
                            <label for="payments" class="col-sm-4 col-form-label">Order ID </label>
                            <div class="col-sm-7 customesl">
                            	<span id="canordid"></span>
                                <input name="mycanorder" id="mycanorder" type="hidden" value=""  />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="canreason" class="col-sm-4 col-form-label">Cancel Reason</label>
                            <div class="col-sm-7 customesl">
                            	  <textarea name="canreason" id="canreason" cols="35" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                        	<div class="col-sm-11" style="padding-right:0;">
                            <button type="button" class="btn btn-success w-md m-b-5" id="cancelreason">Submit</button>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>
    		</div>
     
            </div>
        </div>

    </div>
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php //echo display('unit_update');?></strong>
            </div>
            <div class="modal-body addonsinfo">
            
    		</div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
<form action="<?php echo base_url("ordermanage/order/insert_customer") ?>" class="form-vertical" id="validate" method="post" accept-charset="utf-8">
            <div class="modal fade modal-warning" id="client-info" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Add Customer</h3>
                        </div>
                        
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control simple-control" name ="customer_name" id="name" type="text" placeholder="Customer Name"  required="">
                                </div>
                            </div>
       
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name ="email" id="email" type="email" placeholder="Customer Email"  required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-sm-3 col-form-label">Mobile <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name ="mobile" id="mobile" type="number" placeholder="Customer Mobile"  required="" min="0">
                                </div>
                            </div>
       
                            <div class="form-group row">
                                <label for="address " class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="address" id="address " rows="3" placeholder="Customer Address"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="address " class="col-sm-3 col-form-label">Favourite Address</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="favaddress" id="favaddress " rows="3" placeholder="Customer Address"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button type="submit" class="btn btn-success">Submit </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <div class="modal fade modal-warning" id="myModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"></h3>
                    </div>
                    <form id="updateCart" action="#" method="post">
                        <div class="modal-body">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;">Price</th>
                                        <th style="width:25%;"><span id="net_price" class="price"></span></th>
                                    </tr>
                                </tbody>
                            </table>
              
                            <div class="form-group row">
                                <label for="available_quantity" class="col-sm-4 col-form-label">Ava. Qnty</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="available_quantity" placeholder="Ava. Qnty" name="available_quantity" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit" class="col-sm-4 col-form-label">Unit</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="unit" placeholder="Unit" name="unit" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Qnty" class="col-sm-4 col-form-label">Qnty <span class="color-red">*</span></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="Qnty" name="quantity">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Rate" class="col-sm-4 col-form-label">Rate <span class="color-red">*</span></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="Rate" name="rate">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Dis/ Pcs" class="col-sm-4 col-form-label">Dis/ Pcs</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="Dis/ Pcs" placeholder="Dis/ Pcs" name="discount">
                                </div>
                            </div>
                            <input type="hidden" name="rowID">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<div class="row">
				<div class="col-sm-12 col-md-12">
                   <div class="panel">
                     <div class="panel-body">
                          <ul class="nav nav-tabs" role="tablist">
                              <li class="active">
                                  <a href="#home" role="tab" data-toggle="tab" class="home">
                                      New Order
                                  </a>
                              </li>
                              <li><a href="#profile" role="tab" data-toggle="tab" class="ongord">
                                  On Going Order
                                  </a>
                              </li>
                              <li>
                                  <a href="#messages" role="tab" data-toggle="tab" class="torder">
                                       Today Order
                                  </a>
                              </li>
                              <li class="seelist">
                                  <a href="#settings" role="tab" data-toggle="tab" class="comorder">
                                      Online Order 
                                  </a>
                                  <a href="" class="notif"><span class="label label-danger count">0</span></a>
                              </li>
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div class="tab-pane fade active in" id="home">
                                  <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                                <div class="panel">
                                                        <input name="url" type="hidden" id="posurl" value="<?php echo base_url("ordermanage/order/getitemlist") ?>" />
                                                        <input name="url" type="hidden" id="productdata" value="<?php echo base_url("ordermanage/order/getitemdata") ?>" />
                                                        <input name="url" type="hidden" id="url" value="<?php echo base_url("ordermanage/order/itemlistselect") ?>" />
                                                        <input name="url" type="hidden" id="carturl" value="<?php echo base_url("ordermanage/order/posaddtocart") ?>" />
                                                        <input name="url" type="hidden" id="cartupdateturl" value="<?php echo base_url("ordermanage/order/poscartupdate") ?>" />
                                                        <input name="url" type="hidden" id="addonexsurl" value="<?php echo base_url("ordermanage/order/posaddonsmenu") ?>" />
                                                        <input name="url" type="hidden" id="removeurl" value="<?php echo base_url("ordermanage/order/removetocart") ?>" />
                                                        <input name="updateid" type="hidden" id="updateid" value="" />
                                                        <div class="row">
                                    
                                                <div class="col-sm-6">
                                                    <form class="navbar-search" method="get" action="<?php echo base_url("ordermanage/order/pos_invoice")?>" >
                                                        <label class="sr-only screen-reader-text" for="search">Search:</label>
                                                        <div class="input-group">
                                                            <input type="text" id="product_name" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Please Search Food" />
                                    
                                                            <div class="input-group-addon search-categories">
                                                            <?php 
                                                            //if(empty($categorylist)){$categorylist = array('' => '--Select Food Category--');}
                                                            //echo form_dropdown('category_id',$categorylist,(!empty($categorylist->CategoryID)?$categorylist->CategoryID:null),'class="postform resizeselect form-control cat" title="Select Food" id="category_id"') ?>
                                                            </div>
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-secondary" id="search_button"><i class="ti-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="row row-m-3">
                                                    <div class="listcat col-xs-6 col-sm-4 col-md-2 col-p-3" onclick="getslcategory('')">All</div>
                                                    <?php 
													$result = array_diff($categorylist, array("Select Food Category"));
													foreach($result as $key=>$test){ ?>
                                                                    <div class="listcat col-xs-6 col-sm-4 col-md-2 col-p-3" onclick="getslcategory(<?php echo $key;?>)"><?php echo $test;?></div>
													<?php  }?>
                                                   </div>
                                                    <div class="product-grid">
                                                        <div class="row row-m-3" id="product_search">
                                                        <?php $i=0;
                                                        foreach($itemlist as $item){
                                                            $i++;
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
                                                                <div class="col-xs-6 col-sm-4 col-md-2 col-p-3">
                                                                <div class="panel panel-bd product-panel select_product">
                                                                    <div class="panel-body">
                                                                        <img src="<?php echo base_url(!empty($item->ProductImage)?$item->ProductImage:'assets/img/icons/default.jpg'); ?>" class="img-responsive" alt="<?php echo $item->ProductName;?>">
                                                                        <input type="hidden" name="select_product_id" class="select_product_id" value="<?php echo $item->ProductsID;?>">
                                                                        <input type="hidden" name="select_product_size" class="select_product_size" value="<?php echo $item->variantid;?>">
                                                                        <input type="hidden" name="select_product_cat" class="select_product_cat" value="<?php echo $item->CategoryID;?>">
                                                                        <input type="hidden" name="select_varient_name" class="select_varient_name" value="<?php echo $item->variantName;?>">
                                                                        <input type="hidden" name="select_product_name" class="select_product_name" value="<?php echo $item->ProductName; if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?>">
                                                                        <input type="hidden" name="select_product_price" class="select_product_price" value="<?php echo $item->price;?>">
                                                                        <input type="hidden" name="select_addons" class="select_addons" value="<?php echo $getadons;?>">
                                                                    </div>
                                                                    <div class="panel-footer"><?php echo $item->ProductName;?> (<?php echo $item->variantName;?>)<?php if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?></div>
                                                                </div>
                                                            </div>
                                                           <?php } ?>
                                                                            </div>
                                                    </div>
                                                </div>   
                                                <div class="col-sm-6">
                                                 <form action="<?php echo base_url("ordermanage/order/pos_order")?>" class="form-vertical" id="onlineordersubmit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                    <div class="panel panel-bd">
                                                        <div class="panel-body">
                                    
                                                           <!-- <div class="form-group">
                                                                <input type="text" name="product_name" class="form-control" placeholder='Barcode OR QR code scan here ' id="add_item" >
                                                            </div>-->
                                                           
                                                            <div class="client-add">
                                                                <div class="form-group">
                                                                    <label for="customer_name">Customer Name <span class="color-red">*</span></label>
                                                                    <?php $cusid=1;
                                                                    echo form_dropdown('customer_name',$customerlist,(!empty($cusid)?$cusid:null),'class="postform resizeselect form-control" id="customer_name" required') ?>
                                                                </div>
                                                                <a href="#" class="client-add-btn" aria-hidden="true" data-toggle="modal" data-target="#client-info"><i class="ti-plus m-r-2"></i>New Customer </a>
                                                            </div>
                                                           
                                                            <div class="form-group">
                                                                <label for="store_id">Type <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                <?php $ctype=1;
                                                                echo form_dropdown('ctypeid',$curtomertype,(!empty($ctype)?$ctype:null),'class="form-control" id="ctypeid" required') ?>
                                                            </div>
                                                            <div id="nonthirdparty">
                                                            <div class="form-group">
                                                                <label for="store_id">Waiter <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                <?php echo form_dropdown('waiter',$waiterlist,(!empty($waiterlist->emp_his_id)?$waiterlist->emp_his_id:null),'class="form-control" id="waiter" required') ?>
                                                            </div>
                                                            <div class="form-group" id="tblsec">
                                                                <label for="store_id">Table&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="color-red">*</span></label>
                                                                <?php echo form_dropdown('tableid',$tablelist,(!empty($tablelist->tableid)?$tablelist->tableid:null),'class="form-control" id="tableid" required') ?>
                                                            </div>
                                                            </div>
                                                            <div class="form-group" id="thirdparty" style="display:none;">
                                                                <label for="store_id">Delivary Company <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                <?php echo form_dropdown('delivercom',$thirdpartylist,(!empty($thirdpartylist->companyId)?$thirdpartylist->companyId:null),'class="form-control" style="width:95%;" id="delivercom" required disabled="disabled"') ?>
                                                            </div>
                                                            <div class="form-group">
                                                                                            <input class="form-control" type="hidden" id="order_date" name="order_date" required value="<?php echo date('d-m-Y')?>" />
                                                                                            <input class="form-control" type="hidden" id="bill_info" name="bill_info" required value="1"  />
                                                                                            <input type="hidden" id="card_type" name="card_type" value="4" />
                                                                                            <input type="hidden" id="isonline" name="isonline" value="0" />
                                                                                            <input type="hidden" id="assigncard_terminal" name="assigncard_terminal" value="" />
                                                                                            <input type="hidden" id="assignbank" name="assignbank" value="" />
                                                                                            <input type="hidden" id="assignlastdigit" name="assignlastdigit" value="" />
                                                                <input type="hidden" id="product_value" name="">
                                                               <?php  /*$target = array('token1','token2','token3');
															   print_r($target);
															   foreach($thirdpartylist as $test){
																    echo $test;
																   }*/
															   ?>
                                                            </div>
                                                            <div class="product-list">
                                                                <div class="table-responsive" id="addfoodlist">
                                                                    <?php $grtotal=0;
                                                                    $totalitem=0;
                                                                     $calvat=0;
                                                                     $discount=0;
                                                                     $itemtotal=0;
                                                                      $this->load->model('ordermanage/order_model',	'ordermodel');
                                                                    if ($cart = $this->cart->contents()){
                                                                        ?>
                                                                    <table class="table table-bordered" border="1" width="100%" id="addinvoice">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Item</th>
                                                                                <th>Variant</th>
                                                                                <th>Price</th>
                                                                                <th>Qnty</th>
                                                                                <th>Total</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="itemNumber">
                                                                        <?php $i=0; 
                                                                          $totalamount=0;
                                                                          $subtotal=0;
                                                                        foreach ($cart as $item){
                                                                            $itemprice= $item['price']*$item['qty'];
                                                                            $discount=0;
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
                                                                            <tr id="<?php echo $i;?>">
                                                                                <th id="product_name_MFU4E">  <?php echo  $item['name'];
                                                                                if(!empty($item['addonsid'])){
                                                                                echo "<br>";
                                                                                echo $item['addonname'];
                                                                                }
                                                                                ?></th>
                                                                                <td>
                                                                                <?php echo $item['size'];?>
                                                                                </td>
                                                                               
                                                                                <td width=""><?php if($currency->position==1){echo $currency->curr_icon;}?> 
                                                                                 <?php echo $item['price'];?> <?php if($currency->position==2){echo $currency->curr_icon;}?> 
                                                                                </td>
                                                                                <td scope="row">
                                                                                <a class="btn btn-info btn-sm btnleftalign" onclick="posupdatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'add')"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                                                <?php echo $item['qty'];?>
                                                                                <a class="btn btn-danger btn-sm btnrightalign" onclick="posupdatecart('<?php echo $item['rowid']?>',<?php echo $item['qty'];?>,'del')"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                                                </td>
                                                                                <td width=""><?php if($currency->position==1){echo $currency->curr_icon;}?> 
                                                                                 <?php echo $itemprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> 
                                                                                </td>
                                                                                
                                                                                <td width:"80"=""><a class="btn btn-danger btn-sm btnrightalign" onclick="removecart('<?php echo $item['rowid'];?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <?php } 
                                                                        $itemtotal=$totalamount+$subtotal;
                                                                            if($settinginfo->vat>0){
                                                                            $calvat=$itemtotal*$settinginfo->vat/100;
                                                                        }
                                                                        else{
                                                                            $calvat=$pvat;
                                                                            }
                                                                            $grtotal=$itemtotal;
                                                                            $totalitem=$i;
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <?php }  ?>
                                                                    <input name="subtotal" id="subtotal" type="hidden" value="<?php echo $itemtotal;?>" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="fixedclasspos">
                                                            <div class="bottomarea">
                                                                     <div class="row">
                                                                        <div class="col-sm-6">
                                                                        <div class="col-sm-12">
                                                                            <input type="hidden" id="getitemp" name="getitemp" value="<?php echo $totalitem;?>" />
                                                                            <input type="button" id="add_payment" class="btn btn-success btn-large cusbtn" onclick="placeorder()" name="add-payment" value="Place Order">
                                                                            <!--<button type="button" class="btn btn-purple payment_button cusbtn" data-toggle="modal" data-target="#paymentsselect">Payment</button>-->
                                                                            <a href="<?php echo base_url("ordermanage/order/posclear") ?>" type="button" class="btn btn-danger cusbtn">Cancel</a>
                                                                            <a data-toggle="modal" data-target="#exampleModal" style="text-align:right; font-size:36px; padding-left:20px; cursor:pointer;"><i class="fa fa-calculator" aria-hidden="true"></i></a>
                                                                             <!--<input type="button" id="add_payment_cart" class="btn btn-info btn-large cusbtn" name="add-card" value="Card Payment" style="margin-right:30px;">-->
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                         
                                                                        <input name="distype" id="distype" type="hidden" value="<?php echo $settinginfo->discount_type;?>" />
                                                                        <input name="sdtype" id="sdtype" type="hidden" value="<?php echo $settinginfo->service_chargeType;?>" />
                                                                        <input type="hidden" id="orginattotal" value="<?php echo $calvat+$itemtotal-$discount;?>" name="orginattotal">
                                                                        
                                                                        	 <table class="table table-bordered footersumtotal">
                                                                             	<tr>
                                                                                	<td><label for="date" class="col-sm-4 col-form-label">Vat/Tax: </label><label class="col-sm-6 p-0"><input type="hidden" id="vat" name="vat" value="<?php echo $calvat;?>"/></label><strong><?php if($currency->position==1){echo $currency->curr_icon;}?><span id="calvat"> <?php echo $calvat;?></span><?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></label></td>
                                                                                    <td><label for="date" class="col-sm-6 col-form-label">Service Charge<?php if($settinginfo->service_chargeType==0){ echo "(".$currency->curr_icon.")";}else{ echo "(%)";}?>:</label><div class="col-sm-6 p-0"><input type="text" id="service_charge" 
                                                                                onkeyup="calculatetotal();"  class="form-control text-right" name="service_charge" placeholder ="0.00" style="margin-bottom:5px;" /></div></td>
                                                                                </tr>
                                                                                <tr>
                                                                                	<td><label for="date" class="col-sm-5 col-form-label">Discount<?php if($settinginfo->discount_type==0){ echo "(".$currency->curr_icon.")";}else{ echo "(%)";}?>: </label><div class="col-sm-6 p-0"><input type="text" id="invoice_discount" class="form-control text-right" name="invoice_discount" placeholder="0.00" onkeyup="calculatetotal();" onchange="calculatetotal();" value="<?php if($discount>0){echo $discount;} else{ echo "";}?>"></div></td>
                                                                                    <td id="grandtxt"><label for="date" class="col-form-label col-sm-6">Grand Total:</label><label class="col-sm-6 p-0"><input type="hidden" id="orggrandTotal" value="<?php echo $calvat+$itemtotal-$discount;?>" name="orggrandTotal"><input name="grandtotal" type="hidden" value="<?php echo $calvat+$itemtotal-$discount;?>" id="grandtotal" /><span class="grandbg"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <span id="caltotal"><?php echo $calvat+$itemtotal-$discount;?></span><?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></span></label></td>
                                                                                </tr>
                                                                             </table>
                                                                          
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                  </form>       
                                                </div>
                                                   
                                            </div>
                                                </div>
                                    </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile">
                                  <div class="row" id="onprocesslist">
                                  <?php 
									 if(!empty($ongoingorder)){
									 foreach($ongoingorder as $onprocess){
										 $billtotal=round($onprocess->totalamount);
										 ?>
                                  		<div class="col-sm-2">
                                            <div class="hero-widget well well-sm" style="height:auto !important">
                                                    <p style="margin:0;"><label class="text-muted"><strong>Table:<?php echo $onprocess->tablename;?></strong></label><small class="pull-right"><a href="<?php echo base_url("ordermanage/order/updateorder/".$onprocess->order_id) ?>" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update Order"><i class="fa fa-pencil"></i></a></small></p>
                                                    <p style="margin:0;"><label class="text-muted">Order:<?php echo $onprocess->saleinvoice;?></label></p>
                                                    <p style="margin:0;"><label class="text-muted">Waiter:<?php echo $onprocess->first_name.' '.$onprocess->last_name;?></label></p>
                                                    <a href="javascript:;" onclick="payorderbill(4,<?php echo $onprocess->order_id;?>,'<?php echo $billtotal;?>')" class="btn btn-xs btn-success btn-sm mr-1">Complete</a>&nbsp;<a href="javascript:;" data-id="<?php echo $onprocess->order_id;?>" class="btn btn-xs btn-danger btn-sm mr-1 cancelorder" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cancel Order"><i class="fa fa-trash-o"></i></a>&nbsp;<a href="javascript:;" onclick="payorderbill(10,<?php echo $onprocess->order_id;?>,'<?php echo $billtotal;?>')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Pos Invoice"><i class="fa fa-window-maximize"></i></a>&nbsp;<a href="<?php echo base_url("ordermanage/order/dueinvoice/".$onprocess->order_id) ?>" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Due Invoice"><i class="fa fa-window-restore"></i></a>
                                            </div>
                                        </div>
                                     <?php } }
									  else{ 
									   $odmsg=display('no_order_run');
									  echo "<p style='padding-left:12px;'>".$odmsg."</p>";
									  }
									 ?>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="messages">
                              	<table class="table table-fixed table-bordered table-hover bg-white" id="onprocessing" style="width:100%;">
                                    <thead>
                                         <tr>
                                                <th class="text-center">SI. </th>
                                                <th class="text-center">Invoice </th>
                                                <th class="text-center">Customer name</th>
                                                <th class="text-center">Customer Type</th> 
                                                <th class="text-center">Waiter</th> 
                                                <th class="text-center">tableno</th> 
                                                <th class="text-center">Order Date</th>
                                                <th class="text-right">Amount</th>
                                                <th class="text-center">Action</th>  
                                            </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7" style="text-align:right">Total:</th>
                                            <th colspan="2" style="text-align:center"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                              </div>
                              <div class="tab-pane fade" id="settings">
                                <table class="table table-fixed table-bordered table-hover bg-white" id="Onlineorder" style="width:100%;">
                                    <thead>
                                         <tr>
                                                <th class="text-center">SI. </th>
                                                <th class="text-center">Invoice </th>
                                                <th class="text-center">Customer name</th>
                                                <th class="text-center">Customer Type</th> 
                                                <th class="text-center">Waiter</th> 
                                                <th class="text-center">Table no</th>
                                                <th class="text-center">Payment Status</th>  
                                                <th class="text-center">Order Date</th>
                                                <th class="text-right">Amount</th>
                                                <th class="text-center">Action</th>  
                                            </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="8" style="text-align:right">Total:</th>
                                            <th colspan="2" style="text-align:center"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                  
                              </div>
                            </div>
                      </div>
                   </div>
                 </div>
              </div>
<?php if($this->uri->segment(4)!=''){?>
<script>
$(document).ready(function(){
swal({
		title: "Order Update Successfully!!!",
		text: "Do you Want to Print Token No.???",
		type: "success",
		showCancelButton: true,
		confirmButtonColor: "#28a745",
		confirmButtonText: "Yes",
		cancelButtonText: "No",
		closeOnConfirm: false,
		closeOnCancel: false
	},
function (isConfirm) {
		if (isConfirm) {
		  window.location.href="<?php echo base_url()?>ordermanage/order/postokengenerate/<?php echo $this->uri->segment(4);?>";
		} else {
			window.location.href="<?php echo base_url()?>ordermanage/order/pos_invoice";
		}
	});
});
</script>
<?php } ?>
<script>
$( window ).load(function() {
  // Run code
  $(".sidebar-mini").addClass('sidebar-collapse');
});
$(document).ready(function () {
	"use strict";
    // select 2 dropdown 
    $("select.form-control:not(.dont-select-me)").select2({
        placeholder: "Select option",
        allowClear: true
    });

      //form validate
    $("#validate").validate();
    $("#add_category").validate();
    $("#customer_name").validate();

    $('.product-list').slimScroll({
        size: '3px',
        height: '345px',
        allowPageScroll: true,
        railVisible: true
    });

    $('.product-grid').slimScroll({
        size: '3px',
        height: '720px',
        allowPageScroll: true,
        railVisible: true
    });

});

$('body').on('keyup', '#product_name', function() {
        var product_name = $(this).val();
        var category_id = $('#category_id').val();
		var myurl= $('#posurl').val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });

 //Product search js
 function getslcategory(carid){
	    var product_name = $('#product_name').val();
        var category_id = carid;
		var myurl= $('#posurl').val();
		$.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
	 }
   /* $('body').on('change', '#category_id', function() {
        var product_name = $('#product_name').val();
        var category_id = $('#category_id').val();
		var myurl= $('#posurl').val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });  */    
//Product search button js
    $('body').on('click', '#search_button', function() {
        var product_name = $('#product_name').val();
        var category_id = $('#category_id').val();
		var myurl= $('#posurl').val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {product_name: product_name,category_id:category_id},
            success: function(data) {
                if (data == '420') {
                    $("#product_search").html('Product not found !');
                }else{
                    $("#product_search").html(data); 
                }
            },
            error: function() {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });    

//Product search button js
    $('body').on('click', '.select_product', function(e) {
        e.preventDefault();
		
		var panel = $(this);
        var pid = panel.find('.panel-body input[name=select_product_id]').val();
		var sizeid = panel.find('.panel-body input[name=select_product_size]').val();
		var catid = panel.find('.panel-body input[name=select_product_cat]').val();
		var itemname= panel.find('.panel-body input[name=select_product_name]').val();
		var varientname=panel.find('.panel-body input[name=select_varient_name]').val();
		var qty=1;
		var price=panel.find('.panel-body input[name=select_product_price]').val();
		var hasaddons=panel.find('.panel-body input[name=select_addons]').val();
		if(hasaddons==0){
		var mysound=baseurl+"assets/";
		var audio =["beep-08b.mp3"];
		new Audio(mysound + audio[0]).play();
		var dataString = "pid="+pid+'&itemname='+itemname+'&varientname='+varientname+'&qty='+qty+'&price='+price+'&catid='+catid+'&sizeid='+sizeid;
	    var myurl= $('#carturl').val();
		 $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 	$('#addfoodlist').html(data);
					var total=$('#grtotal').val();
					var totalitem=$('#totalitem').val();
					$('#item-number').text(totalitem);
					$('#getitemp').val(totalitem);
					var tax=$('#tvat').val();
					$('#vat').val(tax);
					var discount=$('#tdiscount').val();
					var tgtotal=$('#tgtotal').val();
					$('#calvat').text(tax);
					$('#invoice_discount').val(discount);
					$('#caltotal').text(tgtotal);
					$('#grandtotal').val(tgtotal);
					$('#orggrandTotal').val(tgtotal);
					$('#orginattotal').val(tgtotal);
			 } 
		});
		}
	 else{
		 	 var geturl=$("#addonexsurl").val();
			 var myurl =geturl+'/'+pid;
		     var dataString = "pid="+pid+"&sid="+sizeid;
			$.ajax({
		 	 type: "POST",
			 url: geturl,
			 data: dataString,
			 success: function(data) {
				 	 $('.addonsinfo').html(data);
				     $('#edit').modal('show');
					 var totalitem=$('#totalitem').val();
					 var tax=$('#tvat').val();
					var discount=$('#tdiscount').val();
					var tgtotal=$('#tgtotal').val();
					$('#vat').val(tax);
					$('#calvat').text(tax);
					$('#getitemp').val(totalitem);
					$('#invoice_discount').val(discount);
					$('#caltotal').text(tgtotal);
					$('#grandtotal').val(tgtotal);
					$('#orggrandTotal').val(tgtotal);
					$('#orginattotal').val(tgtotal);
			 } 
		});
		 }
    });
/*$('body').on('keyup', '#invoice_discount', function() {
  var total_price = $("#grandTotal").val();
  alert(total_price);
    inv_dis = $("#invoice_discount").val(),
    ser_chg = $("#service_charge").val(),
    sum = total_price+ser_chg - inv_dis;
    $("#grandTotal").val(sum.toFixed(2));
});
$('body').on('keyup', '#service_charge', function() {
  
});*/
 //Payment method toggle 
    $(document).ready(function(){
		$("#nonthirdparty").show();
		$("#thirdparty").hide();
		$("#delivercom").prop('disabled', true);
		$("#waiter").prop('disabled', false);
		$("#tableid").prop('disabled', false);
		$("#cardarea").hide();
		
		
		$("#paidamount").on('keyup', function(){ 
			var maintotalamount=$("#maintotalamount").val();
			var paidamount=$("#paidamount").val();
			var restamount=(parseFloat(paidamount))-(parseFloat(maintotalamount));
			var changes=restamount.toFixed(2);
			$("#change").val(changes);
		});
		
        $(".payment_button").click(function(){
            $(".payment_method").toggle();

            //Select Option
            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: "Select option",
                allowClear: true
            });
        });
		
		$("#card_typesl").on('change', function(){ 
			var cardtype=$("#card_typesl").val();
			
			$("#card_type").val(cardtype);
			if(cardtype==4){
			$("#isonline").val(0);
			$("#cardarea").hide();
			$("#assigncard_terminal").val('');
			$("#assignbank").val('');
			$("#assignlastdigit").val('');
			}
			else if(cardtype==1){
			$("#isonline").val(0);
			$("#cardarea").show();
			}
			else{
				$("#isonline").val(1);
				$("#cardarea").hide();
				$("#assigncard_terminal").val('');
				$("#assignbank").val('');
				$("#assignlastdigit").val('');
				}
			/*if(cardtype==1){
				$("#cholder").show();
				$("#cnumber").show();
				}
			else{
				$("#cholder").hide();
				$("#cnumber").hide();
				}*/
		});
		$("#ctypeid").on('change', function(){ 
			var customertype=$("#ctypeid").val();
			if(customertype==3){
			$("#delivercom").prop('disabled', false);
			$("#waiter").prop('disabled', true);
			$("#tableid").prop('disabled', true);
			$("#nonthirdparty").hide();
			$("#thirdparty").show();
			}
			else if(customertype==4){
			    $("#nonthirdparty").show();
			    $("#thirdparty").hide();
				$("#tblsec").hide();
				$("#delivercom").prop('disabled', true);
				$("#waiter").prop('disabled', false);
			    $("#tableid").prop('disabled', true);
			}
			else{
				$("#nonthirdparty").show();
			    $("#thirdparty").hide();
				$("#delivercom").prop('disabled', true);
				$("#waiter").prop('disabled', false);
			    $("#tableid").prop('disabled', false);
				}
		});
    });

function placeorder(){
	  var ctypeid=$("#ctypeid").val();
	  var waiter="";
	  var isdelivary="";
	  var tableid="";
	  var customer_name=$("#customer_name").val();
	  var cardtype=4;
	  var isonline=0;
	  var order_date=$("#order_date").val();
	  var grandtotal=$("#grandtotal").val();
	  var customernote="";
	  var invoice_discount=$("#invoice_discount").val();
	  var service_charge=$("#service_charge").val();
	  var vat=$("#vat").val();
	  var orggrandTotal=$("#subtotal").val();
	  //var isonline=$("#isonline").val();
	  var isitem=$("#totalitem").val();
	  var errormessage = '';
		if(customer_name == ''){ errormessage = errormessage+'<span>Please Select Customer Name.</span>';
			alert("Please Select Customer Name!!!");
			return false;
		}
		if(ctypeid == ''){ errormessage = errormessage+'<span>Please Select Customer Type.</span>';
			alert("Please Select Customer Type!!!");
			return false;
		}
		if(isitem == '' || isitem==0){ errormessage = errormessage+'<span>Please add Some Food</span>';
			alert("Please add Some Food!!!");
			return false;
		}
		if(ctypeid==3){
				 var isdelivary=$("#delivercom").val();
				 if(isdelivary == ''){ errormessage = errormessage+'<span>Please Select Customer Type.</span>';
					alert("Please Select Delivar Company!!!");
					return false;
				}
			}
		else if(ctypeid==4){
				 var waiter=$("#waiter").val();
				 if(waiter == ''){ errormessage = errormessage+'<span>Please Select Waiter.</span>';
					alert("Please Select Waiter!!!");
					return false;
				}
			}
		else{
			 var waiter=$("#waiter").val();
			 var tableid=$("#tableid").val();
				if(waiter == ''){ errormessage = errormessage+'<span>Please Select Waiter.</span>';
					alert("Please Select Waiter!!!");
					return false;
				}
				if(tableid == ''){ errormessage = errormessage+'<span>Please Select Table.</span>';
					alert("Please Select Table!!!");
					return false;
				}
			}
			
		
		if(errormessage==''){
			  order_date=encodeURIComponent(order_date);
			  customernote=encodeURIComponent(customernote);
			  var errormessage = '<span style="color:#060;">Signup Completed Successfully.</span>';
			  var dataString = 'customer_name='+customer_name+'&ctypeid='+ctypeid+'&waiter='+waiter+'&tableid='+tableid+'&card_type='+cardtype+'&isonline='+isonline+'&order_date='+order_date+'&grandtotal='+grandtotal+'&customernote='+customernote+'&invoice_discount='+invoice_discount+'&service_charge='+service_charge+'&vat='+vat+'&subtotal='+orggrandTotal+'&assigncard_terminal=&assignbank=&assignlastdigit=&delivercom='+isdelivary;
				//alert(dataString);
				//return false;	
					$.ajax({
						type: "POST",
						url: "<?php echo base_url()?>ordermanage/order/pos_order",
						data: dataString,
						success: function(data){
							$('#addfoodlist').empty();
							$("#getitemp").val('0');
							$('#calvat').text('0');
							$('#vat').val('0');
							$('#invoice_discount').val('0');
							$('#caltotal').text('');
							$('#grandtotal').val('');
							$('#orggrandTotal').val('');
							var err = data;
							if(err=="error"){
								swal({
								title: "<?php echo display('ord_failed');?>",
								text: "<?php echo display('failed_msg');?>",
								type: "warning",
								showCancelButton: true,
								confirmButtonColor: "#DD6B55",
								confirmButtonText: "Yes, Cancel!",
								closeOnConfirm: false
								},
							    function () {
								window.location.href="<?php echo base_url()?>ordermanage/order/pos_invoice";
							    });
								}
						   else{
							swal({
								title: "<?php echo display('ord_succ');?>",
								text: "Do you Want to Print Token No.???",
								type: "success",
								showCancelButton: true,
								confirmButtonColor: "#28a745",
								confirmButtonText: "Yes",
								cancelButtonText: "No",
								closeOnConfirm: false,
								closeOnCancel: false
							},
							function (isConfirm) {
								if (isConfirm) {
								  window.location.href="<?php echo base_url()?>ordermanage/order/postokengenerate/"+data;
								} else {
									window.location.href="<?php echo base_url()?>ordermanage/order/pos_invoice";
								}
							});
						   }
						}
					});
			
			}
		
	  
	}
function payorderbill(status,orderid,totalamount){
	$('#paidbill').attr('onclick','orderconfirmorcancel('+status+','+orderid+')');
	$('#maintotalamount').val(totalamount);
	$('#totalamount').val(totalamount);
	//$('#paidamount').val();
	$('#payprint').modal('show');
	}
function onlinepay(){
	 $("#onlineordersubmit").submit();
	}	
function orderconfirmorcancel(status,orderid){
	mystatus=status;
	if(status==9 || status==10){
		status=4;
	}
	var carttype='';
	var cterminal='';
	var mybank='';
	var mydigit='';
	var paid='';
	if(status==4){
		 var carttype=$("#card_typesl").val();
		 var cterminal=$("#card_terminal").val();
		  var mybank=$("#bank").val();
		  var mydigit=$("#last4digit").val();
		  var paid=$('#paidamount').val();
		 if(carttype==''){
			 alert("Please Select Payment Method!!!");
			 return false;
			 }
			if(carttype==1){
			  if(cterminal==''){
				   alert("Please Select Card Terminal!!!");
				   return false;
				  }
			}
		}
	 var dataString = 'status='+status+'&orderid='+orderid+'&paytype='+carttype+'&cterminal='+cterminal+'&mybank='+mybank+'&mydigit='+mydigit+'&paid='+paid;
	 $.ajax({
			type: "POST",
			url: "<?php echo base_url()?>ordermanage/order/changestatus",
			data: dataString,
			success: function(data){
				$("#onprocesslist").html(data);
				if(mystatus=="9"){
					window.location.href="<?php echo base_url()?>ordermanage/order/orderinvoice/"+orderid;
					}
			   else if(mystatus=="10"){
				window.location.href="<?php echo base_url()?>ordermanage/order/posprintdirect/"+orderid;
			   }
			   else if(mystatus==4){
				   			swal({
								title: "Order Completed",
								text: "Order Completed Successfully",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "#28a745",
								confirmButtonText: "Yes",
								closeOnConfirm: false
								},
				   			function () {
								window.location.href="<?php echo base_url()?>ordermanage/order/pos_invoice";
							    });
				   }
			}
		});
	}
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url: "<?php echo base_url()?>ordermanage/order/notification",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();

 
 setInterval(function(){ 
  load_unseen_notification(); 
 }, 700);
 
/* function aceptorcancel(ordid){
	 	swal({
			title: "Order Confirmation",
			text: "Are You Accept Or Reject this Order??",
			type: "success",
			showCancelButton: true,
			confirmButtonColor: "#28a745",
			confirmButtonText: "Accept",
			cancelButtonText: "Reject",
			closeOnConfirm: false,
			closeOnCancel: true
		},
		function (isConfirm) {
			if (isConfirm) {
				var dataString = 'status=1&acceptreject=1&reason=&orderid='+ordid;
					 $.ajax({
							type: "POST",
							url: "<?php echo base_url()?>ordermanage/order/acceptnotify",
							data: dataString,
							success: function(data){
								swal("Accepted", "Your Order is Accepted", "success");
								onlineoredrlist.ajax.reload();
							}
						});
			} else {
				$("#cancelord").modal('show');
				$("#canordid").html(ordid);
				$("#mycanorder").val(ordid);
				    
			}
		});
	 }	*/

</script>