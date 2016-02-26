<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 drawchintantable">
                <?php $this->chintantable->createsearch(" Survey Question");?>
<!--
                    <div class="row">
                        <div class="col s12 m6">   
                               <a href="<?php echo site_url("site/viewsurveyresult"); ?>" class="btn btn-secondary waves-effect waves-light red">View Results</a>
                        </div>
                    </div>
-->
                    <table class="highlight responsive-table">
                        <thead>
                            <tr>
                                <th data-field="id">Id</th>
                                 <th data-field="content">Content</th> 
                                <th data-field="type">Type</th>
<!--
                                <th data-field="starttime">Start Time</th>
                                <th data-field="endtime">End Time</th>
-->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
            </div>
        </div>
        <?php $this->chintantable->createpagination();?>
            <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createsurveyquestion "); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
    </div>
</div>
<script>
    function drawtable(resultrow) {
        if (resultrow.type == 1) {
            resultrow.type = "Text";
        } else if (resultrow.type == 2) {
            resultrow.type = "Paragraph Text";
        } else if (resultrow.type == 3) {
            resultrow.type = "Multiple Choice";
        } else if (resultrow.type == 4) {
            resultrow.type = "Checkboxes";
        } else if (resultrow.type == 5) {
            resultrow.type = "Choose Image";
        }
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.content + "</td><td>" + resultrow.type + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editsurveyquestion?id=');?>" + resultrow.id + "'><i class='material-icons'>mode_edit</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletesurveyquestion?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery("<?php echo $base_url;?>");

</script>
