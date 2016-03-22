<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch("Surveys");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">Id</th>
<th data-field="conclusion">Survey Name</th>
<th data-field="action">Action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/trialsurvey"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.conclusion + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad tooltipped' href='<?php echo site_url('site/edittrialsurvey?id=');?>"+resultrow.id+"'  data-position='top' data-delay='50' data-tooltip='Edit'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad tooltipped' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteconclusionfinalsuggestion?id='); ?>"+resultrow.id+"'  data-position='top' data-delay='50' data-tooltip='Edit Company'><i class='material-icons propericon'>delete</i></a><a class='btn btn-primary btn-xs waves-effect waves-light blue pad10 darken-4 z-depth-0 less-pad tooltipped' href='<?php echo site_url('site/viewsurveyquestionuser?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>supervisor_account</i></a><a class='btn btn-primary btn-xs waves-effect waves-light blue pad10 darken-4 z-depth-0 less-pad tooltipped' href='<?php echo site_url('json/sendsurveyquestion?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>loop</i></a><a class='btn btn-primary btn-xs waves-effect waves-light blue pad10 darken-4 z-depth-0 less-pad tooltipped' href='<?php echo site_url('site/exportsurveyresultcsv?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>assignment_ind</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
