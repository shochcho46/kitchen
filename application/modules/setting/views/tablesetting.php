<style type="text/css">
	.placeHolder div { background-color:white!important; border:dashed 1px gray !important; }
	.boxpad{padding:20px;float:left;}
	</style>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 

            <div class="panel-body">
               <div class="row" id="gallery" style="min-height:400px;">
                <?php if (!empty($tablelist)) { ?>
                            <?php $sl = 0; ?>
                            <?php foreach ($tablelist as $table) {
								$sl++; 
								$style='style="'.$table->iconpos.'"';
								?>
                              <!--  <input name="sirial[]" type="hidden" value="<?php //echo $sl;?>" />-->
                	<div class="text-center boxpad draggable" id="<?php echo $table->tableid;?>" <?php echo $style;?> data-itemid='<?php echo $table->tableid;?>'>
                    <input name="sortid[]" type="hidden" value="<?php echo $table->tableid;?>" />
                    <div>
                    <img src="<?php echo base_url(!empty($table->table_icon)?$table->table_icon:'assets/img/icons/table/default.jpg'); ?>" style="height: 60px;width: 60px" class="img-thumbnail"/></div>
                    </div>
                    <?php } }?>
                    
               </div>
               
            </div>
        </div>
    </div>
</div>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dragsort.js"></script>-->
<script>
/*function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    alert(ev.target.innerHTML);
    console.log(ev);
}*/

 $( function() {
	$( ".draggable" ).draggable({
		cursor: "move",
  stop: function( event, ui ) {
	   var id=event.target.id;
	   var style=$("#"+id).attr('style');
	   var dataString="ids="+id+"&style="+style;
	    $.ajax({
		 type: "POST",
		 url: '<?php echo base_url("setting/restauranttable/updatesetting") ?>',
		 data: dataString,
		 success: function(data) {
			
		 } 
	});
	   
	  }});
  });
</script>
 
		<script type="text/javascript">
		   /* $("#gallery").dragsort({ dragSelector: "div", dragEnd: saveOrder, placeHolderTemplate: "<div class='placeHolder'><div></div></div>" });

		    function saveOrder() {
				var data = $("#gallery div").map(function() { 
				return $(this).data("itemid"); }).get();
		        $.post("<?php //echo base_url("setting/restauranttable/updatesetting") ?>", { "ids[]": data,"total":"<?php //echo $sl+1;?>" });
		    };*/
	    </script>    
