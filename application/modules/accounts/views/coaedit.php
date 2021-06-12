<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <?php  echo form_open_multipart("accounts/accounts/updatecoahead");?>
                    <?php echo form_hidden('HeadCode', (!empty($intinfo->HeadCode)?$intinfo->HeadCode:null)) ?>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-4 col-form-label"><?php echo "Head Name"; ?> *</label>
                            <div class="col-sm-8">
                                <input name="headname" class="form-control" type="text" placeholder="Add Head Name" id="headname" value="<?php echo (!empty($intinfo->HeadName)?$intinfo->HeadName:null) ?>" required>
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