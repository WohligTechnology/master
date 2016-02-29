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
        $query = $this->db->query("SELECT `id`, `pillar`, `noofans`, `order`, `timestamp`, `text` FROM `hq_question` WHERE `id`='$id'")->row();
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
    public function storeSurveyAnswer($answer)
    {
//        print_r($answer);
        $user=$answer['user'];
        $survey=$answer['survey'];
        $questions=$answer['questions'];
        $normalfromhash = base64_decode($user);
        $userid         = $normalfromhash;
//        print_r($questions);
        foreach($questions as $row)
        {
            
            $questionId = $row["questionid"];
            $answer = $row["answer"];
            $this->db->query("INSERT INTO `hq_surveyquestionanswer`(`user`,`question`,`option`,`survey`) VALUES ('$userid','$questionId','$answer','$survey')");
            $insertid=$this->db->insert_id();
        }
        if (!$query)
            return false;
        else
            return true;
    }
    
    public function pingHq($user)
    {
        if($user==''){
            $object = new stdClass();
                $object->value = "No User Found";
                return $object;
        }
        $normalfromhash = base64_decode($user);
        $returnvalue    = explode("&", $normalfromhash);
        $userid         = $returnvalue[0];
        $todaysdate     = date("Y-m-d");
	    
        // query by jags
        
//	   $query = $this->db->query("SELECT `testquestion`.`id` as `questionid`, `testquestion`.`test`, `testquestion`.`question`, `testquestion`.`dateandtime`, `hq_question`.`text`, `hq_question`.`type`
//from `testquestion`
//inner join `test` ON `testquestion`.`test` = `test`.`id`
//inner join `hq_question` ON `testquestion`.`question` = `hq_question`.`id`
//where `test`.`startdate` < now()
//HAVING `questionid` not in (Select `testquestion`.`id` as `questionid` from `testquestion` inner join `test` ON `testquestion`.`test` = `test`.`id` inner join `hq_question` ON `testquestion`.`question` = `hq_question`.`id` inner join `hq_useranswer` ON `testquestion`.`question` = `hq_useranswer`.`question` AND `testquestion`.`test` = `hq_useranswer`.`test` where `hq_useranswer`.`user` = '$userid')")->result(); 
        
        //query by pooja
        
        
        $query = $this->db->query("SELECT `testquestion`.`question` as `questionid`, `testquestion`.`test`, `testquestion`.`question`, `testquestion`.`dateandtime`, `hq_question`.`text`, `hq_question`.`type` from `testquestion` inner join `test` ON `testquestion`.`test` = `test`.`id` inner join `hq_question` ON `testquestion`.`question` = `hq_question`.`id` where `test`.`startdate` < now() HAVING `questionid` not in (Select `testquestion`.`question` as `questionid` from `testquestion` inner join `test` ON `testquestion`.`test` = `test`.`id` inner join `hq_question` ON `testquestion`.`question` = `hq_question`.`id` inner join `hq_useranswer` ON `testquestion`.`question` = `hq_useranswer`.`question` AND `testquestion`.`test` = `hq_useranswer`.`test` where `hq_useranswer`.`user` = '$userid') LIMIT 0,1")->result(); 
	   
        if(empty($query))
        {
	       
            $query2 = "SELECT DISTINCT(`survey`) AS `survey` FROM `hq_surveyquestionuser` WHERE `userid`='$userid' AND `survey` NOT IN
(SELECT `survey` FROM `hq_surveyquestionanswer` WHERE `user`='$userid') LIMIT 0,1";
            $query2 = $this->db->query($query2);
            if($query2->num_rows() > 0)
            {
                $query2 = $query2->row();
                $query = $this->db->query("SELECT * FROM `hq_surveyquestion` WHERE `survey` = '$query2->survey' LIMIT 0,20")->result();
                foreach ($query as $questions) 
                {
                $questions->option = $this->db->query("SELECT `id`, `order`, `question`, `title`, `image` FROM `hq_surveyoption` WHERE `question`='$questions->id'")->result();
                }
                
                $getsurveyname=$this->db->query("Select `conclusion` as `surveyname` FROM `hq_conclusionfinalsuggestion` WHERE `id`='$query2->survey' LIMIT 0,1")->row();
                $query3 = new stdClass();
                $query3->questions = $query;
                $query3->surveyid = $query2->survey;
                $query3->type = "survey";
                $query3->surveyname = $getsurveyname->surveyname;
                return $query3;
            }
            else{
                $object = new stdClass();
                $object->value = false;
                return $object;
            }
            
        }
        else
        {
//            IT IS A PILLAR QUESTIONS
            
            foreach ($query as $questions) 
            {
                $questions->option = $this->db->query("SELECT `id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text` FROM `hq_options` WHERE `question`='$questions->question'")->result();
                
            }
             if($query)
             {
               return $query;
             }
            else
            {
              $object = new stdClass();
              $object->value = false;
              return $object;
            }
        }
               

    } 

    
    public function getUsers()
    {
        $query = $this->db->query("SELECT `id`,`email` FROM `user` WHERE `accesslevel`=4")->result();
        return $query;
    }
    
}
?>