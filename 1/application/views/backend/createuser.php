<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15"> Profile</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createusersubmit');?>" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="<?php echo set_value('email');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <input type="password" name="password" value="" id="password">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <input type="password" name="confirmpassword" value="" id="confirmpassword">
                <label for="confirmpassword">Confirm Password</label>
            </div>
        </div>
<!--
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="socialid">Social Id</label>
                <input type="text" id="socialid" name="socialid" value="<?php echo set_value('socialid');?>">
            </div>
        </div>
    
        <div class="row">
            <div class="input-field col m6 s12">
                <select name="logintype" value="<?php echo set_value('logintype');?>" style="display:none">
                    <option value="Email">Email</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Google">Google</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Instagram">Instagram</option>
                </select>
                <label>Login Type</label>
            </div>
        </div>
-->
        <div class="row">
            <div class="input-field col m6 s12 ">
                <?php echo form_dropdown( 'status', $status, set_value( 'status'),"style='display:none'"); ?>
                <label>Status</label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col m6 s12">
                <div class="btn blue darken-4">
                    <span>Image</span>
                    <input name="image" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image');?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'accesslevel', $accesslevel, set_value( 'accesslevel'),"style='display:none'"); ?>
                <label>Access Level</label>
            </div>
        </div>

<!--
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="json">Json</label>
                <input type="text" id="json" name="json" value="<?php echo set_value('json');?>">
            </div>
        </div>
-->
<!--
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo set_value('username');?>">
            </div>
        </div>
-->
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="age">Age</label>
                <input type="text" id="age" name="age" value="<?php echo set_value('age');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'gender', $gender, set_value( 'gender'),"style='display:none'"); ?>
                <label>Gender</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'maritalstatus', $maritalstatus, set_value( 'maritalstatus'),"style='display:none'"); ?>
                <label>Marital Status</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'designation', $designation, set_value( 'designation'),"style='display:none'"); ?>
                <label>Designation</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'department', $department, set_value( 'department'),"style='display:none'"); ?>
                <label>Department</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col m6 s12">
                <label for="noofyearsinorganization">No of years in organization</label>
                <input type="number" min="1" max="50" id="noofyearsinorganization" name="noofyearsinorganization" value="<?php echo set_value('noofyearsinorganization');?>">
            </div>
        </div>
           <div class="row">
            <div class="input-field col m6 s12">
                <label for="spanofcontrol">Span of control</label>
                <input type="number" min="1" max="20" id="spanofcontrol" name="spanofcontrol" value="<?php echo set_value('spanofcontrol');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12"><textarea name="description" class="materialize-textarea" length="120"><?php echo set_value( 'description');?></textarea>
                <label>Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="employeeid">Employee Id</label>
                <input type="text" id="employeeid" name="employeeid" value="<?php echo set_value('employeeid');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'branch', $branch, set_value( 'branch'),"style='display:none'"); ?>
                <label>Branch</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'language', $language, set_value( 'language'),"style='display:none'"); ?>
                <label>Language</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'team', $team, set_value( 'team'),"style='display:none'"); ?>
                <label>Team</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <label for="salary">Salary</label>
                <input type="text" min="1" max="20" id="salary" name="salary" value="<?php echo set_value('salary');?>">
            </div>
        </div>

        <div class=" form-group">
            <div class="row">
                <div class="col m6 s12">
                    <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                    <a href="<?php echo site_url('site/viewusers'); ?>" class="waves-effect waves-light btn red">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
