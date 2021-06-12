<style>
@media(max-width:400px){
.col-xlg-2{
	width:100%;
	}
}
@media(min-width:1200px){
.col-xlg-2{
	width:20%;
	}
}
@media(min-width:1500px){
.col-xlg-2{
	width:16.6666666666666%;
	}
}
</style>
<div class="col-md-12">
  <div class="row mb-2">
    <div class="col-sm-6">
      <select id="ongoingtable_name" class="form-control dont-select-me  search-table-field" dir="ltr" name="s">
      </select>
    </div>
    <div class="col-sm-6">
      <button class="btn btn-success pull-right" onclick="mergeorderlist()">Merge Order</button>
    </div>
  </div>
  <div class="row">
    <?php 
									 if(!empty($ongoingorder)){
									 foreach($ongoingorder as $onprocess){
										 $billtotal=round($onprocess->totalamount-$onprocess->customerpaid);
										 ?>
    <div class="col-sm-4 col-md-3 col-xs-6 col-xlg-2">
      <div class="hero-widget well well-sm" style="height:auto !important">
        <div style="margin:0; display:flex; align-items:center; justify-content:space-between;">
          <label class="text-muted"><strong><?php echo display('table');?>:<?php echo $onprocess->tablename;?></strong></label>
          <?php if($this->permission->method('ordermanage','update')->access()):?>
          <div style="display:flex; align-items:center;">
          <div class=""><a href="javascript:;" onclick="editposorder(<?php echo $onprocess->order_id;?>,1)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update Order" id="table-<?php echo $onprocess->order_id;?>" style="padding: 0px 5px;margin-right: 3px;"><i class="fa fa-pencil"></i></a></div>
        <div class="kitchen-tab" style="background:none; padding:0; overflow:hidden;">
          <input id='chkbox-<?php echo $onprocess->order_id;?>' type='checkbox' class="individual" name="margeorder" value="<?php echo $onprocess->order_id;?>"/>
          <label for='chkbox-<?php echo $onprocess->order_id;?>' class="mb-0"> 
            <span class="radio-shape" style="margin-right:0"> <i class="fa fa-check"></i> </span> </label>
        </div>
        </div>
        <?php endif;?>
        </div>
        <p style="margin:0;">
          <label class="text-muted"><?php echo display('ord_num');?>:<?php echo $onprocess->saleinvoice;?></label>
        </p>
        <p style="margin:0;">
          <label class="text-muted"><?php echo display('waiter');?>:<?php echo $onprocess->first_name.' '.$onprocess->last_name;?></label>
        </p>
        
          <div>
          <a href="javascript:;" onclick="createMargeorder(<?php echo $onprocess->order_id;?>,1)" class="btn btn-xs btn-success btn-sm mr-1"><?php echo display('cmplt');?></a>
            <?php if($this->permission->method('ordermanage','delete')->access()){?>
            <a href="javascript:;" data-id="<?php echo $onprocess->order_id;?>" class="btn btn-xs btn-danger btn-sm mr-1 cancelorder" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cancel Order"><i class="fa fa-trash-o"></i></a>&nbsp;
            <?php }?>
            <a href="javascript:;" onclick="createMargeorder(<?php echo $onprocess->order_id;?>,1)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Pos Invoice"><i class="fa fa-window-maximize"></i></a>&nbsp;<a href="javascript:;" class="btn btn-xs btn-success btn-sm mr-1 due_print" data-toggle="tooltip" data-placement="left" title="" data-url="<?php echo base_url("ordermanage/order/dueinvoice/".$onprocess->order_id) ?>" data-original-title="Due Invoice"><i class="fa fa-window-restore"></i></a></div>
          
      </div>
    </div>
    <?php } }
									  else{ 
									   $odmsg=display('no_order_run');
									  echo "<p style='padding-left:12px;'>".$odmsg."</p>";
									  }
									 ?>
  </div>
</div>
<script>
              $(document).ready(function(){
                $('.search-table-field').select2({
                    placeholder: 'Type and Select Order',
                     minimumInputLength: 1,
                  ajax: {
                    url: 'ongoingtable_name',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                      return {
                        results:  $.map(data, function (item) {
                              return {
                                  text: item.text,
                                  id: item.id
                              }
                          })
                      };
                    },
                    cache: true
                  }
                });
              });


            </script> 
