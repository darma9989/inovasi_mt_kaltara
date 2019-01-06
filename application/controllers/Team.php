<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Team_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','team/tbl_team_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Team_model->json();
    }

    public function read($id) 
    {
        $row = $this->Team_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_team' => $row->id_team,
		'nama_team' => $row->nama_team,
	    );
            $this->template->load('template','team/tbl_team_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('team/create_action'),
	    'id_team' => set_value('id_team'),
	    'nama_team' => set_value('nama_team'),
	);
        $this->template->load('template','team/tbl_team_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_team' => $this->input->post('nama_team',TRUE),
	    );

            $this->Team_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('team'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Team_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('team/update_action'),
		'id_team' => set_value('id_team', $row->id_team),
		'nama_team' => set_value('nama_team', $row->nama_team),
	    );
            $this->template->load('template','team/tbl_team_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_team', TRUE));
        } else {
            $data = array(
		'nama_team' => $this->input->post('nama_team',TRUE),
	    );

            $this->Team_model->update($this->input->post('id_team', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('team'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Team_model->get_by_id($id);

        if ($row) {
            $this->Team_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('team'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_team', 'nama team', 'trim|required');

	$this->form_validation->set_rules('id_team', 'id_team', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_team.xls";
        $judul = "tbl_team";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Team");

	foreach ($this->Team_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_team);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_team.doc");

        $data = array(
            'tbl_team_data' => $this->Team_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('team/tbl_team_doc',$data);
    }

}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-01 11:34:50 */
/* http://harviacode.com */