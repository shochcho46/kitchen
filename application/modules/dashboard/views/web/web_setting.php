<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
            		
                <?php //print_r($websetting);				
				echo form_open_multipart('dashboard/web_setting/common_create','class="form-inner"') ?>
                    <?php echo form_hidden('id',$websetting->id) ?>
                    <!--<div class="form-group row">
                        <label for="address" class="col-xs-3 col-form-label"><?php //echo display('address') ?></label>
                        <div class="col-xs-9">
                            <input name="address" type="text" class="form-control" id="address" placeholder="<?php //echo display('address') ?>"  value="<?php //echo $websetting->address ?>">
                        </div>
                    </div>-->

                    <div class="form-group row">
                        <label for="email" class="col-xs-3 col-form-label"><?php echo display('email')?></label>
                        <div class="col-xs-9">
                            <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo display('email')?>"  value="<?php echo $websetting->email ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-xs-3 col-form-label"><?php echo display('phone') ?></label>
                        <div class="col-xs-9">
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="<?php echo display('phone') ?>"  value="<?php echo $websetting->phone ?>" >
                        </div>
                    </div>

                    <!-- if setting logo is already uploaded -->
                    <?php if(!empty($websetting->logo)) {  ?>
                    <div class="form-group row">
                        <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                        <div class="col-xs-9">
                            <img src="<?php echo base_url($websetting->logo) ?>" alt="Picture" class="img-thumbnail" />
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-group row">
                        <label for="logo" class="col-xs-3 col-form-label"><?php echo display('logo') ?></label>
                        <div class="col-xs-9">
                            <input type="file" name="logo" id="logo">
                            <input type="hidden" name="old_logo" value="<?php echo $websetting->logo ?>">
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label for="power_text" class="col-xs-3 col-form-label"><?php echo display('powered_by') ?></label>
                        <div class="col-xs-9">
                            <textarea name="power_text" class="form-control"  placeholder="Powered By Text" maxlength="140" rows="7"><?php echo $websetting->powerbytxt ?></textarea>
                        </div>
                    </div> 
                    
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>