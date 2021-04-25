<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$this->fungsi->checkActive($this->session->id);

		$data['menu'] = "Menu E-IKAPMII Kota Malang";
		$this->templateadmin->load('template/dashboard','page/beranda',$data);
	}
}
