
 <div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
 					<?= form_open('dashboard/web_setting/createseopage',array('id'=>'menuurl')) ?>
                        <div class="form-group row">
                            <label for="menuname" class="col-sm-4 col-form-label"><?php echo display('title') ?> *</label>
                            <div class="col-sm-8">
                                <input name="stitle" id="stitle" class="form-control" type="text" placeholder="<?php echo display('title') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url_link" class="col-sm-4 col-form-label"><?php echo display('seo_keyword') ?></label>
                            <div class="col-sm-8">
                                <input name="keywords" id="keywords" class="form-control" type="text" placeholder="<?php echo display('seo_keyword') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="widgettitle" class="col-sm-4 col-form-label"><?php echo display('seo_description') ?></label>
                            <div class="col-sm-8">
                            	 <textarea name="descp" id="descp" class="form-control"  placeholder="<?php echo display('seo_description') ?>"  rows="4"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group text-right" id="upbtn">
                            <button type="submit" class="btn btn-success w-md m-b-5" id="btnchnage" style="display:none;"><?php echo display('Ad') ?></button>
                        </div>
                    <?php echo form_close() ?>
                    <table class="table table-bordered table-hover" id="RoleTbl">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('title') ?></th>
                                <th><?php echo display('seo_keyword') ?></th>
                                <th><?php echo display('seo_description') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($seo_list)){ ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($seo_list as $seo) { 
							$keyword=base64_encode($seo->keywords);
							$description=base64_encode($seo->description);//urlencode($seo->description);  
							?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $seo->title; ?></td>
                                <td><?php echo $seo->keywords; ?></td>
                                <td><?php echo $seo->description; ?></td>
                                <td>
                                    <a onclick="editmenu('<?php echo $seo->title; ?>','<?php echo $keyword; ?>','<?php echo $description; ?>',<?php echo $seo->id; ?>)"  data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                	<!--<a href="<?php //echo base_url("dashboard/web_setting/deleteseo/$seo->id") ?>" onclick="return confirm('<?php //echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                                </td>
                            </tr>
					
							
							<?php  } }  ?>
                            
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>

<script>
function editmenu(title,keyword,desc,sid){
	$("#stitle").val(title);
	$("#keywords").val(atob(keyword));
	$("#descp").val(atob(desc));
	 //var desc=atob(desc);
	 //tinymce.activeEditor.setContent(desc);
	//tinymce.get('#descp').setContent(decodeURIComponent(desc));
	//tinymce.activeEditor.setContent("<p>Hello world!</p>");
	$("#btnchnage").show();
	$("#btnchnage").text("Update");
	$("#upbtn").show();
	$('#menuurl').attr('action', "<?php echo base_url()?>dashboard/web_setting/editseo/"+sid);
	$(window).scrollTop(0);
	}
</script>




 