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
                        <tr>
                            <td>
                                lorem ipsum dolar mandal lorem ipsum dolar mandal lorem ipsum dolar mandal lorem ipsum dolar mandal lorem ipsum dolar mandal ?
                            </td>
                            <td>
                                Weight(40%)
                            </td>
                            <td>
                                Average(30%)
                            </td>
                        </tr>
                        
                        <!--                        for each for option ends-->
                    </tbody>
                </table>
            </td>
            
            
        </tr>
        <!--                        for each for  Question Ends-->
        <?php }?>
    </tbody>
</table>