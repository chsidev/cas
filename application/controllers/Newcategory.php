<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Newcategory extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		if($username) {
			$this->load->view('addcategorypage');
		} else {
			redirect('/');
		}
	}
	public function save()
	{
		$this->load->model('Categories');
		$name = $this->input->post('name');
		if(isset($name) && $name) {
			$r = $this->Categories->add($name);
			echo $r;
		}
	}
	public function edit()
	{
		$this->load->model('Categories');
		$name = $this->input->post('name');
		$old = $this->input->post('old');
		if(isset($name) && $name) {
			$r = $this->Categories->update($old,$name);
			echo $r;
		}
	}
}# Change 0 on 2019-06-08
