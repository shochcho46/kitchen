<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
               <?php  echo form_open_multipart("itemmanage/item_category/create");?>
			 
                    
                   <?php  echo form_hidden('id',$this->session->userdata('id')); ?>
                     <?php echo form_hidden('CategoryID', (!empty($categoryinfo->CategoryID)?$categoryinfo->CategoryID:null)) ?>
                     <div class="col-lg-7">
                      <div class="form-group row">
                        <label for="firstname" class="col-sm-4 col-form-label">Category Name *</label>
                        <div class="col-sm-8">
                            <input name="categoryname" class="form-control" type="text" placeholder="Category Name" id="categoryname"  value="<?php echo (!empty($categoryinfo->Name)?$categoryinfo->Name:null) ?>" required="">
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="lastname" class="col-sm-4 col-form-label">Parent Category</label>
                        <div class="col-sm-8">
                       <select name="Parentcategory" class="form-control">
                            <option value="" selected="selected">Category Name</option> 
                            <?php foreach($categories as $caregory){
								?>
                            <option value="<?php echo $caregory->CategoryID;?>" class='bolden' <?php if(!empty($categoryinfo)){if($categoryinfo->parentid==$caregory->CategoryID){echo "selected";}}?>><strong><?php echo $caregory->Name;?></strong></option>
                            	<?php if(!empty($caregory->sub)){
								foreach($caregory->sub as $subcat){?>
                                <option value="<?php echo $subcat->CategoryID;?>" <?php if(!empty($categoryinfo)){if($categoryinfo->parentid==$subcat->CategoryID){echo "selected";}}?>>&nbsp;&nbsp;&nbsp;&mdash;<?php echo $subcat->Name;?></option>
                            <?php } } } ?>
                        </select>
                        <?php 
						
						if(empty($categories)){$categories = array('' => '--Select--');}
						//echo form_dropdown('Parentcategory',$categories,(!empty($categoryinfo->CategoryID)?$categoryinfo->CategoryID:null),'class="form-control"') ?>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="firstname" class="col-sm-4 col-form-label">Image</label>
                        <div class="col-sm-8">
                        <input type="file" accept="image/*" name="picture" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a> 
                                <small id="fileHelp" class="text-muted"><img src="<?php echo base_url(!empty($categoryinfo->CategoryImage)?$categoryinfo->CategoryImage:'assets/img/icons/default.jpg'); ?>" id="output" style="height: 150px;width: 200px" class="img-thumbnail"/>
</small>
<input type="hidden" name="old_image" value="<?php echo (!empty($categoryinfo->CategoryImage)?$categoryinfo->CategoryImage:null) ?>">
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-lg-5">
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-5 col-form-label">Is offer ? </label>
                        <div class="col-sm-7">
                                    <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="isoffer" value="1" <?php if(!empty($categoryinfo))if($categoryinfo->isoffer==1){echo "checked";}?> id="isoffer">
                                        <label for="isoffer"></label>
                                    </div>
                        </div>
                    </div>
                    <div id="offeractive" class="<?php if(!empty($categoryinfo)){if($categoryinfo->isoffer==1){echo "";} else{ echo "showhide";}}else{echo "showhide";}?>">
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-5 col-form-label">Offer Start Date </label>
                        <div class="col-sm-7">
                            <input name="offerstartdate" class="form-control datepicker" type="text"  placeholder="Offer Date" id="offerstartdate"  value="<?php echo (!empty($categoryinfo->offerstartdate)?$categoryinfo->offerstartdate:null) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-5 col-form-label">Offer End Date </label>
                        <div class="col-sm-7">
                            <input name="offerendate" class="form-control datepicker" type="text"  placeholder="Offer Date" id="offerendate"  value="<?php echo (!empty($categoryinfo->offerendate)?$categoryinfo->offerendate:null) ?>">
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-5 col-form-label">Status</label>
                        <div class="col-sm-7">
                            <select name="status"  class="form-control">
                                <option value=""  selected="selected">Select Option</option>
                                <option value="1" <?php if(!empty($categoryinfo)){if($categoryinfo->CategoryIsActive==1){echo "Selected";}} else{echo "Selected";} ?>>Active</option>
                                <option value="0" <?php if(!empty($categoryinfo)){if($categoryinfo->CategoryIsActive==0){echo "Selected";}} ?>>Inactive</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5">Reset</button>
                        <button type="submit" class="btn btn-success w-md m-b-5">Save</button>
                    </div>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>