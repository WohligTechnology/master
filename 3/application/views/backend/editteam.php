<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Edit Team</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/editteamsubmit');?>" enctype="multipart/form-data">
 <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>
      
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="teamid">Team Id</label>
                <input type="text" id="teamid" name="teamid" value="<?php echo set_value('teamid',$before->teamid);?>">
            </div>
        </div>
     
       
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewteam'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
        </div>
            </div>
        </div>

    </form>
</div>


<!--
<section class="panel">
    <header class="panel-heading">
        Team Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editteamsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Name</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ',$before->name);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Team id</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="teamid" value='<?php echo set_value(' deptid ',$before->teamid);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewteam"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>-->
