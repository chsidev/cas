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
# Change 2 on 2019-06-27
# Change 1 on 2019-07-11
# Change 2 on 2019-08-09
# Change 0 on 2019-08-18
# Change 1 on 2019-09-05
# Change 2 on 2019-09-20
# Change 1 on 2019-10-26
# Change 0 on 2019-12-29
# Change 1 on 2020-01-17
# Change 0 on 2020-02-16
# Change 2 on 2020-03-13
# Change 2 on 2020-04-01
# Change 0 on 2020-04-10
# Change 0 on 2020-04-25
# Change 1 on 2020-04-25
# Change 0 on 2020-05-17
# Change 2 on 2020-05-17
# Change 1 on 2020-07-09
# Change 1 on 2020-07-17
# Change 1 on 2020-07-18
