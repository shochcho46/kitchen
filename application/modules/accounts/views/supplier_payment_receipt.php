<!--its for pos style css start--> 
<style type="text/css">
    BODY, TD
    {
        background-color: #ffffff;
        color: #000000;
        font-family: "Times New Roman", Times, serif;
        font-size: 10pt;
    }

</style>
<!--its for pos style css close--> 
<!-- Printable area start -->
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        // document.body.style.marginTop="-45px";
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-bd">
                    <div id="printableArea">
                        <div class="panel-body">
                            <div bgcolor='#e4e4e4' text='#ff6633' link='#666666' vlink='#666666' alink='#ff6633' style='margin:0;font-family:Arial,Helvetica,sans-serif;border-bottom:1' >
                                <table border="0" width="100%">
                                    <tr>
                                        <td>

                                            <table border="0" width="100%">
                                                
                                                <tr>
                                                    <td align="center" style="border-bottom:2px #333 solid;">
                                                      
                                                        <span style="font-size: 17pt;">
                                                            <?php echo $company_info->storename;?>
                                                        </span><br>
                                                        <?php echo $company_info->address;?><br>
                                                        <?php echo $company_info->phone;?><br>
                                                       
                                                        
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center"><?php echo $supplier_info->supName;?><br>
                                                        <?php if ($supplier_info->supAddress) { ?>
                                                            <?php echo $supplier_info->supAddress;?><br>
                                                        <?php } ?>
                                                        <?php if ($supplier_info->supMobile) { ?>
                                                           <?php echo $supplier_info->supMobile;?>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><nobr>
                                                    <date>
                                                        <?php echo display('date')?>: <?php echo $payment_info->VDate;?> 
                                                    </date>
                                                </nobr></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><?php echo display('voucher_no'); ?> : <?php echo $payment_info->VNo?></td>
                                    </tr>
                                    <tr>
                                    <td class="text-left"><?php echo display('payment_type'); ?> : <?= 'Payment';?></td>
                                    </tr>
                                    <tr>
                                    <td class="text-left"><?php echo display('amount'); ?> : <?php echo $payment_info->Debit;?></td>
                                    </tr>
                                     <tr>
                                    <td class="text-left"><?php echo display('remark'); ?> : <?php echo $payment_info->Narration;?></td>
                                    </tr>
                                </table>

                               
                               
                                </td>
                                 <tr>
                                    
                                    <td> <?php echo display('paid_by')?>: <?php echo $this->session->userdata('user_name');?>

                                        <div  style="margin-top:10px;float:right;width:30%;text-align:center;border-top:1px solid #e4e5e7;">
                                        <?php echo display('signature') ?>
                                          
                                    </div></td>
                                   
                                </tr>
                                </tr>
                                <tr>
                                    <td>Powered  By: <a href="#"><?php echo $company_info->storename;?></a></td>
                                     
                                </tr>
                                </table>


                            </div>


                        </div>
                    </div>

                    <div class="panel-footer text-left">
                        <a  class="btn btn-danger" href="<?php echo base_url('accounts/accounts/supplier_payments'); ?>"><?php echo display('cancel') ?></a>
                        <a  class="btn btn-info" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></a>

                    </div>
                </div>
            </div>
        </div>
