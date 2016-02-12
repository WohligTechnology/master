<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Weightages</title>
    <link rel="shortcut icon" href="">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url('assets').'/';?>css/materialize.css" rel="stylesheet">
    <link href="<?php echo base_url('assets').'/';?>css/range.css" rel="stylesheet">
    <link href="<?php echo base_url('assets').'/';?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets').'/';?>css/materialize.min.css" rel="stylesheet">

    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="yellow-back">
      <form class="col s12" method="post" action="<?php echo site_url('site/getweightage');?>" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col s6 ">
                <div class="padtop">

                    <h5 class="padleft"> Weightages</h5>
                    <div class="row">

                        <div class="all-range">
                            <div class="col s10">
                                <div class="left-side">

                                    <div class="progress-bar">
                                        <p>Work Life Blend</p>

                                
                                            <div class="input-border">
                                                <p class="range-field">
                                                    <input type="range" name="range" id="range" min="0" max="100" />
                                                </p>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col s2">
                                <div class="progress-bar out-top">
                                    <output for="range" class="output"></output>
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
                                                    <input type="range" name="rangeone" id="rangeone" min="0" max="100" />
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
                                                    <input type="range" name="rangetwo" id="rangetwo" min="0" max="100" />
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
                                                    <input type="range" name="rangethree" id="rangethree" min="0" max="100" />
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
                                                    <input type="range" name="rangefour" id="rangefour" min="0" max="100" />
                                                </p>
                                            </div>
                                        </form>
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
                </div>
            </div>

            <div class="col s6 ">
                <div class="padtop">

                    <h5 class="padleft"></h5>
                    <div class="row">

                        <div class="all-range">
                            <div class="col s10">
                                <div class="left-side">

                                    <div class="progress-bar">
                                        <p>Rewards and Recognition</p>

                                
                                            <div class="input-border">
                                                <p class="range-field">
                                                    <input type="range" name="rangefive" id="rangefive" min="0" max="100" />
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
                                                    <input type="range" name="rangesix" id="rangesix" min="0" max="100" />
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
                                                    <input type="range" name="rangeseven" id="rangeseven" min="0" max="100" />
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
                                                    <input type="range" name="rangeeight" id="rangeeight" min="0" max="100" />
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
                                                    <input type="range" name="rangenine" id="rangenine" min="0" max="100" />
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
                    <?php if($checkpackage==4){?>
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
                            <a href='<?php echo site_url('site/editpillar?id=11');?>'>Edit</a>
                        </div>
                    </div>
                        <div class="input-border">
                            <p class="range-field">
                                <input type="range" name="rangeeleven" id="rangeeleven" min="0" max="100" value="<?php echo $before[10]->weight;?>"/>
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
<?php }?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="text-center">
                     <button type="submit" class="waves-effect waves-light btn blue-btn">OK</button>
<!--                    <a class="waves-effect waves-light btn blue-btn" id="submit1">OK</a>-->
                </div>
            </div>
        </div>
    </div>
    </form>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?php echo base_url('assets').'/';?>js/index.js"></script>

</body>

</html>