<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Change Fixed Pillar Weightages</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/editchangeexpected');?>" enctype="multipart/form-data">
   

        <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Work-Life Blend</label>
                <input type="text" id="expectedweight1" name="expected1" value="<?php echo set_value('expectedweight',$before[0]->expectedweight);?>">
            </div>
        </div>  
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Employee Engagement</label>
                <input type="text" id="expectedweight2" name="expected2" value="<?php echo set_value('expectedweight',$before[1]->expectedweight);?>">
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Driving Force</label>
                <input type="text" id="expectedweight3" name="expected3" value="<?php echo set_value('expectedweight',$before[2]->expectedweight);?>">
            </div>
        </div>  
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Health of an Individual</label>
                <input type="text" id="expectedweight4" name="expected4" value="<?php echo set_value('expectedweight',$before[3]->expectedweight);?>">
            </div>
        </div>  
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Interpersonal Relationships at Work</label>
                <input type="text" id="expectedweight5" name="expected5" value="<?php echo set_value('expectedweight',$before[4]->expectedweight);?>">
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Rewards and Recognition</label>
                <input type="text" id="expectedweight6" name="expected6" value="<?php echo set_value('expectedweight',$before[5]->expectedweight);?>">
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Sense of Ownership</label>
                <input type="text" id="expectedweight7" name="expected7" value="<?php echo set_value('expectedweight',$before[6]->expectedweight);?>">
            </div>
        </div> 
            <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Work Environment</label>
                <input type="text" id="expectedweight8" name="expected8" value="<?php echo set_value('expectedweight',$before[7]->expectedweight);?>">
            </div>
        </div>
            <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Job Security</label>
                <input type="text" id="expectedweight9" name="expected9" value="<?php echo set_value('expectedweight',$before[8]->expectedweight);?>">
            </div>
        </div>
            <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Alignment</label>
                <input type="text" id="expectedweight10" name="expected10" value="<?php echo set_value('expectedweight',$before[9]->expectedweight);?>">
            </div>
        </div> 
           
<!--           // new pillar name-->
            <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight"><?php echo $elevenpillar->name;?></label>
                <input type="text" id="expectedweight3" name="expected11" value="<?php echo set_value('expectedweight',$before[10]->expectedweight);?>">
            </div>
        </div> 
       
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewpillar'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
        </div>
            </div>
        </div>

    </form>
</div>
