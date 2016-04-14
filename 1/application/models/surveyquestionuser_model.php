<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class surveyquestionuser_model extends CI_Model
{
public function create($survey,$email,$status)
{
    
    $getuserid=$this->db->query("SELECT * FROM `user` WHERE `email`='$email'")->row();
    $userid=$getuserid->id;
$data=array("survey" => $survey,"email" => $email,"status" => $status,"userid" => $userid);
$query=$this->db->insert( "hq_surveyquestionuser", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyquestionuser")->row();
return $query;
}
function getsinglesurveyquestionuser($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyquestionuser")->row();
return $query;
}
public function edit($id,$survey,$email,$status)
{
    $getuserid=$this->db->query("SELECT * FROM `user` WHERE `email`='$email'")->row();
    $userid=$getuserid->id;
  $data=array("survey" => $survey,"email" => $email,"status" => $status,"userid" => $userid);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_surveyquestionuser", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_surveyquestionuser` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_surveyquestionuser` WHERE `id`='$id'")->row();
return $query;
}
       public function disableCompany($id)
{
        $query=$this->db->query("UPDATE `hq_surveyquestionuser` SET `status`=1 WHERE `id`='$id'");

        if($query)
            return 1;
        else
            return 0;
} 
    public function enableCompany($id)
{
        $query=$this->db->query("UPDATE `hq_surveyquestionuser` SET `status`=2 WHERE `id`='$id'");

          if($query)
            return 1;
        else
            return 0;
}
    public function createbycsv($file,$id)
{
//     start
        foreach ($file as $row)
        {
            $email=$row['email'];
            $surveyname=$row['survey'];
            $query=$this->db->query("SELECT * FROM `user` WHERE `email` LIKE '$email'")->row();
            
            if(empty($query))
            {
            }
            else
            {
                $surveynamequery=$this->db->query("SELECT * FROM `hq_conclusionfinalsuggestion` WHERE `conclusion` LIKE '$surveyname'")->row();
                $surveyid=$surveynamequery->id;
                $checkifmailpresent=$this->db->query("SELECT * FROM `hq_surveyquestionuser` WHERE `email` LIKE '$email'")->row();
                if(empty($checkifmailpresent))
                {
                    //                  email matches
                $userid=$query->id;
                $data  = array(
                    'email' => $email,
                    'userid' => $userid,
                    'survey' => $surveyid
                );
                $query=$this->db->insert( 'hq_surveyquestionuser', $data );
                $id=$this->db->insert_id();
                }

            }
	    }
        
//        end
			return  $id;
}
}
?>
