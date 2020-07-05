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
# Change 3 on 2019-06-22
# Change 2 on 2019-06-23
# Change 2 on 2019-07-12
# Change 3 on 2019-07-17
# Change 0 on 2019-08-09
# Change 1 on 2019-08-15
# Change 3 on 2019-09-20
# Change 1 on 2019-11-06
# Change 1 on 2019-12-25
# Change 0 on 2020-01-30
# Change 1 on 2020-03-12
# Change 1 on 2020-04-10
# Change 0 on 2020-04-16
# Change 2 on 2020-04-17
# Change 0 on 2020-06-14
# Change 1 on 2020-06-20
# Change 0 on 2020-07-05
