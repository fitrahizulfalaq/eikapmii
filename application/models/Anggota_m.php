<?php
 
class Anggota_m extends CI_Model {
	public function get($id = null)
  {
    $this->db->from('tb_user');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getAnggotaanggota ($id_anggota)
  {
    $this->db->from("tb_user");
    $this->db->where("id_anggota",$id_anggota);
    $query = $this->db->get();
    return $query;
  }

  // DATATABLES
  var $table = 'tb_user'; //nama tabel dari database
  var $column_order = array(null, 'nama'); //field yang ada di table user
  var $column_search = array('nama'); //field yang diizin untuk pencarian 
  var $order = array('nama' => 'asc'); // default order 

  private function _get_datatables_query()
  {
    $this->db->from($this->table);
    if ($this->session->tipe_user == "2") {
      $this->db->where("komisariat_id", $this->session->komisariat_id);
    } elseif ($this->session->tipe_user == "3") {
      $this->db->where("tipe_user <", 4);
    }

    $i = 0;
    foreach ($this->column_search as $item) // looping awal
    {
        if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
        {
            if($i===0) // looping awal
            {
                $this->db->group_start(); 
                $this->db->like($item, $_POST['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_POST['search']['value']);
            }
            if(count($this->column_search) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    }
     
    if(isset($_POST['order'])) 
    {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);    
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    if ($this->session->tipe_user == "2") {
      $this->db->where("komisariat_id", $this->session->komisariat_id);
    } elseif ($this->session->tipe_user == "3") {
      $this->db->where("tipe_user <", 4);
    }

    return $this->db->count_all_results();
  }
	// DATATABLES
	
	function simpan($post)
	{
	  //Id    
    $params['id'] =  "";
    $params['komisariat_id'] =  $post['komisariat_id'];
    $params['rayon_id'] =  $post['rayon_id'];
    $params['username'] =  $post['username'];
    $params['password'] =  sha1($post['password']);     
    $params['nama'] =  $post['nama'];
    $params['tempat_lahir'] =  $post['tempat_lahir'];
    $tanggal =  $post['tanggal'];
    $bulan =  $post['bulan'];
    $tahun =  $post['tahun'];
    $params['tgl_lahir'] =  date("Y:m:d", strtotime($tahun."-".$bulan."-".$tanggal));
    $params['hp'] =  $post['hp'];
    $params['email'] =  $post['email'];
    $params['kelamin'] =  $post['kelamin'];
    $params['provinsi'] =  $post['provinsi'];
    $params['kota'] =  $post['kota'];
    $params['kecamatan'] =  $post['kecamatan'];
    $params['kelurahan'] =  $post['kelurahan'];
    $params['domisili'] =  $post['domisili'];
    $params['pernikahan'] =  $post['pernikahan'];
    $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
    $params['pekerjaan_utama'] =  $post['pekerjaan_utama'];
    $params['angkatan'] =  $post['angkatan'];
    $params['tahun_bergabung'] =  $post['tahun_bergabung'];
    $params['status'] =  "1";
    if ($post['foto'] != null) {
      $params['foto'] =  $post['foto'];
    } else {
      $params['foto'] =  null;
    }
    $params['tipe_user'] =  "1";
    $params['created'] =  date("Y:m:d:h:m:sa");

	  $this->db->insert('tb_user',$params);
	}

  function update($post)
  {
    //Id    
    $params['id'] =  $post['id'];
    // Kebutuhan User
    $params['username'] =  $post['username'];
    if ($post['password'] != null) {
      $params['password'] =  sha1($post['password']);     
    }
    $params['nama'] =  $post['nama'];
    $params['tempat_lahir'] =  $post['tempat_lahir'];
    $tanggal =  $post['tanggal'];
    $bulan =  $post['bulan'];
    $tahun =  $post['tahun'];
    $params['tgl_lahir'] =  date("Y:m:d", strtotime($tahun."-".$bulan."-".$tanggal));
    $params['hp'] =  $post['hp'];
    $params['kelamin'] =  $post['kelamin'];
    $params['provinsi'] =  $post['provinsi'];
    $params['kota'] =  $post['kota'];
    $params['kecamatan'] =  $post['kecamatan'];
    $params['kelurahan'] =  $post['kelurahan'];
    $params['domisili'] =  $post['domisili'];
    $params['pernikahan'] =  $post['pernikahan'];
    $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
    $params['pekerjaan_utama'] =  $post['pekerjaan_utama'];
    $params['angkatan'] =  $post['angkatan'];
    $params['tahun_bergabung'] =  $post['tahun_bergabung'];
    $params['status'] =  "1";
    if ($post['foto'] != null) {
      $params['foto'] =  $post['foto'];
    } else {
      $params['foto'] =  "";
    }
    

    $this->db->where('id',$params['id']);
    $this->db->update('tb_user',$params);
  }

  function hapus($id){

    $this->db->where('id', $id);
    $this->db->delete('tb_user');

  }

	
 
}