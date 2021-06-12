<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">


                <?php echo form_open_multipart("itemmanage/item_food/create") ?>
                    
                    <?php echo form_hidden('id',$this->session->userdata('id'));?>
                     <?php echo form_hidden('ProductsID', (!empty($productinfo->ProductsID)?$productinfo->ProductsID:null)) ?>
                     <input name="bigimage" type="hidden" value="<?php echo (!empty($productinfo->bigthumb)?$productinfo->bigthumb:null) ?>" />
                     <input name="mediumimage" type="hidden" value="<?php echo (!empty($productinfo->medium_thumb)?$productinfo->medium_thumb:null) ?>" />
                     <input name="smallimage" type="hidden" value="<?php echo (!empty($productinfo->small_thumb)?$productinfo->small_thumb:null) ?>" />
                     <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="category" class="col-sm-4 col-form-label">Category</label>
                        <div class="col-sm-8">
                        <select name="CategoryID" class="form-control" required="">
                            <option value="" selected="selected">Category Name</option> 
                            <?php foreach($categories as $caregory){?>
                            <option value="<?php echo $caregory->CategoryID;?>" class='bolden' <?php if($productinfo->CategoryID==$caregory->CategoryID){echo "selected";}?>><strong><?php echo $caregory->Name;?></strong></option>
                            	<?php if(!empty($caregory->sub)){
								foreach($caregory->sub as $subcat){?>
                                <option value="<?php echo $subcat->CategoryID;?>" <?php if($productinfo->CategoryID==$subcat->CategoryID){echo "selected";}?>>&nbsp;&nbsp;&nbsp;&mdash;<?php echo $subcat->Name;?></option>
                            <?php } } } ?>
                        </select>
                         <?php //echo form_dropdown('CategoryID',$categories,(!empty($productinfo->CategoryID)?$productinfo->CategoryID:null),'class="form-control" required') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-4 col-form-label"><?php echo display('select_kitchen') ?></label>
                        <div class="col-sm-8">
                        <select name="kitchen" class="form-control" required="">
                            <option value="" selected="selected"><?php echo display('kitchen_name') ?></option> 
                            <?php foreach($allkitchen as $kitchen){?>
                            <option value="<?php echo $kitchen->kitchenid;?>" class='bolden' <?php if($productinfo->kitchenid==$kitchen->kitchenid){echo "selected";}?>><strong><?php echo $kitchen->kitchen_name;?></strong></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foodname" class="col-sm-4 col-form-label">Food Name *</label>
                        <div class="col-sm-8">
                            <input name="foodname" class="form-control" type="text" placeholder="Food Name" id="foodname"  value="<?php echo (!empty($productinfo->ProductName)?$productinfo->ProductName:null) ?>">
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="component" class="col-sm-4 col-form-label">Component </label>
                        <div class="col-sm-8">
                            <input name="component" class="form-control" data-role="tagsinput" type="text" placeholder="Add Component" id="category_subtitle"  value="<?php echo (!empty($productinfo->component)?$productinfo->component:null) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemnotes" class="col-sm-4 col-form-label">Notes </label>
                        <div class="col-sm-8">
                            <input name="itemnotes" class="form-control" type="text" placeholder="Add notes" id="itemnotes"  value="<?php echo (!empty($productinfo->itemnotes)?$productinfo->itemnotes:null) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemnotes" class="col-sm-4 col-form-label">Description </label>
                        <div class="col-sm-8">
                            <input name="descrip" class="form-control" type="text" placeholder="Add Description" id="descrip"  value="<?php echo (!empty($productinfo->descrip)?$productinfo->descrip:null) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-4 col-form-label">Image </label>
                        <div class="col-sm-8">
                        <input type="file" accept="image/*" name="picture" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a> 
                                <small id="fileHelp" class="text-muted"><img src="<?php echo base_url(!empty($productinfo->ProductImage)?$productinfo->ProductImage:'assets/img/icons/default.jpg'); ?>" id="output" style="height: 150px;width: 200px" class="img-thumbnail"/>
</small><input name="big" type="hidden" value="" id="bigurl" />
<input type="hidden" name="old_image" value="<?php echo (!empty($productinfo->ProductImage)?$productinfo->ProductImage:null) ?>">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="vat" class="col-sm-5 col-form-label">Vat <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Vat Are always Caltulate percent like: 5 means 5%;"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                        <div class="col-sm-7">
                            <input name="vat" class="form-control" type="text" placeholder="0%" id="vat"  value="<?php echo (!empty($productinfo->productvat)?$productinfo->productvat:'') ?>">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-5 col-form-label">Is offer ? <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="If use Food Special Offer then check it and fill necessary field"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                        <div class="col-sm-2">
                                    <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="isoffer" value="1" <?php if(!empty($productinfo))if($productinfo->offerIsavailable==1){echo "checked";}?> id="isoffer">
                                        <label for="isoffer"></label>
                                    </div>
                        </div>
                        <label for="special" class="col-sm-3 col-form-label">Is Special ?</label>
                        <div class="col-sm-2">
                                    <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="special" value="1" <?php if(!empty($productinfo))if($productinfo->special==1){echo "checked";}?> id="special">
                                        <label for="special"></label>
                                    </div>
                        </div>
                    </div>
                    <div id="offeractive" class="<?php if(!empty($productinfo)){if($productinfo->offerIsavailable==1){echo "";} else{ echo "showhide";}}else{echo "showhide";}?>">
                    <div class="form-group row">
                        <label for="offerate" class="col-sm-5 col-form-label">Offer Rate <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Offer Rate Must be a number. It a Percentange Like: if 5% then put 5"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                        <div class="col-sm-7">
                            <input name="offerate" class="form-control" type="text"  placeholder="0" id="offerate"  value="<?php echo (!empty($productinfo->OffersRate)?$productinfo->OffersRate:'') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="offerstartdate" class="col-sm-5 col-form-label">Offer Start Date </label>
                        <div class="col-sm-7">
                            <input name="offerstartdate" class="form-control datepicker" type="text"  placeholder="Offer Date" id="offerstartdate"  value="<?php echo (!empty($productinfo->offerstartdate)?$productinfo->offerstartdate:null) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="offerendate" class="col-sm-5 col-form-label">Offer End Date </label>
                        <div class="col-sm-7">
                            <input name="offerendate" class="form-control datepicker" type="text"  placeholder="Offer Date" id="offerendate"  value="<?php echo (!empty($productinfo->offerendate)?$productinfo->offerendate:null) ?>">
                        </div>
                    </div>
                    
                    </div>
                    <div class="form-group row">
                        <label for="vat" class="col-sm-5 col-form-label"><?php echo display('cookedtime');?></label>
                        <div class="col-sm-7">
                            <input name="cookedtime" type="text" class="form-control timepicker3" id="cookedtime" placeholder="00:00" autocomplete="off" value="<?php echo (!empty($productinfo->cookedtime)?$productinfo->cookedtime:null) ?>" />
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-5 col-form-label">Status</label>
                        <div class="col-sm-7">
                            <select name="status"  class="form-control">
                                <option value=""  selected="selected">Select Option</option>
                                <option value="1" <?php  if(!empty($productinfo)){if($productinfo->ProductsIsActive==1){echo "Selected";}} else{echo "Selected";} ?>>Active</option>
                                <option value="0" <?php if($productinfo->ProductsIsActive==0){echo "Selected";} ?>>Inactive</option>
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
	$("#bigurl").val(output.src);
  };
</script>