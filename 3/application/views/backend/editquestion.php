<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Edit Question</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/editquestionsubmit');?>" enctype="multipart/form-data">
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
      
        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('pillar', $pillar, set_value('pillar',$before->pillar)); ?>
                <label>Pillar</label>
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown('noofans', $noofans, set_value('noofans',$before->noofans)); ?>
                <label>No of answer</label>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s12 m6">
                <label for="order">Order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div> 
        <div class="row">
           <div class="col s12 m6">
               <textarea  name="text" placeholder="Enter text ..."><?php echo set_value('text',$before->text);?></textarea>
           </div>
        </div>
          <div class="row">
            <div class="input-field col s12 m6">
                <label for="timestamp">Timestamp</label>
                <input type="text" id="timestamp" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div> 
    
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                    <?php    if($checkaccesslevel==1) {?>
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                        <?php }?>
                <a href="<?php echo site_url('site/getSchedule'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
        </div>
            </div>
        </div>

    </form>
</div>
