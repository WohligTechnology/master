<div class="">
  <!--
  <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>

  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/highcharts-3d.js"></script>
  -->
  <!--<div id="container" style="height: 400px"></div>-->
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
  <div class="text-center">
    <button class="btn btn-primary waves-effect waves-light blue darken-4" onclick="GlobalFunctions.clearSelection()">Clear Selection</button>
    <button class="btn btn-primary waves-effect waves-light blue darken-4 excelexport">Excel Export</button>
  </div>
  <span class="filprop">Filters</span>
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
              <label>Annual Salary</label>
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
              <th>View</th>
          </tr>
      </thead>
      <tbody class="datatobeinserted">
          <tr>
              <td>CHHCHH</td>
              <td>CHHCHH</td>
              <td>CHHCHH</td>
          </tr>
      </tbody>
  </table>


  <script>
      var GlobalFunctions = {};
      var interlinkageData=[];
      var globalArray=[];
      var globalJson={};
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

          function addRow(name, averagePercent,id) {
              $("table tbody.datatobeinserted").append("<tr><td>" + name + "</td><td>" + averagePercent + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad tooltipped' href='<?php echo site_url('site/viewconclude?id=');?>"+ id +"'  data-position='top' data-delay='50' data-tooltip='View'><i class='material-icons propericon'>visibility</i></a></td></tr>");

          }
  //

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
                  globalArray=[];
                  for(var j=0;j< data.length;j++){
                    globalJson={};
                    globalJson.Interlinkage=data[j].name;
                    globalJson.Average=data[j].averagepercent.averagepercent;
                    globalArray.push(globalJson);
                  }


                  for (var i = 0; i < data.length; i++) {
                      var n = data[i];
                      addRow(n.name, n.averagepercent.averagepercent,n.id);
                  }

                  $('select').material_select();
              });
          }

          $('.excelexport').click(function(){
          var data = globalArray;
          if(data == '')
              return;
              var currentDate=Date.now();
          JSONToCSVConvertor(data, "Interlinkage"+currentDate, true);
      });

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

      function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
          //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
          var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

          var CSV = '';
          //Set Report title in first row or line

          CSV += ReportTitle + '\r\n\n';

          //This condition will generate the Label/Header
          if (ShowLabel) {
              var row = "";

              //This loop will extract the label from 1st index of on array
              for (var index in arrData[0]) {

                  //Now convert each value to string and comma-seprated
                  row += index + ',';
              }

              row = row.slice(0, -1);

              //append Label row with line break
              CSV += row + '\r\n';
          }

          //1st loop is to extract each row
          for (var i = 0; i < arrData.length; i++) {
              var row = "";

              //2nd loop will extract each column and convert it in string comma-seprated
              for (var index in arrData[i]) {
                  row += '"' + arrData[i][index] + '",';
              }

              row.slice(0, row.length - 1);

              //add a line break after each row
              CSV += row + '\r\n';
          }

          if (CSV == '') {
              alert("Invalid data");
              return;
          }

          //Generate a file name
          var fileName = "MyReport_";
          //this will remove the blank-spaces from the title and replace it with an underscore
          fileName += ReportTitle.replace(/ /g,"_");

          //Initialize file format you want csv or xls
          var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

          // Now the little tricky part.
          // you can use either>> window.open(uri);
          // but this will not work in some browsers
          // or you will not get the correct file extension

          //this trick will generate a temp <a /> tag
          var link = document.createElement("a");
          link.href = uri;

          //set the visibility hidden so it will not effect on your web-layout
          link.style = "visibility:hidden";
          link.download = fileName + ".csv";

          //this part will append the anchor tag and remove it after automatic click
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
      }
  </script>
</div>
