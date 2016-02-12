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
	
	    return $query;
    } 
    public function pingHqForSurvey($user)
    {
        $normalfromhash = base64_decode($user);
        $returnvalue    = explode("&", $normalfromhash);
        $userid         = $returnvalue[0];
	    
	   $getemail = $this->db->query("SELECT `email` FROM `user` WHERE `id`='$userid'")->row();
        $email=$getemail->email;
        $query = $this->db->query("SELECT `hq_surveyquestionuser`.`question` as `questionid`,`hq_surveyquestion`.`content` as `text`,`hq_surveyquestion`.`type` FROM `hq_surveyquestionuser` INNER JOIN `hq_surveyquestion` ON `hq_surveyquestion`.`id`=`hq_surveyquestionuser`.`question` WHERE `hq_surveyquestionuser`.`email`='$email' AND `hq_surveyquestionuser`.`status`=1")->result();
                foreach ($query as $questions) 
                {
                $questions->option = $this->db->query("SELECT `id`, `order`, `question`, `title`, `image` FROM `hq_surveyoption` WHERE `question`='$questions->questionid'")->result();
                
                }
	   

	    return $query;
    }
    
    public function getUsers()
    {
        $query = $this->db->query("SELECT `id`,`email` FROM `user` WHERE `accesslevel`=4")->result();
        return $query;
    }
    
}
?>