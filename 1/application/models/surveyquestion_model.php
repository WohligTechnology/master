<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class surveyquestion_model extends CI_Model
{
public function create($type,$survey,$starttime,$endtime,$content)
{
$data=array("type" => $type,"survey" => $survey,"starttime" => $starttime,"endtime" => $endtime,"content" => $content);
$query=$this->db->insert( "hq_surveyquestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyquestion")->row();
return $query;
}
function getsinglesurveyquestion($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyquestion")->row();
return $query;
}
  
public function edit($id,$type,$survey,$starttime,$endtime,$content)
{
    $data=array("type" => $type,"survey" => $survey,"starttime" => $starttime,"endtime" => $endtime,"content" => $content);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_surveyquestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_surveyquestion` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_surveyquestion` WHERE `id`='$id'")->row();
return $query;
}
public function getsurveyquestiondropdown()
{
$query=$this->db->query("SELECT * FROM `hq_surveyquestion`  ORDER BY `id` ASC")->result();
$return=array(
"" => "Choose Question"
);
foreach($query as $row)
{
  $return[$row->id]=$row->content;
}

return $return;
}
public function gettypedropdown()
{
    $return=array(
    "" => "Choose Type",
    "1" => "Text",
    "2" => "Paragraph text",
    "3" => "Multiple choice",
    "4" => "Drop Down",
    "5" => "Radio Button",
    );
    return $return;
}
    public function getisrequireddropdown()
{
    $return=array(
    "" => "Select if required",
    "1" => "Required",
    "2" => "Not Required"
    );
    return $return;
}
    public function newsurveysubmit($surveyname,$surveydescription,$question1,$question2,$question3,$question4,$question5,$question6,$question7,$question8,$question9,$question10,$type1,$type2,$type3,$type4,$type5,$type6,$type7,$type8,$type9,$type10,$required1,$required2,$required3,$required4,$required5,$required6,$required7,$required8,$required9,$required10,$message,$option1,$option2,$option3,$option4,$option5,$option6,$option7,$option8,$option9,$option10,$option11,$option12,$option13,$option14,$option15,$option16,$option17,$option18,$option19,$option20,$option21,$option22,$option23,$option24,$option25,$option26,$option27,$option28,$option29,$option30,$option31,$option32,$option33,$option34,$option35,$option36,$option37,$option38,$option39,$option40,$option41,$option42,$option43,$option44,$option45,$option46,$option47,$option48,$option49,$option50,$option51,$option52,$option53,$option54,$option55,$option56,$option57,$option58,$option59,$option60,$option61,$option62,$option63,$option64,$option65,$option66,$option67,$option68,$option69,$option70,$option71,$option72,$option73,$option74,$option75,$option76,$option77,$option78,$option79,$option80,$option81,$option82,$option83,$option84,$option85,$option86,$option87,$option88,$option89,$option90,$option91,$option92,$option93,$option94,$option95,$option96,$option97,$option98,$option99,$option100)
    {
        $data=array("conclusion" => $surveyname,"conclusionsuggestion" => $surveydescription,"message" => $message);
        $query=$this->db->insert( "hq_conclusionfinalsuggestion", $data );
        $surveyid=$this->db->insert_id();
        
        // survey created now
        
        // create questions
        
        //question1
        if($question1 !=''){
            $data=array("type" => $type1,"survey" => $surveyid,"content" => $question1,"isrequired" => $required1);
            $query=$this->db->insert( "hq_surveyquestion", $data );
            $question1id=$this->db->insert_id();
        }
        
//                QUESTION 1 OPTION
        
                        // create option1

                        if($question1 !="" && $option1!="")
                        {
                        $data=array("question" => $question1id,"title" => $option1);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option1id=$this->db->insert_id();
                        }

                        // create option2

                        if($question1 !="" && $option2!="")
                        {
                        $data=array("question" => $question1id,"title" => $option2);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option2id=$this->db->insert_id();
                        }

                        // create option3

                        if($question1 !="" && $option3!="")
                        {
                        $data=array("question" => $question1id,"title" => $option3);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option3id=$this->db->insert_id();
                        }

                        // create option4

                        if($question1 !="" && $option4!="")
                        {
                        $data=array("question" => $question1id,"title" => $option4);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option4id=$this->db->insert_id();
                        }

                        // create option5

                        if($question1 !="" && $option5!="")
                        {
                        $data=array("question" => $question1id,"title" => $option5);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option5id=$this->db->insert_id();
                        }

                        // create option6

                        if($question1 !="" && $option6!="")
                        {
                        $data=array("question" => $question1id,"title" => $option6);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option6id=$this->db->insert_id();
                        }

                        // create option7

                        if($question1 !="" && $option7!="")
                        {
                        $data=array("question" => $question1id,"title" => $option7);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option7id=$this->db->insert_id();
                        }

                        // create option8

                        if($question1 !="" && $option8!="")
                        {
                        $data=array("question" => $question1id,"title" => $option8);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option8id=$this->db->insert_id();
                        }

                        // create option9

                        if($question1 !="" && $option9!="")
                        {
                        $data=array("question" => $question1id,"title" => $option9);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option9id=$this->db->insert_id();
                        }

                        // create option10

                        if($question1 !="" && $option10!="")
                        {
                        $data=array("question" => $question1id,"title" => $option10);
                        $query=$this->db->insert( "hq_surveyoption", $data );
                        $option10id=$this->db->insert_id();
                        }
                
        if($question2 !=''){
             //question2
        $data=array("type" => $type2,"survey" => $surveyid,"content" => $question2,"isrequired" => $required2);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question2id=$this->db->insert_id();
        }
        
       
                    // create option11

                    if($question2 !="" && $option11!="")
                    {
                    $data=array("question" => $question2id,"title" => $option11);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option11id=$this->db->insert_id();
                    }

                    // create option12

                    if($question2 !="" && $option12!="")
                    {
                    $data=array("question" => $question2id,"title" => $option12);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option12id=$this->db->insert_id();
                    }

                    // create option13

                    if($question2 !="" && $option13!="")
                    {
                    $data=array("question" => $question2id,"title" => $option13);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option13id=$this->db->insert_id();
                    }

                    // create option14

                    if($question2 !="" && $option14!="")
                    {
                    $data=array("question" => $question2id,"title" => $option14);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option14id=$this->db->insert_id();
                    }

                    // create option15

                    if($question2 !="" && $option15!="")
                    {
                    $data=array("question" => $question2id,"title" => $option15);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option15id=$this->db->insert_id();
                    }

                    // create option16

                    if($question2 !="" && $option16!="")
                    {
                    $data=array("question" => $question2id,"title" => $option16);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option16id=$this->db->insert_id();
                    }

                    // create option17

                    if($question2 !="" && $option17!="")
                    {
                    $data=array("question" => $question2id,"title" => $option17);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option17id=$this->db->insert_id();
                    }

                    // create option18

                    if($question2 !="" && $option18!="")
                    {
                    $data=array("question" => $question2id,"title" => $option18);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option18id=$this->db->insert_id();
                    }

                    // create option19

                    if($question2 !="" && $option19!="")
                    {
                    $data=array("question" => $question2id,"title" => $option19);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option19id=$this->db->insert_id();
                    }

                    // create option20

                    if($question2 !="" && $option20!="")
                    {
                    $data=array("question" => $question2id,"title" => $option20);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option20id=$this->db->insert_id();
                    }

              


        if($question3 !=''){
        //question3
        $data=array("type" => $type3,"survey" => $surveyid,"content" => $question3,"isrequired" => $required3);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question3id=$this->db->insert_id();
        }
                    // create option21

                    if($question3 !="" && $option21!="")
                    {
                    $data=array("question" => $question3id,"title" => $option21);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option21id=$this->db->insert_id();
                    }

                    // create option22

                    if($question3 !="" && $option22!="")
                    {
                    $data=array("question" => $question3id,"title" => $option22);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option22id=$this->db->insert_id();
                    }

                    // create option23

                    if($question3 !="" && $option23!="")
                    {
                    $data=array("question" => $question3id,"title" => $option23);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option23id=$this->db->insert_id();
                    }

                    // create option24

                    if($question3 !="" && $option24!="")
                    {
                    $data=array("question" => $question3id,"title" => $option24);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option24id=$this->db->insert_id();
                    }

                    // create option25

                    if($question3 !="" && $option25!="")
                    {
                    $data=array("question" => $question3id,"title" => $option25);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option25id=$this->db->insert_id();
                    }

                    // create option26

                    if($question3 !="" && $option26!="")
                    {
                    $data=array("question" => $question3id,"title" => $option26);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option26id=$this->db->insert_id();
                    }

                    // create option27

                    if($question3 !="" && $option27!="")
                    {
                    $data=array("question" => $question3id,"title" => $option27);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option27id=$this->db->insert_id();
                    }

                    // create option28

                    if($question3 !="" && $option28!="")
                    {
                    $data=array("question" => $question3id,"title" => $option28);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option28id=$this->db->insert_id();
                    }

                    // create option29

                    if($question3 !="" && $option29!="")
                    {
                    $data=array("question" => $question3id,"title" => $option29);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option29id=$this->db->insert_id();
                    }

                    // create option30

                    if($question3 !="" && $option30!="")
                    {
                    $data=array("question" => $question3id,"title" => $option30);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option30id=$this->db->insert_id();
                    }


               
        if($question4 !=''){
        //question4
        $data=array("type" => $type4,"survey" => $surveyid,"content" => $question4,"isrequired" => $required4);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question4id=$this->db->insert_id();
        }
                    // create option31

                    if($question4 !="" && $option31!="")
                    {
                    $data=array("question" => $question4id,"title" => $option31);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option31id=$this->db->insert_id();
                    }

                    // create option32

                    if($question4 !="" && $option32!="")
                    {
                    $data=array("question" => $question4id,"title" => $option32);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option32id=$this->db->insert_id();
                    }

                    // create option33

                    if($question4 !="" && $option33!="")
                    {
                    $data=array("question" => $question4id,"title" => $option33);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option33id=$this->db->insert_id();
                    }

                    // create option34

                    if($question4 !="" && $option34!="")
                    {
                    $data=array("question" => $question4id,"title" => $option34);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option34id=$this->db->insert_id();
                    }

                    // create option35

                    if($question4 !="" && $option35!="")
                    {
                    $data=array("question" => $question4id,"title" => $option35);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option35id=$this->db->insert_id();
                    }

                    // create option36

                    if($question4 !="" && $option36!="")
                    {
                    $data=array("question" => $question4id,"title" => $option36);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option36id=$this->db->insert_id();
                    }

                    // create option37

                    if($question4 !="" && $option37!="")
                    {
                    $data=array("question" => $question4id,"title" => $option37);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option37id=$this->db->insert_id();
                    }

                    // create option38

                    if($question4 !="" && $option38!="")
                    {
                    $data=array("question" => $question4id,"title" => $option38);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option38id=$this->db->insert_id();
                    }

                    // create option39

                    if($question4 !="" && $option39!="")
                    {
                    $data=array("question" => $question4id,"title" => $option39);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option39id=$this->db->insert_id();
                    }

                    // create option40

                    if($question4 !="" && $option40!="")
                    {
                    $data=array("question" => $question4id,"title" => $option40);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option40id=$this->db->insert_id();
                    }


               

        if($question5 !=''){
        //question5
        $data=array("type" => $type5,"survey" => $surveyid,"content" => $question5,"isrequired" => $required5);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question5id=$this->db->insert_id();
        }
        
                    // create option41

                if($question5 !="" && $option41!="")
                {
                $data=array("question" => $question5id,"title" => $option41);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option41id=$this->db->insert_id();
                }

                // create option42

                if($question5 !="" && $option42!="")
                {
                $data=array("question" => $question5id,"title" => $option42);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option42id=$this->db->insert_id();
                }

                // create option43

                if($question5 !="" && $option43!="")
                {
                $data=array("question" => $question5id,"title" => $option43);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option43id=$this->db->insert_id();
                }

                // create option44

                if($question5 !="" && $option44!="")
                {
                $data=array("question" => $question5id,"title" => $option44);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option44id=$this->db->insert_id();
                }

                // create option45

                if($question5 !="" && $option45!="")
                {
                $data=array("question" => $question5id,"title" => $option45);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option45id=$this->db->insert_id();
                }

                // create option46

                if($question5 !="" && $option46!="")
                {
                $data=array("question" => $question5id,"title" => $option46);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option46id=$this->db->insert_id();
                }

                // create option47

                if($question5 !="" && $option47!="")
                {
                $data=array("question" => $question5id,"title" => $option47);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option47id=$this->db->insert_id();
                }

                // create option48

                if($question5 !="" && $option48!="")
                {
                $data=array("question" => $question5id,"title" => $option48);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option48id=$this->db->insert_id();
                }

                // create option49

                if($question5 !="" && $option49!="")
                {
                $data=array("question" => $question5id,"title" => $option49);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option49id=$this->db->insert_id();
                }

                // create option50

                if($question5 !="" && $option50!="")
                {
                $data=array("question" => $question5id,"title" => $option50);
                $query=$this->db->insert( "hq_surveyoption", $data );
                $option50id=$this->db->insert_id();
                }

        if($question6 !=''){
        //question6
        $data=array("type" => $type6,"survey" => $surveyid,"content" => $question6,"isrequired" => $required6);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question6id=$this->db->insert_id();
        }
                // create option51

                    if($question6 !="" && $option51!="")
                    {
                    $data=array("question" => $question6id,"title" => $option51);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option51id=$this->db->insert_id();
                    }

                    // create option52

                    if($question6 !="" && $option52!="")
                    {
                    $data=array("question" => $question6id,"title" => $option52);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option52id=$this->db->insert_id();
                    }

                    // create option53

                    if($question6 !="" && $option53!="")
                    {
                    $data=array("question" => $question6id,"title" => $option53);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option53id=$this->db->insert_id();
                    }

                    // create option54

                    if($question6 !="" && $option54!="")
                    {
                    $data=array("question" => $question6id,"title" => $option54);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option54id=$this->db->insert_id();
                    }

                    // create option55

                    if($question6 !="" && $option55!="")
                    {
                    $data=array("question" => $question6id,"title" => $option55);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option55id=$this->db->insert_id();
                    }

                    // create option56

                    if($question6 !="" && $option56!="")
                    {
                    $data=array("question" => $question6id,"title" => $option56);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option56id=$this->db->insert_id();
                    }

                    // create option57

                    if($question6 !="" && $option57!="")
                    {
                    $data=array("question" => $question6id,"title" => $option57);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option57id=$this->db->insert_id();
                    }

                    // create option58

                    if($question6 !="" && $option58!="")
                    {
                    $data=array("question" => $question6id,"title" => $option58);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option58id=$this->db->insert_id();
                    }

                    // create option59

                    if($question6 !="" && $option59!="")
                    {
                    $data=array("question" => $question6id,"title" => $option59);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option59id=$this->db->insert_id();
                    }

                    // create option60

                    if($question6 !="" && $option60!="")
                    {
                    $data=array("question" => $question6id,"title" => $option60);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option60id=$this->db->insert_id();
                    }


        if($question7 !=''){
        //question7
        $data=array("type" => $type7,"survey" => $surveyid,"content" => $question7,"isrequired" => $required7);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question7id=$this->db->insert_id();
        }
                    // create option61

                    if($question7 !="" && $option61!="")
                    {
                    $data=array("question" => $question7id,"title" => $option61);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option61id=$this->db->insert_id();
                    }

                    // create option62

                    if($question7 !="" && $option62!="")
                    {
                    $data=array("question" => $question7id,"title" => $option62);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option62id=$this->db->insert_id();
                    }

                    // create option63

                    if($question7 !="" && $option63!="")
                    {
                    $data=array("question" => $question7id,"title" => $option63);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option63id=$this->db->insert_id();
                    }

                    // create option64

                    if($question7 !="" && $option64!="")
                    {
                    $data=array("question" => $question7id,"title" => $option64);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option64id=$this->db->insert_id();
                    }

                    // create option65

                    if($question7 !="" && $option65!="")
                    {
                    $data=array("question" => $question7id,"title" => $option65);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option65id=$this->db->insert_id();
                    }

                    // create option66

                    if($question7 !="" && $option66!="")
                    {
                    $data=array("question" => $question7id,"title" => $option66);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option66id=$this->db->insert_id();
                    }

                    // create option67

                    if($question7 !="" && $option67!="")
                    {
                    $data=array("question" => $question7id,"title" => $option67);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option67id=$this->db->insert_id();
                    }

                    // create option68

                    if($question7 !="" && $option68!="")
                    {
                    $data=array("question" => $question7id,"title" => $option68);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option68id=$this->db->insert_id();
                    }

                    // create option69

                    if($question7 !="" && $option69!="")
                    {
                    $data=array("question" => $question7id,"title" => $option69);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option69id=$this->db->insert_id();
                    }

                    // create option70

                    if($question7 !="" && $option70!="")
                    {
                    $data=array("question" => $question7id,"title" => $option70);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option70id=$this->db->insert_id();
                    }

        if($question8 !=''){
        //question8
        $data=array("type" => $type8,"survey" => $surveyid,"content" => $question8,"isrequired" => $required8);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question8id=$this->db->insert_id();
        }
                    // create option71

                    if($question8 !="" && $option71!="")
                    {
                    $data=array("question" => $question8id,"title" => $option71);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option71id=$this->db->insert_id();
                    }

                    // create option72

                    if($question8 !="" && $option72!="")
                    {
                    $data=array("question" => $question8id,"title" => $option72);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option72id=$this->db->insert_id();
                    }

                    // create option73

                    if($question8 !="" && $option73!="")
                    {
                    $data=array("question" => $question8id,"title" => $option73);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option73id=$this->db->insert_id();
                    }

                    // create option74

                    if($question8 !="" && $option74!="")
                    {
                    $data=array("question" => $question8id,"title" => $option74);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option74id=$this->db->insert_id();
                    }

                    // create option75

                    if($question8 !="" && $option75!="")
                    {
                    $data=array("question" => $question8id,"title" => $option75);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option75id=$this->db->insert_id();
                    }

                    // create option76

                    if($question8 !="" && $option76!="")
                    {
                    $data=array("question" => $question8id,"title" => $option76);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option76id=$this->db->insert_id();
                    }

                    // create option77

                    if($question8 !="" && $option77!="")
                    {
                    $data=array("question" => $question8id,"title" => $option77);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option77id=$this->db->insert_id();
                    }

                    // create option78

                    if($question8 !="" && $option78!="")
                    {
                    $data=array("question" => $question8id,"title" => $option78);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option78id=$this->db->insert_id();
                    }

                    // create option79

                    if($question8 !="" && $option79!="")
                    {
                    $data=array("question" => $question8id,"title" => $option79);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option79id=$this->db->insert_id();
                    }

                    // create option80

                    if($question8 !="" && $option80!="")
                    {
                    $data=array("question" => $question8id,"title" => $option80);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option80id=$this->db->insert_id();
                    }


                    
        if($question9 !=''){
        //question9
        $data=array("type" => $type9,"survey" => $surveyid,"content" => $question9,"isrequired" => $required9);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question9id=$this->db->insert_id();
        }
               
                    // create option81

                    if($question9 !="" && $option81!="")
                    {
                    $data=array("question" => $question9id,"title" => $option81);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option81id=$this->db->insert_id();
                    }

                    // create option82

                    if($question9 !="" && $option82!="")
                    {
                    $data=array("question" => $question9id,"title" => $option82);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option82id=$this->db->insert_id();
                    }

                    // create option83

                    if($question9 !="" && $option83!="")
                    {
                    $data=array("question" => $question9id,"title" => $option83);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option83id=$this->db->insert_id();
                    }

                    // create option84

                    if($question9 !="" && $option84!="")
                    {
                    $data=array("question" => $question9id,"title" => $option84);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option84id=$this->db->insert_id();
                    }

                    // create option85

                    if($question9 !="" && $option85!="")
                    {
                    $data=array("question" => $question9id,"title" => $option85);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option85id=$this->db->insert_id();
                    }

                    // create option86

                    if($question9 !="" && $option86!="")
                    {
                    $data=array("question" => $question9id,"title" => $option86);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option86id=$this->db->insert_id();
                    }

                    // create option87

                    if($question9 !="" && $option87!="")
                    {
                    $data=array("question" => $question9id,"title" => $option87);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option87id=$this->db->insert_id();
                    }

                    // create option88

                    if($question9 !="" && $option88!="")
                    {
                    $data=array("question" => $question9id,"title" => $option88);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option88id=$this->db->insert_id();
                    }

                    // create option89

                    if($question9 !="" && $option89!="")
                    {
                    $data=array("question" => $question9id,"title" => $option89);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option89id=$this->db->insert_id();
                    }

                    // create option90

                    if($question9 !="" && $option90!="")
                    {
                    $data=array("question" => $question9id,"title" => $option90);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option90id=$this->db->insert_id();
                    }


        if($question10 !=''){
        //question10
        $data=array("type" => $type10,"survey" => $surveyid,"content" => $question10,"isrequired" => $required10);
        $query=$this->db->insert( "hq_surveyquestion", $data );
        $question10id=$this->db->insert_id();
        }
                    // create option91

                    if($question10 !="" && $option91!="")
                    {
                    $data=array("question" => $question10id,"title" => $option91);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option91id=$this->db->insert_id();
                    }

                    // create option92

                    if($question10 !="" && $option92!="")
                    {
                    $data=array("question" => $question10id,"title" => $option92);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option92id=$this->db->insert_id();
                    }

                    // create option93

                    if($question10 !="" && $option93!="")
                    {
                    $data=array("question" => $question10id,"title" => $option93);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option93id=$this->db->insert_id();
                    }

                    // create option94

                    if($question10 !="" && $option94!="")
                    {
                    $data=array("question" => $question10id,"title" => $option94);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option94id=$this->db->insert_id();
                    }

                    // create option95

                    if($question10 !="" && $option95!="")
                    {
                    $data=array("question" => $question10id,"title" => $option95);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option95id=$this->db->insert_id();
                    }

                    // create option96

                    if($question10 !="" && $option96!="")
                    {
                    $data=array("question" => $question10id,"title" => $option96);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option96id=$this->db->insert_id();
                    }

                    // create option97

                    if($question10 !="" && $option97!="")
                    {
                    $data=array("question" => $question10id,"title" => $option97);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option97id=$this->db->insert_id();
                    }

                    // create option98

                    if($question10 !="" && $option98!="")
                    {
                    $data=array("question" => $question10id,"title" => $option98);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option98id=$this->db->insert_id();
                    }

                    // create option99

                    if($question10 !="" && $option99!="")
                    {
                    $data=array("question" => $question10id,"title" => $option99);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option99id=$this->db->insert_id();
                    }

                    // create option100

                    if($question10 !="" && $option100!="")
                    {
                    $data=array("question" => $question10id,"title" => $option100);
                    $query=$this->db->insert( "hq_surveyoption", $data );
                    $option100id=$this->db->insert_id();
                    }


        
        return 1;
        
    } 
    public function editsurveysubmit($surveyname,$surveydescription,$question1,$question2,$question3,$question4,$question5,$question6,$question7,$question8,$question9,$question10,$type1,$type2,$type3,$type4,$type5,$type6,$type7,$type8,$type9,$type10,$required1,$required2,$required3,$required4,$required5,$required6,$required7,$required8,$required9,$required10,$message,$surveyid,$question1id,$question2id,$question3id,$question4id,$question5id,$question6id,$question7id,$question8id,$question9id,$question10id,$option1,$option2,$option3,$option4,$option5,$option6,$option7,$option8,$option9,$option10,$option11,$option12,$option13,$option14,$option15,$option16,$option17,$option18,$option19,$option20,$option21,$option22,$option23,$option24,$option25,$option26,$option27,$option28,$option29,$option30,$option31,$option32,$option33,$option34,$option35,$option36,$option37,$option38,$option39,$option40,$option41,$option42,$option43,$option44,$option45,$option46,$option47,$option48,$option49,$option50,$option51,$option52,$option53,$option54,$option55,$option56,$option57,$option58,$option59,$option60,$option61,$option62,$option63,$option64,$option65,$option66,$option67,$option68,$option69,$option70,$option71,$option72,$option73,$option74,$option75,$option76,$option77,$option78,$option79,$option80,$option81,$option82,$option83,$option84,$option85,$option86,$option87,$option88,$option89,$option90,$option91,$option92,$option93,$option94,$option95,$option96,$option97,$option98,$option99,$option100,$option1id,$option2id,$option3id,$option4id,$option5id,$option6id,$option7id,$option8id,$option9id,$option10id,$option11id,$option12id,$option13id,$option14id,$option15id,$option16id,$option17id,$option18id,$option19id,$option20id,$option21id,$option22id,$option23id,$option24id,$option25id,$option26id,$option27id,$option28id,$option29id,$option30id,$option31id,$option32id,$option33id,$option34id,$option35id,$option36id,$option37id,$option38id,$option39id,$option40id,$option41id,$option42id,$option43id,$option44id,$option45id,$option46id,$option47id,$option48id,$option49id,$option50id,$option51id,$option52id,$option53id,$option54id,$option55id,$option56id,$option57id,$option58id,$option59id,$option60id,$option61id,$option62id,$option63id,$option64id,$option65id,$option66id,$option67id,$option68id,$option69id,$option70id,$option71id,$option72id,$option73id,$option74id,$option75id,$option76id,$option77id,$option78id,$option79id,$option80id,$option81id,$option82id,$option83id,$option84id,$option85id,$option86id,$option87id,$option88id,$option89id,$option90id,$option91id,$option92id,$option93id,$option94id,$option95id,$option96id,$option97id,$option98id,$option99id,$option100id)
    {        
          $data=array("conclusion" => $surveyname,"conclusionsuggestion" => $surveydescription,"message" => $message);
          $this->db->where( "id", $surveyid );
          $query=$this->db->update( "hq_conclusionfinalsuggestion", $data );
        // survey updated now
//        
//        $getsurveyquestionid=$this->db->query("SELECT * FROM `hq_surveyquestion` WHERE `survey`='$surveyid'")->result();
//            foreach($getsurveyquestionid as $questionid)
//            {
//                for($i=1; $i<=10 ; $i++)
//                {
//                     $data=array("type" => $type1,"survey" => $surveyid,"content" => $question1,"isrequired" => $required1);
//                     $query=$this->db->insert( "hq_surveyquestion", $data );
//                     $question.$i.id=$this->db->insert_id();
//                }
//            }
//        // create questions
        
        //question1
        $data=array("type" => $type1,"survey" => $surveyid,"content" => $question1,"isrequired" => $required1);
        $this->db->where( "id", $question1id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
                        //question 
                //option1
                $data=array("question" => $question1id,"title" => $option1);
                $this->db->where( "id", $option1id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option2
                $data=array("question" => $question1id,"title" => $option2);
                $this->db->where( "id", $option2id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option3
                $data=array("question" => $question1id,"title" => $option3);
                $this->db->where( "id", $option3id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option4
                $data=array("question" => $question1id,"title" => $option4);
                $this->db->where( "id", $option4id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option5
                $data=array("question" => $question1id,"title" => $option5);
                $this->db->where( "id", $option5id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option6
                $data=array("question" => $question1id,"title" => $option6);
                $this->db->where( "id", $option6id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option7
                $data=array("question" => $question1id,"title" => $option7);
                $this->db->where( "id", $option7id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option8
                $data=array("question" => $question1id,"title" => $option8);
                $this->db->where( "id", $option8id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option9
                $data=array("question" => $question1id,"title" => $option9);
                $this->db->where( "id", $option9id );
                $query=$this->db->update( "hq_surveyoption", $data );

                //option10
                $data=array("question" => $question1id,"title" => $option10);
                $this->db->where( "id", $option10id );
                $query=$this->db->update( "hq_surveyoption", $data );


        
        //question2
        $data=array("type" => $type2,"survey" => $surveyid,"content" => $question2,"isrequired" => $required2);
        $this->db->where( "id", $question2id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question3
        $data=array("type" => $type3,"survey" => $surveyid,"content" => $question3,"isrequired" => $required3);
        $this->db->where( "id", $question3id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question4
        $data=array("type" => $type4,"survey" => $surveyid,"content" => $question4,"isrequired" => $required4);
        $this->db->where( "id", $question4id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question5
        $data=array("type" => $type5,"survey" => $surveyid,"content" => $question5,"isrequired" => $required5);
       $this->db->where( "id", $question5id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question6
        $data=array("type" => $type6,"survey" => $surveyid,"content" => $question6,"isrequired" => $required6);
       $this->db->where( "id", $question6id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question7
        $data=array("type" => $type7,"survey" => $surveyid,"content" => $question7,"isrequired" => $required7);
        $this->db->where( "id", $question7id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question8
        $data=array("type" => $type8,"survey" => $surveyid,"content" => $question8,"isrequired" => $required8);
        $this->db->where( "id", $question8id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question9
        $data=array("type" => $type9,"survey" => $surveyid,"content" => $question9,"isrequired" => $required9);
        $this->db->where( "id", $question9id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        
        //question10
        $data=array("type" => $type10,"survey" => $surveyid,"content" => $question10,"isrequired" => $required10);
       $this->db->where( "id", $question10id );
          $query=$this->db->update( "hq_surveyquestion", $data );
        

        
         return 1;
        
    }
    public function surveybeforeedit($id){
        $query['survey']=$this->db->query("SELECT * FROM `hq_conclusionfinalsuggestion` WHERE `id`='$id'")->row();
        $query['question']=$this->db->query("SELECT * FROM `hq_surveyquestion` WHERE `survey`='$id'")->result();
return $query;
    } 
    public function getoptionforedit($id){
        
     $query=$this->db->query("SELECT * FROM `hq_surveyquestion` WHERE `survey`='$id'")->result();
        foreach($query as $row){
             $row->options=$this->db->query("SELECT * FROM `hq_surveyoption` WHERE `question`='$row->id'")->result();
        }
return $query;
    }
}
?>
