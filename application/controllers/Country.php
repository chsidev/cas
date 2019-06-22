<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Country extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		if($username) {
			$this->load->view('countrypage');
		} else {
			redirect('/');
		}
	}
	public function city()
	{
		$this->load->model('City');
		$cities = $this->City->getAll();
		exit(json_encode($cities));
	}
}# Change 0 on 2019-06-22
