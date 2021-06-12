<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo "Add Production" ?></legend>
                    </fieldset>
                    <?php echo form_open_multipart('production/production/insert_production',array('class' => 'form-vertical', 'id' => 'insert_production','name' => 'insert_production'))?>
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
                             <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Production Date<i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                 <input type="text" class="form-control datepicker" name="production_date" value="<?php echo date('d-m-Y');?>" id="production_date" required="" tabindex="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                             <div class="col-sm-7">
                               <div class="form-group row">
                                    <label for="quantity" class="col-sm-4 col-form-label"><?php echo "Serving Unit"; ?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pro_qty" value="" id="pro_qty" required="" tabindex="3" onkeyup="checkavailablity()">
                                    </div>
                                </div> 
                               
                            </div>
                            <div class="col-sm-5">
                            <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Expire Date<i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                 <input type="text" class="form-control datepicker" name="expire_date" value="<?php echo date('d-m-Y');?>" id="expire_date" required="" tabindex="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                     <div class="form-group row">
                            <label for="quantity" class="col-sm-2 col-form-label">&nbsp; </label>
                            <div class="col-sm-3" style="margin-left: 34px;">
                                <input type="submit" id="add_production" class="btn btn-success btn-large" name="add-purchase" value="Submit">
                            </div>
                        </div>
                        </form>
                </div> 
            </div>
        </div>
    </div>
    
    <script>
	$(document).ready(function() {
		$('#add_production').prop("disabled", true);
		})
    function checkavailablity(){
		var foodid=$("#foodid").val();
		var servingqty=$("#pro_qty").val();
		if(servingqty=='' || servingqty==0){
		$('#add_production').prop("disabled", true);
		return false;	
		}
		
		if(foodid==''){
			alert("Select Food Item!!");
			$("#pro_qty").val('');
			return false;
			}
		var myurl ='<?php echo base_url("production/production/ingredientcheck") ?>';
	    var dataString = "foodid="+foodid+'&qty='+servingqty;
	   //alert(myurl);
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			if(data==0){
				$('#add_production').prop("disabled", true);
				alert("Please check Ingredients!!Some Ingredients are not Available!!!");
				$("#pro_qty").val('');
				}
			else if(data==1){
				$('#add_production').prop("disabled", false);
				}
		 } 
	});
		}
    </script>