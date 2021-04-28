<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Anggota extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('anggota_m');
        $this->load->model('user_m');
    }
 
    function index(){
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);

        $data['menu'] = "Data anggota";
        $data['nama_kom'] = $this->fungsi->get_deskripsi("tb_komisariat",$this->session->komisariat_id);
        $data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-anggota";
        $this->templateadmin->load('template/dashboard','anggota/anggota_data',$data);
    }

    public function detail()
    {
        $previllage = 1;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment('3');
        $query = $this->anggota_m->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Profil anggota";          
            $this->templateadmin->load('template/dashboard','anggota/anggota_detail',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }
 
    // DATATABLES
    function get_data_anggota()
    {
        $list = $this->anggota_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = '
                <a href="'.base_url('anggota/edit/'.$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Edit</a>
                <a href="'.base_url('anggota/hapus/'.$field->id).'" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>

                ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->anggota_m->count_all(),
            "recordsFiltered" => $this->anggota_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // DATATABLES
    

    // FORM EKSEKUSI
    public function tambah()
    {   
        //Mencegah user yang bukan haknya
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);

        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|is_unique[tb_user.nama]|is_unique[tb_user.nama]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_user.email]|is_unique[tb_user.email]');
        $this->form_validation->set_rules('kontak', 'kontak', 'min_length[3]|is_unique[tb_user.kontak]|is_unique[tb_user.kontak]|max_length[15]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Tambah Data anggota";
            $data['footer_script'] = "anggota-tambah";
            $this->templateadmin->load('template/dashboard','anggota/tambah',$data);
        } else {
            $post = $this->input->post(null, TRUE);
            //CEK GAMBAR
            $config['upload_path']          = 'assets/dist/img/foto-user/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']            = strtoupper($post['username']).'--'.$post['hp'];

            $this->load->library('upload', $config);
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');                   
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger',$pesan);
                    redirect('anggota/tambah');
                }           
            }

            $this->anggota_m->simpan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Data anggota Berhasil Ditambahkan');
            }   
            redirect('anggota/tambah');             
        }
    }

    public function edit($id)
    {           
        //Mencegah user yang bukan haknya
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);
        check_right_user($this->session->komisariat_id, $this->fungsi->pilihan("tb_user",$id)->row("komisariat_id"),$this->session->tipe_user,$previllage);

        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]');
        $this->form_validation->set_rules('kontak', 'kontak', 'min_length[3]|is_unique[tb_user.kontak]|is_unique[tb_user.kontak]|max_length[15]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->anggota_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['menu'] = "Edit Data anggota";          
                $this->templateadmin->load('template/dashboard','anggota/edit',$data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='".site_url('anggota')."';</script>";
            }

        } else {
            $post = $this->input->post(null, TRUE);
            //CEK GAMBAR
            $config['upload_path']          = 'assets/dist/img/foto-user/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['file_name']            = strtoupper($post['username']).'--'.$post['hp'];

            $this->load->library('upload', $config);
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $itemfoto = $this->user_m->get($post['id'])->row();
                    if ($itemfoto->foto != null) {
                        $target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
                        unlink($target_file);
                    }

                    $post['foto'] = $this->upload->data('file_name');
                } else {
                            $pesan = $this->upload->display_errors();
                            $this->session->set_flashdata('danger',$pesan);
                            redirect('anggota/edit/'.$id);
                }           
            }
            $this->anggota_m->update($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success','Berhasil Di Edit');
                }           
                redirect('anggota');
        }
    }

    function hapus(){
        //Mencegah user yang bukan haknya
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);
        check_right_user($this->session->komisariat_id, $this->fungsi->pilihan("tb_user",$id)->row("komisariat_id"),$this->session->tipe_user,$previllage);


        $id = $this->uri->segment(3);        
        $this->anggota_m->hapus($id);
        $this->session->set_flashdata('danger','Berhasil Di Hapus');
        redirect('anggota');
    }

    function hapusfoto(){

    //Mencegah user yang bukan haknya
    $previllage = 2;
    check_super_user($this->session->tipe_user,$previllage);
    check_right_user($this->session->komisariat_id, $this->fungsi->pilihan("tb_user",$id)->row("komisariat_id"),$this->session->tipe_user,$previllage);

    $id = $this->uri->segment(3);

    //Action          
    $this->load->model('user_m');
    $itemfoto = $this->user_m->get($id)->row();
    if ($itemfoto->foto != null) {
        $target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
        unlink($target_file);
    }
    $params['foto'] = null;
    $this->db->where('id',$id);
    $this->db->update('tb_user',$params);
    redirect('anggota/edit/'.$id);   
    }



    
 
}