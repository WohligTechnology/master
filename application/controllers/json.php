<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getallcompany()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`master_company`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`master_company`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`master_company`.`email`";
$elements[2]->sort="1";
$elements[2]->header="Email";
$elements[2]->alias="email";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`master_company`.`package`";
$elements[3]->sort="1";
$elements[3]->header="Package";
$elements[3]->alias="package";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `master_company`");
$this->load->view("json",$data);
}
public function getsinglecompany()
{
$id=$this->input->get_post("id");
$data["message"]=$this->company_model->getsinglecompany($id);
$this->load->view("json",$data);
}
 
 public function createDatabase() {
     $name = $this->input->get("name");
     $filename = "/xampp/mysql/bin/demo.sql";
     $this->company_model->createAndPopuateDatabase($name,$filename);
 }
 public function greatest(){
     $nums=array(14,25,65,45,21);
     $greatest=$nums[0];
    for($i=0;$i<$nums;$i++)
    {
        if($nums[$i]>$greatest)
        {
            $greatest=$nums[$i];
        }
        
    }
     return $greatest;
 }
} ?>