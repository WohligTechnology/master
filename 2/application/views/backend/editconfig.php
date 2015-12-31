
<div class="row">
	<div class="col s12">
		<h4 class="pad-left-15">Config -> Notification</h4></div>
	<form class="col s12" method="post" action="<?php echo site_url('site/editconfigsubmit');?>" enctype="multipart/form-data">
		<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

		<div class="row" style="display:none">
			<div class="input-field col m6 s12">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" value="<?php echo set_value('title',$before->title);?>">
			</div>
		</div>
      <div class="row">
             <div class="col s12 m6">
                  <label>Google Cloud Messaging(GCM) Server Key</label>
                  <textarea  name="androidtext" placeholder="Enter text ..."><?php echo set_value( 'androidtext',$before->androidtext);?></textarea>
           
             </div>
           
        </div> 
           	<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>.pem File Upload</span>
					<input name="image" type="file" multiple>
				</div>
<!--
				<div class="file-path-wrapper">
					<input class="file-path validate image1" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image',$before->image);?>">
				</div>
-->
			</div>
					 
		</div>
<div class="row" >
			<div class="input-field col m6 s12">
				<label for="iostext">Passphrase for .pem</label>
				<input type="text" id="iostext" name="iostext" value="<?php echo set_value('iostext',$before->iostext);?>">
			</div>
		</div>
	
		<div class=" form-group">
			<div class="row">
				<div class="col m6 s12">
					<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
					<a href="<?php echo site_url('site/viewConfig'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
				</div>
			</div>
		</div>
	</form>
</div>