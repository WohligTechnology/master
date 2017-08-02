<div class="row">
    <div class="col s12"><div class="row">

            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch('Options');?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="image">Image</th>
                            <th data-field="text">Text</th>
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
        if(resultrow.representation==0){
        resultrow.representation="Pictorial";
        }
        else if(resultrow.representation==1){
        resultrow.representation="Text";
        }
          var image = "<a href='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' class='fancybox' ><img src='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' height='80px'></a>";
                if (resultrow.image == "") {
                    image = "No Receipt Available";
                }
        return "<tr><td>" + resultrow.id + "</td><td>" + image + "</td><td>" + resultrow.text + "</td><td></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>
