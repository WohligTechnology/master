<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch(" List of surveyoption");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">Id</th>
<th data-field="order">Order</th>
<!-- <th data-field="question">Question</th> -->
<th data-field="title">Title</th>
<!--<th data-field="image">Image</th>-->
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createsurveyoption?id=").$this->input->get("id"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
  var image="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' width='80px' height='80px'></a>";
                if(resultrow.image=="")
                {
                image="No Receipt Available";
                }
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.order + "</td><td>" + resultrow.title + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editsurveyoption?id=');?>"+resultrow.id+"&questionid="+resultrow.question+"'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletesurveyoption?id='); ?>"+resultrow.id+"&questionid="+resultrow.question+"'><i class='material-icons propericon'>delete</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
