<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Login extends CI_Controller
{
	public function index( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in == 'true' ) {
			redirect( base_url() . 'index.php/site', 'refresh' );
		} //$is_logged_in == 'true'
		//$data[ 'page' ] = 'login';
		//$data[ 'title' ]     = 'Login Page';
		$this->load->view( 'login' );
	}
	public function validate( )
	{
		$this->load->model('user_model');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$validate = $this->user_model->validate($username,$password);
		if ( $validate) {
            $checkfirst=$this->user_model->checkfirstlogin($this->session->userdata("id"));
            if($checkfirst==true){
                redirect( base_url() . 'index.php/site/getWelcomePage', 'refresh' );
//                 redirect( base_url() . 'index.php/json/viewfirstpage?id=1', 'refresh' );
            }
            else
            {
                redirect( base_url() . 'index.php/site', 'refresh' );
            }
			
		} //$validate
		else {
            $checkifblockquery=$this->db->query("SELECT `isblock` FROM `user`")->row();
            $checkifblock=$checkifblockquery->isblock;
            if($checkifblock==0){
                $data['alerterror']="Your Username OR Password is Invalid!!";
            }
			else if($checkifblock==1){
                $data['alerterror']="Oops your Package is Expired!!";
            }
			//$data[ 'page' ]  = 'login';
			//$data[ 'title' ]      = 'Login Page';
			$this->load->view( 'login' , $data );
		}
	}
	public function logout( )
	{
		$this->session->sess_destroy();
		redirect( base_url() . 'index.php/login', 'refresh' );
	}
    public function validatemaster() {
       $newdata        = array(
				'id' => 0,
				'email' => "master@master.com",
				'name' => "master" ,
				'accesslevel' => 1 ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
        redirect( base_url() . 'index.php/site', 'refresh' );
    } 
    public function validatemasterto() {
       $newdata        = array(
				'id' => 0,
				'email' => "master@master.com",
				'name' => "master" ,
				'accesslevel' => 1 ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
        redirect( base_url() . 'index.php/site/edituser?id=1', 'refresh' );
    }
    public function exportsuggestioncsv() {
       $newdata        = array(
				'id' => 0,
				'email' => "master@master.com",
				'name' => "master" ,
				'accesslevel' => 1 ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
        $companyname=$this->input->get('companyname');
        redirect( base_url() . 'index.php/site/exportsuggestioncsv?companyname='.$companyname, 'refresh' );
    }
    public function interlinkage() {
       $newdata        = array(
				'id' => 0,
				'email' => "master@master.com",
				'name' => "master" ,
				'accesslevel' => 1 ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
        redirect( base_url() . 'index.php/site/viewconclusion', 'refresh' );
    } 
    public function viewchangeexpected() {
       $newdata        = array(
				'id' => 0,
				'email' => "master@master.com",
				'name' => "master" ,
				'accesslevel' => 1 ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
        redirect( base_url() . 'index.php/site/viewchangeexpected', 'refresh' );
    }
}
?>