<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <?php echo form_hidden('purID', (!empty($intinfo->purID)?$intinfo->purID:null)) ?>
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo "Set Production Cost Per Unit" ?></legend>
                    </fieldset>
                    <?php echo form_open_multipart('production/production/production_entry',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                    <input name="url" type="hidden" id="url" value="<?php echo base_url("production/production/productionitem") ?>" />

                    <div class="row">
                             <div class="col-sm-7">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('item_name') ?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <?php 
						if(empty($item)){$item = array('' => '--Select--');}
						echo form_dropdown('foodid',$item,(!empty($item->ProductsID)?$item->ProductsID:null),'class="form-control" id="foodid"') ?>
                                    </div>
                                </div> 
                            </div>
                             
                        </div>
                     <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%">Item Information<i class="text-danger">*</i></th> 
                                            <th class="text-center">Qnty <i class="text-danger">*</i></th>
                                            <th class="text-center"></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 supplier">
                                       <input type="text" name="product_name" required="" class="form-control product_name" onkeypress="product_list(1);" placeholder="Item Name" id="product_name_1" tabindex="5">
                                   <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId">
                                   <input type="hidden" class="sl" value="1">
                                        </td>
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" class="form-control text-right store_cal_1" placeholder="0.00" value="" min="0" tabindex="6">
                                            </td>
                                            <td>
                                                <button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button>
                                            </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <input type="button" id="add_invoice_item" class="btn btn-success" name="add-invoice-item" onclick="addmore('addPurchaseItem');" value="Add More item" tabindex="9">
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
function product_list(sl) {
    var foodid = $('#foodid').val();
	 var geturl=$("#url").val();
	//alert(csrfname);
    if (foodid == 0 || foodid=='') {
        alert('Please select Desiger Food !');
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
         	var  foodid=$('#foodid').val();
            $(this).unbind("change");
            return false;
       }
   }

   $('body').on('keydown.autocomplete', '.product_name', function() {
       $(this).autocomplete(options);
   });
}
var count = 2;
    var limits = 500;

    function addmore(divName){
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
  newdiv.innerHTML ='<td class="span3 supplier"><input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_list('+ count +');" placeholder="Item Name" id="product_name_'+ count +'" tabindex="'+tab1+'" > <input type="hidden" class="autocomplete_hidden_value product_id_'+ count +'" name="product_id[]" id="SchoolHiddenId"/><td class="text-right"><input type="text" name="product_quantity[]" tabindex="'+tab2+'" required  id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '"  placeholder="0.00" value="" min="0"/>  </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button></td>';
            document.getElementById(divName).appendChild(newdiv);
            document.getElementById(tabin).focus();
            document.getElementById("add_invoice_item").setAttribute("tabindex", tab3);
            document.getElementById("add_purchase").setAttribute("tabindex", tab4);
           
            count++;

            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: "Select option",
                allowClear: true
            });
        }
    }
</script>