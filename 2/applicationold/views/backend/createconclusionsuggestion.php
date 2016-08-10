<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create conclusionsuggestion</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createconclusionsuggestionsubmit");?>' enctype= 'multipart/form-data'>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("conclusion",$conclusion,set_value('conclusion'));?>
<label>Conclusion</label>
</div>
</div>
<div class="row">
<div class="input-field col s12">
<textarea name="suggestion" class="materialize-textarea" length="400"><?php echo set_value( 'suggestion');?></textarea>
<label>Suggestion</label>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewconclusionsuggestion"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
