
  
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                      <?php echo display('supplier_payment')?>   
                    </h4>
                </div>
            </div>
            <div class="panel-body">
              
                         <?= form_open_multipart('accounts/accounts/create_supplier_payment') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no->voucher)){
                               $vn = substr($voucher_no->voucher,3)+1;
                              echo $voucher_n = 'PM-'.$vn;
                             }else{
                               echo $voucher_n = 'PM-1';
                             } ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                                    <label for="adress" class="col-sm-2 col-form-label"><?php echo display('ptype')?></label>
                                    <div class="col-sm-4">
                                    	<select name="paytype" class="form-control" required="" onchange="bank_paymet(this.value)">
                                            <option value="1"><?php echo display('casp')?></option>
                                            <option value="2"><?php echo display('bnkp')?></option>
                                        </select>
                                    </div>
                                </div>
                      <div class="form-group row" id="showbank" style="display:none;">
                                    <label for="adress" class="col-sm-2 col-form-label"><?php echo display('slbank')?></label>
                                    <div class="col-sm-4">
                                    	<select name="bank" id="bankid" class="form-control" style="width:100%;">
                                            <option value=""><?php echo display('slbank')?></option>
                                        </select>
                                    </div>
                                </div> 
                     <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo display('date')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>">
                        </div>
                    </div> 
                       <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo display('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                        </div>
                    </div> 
                   
                       <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('supplier_name')?></th>
                                         <th class="text-center"><?php echo display('code')?></th>
                                          <th class="text-center"><?php echo display('amount')?></th>
                                            
                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                   
                                    <tr>
                                        <td class="" style="width: 200px;">  
       <select name="supplier_id" id="supplier_id_1" class="form-control" onchange="load_code(this.value,1)" required>
        <option value=""><?php echo display('slsuplier') ?></option>
         <?php foreach ($supplier_list as $suplier) {?>
   <option value="<?php echo $suplier->supid;?>"><?php echo $suplier->supName;?></option>
         <?php }?>
       </select>

                                         </td>
                                        <td><input type="text" name="txtCode" value="" class="form-control "  id="txtCode_1" readonly=""></td>
                                        <td><input type="number" name="txtAmount" value="" class="form-control total_price text-right"  id="txtAmount_1" onkeyup="calculation(1)" required>
                                           </td>
                                 
                                    </tr>                              
                              
                                </tbody>                               
                             <tfoot>
                                    <tr>
                                      <td >

                                        </td>
                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                           </td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="" readonly="readonly" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
            </div>  
        </div>
    </div>
</div>
<script type="text/javascript">

  function load_code(id,sl){

    $.ajax({
        url : "<?php echo site_url('accounts/accounts/supplier_headcode/')?>" + id,
        type: "GET",
        dataType: "json",
        success: function(data)
        {
          
           $('#txtCode_'+sl).val(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('<?php echo display('errorajdata') ?>');
        }
    });
}
    function addaccount(divName){
    var row = $("#debtAccVoucher tbody tr").length;
    var count = row + 1;
    var limits = 500;
    var tabin = 0;
    if (count == limits) alert("<?php echo display('total') ?> " + count + " <?php echo display('inpt') ?>");
    else {
          var newdiv = document.createElement('tr');
          var tabin="cmbCode_"+count;
          var tabindex = count * 2;
          newdiv = document.createElement("tr");
           
          newdiv.innerHTML ="<td> <select name='supplier_id[]' id='supplier_id_"+ count +"' class='form-control' onchange='load_code(this.value,"+ count +")' required><option value=''><?php echo display('slsuplier') ?></option><?php foreach ($supplier_list as $suplier) {?><option value='<?php echo $suplier->supplier_id;?>'><?php echo $suplier->supplier_name;?></option><?php }?></select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_"+ count +"' ></td><td><input type='number' name='txtAmount[]' class='form-control total_price text-right' id='txtAmount_"+ count +"' onkeyup='calculation("+ count +")' required></td><td><button style='text-align: right;' class='btn btn-danger red' type='button' value='<?php echo display("delete")?>' onclick='deleteRow(this)'><i class='fa fa-trash-o'></i></button></td>";
          document.getElementById(divName).appendChild(newdiv);
          document.getElementById(tabin).focus();
          count++;
           
          $("select.form-control:not(.dont-select-me)").select2({
              placeholder: "Select option",
              allowClear: true
          });
        }
    }

function calculation(sl) {
       
        var gr_tot = 0;
        $(".total_price").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });

        $("#grandTotal").val(gr_tot.toFixed(2,2));
    }

    function deleteRow(e) {
        var t = $("#debtAccVoucher > tbody > tr").length;
        if (1 == t) alert("<?php echo display('cantdel') ?>");
        else {
            var a = e.parentNode.parentNode;
            a.parentNode.removeChild(a)
        }
        calculation()
    }
function bank_paymet(id){
		    var dataString = 'bankid='+id;
		if(id==2){
			$("#showbank").show();
			$('#bankid').attr('required', true);   
        	$.ajax({
			 url: baseurl+"accounts/accounts/banklist",
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
<script type="text/javascript">
    
     $(function(){
        $(".datepicker").datepicker({ dateFormat:'yy-mm-dd' });
       
    });
</script>