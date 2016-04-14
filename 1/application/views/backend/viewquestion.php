<div class="row">
    <div class="col s12"><div class="row">

            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch('Questions');?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                             <th data-field="id">ID</th>
                            <th data-field="text">Text</th>
                            <th data-field="action">View Options</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
    </div>
        <?php $this->chintantable->createpagination();?>

    </div>
   

</div>
<script>
    function drawtable(resultrow) {       
        if (resultrow.noofans == 0) {
                    resultrow.noofans = "Single";
                }
                if (resultrow.noofans == 1) {
                    resultrow.noofans = "Multiple";
                }
         return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.text + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad tooltipped' href='<?php echo site_url('site/viewoptions?id=');?>" + resultrow.id + "' data-position='top' data-delay='50' data-tooltip='Edit'><i class='material-icons'>visibility</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>