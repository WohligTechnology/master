<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15"> Test</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/edittestsubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="units">No of Question to send</label>
                <input type="text" id="units" name="units" value="<?php echo set_value('units',$before->units);?>">
            </div>
        </div>
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="startdate">Startdate</label>
                <input type="date" class="datepicker" id="startdate" name="startdate" value="<?php echo set_value('startdate',$before->startdate);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('schedule', $schedule, set_value('schedule',$before->schedule)); ?>
                <label>Schedule</label>
            </div>
        </div>
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('check', $check, set_value('check',$before->check)); ?>
                <label>check</label>
            </div>
        </div>
<!--
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('designation', $designation, set_value('designation',$before->designation)); ?>
                <label>Designation</label>
            </div>
        </div>  
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('department', $department, set_value('department',$before->department)); ?>
                <label>Department</label>
            </div>
        </div>
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('branch', $branch, set_value('branch',$before->branch)); ?>
                <label>Branch</label>
            </div>
        </div>
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('team', $team, set_value('team',$before->team)); ?>
                <label>Team</label>
            </div>
        </div>
-->
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="timestamp">Timestamp</label>
                <input type="text" id="timestamp" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewtest'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
        </div>
            </div>
        </div>

    </form>
</div>
   