<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kendala extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Kendala_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kendala/tbl_kendala_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kendala_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kendala_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kendala' => $row->id_kendala,
		'nama_kendala' => $row->nama_kendala,
	    );
            $this->template->load('template','kendala/tbl_kendala_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendala'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kendala/create_action'),
	    'id_kendala' => set_value('id_kendala'),
	    'nama_kendala' => set_value('nama_kendala'),
	);
        $this->template->load('template','kendala/tbl_kendala_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kendala' => $this->input->post('nama_kendala',TRUE),
	    );

            $this->Kendala_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kendala'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kendala_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kendala/update_action'),
		'id_kendala' => set_value('id_kendala', $row->id_kendala),
		'nama_kendala' => set_value('nama_kendala', $row->nama_kendala),
	    );
            $this->template->load('template','kendala/tbl_kendala_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendala'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kendala', TRUE));
        } else {
            $data = array(
		'nama_kendala' => $this->input->post('nama_kendala',TRUE),
	    );

            $this->Kendala_model->update($this->input->post('id_kendala', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kendala'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kendala_model->get_by_id($id);

        if ($row) {
            $this->Kendala_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kendala'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendala'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kendala', 'nama kendala', 'trim|required');

	$this->form_validation->set_rules('id_kendala', 'id_kendala', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kendala.xls";
        $judul = "tbl_kendala";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kendala");

	foreach ($this->Kendala_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kendala);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kendala.doc");

        $data = array(
            'tbl_kendala_data' => $this->Kendala_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kendala/tbl_kendala_doc',$data);
    }

}

/* End of file Kendala.php */
/* Location: ./application/controllers/Kendala.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-01 11:14:52 */
/* http://harviacode.com */