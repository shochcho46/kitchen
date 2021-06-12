<script src="<?php echo base_url() ?>assets/chart/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/chart/exporting.js"></script>
<script src="<?php echo base_url() ?>assets/chart/export-data.js"></script>

<div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo "test";?></h4>
                        </div>
                    </div>
                    <div class="row">
                     <!--<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; width:100%;"></div>-->
                     </div>
                </div>
               <?php 
			  $str="1,4,5,6,7";
			  $all=explode(',',$str);
			  $i=0;
			 $test2='';
			  foreach($all as $single){
				  $i++;
				  $SQLoffer1="SELECT * FROM visit_comp_product_gap Where product_id=$single Group By comp_product_name";
				  $SQLoffer=$this->db->query($SQLoffer1);
				  $gotoffer = $SQLoffer->num_rows();	
				  $gettext=$SQLoffer->result();
				  $test='';
				  $k=0;
					foreach($gettext as $txt){
						$k++;
								 $test.= $txt->comp_product_name.",";
							  }
					$test2.=trim($test,',')."|";
			}
				
			 $dd= trim($test2,'|');
			$ss=explode('|',$dd);
			$lengthofarray=count($ss)-1;
			
			foreach($ss as $n){
				echo $n;
				$cc=explode(',',$n);
				$tt=substr_count($n, ",");
				$wa=$lengthofarray-$tt;
				if($lengthofarray>$tt){
					echo $tt+$wa;
					}
				/*$mystring
				if($ss)*/
				}
			
			   ?>
               
            </div>
        </div>


<script type="text/javascript">


Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Stacked column chart'
    },
    xAxis: {
        categories: [<?php echo $category;?>]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total fruit consumption'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'percent'
        }
    },
    series: [<?php echo $quantity;?>]
});

</script>

