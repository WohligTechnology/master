<script src="http://code.highcharts.com/modules/exporting.js"></script>
<div id="nodata" style="display:none;">No Data Found</div>
<div class="well">
    <span style="font-size: 20px;"><b>Charts of Recent Test :-</b></span>
</div>
<div id="container2"></div>
<div id="container3"></div>


<script>
    $(document).ready(function () {
        $.getJSON(
            "<?php echo base_url(); ?>index.php/json/generatejson", {
                id: "123"
            },
            function (data) {

                console.log(data);
                $("#container2").highcharts(data);
                $("#container3").highcharts(data);
            }
        );

    });
</script>
