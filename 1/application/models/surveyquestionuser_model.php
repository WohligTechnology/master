<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class surveyquestionuser_model extends CI_Model
{
public function create($question,$email)
{
$data=array("question" => $question,"email" => $email);
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
public function edit($id,$question,$email)
{
  $data=array("question" => $question,"email" => $email);
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
}
?>
