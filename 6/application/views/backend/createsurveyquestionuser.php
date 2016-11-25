<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize"> Survey Question User</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createsurveyquestionusersubmit");?>' enctype= 'multipart/form-data'>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("survey",$survey,set_value('survey',$this->input->get('id')));?>
<label>Survey</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Email">Email</label>
<input type="email" id="Email" name="email" value='<?php echo set_value('email');?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewsurveyquestionuser?id=").$this->input->get('id'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
