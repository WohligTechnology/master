<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class company_model extends CI_Model
{
public function create($name,$email,$package)
{
$data=array("name" => $name,"email" => $email,"package" => $package);
$query=$this->db->insert( "master_company", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("master_company")->row();
return $query;
}
function getsinglecompany($id){
$this->db->where("id",$id);
$query=$this->db->get("master_company")->row();
return $query;
}
public function edit($id,$name,$email,$package)
{
    $data=array("name" => $name,"email" => $email,"package" => $package);
$this->db->where( "id", $id );
$query=$this->db->update( "master_company", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `master_company` WHERE `id`='$id'");
$query=$this->db->query("DELETE FROM `companypackage` WHERE `company`=$id");
return $query;
}

public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `master_company` WHERE `id`='$id'")->row();
return $query;
}
    public function getCompanyDropDown()
	{
		$query=$this->db->query("SELECT * FROM `master_company`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "Choose Company"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}

    
//    public function createAndPopuateDatabase($name,$file) {
//        echo "mysql -h localhost -u root -e \"CREATE DATABASE $name\"";
//        echo shell_exec("/xampp/htdocs/mysql/bin -h localhost -u root -e \"CREATE DATABASE $name\"");
//        echo shell_exec("/xampp/htdocs/mysql/bin -h localhost -u root  $name < $file");
//    } 
    public function getcompanycount() {
        $query=$this->db->query("SELECT COUNT(*)as `countcompany` FROM `master_company`")->row();
        $query=$query->countcompany;
        return $query;
    }
}



?>
