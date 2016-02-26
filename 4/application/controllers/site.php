<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function __construct( )
	{
		parent::__construct();

		$this->is_logged_in();
	}

	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
     public function getpillarforpie(){
         $data['message']=$this->menu_model->drawpillarjsononhrdashboaard1($gender,$maritalstatus,$designation,$department,$spanofcontrol,$experience,$salary,$branch);
         $this->load->view("json",$data);

    }
    public function getdatabyfiltering(){
        $access = array("1","2","3","5");
		$this->checkaccess($access);
        $gender=$this->input->get('gender');
        $maritalstatus=$this->input->get('maritalstatus');
        $designation=$this->input->get('designation');
        $department=$this->input->get('department');
        $spanofcontrol=$this->input->get('spanofcontrol');
        $experience=$this->input->get('experience');
        $salary=$this->input->get('salary');
        $branch=$this->input->get('branch');

        $pillarsdata=$this->menu_model->drawpillarjsononhrdashboaard1($gender,$maritalstatus,$designation,$department,$spanofcontrol,$experience,$salary,$branch);

        $data["message"] = $pillarsdata;
        
		$this->load->view( 'json', $data );

    }
    public function index()
	{
		$access = array("1","2","3","5");
        $data['empcount']=$this->user_model->getEmployeeCount();
		$this->checkaccess($access);
        $pillarsdata=$this->menu_model->drawpillarjsononhrdashboaard();
        $totalsum=0;
        $totalexpected=0;
        foreach($pillarsdata as $row)
        {
            for($i=0;$i<count($row);$i++)
            {
                $totalsum=$totalsum+($row[$i]->expectedweight *$row[$i]->pillaraveragevalues)/100;
                $totalexpected=$totalexpected+($row[$i]->weight * $row[$i]->pillaraveragevalues)/100;
               
            }
        }
//        $data['totalsum']=number_format((float)$totalsum, 2, '.', ''); 
//        $data['totalexpected']=number_format((float)$totalexpected, 2, '.', '');
        
        $data['totalsum']=floor($totalsum); 
        $data['totalexpected']=floor($totalexpected); 
        $data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
        $data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
        $data[ 'gender' ] =$this->user_model->getgendertypedropdown();
		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
        $data["checkpackage"]=$this->menu_model->checkpackage();
        $data['before']=$this->pillar_model->getpillarweightforedit();
        $data['showavg']=$this->pillar_model->showavg();
        $data['lastpillardetail']=$this->pillar_model->lastpillardetail();
		$this->load->view( 'template', $data );
//        }

	}

    public function index2()
	{
		$access = array("1","2","3","5");
		$this->checkaccess($access);

		$data[ 'page' ] = 'dashboard2';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );

	}

	public function createuser()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data[ 'gender' ] =$this->user_model->getgendertypedropdown();
		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
		$data[ 'team' ] =$this->user_model->getteamdropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );
	}
	function createusersubmit()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
				$data[ 'gender' ] =$this->user_model->getgendertypedropdown();
		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
//            $data['category']=$this->category_model->getcategorydropdown();
			$data[ 'team' ] =$this->user_model->getteamdropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $username=$this->input->post('username');
            $gender=$this->input->post('gender');
            $age=$this->input->post('age');
            $maritalstatus=$this->input->post('maritalstatus');
            $designation=$this->input->post('designation');
            $department=$this->input->post('department');
            $noofyearsinorganization=$this->input->post('noofyearsinorganization');
            $spanofcontrol=$this->input->post('spanofcontrol');
            $description=$this->input->post('description');
            $employeeid=$this->input->post('employeeid');
            $branch=$this->input->post('branch');
            $language=$this->input->post('language');
            $team=$this->input->post('team');
            $salary=$this->input->post('salary');

             $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$username,$gender,$age,$maritalstatus,$designation,$department,$noofyearsinorganization,$spanofcontrol,$description,$employeeid,$branch,$language,$team,$salary)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");

		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    function viewusersjson()
	{
		$access = array("1","3","2","5");
		$this->checkaccess($access);

        $where=" 1";
        if($this->session->userdata('accesslevel')==3){
             $where=" `user`.`accesslevel`>2";
        }

        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";

        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";

        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";

        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";

        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";

        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";


        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }

        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`","WHERE $where");

		$this->load->view("json",$data);
	}


	function edituser()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data[ 'gender' ] =$this->user_model->getgendertypedropdown();
		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
		$data[ 'team' ] =$this->user_model->getteamdropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);

		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
				$data[ 'gender' ] =$this->user_model->getgendertypedropdown();
		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
			$data[ 'team' ] =$this->user_model->getteamdropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{

            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
			$username=$this->input->post('username');
            $gender=$this->input->post('gender');
            $age=$this->input->post('age');
            $maritalstatus=$this->input->post('maritalstatus');
            $designation=$this->input->post('designation');
            $department=$this->input->post('department');
            $noofyearsinorganization=$this->input->post('noofyearsinorganization');
            $spanofcontrol=$this->input->post('spanofcontrol');
            $description=$this->input->post('description');
            $employeeid=$this->input->post('employeeid');
            $branch=$this->input->post('branch');
            $timestamp=$this->input->post('timestamp');
            $language=$this->input->post('language');
            $team=$this->input->post('team');
            $salary=$this->input->get_post('salary');

            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }

			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$username,$gender,$age,$maritalstatus,$designation,$department,$noofyearsinorganization,$spanofcontrol,$description,$employeeid,$branch,$timestamp,$language,$team,$salary)==0)
			$data['alerterror']="User editing was unsuccesful";
			else
			$data['alertsuccess']="User edited successfully.";

			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);

		}
	}

	function deleteuser()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1","3");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}



    public function viewbranch()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewbranch";
$data["base_url"]=site_url("site/viewbranchjson");
$data["title"]="View branch";
$this->load->view("template",$data);
}
function viewbranchjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_branch`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_branch`.`language`";
$elements[1]->sort="1";
$elements[1]->header="Language";
$elements[1]->alias="language";
$elements[2]=new stdClass();
$elements[2]->field="`hq_branch`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";
$elements[3]=new stdClass();
$elements[3]->field="`hq_branch`.`branchid`";
$elements[3]->sort="1";
$elements[3]->header="Branch Id";
$elements[3]->alias="branchid";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_branch`");
$this->load->view("json",$data);
}

public function createbranch()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createbranch";
$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Create branch";
$this->load->view("template",$data);
}
public function createbranchsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("language","Language","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("branchid","Branch Id","trim");
$this->form_validation->set_rules("address","Address","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createbranch";
$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Create branch";
$this->load->view("template",$data);
}
else
{
$language=$this->input->get_post("language");
$name=$this->input->get_post("name");
$branchid=$this->input->get_post("branchid");
$address=$this->input->get_post("address");
if($this->branch_model->create($language,$name,$branchid,$address)==0)
$data["alerterror"]="New branch could not be created.";
else
$data["alertsuccess"]="Branch created Successfully.";
$data["redirect"]="site/viewbranch";
$this->load->view("redirect",$data);
}
}
public function editbranch()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editbranch";
$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Edit branch";
$data["before"]=$this->branch_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editbranchsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("language","Language","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("branchid","Branch Id","trim");
$this->form_validation->set_rules("address","Address","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editbranch";
$data["title"]="Edit branch";
$data["before"]=$this->branch_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$language=$this->input->get_post("language");
$name=$this->input->get_post("name");
$branchid=$this->input->get_post("branchid");
$address=$this->input->get_post("address");
if($this->branch_model->edit($id,$language,$name,$branchid,$address)==0)
$data["alerterror"]="New branch could not be updated.";
else
$data["alertsuccess"]="Branch Updated Successfully.";
$data["redirect"]="site/viewbranch";
$this->load->view("redirect",$data);
}
}
public function deletebranch()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->branch_model->delete($this->input->get("id"));
$data["redirect"]="site/viewbranch";
$this->load->view("redirect",$data);
}
public function viewdepartment()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewdepartment";
$data["base_url"]=site_url("site/viewdepartmentjson");
$data["title"]="View department";
$this->load->view("template",$data);
}
function viewdepartmentjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_department`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_department`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_department`");
$this->load->view("json",$data);
}

public function createdepartment()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createdepartment";
$data["title"]="Create department";
$this->load->view("template",$data);
}
public function createdepartmentsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("deptid","Dept id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createdepartment";
$data["title"]="Create department";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$deptid=$this->input->get_post("deptid");
if($this->department_model->create($name,$deptid)==0)
$data["alerterror"]="New department could not be created.";
else
$data["alertsuccess"]="Department created Successfully.";
$data["redirect"]="site/viewdepartment";
$this->load->view("redirect",$data);
}
}
public function editdepartment()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editdepartment";
$data["title"]="Edit department";
$data["before"]=$this->department_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editdepartmentsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("deptid","Dept id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editdepartment";
$data["title"]="Edit department";
$data["before"]=$this->department_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$deptid=$this->input->get_post("deptid");
if($this->department_model->edit($id,$name,$deptid)==0)
$data["alerterror"]="New department could not be Updated.";
else
$data["alertsuccess"]="Department Updated Successfully.";
$data["redirect"]="site/viewdepartment";
$this->load->view("redirect",$data);
}
}
public function deletedepartment()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->department_model->delete($this->input->get("id"));
$data["redirect"]="site/viewdepartment";
$this->load->view("redirect",$data);
}

//TEAM STARTS
	public function viewteam()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewteam";
$data["base_url"]=site_url("site/viewteamjson");
$data["title"]="View team";
$this->load->view("template",$data);
}
function viewteamjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_team`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_team`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`hq_team`.`teamid`";
$elements[2]->sort="1";
$elements[2]->header="Team id";
$elements[2]->alias="teamid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_team`");
$this->load->view("json",$data);
}

public function createteam()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createteam";
$data["title"]="Create team";
$this->load->view("template",$data);
}
public function createteamsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("teamid","Team id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createteam";
$data["title"]="Create team";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$teamid=$this->input->get_post("teamid");
if($this->team_model->create($name,$teamid)==0)
$data["alerterror"]="New team could not be created.";
else
$data["alertsuccess"]="Team created Successfully.";
$data["redirect"]="site/viewteam";
$this->load->view("redirect",$data);
}
}
public function editteam()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editteam";
$data["title"]="Edit team";
$data["before"]=$this->team_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editteamsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("teamid","Team id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editteam";
$data["title"]="Edit team";
$data["before"]=$this->team_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$teamid=$this->input->get_post("teamid");
if($this->team_model->edit($id,$name,$teamid)==0)
$data["alerterror"]="New team could not be Updated.";
else
$data["alertsuccess"]="Team Updated Successfully.";
$data["redirect"]="site/viewteam";
$this->load->view("redirect",$data);
}
}
public function deleteteam()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->team_model->delete($this->input->get("id"));
$data["redirect"]="site/viewteam";
$this->load->view("redirect",$data);
}
public function viewdesignation()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewdesignation";
$data["base_url"]=site_url("site/viewdesignationjson");
$data["title"]="View designation";
$this->load->view("template",$data);
}
function viewdesignationjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_designation`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_designation`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_designation`");
$this->load->view("json",$data);
}

public function createdesignation()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createdesignation";
	$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Create designation";
$this->load->view("template",$data);
}
public function createdesignationsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("language","Language","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createdesignation";
	$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Create designation";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$language=$this->input->get_post("language");
if($this->designation_model->create($name,$language)==0)
$data["alerterror"]="New designation could not be created.";
else
$data["alertsuccess"]="Designation created Successfully.";
$data["redirect"]="site/viewdesignation";
$this->load->view("redirect",$data);
}
}
public function editdesignation()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editdesignation";
	$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Edit designation";
$data["before"]=$this->designation_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editdesignationsubmit()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("language","Language","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editdesignation";
	$data[ 'language' ] =$this->user_model->getlanguagetypedropdown();
$data["title"]="Edit designation";
$data["before"]=$this->designation_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$language=$this->input->get_post("language");
if($this->designation_model->edit($id,$name,$language)==0)
$data["alerterror"]="New designation could not be Updated.";
else
$data["alertsuccess"]="Designation Updated Successfully.";
$data["redirect"]="site/viewdesignation";
$this->load->view("redirect",$data);
}
}
public function deletedesignation()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->designation_model->delete($this->input->get("id"));
$data["redirect"]="site/viewdesignation";
$this->load->view("redirect",$data);
}
public function viewpillar()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="pillarsecond";
$data["checkpackage"]=$this->menu_model->checkpackage();
$data['before']=$this->pillar_model->getpillarweightforedit();
$data['showavg']=$this->pillar_model->showavg();
$data['lastpillardetail']=$this->pillar_model->lastpillardetail();
//  echo $data['showavg'];
$data["title"]="View pillar";
$this->load->view("template",$data);
//    $this->load->view("pillarsecond",$data);
}
    public function viewpillarquestion()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="question";
$data['lastpillardetail']=$this->pillar_model->lastpillardetail();
$data['getelevenpillarquestion']=$this->pillar_model->getelevenpillarquestion();
$data['getelevenpillaroption']=$this->pillar_model->getelevenpillaroption();
$data["title"]="New pillar question";
$this->load->view("template",$data);
}
    public function getpillarquestion()
    {
         $access=array("1","2","3","5");
         $this->checkaccess($access);
         $questionone=$this->input->get_post('questionone');
         $questiontwo=$this->input->get_post('questiontwo');
         $questionthree=$this->input->get_post('questionthree');
         $questionfour=$this->input->get_post('questionfour');
         $optionone=$this->input->get_post('optionone');
         $optiontwo=$this->input->get_post('optiontwo');
         $optionthree=$this->input->get_post('optionthree');
         $optionfour=$this->input->get_post('optionfour');
         $optionfive=$this->input->get_post('optionfive');
         $optionsix=$this->input->get_post('optionsix');
         $optionseven=$this->input->get_post('optionseven');
         $optioneight=$this->input->get_post('optioneight');
         $optionnine=$this->input->get_post('optionnine');
         $optionten=$this->input->get_post('optionten');
         $optioneleven=$this->input->get_post('optioneleven');
         $optiontwelve=$this->input->get_post('optiontwelve');
         $optionthirteen=$this->input->get_post('optionthirteen');
         $optionfourteen=$this->input->get_post('optionfourteen');
         $optionfifteen=$this->input->get_post('optionfifteen');
         $optionsixteen=$this->input->get_post('optionsixteen');
         $this->pillar_model->getpillarquestion($questionone,$questiontwo,$questionthree,$questionfour,$optionone,$optiontwo,$optionthree,$optionfour,$optionfive,$optionsix,$optionseven,$optioneight,$optionnine,$optionten,$optioneleven,$optiontwelve,$optionthirteen,$optionfourteen,$optionfifteen,$optionsixteen);
         $data["redirect"]="site/viewpillarquestion";
         $this->load->view("redirect",$data);
    }
    public function getweightageviewpillar()
    {
         $access=array("1","2","3","5");
         $this->checkaccess($access);
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
         $this->pillar_model->updateweightageviewpillar($range,$range1,$range2,$range3,$range4,$range5,$range6,$range7,$range8,$range9,$range11);
         $data["redirect"]="site/viewpillar";
         $this->load->view("redirect",$data);
    }
function viewpillarjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_pillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_pillar`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`expectedweight`";
$elements[2]->sort="1";
$elements[2]->header="Expected Weight";
$elements[2]->alias="expectedweight";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_pillar`");
$this->load->view("json",$data);
}

public function createpillar()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createpillar";
$data["title"]="Create pillar";
$this->load->view("template",$data);
}
public function createpillarsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createpillar";
$data["title"]="Create pillar";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$weight=$this->input->get_post("weight");
$order=$this->input->get_post("order");
$expectedweight=$this->input->get_post("expectedweight");
if($this->pillar_model->create($name,$weight,$order,$expectedweight)==0)
$data["alerterror"]="New pillar could not be created.";
else
$data["alertsuccess"]="pillar created Successfully.";
$data["redirect"]="site/viewpillar";
$this->load->view("redirect",$data);
}
}
    public function getweightage(){
        $access=array("1","2","3","5");
        $this->checkaccess($access);
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
        if($value==1){
            $data["redirect"]="site/index";
            $this->load->view("redirect",$data);
        }
        else if($value==0){
            $this->user_model->makeusernew($this->session->userdata("id"));
            redirect( base_url() . 'index.php/json/viewfirstpage?id=2', 'refresh' );
        }
        
    }
public function editpillar()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editpillar";
$data["title"]="Edit pillar";
$data["before"]=$this->pillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editpillarsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editpillar";
$data["title"]="Edit pillar";
$data["before"]=$this->pillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$weight=$this->input->get_post("weight");
$order=$this->input->get_post("order");
    $expectedweight=$this->input->get_post("expectedweight");
if($this->pillar_model->edit($id,$name,$weight,$order,$expectedweight)==0)
$data["alerterror"]="New pillar could not be Updated.";
else
$data["alertsuccess"]="pillar Updated Successfully.";
$data["redirect"]="site/viewpillar";
$this->load->view("redirect",$data);
}
}
public function deletepillar()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->pillar_model->delete($this->input->get("id"));
$data["redirect"]="site/viewpillar";
$this->load->view("redirect",$data);
}

    public function viewquestion()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewquestion";
$data["base_url"]=site_url("site/viewquestionjson");
$data["title"]="View question";
$this->load->view("template",$data);
}
function viewquestionjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_question`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_pillar`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";
$elements[2]=new stdClass();
$elements[2]->field="`hq_question`.`noofans`";
$elements[2]->sort="1";
$elements[2]->header="Number of answer";
$elements[2]->alias="noofans";
$elements[3]=new stdClass();
$elements[3]->field="`hq_question`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`hq_question`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Time stamp";
$elements[4]->alias="timestamp";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_question` LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`hq_question`.`pillar`","WHERE `hq_question`.`id` < 41");
$this->load->view("json",$data);
}

public function createquestion()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createquestion";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["noofans"]=$this->question_model->getnoofansdropdown();
$data["title"]="Create question";
$this->load->view("template",$data);
}
public function createquestionsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("noofans","Number of answer","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createquestion";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["noofans"]=$this->question_model->getnoofansdropdown();
$data["noofans"]=$this->question_model->getnoofansdropdown();
$data["title"]="Create question";
$this->load->view("template",$data);
}
else
{
$pillar=$this->input->get_post("pillar");
$noofans=$this->input->get_post("noofans");
$order=$this->input->get_post("order");
//$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
if($this->question_model->create($pillar,$noofans,$order,$text)==0)
$data["alerterror"]="New question could not be created.";
else
$data["alertsuccess"]="question created Successfully.";
$data["redirect"]="site/viewquestion";
$this->load->view("redirect",$data);
}
}
public function editquestion()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editquestion";
$data['checkaccesslevel']=$this->session->userdata("accesslevel");
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["noofans"]=$this->question_model->getnoofansdropdown();
$data["title"]="Edit question";
$data["before"]=$this->question_model->beforeedit($this->input->get("id"));
$data["option"]=$this->question_model->getQuestionOptions($this->input->get("id"));
$this->load->view("template",$data);
}
public function editquestionsubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("noofans","Number of answer","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editquestion";
$data["noofans"]=$this->question_model->getnoofansdropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["title"]="Edit question";
$data["before"]=$this->question_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$pillar=$this->input->get_post("pillar");
$noofans=$this->input->get_post("noofans");
$order=$this->input->get_post("order");
$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
if($this->question_model->edit($id,$pillar,$noofans,$order,$timestamp,$text)==0)
$data["alerterror"]="New question could not be Updated.";
else
$data["alertsuccess"]="question Updated Successfully.";
$data["redirect"]="site/viewquestion";
$this->load->view("redirect",$data);
}
}
public function deletequestion()
{
$access=array("1","5");
$this->checkaccess($access);
$this->question_model->delete($this->input->get("id"));
$data["redirect"]="site/viewquestion";
$this->load->view("redirect",$data);
}
public function viewoptions()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewoptions";
$data["base_url"]=site_url("site/viewoptionsjson?id=").$this->input->get('id');
$data["title"]="View options";
$this->load->view("template",$data);
}
function viewoptionsjson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_options`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_options`.`question`";
$elements[1]->sort="1";
$elements[1]->header="Question";
$elements[1]->alias="question";
$elements[2]=new stdClass();
$elements[2]->field="`hq_options`.`representation`";
$elements[2]->sort="1";
$elements[2]->header="Representation";
$elements[2]->alias="representation";
$elements[3]=new stdClass();
$elements[3]->field="`hq_options`.`actualorder`";
$elements[3]->sort="1";
$elements[3]->header="Actual Order";
$elements[3]->alias="actualorder";
$elements[4]=new stdClass();
$elements[4]->field="`hq_options`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";
$elements[5]=new stdClass();
$elements[5]->field="`hq_options`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";
$elements[6]=new stdClass();
$elements[6]->field="`hq_options`.`weight`";
$elements[6]->sort="1";
$elements[6]->header="Weight";
$elements[6]->alias="weight";
$elements[7]=new stdClass();
$elements[7]->field="`hq_options`.`optiontext`";
$elements[7]->sort="1";
$elements[7]->header="Option Text";
$elements[7]->alias="optiontext";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_options`","WHERE `hq_options`.`question`='$id'");
$this->load->view("json",$data);
}

public function createoptions()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createoptions";
$data["question"]=$this->question_model->getquestiondropdown();
$data["representation"]=$this->options_model->getrepresentationdropdown();
$data["title"]="Create options";
$this->load->view("template",$data);
}
public function createoptionssubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("representation","Representation","trim");
$this->form_validation->set_rules("actualorder","Actual Order","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("optiontext","Option Text","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createoptions";
$data["representation"]=$this->options_model->getrepresentationdropdown();
$data["question"]=$this->question_model->getquestiondropdown();
$data["title"]="Create options";
$this->load->view("template",$data);
}
else
{
$question=$this->input->get_post("question");
$representation=$this->input->get_post("representation");
$actualorder=$this->input->get_post("actualorder");
//$image=$this->input->get_post("image");
$order=$this->input->get_post("order");
$weight=$this->input->get_post("weight");
$optiontext=$this->input->get_post("optiontext");
$text=$this->input->get_post("text");
	  $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->options_model->create($question,$representation,$actualorder,$image,$order,$weight,$optiontext,$text)==0)
$data["alerterror"]="New options could not be created.";
else
$data["alertsuccess"]="options created Successfully.";
$data["redirect"]="site/viewoptions";
$this->load->view("redirect",$data);
}
}
public function editoptions()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="editoptions";
$data["representation"]=$this->options_model->getrepresentationdropdown();
$data["question"]=$this->question_model->getquestiondropdown();
$data["title"]="Edit options";
$data["before"]=$this->options_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editoptionssubmit()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("representation","Representation","trim");
$this->form_validation->set_rules("actualorder","Actual Order","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("weight","Weight","trim");
$this->form_validation->set_rules("optiontext","Option Text","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editoptions";
$data["question"]=$this->question_model->getquestiondropdown();
$data["representation"]=$this->options_model->getrepresentationdropdown();
$data["title"]="Edit options";
$data["before"]=$this->options_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$question=$this->input->get_post("question");
$representation=$this->input->get_post("representation");
$actualorder=$this->input->get_post("actualorder");
//$image=$this->input->get_post("image");
$order=$this->input->get_post("order");
$weight=$this->input->get_post("weight");
$optiontext=$this->input->get_post("optiontext");
$text=$this->input->get_post("text");
	 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->options_model->getimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
if($this->options_model->edit($id,$question,$representation,$actualorder,$image,$order,$weight,$optiontext,$text)==0)
$data["alerterror"]="New options could not be Updated.";
else
$data["alertsuccess"]="options Updated Successfully.";
$data["redirect"]="site/viewoptions";
$this->load->view("redirect",$data);
}
}
public function deleteoptions()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->options_model->delete($this->input->get("id"));
$data["redirect"]="site/viewoptions";
$this->load->view("redirect",$data);
}
public function viewuseranswer()
{
$access=array("1","2","5");
$this->checkaccess($access);
$data["page"]="viewuseranswer";
$data["base_url"]=site_url("site/viewuseranswerjson");
$data["title"]="View useranswer";
$this->load->view("template",$data);
}
function viewuseranswerjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_useranswer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`user`.`name`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";
$elements[3]=new stdClass();
$elements[3]->field="`hq_useranswer`.`question`";
$elements[3]->sort="1";
$elements[3]->header="Question";
$elements[3]->alias="question";
$elements[4]=new stdClass();
$elements[4]->field="`hq_useranswer`.`option`";
$elements[4]->sort="1";
$elements[4]->header="Option";
$elements[4]->alias="option";
$elements[5]=new stdClass();
$elements[5]->field="`hq_useranswer`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_useranswer` LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`hq_useranswer`.`pillar` LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`");
$this->load->view("json",$data);
}

public function createuseranswer()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createuseranswer";
$data["user"]=$this->user_model->getuserdropdown();
$data["question"]=$this->question_model->getquestiondropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["option"]=$this->options_model->getoptionsdropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Create useranswer";
$this->load->view("template",$data);
}
public function createuseranswersubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("option","Option","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createuseranswer";
$data["user"]=$this->user_model->getuserdropdown();
$data["question"]=$this->question_model->getquestiondropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["option"]=$this->options_model->getoptionsdropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Create useranswer";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$question=$this->input->get_post("question");
$option=$this->input->get_post("option");
$order=$this->input->get_post("order");
//$timestamp=$this->input->get_post("timestamp");
    $test=$this->input->get_post("test");
if($this->useranswer_model->create($user,$pillar,$question,$option,$order,$test)==0)
$data["alerterror"]="New useranswer could not be created.";
else
$data["alertsuccess"]="useranswer created Successfully.";
$data["redirect"]="site/viewuseranswer";
$this->load->view("redirect",$data);
}
}
public function edituseranswer()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="edituseranswer";
$data["user"]=$this->user_model->getuserdropdown();
$data["question"]=$this->question_model->getquestiondropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["option"]=$this->options_model->getoptionsdropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Edit useranswer";
$data["before"]=$this->useranswer_model->beforeedit($this->input->get("id"));



        $data['test'] = $this->test_model->gettestdropdown();
        $data['question'] = $this->menu_model->getquestionbytest($data['before']->test,$data['before']->pillar);
        $data['question'] = $this->chintantable->todropdown($data['question']);
//        $data['option'] = $this->menu_model->getoptionbyquestion($data['before']->option);
//        $data['option'] = $this->chintantable->todropdown($data['option']);
//        $data['pincode'] = $this->pincode_model->getpincodebyarea($data['before']->locality);
////        print_r($data['pincode']);
//        $data['pincode'] = $this->chintantable->todropdown($data['pincode']);



$this->load->view("template",$data);
}
    public function viewconclude()
{
    $id=$this->input->get("id");
    $data["conclusion"]=$this->conclusion_model->getConclusionQuestionOption($id);
        $data["before"]=$this->conclusionsuggestion_model->beforeedit($this->input->get("id"));
        $data["optiondata"]=$this->menu_model->getinterlinkageoptions($data["conclusion"][0]->id,$data["conclusion"][1]->id);
    $data[ 'title' ] ="Interlinkage Part";
    $data['page']='viewconclude';
    $this->load->view('template',$data);

}
public function edituseranswersubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("option","Option","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="edituseranswer";
$data["user"]=$this->user_model->getuserdropdown();
$data["question"]=$this->question_model->getquestiondropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["option"]=$this->options_model->getoptionsdropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Edit useranswer";
$data["before"]=$this->useranswer_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$question=$this->input->get_post("question");
$option=$this->input->get_post("option");
$order=$this->input->get_post("order");
$timestamp=$this->input->get_post("timestamp");
$test=$this->input->get_post("test");
if($this->useranswer_model->edit($id,$user,$pillar,$question,$option,$order,$timestamp,$test)==0)
$data["alerterror"]="New useranswer could not be Updated.";
else
$data["alertsuccess"]="useranswer Updated Successfully.";
$data["redirect"]="site/viewuseranswer";
$this->load->view("redirect",$data);
}
}
public function deleteuseranswer()
{
$access=array("1","2");
$this->checkaccess($access);
$this->useranswer_model->delete($this->input->get("id"));
$data["redirect"]="site/viewuseranswer";
$this->load->view("redirect",$data);
}
public function viewuserpillar()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewuserpillar";
$data["base_url"]=site_url("site/viewuserpillarjson");
$data["title"]="View userpillar";
$this->load->view("template",$data);
}
function viewuserpillarjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_userpillar`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`user`.`name`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Pillar";
$elements[2]->alias="pillar";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_userpillar` LEFT OUTER JOIN `user` ON `user`.`id`=`hq_userpillar`.`user` LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`hq_userpillar`.`pillar`");
$this->load->view("json",$data);
}

public function createuserpillar()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createuserpillar";
$data["user"]=$this->user_model->getuserdropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["title"]="Create userpillar";
$this->load->view("template",$data);
}
public function createuserpillarsubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createuserpillar";
$data["user"]=$this->user_model->getuserdropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["title"]="Create userpillar";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
//$timestamp=$this->input->get_post("timestamp");
if($this->userpillar_model->create($user,$pillar)==0)
$data["alerterror"]="New userpillar could not be created.";
else
$data["alertsuccess"]="userpillar created Successfully.";
$data["redirect"]="site/viewuserpillar";
$this->load->view("redirect",$data);
}
}
public function edituserpillar()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="edituserpillar";
$data["title"]="Edit userpillar";
$data["user"]=$this->user_model->getuserdropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["before"]=$this->userpillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edituserpillarsubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="edituserpillar";
$data["title"]="Edit userpillar";
$data["user"]=$this->user_model->getuserdropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["before"]=$this->userpillar_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$pillar=$this->input->get_post("pillar");
$timestamp=$this->input->get_post("timestamp");
if($this->userpillar_model->edit($id,$user,$pillar,$timestamp)==0)
$data["alerterror"]="New userpillar could not be Updated.";
else
$data["alertsuccess"]="userpillar Updated Successfully.";
$data["redirect"]="site/viewuserpillar";
$this->load->view("redirect",$data);
}
}
public function deleteuserpillar()
{
$access=array("1","2");
$this->checkaccess($access);
$this->userpillar_model->delete($this->input->get("id"));
$data["redirect"]="site/viewuserpillar";
$this->load->view("redirect",$data);
}
public function viewcontent()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="viewcontent";
$data["base_url"]=site_url("site/viewcontentjson");
$data["title"]="View content";
$this->load->view("template",$data);
}
function viewcontentjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_content`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_pillar`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Pillar";
$elements[1]->alias="pillar";
$elements[2]=new stdClass();
$elements[2]->field="`hq_content`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";
$elements[3]=new stdClass();
$elements[3]->field="`hq_content`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Time stamp";
$elements[3]->alias="timestamp";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_content` LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`hq_content`.`pillar`");
$this->load->view("json",$data);
}

public function createcontent()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="createcontent";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["title"]="Create content";
$this->load->view("template",$data);
}
public function createcontentsubmit()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createcontent";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["title"]="Create content";
$this->load->view("template",$data);
}
else
{
$pillar=$this->input->get_post("pillar");
//$image=$this->input->get_post("image");
//$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
	  $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}
if($this->content_model->create($pillar,$image,$text)==0)
$data["alerterror"]="New content could not be created.";
else
$data["alertsuccess"]="content created Successfully.";
$data["redirect"]="site/viewcontent";
$this->load->view("redirect",$data);
}
}
public function editcontent()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="editcontent";
$data["title"]="Edit content";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["before"]=$this->content_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editcontentsubmit()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("pillar","Pillar","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
$this->form_validation->set_rules("text","Text","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editcontent";
$data["title"]="Edit content";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["before"]=$this->content_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$pillar=$this->input->get_post("pillar");
//$image=$this->input->get_post("image");
$timestamp=$this->input->get_post("timestamp");
$text=$this->input->get_post("text");
	 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->content_model->getimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
if($this->content_model->edit($id,$pillar,$image,$timestamp,$text)==0)
$data["alerterror"]="New content could not be Updated.";
else
$data["alertsuccess"]="content Updated Successfully.";
$data["redirect"]="site/viewcontent";
$this->load->view("redirect",$data);
}
}
public function deletecontent()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->content_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcontent";
$this->load->view("redirect",$data);
}

    //TEST


    public function createtest()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'team' ] =$this->user_model->getteamdropdown();
		$data[ 'schedule' ] =$this->user_model->getscheduledropdown();
             $data[ 'check' ] =$this->user_model->getcheckdropdown();
		$data[ 'page' ] = 'createtest';
		$data[ 'title' ] = 'Create Test';
		$this->load->view( 'template', $data );
	}
	function createtestsubmit()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
            $name=$this->input->post('name');
            $schedule=$this->input->post('schedule');
            $units=$this->input->post('units');
            $startdate=$this->input->post('startdate');
            $designation=$this->input->post('designation');
            $department=$this->input->post('department');
            $branch=$this->input->post('branch');
            $team=$this->input->post('team');
            $organization=$this->input->post('organization');
			if($this->test_model->create($name,$schedule,$units,$startdate,$designation,$department,$branch,$team,$organization)==0)
			$data['alerterror']="New Test Could Not Be Created.";
			else
			$data['alertsuccess']="Test Created Successfully.";
			$data['redirect']="site/viewtest";
			$this->load->view("redirect",$data);

	}
    function viewtest()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$data['page']='viewtest';
        $data['base_url'] = site_url("site/viewtestjson");

		$data['title']='View test';
		$this->load->view('template',$data);
	}
    function viewtestjson()
	{
		$access = array("1","3","2","5");
		$this->checkaccess($access);


        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`test`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`test`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`test`.`schedule`";
        $elements[2]->sort="1";
        $elements[2]->header="Schedule";
        $elements[2]->alias="schedule";

        $elements[3]=new stdClass();
        $elements[3]->field="`test`.`startdate`";
        $elements[3]->sort="1";
        $elements[3]->header="Startdate";
        $elements[3]->alias="startdate";

        $elements[4]=new stdClass();
        $elements[4]->field="`test`.`timestamp`";
        $elements[4]->sort="1";
        $elements[4]->header="Timestamp";
        $elements[4]->alias="timestamp";

        $elements[5]=new stdClass();
        $elements[5]->field="`test`.`units`";
        $elements[5]->sort="1";
        $elements[5]->header="Units";
        $elements[5]->alias="units";

        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }

        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `test`");

		$this->load->view("json",$data);
	}


	function edittest()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'team' ] =$this->user_model->getteamdropdown();
		$data[ 'schedule' ] =$this->user_model->getscheduledropdown();
             $data[ 'check' ] =$this->user_model->getcheckdropdown();
		$data['before']=$this->test_model->beforeedit($this->input->get('id'));
		$data['page']='edittest';
		$data['page2']='block/testblock';
		$data['title']='Edit test';
		$this->load->view('templatewith2',$data);
	}
	function edittestsubmit()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
            $id=$this->input->get_post('id');
            $name=$this->input->post('name');
            $schedule=$this->input->post('schedule');
            $units=$this->input->post('units');
            $startdate=$this->input->post('startdate');
            $designation=$this->input->post('designation');
            $department=$this->input->post('department');
            $branch=$this->input->post('branch');
            $team=$this->input->post('team');
            $organization=$this->input->post('organization');
            $timestamp=$this->input->post('timestamp');

			if($this->test_model->edit($id,$name,$schedule,$units,$startdate,$designation,$department,$branch,$team,$organization,$timestamp)==0)
			$data['alerterror']="Test Editing was unsuccesful";
			else
			$data['alertsuccess']="Test edited Successfully.";

			$data['redirect']="site/viewtest";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);


	}

	function deletetest()
	{
		$access = array("1","3","5");
		$this->checkaccess($access);
		$this->test_model->delete($this->input->get('id'));
		$data['alertsuccess']="Test Deleted Successfully";
		$data['redirect']="site/viewtest";
		$this->load->view("redirect",$data);
	}



    // CREATE TEST QUESTION


    public function viewtestquestion()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="viewtestquestion";
$data["table"]=$this->testquestion_model->getallquestion();
$data["base_url"]=site_url("site/viewtestquestionjson?id=".$this->input->get('id'));
$data["title"]="View testquestion";
$this->load->view("template",$data);
}
function viewtestquestionjson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`testquestion`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`testquestion`.`test`";
$elements[1]->sort="1";
$elements[1]->header="test";
$elements[1]->alias="test";
$elements[2]=new stdClass();
$elements[2]->field="`hq_question`.`text`";
$elements[2]->sort="1";
$elements[2]->header="Question";
$elements[2]->alias="question";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `testquestion` LEFT OUTER JOIN `hq_question` ON `hq_question`.`id`=`testquestion`.`question`","WHERE `testquestion`.`test`='$id'");
$this->load->view("json",$data);
}

public function createtestquestion()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$data["page"]="createtestquestion";
$data["question"]=$this->question_model->getquestiondropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Create testquestion";
$this->load->view("template",$data);
}
public function createtestquestionsubmit()
{

$test=$this->input->get_post("test");
$question=$this->input->get_post("question");
if($this->testquestion_model->create($test,$question)==0)
$data["alerterror"]="New testquestion could not be created.";
else
$data["alertsuccess"]="testquestion created Successfully.";
$data["redirect"]="site/viewtestquestion";
$this->load->view("redirect",$data);

}

    public function edittestquestion()
    {
        $access=array("1","2","3","5");
        $this->checkaccess($access);
        $testid=$this->input->get('id');
        $data["page"]="edittestquestion";

      $data["table"]=$this->testquestion_model->getallquestion();
//        $data["question"]=$this->question_model->getquestiondropdown();
        $data["test"]=$testid;
        $data["title"]="Edit testquestion";
        $data["before"]=$this->testquestion_model->beforeedit($this->input->get("id"));
//        print_r($data["before"]);
        $this->load->view("template",$data);
    }
public function edittestquestionsubmit()
{
$access=array("1","2","3");
$this->checkaccess($access);
$id=$this->input->get_post("id");
$question=$this->input->get_post("question");
if($this->testquestion_model->edittestquestion($id,$question)==0)
$data["alerterror"]="New test question could not be updated.";
else
$data["alertsuccess"]="Test question Updated Successfully.";
$data["redirect"]="site/edittestquestion?id=".$id;
$this->load->view("redirect2",$data);
}

public function deletetestquestion()
{
$access=array("1","2","3","5");
$this->checkaccess($access);
$this->testquestion_model->delete($this->input->get("id"));
$data["redirect"]="site/viewtestquestion";
$this->load->view("redirect",$data);
}


    // TEST PILLAR EXPECTED




    public function viewtestpillarexpected()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="viewtestpillarexpected";

$data["base_url"]=site_url("site/viewtestpillarexpectedjson");
$data["title"]="View testquestion";
$this->load->view("template",$data);
}
function viewtestpillarexpectedjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`testpillarexpected`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`test`.`name`";
$elements[1]->sort="1";
$elements[1]->header="test";
$elements[1]->alias="test";
$elements[2]=new stdClass();
$elements[2]->field="`hq_pillar`.`name`";
$elements[2]->sort="1";
$elements[2]->header="pillar";
$elements[2]->alias="pillar";

$elements[3]=new stdClass();
$elements[3]->field="`testpillarexpected`.`expectedvalue`";
$elements[3]->sort="1";
$elements[3]->header="expectedvalue";
$elements[3]->alias="expectedvalue";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `testpillarexpected` LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`testpillarexpected`.`pillar` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`");
$this->load->view("json",$data);
}

public function createtestpillarexpected()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="createtestpillarexpected";
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Create testpillarexpected";
$this->load->view("template",$data);
}
public function createtestpillarexpectedsubmit()
{

$test=$this->input->get_post("test");
$pillar=$this->input->get_post("pillar");
$expectedvalue=$this->input->get_post("expectedvalue");
if($this->testpillarexpected_model->create($test,$pillar,$expectedvalue)==0)
$data["alerterror"]="New testpillarexpected could not be created.";
else
$data["alertsuccess"]="testpillarexpected created Successfully.";
$data["redirect"]="site/viewtestpillarexpected";
$this->load->view("redirect",$data);

}
public function edittestpillarexpected()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="edittestpillarexpected";
$data["question"]=$this->question_model->getquestiondropdown();
$data["pillar"]=$this->pillar_model->getpillardropdown();
$data["test"]=$this->test_model->gettestdropdown();
$data["title"]="Edit testpillarexpected";
$data["before"]=$this->testpillarexpected_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edittestpillarexpectedsubmit()
{
$access=array("1","2","3");
$this->checkaccess($access);
$id=$this->input->get_post("id");
$test=$this->input->get_post("test");
$pillar=$this->input->get_post("pillar");
$expectedvalue=$this->input->get_post("expectedvalue");
if($this->testpillarexpected_model->edit($id,$test,$pillar,$expectedvalue)==0)
$data["alerterror"]="New testpillarexpected could not be Updated.";
else
$data["alertsuccess"]="testpillarexpected Updated Successfully.";
$data["redirect"]="site/viewtestpillarexpected";
$this->load->view("redirect",$data);
}

public function deletetestpillarexpected()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->testpillarexpected_model->delete($this->input->get("id"));
$data["redirect"]="site/viewtestpillarexpected";
$this->load->view("redirect",$data);
}

//functions by avinash


    public function getquestionbytest() {
        $test=$this->input->get_post("test");
        $pillar=$this->input->get_post("pillar");
        $data1 = $this->menu_model->getquestionbytest($test,$pillar);
        $data["message"] = $data1;
        $this->load->view("json", $data);
    }

    public function getoptionbyquestion() {
        $question=$this->input->get_post("question");
        $data["message"]=$this->menu_model->getoptionbyquestion($question);
        $this->load->view("json",$data);
    }



    function uploadusercsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadusercsv';
		$data[ 'title' ] = 'Upload user';
		$this->load->view( 'template', $data );
	}

    function uploadusercsvsubmit()
	{
         $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
			print_r($error);
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->user_model->createbycsv($file);
//        echo $id1;

        if($id1==0)
        $data['alerterror']="New user could not be Uploaded.";
		else
		$data['alertsuccess']="user Uploaded Successfully.";

        $data['redirect']="site/viewusers";
        $this->load->view("redirect",$data);
    }
    function uploadteamcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadteamcsv';
		$data[ 'title' ] = 'Upload team';
		$this->load->view( 'template', $data );
	}

    function uploadteamcsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->team_model->createbycsv($file);
//        echo $id1;

        if($id1==0)
        $data['alerterror']="New teams could not be Uploaded.";
		else
		$data['alertsuccess']="teams Uploaded Successfully.";

        $data['redirect']="site/viewteam";
        $this->load->view("redirect",$data);
    }


    function uploaddepartmentcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploaddepartmentcsv';
		$data[ 'title' ] = 'Upload department';
		$this->load->view( 'template', $data );
	}

    function uploaddepartmentcsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->department_model->createbycsv($file);
//        echo $id1;

        if($id1==0)
        $data['alerterror']="New departments could not be Uploaded.";
		else
		$data['alertsuccess']="departments Uploaded Successfully.";

        $data['redirect']="site/viewdepartment";
        $this->load->view("redirect",$data);
    }



    function uploaddesignationcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploaddesignationcsv';
		$data[ 'title' ] = 'Upload designation';
		$this->load->view( 'template', $data );
	}

    function uploaddesignationcsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->designation_model->createbycsv($file);
//        echo $id1;

        if($id1==0)
        $data['alerterror']="New designations could not be Uploaded.";
		else
		$data['alertsuccess']="designations Uploaded Successfully.";

        $data['redirect']="site/viewdesignation";
        $this->load->view("redirect",$data);
    }



    function uploadbranchcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadbranchcsv';
		$data[ 'title' ] = 'Upload branch';
		$this->load->view( 'template', $data );
	}

    function uploadbranchcsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->branch_model->createbycsv($file);
//        echo $id1;

        if($id1==0)
        $data['alerterror']="New branchs could not be Uploaded.";
		else
		$data['alertsuccess']="branchs Uploaded Successfully.";

        $data['redirect']="site/viewbranch";
        $this->load->view("redirect",$data);
    }
    //end of avinash functions

      public function viewconfig()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="viewconfig";

$data["base_url"]=site_url("site/viewconfigjson");
$data["title"]="View config";
$this->load->view("template",$data);
}
function viewconfigjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`config`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`config`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `config`");
$this->load->view("json",$data);
}
    public function editconfig()
{
$access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="editconfig";
$data["title"]="Edit config";
$data["before"]=$this->config_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editconfigsubmit()
{
$access=array("1","2","3");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editconfig";
$data["title"]="Edit config";
$data["before"]=$this->config_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$androidtext=$this->input->get_post("androidtext");
$iostext=$this->input->get_post("iostext");
    $preimage = $this->config_model->getpemById();
            $config['upload_path'] = './config/';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $filename = 'image';
            $image = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image = $uploaddata['file_name'];
            } else {
                $image = $preimage;
                if ($this->config_model->edit($id,$name,$androidtext,$iostext,$image)==0) {
                    $data['alerterror'] = 'New config Could Not Be Updated.';
                } else {
                    $data['alertsuccess'] = 'config Updated Successfully.';
                }
                $data['redirect'] = 'site/viewconfig';
                $this->load->view('redirect', $data);
            }
}
}

public function viewsurveyquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewsurveyquestion";
$data["base_url"]=site_url("site/viewsurveyquestionjson");
$data["title"]="View surveyquestion";
$this->load->view("template",$data);
}
function viewsurveyquestionjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_surveyquestion`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_surveyquestion`.`type`";
$elements[1]->sort="1";
$elements[1]->header="Type";
$elements[1]->alias="type";
$elements[2]=new stdClass();
$elements[2]->field="`hq_surveyquestion`.`content`";
$elements[2]->sort="1";
$elements[2]->header="Content";
$elements[2]->alias="content";
$elements[3]=new stdClass();
$elements[3]->field="`hq_surveyquestion`.`starttime`";
$elements[3]->sort="1";
$elements[3]->header="Start Time";
$elements[3]->alias="starttime";
$elements[4]=new stdClass();
$elements[4]->field="`hq_surveyquestion`.`endtime`";
$elements[4]->sort="1";
$elements[4]->header="End Time";
$elements[4]->alias="endtime";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_surveyquestion`");
$this->load->view("json",$data);
}

public function createsurveyquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="createsurveyquestion";
$data["type"]=$this->surveyquestion_model->gettypedropdown();
$data["text"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["title"]="Create surveyquestion";
$this->load->view("template",$data);
}
public function createsurveyquestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("type","Type","trim");
$this->form_validation->set_rules("text","Text","trim");
$this->form_validation->set_rules("starttime","Start Time","trim");
$this->form_validation->set_rules("endtime","End Time","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createsurveyquestion";
$data["text"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["type"]=$this->surveyquestion_model->gettypedropdown();
$data["title"]="Create surveyquestion";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$type=$this->input->get_post("type");
$text=$this->input->get_post("text");
$starttime=$this->input->get_post("starttime");
$endtime=$this->input->get_post("endtime");
$content=$this->input->get_post("content");
if($this->surveyquestion_model->create($type,$text,$starttime,$endtime,$content)==0)
$data["alerterror"]="New Survey question could not be created.";
else
$data["alertsuccess"]="Survey question created Successfully.";
$data["redirect"]="site/viewsurveyquestion";
$this->load->view("redirect",$data);
}
}
public function editsurveyquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editsurveyquestion";
$data["page2"]="block/surveyblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["title"]="Edit surveyquestion";
$data["type"]=$this->surveyquestion_model->gettypedropdown();
$data["text"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["before"]=$this->surveyquestion_model->beforeedit($this->input->get("id"));
$data['exp'] = explode(':', $data['before']->starttime);
$data['exp1'] = explode(':', $data['before']->endtime);
$this->load->view("templatewith2",$data);
}
public function editsurveyquestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("type","Type","trim");
$this->form_validation->set_rules("text","Text","trim");
$this->form_validation->set_rules("starttime","Start Time","trim");
$this->form_validation->set_rules("endtime","End Time","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editsurveyquestion";
$data["text"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["type"]=$this->surveyquestion_model->gettypedropdown();
$data["title"]="Edit surveyquestion";
$data["before"]=$this->surveyquestion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$type=$this->input->get_post("type");
$text=$this->input->get_post("text");
$starttime=$this->input->get_post("starttime");
$endtime=$this->input->get_post("endtime");
$content=$this->input->get_post("content");
if($this->surveyquestion_model->edit($id,$type,$text,$starttime,$endtime,$content)==0)
$data["alerterror"]="New survey question could not be Updated.";
else
$data["alertsuccess"]="survey question Updated Successfully.";
$data["redirect"]="site/viewsurveyquestion";
$this->load->view("redirect",$data);
}
}
public function deletesurveyquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$this->surveyquestion_model->delete($this->input->get("id"));
$data["redirect"]="site/viewsurveyquestion";
$this->load->view("redirect",$data);
}
public function viewsurveyquestionuser()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewsurveyquestionuser";
$data["base_url"]=site_url("site/viewsurveyquestionuserjson?id=".$this->input->get('id'));
$data["title"]="View surveyquestionuser";
$this->load->view("template",$data);
}
function viewsurveyquestionuserjson()
{
$id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_surveyquestionuser`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_surveyquestionuser`.`question`";
$elements[1]->sort="1";
$elements[1]->header="Question";
$elements[1]->alias="question";
$elements[2]=new stdClass();
$elements[2]->field="`hq_surveyquestionuser`.`email`";
$elements[2]->sort="1";
$elements[2]->header="Email";
$elements[2]->alias="email";

$elements[3]=new stdClass();
$elements[3]->field="`hq_surveyquestionuser`.`status`";
$elements[3]->sort="1";
$elements[3]->header="status";
$elements[3]->alias="status";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_surveyquestionuser` LEFT OUTER JOIN `hq_surveyquestion` ON `hq_surveyquestion`.`id`=`hq_surveyquestionuser`.`question`","WHERE `hq_surveyquestionuser`.`question`='$id'");
$this->load->view("json",$data);
}

public function createsurveyquestionuser()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createsurveyquestionuser";
$data["question"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["title"]="Create surveyquestionuser";
$this->load->view("template",$data);
}
public function createsurveyquestionusersubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("email","Email","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createsurveyquestionuser";
$data["question"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["title"]="Create surveyquestionuser";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$question=$this->input->get_post("question");
$email=$this->input->get_post("email");
$status=$this->input->get_post("status");
if($this->surveyquestionuser_model->create($question,$email,$status)==0)
$data["alerterror"]="New surveyquestionuser could not be created.";
else
$data["alertsuccess"]="surveyquestionuser created Successfully.";
$data["redirect"]="site/viewsurveyquestionuser?id=".$question;
$this->load->view("redirect2",$data);
}
}
public function editsurveyquestionuser()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editsurveyquestionuser";
//$data["page2"]="block/questionblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["question"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["title"]="Edit surveyquestionuser";
$data["before"]=$this->surveyquestionuser_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editsurveyquestionusersubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("email","Email","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editsurveyquestionuser";
$data["question"]=$this->conclusionfinalsuggestion_model->getSurveyNameDown();
$data["title"]="Edit surveyquestionuser";
$data["before"]=$this->surveyquestionuser_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$question=$this->input->get_post("question");
$email=$this->input->get_post("email");
$status=$this->input->get_post("status");
if($this->surveyquestionuser_model->edit($id,$question,$email,$status)==0)
$data["alerterror"]="New surveyquestionuser could not be Updated.";
else
$data["alertsuccess"]="surveyquestionuser Updated Successfully.";
$data["redirect"]="site/viewsurveyquestionuser?id=".$question;
$this->load->view("redirect2",$data);
}
}
public function deletesurveyquestionuser()
{
$access=array("1","5");
$this->checkaccess($access);
$this->surveyquestionuser_model->delete($this->input->get("id"));
$data["redirect"]="site/viewsurveyquestionuser?id=".$this->input->get("surveyid");
$this->load->view("redirect",$data);
}
public function viewsurveyoption()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewsurveyoption";
$data["page2"]="block/surveyblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["base_url"]=site_url("site/viewsurveyoptionjson?id=").$this->input->get("id");
$data["title"]="View surveyoption";
$this->load->view("templatewith2",$data);
}
function viewsurveyoptionjson()
{
	$id=$this->input->get("id");
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_surveyoption`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_surveyoption`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`hq_surveyoption`.`question`";
$elements[2]->sort="1";
$elements[2]->header="Question";
$elements[2]->alias="question";
$elements[3]=new stdClass();
$elements[3]->field="`hq_surveyoption`.`title`";
$elements[3]->sort="1";
$elements[3]->header="Title";
$elements[3]->alias="title";
$elements[4]=new stdClass();
$elements[4]->field="`hq_surveyoption`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_surveyoption`","WHERE `hq_surveyoption`.`question`='$id'");
$this->load->view("json",$data);
}

public function createsurveyoption()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="createsurveyoption";
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data['checktype']=$this->surveyoption_model->checktype($this->input->get('id'));
$data["title"]="Create surveyoption";
$this->load->view("template",$data);
}
public function createsurveyoptionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data["page"]="createsurveyoption";
$data["title"]="Create surveyoption";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$question=$this->input->get_post("question");
$title=$this->input->get_post("title");
$image=$this->menu_model->uploadImage();
if($this->surveyoption_model->create($order,$question,$title,$image)==0)
$data["alerterror"]="New surveyoption could not be created.";
else
$data["alertsuccess"]="surveyoption created Successfully.";
$data["redirect"]="site/viewsurveyoption?id=".$question;
$this->load->view("redirect2",$data);
}
}
public function editsurveyoption()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editsurveyoption";
$data["title"]="Edit surveyoption";
$data['checktype']=$this->surveyoption_model->checktype($this->input->get('questionid'));
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data["before"]=$this->surveyoption_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editsurveyoptionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editsurveyoption";
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data["title"]="Edit surveyoption";
$data["before"]=$this->surveyoption_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$question=$this->input->get_post("question");
$title=$this->input->get_post("title");
// $image=$this->input->get_post("image");
$image=$this->menu_model->uploadImage();
if($this->surveyoption_model->edit($id,$order,$question,$title,$image)==0)
$data["alerterror"]="New surveyoption could not be Updated.";
else
$data["alertsuccess"]="surveyoption Updated Successfully.";
$data["redirect"]="site/viewsurveyoption?id=".$question;
$this->load->view("redirect2",$data);
}
}
public function deletesurveyoption()
{
$access=array("1","5");
$this->checkaccess($access);
$this->surveyoption_model->delete($this->input->get("id"));
$data["redirect"]="site/viewsurveyoption";
$this->load->view("redirect",$data);
}
public function viewsurveyquestionanswer()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewsurveyquestionanswer";
$data["page2"]="block/questionblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["base_url"]=site_url("site/viewsurveyquestionanswerjson?id=".$this->input->get("id"));
$data["title"]="View surveyquestionanswer";
$this->load->view("templatewith2",$data);
}
function viewsurveyquestionanswerjson()
{
	$id=$this->input->get("id");
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_surveyquestionanswer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_surveyquestionanswer`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`hq_surveyquestion`.`text`";
$elements[2]->sort="1";
$elements[2]->header="Question";
$elements[2]->alias="question";
$elements[3]=new stdClass();
$elements[3]->field="`hq_surveyoption`.`title`";
$elements[3]->sort="1";
$elements[3]->header="Option";
$elements[3]->alias="option";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_surveyquestionanswer` LEFT OUTER JOIN `hq_surveyquestion` ON `hq_surveyquestion`.`id`=`hq_surveyquestionanswer`.`question` LEFT OUTER JOIN `hq_surveyoption` ON `hq_surveyoption`.`id`=`hq_surveyquestionanswer`.`option`","WHERE `hq_surveyquestionanswer`.`user`='$id'");
$this->load->view("json",$data);
}

public function createsurveyquestionanswer()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="createsurveyquestionanswer";
$data["page2"]="block/questionblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data["user"]=$this->surveyquestionanswer_model->getemaildropdown();
$data["option"]=$this->surveyoption_model->getsurveyoptiondropdown();
$data["title"]="Create surveyquestionanswer";
$this->load->view("templatewith2",$data);
}
public function createsurveyquestionanswersubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("option","Option","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createsurveyquestionanswer";
$data["question"]=$this->question_model->getquestiondropdown();
$data["user"]=$this->surveyquestionanswer_model->getemaildropdown();
$data["option"]=$this->surveyoption_model->getsurveyoptiondropdown();
$data["title"]="Create surveyquestionanswer";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$question=$this->input->get_post("question");
$option=$this->input->get_post("option");
if($this->surveyquestionanswer_model->create($user,$question,$option)==0)
$data["alerterror"]="New surveyquestionanswer could not be created.";
else
$data["alertsuccess"]="surveyquestionanswer created Successfully.";
$data["redirect"]="site/viewsurveyquestionanswer?id=".$user;
$this->load->view("redirect2",$data);
}
}
public function editsurveyquestionanswer()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editsurveyquestionanswer";
$data["page2"]="block/questionblock";
$data["before1"]=$this->input->get("userid");
$data["before2"]=$this->input->get("userid");
$data["title"]="Edit surveyquestionanswer";
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data["user"]=$this->surveyquestionanswer_model->getemaildropdown();
$data["option"]=$this->surveyoption_model->getsurveyoptiondropdown();
$data["before"]=$this->surveyquestionanswer_model->beforeedit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editsurveyquestionanswersubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("question","Question","trim");
$this->form_validation->set_rules("option","Option","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editsurveyquestionanswer";
$data["question"]=$this->surveyquestion_model->getsurveyquestiondropdown();
$data["user"]=$this->surveyquestionanswer_model->getemaildropdown();
$data["option"]=$this->surveyoption_model->getsurveyoptiondropdown();
$data["title"]="Edit surveyquestionanswer";
$data["before"]=$this->surveyquestionanswer_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$question=$this->input->get_post("question");
$option=$this->input->get_post("option");
if($this->surveyquestionanswer_model->edit($id,$user,$question,$option)==0)
$data["alerterror"]="New surveyquestionanswer could not be Updated.";
else
$data["alertsuccess"]="surveyquestionanswer Updated Successfully.";
$data["redirect"]="site/viewsurveyquestionanswer?id=".$user;
$this->load->view("redirect2",$data);
}
}
public function deletesurveyquestionanswer()
{
$access=array("1","5");
$this->checkaccess($access);
$this->surveyquestionanswer_model->delete($this->input->get("id"));
$user=$this->input->get("userid");
$data["redirect"]="site/viewsurveyquestionanswer?id=".$user;
$this->load->view("redirect2",$data);
}

    public function viewconclusion()
{
        $access = array("1","2","3","5");
		$this->checkaccess($access);
        $data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
        $data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
        $data[ 'gender' ] =$this->user_model->getgendertypedropdown();
		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
		$data[ 'title' ] ="Interlinkage";

        $data['page']='viewconclusion';
        $this->load->view('template',$data);
}


function viewconclusionjson()
{

 $access = array("1","2","3","5");
		$this->checkaccess($access);
        $gender=$this->input->get('gender');
        $maritalstatus=$this->input->get('maritalstatus');
        $designation=$this->input->get('designation');
        $department=$this->input->get('department');
        $spanofcontrol=$this->input->get('spanofcontrol');
        $experience=$this->input->get('experience');
        $salary=$this->input->get('salary');
        $branch=$this->input->get('branch');
        $interlinkage=$this->conclusion_model->getinterlinkage( $gender ,$maritalstatus, $designation ,$department, $spanofcontrol, $experience, $salary, $branch );
        $data['message']=$interlinkage;
        $this->load->view('json',$data);
}
    public function viewconclusion1()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewconclusion1";
$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
$data["base_url"]=site_url("site/viewconclusionjson1");
$data["title"]="View conclusion";
$this->load->view("template",$data);
}

function viewconclusionjson1()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_conclusion`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_conclusion`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`hq_conclusion`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_conclusion`");
$this->load->view("json",$data);
}

public function createconclusion()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createconclusion";
$data["title"]="Create conclusion";
$this->load->view("template",$data);
}
public function createconclusionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createconclusion";
$data["title"]="Create conclusion";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$name=$this->input->get_post("name");
if($this->conclusion_model->create($order,$name)==0)
$data["alerterror"]="New conclusion could not be created.";
else
$data["alertsuccess"]="conclusion created Successfully.";
$data["redirect"]="site/viewconclusion1";
$this->load->view("redirect",$data);
}
}
public function editconclusion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editconclusion";
$data["page2"]="block/conclusionblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["title"]="Edit conclusion";
$data["before"]=$this->conclusion_model->beforeedit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editconclusionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editconclusion";
$data["title"]="Edit conclusion";
$data["before"]=$this->conclusion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$name=$this->input->get_post("name");
if($this->conclusion_model->edit($id,$order,$name)==0)
$data["alerterror"]="New conclusion could not be Updated.";
else
$data["alertsuccess"]="conclusion Updated Successfully.";
$data["redirect"]="site/viewconclusion1";
$this->load->view("redirect",$data);
}
}
public function deleteconclusion()
{
$access=array("1","5");
$this->checkaccess($access);
$this->conclusion_model->delete($this->input->get("id"));
$data["redirect"]="site/viewconclusion1";
$this->load->view("redirect",$data);
}
public function viewconclusionquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewconclusionquestion";
$data["page2"]="block/conclusionblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["base_url"]=site_url("site/viewconclusionquestionjson?id=".$this->input->get("id"));
$data["title"]="View conclusionquestion";
$this->load->view("templatewith2",$data);
}
function viewconclusionquestionjson()
{
$id=$this->input->get("id");
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_conclusionquestion`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_conclusionquestion`.`conclusion`";
$elements[1]->sort="1";
$elements[1]->header="Conclusion";
$elements[1]->alias="conclusion";
$elements[2]=new stdClass();
$elements[2]->field="`hq_question`.`text`";
$elements[2]->sort="1";
$elements[2]->header="Question";
$elements[2]->alias="question";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_conclusionquestion` LEFT OUTER JOIN `hq_question` ON `hq_question`.`id`=`hq_conclusionquestion`.`question`","WHERE `hq_conclusionquestion`.`conclusion`='$id'");
$this->load->view("json",$data);
}

public function createconclusionquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="createconclusionquestion";
 $data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["question"]=$this->conclusionquestion_model->getquestionfromtestdropdown();
$data["title"]="Create conclusionquestion";
$this->load->view("template",$data);
}
public function createconclusionquestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("conclusion","Conclusion","trim");
$this->form_validation->set_rules("question","Question","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["question"]=$this->conclusionquestion_model->getquestionfromtestdropdown();
$data["page"]="createconclusionquestion";
$data["title"]="Create conclusionquestion";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$conclusion=$this->input->get_post("conclusion");
$question=$this->input->get_post("question");
if($this->conclusionquestion_model->create($conclusion,$question)==0)
$data["alerterror"]="New conclusionquestion could not be created.";
else
$data["alertsuccess"]="conclusionquestion created Successfully.";
$data["redirect"]="site/viewconclusionquestion?id=".$conclusion;
$this->load->view("redirect2",$data);
}
}
public function editconclusionquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editconclusionquestion";
$data["title"]="Edit conclusionquestion";
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["question"]=$this->conclusionquestion_model->getquestionfromtestdropdown();
$data["before"]=$this->conclusionquestion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editconclusionquestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("conclusion","Conclusion","trim");
$this->form_validation->set_rules("question","Question","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editconclusionquestion";
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["question"]=$this->conclusionquestion_model->getquestionfromtestdropdown();
$data["title"]="Edit conclusionquestion";
$data["before"]=$this->conclusionquestion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$conclusion=$this->input->get_post("conclusion");
$question=$this->input->get_post("question");
if($this->conclusionquestion_model->edit($id,$conclusion,$question)==0)
$data["alerterror"]="New conclusionquestion could not be Updated.";
else
$data["alertsuccess"]="conclusionquestion Updated Successfully.";
$data["redirect"]="site/viewconclusionquestion?id=".$conclusion;
$this->load->view("redirect2",$data);
}
}
public function deleteconclusionquestion()
{
$access=array("1","5");
$this->checkaccess($access);
$this->conclusionquestion_model->delete($this->input->get("id"));
$conclusionid=$this->input->get("conclusionid");
$data["redirect"]="site/viewconclusionquestion?id=".$conclusionid;
$this->load->view("redirect2",$data);
}
public function viewconclusionsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewconclusionsuggestion";
$data["base_url"]=site_url("site/viewconclusionsuggestionjson");
$data["title"]="View conclusionsuggestion";
$this->load->view("template",$data);
}
function viewconclusionsuggestionjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_conclusionsuggestion`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_conclusionsuggestion`.`conclusion`";
$elements[1]->sort="1";
$elements[1]->header="Conclusion";
$elements[1]->alias="conclusion";
$elements[2]=new stdClass();
$elements[2]->field="`hq_conclusionsuggestion`.`suggestion`";
$elements[2]->sort="1";
$elements[2]->header="Suggestion";
$elements[2]->alias="suggestion";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_conclusionsuggestion`");
$this->load->view("json",$data);
}

public function createconclusionsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="createconclusionsuggestion";
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["title"]="Create conclusionsuggestion";
$this->load->view("template",$data);
}
public function createconclusionsuggestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("conclusion","Conclusion","trim");
$this->form_validation->set_rules("suggestion","Suggestion","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createconclusionsuggestion";
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["title"]="Create conclusionsuggestion";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$conclusion=$this->input->get_post("conclusion");
$suggestion=$this->input->get_post("suggestion");
if($this->conclusionsuggestion_model->create($conclusion,$suggestion)==0)
$data["alerterror"]="New conclusionsuggestion could not be created.";
else
$data["alertsuccess"]="conclusionsuggestion created Successfully.";
$data["redirect"]="site/viewconclusionsuggestion";
$this->load->view("redirect",$data);
}
}
public function editconclusionsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editconclusionsuggestion";
$data["title"]="Edit conclusionsuggestion";
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data["before"]=$this->conclusionsuggestion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editconclusionsuggestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$conclusion=$this->input->get_post("conclusion");
$suggestion=$this->input->get_post("suggestion");
if($this->conclusionsuggestion_model->edit($conclusion,$suggestion)==0)
$data["alerterror"]="New conclusionsuggestion could not be Updated.";
else
$data["alertsuccess"]="conclusionsuggestion Updated Successfully.";
$data["redirect"]="site/viewconclude?id=".$conclusion;
$this->load->view("redirect2",$data);

}
public function deleteconclusionsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$this->conclusionsuggestion_model->delete($this->input->get("id"));
$data["redirect"]="site/viewconclusionsuggestion";
$this->load->view("redirect",$data);
}
public function viewconclusionfinalsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewconclusionfinalsuggestion";
$data["base_url"]=site_url("site/viewconclusionfinalsuggestionjson");
$data["title"]="View conclusionfinalsuggestion";
$this->load->view("template",$data);
}
function viewconclusionfinalsuggestionjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`hq_conclusionfinalsuggestion`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`hq_conclusionfinalsuggestion`.`conclusion`";
$elements[1]->sort="1";
$elements[1]->header="Survey Name";
$elements[1]->alias="conclusion";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hq_conclusionfinalsuggestion`");
$this->load->view("json",$data);
}

public function createconclusionfinalsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="createconclusionfinalsuggestion";
$data["title"]="Create conclusionfinalsuggestion";
$this->load->view("template",$data);
}
public function createconclusionfinalsuggestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("conclusion","Conclusion","trim");
$this->form_validation->set_rules("conclusionsuggestion","Conclusion Suggestion","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createconclusionfinalsuggestion";
$data["title"]="Create conclusionfinalsuggestion";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$conclusion=$this->input->get_post("conclusion");
$conclusionsuggestion=$this->input->get_post("conclusionsuggestion");
if($this->conclusionfinalsuggestion_model->create($conclusion,$conclusionsuggestion)==0)
$data["alerterror"]="New survey could not be created.";
else
$data["alertsuccess"]="Survey created Successfully.";
$data["redirect"]="site/viewconclusionfinalsuggestion";
$this->load->view("redirect",$data);
}
}
public function editconclusionfinalsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="editconclusionfinalsuggestion";
$data["title"]="Edit conclusionfinalsuggestion";
$data["before"]=$this->conclusionfinalsuggestion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editconclusionfinalsuggestionsubmit()
{
$access=array("1","5");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("conclusion","Conclusion","trim");
$this->form_validation->set_rules("conclusionsuggestion","Conclusion Suggestion","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editconclusionfinalsuggestion";
$data[ 'conclusion' ] =$this->conclusion_model->getConclusionDropDown();
$data[ 'conclusionsuggestion' ] =$this->conclusionsuggestion_model->getConclusionSuggestionDropDown();
$data["title"]="Edit conclusionfinalsuggestion";
$data["before"]=$this->conclusionfinalsuggestion_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$conclusion=$this->input->get_post("conclusion");
$conclusionsuggestion=$this->input->get_post("conclusionsuggestion");
if($this->conclusionfinalsuggestion_model->edit($id,$conclusion,$conclusionsuggestion)==0)
$data["alerterror"]="New survey could not be Updated.";
else
$data["alertsuccess"]="Survey Updated Successfully.";
$data["redirect"]="site/viewconclusionfinalsuggestion";
$this->load->view("redirect",$data);
}
}
public function deleteconclusionfinalsuggestion()
{
$access=array("1","5");
$this->checkaccess($access);
$this->conclusionfinalsuggestion_model->delete($this->input->get("id"));
$data["redirect"]="site/viewconclusionfinalsuggestion";
$this->load->view("redirect",$data);
}
  public function viewinterlinkage()
{
$access=array("1","5");
$this->checkaccess($access);
$data["page"]="viewinterlinkage";
$data["title"]="View conclusionfinalsuggestion";
$this->load->view("template",$data);
}
    public function getinterlinkage(){

//        $data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
//        $data[ 'department' ] =$this->user_model->getdepartmenttypedropdown();
//        $data[ 'gender' ] =$this->user_model->getgendertypedropdown();
//		$data[ 'maritalstatus' ] =$this->user_model->getmaritalstatustypedropdown();
//		$data[ 'designation' ] =$this->user_model->getdesignationtypedropdown();
//		$data[ 'branch' ] =$this->user_model->getbranchtypedropdown();
//		$data[ 'page' ] = 'dashboard';
//		$data[ 'title' ] = 'Welcome';
//		$this->load->view( 'template', $data );
    }
    public function createlogo()
{
$access=array("1","5","3");
$this->checkaccess($access);
$data["page"]="createlogo";
$data["image"]=$this->menu_model->getimagebyid();
$image=$data["image"]->image;
$data["title"]="Add Logo";
$this->load->view("template",$data);
}
    public function createlogosubmit()
{
        $access=array("1","5","3");
$this->checkaccess($access);
 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

        if($this->menu_model->createimage($image)==0)
$data["alerterror"]="New logo could not be Updated.";
else
$data["alertsuccess"]="logo Updated Successfully.";
$data["redirect"]="site/createlogo";
$this->load->view("redirect",$data);
}
       public function disableCompany()
	{
        $id=$this->input->get("id");
		$result=$this->surveyquestionuser_model->disableCompany($id);
        $data["message"] = $result;
        $this->load->view("json", $data);

	}
    public function enableCompany()
	{
        $id=$this->input->get("id");
		$result=$this->surveyquestionuser_model->enableCompany($id);
        $data["message"] = $result;
        $this->load->view("json", $data);

	}
    public function getSchedule()
	{
     $access=array("1","2","3");
$this->checkaccess($access);
$data["page"]="questionschedule";
$data["checkpackage"]=$this->menu_model->checkpackage();
$data['pillar']=$this->pillar_model->getpillarweightforedit();
$data['question']=$this->question_model->getallquestion();
$data[ 'schedule' ] =$this->user_model->getscheduledropdown();
//$data['lastpillardetail']=$this->pillar_model->lastpillardetail();
//  echo $data['showavg'];
$data["title"]="View pillar";
$this->load->view("template",$data);

	}
     public function sendMailToEachUser()
   {
       $getUserid=$this->restapi_model->getUsers();
        foreach($getUserid as $getUserid){
            $email=$getUserid->email;
             $hashvalue=base64_encode ($getUserid->id."&hq");
       $link="<a href='http://wohlig.co.in/hqfront/#/playing/$hashvalue'>Click here </a> To get questions.";
               $this->load->library('email');
       $this->email->from('master@willnevergrowup.in', 'HQ');
       $this->email->to($email);
       $this->email->subject('Test');

//       $message = "Hiii      ".$link;
       $message = "<html>
        <p>Hello!</p><br>
      <p>Feel like taking a break from work? Click on this link to have some fun! </p><span>$link</span><br>
<p>For any queries/support, contact the HR Team on ___________________</p><br>
      </html>";
       $this->email->message($message);
       $this->email->send();
        }
    $data["redirect"]="site/getSchedule";
         $this->load->view("redirect",$data);

   }
	 public function getWelcomePage(){
		 $data["page"]="welcome";
		 $data["title"]="Welcome to HQ";
		 $this->load->view("template",$data);
	 }
    public function getPillarWeight(){
		 $weights=$this->pillar_model->getallpillars();
        $data["message"] = $weights;
		$this->load->view( 'json', $data );
	 }
    public function viewchangeexpected(){
        $access=array("1","5");
        $this->checkaccess($access);
        $data['before']=$this->pillar_model->getallpillarsbypackage();
        $data['elevenpillar']=$this->pillar_model->getelevenpillar();
        $data["page"]="viewchangeexpected";
        $data["title"]="View Expected Weightages";
        $this->load->view("template",$data);
	 }
    public function editchangeexpected(){
        $access=array("1","5");
        $this->checkaccess($access);
        $expected1=$this->input->get_post("expected1");
        $expected2=$this->input->get_post("expected2");
        $expected3=$this->input->get_post("expected3");
        $expected4=$this->input->get_post("expected4");
        $expected5=$this->input->get_post("expected5");
        $expected6=$this->input->get_post("expected6");
        $expected7=$this->input->get_post("expected7");
        $expected8=$this->input->get_post("expected8");
        $expected9=$this->input->get_post("expected9");
        $expected10=$this->input->get_post("expected10");
        $expected11=$this->input->get_post("expected11");
        $checkpackage=$this->menu_model->checkpackage();
        if($checkpackage !=4)
            {
                $sum=$expected1 + $expected2 + $expected3 + $expected4 + $expected5 + $expected6 + $expected7 + $expected8 + $expected9 + $expected10;
                if($sum==100)
                {
                     if($this->pillar_model->editchangeexpected($expected1,$expected2,$expected3,$expected4,$expected5,$expected6,$expected7,$expected8,$expected9,$expected10,$expected11)==0)                     
                    {     
                        $data["alerterror"]="Expected Weightages Cannot Updated Successfully.";
                        $data["redirect"]="site/viewchangeexpected";
                        $this->load->view("redirect",$data);
                    }
                    else
                    {
                        $data["alertsuccess"]="Expected Weightages Updated Successfully.";
                        $data["redirect"]="site/viewchangeexpected";
                        $this->load->view("redirect",$data);
                    }
                    
                }
                else
                    {
                     $data["alerterror"]="Sum Should be equal to 100";
                     $data["redirect"]="site/viewchangeexpected";
                     $this->load->view("redirect",$data);
                    }
            }
        else
            {
                $sum=$expected1 + $expected2 + $expected3 + $expected4 + $expected5 + $expected6 + $expected7 + $expected8 + $expected9 +  $expected10 + $expected11;
                if($sum==100)
                {
                     if($this->pillar_model->editchangeexpected($expected1,$expected2,$expected3,$expected4,$expected5,$expected6,$expected7,$expected8,$expected9,$expected10,$expected11)==0)     
                     {    
                        $data["alerterror"]="Expected Weightages Cannot Updated Successfully.";
                        $data["redirect"]="site/viewchangeexpected";
                        $this->load->view("redirect",$data);
                      }
                    else
                    {
                        $data["alertsuccess"]="Expected Weightages Updated Successfully.";
                        $data["redirect"]="site/viewchangeexpected";
                        $this->load->view("redirect",$data);
                    }
                }
                else
                    {
                     $data["alerterror"]="Sum Should be equal to 100";
                     $data["redirect"]="site/viewchangeexpected";
                     $this->load->view("redirect",$data);
                    }
                
            }
       
	 }
//    public function getallpillarsbypackage(){
//		$data['']=$this->pillar_model->getallpillarsbypackage();
//        $data["message"] = $weights;
//		$this->load->view( 'json', $data );
//	 }
    public function exportsuggestioncsv(){
		$access = array("1");
		$this->checkaccess($access);
        $companyname=$this->input->get('companyname');
		$this->conclusion_model->exportsuggestioncsv($companyname);
        $data['redirect']="site/viewconclusion";
        $this->load->view("redirect",$data);
	 }
    public function exportsurveyresultcsv(){
		$access = array("1");
		$this->checkaccess($access);
        $surveyid=$this->input->get('id');
		$this->surveyquestionanswer_model->exportsurveyresultcsv($surveyid);
        $data['redirect']="site/viewconclusion";
        $this->load->view("redirect",$data);
	 }   
   
    
}
?>
