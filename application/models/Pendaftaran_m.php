<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_user_tmp');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	function simpan($post)
	{
	  $params['id'] =  "";
	  $params['username'] =  $post['username'];
	  $params['password'] =  sha1($post['password']);
	  $params['nama'] =  $post['nama'];
	  $params['id_kelompok'] =  $post['id_kelompok'];
	  $params['tempat_lahir'] =  ucwords(strtolower($post['tempat_lahir']));
	  $params['tgl_lahir'] =  $post['tgl_lahir'];
	  $params['kelamin'] =  $post['kelamin'];
	  $params['hp'] =  $post['hp'];
	  $params['email'] =  $post['email'];
	  $params['agama'] =  $post['agama'];
	  $params['provinsi'] =  $post['provinsi'];
	  $params['kota'] =  $post['kota'];
	  $params['kecamatan'] =  $post['kecamatan'];
	  $params['kelurahan'] =  $post['kelurahan'];
	  $params['domisili'] =  ucwords(strtolower($post['domisili']));	  
	  $params['pernikahan'] =  $post['pernikahan'];
	  $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
	  $params['pekerjaan_utama'] =  $post['pekerjaan_utama'];
	  $params['keanggotaan'] =  $post['keanggotaan'];
	  $params['tahun_bergabung'] =  $post['tahun_bergabung'];
	  $params['alasan'] =  $post['alasan'];
	  $params['created'] =  date("Y:m:d:h:i:sa");
	  $params['tipe_user'] =  $post['tipe_user'];
	  $this->db->insert('tb_user_tmp',$params);
	}

	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_user_tmp');

	}

	function acc($id)
	{			
		$pendaftar = $this->fungsi->pilihan_selected("tb_user_tmp",$id);
		//Dapatkan ID Anggota -> Rumusnya
		$id_kelompok = $this->fungsi->pilihan_advanced("tb_kelompok","id_kelompok",$pendaftar->row('id_kelompok'))->row("id_kelompok");
		$no_urut = $this->fungsi->pilihan_advanced("tb_user","id_kelompok",$pendaftar->row('id_kelompok'))->num_rows() + 1;
		$params['id_anggota'] = $id_kelompok.".".date('ymd').".".str_pad($no_urut, 5, "0", STR_PAD_LEFT);

		foreach ($pendaftar->result() as $datapendaftar)
		{
			$params['username'] =  $datapendaftar->username;
			$params['password'] =  $datapendaftar->password;
			$params['nama'] =  $datapendaftar->nama;
			$params['id_kelompok'] =  $this->fungsi->pilihan_advanced("tb_kelompok","id_kelompok",$datapendaftar->id_kelompok)->row("id");
			$params['tempat_lahir'] =  $datapendaftar->tempat_lahir;
			$params['tgl_lahir'] =  $datapendaftar->tgl_lahir;
			$params['kelamin'] =  $datapendaftar->kelamin;
			$params['hp'] =  $datapendaftar->hp;
			$params['email'] =  $datapendaftar->email;
			$params['agama'] =  $datapendaftar->agama;
			$params['provinsi'] =  $datapendaftar->provinsi;
			$params['kota'] =  $datapendaftar->kota;
			$params['kecamatan'] =  $datapendaftar->kecamatan;
			$params['kelurahan'] =  $datapendaftar->kelurahan;
			$params['domisili'] =  $datapendaftar->domisili;	  
			$params['pernikahan'] =  $datapendaftar->pernikahan;
			$params['pendidikan_terakhir'] =  $datapendaftar->pendidikan_terakhir;
			$params['pekerjaan_utama'] =  $datapendaftar->pekerjaan_utama;
			$params['keanggotaan'] =  $datapendaftar->keanggotaan;
			$params['tahun_bergabung'] =  $datapendaftar->tahun_bergabung;
			$params['alasan'] =  $datapendaftar->alasan;
			$params['created'] =  date("Y:m:d:h:i:sa");
			$params['tipe_user'] =  $datapendaftar->tipe_user;
		}

		//Tambahan
		$params['iuran'] = null;
		$params['status'] = "1";
		$params['foto'] = null;				

		$this->db->insert('tb_user',$params);		
		$this->db->where('id', $id);
	  $this->db->delete('tb_user_tmp');
	}


}
