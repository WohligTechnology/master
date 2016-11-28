<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Create Test Question</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/edittestquestionsubmit');?>" enctype="multipart/form-data">
         <div class="form-row control-group row-fluid" style="display:none;">
                <label class="control-label span3" for="normal-field">ID</label>
                <div class="controls span9">
                    <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $this->input->get('id');?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                   <?php $i=0;?>
                    <?php foreach($table as $row) { ?>
                     <?php $i++;?>
                    <input type="checkbox" class="filled-in" id="filled-in-box<?php echo $i; ?>" name="question[]" value="<?php echo $row->id; ?>" <?php if(in_array($row->id,$before)) echo 'checked'; ?>>
                    <label for="filled-in-box<?php echo $i; ?>"></label>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo $row->text; ?>
                    <br>
                    <br>
                   
                    <?php } ?>
                </div>
            </div>
         
     
       
       
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<!--                <a href="<?php echo site_url('site/viewtestquestion'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>-->
        </div>
            </div>
        </div>

    </form>
</div>
<!--
<section class="panel">
    <header class="panel-heading">
        Test Questions
    </header>
    <div class="panel-body">
        <form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/edittestquestionsubmit');?>" enctype="multipart/form-data">
            <div class="form-row control-group row-fluid" style="display:none;">
                <label class="control-label span3" for="normal-field">ID</label>
                <div class="controls span9">
                    <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $this->input->get('id');?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Questions</label>
                <div class="col-sm-8">
                    <?php foreach($table as $row) { ?>
                    <input type="checkbox" id="inlineCheckbox1" name="question[]" value="<?php echo $row->id; ?>" <?php if(in_array($row->id,$before)) echo 'checked'; ?>>&nbsp;
                    <?php echo $row->text; ?>
                    <br>
                    <br>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
-->

