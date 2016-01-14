<div class="row">
    <div class="col l3 m6 s12">
        <a href='<?php echo site_url(' site/viewcompany ');?>'>
            <div class="card blue darken-4">
                <div class="card-content white-text text-center">
                    <i class="large material-icons block" style="font-size: 4rem;">business</i>
                    <span class="card-title"> Total Companies <br><span style="font-size: -webkit-xxx-large;"><b><?php echo $company;?></b></span></span>
                </div>
            </div>
        </a>
    </div>

    <div class="col l3 m6 s12">
        <a href='<?php echo site_url(' site/viewpackageexpiring ');?>'>
            <div class="card blue darken-4">
                <div class="card-content white-text text-center">
                    <i class="large material-icons block" style="font-size: 4rem;">error</i>
                    <span class="card-title"> Packages Expiring <br><span style="font-size: -webkit-xxx-large;"><b><?php echo $packageexpire;?></b></span></span>
                </div>
            </div>
        </a>
    </div>

    <div class="col l3 m6 s12">
        <a href='<?php echo site_url(' site/viewblockcompanies ');?>'>
            <div class="card blue darken-4">
                <div class="card-content white-text text-center">
                    <i class="large material-icons block" style="font-size: 4rem;">not_interested</i>
                    <span class="card-title">Blocked Companies<br><span style="font-size: -webkit-xxx-large;"><b><?php echo $blockedcompanies;?></b></span></span>
                </div>
            </div>
        </a>
    </div>

</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div class="row">
    <div class="m6 s12">
        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

        <script>
            $(function () {
                var sectorCount = [];
                var sectors = [];
                $(function () {
                    $(document).ready(function () {
                        var new_base_url = "<?php echo site_url(); ?>";
                        $.getJSON(new_base_url + '/site/getcompanysector', {}, function (data) {
                            _.each(data, function (n) {
                                var hold = {};
                                hold.name = n.name;
                                hold.y = parseInt(n.sectorcount.sector);
                                sectors.push(hold);
                                $('select').material_select();
                                createGraph();
                            });
                            console.log(sectors);
                        });
                    });

                    function createGraph() {
                        $('#container').highcharts({
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: 'Company Sectors'
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                        style: {
                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                        }
                                    }
                                }
                            },
                            series: [{
                                name: 'Sector',
                                colorByPoint: true,
                                data: sectors
                        }]
                        });
                    }
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


            // PACKAGES GRAPH//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        </script>
    </div>
    <div class="m6 s12">
        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;">
        </div>
        <script>
            $(function () {

                $(document).ready(function () {
                    // Build the chart
                    $('#container').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Browser market shares January, 2015 to May, 2015'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: [{
                                name: 'Microsoft Internet Explorer',
                                y: 56.33
                }, {
                                name: 'Chrome',
                                y: 24.03,
                                sliced: true,
                                selected: true
                }, {
                                name: 'Firefox',
                                y: 10.38
                }, {
                                name: 'Safari',
                                y: 4.77
                }, {
                                name: 'Opera',
                                y: 0.91
                }, {
                                name: 'Proprietary or Undetectable',
                                y: 0.2
                }]
            }]
                    });
                });
            });
        </script>
    </div>
</div>