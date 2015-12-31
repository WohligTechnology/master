<div class="container">
    <div class="row">
        <div class="col s12 right">
<div class="button1 pull-right">
   
<a class="waves-effect waves-light btn waves-effect waves-light btn blue darken-4" href="<?php echo site_url('site/viewdepartment'); ?>">Back</a>
<a class="waves-effect waves-light btn pleft waves-effect waves-light btn blue darken-4" href="<?php echo base_url('uploads/department.csv');?>"><i class='material-icons propericon'>system_update_alt</i>Download CSV Format</a>
</div>
	</div>
        </div>
    </div>
</div>
   <div class="row">
    <div class="col s12">
       

    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/uploaddepartmentcsvsubmit');?>" enctype="multipart/form-data">

       	<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>Department CSV File</span>
					<input name="file" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('file');?>">
				</div>
			</div>
		</div>
       
        <div class="row">
            <div class="col s12 m6">
                    <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewdepartment'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
        </div>
            </div>
        </div>

    </form>
</div>


<!--
<div class=" row" style="padding:1% 0;">
	<div class="col-md-9">
		<div class=" pull-right col-md-1 createbtn" ><a href="<?php echo site_url('site/viewdepartment'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a> </div>
	</div>
	<div class="col-md-3">
	
		<a class="btn btn-default"  href="<?php echo base_url('uploads/department.csv'); ?>"><i class="icon-upload"></i>Download CSV Format</a> &nbsp; 
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Upload Department CSV
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/uploaddepartmentcsvsubmit');?>" enctype= "multipart/form-data">
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Department CSV File</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="file">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewdepartment'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>-->
