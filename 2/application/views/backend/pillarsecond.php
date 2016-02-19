<form method="post" action="<?php echo site_url('site/getweightageviewpillar');?>" enctype="multipart/form-data">
    <h5 class="padleft"> Weightages</h5>
    <span class="padleft">Sum of Weightage Should be equal to 100</span>
    <div class="row">
        <div class="col s6 ">
            <div class="">
                <div class="row">
                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">
                                <div class="progress-bar">
                                    <p>Work Life Blend</p>
                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="range" id="range" min="0" max="100" value="<?php echo $before[0]->weight?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="range" class="output">80</output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Employee Engagement</p>

                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangeone" id="rangeone" min="0" max="100" value="<?php echo $before[1]->weight?>" />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangeone" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Driving Force</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangetwo" id="rangetwo" min="0" max="100" value="<?php echo $before[2]->weight?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangetwo" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Health of an Individual</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangethree" id="rangethree" min="0" max="100" value="<?php echo $before[3]->weight?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangethree" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Interpersonal Relationships at Work</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangefour" id="rangefour" min="0" value="<?php echo $before[4]->weight?>" max="100" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangefour" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($checkpackage == 4) {
    ?>
                    <div class="row">
                        <div class="all-range">
                            <div class="col s10">
                                <div class="left-side">

                                    <div class="progress-bar">


                                        <p class="display-inline">
                                            <?php echo $lastpillardetail->name;?>
                                        </p>
                                        <div class="left-s">
                                            <div class="box-tp displ-inline">
                                                <a href='<?php echo site_url(' site/editpillar?id=11 ');?>'>Edit</a>
                                            </div>
                                        </div>
                                        <div class="input-border">
                                            <p class="range-field">
                                                <input type="range" name="rangeeleven" id="rangeeleven" min="0" max="100" value="<?php echo $before[10]->weight;?>" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s2">
                                <div class="progress-bar out-top">
                                    <output for="rangeeleven" class="output"></output>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
}?>
                        <div class="row">
                            <div class="all-range">
                                <div class="col s2">
                                    <div class="progress-bar out-top" style="margin:0px;">
                                        <!--                                    <output for="rangeavg" class="output">67.5</output>-->
                                        <output for="rangeavg" class="output">
                                            <span id="demo"></span>
                                        </output>
                                    </div>
                                </div>
                                <div class="col s10">
                                    <div class="left-side">
                                        <div class="progress-bar">
                                            <p class="pt7">Out Of 100% (Reach 100% to Proceed)</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
            </div>
        </div>

        <div class="col s6 ">
            <div class="">

                <h5 class="padleft"></h5>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Rewards and Recognition</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangefive" id="rangefive" min="0" value="<?php echo $before[5]->weight?>" max="100" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangefive" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Sense of Ownership</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangesix" id="rangesix" min="0" max="100" value="<?php echo $before[6]->weight;?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangesix" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Work Environment</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangeseven" id="rangeseven" min="0" max="100" value="<?php echo $before[7]->weight?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangeseven" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Job Security</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangeeight" id="rangeeight" min="0" max="100" value="<?php echo $before[8]->weight?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangeeight" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="all-range">
                        <div class="col s10">
                            <div class="left-side">

                                <div class="progress-bar">
                                    <p>Alignment</p>


                                    <div class="input-border">
                                        <p class="range-field">
                                            <input type="range" name="rangenine" id="rangenine" min="0" max="100" value="<?php echo $before[9]->weight?>" />
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col s2">
                            <div class="progress-bar out-top">
                                <output for="rangenine" class="output"></output>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col s6 text-center showok">
            <button type="submit" class="waves-effect waves-light btn blue-btn">OK</button>
        </div>
        <?php if ($checkpackage == 4) { ?>
            <div class="col s6 text-center">
                <a class="blue-btn custm-btn" href="<?php echo site_url('site/viewpillarquestion');?>">Go to Question</a>
            </div>
            <?php } ?>
    </div>

</form>

<script>
    $(document).ready(function() {


        
        var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
        
        if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        } 
        
        console.log(totalsum);
        if (totalsum != 100) {
            $(".showok").hide();
            $("#demo").text(totalsum);
        } else if (totalsum = 100) {
            $(".showok").show();
            $("#demo").text(totalsum);
        }

        $("[name=range]").on("change", function() {
            $("[for=range]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangeone]").on("change", function() {
            $("[for=rangeone]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangetwo]").on("change", function() {
            $("[for=rangetwo]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangethree]").on("change", function() {
            $("[for=rangethree]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangefour]").on("change", function() {
            $("[for=rangefour]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangefive]").on("change", function() {
            $("[for=rangefive]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangesix]").on("change", function() {
            $("[for=rangesix]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangeseven]").on("change", function() {
            $("[for=rangeseven]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangeeight]").on("change", function() {
            $("[for=rangeeight]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangenine]").on("change", function() {
            $("[for=rangenine]").val(this.value + "%");
        }).trigger("change");

        $("[name=rangeavg]").on("change", function() {
            $("[for=rangeavg]").val(this.value + "%");
        }).trigger("change");
        $("[name=rangeeleven]").on("change", function() {
            $("[for=rangeeleven]").val(this.value + "%");
        }).trigger("change");



        $("[name=range]").on("change", function() {
            console.log(document.getElementById("demo"));
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            console.log(totalsum);
              
        if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        } 
            if (totalsum != 100) {
                $(".showok").hide();
                //                document.getElementById("demo").innerHTML = totalsum;
                $("#demo").text(totalsum);
            } else if (totalsum == 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangeone]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
              
        if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        } 
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangetwo]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangethree]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangefour]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangefive]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangesix]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangeseven]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangeeight]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangenine]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });

        $("[name=rangeeleven]").on("change", function() {
            var totalsum = parseFloat($("[name=range]").val()) + parseFloat($("[name=rangeone]").val()) + parseFloat($("[name=rangetwo]").val()) + parseFloat($("[name=rangethree]").val()) + parseFloat($("[name=rangefour]").val()) + parseFloat($("[name=rangefive]").val()) + parseFloat($("[name=rangesix]").val()) + parseFloat($("[name=rangeseven]").val()) + parseFloat($("[name=rangeeight]").val()) + parseFloat($("[name=rangenine]").val());
            if($("[name=rangeeleven]").val()){
            console.log("in if");
            totalsum +=  parseFloat($("[name=rangeeleven]").val());
        }
            console.log(totalsum);
            if (totalsum != 100) {
                $(".showok").hide();
                $("#demo").text(totalsum);
            } else if (totalsum = 100) {
                $(".showok").show();
                $("#demo").text(totalsum);
            }
        });


    });

</script>
