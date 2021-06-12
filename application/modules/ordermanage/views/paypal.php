
    
        <center><h2> Please wait, while we transfer to secure payment panel...</h2></center>
 
        <!--<form id="payment_gw" name="payment_gw" method="POST" action="https://sandbox.sslcommerz.com/gwprocess/v3/process.php" testbox>-->
     <!--   <form id="payment_gw" name="payment_gw" method="POST" action="https://securepay.sslcommerz.com/gwprocess/v3/process.php">
        <input type="hidden" name="total_amount" value="" />
        <input type="hidden" name="store_id" value="" />
        <input type="hidden" name="tran_id" value="" />
        <input type="hidden" name="success_url" value="" />
        <input type="hidden" name="fail_url" value="" />
        <input type="hidden" name="cancel_url" value="" /> 
        <input type="hidden" name="version" value="3.00" /> 
        
        <input type="hidden" name="cus_name" value="">
        <input type="hidden" name="cus_email" value=""> 
        <input type="hidden" name="cus_add1" value="">
        <input type="hidden" name="cus_city" value="">
        <input type="hidden" name="cus_state" value="">
        <input type="hidden" name="cus_postcode" value="">
        <input type="hidden" name="cus_country" value="Bangladesh">
        <input type="hidden" name="cus_phone" value="">
        </form> --> 

        <?php if($paymentinfo->Islive==1){?>
        <form id="payment_gw" name="payment_gw" method="POST" action="https://www.paypal.com/cgi-bin/webscr">
        <?php }
		else{
		?>
        <form id="payment_gw" name="payment_gw" method="POST" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
        <?php } ?>
         <input type="hidden" name="business" value="<?php echo $paymentinfo->email;?>">
          <input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="amount" value="<?php echo $orderinfo->totalamount;?>">
<input type="hidden" name="item_number" value="<?php echo $orderinfo->order_id;?>">
<input type="hidden" name="first_name" value="<?php echo $customerinfo->customer_name;?>">
<input type="hidden" name="currency_code" value="<?php echo $paymentinfo->currency;?>">
<input type="hidden" name="return" value="<?php echo base_url();?>ordermanage/order/successful/<?php echo $orderinfo->order_id;?>">
<input type="hidden" name="cancel_return" value = "<?php echo base_url();?>ordermanage/order/cancilorder/<?php echo $orderinfo->order_id;?>">
<input type="submit" value="Pay with SSLCOMMERZ" name="pay" style="display:none;" >
</form> 
    
        <script>
            window.onload = function(){
              document.forms['payment_gw'].submit()
            }        
        </script>
        
