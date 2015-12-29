<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class conclusionquestion_model extends CI_Model
{
public function create($conclusion,$question)
{
$data=array("conclusion" => $conclusion,"question" => $question);
$query=$this->db->insert( "hq_conclusionquestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusionquestion")->row();
return $query;
}
function getsingleconclusionquestion($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusionquestion")->row();
return $query;
}
public function edit($id,$conclusion,$question)
{$data=array("conclusion" => $conclusion,"question" => $question);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_conclusionquestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_conclusionquestion` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_conclusionquestion` WHERE `id`='$id'")->row();
return $query;
}
}
?>
