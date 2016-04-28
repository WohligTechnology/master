<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallbranch()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_branch`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_branch`.`language`";
$elements[1]->sort="1";
$elements[1]->header="Language";
$elements[1]->alias="language";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_branch`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_branch`.`branchid`";
$elements[3]->sort="1";
$elements[3]->header="Branch Id";
$elements[3]->alias="branchid";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_branch`.`address`";
$elements[4]->sort="1";
$elements[4]->header="Address";
$elements[4]->alias="address";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_branch`");
$this->load->view("json",$data);
}
public function getsinglebranch()
{
$id=$this->input->get_post("id");
$data["message"]=$this->branch_model->getsinglebranch($id);
$this->load->view("json",$data);
}
function getalldepartment()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_department`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_department`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_department`.`deptid`";
$elements[2]->sort="1";
$elements[2]->header="Dept id";
$elements[2]->alias="deptid";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_department`");
$this->load->view("json",$data);
}
public function getsingledepartment()
{
$id=$this->input->get_post("id");
$data["message"]=$this->department_model->getsingledepartment($id);
$this->load->view("json",$data);
}
function getalldesignation()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_designation`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_designation`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_designation`.`language`";
$elements[2]->sort="1";
$elements[2]->header="Language";
$elements[2]->alias="language";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_designation`");
$this->load->view("json",$data);
}
public function getsingledesignation()
{
$id=$this->input->get_post("id");
$data["message"]=$this->designation_model->getsingledesignation($id);
$this->load->view("json",$data);
}
function getallpillar()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_pillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_pillar`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`weight`";
$elements[2]->sort="1";
$elements[2]->header="Weight";
$elements[2]->alias="weight";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_pillar`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_pillar`");
$this->load->view("json",$data);
}
public function getsinglepillar()
{
$id=$this->input->get_post("id");
$data["message"]=$this->pillar_model->getsinglepillar($id);
$this->load->view("json",$data);
}
function getallquestion()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_question`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_question`.`pillar`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_question`.`noofans`";
$elements[2]->sort="1";
$elements[2]->header="Number of answer";
$elements[2]->alias="noofans";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_question`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_question`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Time stamp";
$elements[4]->alias="timestamp";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`hq_question`.`text`";
$elements[5]->sort="1";
$elements[5]->header="Text";
$elements[5]->alias="text";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_question`");
$this->load->view("json",$data);
}
public function getsinglequestion()
{
$id=$this->input->get_post("id");
$data["message"]=$this->question_model->getsinglequestion($id);
$this->load->view("json",$data);
}
function getalloptions()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_options`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_options`.`question`";
$elements[1]->sort="1";
$elements[1]->header="Question";
$elements[1]->alias="question";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_options`.`representation`";
$elements[2]->sort="1";
$elements[2]->header="Representation";
$elements[2]->alias="representation";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_options`.`actualorder`";
$elements[3]->sort="1";
$elements[3]->header="Actual Order";
$elements[3]->alias="actualorder";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_options`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`hq_options`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`hq_options`.`weight`";
$elements[6]->sort="1";
$elements[6]->header="Weight";
$elements[6]->alias="weight";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`hq_options`.`optiontext`";
$elements[7]->sort="1";
$elements[7]->header="Option Text";
$elements[7]->alias="optiontext";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`hq_options`.`text`";
$elements[8]->sort="1";
$elements[8]->header="Text";
$elements[8]->alias="text";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_options`");
$this->load->view("json",$data);
}
public function getsingleoptions()
{
$id=$this->input->get_post("id");
$data["message"]=$this->options_model->getsingleoptions($id);
$this->load->view("json",$data);
}
function getalluseranswer()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_useranswer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_useranswer`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_useranswer`.`pillar`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_useranswer`.`question`";
$elements[3]->sort="1";
$elements[3]->header="Question";
$elements[3]->alias="question";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_useranswer`.`option`";
$elements[4]->sort="1";
$elements[4]->header="Option";
$elements[4]->alias="option";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`hq_useranswer`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`hq_useranswer`.`timestamp`";
$elements[6]->sort="1";
$elements[6]->header="Time stamp";
$elements[6]->alias="timestamp";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_useranswer`");
$this->load->view("json",$data);
}
public function getsingleuseranswer()
{
$id=$this->input->get_post("id");
$data["message"]=$this->useranswer_model->getsingleuseranswer($id);
$this->load->view("json",$data);
}
function getalluserpillar()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_userpillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_userpillar`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_userpillar`.`pillar`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_userpillar`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Time stamp";
$elements[3]->alias="timestamp";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_userpillar`");
$this->load->view("json",$data);
}
public function getsingleuserpillar()
{
$id=$this->input->get_post("id");
$data["message"]=$this->userpillar_model->getsingleuserpillar($id);
$this->load->view("json",$data);
}
function getallcontent()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_content`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`hq_content`.`pillar`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`hq_content`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`hq_content`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Time stamp";
$elements[3]->alias="timestamp";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`hq_content`.`text`";
$elements[4]->sort="1";
$elements[4]->header="Text";
$elements[4]->alias="text";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_content`");
$this->load->view("json",$data);
}
public function getsinglecontent()
{
$id=$this->input->get_post("id");
$data["message"]=$this->content_model->getsinglecontent($id);
$this->load->view("json",$data);
}

 //functions by avinash

     public function generatejson()
     {
         $data1=$this->menu_model->getgeneratedjson();
         $data['message']=$data1;
         $this->load->view('json',$data);
     }

 public function getQuestionAnswer()
     {
         $data['message']=$this->restapi_model->getQuestionAnswer();
         $this->load->view('json',$data);
     }
 public function getSingleQuestionAndOption()
     {
         $id=$this->input->get_post("id");
         $data['message']=$this->restapi_model->getSingleQuestionAndOption($id);
         $this->load->view('json',$data);
     }



 public function viewfirstpage()
 {
     $data['id']=$this->input->get('id');
      $data['pillardata']=$this->pillar_model->getallpillars();
      $data["checkpackage"]=$this->menu_model->checkpackage();
     $data['lastpillardetail']=$this->pillar_model->lastpillardetail();
     $data['before']=$this->pillar_model->getpillarweightforedit();
      $this->user_model->makeuserold($this->session->userdata("id"));
      $this->load->view('pillar',$data);
 }
 public function blockBackend()
 {
      $data['pillardata']=$this->menu_model->blockBackend();
      $this->load->view('pillar',$data);
 }
 public function unBlockCompany()
 {
      $data['pillardata']=$this->menu_model->unBlockCompany();
      $this->load->view('pillar',$data);
 }
 public function getinterlinkage()
 {
        $gender=$this->input->get('gender');
        $maritalstatus=$this->input->get('maritalstatus');
        $designation=$this->input->get('designation');
        $department=$this->input->get('department');
        $spanofcontrol=$this->input->get('spanofcontrol');
        $experience=$this->input->get('experience');
        $salary=$this->input->get('salary');
        $branch=$this->input->get('branch');
        $data['message']=$this->menu_model->getinterlinkage($gender,$maritalstatus,$designation,$department,$spanofcontrol,$experience,$salary,$branch);
        $this->load->view('json',$data);
 }
   public function sendMailToEachUser()
   {
//       $getUserid=$this->restapi_model->getUsers();
//       print_r($getUserid);
//        foreach($getUserid as $getUserid){
//            $email=$getUserid->email;
//             $hashvalue=base64_encode ($getUserid->id."&hq");
             $hashvalue=base64_encode ("16&hq");
       $link="<a href='http://wohlig.co.in/hqfront/#/playing/$hashvalue'>Click here </a> To get questions.";
            echo $link;
               $this->load->library('email');
       $this->email->from('master@willnevergrowup.in', 'HQ');
       $this->email->to('jagruti@wohlig.com');
         $this->email->subject('Your Happiness at Work matters!');
       $message = "<html>
        <p>Dear Colleagues,</p><br>
      <p>We've always believed that you are the driving force of this organization and that your happiness at work is what matters to ensure that we meet our goals. As a part of this belief and efforts in this area, here's a fun and simple survey we'd like you to take part in </p><span>$link</span><br>
<p>Quick tip: Pick the answer you believe in. All responses are kept confidential. </p><br>
<p>Please feel free to reach out to the HR Team in case of any queries. We are happy to help. </p><br>
<p>Team HR </p><br>
      </html>";
       $this->email->message($message);
       $this->email->send();

//        }

       return 1;
   }

 public function assignpackage(){
     $package=$this->input->get_post('package');
     $expiredate=$this->input->get_post('expiredate');
     $this->menu_model->enablemenu($package,$expiredate);
 }
  public function sendsurveyquestion()
  {
        $surveyid=$this->input->get('id');

      $gettotalemails=$this->db->query("SELECT `id`, `survey`, `email`, `status`, `userid` FROM `hq_surveyquestionuser` WHERE `survey`='$surveyid'")->result();
        foreach($gettotalemails as $gettotalemail)
        {
            $email=$gettotalemail->email;
            $userid=$gettotalemail->userid;
            $hashvalue=base64_encode ($userid."&hq");
            $link="<a href='http://wohlig.co.in/hqfront/#/playing/$hashvalue'>Click here </a> To get questions.";
            $data['link']=$link;
    				  $htmltext = $this->load->view('emailers/opinion', $data, true);
    				$this->menu_model->emailer($htmltext,'Your Happiness at Work matters!',$email,"Sir/Madam");
	 }
       redirect( base_url() . 'index.php/site/viewconclusionfinalsuggestion', 'refresh' );
  }
  public function pingHqForSurvey()
 	{

      $data = json_decode(file_get_contents('php://input'), true);
      $user=$data["user"];
      $survey=$data["survey"];
	 	$data['message'] = $this->restapi_model->pingHqForSurvey($user,$survey);
	 	$this->load->view('json', $data);
 	}
  public function pingHq()
 	{
      $data = json_decode(file_get_contents('php://input'), true);
      $user=$data["user"];
	 	$data['message'] = $this->restapi_model->pingHq($user);

	 	$this->load->view('json', $data);
 	}
 public function storeUserAnswer()
     {
      $data = json_decode(file_get_contents('php://input'), true);
      $user=$data["user"];
      $option=$data["option"];
      $question=$data["question"];
      $test=$data["test"];
     if(empty($data)){
          $data['message']=0;
     }
     else{
         $data['message']=$this->restapi_model->storeUserAnswer($user,$option,$question,$test);
     }

         $this->load->view('json',$data);
     }
 public function storeSurveyAnswer()
     {
      $data = json_decode(file_get_contents('php://input'), true);
      $answer=$data;
         $data['message']=$this->restapi_model->storeSurveyAnswer($answer);
         $this->load->view('json',$data);
     }
 public function sendlogo(){
     $query=$this->db->query("SELECT * FROM `logo` WHERE 1")->row();
     $image=$query->image;
     $data['message']=$query;
    $this->load->view('json',$data);
 }
  public function changecredentials(){
     $email=$this->input->get_post('email');
     $password=$this->input->get_post('pass');
     $package=$this->input->get_post('package');
     $expiredate=$this->input->get_post('expiredate');
     $password=md5($password);
     $this->db->query(" UPDATE `user` SET `email`='$email',`password`='$password' WHERE `id`='1'");
     $this->db->query(" UPDATE `user` SET `package`='$package',`expirydate`='$expiredate'");
 }
 public function checkweight(){
         $range=$this->input->get_post('range');
         $range1=$this->input->get_post('rangeone');
         $range2=$this->input->get_post('rangetwo');
         $range3=$this->input->get_post('rangethree');
         $range4=$this->input->get_post('rangefour');
         $range5=$this->input->get_post('rangefive');
         $range6=$this->input->get_post('rangesix');
         $range7=$this->input->get_post('rangeseven');
         $range8=$this->input->get_post('rangeeight');
         $range9=$this->input->get_post('rangenine');
         $range11=$this->input->get_post('rangeeleven');
        $value=$this->pillar_model->updateweightage($range,$range1,$range2,$range3,$range4,$range5,$range6,$range7,$range8,$range9,$range11);
//        if($value==1){
//           echo "Proper wieght";
//        }
//        else if($value==0){
//             echo " Wrong";
//        }
 }
 public function checkexport()
 {
     $surveyid=1;
        $getsurveyname=$this->db->query("SELECT * FROM `hq_conclusionfinalsuggestion` WHERE `id`=1")->row();
        $surveyname=$getsurveyname->conclusion;
        $textoption=$this->db->query("SELECT `type` FROM `hq_surveyquestion` WHERE `survey`='$surveyid' AND `type` IN (1,2)")->result();

        foreach($textoption as $row){
            $query=$this->db->query("SELECT  `hq_surveyquestionanswer`.`user`,`user`.`email` as `Email`, `hq_surveyquestionanswer`.`question`,`hq_surveyquestion`.`content`, `hq_surveyquestionanswer`.`option`, `hq_surveyquestionanswer`.`survey` FROM `hq_surveyquestionanswer`
INNER JOIN `user` ON `user`.`id`=`hq_surveyquestionanswer`.`user`
INNER JOIN `hq_surveyquestion` ON `hq_surveyquestion`.`id`=`hq_surveyquestionanswer`.`question`
WHERE `hq_surveyquestionanswer`.`survey`='$surveyid' AND `hq_surveyquestion`.`survey` IN(1,2)
ORDER BY `hq_surveyquestionanswer`.`question` ASC")->result();
        }
		$idoption=$this->db->query("SELECT `type` FROM `hq_surveyquestion` WHERE `survey`='$surveyid' AND `type` IN (3,4)")->result();
         foreach($idoption as $row){
            $query1=$this->db->query("SELECT  `hq_surveyquestionanswer`.`user`,`user`.`email` as `Email`, `hq_surveyquestionanswer`.`question`,`hq_surveyquestion`.`content` as `content`, `hq_surveyoption`.`title` as `option`, `hq_surveyquestionanswer`.`survey` FROM `hq_surveyquestionanswer`
INNER JOIN `user` ON `user`.`id`=`hq_surveyquestionanswer`.`user`
INNER JOIN `hq_surveyquestion` ON `hq_surveyquestion`.`id`=`hq_surveyquestionanswer`.`question`
INNER JOIN `hq_surveyoption` ON `hq_surveyoption`.`id`=`hq_surveyquestionanswer`.`option`
WHERE `hq_surveyquestionanswer`.`survey`='$surveyid' AND `hq_surveyquestion`.`survey` IN(3,4)
ORDER BY `hq_surveyquestionanswer`.`question` ASC")->result();
        }
     $arr=array_merge($query,$query1);

//     $mdarr=array();
//      for($i=0; $i<count($arr);$i++){
//          $temp = array();
//
//          array_push($temp,$arr[$i]->user,$arr[$i]->content,$arr[$i]->option);
//          array_push($mdarr,$temp);
//     }
//     echo count($mdarr);
//     print_r($mdarr);
 print_r($arr);

 }


  /* <div class="option2">
                    <div class="row">
                        <div class="input-field col s8 m8">
                            <input type="text" name="option2" id="option2" value=" <?php echo $option[0]->options[1]->title;?>">
                            <input type="hidden" name="option1id" id="option1id" value=" <?php echo $option[0]->options[0]->id;?>">
                            <label>Option</label>
                        </div>
                        <div class="input-field col s2 m2">
                            <div onclick="hidedelete('option2')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">delete</i>
                            </div>
                            <div onclick="showoption('option2','option3')" class="btn btn-xs less-pad">
                                <i class="material-icons propericon">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                */

 public function test(){
     for($i=91;$i<=100;$i++){
         $j = $i+1;
        print '<div class="option'.$i.'">
        <div class="row">
         <div class="input-field col s8 m8"><input type="text" name="option'.$i.'" value="<?php echo $option[0]->options['.$i.']->title;?>" id="option'.$i.'"><input type="hidden" name="option'.$i.'id" value="<?php echo $option[0]->options['.$i.']->id;?>" id="option'.$i.'id">
         <label>Option</label>
         </div>
         <div class="input-field col s2 m2">
         <div onclick="hidedelete(\'option'.$i.'\')" class="btn btn-xs less-pad"><i class="material-icons propericon">delete</i></div>
          <div onclick="showoption(\'option'.$i.'\',\'option'.$j.'\')" class="btn btn-xs less-pad"><i class="material-icons propericon">add</i></div></div></div></div>';
     }


 }
 public function test1(){
      for($i=91;$i<=100;$i++){
          $j=10;
          echo "//  option".$i;
          echo "\n";
          echo "\n";
          echo 'if($option'.$i.'id =="")';
          echo "\n";
          echo "{";
          echo "\n";
           echo '       if($option'.$i.' !="")';
          echo "\n";
          echo "        {";
          echo "\n";
          echo '            $data=array("question" => $question'.$j.'id,"title" => $option'.$i.');';
          echo "\n";
          echo   '            $query=$this->db->insert( "hq_surveyoption", $data );';
          echo "\n";
          echo '            $option'.$i.'id=$this->db->insert_id();';
           echo "\n";
          echo "        }";
           echo "\n";
          echo "}";
           echo "\n";
          echo "else";
           echo "\n";
          echo "        {";
           echo "\n";
          echo '            $data=array("question" => $question'.$j.'id,"title" => $option'.$i.');';
          echo "\n";
        echo '              $this->db->where( "id", $option'.$i.'id );';
          echo "\n";
          echo   '          $query=$this->db->update( "hq_surveyoption", $data );';
          echo "\n";
          echo "        }";
           echo "\n";
           echo "\n";
           //  option7

//                    if($option7id =="")
//                    {
//                        if($option7 !=''){
//                    $data=array("question" => $question1id,"title" => $option7);
//                    $query=$this->db->insert( "hq_surveyoption", $data );
//                    $option7id=$this->db->insert_id();
//                    }
//                    }
//                    else
//                    {
//                    $data=array("question" => $question1id,"title" => $option7);
//                    $this->db->where( "id", $option7id );
//                    $query=$this->db->update( "hq_surveyoption", $data );
//                    }

 }
 }
     public function test2()
     {
         echo '//question '.$j.''; echo "\n";
      for($i=1;$i<=10;$i++)
      {
          $j=1;

       echo '//option'.$i.''; echo "\n";
        echo '$data=array("question" => $question'.$j.'id,"title" => $option'.$i.');'; echo "\n";
       echo '$this->db->where( "id", $option'.$i.'id );'; echo "\n";
          echo '$query=$this->db->update( "hq_surveyoption", $data );'; echo "\n";echo "\n";

      }
    }
 public function abc()
     {
     $query = $this->db->query("SELECT * FROM `hq_question`")->result();
     $testdetail=$this->db->query("SELECT * FROM `test`")->row();
     $startdate=$testdetail->startdate;
     $schedule=$testdetail->schedule;
     $checkpackage=$this->db->query("SELECT * FROM `user`")->row();
     $package=$checkpackage->package;
     if($package==4){
         $noofquestions=46;
     }
     else{
        $noofquestions=42;
     }

        //ASSIGN DATES ACCORDING TO SCHEDULE
         if($schedule==1)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=7;
             $units=ceil($noofquestions/7);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");
                }

         }

     if($schedule==2)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=14;
             $units=ceil($noofquestions/$noofdays);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");
                }

         }
     if($schedule==3)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=21;
             $units=ceil($noofquestions/$noofdays);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");
                }

         }
     if($schedule==4)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=28;
             $units=ceil($noofquestions/$noofdays);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");
                }

         }

    }
 public function setCron()
 {
     $query1=$this->db->query("SELECT * FROM `user` WHERE `expirydate` <=NOW()")->row();
//    don't send que
     if(empty($query1))
     {
         $query = $this->db->query("SELECT * FROM `hq_question` WHERE `date`<=NOW()")->result();
         if(!empty($query))
         {
            $getUserid=$this->restapi_model->getUsers();
            foreach($getUserid as $getUserid)
            {
            $email=$getUserid->email;
            $hashvalue=base64_encode ($getUserid->id."&hq");
            $link="<a href='http://wohlig.co.in/hqfront/#/playing/$hashvalue'>Click here </a> To get questions.";
            $data['link']=$link;
              $htmltext = $this->load->view('emailers/userquestion', $data, true);
            $this->menu_model->emailer($htmltext,'Your Happiness at Work matters!',$email,"Sir/Madam");

           }
            }
            // new journey mainurl
            $getdate=$this->db->query("SELECT * FROM `hq_question` ORDER BY `date` DESC")->row();
            $lastdate=$getdate->date;
            $todaysdate = date('Y-m-d');
            if($lastdate==$todaysdate){
              $adminmail=$this->db->query("SELECT * FROM `user` WHERE `id`=1")->row();
              $adminemail=$adminmail->email;
              $htmltext = $this->load->view('emailers/thankyou', $data, true);
              $this->menu_model->emailer($htmltext,'Thank You For Your Participation!',$adminemail,"Sir/Madam");


                  $dateafter7day=date_add($lastdate,date_interval_create_from_date_string("7 days"));
                  if($dateafter7day==$todaysdate){
                    // new journey mail
                    $data['link']=site_url('site/viewconclusionfinalsuggestion');
                    $htmltext = $this->load->view('emailers/newjourney', $data, true);
                    $this->menu_model->emailer($htmltext,'Another Happyness Journey Begins!',$adminemail,"Sir/Madam");
                    // mini survey intro
                    $htmltext = $this->load->view('emailers/mini-survey', $data, true);
                    $this->menu_model->emailer($htmltext,'Mini Surveys-Here’s What You Need To Do!',$adminemail,"Sir/Madam");
                  }

         }
     }
     else{
//         do nothing
         echo "in else";
     }

 }




 } ?>
