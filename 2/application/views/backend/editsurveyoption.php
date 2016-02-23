<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize"> Survey Option</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editsurveyoptionsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
   <div class="row">
            <input type="hidden" id="textid" name="type" value='<?php echo set_value(' type ',$checktype);?>'>
        </div>
<div class="row">
<div class="input-field col s6">
<label for="Order">Order</label>
<input type="text" id="Order" name="order" value='<?php echo set_value('order',$before->order);?>'>
</div>
</div>
<div class=" row">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("question",$question,set_value('question',$before->question));?>
<label for="Question">Question</label>
</div>
</div>
 <?php   if($checktype==5){ ?>
            <div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big image1">
                   			<?php if ($before->image == '') {
} else {
    ?><img src="<?php echo base_url('uploads').'/'.$before->image;
    ?>">
						<?php
} ?></span>
				<div class="btn blue darken-4">
					<span>Image</span>
					<input name="image" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate image1" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image', $before->image);?>">
				</div>
<!--				<div class="md4"><a class="waves-effect waves-light btn red clearimg input-field ">Clear Image</a></div>-->
			</div>

		</div>
          <?php } else { ?>
              <div class="row">
                <div class="col s12 m6">
                   <label for="title">Title</label>
                    <textarea name="title" class="materialize-textarea" placeholder="Enter text ..."><?php echo set_value('title');?></textarea>
                </div>
            </div>
          <?php }?>
<!--
<div class="row">
<div class="input-field col s6">
<label for="Title">Title</label>
<input type="text" id="Title" name="title" value='<?php echo set_value('title',$before->title);?>'>
</div>
</div>
-->
<!--
<div class="row">
            <div class="file-field input-field col s12 m6">

                <span class="img-center big image1"> <?php if ($before->image != '') {
    ?><img src="<?php echo base_url('uploads').'/'.$before->image;
    ?>"><?php
} ?></span>

                <div class="btn blue darken-4">
                    <span>Image</span>
                    <input name="image" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate image1" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image', $before->image);?>">
                </div>
                <div class="md4"><a class="waves-effect waves-light btn red clearimg input-field ">Clear Image</a></div>
            </div>

        </div>
-->
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewsurveyoption?id=").$this->input->get("questionid"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
<!--
<script>
    $(document).ready(function() {
        textid = $("#textid").val();
        $(".para, .check, .mult, .img,.text").hide();
        console.log(textid);
        if (textid == 1) {
            $('.text').show();
            //                  $("div.toggle1, div.toggle3, div.toggle4, div.toggle5").hide();
        }
        else if (textid == 2) {
            $('.para').show();
        }
        else if (textid == 3) {
            $('.mult').show();
        } 
        else if (textid == 4) {
            $('.check').show();
        } 
        else if (textid == 5) {
            $('.img').show();
        } 

    });

</script>
-->
