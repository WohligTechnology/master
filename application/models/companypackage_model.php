<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class companypackage_model extends CI_Model
{
public function create($company,$package)
{
    $data=array("company" => $company,"package" => $package);
    $query=$this->db->insert( "companypackage", $data );
    $id=$this->db->insert_id();
  
    // SEND CREDENTIALS ON COMPANY CREATE
    
    $companydetails=$this->company_model->getsinglecompany($company);
    $receiver=$companydetails->email;
    $companyid=$companydetails->id;
    $sender="vigwohlig@gmail.com";
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$id;
    // send email
        
        $this->load->library('email');
        $this->email->from($sender, 'Find below the details');
        $this->email->to($receiver);
        $this->email->subject('Please find below the credentials');
        $message = "<html>
      <p><span style='font-size:14px;font-weight:bold;padding:10px 0;'>Link: </span>
      <span>$exactpath</span>
      </p>
      <p>
      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Email: </span>
      <span>wohlig@wohlig.com</span>
      </p>
      <p>
      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Password: </span>
      <span>wohlig123</span>
      </p>
</html>";
        $this->email->message($message);
        $this->email->send();
    
    // ASSIGHNING A PACKAGE FOR A COMPANY
    
     $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/json/assignpackage?package='.$package;
    $exactpathtobackend=$mainurl.$companyid;
    
      // GET CURL
        $ch = curl_init();  
        $url=$exactpath;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch,CURLOPT_HEADER, false); 
        $output=curl_exec($ch);
        curl_close($ch);
    if(!$query)
    return  0;
    else
    return  $id;
}
public function beforeedit($id)
{
    $this->db->where("id",$id);
    $query=$this->db->get("companypackage")->row();
    return $query;
}
function getsinglecompany($id){
    $this->db->where("id",$id);
    $query=$this->db->get("companypackage")->row();
    return $query;
}
public function edit($id,$company,$package)
{
    $data=array("company" => $company,"package" => $package);
    $this->db->where( "id", $id );
    return 1;
}
public function delete($id)
{
    $query=$this->db->query("DELETE FROM `companypackage` WHERE `id`='$id'");
    return $query;
}

public function getimagebyid($id)
{
    $query=$this->db->query("SELECT `image` FROM `companypackage` WHERE `id`='$id'")->row();
    return $query;
}
}
?>
