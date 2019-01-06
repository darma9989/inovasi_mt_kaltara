<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class View_maintenance_harian extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            //is_login();
            $this->load->model('View_maintenance_harian_model');
            $this->load->library('form_validation');        
            $this->load->library('datatables');
        }

        public function index()
        {
            $this->template->load('template','view_maintenance_harian/view_maintenance_harian_list');
        } 

        public function json() {
            header('Content-Type: application/json');
            echo $this->View_maintenance_harian_model->json();
        }

        public function read($id) 
        {
            $row = $this->View_maintenance_harian_model->get_by_id($id);
            if ($row) {
                $data = array(
                    'id_maintenance_harian' => $row->id_maintenance_harian,
                    'label_odp' => $row->label_odp,
                    'foto_odp' => $row->foto_odp,
                    'foto_redaman_sebelum' => $row->foto_redaman_sebelum,
                    'taging_odp' => $row->taging_odp,
                    //'id_kendala' => $row->id_kendala,
                    'nama_kendala' => $row->nama_kendala,
                    'in_sc_nama' => $row->in_sc_nama,
                    //'id_req' => $row->id_req,
                    'nama_req' => $row->nama_req,
                    //'id_zone' => $row->id_zone,
                    'nama_zone' => $row->nama_zone,
                    'datetime_lapor' => $row->datetime_lapor,
                    'foto_redaman_sesudah' => $row->foto_redaman_sesudah,
                    //'id_team' => $row->id_team,
                    'nama_team' => $row->nama_team,
                    'rfo' => $row->rfo,
                    'material' => $row->material,
                    'datetime_selesai' => $row->datetime_selesai,
                    //'id_status' => $row->id_status,
                    'nama_status' => $row->nama_status,
                    'durasi' => $row->durasi,
                    'nama_kategori_rfo' => $row->nama_kategori_rfo,
                    'nama_kategori_rfo_detail' => $row->nama_kategori_rfo_detail,
            );
                $this->template->load('template','view_maintenance_harian/view_maintenance_harian_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('view_maintenance_harian'));
            }
        }
    }
