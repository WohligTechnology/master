<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit conclusionsuggestion</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editconclusionsuggestionsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class=" row">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("conclusion",$conclusion,set_value('conclusion',$before->conclusion));?>
<label for="Conclusion">Conclusion</label>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>Suggestion</label>
<textarea name="suggestion" placeholder="Enter text ..."><?php echo set_value( 'suggestion',$before->suggestion);?></textarea>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewconclusionsuggestion"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
