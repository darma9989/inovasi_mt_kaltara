<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenance_harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Maintenance_harian_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','maintenance_harian/maintenance_harian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Maintenance_harian_model->json();
    }

    public function read($id) 
    {
        $row = $this->Maintenance_harian_model->get_by_ids($id);
        if ($row) {
            $data = array(
                'id_maintenance_harian' => $row->id_maintenance_harian,
                'nama_sto' => $row->nama_sto,
                'label_odp' => $row->label_odp,
                'foto_odp' => $row->foto_odp,
                'foto_redaman_sebelum' => $row->foto_redaman_sebelum,
                'taging_odp' => $row->taging_odp,
                'nama_kendala' => $row->nama_kendala,
                'in_sc_nama' => $row->in_sc_nama,
                'nama_req' => $row->nama_req,
                'nama_zone' => $row->nama_zone,
                'datetime_lapor' => $row->datetime_lapor,
                'date_lapor' => $row->date_lapor,
	    );
            $this->template->load('template','maintenance_harian/maintenance_harian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenance_harian'));
        }
    }

    public function proses_gangguan($id) 
    {
        $row = $this->Maintenance_harian_model->get_by_ids($id);
        if ($row) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('process_maintenance_harian/create_action'),
                    'id_maintenance_harian' => $row->id_maintenance_harian,
                    'nama_sto' => $row->nama_sto,
                    'label_odp' => $row->label_odp,
                    'foto_odp' => $row->foto_odp,
                    'foto_redaman_sebelum' => $row->foto_redaman_sebelum,
                    'taging_odp' => $row->taging_odp,
                    'nama_kendala' => $row->nama_kendala,
                    'in_sc_nama' => $row->in_sc_nama,
                    'nama_req' => $row->nama_req,
                    'nama_zone' => $row->nama_zone,
                    'datetime_lapor' => $row->datetime_lapor,
                    'date_lapor' => $row->date_lapor,
                    'id_process_maintenance_harian' => set_value('id_process_maintenance_harian'),
                    //'id_maintenance_harian' => set_value('id_maintenance_harian'),
                    'foto_redaman_sesudah' => set_value('foto_redaman_sesudah'),
                    'id_team' => set_value('id_team'),
                    'rfo' => set_value('rfo'),
                    'material' => set_value('material'),
                    'datetime_selesai' => set_value('datetime_selesai'),
                    'id_status' => set_value('id_status'),
                    'date_selesai' => set_value('date_selesai'),
                    'id_kategori_rfo' => set_value('id_kategori_rfo'),
                    'id_tbl_kategori_rfo_detail' => set_value('id_tbl_kategori_rfo_detail'),
        );
            $this->template->load('template','process_maintenance_harian/process_maintenance_harian_process', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenance_harian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('maintenance_harian/create_action'),
                'id_maintenance_harian' => set_value('id_maintenance_harian'),
                'id_sto' => set_value('id_sto'),
                'label_odp' => set_value('label_odp'),
                'foto_odp' => set_value('foto_odp'),
                'foto_redaman_sebelum' => set_value('foto_redaman_sebelum'),
                'taging_odp' => set_value('taging_odp'),
                'id_kendala' => set_value('id_kendala'),
                'in_sc_nama' => set_value('in_sc_nama'),
                'id_req' => set_value('id_req'),
                'id_zone' => set_value('id_zone'),
                'datetime_lapor' => set_value('datetime_lapor'),
                //'date_lapor' => set_value('date_lapor'),
	);
        $this->template->load('template','maintenance_harian/maintenance_harian_form', $data);
    }
    
    public function create_action() 
    {
        $config['upload_path']          = './assets/evident';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_odp');
        $result1 = $this->upload->data();
        $this->upload->do_upload('foto_redaman_sebelum');
        $result2 = $this->upload->data();
        $result = array('foto_odp'=>$result1,'foto_redaman_sebelum'=>$result2);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'label_odp' => $this->input->post('label_odp',TRUE),
                'id_sto' => $this->input->post('id_sto',TRUE),
                'foto_odp' => $result['foto_odp']['file_name'],
				'foto_redaman_sebelum' => $result['foto_redaman_sebelum']['file_name'],
                'taging_odp' => $this->input->post('taging_odp',TRUE),
                'id_kendala' => $this->input->post('id_kendala',TRUE),
                'in_sc_nama' => $this->input->post('in_sc_nama',TRUE),
                'id_req' => $this->input->post('id_req',TRUE),
                'id_zone' => $this->input->post('id_zone',TRUE),
                'datetime_lapor' => $this->input->post('datetime_lapor',TRUE),
                'date_lapor' => $this->input->post('datetime_lapor',TRUE),
	    );

            $this->Maintenance_harian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('maintenance_harian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Maintenance_harian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('maintenance_harian/update_action'),
                    'id_maintenance_harian' => set_value('id_maintenance_harian', $row->id_maintenance_harian),
                    'id_sto' => set_value('id_sto', $row->id_sto),
                    'label_odp' => set_value('label_odp', $row->label_odp),
                    'foto_odp' => set_value('foto_odp', $row->foto_odp),
                    'foto_redaman_sebelum' => set_value('foto_redaman_sebelum', $row->foto_redaman_sebelum),
                    'taging_odp' => set_value('taging_odp', $row->taging_odp),
                    'id_kendala' => set_value('id_kendala', $row->id_kendala),
                    'in_sc_nama' => set_value('in_sc_nama', $row->in_sc_nama),
                    'id_req' => set_value('id_req', $row->id_req),
                    'id_zone' => set_value('id_zone', $row->id_zone),
                    'datetime_lapor' => set_value('datetime_lapor', $row->datetime_lapor),
                    'date_lapor' => set_value('datetime_lapor', $row->date_lapor),
	    );
            $this->template->load('template','maintenance_harian/maintenance_harian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenance_harian'));
        }
    }
    
    public function update_action() 
    {
        $config['upload_path']          = './assets/evident';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_odp');
        $result1 = $this->upload->data();
        $this->upload->do_upload('foto_redaman_sebelum');
        $result2 = $this->upload->data();
        $result = array('foto_odp'=>$result1,'foto_redaman_sebelum'=>$result2);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_maintenance_harian', TRUE));
        } else {
            if ($result['foto_odp']['file_name']=="" and $result['foto_redaman_sebelum']['file_name']=="" ) 

            {

                $data = array(

                'id_sto' => $this->input->post('id_sto',TRUE),

                'label_odp' => $this->input->post('label_odp',TRUE),

                'taging_odp' => $this->input->post('taging_odp',TRUE),

                'id_kendala' => $this->input->post('id_kendala',TRUE),

                'in_sc_nama' => $this->input->post('in_sc_nama',TRUE),

                'id_req' => $this->input->post('id_req',TRUE),

                'id_zone' => $this->input->post('id_zone',TRUE),

                'datetime_lapor' => $this->input->post('datetime_lapor',TRUE),

                'date_lapor' => $this->input->post('datetime_lapor',TRUE));

                //die($data);  

            } 

            elseif($result['foto_odp']['file_name']=="" )

            {

                $data = array(

                    'id_sto' => $this->input->post('id_sto',TRUE),

                    'label_odp' => $this->input->post('label_odp',TRUE),

                    //'foto_odp' => set_value('foto_odp', $row->foto_odp),

                    'foto_redaman_sebelum' => $result['foto_redaman_sebelum']['file_name'],

                    'taging_odp' => $this->input->post('taging_odp',TRUE),

                    'id_kendala' => $this->input->post('id_kendala',TRUE),

                    'in_sc_nama' => $this->input->post('in_sc_nama',TRUE),

                    'id_req' => $this->input->post('id_req',TRUE),

                    'id_zone' => $this->input->post('id_zone',TRUE),

                    'datetime_lapor' => $this->input->post('datetime_lapor',TRUE),

                    'date_lapor' => $this->input->post('datetime_lapor',TRUE)); 

                    //die();

                    //prin_r;               

            }

            elseif($result['foto_redaman_sebelum']['file_name']=="" )

            {

                $data = array(

                    'id_sto' => $this->input->post('id_sto',TRUE),

                    'label_odp' => $this->input->post('label_odp',TRUE),

                    'foto_odp' => $result['foto_odp']['file_name'],

                    //'foto_redaman_sebelum' => $result['foto_redaman_sebelum']['file_name'],

                    'taging_odp' => $this->input->post('taging_odp',TRUE),

                    'id_kendala' => $this->input->post('id_kendala',TRUE),

                    'in_sc_nama' => $this->input->post('in_sc_nama',TRUE),

                    'id_req' => $this->input->post('id_req',TRUE),

                    'id_zone' => $this->input->post('id_zone',TRUE),

                    'datetime_lapor' => $this->input->post('datetime_lapor',TRUE),

                    'date_lapor' => $this->input->post('datetime_lapor',TRUE)); 

                    //die($data);                 

            }

            else

            {

                $data = array(

                    'id_sto' => $this->input->post('id_sto',TRUE),

                    'label_odp' => $this->input->post('label_odp',TRUE),

                    'foto_odp' => $result['foto_odp']['file_name'],

                    'foto_redaman_sebelum' => $result['foto_redaman_sebelum']['file_name'],

                    'taging_odp' => $this->input->post('taging_odp',TRUE),

                    'id_kendala' => $this->input->post('id_kendala',TRUE),

                    'in_sc_nama' => $this->input->post('in_sc_nama',TRUE),

                    'id_req' => $this->input->post('id_req',TRUE),

                    'id_zone' => $this->input->post('id_zone',TRUE),

                    'datetime_lapor' => $this->input->post('datetime_lapor',TRUE),

                    'date_lapor' => $this->input->post('datetime_lapor',TRUE));  

                    //die($data);  

            }
            $this->Maintenance_harian_model->update($this->input->post('id_maintenance_harian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('maintenance_harian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Maintenance_harian_model->get_by_id($id);

        if ($row) {
            $this->Maintenance_harian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('maintenance_harian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenance_harian'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('label_odp', 'label odp', 'trim|required');
    	//$this->form_validation->set_rules('foto_odp', 'foto odp', 'trim|required');
    	//$this->form_validation->set_rules('foto_redaman_sebelum', 'foto redaman sebelum', 'trim|required');
    	$this->form_validation->set_rules('taging_odp', 'taging odp', 'trim|required');
    	$this->form_validation->set_rules('id_kendala', 'id kendala', 'trim|required');
    	$this->form_validation->set_rules('in_sc_nama', 'in sc nama', 'trim|required');
    	$this->form_validation->set_rules('id_req', 'id req', 'trim|required');
    	$this->form_validation->set_rules('id_zone', 'id zone', 'trim|required');
    	$this->form_validation->set_rules('datetime_lapor', 'datetime lapor', 'trim|required');
    	$this->form_validation->set_rules('date_lapor', 'date lapor', 'trim|required');

    	$this->form_validation->set_rules('id_maintenance_harian', 'id_maintenance_harian', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "maintenance_harian.xls";
        $judul = "maintenance_harian";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Label Odp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Foto Odp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Foto Redaman Sebelum");
    	xlsWriteLabel($tablehead, $kolomhead++, "Taging Odp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Kendala");
    	xlsWriteLabel($tablehead, $kolomhead++, "In Sc Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Req");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Zone");
    	xlsWriteLabel($tablehead, $kolomhead++, "Datetime Lapor");
    	xlsWriteLabel($tablehead, $kolomhead++, "Date Lapor");

	foreach ($this->Maintenance_harian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->label_odp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_odp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_redaman_sebelum);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->taging_odp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kendala);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->in_sc_nama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->id_req);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->id_zone);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->datetime_lapor);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->date_lapor);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=maintenance_harian.doc");

        $data = array(
            'maintenance_harian_data' => $this->Maintenance_harian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('maintenance_harian/maintenance_harian_doc',$data);
    }

}

/* End of file Maintenance_harian.php */
/* Location: ./application/controllers/Maintenance_harian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-11 00:13:58 */
/* http://harviacode.com */