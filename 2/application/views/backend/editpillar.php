<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Edit Pillar</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/editpillarsubmit');?>" enctype="multipart/form-data">
 <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div> 
           <div class="row" style="display:none">
            <div class="input-field col s12 m6">
                <label for="weight">Weight</label>
                <input type="text" id="weight" name="weight" value="<?php echo set_value('weight',$before->weight);?>">
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="order">Order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div> 
      
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="expectedweight">Expected Weight</label>
                <input type="text" id="expectedweight" name="expectedweight" value="<?php echo set_value('expectedweight',$before->expectedweight);?>">
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


<!--
<section class="panel">
    <header class="panel-heading">
        Pillar Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editpillarsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Name</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ',$before->name);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Weight</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="weight" value='<?php echo set_value(' weight ',$before->weight);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewpillar"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>-->
