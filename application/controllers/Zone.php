<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zone extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Zone_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','zone/tbl_zone_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Zone_model->json();
    }

    public function read($id) 
    {
        $row = $this->Zone_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_zone' => $row->id_zone,
		'nama_zone' => $row->nama_zone,
	    );
            $this->template->load('template','zone/tbl_zone_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('zone'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('zone/create_action'),
	    'id_zone' => set_value('id_zone'),
	    'nama_zone' => set_value('nama_zone'),
	);
        $this->template->load('template','zone/tbl_zone_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_zone' => $this->input->post('nama_zone',TRUE),
	    );

            $this->Zone_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('zone'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Zone_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('zone/update_action'),
		'id_zone' => set_value('id_zone', $row->id_zone),
		'nama_zone' => set_value('nama_zone', $row->nama_zone),
	    );
            $this->template->load('template','zone/tbl_zone_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('zone'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_zone', TRUE));
        } else {
            $data = array(
		'nama_zone' => $this->input->post('nama_zone',TRUE),
	    );

            $this->Zone_model->update($this->input->post('id_zone', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('zone'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Zone_model->get_by_id($id);

        if ($row) {
            $this->Zone_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('zone'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('zone'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_zone', 'nama zone', 'trim|required');

	$this->form_validation->set_rules('id_zone', 'id_zone', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Zone.php */
/* Location: ./application/controllers/Zone.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-01 13:00:11 */
/* http://harviacode.com */