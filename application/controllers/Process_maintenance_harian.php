<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Process_maintenance_harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Process_maintenance_harian_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','process_maintenance_harian/process_maintenance_harian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Process_maintenance_harian_model->json();
    }

    public function read($id) 
    {
        $row = $this->Process_maintenance_harian_model->get_by_ids($id);
        if ($row) {
            $data = array(
                'id_process_maintenance_harian' => $row->id_process_maintenance_harian,
                //'id_maintenance_harian' => $row->id_maintenance_harian,
                'label_odp' => $row->label_odp,
                'foto_redaman_sesudah' => $row->foto_redaman_sesudah,
                //'id_team' => $row->id_team,
                'nama_team' => $row->nama_team,
                'rfo' => $row->rfo,
                'material' => $row->material,
                //'datetime_selesai' => $row->datetime_selesai,
                //'id_status' => $row->id_status,
                'nama_status' => $row->nama_status,
                'nama_kategori_rfo' => $row->nama_kategori_rfo,
                'nama_kategori_rfo_detail' => $row->nama_kategori_rfo_detail,
	    );
            $this->template->load('template','process_maintenance_harian/process_maintenance_harian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('process_maintenance_harian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('process_maintenance_harian/create_action'),
                'id_process_maintenance_harian' => set_value('id_process_maintenance_harian'),
                'id_maintenance_harian' => set_value('id_maintenance_harian'),
                'foto_redaman_sesudah' => set_value('foto_redaman_sesudah'),
                'id_team' => set_value('id_team'),
                'rfo' => set_value('rfo'),
                'material' => set_value('material'),
                'datetime_selesai' => set_value('datetime_selesai'),
                'id_status' => set_value('id_status'),
                //'date_selesai' => set_value('date_selesai'),
                'id_kategori_rfo' => set_value('id_kategori_rfo'),
                'id_tbl_kategori_rfo_detail' => set_value('id_tbl_kategori_rfo_detail'),
        );
        //$this->template->load('template','process_maintenance_harian/process_maintenance_harian_form', $data);
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_maintenance_harian' => $this->input->post('id_maintenance_harian',TRUE),
                'foto_redaman_sesudah' => $foto['file_name'],
                'id_team' => $this->input->post('id_team',TRUE),
                'rfo' => $this->input->post('rfo',TRUE),
                'material' => $this->input->post('material',TRUE),
                'datetime_selesai' => $this->input->post('datetime_selesai',TRUE),
                'date_selesai' => $this->input->post('datetime_selesai',TRUE),
                'id_kategori_rfo' => $this->input->post('id_kategori_rfo',TRUE),
                'id_tbl_kategori_rfo_detail' => $this->input->post('id_tbl_kategori_rfo_detail',TRUE),
                'id_status' => $this->input->post('id_status',TRUE));

            $this->Process_maintenance_harian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('process_maintenance_harian'));
        }
    }
        
    public function update($id) 
    {
        $row = $this->Process_maintenance_harian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('process_maintenance_harian/update_action'),
                    'id_process_maintenance_harian' => set_value('id_process_maintenance_harian', $row->id_process_maintenance_harian),
                    'id_maintenance_harian' => set_value('id_maintenance_harian', $row->id_maintenance_harian),
                    'foto_redaman_sesudah' => set_value('foto_redaman_sesudah', $row->foto_redaman_sesudah),
                    'id_team' => set_value('id_team', $row->id_team),
                    'rfo' => set_value('rfo', $row->rfo),
                    'material' => set_value('material', $row->material),
                    'datetime_selesai' => set_value('datetime_selesai', $row->datetime_selesai),
                    'date_selesai' => set_value('datetime_selesai', $row->date_selesai),
                    'id_kategori_rfo' => set_value('id_kategori_rfo', $row->id_kategori_rfo),
                    'id_tbl_kategori_rfo_detail' => set_value('id_tbl_kategori_rfo_detail', $row->id_tbl_kategori_rfo_detail),
                    'id_status' => set_value('id_status', $row->id_status));
            $this->template->load('template','process_maintenance_harian/process_maintenance_harian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('process_maintenance_harian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_process_maintenance_harian', TRUE));
        } else {
            if($foto['file_name']==""){
                $data = array(
                    'id_maintenance_harian' => $this->input->post('id_maintenance_harian',TRUE),
                    'id_team' => $this->input->post('id_team',TRUE),
                    'rfo' => $this->input->post('rfo',TRUE),
                    'material' => $this->input->post('material',TRUE),
                    'datetime_selesai' => $this->input->post('datetime_selesai',TRUE),
                    'date_selesai' => $this->input->post('datetime_selesai',TRUE),
                    'id_kategori_rfo' => $this->input->post('id_kategori_rfo',TRUE),
                    'id_tbl_kategori_rfo_detail' => $this->input->post('id_tbl_kategori_rfo_detail',TRUE),
                    'id_status' => $this->input->post('id_status',TRUE));
            }else {
                $data = array(
                    'id_maintenance_harian' => $this->input->post('id_maintenance_harian',TRUE),
                    'foto_redaman_sesudah' => $foto['file_name'],
                    'id_team' => $this->input->post('id_team',TRUE),
                    'rfo' => $this->input->post('rfo',TRUE),
                    'material' => $this->input->post('material',TRUE),
                    'datetime_selesai' => $this->input->post('datetime_selesai',TRUE),
                    'date_selesai' => $this->input->post('datetime_selesai',TRUE),
                    'id_kategori_rfo' => $this->input->post('id_kategori_rfo',TRUE),
                    'id_tbl_kategori_rfo_detail' => $this->input->post('id_tbl_kategori_rfo_detail',TRUE),
                    'id_status' => $this->input->post('id_status',TRUE));
                }
            $this->Process_maintenance_harian_model->update($this->input->post('id_process_maintenance_harian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('process_maintenance_harian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Process_maintenance_harian_model->get_by_id($id);

        if ($row) {
            $this->Process_maintenance_harian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('process_maintenance_harian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('process_maintenance_harian'));
        }
    }

    function upload_foto(){
        $config['upload_path']          = './assets/evident';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //config['max_height']            = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_redaman_sesudah');
        return $this->upload->data();
    }
    


    public function _rules() 
    {
	$this->form_validation->set_rules('id_maintenance_harian', 'id maintenance harian', 'trim|required');
	//$this->form_validation->set_rules('foto_redaman_sesudah', 'foto redaman sesudah', 'trim|required');
	$this->form_validation->set_rules('id_team', 'id team', 'trim|required');
	$this->form_validation->set_rules('rfo', 'rfo', 'trim|required');
	$this->form_validation->set_rules('material', 'material', 'trim|required');
	$this->form_validation->set_rules('datetime_selesai', 'waktu selesai', 'trim|required');
	$this->form_validation->set_rules('id_status', 'id status', 'trim|required');

	$this->form_validation->set_rules('id_process_maintenance_harian', 'id_process_maintenance_harian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "process_maintenance_harian.xls";
        $judul = "process_maintenance_harian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Maintenance Harian");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Redaman Sesudah");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Team");
	xlsWriteLabel($tablehead, $kolomhead++, "Rfo");
	xlsWriteLabel($tablehead, $kolomhead++, "Material");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Selesai");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Status");

	foreach ($this->Process_maintenance_harian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_maintenance_harian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_redaman_sesudah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_team);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rfo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->material);
	    xlsWriteLabel($tablebody, $kolombody++, $data->datetime_selesai);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=process_maintenance_harian.doc");

        $data = array(
            'process_maintenance_harian_data' => $this->Process_maintenance_harian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('process_maintenance_harian/process_maintenance_harian_doc',$data);
    }

}

/* End of file Process_maintenance_harian.php */
/* Location: ./application/controllers/Process_maintenance_harian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-03 23:38:08 */
/* http://harviacode.com */