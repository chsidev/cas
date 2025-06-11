<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('loginpage');
	}
	public function login()
	{
		$name = $this->input->post('uname');
		$password = $this->input->post('upass');
		if($name=='admin' && $password=="casauto123") {
			$this->session->set_userdata(array('username'=>$name));
			redirect('/search');
		} else {
			redirect('/');
		}
	}
	public function logout()
	{
		//destroy session
		$this->session->unset_userdata('username');
		redirect('/');
	}
}