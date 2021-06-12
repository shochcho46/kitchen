<canvas id="lineChart2" height="140"></canvas>
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>
 

<script type="text/javascript">
$(document).ready(function(){
    //line chart
    var ctx = document.getElementById("lineChart2");
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

</script>