<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize"> Survey Question</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editsurveyquestionsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
           <div class="col s12 m6">
               <textarea name="content" class="materialize-textarea" placeholder="Enter text ..."><?php echo set_value('content',$before->content);?></textarea>
           </div>
        </div>
        
<div class=" row">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("type",$type,set_value('type',$before->type));?>
<label for="Type">Type</label>
</div>
</div>
<div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('survey', $survey, set_value('survey',$before->survey)); ?>
                    <label>Survey</label>
            </div>
        </div>
<div class="row" style="display:none">
<div class="input-field col s6">
<label for="Start Time">Start Time</label>
<input type="text" id="starttime" name="starttime" value='<?php echo set_value('starttime',$before->starttime);?>'>
</div>
</div>
<div class="row" style="display:none">
<div class="input-field col s6">
<label for="End Time">End Time</label>
<input type="text" id="endtime" name="endtime" value='<?php echo set_value('endtime',$before->endtime);?>'>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewsurveyquestion"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
