<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Create Branch</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createbranchsubmit');?>" enctype="multipart/form-data">

        <div class="row">
            <div class="input-field col s12 m6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name');?>">
            </div>
        </div>
         <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'language', $language, set_value( 'language')); ?>
                <label>Language</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="branchid">Branch Id</label>
                <input type="text" id="branchid" name="branchid" value="<?php echo set_value('branchid');?>">
            </div>
        </div>
        <div class="row">
           <div class="col s12 m6"><textarea  name="address" placeholder="Address"><?php echo set_value('address');?></textarea>
           </div>
        </div>
       
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewbranch'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
        </div>
            </div>
        </div>

    </form>
</div>












<!--
<div class="row" style="padding:1% 0">
<div class="col-md-12">
<div class="pull-right">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
Branch Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createbranchsubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Language</label>
<div class="col-sm-4">
<?php echo form_dropdown("language",$language,set_value('language'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Name</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Branch Id</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="branchid" value='<?php echo set_value('branchid');?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Address</label>
<div class="col-sm-8">
<textarea name="address" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'address');?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewbranch"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
-->
