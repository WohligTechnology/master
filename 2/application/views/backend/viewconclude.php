<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15 capitalize">Suggestion</h4>
    </div>
</div>
<div class="row">
    <form class='col s12' method='post' action='<?php echo site_url("site/editconclusionsuggestionsubmit");?>' enctype='multipart/form-data'>
        <div class=" row" style="display:none">
            <div class=" input-field col s12 m6">
<!--                <?php echo form_dropdown("conclusion",$conclusion,set_value('conclusion',$this->input->get('id')));?>-->
                  <input type="hidden" id="conclusion" name="conclusion" value="<?php echo set_value('conclusion',$this->input->get('id'));?>">
                    <label for="Conclusion">Conclusion</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <label>Suggestion</label>
                <textarea name="suggestion" placeholder="Enter text ..."><?php echo set_value( 'suggestion',$before->suggestion);?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
                
            </div>
        </div>
    </form>
</div>

<div class="">
    <?php
  // print_r($conclusion);
  ?>

        <table class="bordered responsive-table">
            <thead>
                <tr>
                    <th>
                        Question
                    </th>
                    <th>
                        Weight
                    </th>
                </tr>
            </thead>
            <tbody>
                <!--                        for each for Question-->
                <?php  foreach($conclusion as $question) { ?>
                    <tr>
                        <td>
                            <?php echo $question->text;?>
                        </td>
                        <td>
                            <div>
                                <?php echo $question->avgquestionweight->avgquestionweight;?>
                            </div>
                            <table class="bordered responsive-table">
                                <thead>
                                    <tr>
                                        <th>
                                            Options
                                        </th>
                                        <th>
                                            Weight
                                        </th>
                                        <th>
                                            Average
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--                        for each for option-->
                                    <?php  foreach($question->options as $option) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $option->optiontext;?>
                                            </td>
                                            <td>
                                                Weight(
                                                <?php echo $option->weight;?>%)
                                            </td>
                                            <td>
                                                Average(
                                                <?php echo $question->avgweight->avgweight;?>%)
                                            </td>
                                        </tr>
                                        <?php }?>
                                            <!--                        for each for option ends-->
                                </tbody>
                            </table>
                        </td>


                    </tr>
                    <!--                        for each for  Question Ends-->
                    <?php }?>
            </tbody>
        </table>


        <!--// OPTIONS-->
        <table class="bordered responsive-table">
            <thead>
                <tr>
                    <th>
                        QUESTION 1 (OPTIONS)
                    </th>
                    <th>
                        QUESTION 2 (OPTIONS)
                    </th>
                    <th>
                        COUNT
                    </th>
                </tr>
            </thead>
            <tbody>
                <!--                        for each for option-->
                <?php foreach($optiondata as $getoption){?>
                    <tr>
                        <td>
                            <?php echo $getoption->option1?>
                        </td>
                        <td>
                            <?php echo $getoption->option2?>
                        </td>
                        <td>
                            <?php echo $getoption->countuser?>
                        </td>
                    </tr>
                    <?php }?>
                        <!--                        for each for option ends-->
            </tbody>
        </table>
</div>
