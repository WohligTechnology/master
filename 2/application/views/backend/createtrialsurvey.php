<div class="panel-body">
    <div class="row">
        <div class="col s12">
            <h5 class="padleft">Mini Survey</h5>
        </div>
    </div>
</div>

<div class="row">
            <form class="col s12" method="post" action="<?php echo site_url('site/newsurveysubmit');?>">

        <div class="row">
            <div class="input-field col s12 m6">
                <input type="text" name="surveyname">
                <label>Name Your Survey</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6">
<!--                <input type="text" name="surveydescription">-->
                <textarea id="textarea1" name="surveydescription" class="materialize-textarea"></textarea>
                <label>Add Description</label>
            </div>
        </div>

        <div class="row mb0">
            <div class="col s12">
                <b class="brdr-bot">
           Add Questions
         </b>
            </div>
        </div>

        <div class="repeat-section">
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question1" id="question1" onkeypress="checkforquestion('question1','type1','required1','option1')">
                        <label>Question 1</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question1','type1','required1','option1')">
                        <?php echo form_dropdown("type1",$type,set_value('type')," id='type1'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question1','type1','required1','option1')">
                        <?php echo form_dropdown("required1",$isrequired,set_value('required1'),"id='required1'")?>

                    </div>
                </div>
                <div class="option1">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option1" id="option1">
                            <label>Option 1</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option1')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option1','option2')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option2">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option2" id="option2">
                            <label>Option 2</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option2')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option2','option3')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option3">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option3" id="option3">
                            <label>Option 3</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option3')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option3','option4')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option4">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option4" id="option4">
                            <label>Option 4</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option4')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option4','option5')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option5">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option5" id="option5">
                            <label>Option 5</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option5')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option5','option6')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option6">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option6" id="option6">
                            <label>Option 6</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option6')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option6','option7')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option7">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option7" id="option7">
                            <label>Option 7</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option7')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option7','option8')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option8">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option8" id="option8">
                            <label>Option 8</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option8')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option8','option9')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option9">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option9" id="option9">
                            <label>Option 9</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option9')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option9','option10')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option10">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option10" id="option10">
                            <label>Option 10</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option10')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option10','option0')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question2" id="question2" onkeypress="checkforquestion('question2','type2','required2','option11')">
                        <label>Question 2</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question2','type2','required2','option11')">
                        <?php echo form_dropdown("type2",$type,set_value('type')," id='type2'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question2','type2','required2','option11')">
                        <?php echo form_dropdown("required2",$isrequired,set_value('required2'),"id='required2'")?>
                    </div>
                </div>
                <div class="option11">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option11" id="option11">
                            <label>Option 11</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option11')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option11','option12')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option12">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option12" id="option12">
                            <label>Option 12</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option12')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option12','option13')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>

                </div>
                <div class="option13">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option13" id="option13">
                            <label>Option 13</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option13')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option13','option14')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option14">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option14" id="option14">
                            <label>Option 14</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option14')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option14','option15')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option15">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option15" id="option15">
                            <label>Option 15</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option15')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option15','option16')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option16">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option16" id="option16">
                            <label>Option 16</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option16')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option16','option17')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option17">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option17" id="option17">
                            <label>Option 17</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option17')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option17','option18')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option18">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option18" id="option18">
                            <label>Option 18</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option18')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option18','option19')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option19">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option19" id="option19">
                            <label>Option 19</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option19')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option19','option20')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option20">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option20" id="option20">
                            <label>Option 20</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option20')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option20','option0')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question3" id="question3" onkeypress="checkforquestion('question3','type3','required3','option21')">
                        <label>Question 3</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question1','type1','required1','option21')">
                        <?php echo form_dropdown("type3",$type,set_value('type')," id='type3'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question3','type3','required3','option21')">
                        <?php echo form_dropdown("required3",$isrequired,set_value('required3'),"id='required3'")?>
                    </div>
                </div>
                <div class="option21">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option21" id="option21">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option21')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option21','option22')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option22">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option22" id="option22">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option22')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option22','option23')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option23">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option23" id="option23">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option23')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option23','option24')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option24">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option24" id="option24">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option24')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option24','option25')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option25">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option25" id="option25">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option25')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option25','option26')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option26">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option26" id="option26">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option26')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option26','option27')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option27">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option27" id="option27">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option27')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option27','option28')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option28">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option28" id="option28">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option28')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option28','option29')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option29">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option29" id="option29">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option29')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option29','option30')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
                <div class="option30">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option30" id="option30">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">

                            <div onclick="hidedelete('option30')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
                            <div onclick="showoption('option30','option0')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question4" id="question4" onkeypress="checkforquestion('question4','type4','required4','option31')">
                        <label>Question 4</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question4','type4','required4','option31')">
                        <?php echo form_dropdown("type4",$type,set_value('type')," id='type4'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question4','type4','required4','option31')">
                        <?php echo form_dropdown("required4",$isrequired,set_value('required4'),"id='required4'")?>
                    </div>
                </div>
                <div class="option31">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option31" id="option31">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option31')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option31','option32')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option32">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option32" id="option32">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option32')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option32','option33')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option33">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option33" id="option33">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option33')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option33','option34')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option34">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option34" id="option34">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option34')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option34','option35')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option35">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option35" id="option35">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option35')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option35','option36')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option36">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option36" id="option36">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option36')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option36','option37')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option37">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option37" id="option37">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option37')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option37','option38')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option38">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option38" id="option38">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option38')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option38','option39')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option39">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option39" id="option39">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option39')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option39','option40')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option40">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option40" id="option40">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option40')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option40','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question5" id="question5" onkeypress="checkforquestion('question5','type5','required5','option41')">
                        <label>Question 5</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question5','type5','required5','option41')">
                        <?php echo form_dropdown("type5",$type,set_value('type')," id='type5'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question5','type5','required5','option41')">
                        <?php echo form_dropdown("required5",$isrequired,set_value('required5'),"id='required5'")?>
                    </div>
                </div>
                <div class="option41">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option41" id="option41">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option41')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option41','option42')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option42">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option42" id="option42">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option42')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option42','option43')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option43">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option43" id="option43">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option43')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option43','option44')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option44">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option44" id="option44">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option44')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option44','option45')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option45">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option45" id="option45">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option45')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option45','option46')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option46">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option46" id="option46">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option46')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option46','option47')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option47">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option47" id="option47">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option47')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option47','option48')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option48">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option48" id="option48">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option48')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option48','option49')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option49">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option49" id="option49">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option49')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option49','option50')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option50">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option50" id="option50">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option50')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option50','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question6" id="question6" onkeypress="checkforquestion('question6','type6','required6','option51')">
                        <label>Question 6</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question6','type6','required6','option51')">
                        <?php echo form_dropdown("type6",$type,set_value('type')," id='type6'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question6','type6','required6','option51')">
                        <?php echo form_dropdown("required6",$isrequired,set_value('required6'),"id='required6'")?>
                    </div>
                </div>
                <div class="option51">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option51" id="option51">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option51')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option51','option52')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option52">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option52" id="option52">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option52')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option52','option53')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option53">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option53" id="option53">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option53')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option53','option54')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option54">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option54" id="option54">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option54')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option54','option55')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option55">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option55" id="option55">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option55')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option55','option56')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option56">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option56" id="option56">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option56')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option56','option57')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option57">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option57" id="option57">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option57')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option57','option58')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option58">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option58" id="option58">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option58')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option58','option59')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option59">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option59" id="option59">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option59')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option59','option60')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option60">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option60" id="option60">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option60')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option60','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question7" id="question7" onkeypress="checkforquestion('question7','type7','required7','option61')">
                        <label>Question 7</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question7','type7','required7','option61')">
                        <?php echo form_dropdown("type7",$type,set_value('type')," id='type7'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question7','type7','required7','option61')">
                        <?php echo form_dropdown("required7",$isrequired,set_value('required7'),"id='required7'")?>
                    </div>
                </div>
                <div class="option61">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option61" id="option61">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option61')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option61','option62')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option62">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option62" id="option62">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option62')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option62','option63')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option63">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option63" id="option63">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option63')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option63','option64')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option64">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option64" id="option64">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option64')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option64','option65')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option65">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option65" id="option65">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option65')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option65','option66')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option66">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option66" id="option66">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option66')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option66','option67')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option67">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option67" id="option67">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option67')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option67','option68')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option68">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option68" id="option68">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option68')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option68','option69')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option69">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option69" id="option69">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option69')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option69','option70')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option70">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option70" id="option70">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option70')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option70','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question8" id="question8" onkeypress="checkforquestion('question8','type8','required8','option71')">
                        <label>Question 8</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question8','type8','required8','option71')">
                        <?php echo form_dropdown("type8",$type,set_value('type')," id='type8'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question8','type8','required8','option71')">
                        <?php echo form_dropdown("required8",$isrequired,set_value('required8'),"id='required8'")?>
                    </div>
                </div>
                <div class="option71">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option71" id="option71">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option71')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option71','option72')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option72">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option72" id="option72">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option72')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option72','option73')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option73">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option73" id="option73">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option73')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option73','option74')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option74">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option74" id="option74">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option74')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option74','option75')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option75">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option75" id="option75">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option75')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option75','option76')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option76">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option76" id="option76">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option76')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option76','option77')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option77">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option77" id="option77">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option77')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option77','option78')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option78">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option78" id="option78">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option78')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option78','option79')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option79">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option79" id="option79">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option79')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option79','option80')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option80">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option80" id="option80">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option80')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option80','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question9" id="question9" onkeypress="checkforquestion('question9','type9','required9','option81')">
                        <label>Question 9</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question9','type9','required9','option81')">
                        <?php echo form_dropdown("type9",$type,set_value('type')," id='type9'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question9','type9','required9','option81')">
                        <?php echo form_dropdown("required9",$isrequired,set_value('required9'),"id='required9'")?>
                    </div>
                </div>
                <div class="option81">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option81" id="option81">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option81')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option81','option82')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option82">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option82" id="option82">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option82')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option82','option83')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option83">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option83" id="option83">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option83')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option83','option84')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option84">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option84" id="option84">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option84')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option84','option85')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option85">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option85" id="option85">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option85')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option85','option86')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option86">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option86" id="option86">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option86')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option86','option87')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option87">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option87" id="option87">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option87')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option87','option88')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option88">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option88" id="option88">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option88')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option88','option89')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option89">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option89" id="option89">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option89')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option89','option90')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option90">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option90" id="option90">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option90')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option90','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question10" id="question10" onkeypress="checkforquestion('question10','type10','required10','option91')">
                        <label>Question 10</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question10','type10','required10','option91')">
                        <?php echo form_dropdown("type10",$type,set_value('type')," id='type10'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question10','type10','required10','option91')">
                        <?php echo form_dropdown("required10",$isrequired,set_value('required10'),"id='required10'")?>
                    </div>
                </div>

                <div class="option91">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option91" id="option91">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option91')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option91','option92')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option92">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option92" id="option92">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option92')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option92','option93')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option93">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option93" id="option93">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option93')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option93','option94')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option94">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option94" id="option94">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option94')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option94','option95')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option95">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option95" id="option95">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option95')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option95','option96')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option96">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option96" id="option96">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option96')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option96','option97')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option97">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option97" id="option97">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option97')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option97','option98')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option98">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option98" id="option98">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option98')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option98','option99')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option99">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option99" id="option99">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option99')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option99','option100')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option100">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option100" id="option100">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option100')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option100','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb0" style="display:none">
            <div class="col s12">
                <b class="brdr-bot">
           Add a Thank You Message
         </b>
            </div>
        </div>
        <div class="row" style="display:none">
            <div class="input-field col s12 m6">
<!--                <input type="text" name="message">-->
               <textarea id="textarea1" name="message" class="materialize-textarea"></textarea>
                <label>Thank you message</label>
            </div>
        </div>

        <div class="text-center middle">
            <button class="btn waves-effect waves-light" type="submit" name="action">Save</button>
            <!--     <button class="btn waves-effect waves-light" type="submit" name="action">Send</button>-->
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        for (var i = 1; i <= 100; i++) {
            $(".option" + i).hide();
        }
        $(".add1").hide();
    });

    // if question is present show option 1
    function checkforquestion(question, type, required, option) {
        // console.log($("#" + question).val());
        if ($("#" + question).val() != '' && $("#" + type).val() != '' && $("#" + required).val() != '' && $("#" + type).val() != 1 && $("#" + type).val() != 2) {
            $("." + option).show();
            // console.log("show opt");
        } else {
            $("." + option).hide();
              // console.log("hide opt");
        }
    }

    // show option option 2
    function showoption(option1, option2) {
        console.log("in show option");
        if ($("#" + option1).val() != '') {
            console.log("previous not empty");
            console.log($("#" + option1).val());
            console.log($("#" + option2).val());
            $("." + option2).show();
        } else {
            console.log("previous is empty");
            $("." + option2).hide();
        }

    }

    function hidedelete(option) {
        $("." + option).hide();
        $('#' + option).val('');
    }

</script>
