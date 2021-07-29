<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect ('auth');
        }
        $this->load->model('m_users');
    }


	public function index()
	{   
        $data['title'] = "Manajemen Data Users";

        $data['users'] = $this->m_users->tampil_data()->result_array();

        $this->load->view('v_header', $data);
		$this->load->view('users/v_data', $data);
        $this->load->view('v_footer');
    }
    
    function tambah(){
        $data['title'] = "Tambah Data Users";

        $this->load->view('v_header', $data);
		$this->load->view('users/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert(){
        $u = $this->input->post('username');
        $n = $this->input->post('nama_lengkap');
        $p = md5($this->input->post('password'));

        $data = array(
            'username' => $u,
            'nama_lengkap' => $n,
            'password' => $p
        );
        $this->m_users->insert_data($data);
        redirect('users');
    }

    function edit($id){
        $data['title'] = "Edit Data Users";
        
        $where = array('id' => $id);
        $data['r'] = $this->m_users->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
		$this->load->view('users/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $u = $this->input->post('username');
        $n = $this->input->post('nama_lengkap');
        $p = md5($this->input->post('password'));

        $data = array(
            'username' => $u,
            'nama_lengkap' => $n,
            'password' => $p
        );
        $where = array('id' => $id);
        $this->m_users->update_data($data, $where);

        redirect('users');
    }

    function hapus($id){
        $where = array('id' => $id);
        $this->m_users->hapus_data($where);
        redirect('users');
    }

    public function exportToPdf()
{
        $id_user = $this->session->userdata('id_user' );
        $data[ 'users' ] = $this->session->userdata('username' );
        $data[ 'judul' ] = "Cetak Data User";
        $data[ 'users' ] = $this->m_users->tampil_data([ 'id' => $this->session->userdata('id_user' )])->result();
        $data1 = $this->db->query("select*from users")->num_rows();
if($data<1){

	$this->session->set_flashdata('pesan', '<div class="alert alert-message alert-danger" role="alert">Tidak Ada Data User, Silahkan Buat Data User Terlebih Dahulu</div>');

redirect(base_url());
	}else{

    $data[ 'items' ] = $this->db->query("select*from users") ->result_array();
    $this->load->library('dompdf_gen');

    $this->load->view('users/user-pdf' , $data);
    $paper_size = 'A4' ; // ukuran kertas
    $orientation = 'landscape' ; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("data-users-$id_user.pdf", array(' Attachment' => 0));
    }
    // nama file pdf yang di hasilkan
}


}