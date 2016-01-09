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
    public function blockCompanyModel($companyid)
{
//          // SEND ALERT
//    
   
//        // START MAIL
//        require 'Mandrill.php';
//
//$mandrill = new Mandrill(); 
//
//// If are not using environment variables to specific your API key, use:
//// $mandrill = new Mandrill("YOUR_API_KEY")
//
//$message = array(
//    'subject' => 'Test message',
//    'from_email' => $sender,
//    'html' => '<p>this is a test message with Mandrill\'s PHP wrapper!.</p>',
//    'to' => array(array('email' => $receiver, 'name' => 'Recipient 1')),
//    'merge_vars' => array(array(
//        'rcpt' => $receiver,
//        'vars' =>
//        array(
//            array(
//                'name' => 'FIRSTNAME',
//                'content' => 'Recipient 1 first name'),
//            array(
//                'name' => 'LASTNAME',
//                'content' => 'Last name')
//    ))));
//
//$template_name = 'Stationary';
//
//$template_content = array(
//    array(
//        'name' => 'main',
//        'content' => 'Hi *|FIRSTNAME|* *|LASTNAME|*, thanks for signing up.'),
//    array(
//        'name' => 'footer',
//        'content' => 'Copyright 2012.')
//
//);
//
//print_r($mandrill->messages->sendTemplate($template_name, $template_content, $message));

        // END MAIL
        
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/json/blockBackend';
    $this->db->query("UPDATE `master_company` SET `isblock`=1 WHERE `id`='$companyid'");
        // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "$exactpath");
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);
        
        // MAIL SENT 
        
     $companydetails=$this->company_model->getsinglecompany($companyid);
    $receiver=$companydetails->email;
    $sender="vigwohlig@gmail.com";
//        $this->load->library('email');
        $this->email->from($sender, 'Demo Alert Mail');
        $this->email->to($receiver);
        $this->email->subject('Please find below the credentials');
        $message = "<html>
   
      <p>
      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>A simple alert: </span>
      <span>Your Package Is Expired...You Cannot Login Any More.</span>
      </p>
</html>";
        $this->email->message($message);
        $this->email->send();

}
   
}



?>
