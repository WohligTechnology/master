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
                <table class="bordered striped responsive-table">
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
                                Weight(   <?php echo $option->weight;?>%)
                            </td>
                            <td>
                                Average( <?php echo $question->avgweight->avgweight;?>%)
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