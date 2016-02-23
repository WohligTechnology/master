<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch("Department");?>
                  <div class="col s4">
		 
	</div>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">Name</th>
                            <th data-field="deptid">Dept id</th>
                            <th data-field="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <?php $this->chintantable->createpagination();?>

    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createdepartment"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a>
    </div>
    <div class="row">
    <div class="col s12">
           <a class="waves-effect waves-light btn blue darken-4 margall"  href="<?php echo site_url('site/uploaddepartmentcsv'); ?>"><i class="icon-trash"></i>Upload CSV</a> &nbsp;
        
        </div>
    </div>
     
  
  

</div>
<script>
    function drawtable(resultrow) {
    
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.deptid + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editdepartment?id=');?>" + resultrow.id + "'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletedepartment?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
        
        
    }
    generatejquery('<?php echo $base_url;?>');
</script>


<!--
<div class="row" style="padding:1% 0">
    <div class="col-md-10">
        <a class="btn btn-primary pull-right" href="<?php echo site_url(" site/createdepartment "); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
    <div class="col-md-2">

        <a class="btn btn-secondary" href="<?php echo site_url('site/uploaddepartmentcsv'); ?>"><i class="icon-trash"></i>Upload CSV</a> &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("Department List");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">Name</th>
                            <th data-field="deptid">Dept id</th>
                            <th data-field="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <?php $this->chintantable->createpagination();?>
            </div>
        </section>
        <script>
            function drawtable(resultrow) {
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.deptid + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editdepartment?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deletedepartment?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>-->
