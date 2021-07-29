<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect ('auth');
        }

        $this->load->model('m_obat');
    }


	public function index()
	{   
        $data['title'] = "Manajemen Data Obat";

        $data['obat'] = $this->m_obat->tampil_data()->result_array();

        $this->load->view('v_header', $data);
		$this->load->view('obat/v_data', $data);
        $this->load->view('v_footer');
    }
    
    function tambah(){
        $data['title'] = "Tambah Data obat";

        $this->load->view('v_header', $data);
		$this->load->view('obat/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert(){
        $nama = $this->input->post('nama_obat');

        $data = array(
            'nama_obat' => $nama
        );

        $this->m_obat->insert_data($data);
        
        redirect('obat');
    }

    function edit($id){
        $data['title'] = "Edit Data Obat";
        
        $where = array('id_obat' => $id);
        $data['r'] = $this->m_obat->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
		$this->load->view('obat/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_obat');

        $data = array(
            'nama_obat' => $nama
        );
        $where = array('id_obat' => $id);
        $this->m_obat->update_data($data, $where);

        redirect('obat');
    }

    function hapus($id){
        $where = array('id_obat' => $id);
        $this->m_obat->hapus_data($where);
        redirect('obat');
    }

    public function print()
    {
        $data['obat'] = $this->m_obat->tampil_data('obat')->result_array();
        $this->load->view('obat/print', $data);
    }
    
    public function pdf()
{
    {
        $this->load->library('dompdf_gen');
        $data['obat'] = $this->m_obat->tampil_data('obat')->result_array();

        $this->load->view('obat/laporan_pdf', $data);
        $paper_size = 'A4'; //ukuran kertas
        $orientation = 'landscape'; // tipe format kertas
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF
        $this->dompdf->load_html($html);
        //$this->dompdf->render();
        
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("obat.pdf", array('Attachment' => 0)); // nama file pdf yang dihasilkan
        }
    }
    public function excel()
    {
    $data = array( 'title' => 'Laporan Data Obat',
    'laporan' => $this->db->query("select * from obat")->result_array());
    $this->load->view('obat/export_excel', $data);
    }
}
