<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
function printDiv() {
    var divName = "printArea";
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    // document.body.style.marginTop="-45px";
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
<div class="row">
        <div class="col-sm-12 col-md-12">
           <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                      <?php if($this->permission->method('purchase','read')->access()): ?>
                        <a href="<?php echo base_url('purchase/purchase/return_invoice') ?>" class="btn btn-sm btn-success" title="List"> <i class="fa fa-list"></i> <?php echo display('list') ?></a>  
                         <?php endif; ?>
                         <?php if($this->permission->method('purchase','create')->access()): ?>
                        <a href="<?php echo base_url('purchase/purchase/return_form') ?>" class="btn btn-sm btn-info" title="Add"><i class="fa fa-plus"></i> <?php echo display('ad') ?></a> 
                        <?php endif; ?>
                    </h4>
                </div>
            </div> 
            <div class="panel-body" id="printArea">
            <div class="text-center">
								<h3> <?php echo $setting->storename;?> </h3>
								<h4>Supplier Name:<?php echo $purchaseinfo->supName;?> </h4>
                                <h4>Date :  <?php echo $purchaseinfo->return_date;?></h4>
                                <h4><?php echo display('po_no') ?> : <?php echo $purchaseinfo->po_no;?></h4>
								<h4> <?php echo "Print Date" ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>
             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('ingredient_name') ?></th>
                                        <th><?php echo display('return_qty') ?>  </th>
                                        <th><?php echo display('price') ?> </th>
                                         <th><?php echo display('discount') ?></th>
                                        <th><?php echo display('total') ?></th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                    <?php 
                                    $sl=1;
                                    foreach ($iteminfo as $details) {?>
                                      
                                   
                                    <tr>
                                        <td ><?php echo $details->ingredient_name; ?></td>
                                        <td><?php echo $details->qty." ".$details->uom_short_code; ?></td>
                                        <td> <?php echo $details->product_rate;?> </td>
                                        <td><?php echo $details->discount;?> </td>
                                        <!-- Discount -->
                                        <td><?php echo ($details->qty*$details->product_rate)-$details->discount; ?>              
                                        </td>
                                        
                                    </tr>                              
                                <?php $sl++; } 
                                 ?>
                                </tbody>                               
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><center><label style="text-align:center;" for="reason" class="  col-form-label"><?php echo display('reason') ?></label></center>
                                            <?php echo $purchaseinfo->return_reason;?> <br></td><td><b><?php echo display('grand_total') ?>:</b></td>
                                        <td><?php echo $purchaseinfo->totalamount;?></td>
                                       
                                    </tr>
                                </tfoot>
                            </table>
            </div> 
             <div class="text-center" id="print" style="margin: 20px">
                <input type="button" class="btn btn-warning" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv();"/>
                
            </div>
        </div> 
        </div>
    </div>

