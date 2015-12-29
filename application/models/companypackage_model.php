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
    // GET COMPANY DATA
    
    $querycompany=$this->db->query("SELECT * FROM `master_company` WHERE `id`='$company'")->row();
    $companyname=$querycompany->name;
    echo shell_exec("md $companyname");
    $file = 'newhq.zip';
    $newfile = "/$companyname";

    if (!copy($file, $newfile)) {
        echo "failed to copy $file...\n";
    }else{
        echo "copied $file into $newfile\n";
    }

    $companydetails=$this->company_model->getsinglecompany($company);
    $receiver=$companydetails->email;
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
