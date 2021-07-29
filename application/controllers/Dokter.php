<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect ('auth');
        }
        $this->load->model('M_dokter');
    }


	public function index()
	{   
        $data['title'] = "Manajemen Data Dokter";

        $data['dokter'] = $this->M_dokter->tampil_data()->result_array();

        $this->load->view('v_header', $data);
		$this->load->view('dokter/v_data', $data);
        $this->load->view('v_footer');
    }
    
    function tambah(){
        $data['title'] = "Tambah Data Dokter";

        $this->load->view('v_header', $data);
		$this->load->view('dokter/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert(){
        $nama = $this->input->post('nama_dokter');

        $data = array(
            'nama_dokter' => $nama
        );
        $this->M_dokter->insert_data($data);

        redirect('dokter');
    }

    function edit($id){
        $data['title'] = "Edit Data Dokter";
        
        $where = array('id_dokter' => $id);
        $data['r'] = $this->M_dokter->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
		$this->load->view('dokter/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_dokter');

        $data = array(
            'nama_dokter' => $nama
        );
        $where = array('id_dokter' => $id);
        $this->M_dokter->update_data($data, $where);

        redirect('dokter');
    }

    function hapus($id){
        $where = array('id_dokter' => $id);
        $this->M_dokter->hapus_data($where);
        redirect('dokter');
    }

    public function print()
    {
        $data['dokter'] = $this->M_dokter->tampil_data('dokter')->result_array();
        $this->load->view('dokter/print', $data);
    }

    public function pdf()
    {
        {
            $this->load->library('dompdf_gen');
            $data['dokter'] = $this->M_dokter->tampil_data('dokter')->result_array();
    
            $this->load->view('dokter/laporan_pdf', $data);
            $paper_size = 'A4'; //ukuran kertas
            $orientation = 'landscape'; // tipe format kertas
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF
            $this->dompdf->load_html($html);
            //$this->dompdf->render();
            
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("dokter.pdf", array('Attachment' => 0)); // nama file pdf yang dihasilkan
            }
        }
        public function excel()
    {
    $data = array( 'title' => 'Laporan Data Dokter',
    'laporan' => $this->db->query("select * from dokter")->result_array());
    $this->load->view('dokter/export_excel', $data);
    }
}
