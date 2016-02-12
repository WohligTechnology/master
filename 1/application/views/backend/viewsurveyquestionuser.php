<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch(" List of surveyquestionuser");?>
   <div class="row">
                        <div class="col s12 m6">
                        
                               <a href="<?php echo site_url("json/sendsurveyquestion"); ?>" class="btn btn-secondary waves-effect waves-light red">Send Questions</a>
                        </div>
                    </div>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">Id</th>
<th data-field="question">Question</th>
<th data-field="email">Email</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createsurveyquestionuser"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
       var statusfuncname = "disableCompany";
        var blockTitle = "Disable Company";
        var blockIcon = "verified_user";
        var blockIconColor = "waves-light green";
        if (resultrow.status == 1) {
            statusfuncname = "enableCompany";
            blockTitle = "Enable Company";
            blockIcon = "not_interested";
            blockIconColor = "waves-light red";
        } 
    else if (resultrow.status == 2) {
            statusfuncname = "disableCompany";
            blockTitle = "Disable Company";
            blockIcon = "verified_user";
            blockIconColor = "waves-light green";
        }
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.question + "</td><td>" + resultrow.email + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editsurveyquestionuser?id=');?>"+resultrow.id+"'><i class='material-icons'>mode_edit</i></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletesurveyquestionuser?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>delete</i></a><a class='btn btn-danger btn-xs waves-effect "+blockIconColor+" pad10 z-depth-0 less-pad tooltipped' onclick=\"" + statusfuncname + "(\'" + resultrow.id + "\')\" data-position='top' data-delay='50' data-tooltip='" + blockTitle + "'><i class='material-icons propericon'>"+blockIcon+"</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
<script>
 function disableCompany(id) {
    var new_base_url = "<?php echo site_url(); ?>";
            $.getJSON(new_base_url + '/site/disableCompany', {
                id: id
            }, function (data) {
                console.log("abc");
                Materialize.toast('Successfully Disabled!',2000);
                $(".chintantablesearchgo").click();
            });
      

    }

    function enableCompany(id) {
         var new_base_url = "<?php echo site_url(); ?>";
            $.getJSON(new_base_url + '/site/enableCompany', {
                id: id
            }, function (data) {
                console.log("abc");
                Materialize.toast('Successfully Enabled!',2000);
                $(".chintantablesearchgo").click();
            });
        
    }
</script>
