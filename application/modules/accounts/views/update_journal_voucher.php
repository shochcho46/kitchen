<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                     <?php echo display('update_credit_voucher')?>
                    </h4>
                </div>
            </div>
            <div class="panel-body">
                  
                         <?= form_open_multipart('accounts/accounts/update_journal_voucher') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>
                        <div class="col-sm-4">
                             <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php echo $journal_info[0]->VNo; ?>" class="form-control" readonly>
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"> <?php echo display('date')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php echo $journal_info[0]->VDate;?>">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"> <?php echo display('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"><?php echo $journal_info[0]->Narration?></textarea>
                        </div>
                    </div> 
                       <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 
                                <thead>
                                     <tr>
                                          <th class="text-center"> <?php echo display('account_name')?></th>
                                          <th class="text-center"> <?php echo display('code')?></th>
                                          <th class="text-center"> <?php echo display('debit')?></th>
                                          <th class="text-center"> <?php echo display('credit')?></th>
                                          <th class="text-center"><?php echo display('action')?></th>
                                        </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                        <?php
                                        $sl = 1;
                                        $dbt = $cdt = 0;
                                        foreach ($journal_info as $single) {
                                            ?>
                                            <tr>
                                                <td class="" style="width: 200px;">  
                                                    <select name="cmbCode[]" id="cmbCode_<?php echo $sl; ?>" class="form-control select2-single" onchange="load_code(this.value,<?php echo $sl; ?>)">
                                                        <?php foreach ($acc as $acc1) { ?>
                                                            <option value="<?php echo $acc1->HeadCode; ?>" <?php
                                                            if ($single->COAID == $acc1->HeadCode) {
                                                                echo 'selected';
                                                            }
                                                            ?>><?php echo $acc1->HeadName; ?></option>
                                                                <?php } ?>
                                                    </select>

                                                </td>
                                                <td><input type="text" name="txtCode[]"  class="form-control text-center"  id="txtCode_<?php echo $sl; ?>" required value="<?php echo $single->COAID; ?>"></td>
                                                <td><input type="text" name="txtAmount[]" class="form-control total_price text-right" value="<?php echo $single->Debit;
                                                            $dbt += $single->Debit; ?>" placeholder="0"  id="txtAmount_<?php echo $sl; ?>" onkeyup="calculation(<?php echo $sl; ?>)" >
                                                </td>
                                                <td>
                                                    <input type="text" name="txtAmountcr[]"  class="form-control total_price1 text-right" value="<?php echo $single->Credit;
                                                            $cdt += $single->Credit; ?>" placeholder="0"  id="txtAmount1_1" onkeyup="calculation(<?php echo $sl; ?>)" >
                                                </td>
                                                <td>
                                                    <button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>                              
                                            <?php
                                            $sl++;
                                        }
                                        ?>
                                    </tbody>
                                <tfoot>
                                        <tr>
                                            <td >
                                                <input type="button" id="add_more" class="btn btn-info" name="add_more"  onClick="addaccount('debitvoucher');" value="<?php echo display('add_more') ?>" />
                                            </td>
                                            <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                            </td>
                                            <td class="text-right">
                                                <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="<?php echo number_format($dbt, 2, '.', ','); ?>" readonly="readonly"  placeholder="0"/>
                                            </td>
                                            <td class="text-right">
                                                <input type="text" id="grandTotal1" class="form-control text-right " name="grand_total1" value="<?php echo number_format($cdt, 2, '.', ','); ?>" readonly="readonly" placeholder="0"/>
                                            </td>
                                        </tr>
                                    </tfoot>                               
                             
                            </table>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo display('update') ?>" tabindex="9"/>
                               
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
        url : "<?php echo site_url('accounts/accounts/debit_voucher_code/')?>" + id,
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
    if (count == limits) alert("<?php echo display('errorajdata') ?> " + count + " <?php echo display('inpt') ?>");
    else {
          var newdiv = document.createElement('tr');
          var tabin="cmbCode_"+count;
          var tabindex = count * 2;
          newdiv = document.createElement("tr");
          newdiv.innerHTML = "<td> <select name='cmbCode[]' id='cmbCode_" + count + "' class='form-control' onchange='load_code(this.value," + count + ")'><?php foreach ($acc as $acc2) { ?><option value='<?php echo $acc2->HeadCode; ?>'><?php echo $acc2->HeadName; ?></option><?php } ?></select></td><td><input type='text' name='txtCode[]' class='form-control text-center'  id='txtCode_" + count + "' ></td><td><input type='text' name='txtAmount[]' class='form-control total_price text-right' value='' placeholder='0' id='txtAmount_" + count + "' onkeyup='calculation(" + count + ")'></td><td><input type='text' name='txtAmountcr[]' class='form-control total_price1 text-right' id='txtAmount1_" + count + "' value='' placeholder='0' onkeyup='calculation(" + count + ")'></td><td><button style='text-align: right;' class='btn btn-danger red' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-trash-o'></i></button></td>";
          //newdiv.innerHTML ="<td> <select name='cmbCode[]' id='cmbCode_"+ count +"' class='form-control' onchange='load_code(this.value,"+ count +")'><?php foreach ($acc as $acc2) {?><option value='<?php echo $acc2->HeadCode;?>'><?php echo $acc2->HeadName;?></option><?php }?></select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_"+ count +"' ></td><td><input type='text' name='txtAmount[]' class='form-control total_price' id='txtAmount_"+ count +"' onkeyup='calculation("+ count +")'></td><td><button style='text-align: right;' class='btn btn-danger red' type='button' value='<?php echo display("delete")?>' onclick='deleteRow(this)'><i class='fa fa-trash-o'></i></button></td>";
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
        var gr_tot1 = 0;
        var gr_tot = 0;
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });

        $(".total_price1").each(function () {
            isNaN(this.value) || 0 == this.value.length || (gr_tot1 += parseFloat(this.value))
        });
        $("#grandTotal").val(gr_tot.toFixed(2, 2));
        $("#grandTotal1").val(gr_tot1.toFixed(2, 2));
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

</script>
<script type="text/javascript">
    
     $(function(){
        $(".datepicker").datepicker({ dateFormat:'yy-mm-dd' });
       
    });
</script>