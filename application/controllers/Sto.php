<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Sto_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','sto/tbl_sto_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sto_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sto_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sto' => $row->id_sto,
		'nama_sto' => $row->nama_sto,
	    );
            $this->template->load('template','sto/tbl_sto_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sto'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sto/create_action'),
	        'id_sto' => set_value('id_sto'),
	        'nama_sto' => set_value('nama_sto'),
	);
        $this->template->load('template','sto/tbl_sto_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_sto' => $this->input->post('nama_sto',TRUE),
	    );

            $this->Sto_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('sto'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sto/update_action'),
                'id_sto' => set_value('id_sto', $row->id_sto),
                'nama_sto' => set_value('nama_sto', $row->nama_sto),
	    );
            $this->template->load('template','sto/tbl_sto_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sto'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sto', TRUE));
        } else {
            $data = array(
		    'nama_sto' => $this->input->post('nama_sto',TRUE),
	    );

            $this->Sto_model->update($this->input->post('id_sto', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sto'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sto_model->get_by_id($id);

        if ($row) {
            $this->Sto_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sto'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sto'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('nama_sto', 'nama sto', 'trim|required');
        $this->form_validation->set_rules('id_sto', 'id_sto', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_sto.xls";
        $judul = "tbl_sto";
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
	    xlsWriteLabel($tablehead, $kolomhead++, "Nama Sto");

	foreach ($this->Sto_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	        xlsWriteLabel($tablebody, $kolombody++, $data->nama_sto);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_sto.doc");

        $data = array(
            'tbl_sto_data' => $this->Sto_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sto/tbl_sto_doc',$data);
    }

}

/* End of file Sto.php */
/* Location: ./application/controllers/Sto.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-01 11:19:13 */
/* http://harviacode.com */