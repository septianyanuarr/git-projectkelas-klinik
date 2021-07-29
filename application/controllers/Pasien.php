<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect ('auth');
        }
        $this->load->model('M_pasien');
    }


	public function index()
	{   
        $data['title'] = "Manajemen Data Pasien";

        $data['pasien'] = $this->M_pasien->tampil_data()->result_array();

        $this->load->view('v_header', $data);
		$this->load->view('pasien/v_data', $data);
        $this->load->view('v_footer');
    }
    
    function tambah(){
        $data['title'] = "Tambah Data Pasien";

        $this->load->view('v_header', $data);
		$this->load->view('pasien/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert(){
        $nama = $this->input->post('nama_pasien');
        $jk = $this->input->post('jenis_kelamin');
        $umur = $this->input->post('umur');

        $data = array(
            'nama_pasien' => $nama,
            'jenis_kelamin' => $jk,
            'umur' => $umur
        );
        $this->M_pasien->insert_data($data);
        redirect('pasien');
    }

    function edit($id){
        $data['title'] = "Edit Data Pasien";
        
        $where = array('id_pasien' => $id);
        $data['r'] = $this->M_pasien->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
		$this->load->view('pasien/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_pasien');
        $jk = $this->input->post('jenis_kelamin');
        $umur = $this->input->post('umur');

        $data = array(
            'nama_pasien' => $nama,
            'jenis_kelamin' => $jk,
            'umur' => $umur
        );

        $where = array('id_pasien' => $id);
        $this->M_pasien->update_data($data, $where);

        redirect('pasien');
    }

    function hapus($id){
        $where = array('id_pasien' => $id);
        $this->M_pasien->hapus_data($where);
        redirect('pasien');
    }

    public function print()
    {
        $data['pasien'] = $this->M_pasien->tampil_data('pasien')->result_array();
        $this->load->view('pasien/print', $data);
    }
    
    public function pdf()
{
    {
        $this->load->library('dompdf_gen');
        $data['pasien'] = $this->M_pasien->tampil_data('pasien')->result_array();

        $this->load->view('pasien/laporan_pdf', $data);
        $paper_size = 'A4'; //ukuran kertas
        $orientation = 'landscape'; // tipe format kertas
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF
        $this->dompdf->load_html($html);
        //$this->dompdf->render();
        
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("pasien.pdf", array('Attachment' => 0)); // nama file pdf yang dihasilkan
        }
    }
    public function excel()
    {
    $data = array( 'title' => 'Laporan Data Pasien',
    'laporan' => $this->db->query("select * from pasien")->result_array());
    $this->load->view('pasien/export_excel', $data);
    }
}
