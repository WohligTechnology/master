<!--
<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
-->
<!--<div id="container" style="height: 400px"></div>-->
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<span class="filprop"><u>Filter By :-</u></span>
<button class="btn btn-primary waves-effect waves-light blue darken-4 right" onclick="GlobalFunctions.clearSelection()">Clear Selection</button>
<form method="post" action="<?php echo site_url('site/getuserbyfilter');?>">

    <div class="cf">
        <!--        <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>-->

        <!--        <a href="#" class="blue darken-4 btn waves-effect waves-light">CLear Selection</a>-->
    </div>
    <div class="row selectproper">
        <div class="col s12 m3">
            <select id="1" name="gender" onchange="GlobalFunctions.checkfortwo(1);" style="display:none">
                <?php  foreach($gender as $key => $value) {?>
                    <option value=<?php echo $key; ?>><?php echo $value; ?>
                    </option>
                    <?php }?>
            </select>
            <label>Gender</label>
        </div>
        <div class="col s12 m3">
            <select id="2" name="salary" onchange="GlobalFunctions.checkfortwo(2);" style="display:none">
                <option value="">Choose Salary</option>
                <option value="0-2">Below 2L</option>
                <option value="2-4">2L-4L</option>
                <option value="5-7">5L-7L</option>
                <option value="8-10">8L-10L</option>
                <option value="11-13">11L-13L</option>
                <option value="14-16">14L-16L</option>
                <option value="17-19">17L-19L</option>
                <option value="19">19L+</option>
            </select>
            <label>Salary</label>
        </div>
        <div class="col s12 m3">
            <select id="3" name="maritalstatus" onchange="GlobalFunctions.checkfortwo(3);" style="display:none">
                <?php  foreach($maritalstatus as $key => $value) {?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?>
                    </option>
                    <?php }?>
            </select>
            <label>Marital Status</label>
        </div>
        <div class="col s12 m3">
            <select id="4" name="branch" onchange="GlobalFunctions.checkfortwo(4);" style="display:none">
                <?php  foreach($branch as $key => $value) {?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?>
                            <?php }?>
            </select>
            <label>Branch</label>
        </div>
    </div>
    <div class="row selectproper">
        <div class="col s12 m3">
            <select id="5" name="department" onchange="GlobalFunctions.checkfortwo(5);" style="display:none">
                <?php  foreach($department as $key => $value) {?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?>
                    </option>
                    <?php }?>
            </select>
            <label>Department</label>
        </div>
        <div class="col s12 m3">
            <select id="6" name="designation" onchange="GlobalFunctions.checkfortwo(6);" style="display:none">
                <?php  foreach($designation as $key => $value) {?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?>
                    </option>
                    <?php }?>
            </select>
            <label>Designation</label>
        </div>
        <div class="col s12 m3">
            <select id="7" name="spanofcontrol" onchange="GlobalFunctions.checkfortwo(7);" style="display:none">
                <option value="">Choose Span of control</option>
                <option value="0-5">0-5</option>
                <option value="6-10">6-10</option>
                <option value="11-15">11-15</option>
                <option value="16-20">16-20</option>
                <option value="20-25">20-25</option>
                <option value="25">25+</option>
            </select>
            <label>Span of Control</label>
        </div>
        <div class="col s12 m3">
            <select id="8" name="experience" onchange="GlobalFunctions.checkfortwo(8);" style="display:none">
                <option value="">Choose Experience</option>
                <option value="0-2">0-2</option>
                <option value="3-5">3-5</option>
                <option value="6-8">6-8</option>
                <option value="8">8+</option>
            </select>
            <label>Experience</label>
        </div>
    </div>
</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Average Percent</th>
        </tr>
    </thead>
    <tbody class="datatobeinserted">
        <tr>
            <td>CHHCHH</td>
            <td>CHHCHH</td>
        </tr>
    </tbody>
</table>


<script>
    var GlobalFunctions = {};

    $(document).ready(function () {


        GlobalFunctions.checkfortwo = function (val) {
            var count = 0;
            for (var i = 1; i <= 8; i++) {
                if ($("select#" + i).val() == "") {

                } else {
                    count++;
                }
            }
            if (count == 2) {
                for (var i = 1; i <= 8; i++) {
                    if ($("select#" + i).val() == "") {
                        $("select#" + i).prop("disabled", true);
                        $('select').material_select();
                    }
                }
            } else if(count < 2) {
               for (var i = 1; i <= 8; i++) {
                    $("select#" + i).prop("disabled", false);
                }
            }
            getTable();
        }

        function clearTable() {



            $("table tbody.datatobeinserted").html("");
        }

        function addRow(name, averagePercent) {
            $("table tbody.datatobeinserted").append("<tr><td>" + name + "</td><td>" + averagePercent + "</td></tr>");
        }


        function getTable() {
            var $gender = $("select[name=gender]").val();
            var $salary = $("select[name=salary]").val();
            var $maritalstatus = $("select[name=maritalstatus]").val();
            var $branch = $("select[name=branch]").val();
            var $designation = $("select[name=designation]").val();
            var $department = $("select[name=department]").val();
            var $spanofcontrol = $("select[name=spanofcontrol]").val();
            var $experience = $("select[name=experience]").val();
            var new_base_url = "<?php echo site_url(); ?>";
            $.getJSON(new_base_url + '/site/viewconclusionjson', {
                gender: $gender,
                salary: $salary,
                maritalstatus: $maritalstatus,
                branch: $branch,
                designation: $designation,
                department: $department,
                spanofcontrol: $spanofcontrol,
                experience: $experience
            }, function (data) {
                clearTable();
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    var n = data[i];
                    addRow(n.name, n.averagepercent.averagepercent);
                }

                $('select').material_select();
            });
        }



        GlobalFunctions.clearSelection = function() {
            for (var j = 1; j <= 8; j++) {
                $('#' + j).val('');
                $('#' + j).prop("disabled", false);
                selected = [];
                $('select').material_select();
            }
        }

        getTable();
    });
</script>