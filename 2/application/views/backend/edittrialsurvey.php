<div class="panel-body">
    <div class="row">
        <div class="col s12">
            <h5 class="padleft">Mini Survey</h5>
        </div>
    </div>
</div>

<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editsurveysubmit');?>">

        <div class="row">
            <!--           // questions1   -> $option[0]-->

            <div class="input-field col s12 m6">

                <input type="text" name="surveyname" value="<?php echo $before['survey']->conclusion;?>" required>
                <input type="hidden" name="surveyid" value="<?php echo $before['survey']->id;?>">
                <label>Name Your Survey</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6">
                <!--                <input type="text" name="surveydescription" value="<?php echo $before['survey']->conclusionsuggestion;?>">-->
                <textarea id="textarea1" name="surveydescription" class="materialize-textarea" value="<?php echo $before['survey']->conclusionsuggestion;?>"><?php echo $before['survey']->conclusionsuggestion;?></textarea>
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
                        <input type="text" name="question1" value="<?php echo $before['question'][0]->content;?>" id="question1" onkeypress="checkforquestion('question1','type1','required1','option1')">
                        <input type="hidden" name="question1id" value="<?php echo $before['question'][0]->id;?>">
                        <label>Question 1</label>
                    </div>
                    <div class="input-field col s3 m3" onchange="checkforquestion('question1','type1','required1','option1')">
                        <?php echo form_dropdown("type1",$type,set_value('type',$before['question'][0]->type),"id='type1'");?>
                    </div>
                    <div class="input-field col s2 m2" onchange="checkforquestion('question1','type1','required1','option1')">
                        <?php echo form_dropdown("required1",$isrequired,set_value('required1',$before['question'][0]->isrequired),"id='required1'")?>
                    </div>
                </div>
                <!--                question 1 option start-->
                <div class="option1">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option1" value="<?php echo $option[0]->options[0]->title;?>" id="option1">
                            <input type="hidden" name="option1id" value="<?php echo $option[0]->options[0]->id;?>" id="option1id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option1')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option1','option2')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option2">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option2" value="<?php echo $option[0]->options[1]->title;?>" id="option2">
                            <input type="hidden" name="option2id" value="<?php echo $option[0]->options[1]->id;?>" id="option2id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option2')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option2','option3')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option3">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option3" value="<?php echo $option[0]->options[2]->title;?>" id="option3">
                            <input type="hidden" name="option3id" value="<?php echo $option[0]->options[2]->id;?>" id="option3id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option3')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option3','option4')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option4">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option4" value="<?php echo $option[0]->options[3]->title;?>" id="option4">
                            <input type="hidden" name="option4id" value="<?php echo $option[0]->options[3]->id;?>" id="option4id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option4')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option4','option5')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option5">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option5" value="<?php echo $option[0]->options[4]->title;?>" id="option5">
                            <input type="hidden" name="option5id" value="<?php echo $option[0]->options[4]->id;?>" id="option5id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option5')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option5','option6')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option6">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option6" value="<?php echo $option[0]->options[5]->title;?>" id="option6">
                            <input type="hidden" name="option6id" value="<?php echo $option[0]->options[5]->id;?>" id="option6id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option6')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option6','option7')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option7">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option7" value="<?php echo $option[0]->options[6]->title;?>" id="option7">
                            <input type="hidden" name="option7id" value="<?php echo $option[0]->options[6]->id;?>" id="option7id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option7')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option7','option8')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option8">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option8" value="<?php echo $option[0]->options[7]->title;?>" id="option8">
                            <input type="hidden" name="option8id" value="<?php echo $option[0]->options[7]->id;?>" id="option8id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option8')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option8','option9')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option9">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option9" value="<?php echo $option[0]->options[8]->title;?>" id="option9">
                            <input type="hidden" name="option9id" value="<?php echo $option[0]->options[8]->id;?>" id="option9id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option9')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option9','option10')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option10">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option10" value="<?php echo $option[0]->options[9]->title;?>" id="option10">
                            <input type="hidden" name="option10id" value="<?php echo $option[0]->options[9]->id;?>" id="option10id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option10')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option10','option11')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                question 1 option end-->
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question2" value="<?php echo $before['question'][1]->content;?>" required>
                        <input type="hidden" name="question2id" value="<?php echo $before['question'][1]->id;?>">
                        <label>Question 2</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type2",$type,set_value('type',$before['question'][1]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required2",$isrequired,set_value('required2',$before['question'][1]->isrequired))?>
                    </div>
                </div>
                <div class="option11">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option11" value="<?php echo $option[1]->options[0]->title;?>" id="option11">
                            <input type="hidden" name="option11id" value="<?php echo $option[1]->options[0]->id;?>" id="option11id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option11')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option11','option12')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option12">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option12" value="<?php echo $option[1]->options[1]->title;?>" id="option12">
                            <input type="hidden" name="option12id" value="<?php echo $option[1]->options[1]->id;?>" id="option12id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option12')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option12','option13')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option13">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option13" value="<?php echo $option[1]->options[2]->title;?>" id="option13">
                            <input type="hidden" name="option13id" value="<?php echo $option[1]->options[2]->id;?>" id="option13id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option13')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option13','option14')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option14">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option14" value="<?php echo $option[1]->options[3]->title;?>" id="option14">
                            <input type="hidden" name="option14id" value="<?php echo $option[1]->options[3]->id;?>" id="option14id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option14')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option14','option15')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option15">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option15" value="<?php echo $option[1]->options[4]->title;?>" id="option15">
                            <input type="hidden" name="option15id" value="<?php echo $option[1]->options[4]->id;?>" id="option15id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option15')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option15','option16')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option16">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option16" value="<?php echo $option[1]->options[5]->title;?>" id="option16">
                            <input type="hidden" name="option16id" value="<?php echo $option[1]->options[5]->id;?>" id="option16id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option16')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option16','option17')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option17">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option17" value="<?php echo $option[1]->options[6]->title;?>" id="option17">
                            <input type="hidden" name="option17id" value="<?php echo $option[1]->options[6]->id;?>" id="option17id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option17')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option17','option18')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option18">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option18" value="<?php echo $option[1]->options[7]->title;?>" id="option18">
                            <input type="hidden" name="option18id" value="<?php echo $option[1]->options[7]->id;?>" id="option18id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option18')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option18','option19')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option19">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option19" value="<?php echo $option[1]->options[8]->title;?>" id="option19">
                            <input type="hidden" name="option19id" value="<?php echo $option[1]->options[8]->id;?>" id="option19id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option19')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option19','option20')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option20">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option20" value="<?php echo $option[1]->options[9]->title;?>" id="option20">
                            <input type="hidden" name="option20id" value="<?php echo $option[1]->options[9]->id;?>" id="option20id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option20')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option20','option21')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question3" value="<?php echo $before['question'][2]->content;?>" required>
                        <input type="hidden" name="question3id" value="<?php echo $before['question'][2]->id;?>">
                        <label>Question 3</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type3",$type,set_value('type',$before['question'][2]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required3",$isrequired,set_value('required3',$before['question'][2]->isrequired))?>
                    </div>
                </div>
                <div class="option21">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option21" value="<?php print_r($option[2]->options[0]->title);?>" id="option21">
                            <input type="hidden" name="option21id" value="<?php echo $option[2]->options[0]->id;?>" id="option21id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option21')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option21','option22')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option22">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option22" value="<?php echo $option[2]->options[1]->title;?>" id="option22">
                            <input type="hidden" name="option22id" value="<?php echo $option[2]->options[1]->id;?>" id="option22id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option22')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option22','option23')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option23">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option23" value="<?php echo $option[2]->options[2]->title;?>" id="option23">
                            <input type="hidden" name="option23id" value="<?php echo $option[2]->options[2]->id;?>" id="option23id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option23')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option23','option24')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option24">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option24" value="<?php echo $option[2]->options[3]->title;?>" id="option24">
                            <input type="hidden" name="option24id" value="<?php echo $option[2]->options[3]->id;?>" id="option24id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option24')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option24','option25')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option25">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option25" value="<?php echo $option[2]->options[4]->title;?>" id="option25">
                            <input type="hidden" name="option25id" value="<?php echo $option[2]->options[4]->id;?>" id="option25id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option25')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option25','option26')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option26">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option26" value="<?php echo $option[2]->options[5]->title;?>" id="option26">
                            <input type="hidden" name="option26id" value="<?php echo $option[2]->options[5]->id;?>" id="option26id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option26')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option26','option27')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option27">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option27" value="<?php echo $option[2]->options[6]->title;?>" id="option27">
                            <input type="hidden" name="option27id" value="<?php echo $option[2]->options[6]->id;?>" id="option27id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option27')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option27','option28')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option28">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option28" value="<?php echo $option[2]->options[7]->title;?>" id="option28">
                            <input type="hidden" name="option28id" value="<?php echo $option[2]->options[7]->id;?>" id="option28id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option28')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option28','option29')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option29">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option29" value="<?php echo $option[2]->options[8]->title;?>" id="option29">
                            <input type="hidden" name="option29id" value="<?php echo $option[2]->options[8]->id;?>" id="option29id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option29')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option29','option30')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option30">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option30" value="<?php echo $option[2]->options[9]->title;?>" id="option30">
                            <input type="hidden" name="option30id" value="<?php echo $option[2]->options[9]->id;?>" id="option30id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option30')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option30','option0')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question4" value="<?php echo $before['question'][3]->content;?>" required>
                        <input type="hidden" name="question4id" value="<?php echo $before['question'][3]->id;?>">
                        <label>Question 4</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type4",$type,set_value('type',$before['question'][3]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required4",$isrequired,set_value('required4',$before['question'][3]->isrequired))?>
                    </div>
                </div>
                <div class="option31">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option31" value="<?php echo $option[3]->options[0]->title;?>" id="option31">
                            <input type="hidden" name="option31id" value="<?php echo $option[3]->options[0]->id;?>" id="option31id">
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
                            <input type="text" name="option32" value="<?php echo $option[3]->options[1]->title;?>" id="option32">
                            <input type="hidden" name="option32id" value="<?php echo $option[3]->options[1]->id;?>" id="option32id">
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
                            <input type="text" name="option33" value="<?php echo $option[3]->options[2]->title;?>" id="option33">
                            <input type="hidden" name="option33id" value="<?php echo $option[3]->options[2]->id;?>" id="option33id">
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
                            <input type="text" name="option34" value="<?php echo $option[3]->options[3]->title;?>" id="option34">
                            <input type="hidden" name="option34id" value="<?php echo $option[3]->options[3]->id;?>" id="option34id">
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
                            <input type="text" name="option35" value="<?php echo $option[3]->options[4]->title;?>" id="option35">
                            <input type="hidden" name="option35id" value="<?php echo $option[3]->options[4]->id;?>" id="option35id">
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
                            <input type="text" name="option36" value="<?php echo $option[3]->options[5]->title;?>" id="option36">
                            <input type="hidden" name="option36id" value="<?php echo $option[3]->options[5]->id;?>" id="option36id">
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
                            <input type="text" name="option37" value="<?php echo $option[3]->options[6]->title;?>" id="option37">
                            <input type="hidden" name="option37id" value="<?php echo $option[3]->options[6]->id;?>" id="option37id">
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
                            <input type="text" name="option38" value="<?php echo $option[3]->options[7]->title;?>" id="option38">
                            <input type="hidden" name="option38id" value="<?php echo $option[3]->options[7]->id;?>" id="option38id">
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
                            <input type="text" name="option39" value="<?php echo $option[3]->options[8]->title;?>" id="option39">
                            <input type="hidden" name="option39id" value="<?php echo $option[3]->options[8]->id;?>" id="option39id">
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
                            <input type="text" name="option40" value="<?php echo $option[3]->options[9]->title;?>" id="option40">
                            <input type="hidden" name="option40id" value="<?php echo $option[3]->options[9]->id;?>" id="option40id">
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
                        <input type="text" name="question5" value="<?php echo $before['question'][4]->content;?>" required>
                        <input type="hidden" name="question5id" value="<?php echo $before['question'][4]->id;?>">
                        <label>Question 5</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type5",$type,set_value('type',$before['question'][4]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required5",$isrequired,set_value('required5',$before['question'][4]->isrequired))?>
                    </div>
                </div>
                <div class="option41">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option41" value="<?php echo $option[4]->options[0]->title;?>" id="option41">
                            <input type="hidden" name="option41id" value="<?php echo $option[4]->options[0]->id;?>" id="option41id">
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
                            <input type="text" name="option42" value="<?php echo $option[4]->options[1]->title;?>" id="option42">
                            <input type="hidden" name="option42id" value="<?php echo $option[4]->options[1]->id;?>" id="option42id">
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
                            <input type="text" name="option43" value="<?php echo $option[4]->options[2]->title;?>" id="option43">
                            <input type="hidden" name="option43id" value="<?php echo $option[4]->options[2]->id;?>" id="option43id">
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
                            <input type="text" name="option44" value="<?php echo $option[4]->options[3]->title;?>" id="option44">
                            <input type="hidden" name="option44id" value="<?php echo $option[4]->options[3]->id;?>" id="option44id">
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
                            <input type="text" name="option45" value="<?php echo $option[4]->options[4]->title;?>" id="option45">
                            <input type="hidden" name="option45id" value="<?php echo $option[4]->options[4]->id;?>" id="option45id">
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
                            <input type="text" name="option46" value="<?php echo $option[4]->options[5]->title;?>" id="option46">
                            <input type="hidden" name="option46id" value="<?php echo $option[4]->options[5]->id;?>" id="option46id">
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
                            <input type="text" name="option47" value="<?php echo $option[4]->options[6]->title;?>" id="option47">
                            <input type="hidden" name="option47id" value="<?php echo $option[4]->options[6]->id;?>" id="option47id">
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
                            <input type="text" name="option48" value="<?php echo $option[4]->options[7]->title;?>" id="option48">
                            <input type="hidden" name="option48id" value="<?php echo $option[4]->options[7]->id;?>" id="option48id">
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
                            <input type="text" name="option49" value="<?php echo $option[4]->options[8]->title;?>" id="option49">
                            <input type="hidden" name="option49id" value="<?php echo $option[4]->options[8]->id;?>" id="option49id">
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
                            <input type="text" name="option50" value="<?php echo $option[4]->options[9]->title;?>" id="option50">
                            <input type="hidden" name="option50id" value="<?php echo $option[4]->options[9]->id;?>" id="option50id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option50')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option50','option51')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question6" value="<?php echo $before['question'][5]->content;?>" required>
                        <input type="hidden" name="question6id" value="<?php echo $before['question'][5]->id;?>">
                        <label>Question 6</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type6",$type,set_value('type',$before['question'][5]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required6",$isrequired,set_value('required6',$before['question'][5]->isrequired))?>
                    </div>
                </div>
                <div class="option51">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option51" value="<?php echo $option[5]->options[0]->title;?>" id="option51">
                            <input type="hidden" name="option51id" value="<?php echo $option[5]->options[0]->id;?>" id="option51id">
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
                            <input type="text" name="option52" value="<?php echo $option[5]->options[1]->title;?>" id="option52">
                            <input type="hidden" name="option52id" value="<?php echo $option[5]->options[1]->id;?>" id="option52id">
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
                            <input type="text" name="option53" value="<?php echo $option[5]->options[2]->title;?>" id="option53">
                            <input type="hidden" name="option53id" value="<?php echo $option[5]->options[2]->id;?>" id="option53id">
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
                            <input type="text" name="option54" value="<?php echo $option[5]->options[3]->title;?>" id="option54">
                            <input type="hidden" name="option54id" value="<?php echo $option[5]->options[3]->id;?>" id="option54id">
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
                            <input type="text" name="option55" value="<?php echo $option[5]->options[4]->title;?>" id="option55">
                            <input type="hidden" name="option55id" value="<?php echo $option[5]->options[4]->id;?>" id="option55id">
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
                            <input type="text" name="option56" value="<?php echo $option[5]->options[5]->title;?>" id="option56">
                            <input type="hidden" name="option56id" value="<?php echo $option[5]->options[5]->id;?>" id="option56id">
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
                            <input type="text" name="option57" value="<?php echo $option[5]->options[6]->title;?>" id="option57">
                            <input type="hidden" name="option57id" value="<?php echo $option[5]->options[6]->id;?>" id="option57id">
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
                            <input type="text" name="option58" value="<?php echo $option[5]->options[7]->title;?>" id="option58">
                            <input type="hidden" name="option58id" value="<?php echo $option[5]->options[7]->id;?>" id="option58id">
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
                            <input type="text" name="option59" value="<?php echo $option[5]->options[8]->title;?>" id="option59">
                            <input type="hidden" name="option59id" value="<?php echo $option[5]->options[8]->id;?>" id="option59id">
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
                            <input type="text" name="option60" value="<?php echo $option[5]->options[9]->title;?>" id="option60">
                            <input type="hidden" name="option60id" value="<?php echo $option[5]->options[9]->id;?>" id="option60id">
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
                        <input type="text" name="question7" value="<?php echo $before['question'][6]->content;?>" required>
                        <input type="hidden" name="question7id" value="<?php echo $before['question'][6]->id;?>">
                        <label>Question 7</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type7",$type,set_value('type',$before['question'][6]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required7",$isrequired,set_value('required7',$before['question'][6]->isrequired))?>
                    </div>
                </div>
                <div class="option61">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option61" value="<?php echo $option[6]->options[0]->title;?>" id="option61">
                            <input type="hidden" name="option61id" value="<?php echo $option[6]->options[0]->id;?>" id="option61id">
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
                            <input type="text" name="option62" value="<?php echo $option[6]->options[1]->title;?>" id="option62">
                            <input type="hidden" name="option62id" value="<?php echo $option[6]->options[1]->id;?>" id="option62id">
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
                            <input type="text" name="option63" value="<?php echo $option[6]->options[2]->title;?>" id="option63">
                            <input type="hidden" name="option63id" value="<?php echo $option[6]->options[2]->id;?>" id="option63id">
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
                            <input type="text" name="option64" value="<?php echo $option[6]->options[3]->title;?>" id="option64">
                            <input type="hidden" name="option64id" value="<?php echo $option[6]->options[3]->id;?>" id="option64id">
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
                            <input type="text" name="option65" value="<?php echo $option[6]->options[4]->title;?>" id="option65">
                            <input type="hidden" name="option65id" value="<?php echo $option[6]->options[4]->id;?>" id="option65id">
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
                            <input type="text" name="option66" value="<?php echo $option[6]->options[5]->title;?>" id="option66">
                            <input type="hidden" name="option66id" value="<?php echo $option[6]->options[5]->id;?>" id="option66id">
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
                            <input type="text" name="option67" value="<?php echo $option[6]->options[6]->title;?>" id="option67">
                            <input type="hidden" name="option67id" value="<?php echo $option[6]->options[6]->id;?>" id="option67id">
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
                            <input type="text" name="option68" value="<?php echo $option[6]->options[7]->title;?>" id="option68">
                            <input type="hidden" name="option68id" value="<?php echo $option[6]->options[7]->id;?>" id="option68id">
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
                            <input type="text" name="option69" value="<?php echo $option[6]->options[8]->title;?>" id="option69">
                            <input type="hidden" name="option69id" value="<?php echo $option[6]->options[8]->id;?>" id="option69id">
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
                            <input type="text" name="option70" value="<?php echo $option[6]->options[9]->title;?>" id="option70">
                            <input type="hidden" name="option70id" value="<?php echo $option[6]->options[9]->id;?>" id="option70id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option70')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option70','option71')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question8" value="<?php echo $before['question'][7]->content;?>" required>
                        <input type="hidden" name="question8id" value="<?php echo $before['question'][7]->id;?>">
                        <label>Question 8</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type8",$type,set_value('type',$before['question'][7]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required8",$isrequired,set_value('required8',$before['question'][7]->isrequired))?>
                    </div>
                </div>
                <div class="option71">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option71" value="<?php echo $option[7]->options[0]->title;?>" id="option71">
                            <input type="hidden" name="option71id" value="<?php echo $option[7]->options[0]->id;?>" id="option71id">
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
                            <input type="text" name="option72" value="<?php echo $option[7]->options[1]->title;?>" id="option72">
                            <input type="hidden" name="option72id" value="<?php echo $option[7]->options[1]->id;?>" id="option72id">
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
                            <input type="text" name="option73" value="<?php echo $option[7]->options[2]->title;?>" id="option73">
                            <input type="hidden" name="option73id" value="<?php echo $option[7]->options[2]->id;?>" id="option73id">
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
                            <input type="text" name="option74" value="<?php echo $option[7]->options[3]->title;?>" id="option74">
                            <input type="hidden" name="option74id" value="<?php echo $option[7]->options[3]->id;?>" id="option74id">
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
                            <input type="text" name="option75" value="<?php echo $option[7]->options[4]->title;?>" id="option75">
                            <input type="hidden" name="option75id" value="<?php echo $option[7]->options[4]->id;?>" id="option75id">
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
                            <input type="text" name="option76" value="<?php echo $option[7]->options[5]->title;?>" id="option76">
                            <input type="hidden" name="option76id" value="<?php echo $option[7]->options[5]->id;?>" id="option76id">
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
                            <input type="text" name="option77" value="<?php echo $option[7]->options[6]->title;?>" id="option77">
                            <input type="hidden" name="option77id" value="<?php echo $option[7]->options[6]->id;?>" id="option77id">
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
                            <input type="text" name="option78" value="<?php echo $option[7]->options[7]->title;?>" id="option78">
                            <input type="hidden" name="option78id" value="<?php echo $option[7]->options[7]->id;?>" id="option78id">
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
                            <input type="text" name="option79" value="<?php echo $option[7]->options[8]->title;?>" id="option79">
                            <input type="hidden" name="option79id" value="<?php echo $option[7]->options[8]->id;?>" id="option79id">
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
                            <input type="text" name="option80" value="<?php echo $option[7]->options[9]->title;?>" id="option80">
                            <input type="hidden" name="option80id" value="<?php echo $option[7]->options[9]->id;?>" id="option80id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option80')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option80','option81')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question9" value="<?php echo $before['question'][8]->content;?>" required>
                        <input type="hidden" name="question9id" value="<?php echo $before['question'][8]->id;?>">
                        <label>Question 9</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type9",$type,set_value('type',$before['question'][8]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required9",$isrequired,set_value('required9',$before['question'][8]->isrequired))?>
                    </div>
                </div>
                <div class="option81">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option81" value="<?php echo $option[8]->options[0]->title;?>" id="option81">
                            <input type="hidden" name="option81id" value="<?php echo $option[8]->options[0]->id;?>" id="option81id">
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
                            <input type="text" name="option82" value="<?php echo $option[8]->options[1]->title;?>" id="option82">
                            <input type="hidden" name="option82id" value="<?php echo $option[8]->options[1]->id;?>" id="option82id">
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
                            <input type="text" name="option83" value="<?php echo $option[8]->options[2]->title;?>" id="option83">
                            <input type="hidden" name="option83id" value="<?php echo $option[8]->options[2]->id;?>" id="option83id">
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
                            <input type="text" name="option84" value="<?php echo $option[8]->options[3]->title;?>" id="option84">
                            <input type="hidden" name="option84id" value="<?php echo $option[8]->options[3]->id;?>" id="option84id">
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
                            <input type="text" name="option85" value="<?php echo $option[8]->options[4]->title;?>" id="option85">
                            <input type="hidden" name="option85id" value="<?php echo $option[8]->options[4]->id;?>" id="option85id">
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
                            <input type="text" name="option86" value="<?php echo $option[8]->options[5]->title;?>" id="option86">
                            <input type="hidden" name="option86id" value="<?php echo $option[8]->options[5]->id;?>" id="option86id">
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
                            <input type="text" name="option87" value="<?php echo $option[8]->options[6]->title;?>" id="option87">
                            <input type="hidden" name="option87id" value="<?php echo $option[8]->options[6]->id;?>" id="option87id">
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
                            <input type="text" name="option88" value="<?php echo $option[8]->options[7]->title;?>" id="option88">
                            <input type="hidden" name="option88id" value="<?php echo $option[8]->options[7]->id;?>" id="option88id">
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
                            <input type="text" name="option89" value="<?php echo $option[8]->options[8]->title;?>" id="option89">
                            <input type="hidden" name="option89id" value="<?php echo $option[8]->options[8]->id;?>" id="option89id">
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
                            <input type="text" name="option90" value="<?php echo $option[8]->options[9]->title;?>" id="option90">
                            <input type="hidden" name="option90id" value="<?php echo $option[8]->options[9]->id;?>" id="option90id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option90')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option90','option91')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-repeater">
                <div class="row bold">
                    <div class="input-field col s5 m5">
                        <input type="text" name="question10" value="<?php echo $before['question'][9]->content;?>" required>
                        <input type="hidden" name="question10id" value="<?php echo $before['question'][9]->id;?>">
                        <label>Question 10</label>
                    </div>
                    <div class="input-field col s3 m3">
                        <?php echo form_dropdown("type10",$type,set_value('type',$before['question'][9]->type));?>
                    </div>
                    <div class="input-field col s2 m2">
                        <?php echo form_dropdown("required10",$isrequired,set_value('required10',$before['question'][9]->isrequired))?>
                    </div>
                </div>
                <div class="option91">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option91" value="<?php echo $option[9]->options[0]->title;?>" id="option91">
                            <input type="hidden" name="option91id" value="<?php echo $option[9]->options[0]->id;?>" id="option91id">
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
                            <input type="text" name="option92" value="<?php echo $option[9]->options[1]->title;?>" id="option92">
                            <input type="hidden" name="option92id" value="<?php echo $option[9]->options[1]->id;?>" id="option92id">
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
                            <input type="text" name="option93" value="<?php echo $option[9]->options[2]->title;?>" id="option93">
                            <input type="hidden" name="option93id" value="<?php echo $option[9]->options[2]->id;?>" id="option93id">
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
                            <input type="text" name="option94" value="<?php echo $option[9]->options[3]->title;?>" id="option94">
                            <input type="hidden" name="option94id" value="<?php echo $option[9]->options[3]->id;?>" id="option94id">
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
                            <input type="text" name="option95" value="<?php echo $option[9]->options[4]->title;?>" id="option95">
                            <input type="hidden" name="option95id" value="<?php echo $option[9]->options[4]->id;?>" id="option95id">
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
                            <input type="text" name="option96" value="<?php echo $option[9]->options[5]->title;?>" id="option96">
                            <input type="hidden" name="option96id" value="<?php echo $option[9]->options[5]->id;?>" id="option96id">
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
                            <input type="text" name="option97" value="<?php echo $option[9]->options[6]->title;?>" id="option97">
                            <input type="hidden" name="option97id" value="<?php echo $option[9]->options[6]->id;?>" id="option97id">
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
                            <input type="text" name="option98" value="<?php echo $option[9]->options[7]->title;?>" id="option98">
                            <input type="hidden" name="option98id" value="<?php echo $option[9]->options[7]->id;?>" id="option98id">
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
                            <input type="text" name="option99" value="<?php echo $option[9]->options[8]->title;?>" id="option99">
                            <input type="hidden" name="option99id" value="<?php echo $option[9]->options[8]->id;?>" id="option99id">
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
                            <input type="text" name="option100" value="<?php echo $option[9]->options[9]->title;?>" id="option100">
                            <input type="hidden" name="option100id" value="<?php echo $option[9]->options[9]->id;?>" id="option100id">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option100')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option100','option101')" class="btn btn-xs less-pad">
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
                <textarea id="textarea1" name="message" class="materialize-textarea" value="<?php echo $before['survey']->message;?>"><?php echo $before['survey']->message;?></textarea>
            </div>
        </div>

        <div class="text-center middle">
            <button class="btn waves-effect waves-light" type="submit" name="action">Save</button>
            <!--     <button class="btn waves-effect waves-light" type="submit" name="action">Cancel</button>-->
            <a href="<?php echo site_url("site/viewconclusionfinalsuggestion"); ?>" class="btn waves-effect waves-light">Cancel</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        for (var i = 1; i <= 100; i++) {
            $(".option" + i).hide();
        }
        $(".add1").hide();
        var url = window.location.href;
        var id = /id=(\d+)/.exec(url)[1];
        $.get("<?php echo base_url(); ?>index.php/site/getsinglesurveydata?id=" + id, function(data, status) {
            var data = $.parseJSON(data);
            console.log(data);
            // show question 1 option
            for (var j = 1; j <= data[0].options.length; j++) {
                if (data[0].type != 1 && data[0].type != 2) {
                    $(".option" + j).show();
                }

            }
            var k = 11;
            for (var j = 1; j <= data[1].options.length; j++) {
                if (data[1].type != 1 && data[1].type != 2) {
                    $(".option" + k).show();
                }
                k++;
            }
            var a = 21;
            for (var j = 1; j <= data[2].options.length; j++) {
                if (data[2].type != 1 && data[2].type != 2) {
                    $(".option" + a).show();
                    a++;
                }
            }
            var b = 31;
            for (var j = 1; j <= data[3].options.length; j++) {
                if (data[3].type != 1 && data[3].type != 2) {
                    $(".option" + b).show();
                    b++;
                }
            }
            var c = 41;
            for (var j = 1; j <= data[4].options.length; j++) {
                if (data[4].type != 1 && data[4].type != 2) {
                    $(".option" + c).show();
                    c++;
                }
            }
            var d = 51;
            for (var j = 1; j <= data[5].options.length; j++) {
                if (data[5].type != 1 && data[5].type != 2) {
                    $(".option" + d).show();
                    d++;
                }
            }
            var e = 61;
            for (var j = 1; j <= data[6].options.length; j++) {
                if (data[6].type != 1 && data[6].type != 2) {
                    $(".option" + e).show();
                    e++;
                }
            }
            var f = 71;
            for (var j = 1; j <= data[7].options.length; j++) {
                if (data[7].type != 1 && data[7].type != 2) {
                    $(".option" + f).show();
                    f++;
                }
            }
            var h = 81;
            for (var j = 1; j <= data[8].options.length; j++) {
                if (data[8].type != 1 && data[8].type != 2) {
                    $(".option" + h).show();
                    h++;
                }
            }
            var l = 91;
            for (var j = 1; j <= data[9].options.length; j++) {
                if (data[9].type != 1 && data[9].type != 2) {
                    $(".option" + l).show();
                    l++;
                }
            }

        });

    });

    // if question is present show option 1
    function checkforquestion(question, type, required, option) {
        console.log($("#" + question).val());
        if ($("#" + question).val() != '' && $("#" + type).val() != '' && $("#" + required).val() != '' && $("#" + type).val() != 1 && $("#" + type).val() != 2) {
            $("." + option).show();
        } else {
            $("." + option).hide();
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
        var element = document.getElementById(option + "id");
        console.log(element.value);
        var optionid = option.substring(6);
        console.log(optionid);
        $("." + option).hide();
        $.ajax({
            url: '<?php echo site_url("site/deleteoption");?>',
            data: {
                id: element.value
            },
            type: 'post',
            success: function(output) {
                console.log("done");
            }
        });
        $('#' + option).val('');
    }

</script>
