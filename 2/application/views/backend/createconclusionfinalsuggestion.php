<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create conclusionfinalsuggestion</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createconclusionfinalsuggestionsubmit");?>' enctype= 'multipart/form-data'>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("conclusion",$conclusion,set_value('conclusion'));?>
<label>Conclusion</label>
</div>
</div>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("conclusionsuggestion",$conclusionsuggestion,set_value('conclusionsuggestion'));?>
<label>Conclusion Suggestion</label>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewconclusionfinalsuggestion"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
