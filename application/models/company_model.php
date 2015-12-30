<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class company_model extends CI_Model
{
public function create($name,$email,$package,$startdate,$enddate,$sector)
{
      $startdate = new DateTime($startdate);
    $startdate = $startdate->format('Y-m-d');
    $enddate = new DateTime($enddate);
    $enddate = $enddate->format('Y-m-d');
$data=array("name" => $name,"email" => $email,"package" => $package,"startdate" => $startdate,"enddate" => $enddate,"sector" => $sector);
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
public function edit($id,$name,$email,$package,$startdate,$enddate,$sector)
{
      $startdate = new DateTime($startdate);
    $startdate = $startdate->format('Y-m-d');
    $enddate = new DateTime($enddate);
    $enddate = $enddate->format('Y-m-d');
    $data=array("name" => $name,"email" => $email,"package" => $package,"startdate" => $startdate,"enddate" => $enddate,"sector" => $sector);
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
    public function getSectorDropDown()
	{
		$query=$this->db->query("SELECT * FROM `sector`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "Choose Sector"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}

    public function getcompanycount() {
        $query=$this->db->query("SELECT COUNT(*)as `countcompany` FROM `master_company`")->row();
        $query=$query->countcompany;
        return $query;
    }
    public function getblockedcompany() {
        $query=$this->db->query("SELECT COUNT(*)as `countcompany` FROM `master_company` WHERE `isblock`=1")->row();
        $query=$query->countcompany;
        return $query;
    } 
    public function getcompanysector() {
        $query=$this->db->query("SELECT * FROM `sector`")->result();
        foreach($query as $row)
        {
             $row->sectorcount=$this->db->query("SELECT COUNT(*) as `sector` FROM `master_company` WHERE `sector` =$row->id")->row();
        }
        return $query;
    }
    public function getpackageexpire() {
        $expiredate=date('Y-m-d', strtotime("+30 days"));
        $query=$this->db->query("SELECT COUNT(*) as `packageexpire` FROM `master_company` WHERE `enddate`='$expiredate'")->row();
        $packageexpirecount=$query->packageexpire;
        return $packageexpirecount;
    }
}



?>
