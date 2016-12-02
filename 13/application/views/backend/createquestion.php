<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Create Question</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createquestionsubmit');?>" enctype="multipart/form-data">

      
        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('pillar', $pillar, set_value('pillar')); ?>
                <label>Pillar</label>
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('noofans', $noofans, set_value('noofans')); ?>
                <label>No of Answers</label>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s12 m6">
                <label for="order">Order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order');?>">
            </div>
        </div> 
        <div class="row">
           <div class="col s12 m6">
               <textarea name="text" placeholder="Enter text ..."><?php echo set_value('text');?></textarea>
           </div>
        </div>
    
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewquestion'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
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
                Question Details
            </header>
            <div class="panel-body">
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createquestionsubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Pillar</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "pillar",$pillar,set_value( 'pillar'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Number of answer</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "noofans",$noofans,set_value( 'noofans'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Order</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
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
                                <a href="<?php echo site_url(" site/viewquestion "); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                </form>
                </div>
        </section>
        </div>
    </div>-->
