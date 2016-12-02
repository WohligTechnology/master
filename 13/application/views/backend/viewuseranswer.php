<div class="row">
    <div class="col s12"><div class="row">

            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch('User Answers');?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="user">User</th>
                            <th data-field="pillar">Pillar</th>
                            <th data-field="order">Order</th>
                            <th data-field="timestamp">Time stamp</th>
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

</div>
<div style="position:fixed;width:100%;height:100%;left:0;top:0;background:white;z-index:1000;" class="passwordFixed">
    <div class="container">
        <form role="form" style="padding:20%;" class="passwordForm">
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control passwordOnly" id="pwd">
          </div>
          <button type="button" class="btn btn-default  waves-effect waves-light passwordSubmit" >Submit</button>
        </form>
    </div>
</div>
<script>
    function drawtable(resultrow) {
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.user + "</td><td>" + resultrow.pillar + "</td><td>" + resultrow.order + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/edituseranswer?id=');?>" + resultrow.id + "'><i class='material-icons'>mode_edit</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
    
    $(document).ready(function() {
        $(".passwordForm .passwordSubmit").click(function() {
            var enteredPassword = $(".passwordForm .passwordOnly").val();
            if(enteredPassword == "wohlig123!@#"){
                $(".passwordFixed").fadeOut(1000);
            }
        });
    });
</script>
