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
     $receiver="pooja.wohlig@gmail.com";
         $password=$this->companypackage_model->checkrandom();
     $companyid=1;
     $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpathtobackend=$mainurl.$companyid;
     $exactpathforcredential=$mainurl.$companyid.'/index.php/json/changecredentials?email='.$receiver.'&pass='.$password;
     echo $exactpathforcredential;
    $exactpathtobackend=$mainurl.$companyid;

//     post
     $ch = curl_init();
 $url=$exactpathforcredential;
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"email=".$receiver."&pass=".$password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
     $old=error_reporting(0);
     echo $old;

curl_close ($ch);
 }

 public function greatest(){
       $mainurl = $this->input->get("mainurl");
       $company = $this->input->get("company");
     $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath="http://localhost/master/1/index.php/json/assignpackage?package=1";
    $exactpathtobackend=$mainurl.$company;
    echo $exactpath;
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
 }

 public function getpackageexpirecompanies() {
    $a=$this->company_model->getpackageexpirecompanies();
     print_r($a);
 }
 public function test() {
   $htmltext = $this->load->view('emailers/needtodo', $data, true);
 $this->menu_model->emailer($htmltext,'Welcome to Happyness Quotient!','pooja.wohlig@gmail.com',"Sir/Madam");
 }



 public function checkblockpackage()
{
  //package will expiure
    // willbe included in cron
     $todaysdate=date("Y-m-d");
     $query=$this->db->query("SELECT * FROM `master_company` WHERE `enddate` = '$todaysdate' AND `isblock`=0")->result();
    if(!empty($query))
    {
        foreach($query as $row)
        {
            $companyid=$row->id;
            $email=$row->email;
            $htmltext = $this->load->view('emailers/expired', $data, true);
            $this->menu_model->emailer($htmltext,'Your Happyness Quotient Package Has Expired!',$email,"Sir/Madam");
            $this->company_model->blockCompanyModel($companyid);
        }
    }
}
public function checkpackagesendemail()
{
  // reminder package will expire
    // willbe included in cron
     $dayafter30days=date("Y-m-d",strtotime("+15 days"));
     $query=$this->db->query("SELECT * FROM `master_company` WHERE `enddate` = '$dayafter30days' AND `isblock`=0")->result();
    if(!empty($query))
    {
        foreach($query as $row)
        {
            $companyid=$row->id;
            $companyname=$row->name;
            $email=$row->email;
            $htmltext = $this->load->view('emailers/expirenote', $data, true);
          $this->menu_model->emailer($htmltext,'Your Happyness Quotient Package Is About To Expire!',$email,"Sir/Madam");
        }
    }
}
public function check()
{
  $data=array("status" => 1);
  $query=$this->db->insert( "cron", $data );
  $id=$this->db->insert_id();
}


	public function emailer()
		{
					$query=$this->db->query("SELECT * FROM `emailer`")->row();
					$username=$query->username;
					$password=$query->password;
					$url = 'https://api.sendgrid.com/';
					$user=base64_decode($username);
					$pass=base64_decode($password);
					$params = array(
							'api_user'  => $user,
							'api_key'   => $pass,
							'to'        => "pooja@wohlig.com",
							'subject'   => "Test",
							'html'      => "<p>Hiii</p>",
							'text'      => 'Will Never Grow Up',
							'from'      => 'info@willnevergrowup.com',
							'fromname'      => 'Happyness Quotient',
						);

					$request =  $url.'api/mail.send.json';
					$session = curl_init($request);
					curl_setopt ($session, CURLOPT_POST, true);
					curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
					curl_setopt($session, CURLOPT_HEADER, false);
					curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
					curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line

					curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($session);

					// print everything out
					////var_dump($response,curl_error($session),curl_getinfo($session));
	       print_r($response);
					curl_close($session);

		}
} ?>
