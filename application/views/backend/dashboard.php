<div class="row">
     <div class="col l3 m6 s12">
            <div class="card blue darken-4">
                <div class="card-content white-text text-center">
                    <i class="large material-icons block" style="font-size: 4rem;">business</i>
                    <span class="card-title"> Total Companies <br><span style="font-size: -webkit-xxx-large;"><b><?php echo $company;?></b></span></span>
                </div>
            </div>
        </div>

      <div class="col l3 m6 s12">
            <div class="card blue darken-4">
                <div class="card-content white-text text-center">
                    <i class="large material-icons block" style="font-size: 4rem;">error</i>
                    <span class="card-title"> Packages Expiring <br><span style="font-size: -webkit-xxx-large;"><b><?php echo 54;?></b></span></span>
                </div>
            </div>
        </div>

    <div class="col l3 m6 s12">
            <div class="card blue darken-4">
                <div class="card-content white-text text-center">
                    <i class="large material-icons block" style="font-size: 4rem;">not_interested</i>
                    <span class="card-title">Blocked Companies<br><span style="font-size: -webkit-xxx-large;"><b><?php echo $blockedcompanies;?></b></span></span>
                </div
            </div>
        </div>

</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--<?php print_r($sectorwise);?>-->
<div id="container" style="height: 400px"></div>
<button id="button" class="autocompare">Get selected points</button>
<script>
$(function () {
    sectorname = _.pluck(<?php print_r($sectorwise);?>, "name");
    $('#container').highcharts({
        chart: {
            type: 'pie'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });


    // the button action
    $('#button').click(function () {
        var chart = $('#container').highcharts(),
            selectedPoints = chart.getSelectedPoints();

        if (chart.lbl) {
            chart.lbl.destroy();
        }
        chart.lbl = chart.renderer.label('You selected ' + selectedPoints.length + ' points', 10, 10)
            .attr({
                padding: 10,
                r: 5,
                fill: Highcharts.getOptions().colors[1],
                zIndex: 5
            })
            .css({
                color: 'white'
            })
            .add();
    });
});
    </script>