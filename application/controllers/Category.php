<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		if($username) {
			$this->load->model('Categories');
			$categories = $this->Categories->getAll();
			$this->load->view('categorypage', array('categories'=>$categories));
		} else {
			redirect('/');
		}
	}
	public function del()
	{
		$id = $this->input->post('i');
		if(isset($id) && $id) {
			$this->load->model('Categories');
			$this->Categories->deleteById($id);
			exit('y');
		}
	}
}# Change 1 on 2019-06-19
# Change 2 on 2019-07-11
# Change 1 on 2019-07-17
# Change 0 on 2019-07-24
# Change 1 on 2019-07-24
# Change 1 on 2019-08-09
# Change 0 on 2019-08-08
