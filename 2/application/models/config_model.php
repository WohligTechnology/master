<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class config_model extends CI_Model
{

public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("config")->row();
return $query;
}

public function edit($id,$name,$androidtext,$iostext,$image)
{
$data=array("name" => $name,"androidtext" => $androidtext,"iostext" => $iostext,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "config", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `config` WHERE `id`='$id'");
return $query;
}
 public function getpemById()
    {
        $query = $this->db->query('SELECT `image` FROM `config` WHERE `id`=1')->row();
        $image = $query->image;

        return $image;
    }
}
?>
