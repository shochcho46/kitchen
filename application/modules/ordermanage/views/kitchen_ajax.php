<style>
	.arrow-kitchen {
		color: #e64545;
		background: #ffffff;
		line-height: 30px;
		width: 30px;
		text-align: center;
		font-size: 16px;
		border-radius: 50%;
		box-shadow: 0 0 12px rgba(0,0,0,0.4);
	}
	.hidden-kitem{
		position: absolute;
		left: 0;
		top: 0;
		background: #fff;
		width: 100%;
		z-index: 2;
		transition-duration: 0.4s;
		opacity: 0;
		box-shadow: 0 0 12px rgba(0,0,0,0.24);
		max-height: 380px;
    	overflow-y: scroll;
	}
	
	.hidden-kitem.active{
		top: 100%;
		opacity: 1;
		z-index: 4;
	}
	
	.rotate {
		-moz-transition: all .3s linear;
		-webkit-transition: all .3s linear;
		transition: all .3s linear;
	}
	.rotate.left {
		-moz-transform:rotate(-180deg);
		-webkit-transform:rotate(-180deg);
		transform:rotate(-180deg);
	}
	.circle-openk{position:absolute;left: 50%;bottom: -12px;transform: translateX(-50%);z-index: 3;}
	.kitchen-tab .single_item .quantity {
    margin: 0;
    font-size:16px;
}
::-webkit-scrollbar {
  width: 5px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
::-webkit-scrollbar-thumb {
  background: #888; 
}

::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
<div class="col-md-12">
  <div class="row kitchen-tab">
    <div class="grid">
    <?php foreach($kitchenorder as $orderinfo){?>
      <div class="grid-col col-vxs-12 col-xs-6 col-md-4 col-lg-3 col-xlg-4">
        <div class="grid-item-content" style="overflow:visible;">
          <div class="food_item <?php if($orderinfo->order_status!=3){ echo "pending";}?>" style="position:relative;">
            <div class="food_item_top">
              <div class="item_inner">
                <h4 class="kf_info">Table: <?php echo $orderinfo->table_no;?></h4>
                <h4 class="kf_info"><?php echo $orderinfo->first_name.' '.$orderinfo->last_name;?></h4>
              </div>
              <div class="item_inner">
                <h4 class="kf_info">Token: <?php echo $orderinfo->tokenno;?></h4>
                <h4 class="kf_info">Order: #<?php echo $orderinfo->order_id;?></h4>
              </div>
            </div>
            <div class="circle-openk" id="circlek<?php echo $orderinfo->order_id;?>" onclick="showhide(<?php echo $orderinfo->order_id;?>)"><i class="fa fa-caret-down arrow-kitchen thisrotate<?php echo $orderinfo->order_id;?> rotate"></i></div>
            <div class="food_select hidden-kitem" id="item<?php echo $orderinfo->order_id;?>">
              
            </div>
          </div>
        </div>
      </div>
       <?php }?>
    </div>
  </div>
</div>
<script>
	 
	  /*$(".toggle_click").click(function(){
		 
		$(".hidden-kitem").toggleClass("active");
	  });*/
	  function showhide(id){
		   $('div.food_select').not("#item"+id).removeClass('active');
		   $('div i').not(".thisrotate"+id).removeClass("left");
		   $("#item"+id).toggleClass("active");
		   $('.thisrotate'+id+'.rotate').toggleClass("left");
		   $('#circlek'+id).css('z-index','9');
		   var isVisible = $( '#item'+id ).is(".active");
			if (isVisible === true ){
				var dataString = 'orderid='+id;
				$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>ordermanage/order/itemlist",
				data: dataString,
				success: function(data){
					$('#item'+id).html(data);
					
					}
				});
			}
			else{
				$('#circlek'+id).css('z-index','3');
				}
			
		}

</script>