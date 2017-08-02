<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class surveyoption_model extends CI_Model
{
public function create($order,$question,$title,$image)
{
$data=array("order" => $order,"question" => $question,"title" => $title,"image" => $image);
$query=$this->db->insert( "hq_surveyoption", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyoption")->row();
return $query;
}
function getsinglesurveyoption($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyoption")->row();
return $query;
}
public function edit($id,$order,$question,$title,$image)
{
if($image==""){
  $image=$this->surveyoption_model->getimagebyid($id);
  $image=$image->image;
}
$data=array("order" => $order,"question" => $question,"title" => $title,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_surveyoption", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_surveyoption` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_surveyoption` WHERE `id`='$id'")->row();
return $query;
}
      function checktype($id)
    {
        $query=$this->db->query("SELECT `type` FROM `hq_surveyquestion` WHERE `id`='$id'")->row();
        $type=$query->type;
          return $type;
}
public function getsurveyoptiondropdown()
{
    $query=$this->db->query("SELECT * FROM `hq_surveyoption`  ORDER BY `id` ASC")->result();
    $return=array(
    "" => "Choose Option"
    );
    foreach($query as $row)
    {
      $return[$row->id]=$row->title;
    }

    return $return;
}
    
    public function deleteoption($id)
{
    $query=$this->db->query("DELETE FROM `hq_surveyoption` WHERE `id`='$id'");
        return $query;
}
}
?>
