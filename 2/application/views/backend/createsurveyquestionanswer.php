<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize"> Survey Question Answer</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createsurveyquestionanswersubmit");?>' enctype= 'multipart/form-data'>
<div class=" row" style="display:none">
<div class=" input-field col s6">
<?php echo form_dropdown("user",$user,set_value('user',$this->input->get("id")));?>
<label>User</label>
</div>
</div>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("question",$question,set_value('question'));?>
<label>Question</label>
</div>
</div>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("option",$option,set_value('option'));?>
<label>Option</label>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewsurveyquestionanswer?id=").$this->input->get("id"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
