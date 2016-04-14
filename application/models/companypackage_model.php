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
  
    //update company package
     $data1=array("package" => $package);
    $this->db->where( "id", $company );
    $query=$this->db->update( "master_company", $data1 );
    //COMPANY PACKAGE
     $package=$companydetails->package;
        if($package==1){
            $package="Starter";
        }
        else if($package==2){
            $package="Advance";
        }
        else if($package==3){
            $package="Pro";
        }
        else if($package==4){
            $package="Pro Plus";
        }
    
    
    // SEND CREDENTIALS ON COMPANY CREATE
    
    $companydetails=$this->company_model->getsinglecompany($company);
    $receiver=$companydetails->email;
    $companyid=$companydetails->id;
    $expiredate=$companydetails->enddate;
    $sender="master@willnevergrowup.in";
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $password=$this->companypackage_model->checkrandom();
    $exactpath=$mainurl.$id;
    // send email
        
        $this->load->library('email');
        $this->email->from($sender, 'Never Grow Up');
        $this->email->to($receiver);
        $this->email->subject('Welcome to never grow up');
        $message = "<html>
        <p>Hey Happyness Torch-bearer,</p><br>
        <p>Welcome aboard!</p><br>
        <p>Your company has now been registered on Happyness Quotient with <b>$package<b> Package.</p><br>
        <p>Please use the below ID and Password to access your company profile:</p><br>
        <p><span style='font-size:14px;font-weight:bold;padding:10px 0;'>Link: </span>
      <span>$exactpath</span>
      </p><br>
        <p>
          <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Email: </span>
          <span>$receiver</span>
          </p><br>
      <p>
      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Password: </span>
      <span>$password</span>
      </p><br>
      <p>Let's make a difference in your company by measuring Happyness at Work. We are exciting to have 
you with us on this journey.</p><br>
<p>For any queries/support, you can contact us on ___________________</p><br>
<p>Happy to help!</p><br>
<p>Regards,</p><br>
<p>Team Never Grow Up</p><br>
<p>-------------------------------------------------------------------------------</p><br>
<p>Note: This is a system generated email, do not respond to this.</p><br>
      
</html>";
        $this->email->message($message);
        $this->email->send();
    
   
    
    // ASSIGHNING A CREDENTIALS FOR A COMPANY
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpathforcredential=$mainurl.$companyid.'/index.php/json/changecredentials?email='.$receiver.'&pass='.$password;
    $exactpathtobackend=$mainurl.$companyid;
      // GET CURL
        $ch = curl_init();  
        $url=$exactpathforcredential;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch,CURLOPT_HEADER, false); 
        $output=curl_exec($ch);
        curl_close($ch);
    
      // ASSIGHNING A PACKAGE FOR A COMPANY
    
     $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/json/assignpackage?package='.$package.'&expiredate='.$expiredate;
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
   
     public function checkrandom($length = 10)
	{
	$alphabets = range('A', 'Z');
	$numbers = range('0', '9');
	$smallletters = range('a', 'z');
	$final_array = array_merge($alphabets, $numbers, $smallletters);
	$password = '';
	while ($length--)
		{
		$key = array_rand($final_array);
		$password.= $final_array[$key];
		}

	return $password;
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
    $query=$this->db->update( "companypackage", $data );
    
       //update company package
     $data1=array("package" => $package);
    $this->db->where( "id", $company );
    $query=$this->db->update( "master_company", $data1 );
        
    $companydetails=$this->company_model->getsinglecompany($company);
    $receiver=$companydetails->email;
    $companyid=$companydetails->id;
    $expiredate=$companydetails->enddate;
        
        
       // ASSIGHNING A PACKAGE FOR A COMPANY
    
     $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/json/assignpackage?package='.$package.'&expiredate='.$expiredate;
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
