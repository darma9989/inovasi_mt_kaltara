<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Req extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Req_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','req/tbl_req_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Req_model->json();
    }

    public function read($id) 
    {
        $row = $this->Req_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_req' => $row->id_req,
		'nama_req' => $row->nama_req,
	    );
            $this->template->load('template','req/tbl_req_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('req'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('req/create_action'),
	    'id_req' => set_value('id_req'),
	    'nama_req' => set_value('nama_req'),
	);
        $this->template->load('template','req/tbl_req_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_req' => $this->input->post('nama_req',TRUE),
	    );

            $this->Req_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('req'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Req_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('req/update_action'),
		'id_req' => set_value('id_req', $row->id_req),
		'nama_req' => set_value('nama_req', $row->nama_req),
	    );
            $this->template->load('template','req/tbl_req_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('req'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_req', TRUE));
        } else {
            $data = array(
		'nama_req' => $this->input->post('nama_req',TRUE),
	    );

            $this->Req_model->update($this->input->post('id_req', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('req'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Req_model->get_by_id($id);

        if ($row) {
            $this->Req_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('req'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('req'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_req', 'nama req', 'trim|required');

	$this->form_validation->set_rules('id_req', 'id_req', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_req.xls";
        $judul = "tbl_req";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Req");

	foreach ($this->Req_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_req);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_req.doc");

        $data = array(
            'tbl_req_data' => $this->Req_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('req/tbl_req_doc',$data);
    }

}

/* End of file Req.php */
/* Location: ./application/controllers/Req.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-01 11:23:22 */
/* http://harviacode.com */