<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class surveyquestion_model extends CI_Model
{
public function create($type,$text,$starttime,$endtime,$content)
{
$data=array("type" => $type,"text" => $text,"starttime" => $starttime,"endtime" => $endtime,"content" => $content);
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
  
public function edit($id,$type,$text,$starttime,$endtime,$content)
{$data=array("type" => $type,"text" => $text,"starttime" => $starttime,"endtime" => $endtime,"content" => $content);
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
"4" => "Checkboxes"
);
return $return;
}
}
?>
