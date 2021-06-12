<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="panel panel-bd" style="height:100px">
                    <div class="panel-body">
                        <div class="statistic-box text-center">
                            <h2><span class="count-number"><?php echo $totalorder; ?></span> <span class="slight"> </span></h2>
                            <div style="font-size:15px"><?php echo display('lifeord')?></div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="panel panel-bd" style="height:100px">
                    <div class="panel-body">
                        <div class="statistic-box text-center">
                            <h2><span class="count-number"><?php echo $todayorder; ?></span> <span class="slight"> </span></h2>
                            <div style="font-size:15px"><?php echo display('tdayorder')?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="panel panel-bd" style="height:100px">
                    <div class="panel-body">
                        <div class="statistic-box text-center">
                            <h2><span class="count-number"><?php echo $todayamount; ?></span></h2>
                            <div style="font-size:15px"><?php echo display('tdaysell')?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="panel panel-bd" style="height:100px">
                    <div class="panel-body">
                        <div class="statistic-box text-center">
                            <h2><span class="count-number"><?php echo $totalcustomer; ?></span> <span class="slight"> </span></h2>
                            <div style="font-size:15px"><?php echo display('tcustomer')?></div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="panel panel-bd" style="height:100px">
                    <div class="panel-body">
                        <div class="statistic-box text-center">
                            <h2><span class="count-number"><?php echo $completeord; ?></span></h2>
                            <div style="font-size:15px"><?php echo display('tdeliv')?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="panel panel-bd" style="height:100px">
                    <div class="panel-body">
                        <div class="statistic-box text-center">
                            <h2><span class="count-number"><?php echo $totalreservation;?></span> <span class="slight"> </span></h2>
                            <div style="font-size:15px"><?php echo display('treserv')?></div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
<div class="row">
    <!-- Latest Order -->
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('latestord')?></h4>
                </div>
            </div>
            <div class="panel-body">
            	<div class="message_inner1">
                  <div class="message_widgets">
                            <?php if(!empty($latestoreder)){
							 foreach($latestoreder as $order){ ?>
                                       <div class="inbox-item">
                                        <p style="margin:0;padding:0;"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong></p>
                                        <!--<span class="inbox-item-date">-2018-12-24</span>-->
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('ord_number')?>: <a href="<?php echo base_url() ?>ordermanage/order/updateorder/<?php echo $order->order_id;?>">(<?php echo $order->saleinvoice;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->order_time;?></p>
                                        
                                    </div>
                                     <?php } } ?>   
                                     </div>
                                 </div>                          
            </div>
        </div>
    </div>
    <!-- Latest Reservation -->
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('latest_reser')?></h4>
                </div>
            </div>
            <div class="panel-body">
            <div class="message_inner1">
                 <div class="message_widgets">
                 <?php if(!empty($latestreservation)){
							 foreach($latestreservation as $order){ ?>
                                       <div class="inbox-item">
                                        <p style="margin:0;padding:0;"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong></p>
                                        <!--<span class="inbox-item-date">-2018-12-24</span>-->
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('date')?>: <a href="<?php echo base_url() ?>reservation/reservation/index">(<?php echo $order->reserveday;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->formtime;?></p>
                                        
                                    </div>
                                     <?php } } ?>
                   			</div>
                         </div>    
            </div>
        </div>
    </div>
    <!-- Online Order -->
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('latestolorder')?></h4>
                </div>
            </div>
            <div class="panel-body">
            	<div class="message_inner1">
                   <div class="message_widgets">
                 <?php if(!empty($onlineorder)){
							 foreach($onlineorder as $order){ ?>
                                       <div class="inbox-item">
                                        <p style="margin:0;padding:0;"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong></p>
                                        <!--<span class="inbox-item-date">-2018-12-24</span>-->
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('ord_number')?>: <a href="<?php echo base_url() ?>ordermanage/order/updateorder/<?php echo $order->order_id;?>">(<?php echo $order->saleinvoice;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->order_time;?></p>
                                        
                                    </div>
                                     <?php } } ?>  
                     </div>
                 </div>                           
            </div>
        </div>
    </div>
</div>
<div class="row">
 <!-- Monthly Sales Amount and Order -->
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('monsalamntorder')?></h4>
                    <ul class="nav nav-tabs pull-right order_status" style="margin-top: -30px">
                                <li><input name="yearmonth" id="datepicker3" class="form-control datepicker3" type="text" placeholder="<?php echo "Month"; ?>" value="" readonly="readonly"></li>
                                <li><input type="button"  class="btn btn-success" name="search" value="Search" onclick="searchmonth()"></li>
                            </ul>
                </div>
            </div>
            <div class="panel-body" id="salechart">
                <canvas id="lineChart" height="140"></canvas>
            </div>
        </div>
    </div>
    <!-- Online Vs Offline Order and sales -->
    <div class="col-sm-12 col-md-8">
        <div class="panel panel-bd">

            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('onlineofline')?></h4>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="barChart" height="200"></canvas>
            </div>
        </div>
    </div>
       
    <!-- Pie Chart -->
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('pending_ord')?></h4>
                </div>
            </div>
            <div class="panel-body">
            <div class="message_inner">
                            <div class="message_widgets">
                <?php 
				if(!empty($latestpending)){
							 foreach($latestpending as $order){ ?>
                                       <div class="inbox-item">
                                        <p style="margin:0;padding:0;"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong><span class="profile-status away pull-right"></span></p>
                                        <!--<span class="inbox-item-date">-2018-12-24</span>-->
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('ord_number')?>.: <a href="<?php echo base_url() ?>ordermanage/order/updateorder/<?php echo $order->order_id;?>">(<?php echo $order->saleinvoice;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->order_time;?></p>
                                        
                                    </div>
                                     <?php } } 
									 ?>  
                              </div>
                        </div>    
            </div>
        </div>
    </div>  
</div>
<!-- Chart js -->
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>
 

<script type="text/javascript">
$(document).ready(function(){
    //bar chart
    var ctx = document.getElementById("barChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $monthname;?>],
            datasets: [
                {
                    label: "<?php echo display('onlinesamnt')?>",
                    data: [<?php echo $onlinesaleamount;?>],
                    borderColor: "rgba(55, 160, 0, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(55, 160, 0, 0.5)"
                },
                {
                    label: "<?php echo display('onlineordnum')?>",
                    data: [<?php echo $onlinesaleorder;?>],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0,0,0,0.07)"
                },
                {
                    label: "<?php echo display('offsalamnt')?>",
                    data: [<?php echo $offlinesaleamount;?>],
                    borderColor: "rgba(55,160,0,0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(55,160,0,0.9)"
                },
                {
                    label: "<?php echo display('offlordnum')?>",
                    data: [<?php echo $offlinesaleorder;?>],
                    borderColor: "rgba(125,134,255,0.09)",
                    borderWidth: "0",
                    backgroundColor: "rgba(125,134,255,0.4)"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });

    //line chart
    var ctx = document.getElementById("lineChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $monthname;?>],
            datasets: [
                {
                    label: "<?php echo display('saleamnt')?>",
                    borderColor: "rgba(0,0,0,.09)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0,0,0,.07)",
                    data: [<?php echo $monthlysaleamount;?>]
                },
                {
                    label: "<?php echo display('ordnumb')?>",
                    borderColor: "rgba(55, 160, 0, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(55, 160, 0, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [<?php echo $monthlysaleorder;?>]
                }
            ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }
        }
    });
});
function searchmonth(){
	monthyear=$("#datepicker3").val();
	 var myurl ='<?php echo base_url() ?>dashboard/home/checkmonth';
	    var dataString = "monthyear="+monthyear;
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('#salechart').html(data);
		 } 
	});
	
	
	}
</script>