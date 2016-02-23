<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize"> Survey Question Answer</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editsurveyquestionanswersubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class=" row" style="display:none">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("user",$user,set_value('user',$before->user));?>
<label for="User">User</label>
</div>
</div>
<div class=" row">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("question",$question,set_value('question',$before->question));?>
<label for="Question">Question</label>
</div>
</div>
<div class=" row">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("option",$option,set_value('option',$before->option));?>
<label for="Option">Option</label>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewsurveyquestionanswer?id=").$this->input->get("userid"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
