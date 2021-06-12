<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <?= form_open('setting/customerlist/customerupdate') ?>
                    <?php echo form_hidden('custid', (!empty($intinfo->customer_id)?$intinfo->customer_id:null)) ?>
                    <input name="oldname" type="hidden" value="<?php echo $intinfo->cuntomer_no.'-'.$intinfo->customer_name;?>" />
                    <input name="memcode" type="hidden" value="<?php echo $intinfo->cuntomer_no;?>" />
                       <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><?php echo display('customer_name');?> <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input class="form-control simple-control"  type="text" placeholder="<?php echo display('customer_name');?>" <?php if($intinfo->customer_id==1){ echo "readonly";}?> value="<?php echo (!empty($intinfo->customer_name)?$intinfo->customer_name:null) ?>">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label"><?php echo display('email');?> *</label>
                            <div class="col-sm-8">
                                <input name="customer_name" class="form-control" type="text"  placeholder="<?php echo display('email');?>" id="name" value="<?php echo (!empty($intinfo->customer_email)?$intinfo->customer_email:null) ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('mobile') ?> *</label>
                            <div class="col-sm-8">
                                <input name="mobile" class="form-control" type="text" placeholder="Add <?php echo display('mobile') ?>" id="mobile" value="<?php echo (!empty($intinfo->customer_phone)?$intinfo->customer_phone:null) ?>">
                            </div>
                        </div>
                        
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>