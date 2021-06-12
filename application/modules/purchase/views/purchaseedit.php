<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                   
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo "Add Purchase" ?></legend>
                    </fieldset>
                    <?php echo form_open_multipart('purchase/purchase/update_entry',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                     <?php echo form_hidden('purID', (!empty($purchaseinfo->purID)?$purchaseinfo->purID:null));
					 echo form_hidden('oldinvoice', (!empty($purchaseinfo->invoiceid)?$purchaseinfo->invoiceid:null));
					 echo form_hidden('oldsupplier', (!empty($purchaseinfo->suplierID)?$purchaseinfo->suplierID:null));
					 $originalDate = $purchaseinfo->purchasedate;
					 $purchasedate = date("d-m-Y", strtotime($originalDate));
					 
					 $originalexDate = $purchaseinfo->purchaseexpiredate;
					 $expiredatedate = date("d-m-Y", strtotime($originalexDate));
					 ?>
                    <input name="url" type="hidden" id="url" value="<?php echo base_url("purchase/purchase/purchaseitem") ?>" />

                    <div class="row">
                             <div class="col-sm-7">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-3 col-form-label"><?php echo display('supplier_name') ?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-5">
                                        <?php 
						if(empty($supplier)){$supplier = array('' => '--Select--');}
						echo form_dropdown('suplierid',$supplier,(!empty($purchaseinfo->suplierID)?$purchaseinfo->suplierID:null),'class="form-control"  id="suplierid"') ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="<?php echo base_url("setting/supplierlist/index") ?>">Add Supplier</a>
                                    </div>
                                </div> 
                            </div>
                             <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Invoice No <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="invoice_no" value="<?php echo $purchaseinfo->invoiceid;?>" placeholder="Invoice No" id="invoice_no" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-sm-7">
                            <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label">Purchase Date<i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-3">
                                 <input type="text" class="form-control datepicker" name="purchase_date" value="<?php echo $purchasedate;?>" id="date" required="" tabindex="2">
                                    </div>
                                     <label for="date" class="col-sm-3 col-form-label">Expire Date <i class="text-danger">*</i></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" name="expire_date" data-date-format="mm/dd/yyyy" value="<?php echo $expiredatedate;?>" id="expire_date" required="" tabindex="2" readonly="readonly">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-sm-5">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Details</label>
                                    <div class="col-sm-8">
                        <textarea class="form-control" tabindex="4" id="adress" name="purchase_details" placeholder=" Details" rows="1"><?php echo $purchaseinfo->details;?></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    <div class="row">
                  	  <div class="col-sm-7">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-3 col-form-label">Payment Type</label>
                                    <div class="col-sm-5">
                                    	<select name="paytype" class="form-control" required="" onchange="bank_paymet(this.value)">
                                            <option value="1" <?php if($purchaseinfo->paymenttype==1){ echo "Selected";}?>>Cash Payment</option>
                                            <option value="2" <?php if($purchaseinfo->paymenttype==2){ echo "Selected";}?>>Bank Payment</option>
                                            <option value="3" <?php if($purchaseinfo->paymenttype==3){ echo "Selected";}?>>Due Payment</option> 
                                        </select>
                                    </div>
                                </div> 
                            </div>
                      <div class="col-sm-5">
                               <div class="form-group row" id="showbank" style="display:<?php if($purchaseinfo->paymenttype!=2){ echo "none";}?>;">
                                    <label for="adress" class="col-sm-4 col-form-label">Select Bank</label>
                                    <div class="col-sm-8">
                                    	<select name="bank" id="bankid" class="form-control" style="width:100%;">
                                            <option value="">Select Bank</option>
                                            <?php if(!empty($banklist)){
												foreach($banklist as $bank){?>
												 <option value="<?php echo $bank->bankid?>" <?php if($purchaseinfo->bankid==$bank->bankid){ echo "Selected";}?>><?php echo $bank->bank_name?></option>
											<?php } }?>	
                                        </select>
                                    </div>
                                </div> 
                            </div>
                    </div>
                     <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%">Item Information<i class="text-danger">*</i></th> 
                                            <th class="text-center">Stock/Qnt</th>
                                            <th class="text-center">Qnty <i class="text-danger">*</i></th>
                                            <th class="text-center">Rate<i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center"></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                <?php $i=0;
								foreach($iteminfo as $item){
									$i++;
									?>
                                    <tr>
                                        <td class="span3 supplier">
                                       <input type="text" name="product_name" required="" class="form-control product_name" onkeypress="product_list(<?php echo $i;?>);" placeholder="Item Name" id="product_name_<?php echo $i;?>" value="<?php echo $item->ingredient_name;?>" tabindex="5">
                                   <input type="hidden" class="autocomplete_hidden_value product_id_<?php echo $i;?>" name="product_id[]" id="SchoolHiddenId" value="<?php echo $item->indredientid;?>">
                                   <input type="hidden" class="sl" value="<?php echo $i;?>">
                                        </td>

                                       <td class="wt">
                                                <input type="text" id="available_quantity_<?php echo $i;?>" class="form-control text-right stock_ctn_<?php echo $i;?>" placeholder="0.00" value="" readonly="">
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_<?php echo $i;?>" class="form-control text-right store_cal_1" onkeyup="calculate_store(<?php echo $i;?>);" onchange="calculate_store(<?php echo $i;?>);" placeholder="0.00" value="<?php echo $item->quantity;?>" min="0" tabindex="6">
                                            </td>
                                            <td class="test">
                                                <input type="number" step="0.01" name="product_rate[]" onkeyup="calculate_store(<?php echo $i;?>);" onchange="calculate_store(<?php echo $i;?>);" id="product_rate_<?php echo $i;?>" class="form-control product_rate_<?php echo $i;?> text-right" placeholder="0.00" value="<?php echo $item->price;?>" min="0" tabindex="7">
                                            </td>
                                           

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_<?php echo $i;?>" value="<?php echo $item->totalprice;?>" readonly="readonly">
                                            </td>
                                            <td>
                                                <button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button>
                                            </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="button" id="add_invoice_item" class="btn btn-success" name="add-invoice-item" onclick="addmore('addPurchaseItem');" value="Add More item" tabindex="9">
                                        </td>
                                        <td style="text-align:right;" colspan="2"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="<?php echo $purchaseinfo->total_price;?>" readonly="readonly">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align:right;"><b>Paid Amount:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidamount" class="text-right form-control" name="paidamount" value="<?php echo $purchaseinfo->paid_amount;?>" placeholder="0.00">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                     <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-success btn-large" name="add-purchase" value="Submit">
                            </div>
                        </div>
                        </form>
                </div> 
            </div>
        </div>
    </div>
<script>
var row = $("#purchaseTable tbody tr").length;
var count = row+1;
var limits = 500;

function product_list(sl) {
    var supplier_id = $('#suplierid').val();
	 var geturl=$("#url").val();
	 var csrf_token=$("#setcsrf").val();
	var csrfname=$("#csrfname").val();
	//alert(csrfname);
    if (supplier_id == 0 || supplier_id=='') {
        alert('Please select Supplier !');
        return false;
    }

    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
        var product_name = $('#product_name_'+sl).val();
        $.ajax( {
          url: geturl,
          method: 'post',
          dataType: "json",
          data: {
            csrf_test_name:csrf_token,
			product_name:product_name
          },
          success: function( data ) {
            response( data );
			//alert(data.csrf_token)
          }
        });
      },
       focus: function( event, ui ) {
           $(this).val(ui.item.label);
           return false;
       },
       select: function( event, ui ) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value); 
            var sl = $(this).parent().parent().find(".sl").val(); 
            var product_id          = ui.item.value;
         	var  supplier_id=$('#supplier_id').val();
            var available_quantity    = 'available_quantity_'+sl;
            var product_rate    = 'product_rate_'+sl;
            $.ajax({
                type: "POST",
                url: baseurl+"purchase/purchase/purchasequantity",
                 data: {product_id:product_id},
                cache: false,
                success: function(data)
                {
                    console.log(data);
                    obj = JSON.parse(data);
                   $('#'+available_quantity).val(obj.total_product);
                    $('#'+product_rate).val(obj.supplier_price);
                  
                } 
            });

            $(this).unbind("change");
            return false;
       }
   }

   $('body').on('keydown.autocomplete', '.product_name', function() {
       $(this).autocomplete(options);
   });
}

    function addmore(divName){
		var row = $("#purchaseTable tbody tr").length;
var count = row+1;
        if (count == limits)  {
            alert("You have reached the limit of adding " + count + " inputs");
        }
        else{
            var newdiv = document.createElement('tr');
            var tabin="product_name_"+count;
             tabindex = count * 4 ,
             newdiv = document.createElement("tr");
            tab1 = tabindex + 1;
            
            tab2 = tabindex + 2;
            tab3 = tabindex + 3;
            tab4 = tabindex + 4;
            tab5 = tabindex + 5;
            tab6 = tab5 + 1;
            tab7 = tab6 +1;
           


  newdiv.innerHTML ='<td class="span3 supplier"><input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_list('+ count +');" placeholder="Item Name" id="product_name_'+ count +'" tabindex="'+tab1+'" > <input type="hidden" class="autocomplete_hidden_value product_id_'+ count +'" name="product_id[]" id="SchoolHiddenId"/>  <input type="hidden" class="sl" value="'+ count +'">  </td><td class="wt"> <input type="text" id="available_quantity_'+ count +'" class="form-control text-right stock_ctn_'+ count +'" placeholder="0.00" readonly/> </td><td class="text-right"><input type="number" step="0.01" name="product_quantity[]" tabindex="'+tab2+'" required  id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="calculate_store(' + count + ');" onchange="calculate_store(' + count + ');" placeholder="0.00" value="" min="0"/>  </td><td class="test"><input type="number" name="product_rate[]" onkeyup="calculate_store('+ count +');" onchange="calculate_store('+ count +');" id="product_rate_'+ count +'" class="form-control product_rate_'+ count +' text-right" placeholder="0.00" value="" min="0" tabindex="'+tab3+'"/></td><td class="text-right"><input class="form-control total_price text-right total_price_'+ count +'" type="text" name="total_price[]" id="total_price_'+ count +'" value="0.00" readonly="readonly" /> </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button></td>';
            document.getElementById(divName).appendChild(newdiv);
            document.getElementById(tabin).focus();
            document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
            document.getElementById("add_purchase").setAttribute("tabindex", tab6);
           
            count++;

            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: "Select option",
                allowClear: true
            });
        }
    }
    //Calculate store product
    function calculate_store(sl) {
       
        var gr_tot = 0;
        var item_ctn_qty    = $("#cartoon_"+sl).val();
        var vendor_rate = $("#product_rate_"+sl).val();

        var total_price     = item_ctn_qty * vendor_rate;
        $("#total_price_"+sl).val(total_price.toFixed(2));

       
        //Total Price
        $(".total_price").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });

        $("#grandTotal").val(gr_tot.toFixed(2,2));
    }
function bank_paymet(id){
		    var dataString = 'bankid='+id;
		if(id==2){
			$("#showbank").show();
			$('#bankid').attr('required', true);   
        	$.ajax({
			 url: baseurl+"purchase/purchase/banklist",
			 dataType:'json',
			  type: "POST",
			  data: dataString,
			  async:true,
			  success: function(data) {
					var options = data.map(function(val, ind){
    					return $("<option></option>").val(val.bankid).html(val.bank_name);
					});
					$('#bankid').append(options);
				  }

		   });
		}
		else{
			$("#showbank").hide();
			$('#bankid').attr('required', false);  
			}
	}	
</script>