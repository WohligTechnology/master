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
    public function getOrderingDone()
    {
        $orderby=$this->input->get("orderby");
        $ids=$this->input->get("ids");
        $ids=explode(",",$ids);
        $tablename=$this->input->get("tablename");
        $where=$this->input->get("where");
        if($where == "" || $where=="undefined")
        {
            $where=1;
        }
        $access = array(
            '1',
        );
        $this->checkAccess($access);
        $i=1;
        foreach($ids as $id)
        {
            //echo "UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = `$id` AND $where";
            $this->db->query("UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = '$id' AND $where");
            $i++;
            //echo "/n";
        }
        $data["message"]=true;
        $this->load->view("json",$data);

    }
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
         $accesslevelid=$this->session->userdata("accesslevel");
        $data['blockedcompanies']=$this->company_model->getblockedcompany();
        $data['packageexpire']=$this->company_model->getpackageexpire();
        $data['sector']=$this->company_model->getSectorDropDown();
        if($accesslevelid==2){
            $data[ 'page' ] = 'createcompany';
        }
        else{
            $data[ 'page' ] = 'dashboard';
        }

        $data['company']=$this->company_model->getcompanycount();
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );
	}
    public function getcompanysector(){
         $data['message']=$this->company_model->getcompanysector();
         $this->load->view("json",$data);

    }
    public function getcompanypackage(){
         $data['message']=$this->company_model->getcompanypackage();
         $this->load->view("json",$data);

    }
    public function getcompanypackageschart(){
         $data['message']=$this->company_model->getCompanyPackagesChart();
         $this->load->view("json",$data);

    }
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
        $data['gender']=$this->user_model->getgenderdropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
            $data['gender']=$this->user_model->getgenderdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
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
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $phone=$this->input->post('phone');
            $billingaddress=$this->input->post('billingaddress');
            $billingcity=$this->input->post('billingcity');
            $billingstate=$this->input->post('billingstate');
            $billingcountry=$this->input->post('billingcountry');
            $billingpincode=$this->input->post('billingpincode');
            $billingcontact=$this->input->post('billingcontact');

            $shippingaddress=$this->input->post('shippingaddress');
            $shippingcity=$this->input->post('shippingcity');
            $shippingstate=$this->input->post('shippingstate');
            $shippingcountry=$this->input->post('shippingcountry');
            $shippingpincode=$this->input->post('shippingpincode');
            $shippingcontact=$this->input->post('shippingcontact');
            $shippingname=$this->input->post('shippingname');
            $currency=$this->input->post('currency');
            $credit=$this->input->post('credit');
            $companyname=$this->input->post('companyname');
            $registrationno=$this->input->post('registrationno');
            $vatnumber=$this->input->post('vatnumber');
            $country=$this->input->post('country');
            $fax=$this->input->post('fax');
            $gender=$this->input->post('gender');

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

			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$firstname,$lastname,$phone,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$billingcontact,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$shippingcontact,$shippingname,$currency,$credit,$companyname,$registrationno,$vatnumber,$country,$fax,$gender)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");

		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);


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
        $elements[4]->field="`user`.`logintype`";
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

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");

		$this->load->view("json",$data);
	}


	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
        $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['gender']=$this->user_model->getgenderdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
//		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
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
            $data['gender']=$this->user_model->getgenderdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
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
//            $category=$this->input->get_post('category');
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $phone=$this->input->post('phone');
            $billingaddress=$this->input->post('billingaddress');
            $billingcity=$this->input->post('billingcity');
            $billingstate=$this->input->post('billingstate');
            $billingcountry=$this->input->post('billingcountry');
            $billingpincode=$this->input->post('billingpincode');
            $billingcontact=$this->input->post('billingcontact');

            $shippingaddress=$this->input->post('shippingaddress');
            $shippingcity=$this->input->post('shippingcity');
            $shippingstate=$this->input->post('shippingstate');
            $shippingcountry=$this->input->post('shippingcountry');
            $shippingpincode=$this->input->post('shippingpincode');
            $shippingcontact=$this->input->post('shippingcontact');
            $shippingname=$this->input->post('shippingname');
            $currency=$this->input->post('currency');
            $credit=$this->input->post('credit');
            $companyname=$this->input->post('companyname');
            $registrationno=$this->input->post('registrationno');
            $vatnumber=$this->input->post('vatnumber');
            $country=$this->input->post('country');
            $fax=$this->input->post('fax');
            $gender=$this->input->post('gender');
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

			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$firstname,$lastname,$phone,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$billingcontact,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$shippingcontact,$shippingname,$currency,$credit,$companyname,$registrationno,$vatnumber,$country,$fax,$gender)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";

			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);

		}
	}

	function deleteuser()
	{
		$access = array("1");
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
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    public function viewcart()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcart";
    $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
$data['page2']='block/userblock';
$data["base_url"]=site_url("site/viewcartjson?id=").$this->input->get('id');
$data["title"]="View cart";
$this->load->view("templatewith2",$data);
}
function viewcartjson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_cart`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`fynx_cart`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`fynx_cart`.`quantity`";
$elements[2]->sort="1";
$elements[2]->header="Quantity";
$elements[2]->alias="quantity";
$elements[3]=new stdClass();
$elements[3]->field="`fynx_cart`.`product`";
$elements[3]->sort="1";
$elements[3]->header="Product";
$elements[3]->alias="product";
$elements[4]=new stdClass();
$elements[4]->field="`fynx_cart`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp";
$elements[4]->alias="timestamp";

$elements[5]=new stdClass();
$elements[5]->field="`fynx_cart`.`size`";
$elements[5]->sort="1";
$elements[5]->header="Size";
$elements[5]->alias="size";

$elements[6]=new stdClass();
$elements[6]->field="`fynx_cart`.`color`";
$elements[6]->sort="1";
$elements[6]->header="Color";
$elements[6]->alias="color";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_cart`","WHERE `fynx_cart`.`user`='$id'");
$this->load->view("json",$data);
}
    public function viewwishlist()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewwishlist";
    $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
$data['page2']='block/userblock';
$data["base_url"]=site_url("site/viewwishlistjson?id=".$this->input->get('id'));
$data["title"]="View wishlist";
$this->load->view("templatewith2",$data);
}
function viewwishlistjson()
{
    $user=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_wishlist`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`fynx_wishlist`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`fynx_wishlist`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";
$elements[3]=new stdClass();
$elements[3]->field="`fynx_wishlist`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$elements[4]=new stdClass();
$elements[4]->field="`fynx_product`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Product Name";
$elements[4]->alias="productname";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_wishlist` LEFT OUTER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_wishlist`.`product`","WHERE `fynx_wishlist`.`user`='$user'");
$this->load->view("json",$data);
}




public function viewcompany()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcompany";
$data["base_url"]=site_url("site/viewcompanyjson");
$data["title"]="View company";
$this->load->view("template",$data);
}
    public function viewpackageexpiring()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcompany";
$data["base_url"]=site_url("site/viewcompanyjson1?id=1");
$data["title"]="View company";
$this->load->view("template",$data);
}
    public function viewblockcompanies()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcompany";
$data["base_url"]=site_url("site/viewcompanyjson1?id=2");
$data["title"]="View company";
$this->load->view("template",$data);
}
function viewcompanyjson1()
{
    $id=$this->input->get('id');
    $companyid=$this->company_model->getpackageexpirecompanies();
    $companyids="(";
            foreach($companyid as $key=>$value){
                if($key==0)
                {
                    $companyids.=$value->id;
                }
                else
                {
                    $companyids.=",".$value->id;
                }
            }
            $companyids.=")";
            if($companyids=="()"){
             $companyids="(0)";
            }
    $where="";
    if($id==2)
    {
    $where="WHERE `master_company`.`isblock`=1";
    }
    else if($id==1)
    {
        // expire
    $where="WHERE `master_company`.`id` IN $companyids";
    }

$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`master_company`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`master_company`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Contact Name";
$elements[1]->alias="name";

$elements[2]=new stdClass();
$elements[2]->field="`master_company`.`email`";
$elements[2]->sort="1";
$elements[2]->header="Contact Email";
$elements[2]->alias="email";

$elements[3]=new stdClass();
$elements[3]->field="`master_company`.`package`";
$elements[3]->sort="1";
$elements[3]->header="Package";
$elements[3]->alias="package";

$elements[4]=new stdClass();
$elements[4]->field="`master_company`.`isblock`";
$elements[4]->sort="1";
$elements[4]->header="isblock";
$elements[4]->alias="isblock";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `master_company`","$where");
$this->load->view("json",$data);
}
    function viewcompanyjson()
{

$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`master_company`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`master_company`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Contact Name";
$elements[1]->alias="name";

$elements[2]=new stdClass();
$elements[2]->field="`master_company`.`email`";
$elements[2]->sort="1";
$elements[2]->header=" Contact Email";
$elements[2]->alias="email";

$elements[3]=new stdClass();
$elements[3]->field="`master_company`.`package`";
$elements[3]->sort="1";
$elements[3]->header="Package";
$elements[3]->alias="package";

$elements[4]=new stdClass();
$elements[4]->field="`master_company`.`isblock`";
$elements[4]->sort="1";
$elements[4]->header="isblock";
$elements[4]->alias="isblock";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `master_company`");
$this->load->view("json",$data);
}

public function createcompany()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createcompany";
$data['sector']=$this->company_model->getSectorDropDown();
$data["title"]="Create company";
$this->load->view("template",$data);
}
public function createcompanysubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("email","Email","trim");
$this->form_validation->set_rules("package","Package","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['sector']=$this->company_model->getSectorDropDown();
$data["page"]="createcompany";
$data["title"]="Create company";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$package=$this->input->get_post("package");
$startdate=$this->input->get_post("startdate");
$enddate=$this->input->get_post("enddate");
$sector=$this->input->get_post("sector");
    $value=$this->company_model->create($name,$email,$package,$startdate,$enddate,$sector);
if($value==0){
    $data["alerterror"]="New company could not be created.";
}

else{
    $data["alertsuccess"]="company created Successfully.";
$accesslevelid=$this->session->userdata("accesslevel");
    if($accesslevelid==1)
    {
        $data["redirect"]="site/viewcompany";
        $this->load->view("redirect",$data);
    }
    else if($accesslevelid==2)
    {
        $data["redirect"]="site/editcompany?id=".$value;
        $this->load->view("redirect2",$data);
    }


}

}
}
public function editcompany()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="editcompany";
$data["page2"]="block/companyblock";
$data["base_url"]=site_url("site/viewcompanypackagejson");
$data['sector']=$this->company_model->getSectorDropDown();
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["title"]="Edit company";
$data["before"]=$this->company_model->beforeedit($this->input->get("id"));
$data["base_url"]=site_url("site/viewcompanypackagejson?id=".$this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editcompanysubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("id","Id","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("email","Email","trim");
$this->form_validation->set_rules("package","Package","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['sector']=$this->company_model->getSectorDropDown();
$data["page"]="editcompany";
$data["title"]="Edit company";
$data["before"]=$this->company_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$package=$this->input->get_post("package");
$startdate=$this->input->get_post("startdate");
$enddate=$this->input->get_post("enddate");
$sector=$this->input->get_post("sector");
if($this->company_model->edit($id,$name,$email,$package,$startdate,$enddate,$sector)==0)
$data["alerterror"]="New company could not be Updated.";
else
$data["alertsuccess"]="company Updated Successfully.";
$data["redirect"]="site/viewcompany";
$this->load->view("redirect",$data);
}
}
public function deletecompany()
{
$access=array("1");
$this->checkaccess($access);
$this->company_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcompany";
$this->load->view("redirect",$data);
}
    // PACKAGE

    public function viewpackage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewpackage";
$data["base_url"]=site_url("site/viewpackagejson");
$data["title"]="View package";
$this->load->view("template",$data);
}
function viewpackagejson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`package`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`package`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="statusname";
$elements[2]->alias="statusname";
$elements[3]=new stdClass();
$elements[3]->field="`package`.`startdate`";
$elements[3]->sort="1";
$elements[3]->header="startdate";
$elements[3]->alias="startdate";

$elements[4]=new stdClass();
$elements[4]->field="`package`.`enddate`";
$elements[4]->sort="1";
$elements[4]->header="enddate";
$elements[4]->alias="enddate";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `package` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`package`.`status`");
$this->load->view("json",$data);
}

public function createpackage()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createpackage";
    $data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create package";
$this->load->view("template",$data);
}
public function createpackagesubmit()
{
    $access=array("1","2");
    $this->checkaccess($access);
    $name=$this->input->get_post("name");
    $status=$this->input->get_post("status");
    $startdate=$this->input->get_post("startdate");
    $enddate=$this->input->get_post("enddate");

    if($this->package_model->create($name,$status,$startdate,$enddate)==0)
    $data["alerterror"]="New package could not be created.";
    else
    $data["alertsuccess"]="package created Successfully.";
    $data["redirect"]="site/viewpackage";
    $this->load->view("redirect",$data);
}

public function editpackage()
{
$access=array("1","2");
$this->checkaccess($access);
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editpackage";
$data["title"]="Edit package";
$data["before"]=$this->package_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editpackagesubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
    $status=$this->input->get_post("status");
    $startdate=$this->input->get_post("startdate");
    $enddate=$this->input->get_post("enddate");
if($this->package_model->edit($id,$name,$status,$startdate,$enddate)==0)
$data["alerterror"]="New package could not be Updated.";
else
$data["alertsuccess"]="package Updated Successfully.";
$data["redirect"]="site/viewpackage";
$this->load->view("redirect",$data);
}

public function deletepackage()
{
$access=array("1","2");
$this->checkaccess($access);
$this->package_model->delete($this->input->get("id"));
$data["redirect"]="site/viewpackage";
$this->load->view("redirect",$data);
}
//COMPANY PACKAGE

public function viewcompanypackage()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewcompanypackage";
$data["page2"]="block/companyblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data["base_url"]=site_url("site/viewcompanypackagejson?id=".$this->input->get('id'));
$data["title"]="View companypackage";
$this->load->view("templatewith2",$data);
}
function viewcompanypackagejson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`companypackage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="Id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`companypackage`.`company`";
$elements[1]->sort="1";
$elements[1]->header="company";
$elements[1]->alias="company";
$elements[2]=new stdClass();
$elements[2]->field="`package`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements[3]=new stdClass();
$elements[3]->field="`package`.`startdate`";
$elements[3]->sort="1";
$elements[3]->header="Start Date";
$elements[3]->alias="startdate";
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
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `companypackage` LEFT OUTER JOIN `package` ON `package`.`id`=`companypackage`.`package`","WHERE `companypackage`.`company`=$id");
$this->load->view("json",$data);
}

public function createcompanypackage()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createcompanypackage";
$data["package"]=$this->package_model->getPackageDropDown();
$data["company"]=$this->company_model->getCompanyDropDown();
$data["title"]="Create companypackage";
$this->load->view("template",$data);
}
public function createcompanypackagesubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$company=$this->input->get_post("company");
$package=$this->input->get_post("package");
if($this->companypackage_model->create($company,$package)==0)
$data["alerterror"]="New companypackage could not be created.";
else
$data["alertsuccess"]="companypackage created Successfully.";
$data["redirect"]="site/viewcompanypackage?id=".$company;
$this->load->view("redirect2",$data);
}

public function editcompanypackage()
{
$access=array("1","2");
$this->checkaccess($access);
$data["package"]=$this->package_model->getPackageDropDown();
$data["company"]=$this->company_model->getCompanyDropDown();
$data["page"]="editcompanypackage";
$data["page2"]="block/companyblock";
$data["before1"]=$this->input->get("companyid");
$data["before2"]=$this->input->get("companyid");
$data["title"]="Edit companypackage";
$data["before"]=$this->companypackage_model->beforeedit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editcompanypackagesubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$id=$this->input->get_post("id");
$company=$this->input->get_post("company");
$package=$this->input->get_post("package");
if($this->companypackage_model->edit($id,$company,$package)==0)
$data["alerterror"]="New companypackage could not be Updated.";
else
     // ASSIGHNING A PACKAGE FOR A COMPANY

     $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$company.'/index.php/json/assignpackage?package='.$package;
    $exactpathtobackend=$mainurl.$company;
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
$data["alertsuccess"]="companypackage Updated Successfully.";
$data["redirect"]="site/viewcompanypackage?id=".$company;
$this->load->view("redirect2",$data);
}

public function deletecompanypackage()
{
    $access=array("1","2");
    $this->checkaccess($access);
    $this->companypackage_model->delete($this->input->get("id"));
    $data["redirect"]="site/viewcompanypackage?id=".$this->input->get("companyid");
    $this->load->view("redirect2",$data);
}
public function blockCompany()
{
    $access=array("1");
    $this->checkaccess($access);
    $companyid=$this->input->get("id");
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
     $data["message"] = 1;
    $this->load->view("json", $data);


}
    public function unBlockCompany()
{
    $access=array("1");
    $this->checkaccess($access);
    $companyid=$this->input->get("id");
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/json/unBlockCompany';
    $this->db->query("UPDATE `master_company` SET `isblock`=0 WHERE `id`='$companyid'");
        // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "$exactpath");
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);
     $data["message"] = 1;
    $this->load->view("json", $data);


}
    public function resendEmail()
{
    $access=array("1");
    $this->checkaccess($access);
    $companyid=$this->input->get("id");
    $companydetails=$this->company_model->getsinglecompany($companyid);
    $receiver=$companydetails->email;
		$expiredate=$companydetails->enddate;
		$package=$companydetails->package;
        // create random password

        $password=$this->companypackage_model->checkrandom();
        // COMPANY PACKAGE
    $package=$companydetails->package;
        if($package==1){
					$htmltext = $this->load->view('emailers/starterpackage', $data, true);
					$this->menu_model->emailer($htmltext,'Welcome to Happyness Quotient!',$email,"Sir/Madam");
        }
        else if($package==2){
					$htmltext = $this->load->view('emailers/advancedpackage', $data, true);
					$this->menu_model->emailer($htmltext,'Welcome to Happyness Quotient!',$email,"Sir/Madam");
        }
        else if($package==3){
					$htmltext = $this->load->view('emailers/propackage', $data, true);
					$this->menu_model->emailer($htmltext,'Welcome to Happyness Quotient!',$email,"Sir/Madam");
        }
        else if($package==4){
					$htmltext = $this->load->view('emailers/propluspackage', $data, true);
					$this->menu_model->emailer($htmltext,'Welcome to Happyness Quotient!',$email,"Sir/Madam");
        }
    $sender="master@willnevergrowup.in";
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid;
         // ASSIGHNING A CREDENTIALS FOR A COMPANY
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpathforcredential=$mainurl.$companyid.'/index.php/json/changecredentials?email='.$receiver.'&pass='.$password.'&package='.$package.'&expiredate='.$expiredate;
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

        $this->load->view("json",$data);
}
    public function provideAccess()
{
    $access=array("1");
    $this->checkaccess($access);
    $companyid=$this->input->get("id");
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/login/validate';
    $exactpathtobackend=$mainurl.$companyid;

     $fields = array(
                        'username' => "master@master.com",
                        'password' => 'master123'
                    );
        $stng= http_build_query($fields);
        $ch = curl_init($exactpath);

        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $stng);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($ch);
        $result = json_decode($result);
//        echo $result->access_token;
        curl_close($ch);
        redirect($exactpathtobackend);

}
    public function changePassword()
{
    $access=array("1");
    $this->checkaccess($access);
    $companyid=$this->input->get("id");
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/site/edituser?id=1';
        redirect($exactpath);

}
    public function viewInterlinkage()
{
    $access=array("1");
    $this->checkaccess($access);
    $companyid=$this->input->get("id");
    $this->load->helper('url');
    $mainurl=$this->config->base_url();
    $exactpath=$mainurl.$companyid.'/index.php/login/interlinkage';
        redirect($exactpath);

}
     public function checkblockpackage()
    {
			//package will expiure
        // willbe included in cron
         $todaysdate=date("Y-m-d");
         $query=$this->db->query("SELECT * FROM `master_company` WHERE `enddate` <= '$todaysdate' AND `isblock`=0")->result();
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
         $dayafter30days=date("Y-m-d",strtotime("+30 days"));
         $query=$this->db->query("SELECT * FROM `master_company` WHERE `enddate` = '$dayafter30days' AND `isblock`=0")->result();
        if(!empty($query))
        {
            foreach($query as $row)
            {
                $companyid=$row->id;
                $companyname=$row->name;
                $email=$row->email;

                $sender="master@willnevergrowup.in";
								$htmltext = $this->load->view('emailers/expirenote', $data, true);
							$this->menu_model->emailer($htmltext,'Your Happyness Quotient Package Is About To Expire!',$email,"Sir/Madam");
            }
        }
    }
    // public function packageexpiremail()
    // {
    //     // willbe included in cron
    //      $todaysdate=date("Y-m-d");
    //      $query=$this->db->query("SELECT * FROM `master_company` WHERE `enddate` = '$todaysdate' AND `isblock`=0")->result();
    //     if(!empty($query))
    //     {
    //         foreach($query as $row)
    //         {
    //             $companyid=$row->id;
    //             $companyname=$row->name;
    //             $email=$row->email;
		//
    //             $sender="master@willnevergrowup.in";
		// 						$htmltext = $this->load->view('emailers/expirenote', $data, true);
		// 					$this->menu_model->emailer($htmltext,'Your Happyness Quotient Package Is About To Expire!',$email,"Sir/Madam");
    //         }
    //     }
    // }

}
?>
