<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 3;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('statistik_m');
	}

	public function index()
	{		
		$data['menu'] = "Statistik Data";
		$data['row'] = $this->statistik_m->get();
		$data['jumlah_komisariat'] = $this->fungsi->pilihan("tb_komisariat")->num_rows();
		$data['jumlah_rayon'] = $this->fungsi->pilihan("tb_rayon")->num_rows();;
		$data['total_alumni'] = $this->fungsi->pilihan("tb_user")->num_rows()-2;;
		$data['footer_script'] = "chart-admin";
		$this->templateadmin->load('template/dashboard','statistik/statistik_data',$data);
	}

	
}
