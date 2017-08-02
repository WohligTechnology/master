<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Edit Options</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/editoptionssubmit');?>" enctype="multipart/form-data">
 <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('question', $question, set_value('question',$before->question)); ?>
                <label>Questions</label>
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('representation', $representation, set_value('representation',$before->representation)); ?>
                <label>Representation</label>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s12 m6">
                <label for="actualorder">actualorder</label>
                <input type="text" id="actualorder" name="actualorder" value="<?php echo set_value('actualorder',$before->actualorder);?>">
            </div>
        </div> 
        <div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big image1">
								                    	<?php if ($before->image == '') {
} else {
    ?><img src="<?php echo base_url('uploads').'/'.$before->image;
    ?>">
															<?php
} ?>
															</span>
				<div class="btn blue darken-4">
					<span>Image</span>
					<input name="image" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate image1" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image', $before->image);?>">
				</div>
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
                <label for="weight">weight</label>
                <input type="text" id="weight" name="weight" value="<?php echo set_value('weight',$before->weight);?>">
            </div>
        </div>
            <div class="row">
            <div class="col s12 m6">
                <textarea name="optiontext" placeholder="Enter text ..."><?php echo set_value( 'optiontext',$before->optiontext);?></textarea>
            </div>
        </div> 
            <div class="row">
            <div class="col s12 m6">
                <textarea  name="text" placeholder="Enter option text ..."><?php echo set_value( 'text',$before->text);?></textarea>
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
<section class="panel">
    <header class="panel-heading">
        Options Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editoptionssubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Question</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "question",$question,set_value( 'question',$before->question),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Representation</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "representation",$representation,set_value( 'representation',$before->representation),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Actual Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="actualorder" value='<?php echo set_value(' actualorder ',$before->actualorder);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Image</label>
                <div class="col-sm-4">
                    <input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value(' image ',$before->image);?>'>
                    <?php if($before->image == "") { } else { ?>
                    <img src="<?php echo base_url('uploads')." / ".$before->image; ?>" width="140px" height="140px">
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Weight</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="weight" value='<?php echo set_value(' weight ',$before->weight);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Option Text</label>
                <div class="col-sm-8">
                    <textarea name="optiontext" id="" cols="20" rows="10" class="form-control tinymce">
                        <?php echo set_value( 'optiontext',$before->optiontext);?></textarea>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Text</label>
                <div class="col-sm-8">
                    <textarea name="text" id="" cols="20" rows="10" class="form-control tinymce">
                        <?php echo set_value( 'text',$before->text);?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewoptions"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>-->
