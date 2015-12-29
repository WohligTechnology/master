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
                                        <p>Driving Force</p>

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
                                        <p>Interpersonal Relationships at Work</p>

                                
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
                                        <p>Sens of Ownership</p>

                                
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
                                        <p>Job Security</p>

                                
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
                                        <p>Pillar 6</p>

                                
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
                                        <p>Pillar 7</p>

                                
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
                                        <p>Pillar 8</p>

                                
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
                                        <p>Pillar 9</p>

                                
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
                                        <p>Pillar 10</p>

                                
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

<!--
    <script>
        $(document).ready(function () {
            $('#submit1').click(function () {
                console.log("dfgr");
              var $range=$("#range").val();
                console.log($range);
              var $range1=$("#range1").val();
                console.log($range1);
              var $range2=$("#range2").val();
                console.log($range2);
              var $range3=$("#range3").val();
                console.log($range3);
              var $range4=$("#range4").val();
                console.log($range4);
              var $range5=$("#range5").val();
                console.log($range5);
              var $range6=$("#range6").val();
                console.log($range6);
              var $range7=$("#range7").val();
                console.log($range7);
              var $range8=$("#range8").val();
                console.log($range8);
              var $range9=$("#range9").val();
                console.log($range9);
              var new_base_url = "<?php echo site_url(); ?>";
            
              // GET METHOD AJAX CALL
//                $.get(new_base_url + '/site/getweightage', {
//                                range: $range,
//                                range1: $range1,
//                                range2: $range2,
//                                range3: $range3,
//                                range4: $range4,
//                                range5: $range5,
//                                range6: $range6,
//                                range7: $range7,
//                                range8: $range8,
//                                range9: $range9
//                                
//                            }, function (data) {
//                                                console.log("dsajgyrh");
//                                                console.log(data);
//                              
//                            });
                $.get( new_base_url + '/site/getweightage', { range: $range, range1: $range1,range2: $range2, range3: $range3, range4: $range4, range5: $range5, range6: $range6, range7: $range7, range8: $range8, range9: $range9 } )
  .done(function( data ) {
    alert( "Done" );
  });
            });
        });
    </script>
-->
    <script src="<?php echo base_url('assets').'/';?>js/index.js"></script>

</body>

</html>