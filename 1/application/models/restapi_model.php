<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");
class restapi_model extends CI_Model
{
    public function getQuestionAnswer()
    {
        $query = $this->db->query("SELECT `id`, `pillar`, `noofans`, `order`, `timestamp`, `text` FROM `hq_question` WHERE 1 ORDER BY `order` ASC")->result();
        foreach ($query as $row) {
            $questionoption = array();
            $row->options   = $this->db->query("SELECT `id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text` FROM `hq_options` WHERE `question`='$row->id'")->result();
            array_push($questionoption, $row->options);
        }
        return $query;
    }
    
    public function getSingleQuestionAndOption($id)
    {
        $query          = $this->db->query("SELECT `id`, `pillar`, `noofans`, `order`, `timestamp`, `text` FROM `hq_question` WHERE `id`='$id'")->row();
        $query->options = $this->db->query("SELECT `id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text` FROM `hq_options` WHERE `question`='$query->id'")->result();
        return $query;
    }
    
    public function storeUserAnswer($user, $option, $question, $test)
    {
        $normalfromhash = base64_decode($user);
        $returnvalue    = explode("&", $normalfromhash);
        $userid         = $returnvalue[0];
        // get pillar id
        
        $query1   = $this->db->query("SELECT `pillar` FROM `hq_question` WHERE `id`='$question'")->row();
        $pillarid = $query1->pillar;
        
        $data  = array(
            "user" => $userid,
            "question" => $question,
            "option" => $option,
            "test" => $test,
            "pillar" => $pillarid
        );
        $query = $this->db->insert("hq_useranswer", $data);
        $id    = $this->db->insert_id();
        if (!$query)
            return false;
        else
            return true;
    }
    
    public function pingHq($user)
    {
        $normalfromhash = base64_decode($user);
        $returnvalue    = explode("&", $normalfromhash);
        $userid         = $returnvalue[0];
        $todaysdate     = date("Y-m-d");
	    
	   $query = $this->db->query("Select `testquestion`.`id` as `questionid`, `testquestion`.`test`, `testquestion`.`question`, `testquestion`.`dateandtime`, `hq_question`.`text`, `hq_question`.`type`
from `testquestion`
inner join `test` ON `testquestion`.`test` = `test`.`id`
inner join `hq_question` ON `testquestion`.`question` = `hq_question`.`id`
where `test`.`startdate` < now()
HAVING `questionid` not in (Select `testquestion`.`id` as `questionid` from `testquestion` inner join `test` ON `testquestion`.`test` = `test`.`id` inner join `hq_question` ON `testquestion`.`question` = `hq_question`.`id` inner join `hq_useranswer` ON `testquestion`.`question` = `hq_useranswer`.`question` AND `testquestion`.`test` = `hq_useranswer`.`test` where `hq_useranswer`.`user` = '$userid')")->result();
	   
	    foreach ($query as $questions) {
                $questions->option = $this->db->query("SELECT `id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text` FROM `hq_options` WHERE `question`='$questions->question'")->result();
                
            }
	    
	    
//        $gettest        = $this->db->query("SELECT `id` FROM `test` WHERE `startdate`<'$todaysdate'")->result();
//        $ids = "(";
//        foreach ($gettest as $key => $value) {
//            //            $catid=$row->id;
//            if ($key == 0) {
//                $ids .= $value->id;
//            } else {
//                $ids .= "," . $value->id;
//            }
//        }
//        $ids .= ")";
//        if ($ids == "()") {
//            $ids = "(0)";
//        }
//        $gettestquestionsids = $this->db->query("SELECT `question` FROM `testquestion` WHERE `test` IN $ids")->result();
//	    print_r($gettestquestionsids);
//        $questionids         = "(";
//        foreach ($gettestquestionsids as $key => $value) {
//            //            $catid=$row->id;
//            if ($key == 0) {
//                $questionids .= $value->question;
//            } else {
//                $questionids .= "," . $value->question;
//            }
//        }
//        $questionids .= ")";
//        if ($questionids == "()") {
//            $questionids = "(0)";
//        }
//        $query = $this->db->query("SELECT `question`,`test` FROM `hq_useranswer` WHERE `user`='$userid' AND `option` =0 AND `question` IN $questionids")->result();
//        if (empty($query)) {
//         $queryquestion['question']=$this->db->query("SELECT `hq_question`.`id`, `hq_question`.`pillar`, `hq_question`.`noofans`, `hq_question`.`order`, `hq_question`.`timestamp`, `hq_question`.`text`,`hq_useranswer`.`test` FROM `hq_question`
//                 LEFT OUTER JOIN `hq_useranswer` ON `hq_useranswer`.`question`=`hq_question`.`id`
//                 WHERE `hq_question`.`id` IN $questionids GROUP BY `hq_question`.`id`")->result();
//            foreach( $queryquestion['question'] as $getoptn){
//                   $options   = array();
//                $getoptn->option = $this->db->query("SELECT `id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text` FROM `hq_options` WHERE `question`='$getoptn->id'")->result();
//                array_push($options, $getoptn->option);
//                
//            }
//            return $queryquestion;
//            
//        } else {
//            $questionidstext = "(";
//            foreach ($query as $key => $value) {
//                //            $catid=$row->id;
//                if ($key == 0) {
//                    $questionidstext .= $value->question;
//                } else {
//                    $questionidstext .= "," . $value->question;
//                }
//            }
//            $questionidstext .= ")";
//            if ($questionidstext == "()") {
//                $questionidstext = "(0)";
//            }
//            $queryquestion['question'] = $this->db->query("SELECT `hq_question`.`id`, `hq_question`.`pillar`, `hq_question`.`noofans`, `hq_question`.`order`, `hq_question`.`timestamp`, `hq_question`.`text`,`hq_useranswer`.`test` FROM `hq_question`
//                 LEFT OUTER JOIN `hq_useranswer` ON `hq_useranswer`.`question`=`hq_question`.`id`
//                 WHERE `hq_question`.`id` IN $questionidstext GROUP BY `hq_question`.`id`")->result();
//            
//            foreach ($queryquestion['question'] as $getoptn) {
//                $options         = array();
//                $getoptn->option = $this->db->query("SELECT `id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text` FROM `hq_options` WHERE `question`='$getoptn->id'")->result();
//                array_push($options, $getoptn->option);
//            }
//            
////            return $queryquestion;
//        }
	    return $query;
    }
    
    public function getUsers()
    {
        $query = $this->db->query("SELECT `id`,`email` FROM `user` WHERE `accesslevel`=4")->result();
        return $query;
    }
    
}
?>