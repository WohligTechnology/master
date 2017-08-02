<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Create Options</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createoptionssubmit');?>" enctype="multipart/form-data">

        <div class="row">
            <div class="input-field col s12 m6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('question', $question, set_value('question')); ?>
                <label>Question</label>
            </div>
        </div>
            <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('representation', $representation, set_value('representation')); ?>
                <label>Representation</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="actualorder">Actual Order</label>
                <input type="text" id="actualorder" name="actualorder" value="<?php echo set_value('actualorder');?>">
            </div>
        </div>
         <div class="row">
            <div class="file-field input-field col s12 m6">
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
            <div class="input-field col s12 m6">
                <label for="order"> Order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order');?>">
            </div>
        </div>
          <div class="row">
            <div class="input-field col s12 m6">
                <label for="weight">Weight</label>
                <input type="text" id="weight" name="weight" value="<?php echo set_value('weight');?>">
            </div>
        </div>
        <div class="row">
           <div class="col s12 m6">
               <textarea name="optiontext" placeholder="optiontext.."><?php echo set_value('optiontext');?></textarea>
           </div>
        </div> 
          <div class="row">
           <div class="col s12 m6">
               <textarea name="text" placeholder="text.."><?php echo set_value('text');?></textarea>
           </div>
        </div>
       
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewoptions'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
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
                Options Details
            </header>
            <div class="panel-body">
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createoptionssubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Question</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "question",$question,set_value( 'question'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Representation</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "representation",$representation,set_value( 'representation'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Actual Order</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="actualorder" value='<?php echo set_value(' actualorder ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Image</label>
                            <div class="col-sm-4">
                                <input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value(' image ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Order</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Weight</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="weight" value='<?php echo set_value(' weight ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Option Text</label>
                            <div class="col-sm-8">
                                <textarea name="optiontext" id="" cols="20" rows="10" class="form-control tinymce">
                                    <?php echo set_value( 'optiontext');?>
                                </textarea>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Text</label>
                            <div class="col-sm-8">
                                <textarea name="text" id="" cols="20" rows="10" class="form-control tinymce">
                                    <?php echo set_value( 'text');?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo site_url(" site/viewoptions "); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                </form>
                </div>
        </section>
        </div>
    </div>-->
