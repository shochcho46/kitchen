
 <div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
            <div id="updatecontent">
 					<?= form_open('dashboard/web_setting/createwidget',array('id'=>'widgeturl')) ?>
                        <div class="form-group row">
                            <label for="widgetname" class="col-sm-4 col-form-label"><?php echo display('widget_name') ?> *</label>
                            <div class="col-sm-8">
                                <input name="widgetname" id="widgetname" class="form-control" type="text" placeholder="<?php echo display('widget_name') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="widgettitle" class="col-sm-4 col-form-label"><?php echo display('widget_title') ?></label>
                            <div class="col-sm-8">
                                <input name="widgettitle" id="widgettitle" class="form-control" type="text" placeholder="<?php echo display('widget_title') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="widgettitle" class="col-sm-4 col-form-label"><?php echo display('widget_desc') ?></label>
                            <div class="col-sm-8">
                            	 <textarea name="widgetdesc" id="widgetdesc" class="form-control tinymce"  placeholder="<?php echo display('widget_desc') ?>"  rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="widgettitle" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                            <div class="col-sm-8 customesl">
                            <select name="status"  class="form-control">
                                <option value=""><?php echo display('select_option') ?></option>
                                <option value="1" selected="selected"><?php echo display('active') ?></option>
                                <option value="0"><?php echo display('inactive') ?></option>
                              </select>
                        	</div>
                        </div>
                        <div class="form-group text-right" id="upbtn">
                            <button type="submit" class="btn btn-success w-md m-b-5" id="btnchnage"><?php echo display('Ad') ?></button>
                        </div>
                    <?php echo form_close() ?>
                    </div>
                    <table class="table table-bordered table-hover table-responsive" id="RoleTbl">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('widget_name') ?></th>
                                <th><?php echo display('widget_title') ?></th>
                                <th><?php echo display('widget_desc') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($widget_list)){ ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($widget_list as $value) { 
							
							?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $value->widget_name; ?></td>
                                <td><?php echo $value->widget_title; ?></td>
                                <td class="breakword"><?php echo $value->widget_desc; ?></td>
                                <td>
                                    <a onclick='editwidget(<?php echo $value->widgetid; ?>)'  data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                	<!--<a href="<?php echo base_url("dashboard/web_setting/deletewidget/$value->widgetid") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                                </td>
                            </tr>
                            <?php } } ?>
							
					
                            
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>

<script>
function editwidget(id){
	 var myurl ='<?php echo base_url()?>dashboard/web_setting/updatewidget/'+id;
	  var dataString = "id="+id;
	  $(window).scrollTop(0);
	  $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 tinymce.remove();
			$('#updatecontent').html(data);
			tinymce.init();
		 } 
		});
	  
	//$("#widgetdesc").val(desc)
	/*tinyMCE.activeEditor.setContent(desc);
	$("#btnchnage").text("Update");
	$('#widgeturl').attr('action', "<?php //echo base_url()?>dashboard/web_setting/editwidget/"+id);*/
	}
</script>




 