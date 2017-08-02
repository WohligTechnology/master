<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Add Logo</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createlogosubmit');?>" enctype="multipart/form-data">
        <div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big image1">
								                    	<?php if ($image == '') {
} else {
    ?><img src="<?php echo base_url('uploads').'/'.$image;
    ?>">
															<?php
} ?>
															</span>
				<div class="btn blue darken-4">
					<span>Image</span>
					<input name="image" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate image1" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image', $image);?>">
				</div>
			</div>

		</div>
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
        </div>
            </div>
        </div>

    </form>
</div>
