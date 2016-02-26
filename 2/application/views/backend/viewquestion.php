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
         return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.text + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/viewoptions?id=');?>" + resultrow.id + "'><i class='material-icons'>visibility</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>


<!--
<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url(" site/createquestion "); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("Question List");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="pillar">Pillar</th>
                            <th data-field="noofans">Number of answer</th>
                            <th data-field="order">Order</th>
                            <th data-field="timestamp">Time stamp</th>
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
                if (resultrow.noofans == 0) {
                    resultrow.noofans = "Single";
                }
                if (resultrow.noofans == 1) {
                    resultrow.noofans = "Multiple";
                }
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.pillar + "</td><td>" + resultrow.noofans + "</td><td>" + resultrow.order + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editquestion?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deletequestion?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>-->
