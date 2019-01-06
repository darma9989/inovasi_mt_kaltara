<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_harian_maintenance_harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Report_harian_maintenance_harian_model');
        //$this->load->library('form_validation');
    }

    public function sto()
    {
        $x['data']=$this->Report_harian_maintenance_harian_model->sto();
        $this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto',$x);
    }

    public function hasil_sto()
	{
		$data2['cari'] = $this->Report_harian_maintenance_harian_model->cari_sto();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_hasil', $data2);
    }
    
    public function detail_sto_assurance()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_assurance();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_assurance', $x);
    }

    public function detail_sto_assurance_total()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_assurance_total();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_assurance', $x);
    }
    

    //untuk tab assurance
    public function detail_sto_incident()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_incident();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_incident', $x);
    }
    public function detail_sto_incident_total()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_incident_total();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_incident', $x);
    }

    //untuk tab actual resolution
    public function detail_sto_ar()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_ar();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_ar', $x);
    }
    public function detail_sto_ar_total()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_ar_total();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_ttr', $x);
    }

    //untuk tab time to resolve
    public function detail_sto_ttr_tiga()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_ttr_tiga();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_ttr', $x);
    }
    public function detail_sto_ttr_duapuluhempat_keatas()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_ttr_duapuluhempat_keatas();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_ar', $x);
    }
    public function detail_sto_ttr_total()
	{
		$x['data'] = $this->Report_harian_maintenance_harian_model->detail_sto_ttr_total();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_sto_detail_ar', $x);
    }

    
    public function team()
    {
        $x['data']=$this->Report_harian_maintenance_harian_model->team();
        $this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_team',$x);
    }

    public function hasil_team()
    {
        $data1['cari1'] = $this->Report_harian_maintenance_harian_model->cari_team();
		$this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_team_hasil', $data1);
    }

    public function actual_resol()
    {
        $x['data']=$this->Report_harian_maintenance_harian_model->actual_resol();
        $this->template->load('template','report_harian_maintenance_hari/report_harian_maintenance_hari_list_actual_resol',$x);
    }
    


}
