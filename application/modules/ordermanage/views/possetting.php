
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo $title; ?></legend>
                    </fieldset>
					<div class="row bg-brown">
                             <div class="col-sm-12 kitchen-tab" id="option">
                                                <input id="chkbox-1760" type="checkbox" class="individual" name="waiter" value="waiter" <?php if($possetting->waiter==1){ echo "checked";}?>>
                                                <label for="chkbox-1760" style="display:inline-flex">
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                   Waiter
                                                </label>
                                                <input id="chkbox-1761" type="checkbox" class="individual" name="table" value="tableid" <?php if($possetting->tableid==1){ echo "checked";}?>>
                                                <label for="chkbox-1761" style="display:inline-flex">
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                   Table
                                                </label>
                                                <input id="chkbox-1762" type="checkbox" class="individual" name="cooktime" value="cooktime" <?php if($possetting->cooktime==1){ echo "checked";}?>>
                                                <label for="chkbox-1762" style="display:inline-flex">
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                   Cooking Time
                                                </label>
                            </div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
<script>

$('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
               var menuid=$(this).val();
			   var ischeck=1;
			   var dataString = 'menuid='+menuid+'&status=1';
            }
            else if($(this).is(":not(:checked)")){
                var menuid=$(this).val();
				var ischeck=0;
				var dataString = 'menuid='+menuid+'&status=0';
            }
                $.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ordermanage/order/settingenable",
				data: dataString,
				success: function(data){
					if(ischeck==1){
						swal("Enable", "Enable This Option to show on Pos Invoice", "success");
						}
						else{
						swal("Disable", "Make This Field Is Optional On Pos Page.", "warning");
						}
				    }
			    });
        });

</script>