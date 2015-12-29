<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class pillar_model extends CI_Model
{
public function create($name,$weight,$order)
{
$data=array("name" => $name,"weight" => $weight,"order" => $order);
$query=$this->db->insert( "hq_pillar", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_pillar")->row();
return $query;
}
function getsinglepillar($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_pillar")->row();
return $query;
}
public function edit($id,$name,$weight,$order)
{
$data=array("name" => $name,"weight" => $weight,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_pillar", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_pillar` WHERE `id`='$id'");
return $query;
}
    public function getallpillars()
{
$query=$this->db->query("SELECT * FROM `hq_pillar`  ORDER BY `id` ASC")->result();
return $query;
}  
    public function updateweightage($range,$range1,$range2,$range3,$range4,$range5,$range6,$range7,$range8,$range9)
{
$data=array("weight" => $range);
$this->db->where( "id", 1 );
$query=$this->db->update( "hq_pillar", $data );

$data1=array("weight" => $range1);
$this->db->where( "id", 2 );
$query=$this->db->update( "hq_pillar", $data1 );
        
$data2=array("weight" => $range2);
$this->db->where( "id", 3 );
$query=$this->db->update( "hq_pillar", $data2 );
        
$data3=array("weight" => $range3);
$this->db->where( "id", 4 );
$query=$this->db->update( "hq_pillar", $data3 );
        
$data4=array("weight" => $range4);
$this->db->where( "id", 5 );
$query=$this->db->update( "hq_pillar", $data4 );
        
$data5=array("weight" => $range5);
$this->db->where( "id", 6 );
$query=$this->db->update( "hq_pillar", $data5 );
        
$data6=array("weight" => $range6);
$this->db->where( "id", 7 );
$query=$this->db->update( "hq_pillar", $data6 );
        
$data7=array("weight" => $range7);
$this->db->where( "id", 8 );
$query=$this->db->update( "hq_pillar", $data7 );
        
$data8=array("weight" => $range8);
$this->db->where( "id", 9 );
$query=$this->db->update( "hq_pillar", $data8 );
        
$data9=array("weight" => $range9);
$this->db->where( "id", 10 );
$query=$this->db->update( "hq_pillar", $data9 );
return 1;
}
	public function getpillardropdown()
	{
		$query=$this->db->query("SELECT * FROM `hq_pillar`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>
