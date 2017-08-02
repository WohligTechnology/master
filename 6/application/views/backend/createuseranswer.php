<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Create User Answer</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createuseranswersubmit');?>" enctype="multipart/form-data">

        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown( 'user', $user, set_value( 'user')); ?>
                    <label>User</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown( 'pillar', $pillar, set_value( 'pillar'),'id="pillarid"'); ?>
                    <label>Pillar</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown( 'test', $test, set_value( 'test'), 'id="testid"'); ?>
                    <label>Test</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <select name="question" id="question">
                    <option value="">SELECT VALUE</option>
                </select>
                <label>Question</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <select name="option" id="option">
                    <option value="">SELECT VALUE</option>
                </select>
                <label>Option</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6">
                <label for="order">Order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order');?>">
            </div>
        </div>



        <div class="row">
            <div class="col s12 m6">
                <div class=" form-group">
                    <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                    <a href="<?php echo site_url('site/viewuseranswer'); ?>" class="btn btn-secondary waves-effect waves-light  red">Cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>

<script>
    //questions
    function populate(data, $select, value) {
        var $forquestion = $("select[name=question]");
        console.log(data);
        console.log("in question");
        $forquestion.html("");
//        $select.append("<option value=''>SELECT A VALUE</option>");
        for (var i = 0; i < data.length; i++) {
            
            $forquestion.append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
            $('select').material_select();
//            $("#select").append('<option value="4">another</option>')
        }
    }
    //options
    function populate1(data, $select, value) {
        var $foroption = $("select[name=option]");
        console.log(data);
        console.log("in options");
        $foroption.html("");
//        $foroption.append("<option value=''>SELECT A VALUE</option>");
        for (var i = 0; i < data.length; i++) {
            
            $foroption.append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
            $('select').material_select();
//            $("#select").append('<option value="4">another</option>')
        }
    }

    $(document).ready(function () {
        
        var $test = $("select[name=test]");
        var $question = $("select[name=question]");
        var $option = $("select[name=option]");
        var $pillar = $("select[name=pillar]");
        var new_base_url = "<?php echo site_url(); ?>";

        $test.change(function () {
            $.getJSON(new_base_url + '/site/getquestionbytest', {
                test: $("#testid").val(),
                pillar: $("#pillarid").val()
            }, function (data) {
//                console.log(data);
                populate(data, $question);
            });
        });


        $question.change(function () {
            $.getJSON(new_base_url + '/site/getoptionbyquestion', {
                question: $question.val()
            }, function (data) {
//                console.log(data);
                populate1(data, $option);
            });
        });



    });
</script>