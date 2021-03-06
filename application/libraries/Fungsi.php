<?php 

class Fungsi {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$userid = $this->ci->session->userdata('id');
		$query = $this->ci->user_m->get($userid)->row();
		return $query;
	}

	function pilihan($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_selected($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get();
		return $query;
	}

	function pilihan_advanced($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}


	// Result Cepat
	function get_deskripsi($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get()->row("deskripsi");
		return $query;
	}

	function get_deskripsi_advanced($tabel,$kode,$id,$perintah) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->row($perintah);
		return $query;
	}

	// Span
	function get_span($value,$true,$false,$alternative) {		
		if ($value == 1) {
			$query = "<span class='badge badge-info'>".$true."</span>";
		} elseif ($value == 2) {
			$query = "<span class='badge badge-danger'>".$false."</span>";
		} elseif ($value == 3) {
			$query = "<span class='badge badge-warning'>".$alternative."</span>";
		}
		echo $query;
	}


	// Hitung Cepat
	function hitung_rows($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->like($kode2,$id2);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_triple($tabel,$kode1,$id1,$kode2,$id2,$kode3,$id3) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$this->ci->db->like($kode3,$id3);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function checkActive($id)
	{
		$this->ci->db->from('tb_user');
		$this->ci->db->where('id',$id);
		$status = $this->ci->db->get()->row("status");
		if ($status == "2") {
			$this->ci->session->set_flashdata('warning','Status anda belum aktif, lengkapi profil terlebih dahulu');
			redirect('profil/edit/'.$id);
		}
	}

}

?>