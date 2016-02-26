<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class conclusionfinalsuggestion_model extends CI_Model
{
public function create($conclusion,$conclusionsuggestion)
{
$data=array("conclusion" => $conclusion,"conclusionsuggestion" => $conclusionsuggestion);
$query=$this->db->insert( "hq_conclusionfinalsuggestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusionfinalsuggestion")->row();
return $query;
}
function getsingleconclusionfinalsuggestion($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusionfinalsuggestion")->row();
return $query;
}
public function edit($id,$conclusion,$conclusionsuggestion)
{$data=array("conclusion" => $conclusion,"conclusionsuggestion" => $conclusionsuggestion);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_conclusionfinalsuggestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_conclusionfinalsuggestion` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_conclusionfinalsuggestion` WHERE `id`='$id'")->row();
return $query;
}
    public function getSurveyNameDown()
	{
		$query=$this->db->query("SELECT * FROM `hq_conclusionfinalsuggestion`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "Choose Survey"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->conclusion;
		}
		
		return $return;
	
    }
}
?>
