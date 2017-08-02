<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class conclusionsuggestion_model extends CI_Model
{
public function create($conclusion,$suggestion)
{
$data=array("conclusion" => $conclusion,"suggestion" => $suggestion);
$query=$this->db->insert( "hq_conclusionsuggestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("conclusion",$id);
$query=$this->db->get("hq_conclusionsuggestion")->row();
return $query;
}
function getsingleconclusionsuggestion($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusionsuggestion")->row();
return $query;
}
public function edit($conclusion,$suggestion)
{
    $data=array("suggestion" => $suggestion);
$this->db->where( "conclusion",$conclusion );
$query=$this->db->update( "hq_conclusionsuggestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_conclusionsuggestion` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_conclusionsuggestion` WHERE `id`='$id'")->row();
return $query;
}
      public function getConclusionSuggestionDropDown()
	{
		$query=$this->db->query("SELECT * FROM `hq_conclusionsuggestion`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "Choose concluded suggestion"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->suggestion;
		}
		
		return $return;
	
}
}
?>
