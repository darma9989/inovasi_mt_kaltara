<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_harian_maintenance_harian_model extends CI_Model
{

    public $table = 'view_maintenance_harian';


    function __construct()
    {
        parent::__construct();
    }
    function sto(){

        $hasil=$this->db->query("SELECT nama_sto
            ,COUNT(nama_kendala) as 'total' 
            ,COUNT(IF(nama_zone='Assurance',nama_kendala, NULL)) as 'assurance'
            ,COUNT(IF(nama_zone='Provisioning',nama_kendala, NULL)) as 'provisioning'
            ,COUNT(IF(nama_zone='Remo',nama_kendala, NULL)) as 'remo'
            ,COUNT(if(nama_kendala='SPLITTER', nama_kendala, NULL)) as 'splitter'
            ,COUNT(if(nama_kendala='ODP', nama_kendala, NULL)) as 'odp'
            ,COUNT(if(nama_kendala='RETI', nama_kendala, NULL)) as 'reti'
            ,COUNT(if(nama_kendala='LOS', nama_kendala, NULL)) as 'los'
            ,COUNT(if(nama_status='OPEN', nama_kendala, NULL)) as 'open'
            ,COUNT(if(nama_kategori_rfo='odp', nama_kendala, NULL)) as 'odp_ar'
            ,COUNT(if(nama_kategori_rfo='odc', nama_kendala, NULL)) as 'odc_ar'
            ,COUNT(if(nama_kategori_rfo='ftm', nama_kendala, NULL)) as 'ftm_ar'
            ,COUNT(if(nama_status='PROGRESS', nama_kendala, NULL)) as 'progress'
            ,COUNT(if(nama_status='PENDING', nama_kendala, NULL)) as 'pending'
            ,COUNT(if(nama_status='CLOSE', nama_kendala, NULL)) as 'close'
            ,COUNT(if(durasi_jam<3, nama_kendala, NULL)) as 'tiga'
            ,COUNT(if(durasi_jam>=3 AND durasi_jam<=6 , nama_kendala, NULL)) as 'tiga_enam'
            ,COUNT(if(durasi_jam>=6 AND durasi_jam<=12, nama_kendala, NULL)) as 'enam_duabelas'
            ,COUNT(if(durasi_jam>=12 AND durasi_jam<=24, nama_kendala, NULL)) as 'duabelas_duapuluhempat'
            ,COUNT(if(durasi_jam>=24, nama_kendala, NULL)) as 'duapuluhempat_keatas'
            FROM view_maintenance_harian 
            GROUP BY nama_sto
            ORDER BY nama_sto ASC");
            return $hasil;
    }    

    function cari_sto(){
        $cari = $this->input->GET('cari', TRUE);
        $cari2 = $this->input->GET('cari2', TRUE);
        $hasil=$this->db->query("SELECT nama_sto
            ,COUNT(nama_kendala) as 'total' 
            ,COUNT(IF(nama_zone='Assurance',nama_kendala, NULL)) as 'assurance'
            ,COUNT(IF(nama_zone='Provisioning',nama_kendala, NULL)) as 'provisioning'
            ,COUNT(IF(nama_zone='Remo',nama_kendala, NULL)) as 'remo'
            ,COUNT(if(nama_kendala='SPLITTER', nama_kendala, NULL)) as 'splitter'
            ,COUNT(if(nama_kendala='ODP', nama_kendala, NULL)) as 'odp'
            ,COUNT(if(nama_kendala='RETI', nama_kendala, NULL)) as 'reti'
            ,COUNT(if(nama_kendala='LOS', nama_kendala, NULL)) as 'los'
            ,COUNT(if(nama_status='OPEN', nama_kendala, NULL)) as 'open'
            ,COUNT(if(nama_kategori_rfo='odp', nama_kendala, NULL)) as 'odp_ar'
            ,COUNT(if(nama_kategori_rfo='odc', nama_kendala, NULL)) as 'odc_ar'
            ,COUNT(if(nama_kategori_rfo='ftm', nama_kendala, NULL)) as 'ftm_ar'
            ,COUNT(if(nama_status='PROGRESS', nama_kendala, NULL)) as 'progress'
            ,COUNT(if(nama_status='PENDING', nama_kendala, NULL)) as 'pending'
            ,COUNT(if(nama_status='CLOSE', nama_kendala, NULL)) as 'close'
            ,COUNT(if(durasi_jam<3, nama_kendala, NULL)) as 'tiga'
            ,COUNT(if(durasi_jam>=3 AND durasi_jam<=6 , nama_kendala, NULL)) as 'tiga_enam'
            ,COUNT(if(durasi_jam>=6 AND durasi_jam<=12, nama_kendala, NULL)) as 'enam_duabelas'
            ,COUNT(if(durasi_jam>=12 AND durasi_jam<=24, nama_kendala, NULL)) as 'duabelas_duapuluhempat'
            ,COUNT(if(durasi_jam>=24, nama_kendala, NULL)) as 'duapuluhempat_keatas'
            FROM view_maintenance_harian 
            WHERE date_selesai BETWEEN '$cari' AND '$cari2'
            GROUP BY nama_sto");
            return $hasil->result();
    }  

    function detail_sto_assurance(){
        $nama_sto= $this->input->GET('nama_sto', TRUE);
        $nama_zone = $this->input->GET('nama_zone', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE nama_zone='$nama_zone' AND nama_sto='$nama_sto'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 
    function detail_sto_assurance_total(){
        $nama_zone = $this->input->GET('nama_zone', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE nama_zone='$nama_zone'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 

    //untuk tab incident
    function detail_sto_incident(){
        $nama_sto= $this->input->GET('nama_sto', TRUE);
        $nama_kendala = $this->input->GET('nama_kendala', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE nama_kendala='$nama_kendala' AND nama_sto='$nama_sto'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 
    function detail_sto_incident_total(){
        $nama_kendala = $this->input->GET('nama_kendala', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE nama_kendala='$nama_kendala'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 

    //untuk tab actual resolution
    function detail_sto_ar(){
        $nama_sto= $this->input->GET('nama_sto', TRUE);
        $nama_kategori_rfo = $this->input->GET('nama_kategori_rfo', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE nama_kategori_rfo='$nama_kategori_rfo' AND nama_sto='$nama_sto'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 
    function detail_sto_ar_total(){
        $nama_kategori_rfo = $this->input->GET('nama_kategori_rfo', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE nama_kategori_rfo='$nama_kategori_rfo'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 

    //untuk tab time to resolve
    function detail_sto_ttr_tiga(){
        $nama_sto= $this->input->GET('nama_sto', TRUE);
        $durasi_jam1 = $this->input->GET('durasi_jam1', TRUE);
        $durasi_jam2 = $this->input->GET('durasi_jam2', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE durasi_jam<'$durasi_jam1' OR durasi_jam='$durasi_jam2' AND nama_sto='$nama_sto'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 
    function detail_sto_ttr_duapuluhempat_keatas(){
        $nama_sto= $this->input->GET('nama_sto', TRUE);
        $durasi_jam = $this->input->GET('durasi_jam', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE durasi_jam>'$durasi_jam' AND nama_sto='$nama_sto'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 
    function detail_sto_ttr_total(){
        $durasi_jam = $this->input->GET('durasi_jam', TRUE);
        $hasil=$this->db->query("SELECT *
            FROM view_maintenance_harian 
            WHERE durasi_jam='$durasi_jam'
            ORDER BY nama_sto ASC");
            return $hasil;
    } 

    function team(){
        $hasil=$this->db->query("SELECT nama_team, nama_sto
        ,COUNT(nama_kendala) as 'total' 
        ,COUNT(IF(nama_zone='Assurance',nama_kendala, NULL)) as 'assurance'
        ,COUNT(IF(nama_zone='Provisioning',nama_kendala, NULL)) as 'provisioning'
        ,COUNT(IF(nama_zone='Remo',nama_kendala, NULL)) as 'remo'
        ,COUNT(if(nama_kendala='SPLITTER', nama_kendala, NULL)) as 'splitter'
        ,COUNT(if(nama_kendala='ODP', nama_kendala, NULL)) as 'odp'
        ,COUNT(if(nama_kendala='RETI', nama_kendala, NULL)) as 'reti'
        ,COUNT(if(nama_kendala='LOS', nama_kendala, NULL)) as 'los'
        ,COUNT(if(nama_kategori_rfo='odp', nama_kendala, NULL)) as 'odp_ar'
        ,COUNT(if(nama_kategori_rfo='odc', nama_kendala, NULL)) as 'odc_ar'
        ,COUNT(if(nama_kategori_rfo='ftm', nama_kendala, NULL)) as 'ftm_ar'
        ,COUNT(if(nama_status='OPEN', nama_kendala, NULL)) as 'open'
        ,COUNT(if(nama_status='PROGRESS', nama_kendala, NULL)) as 'progress'
        ,COUNT(if(nama_status='PENDING', nama_kendala, NULL)) as 'pending'
        ,COUNT(if(nama_status='CLOSE', nama_kendala, NULL)) as 'close'
        ,COUNT(if(durasi_jam<3, nama_kendala, NULL)) as 'tiga'
        ,COUNT(if(durasi_jam>=3 AND durasi_jam<=6 , nama_kendala, NULL)) as 'tiga_enam'
        ,COUNT(if(durasi_jam>=6 AND durasi_jam<=12, nama_kendala, NULL)) as 'enam_duabelas'
        ,COUNT(if(durasi_jam>=12 AND durasi_jam<=24, nama_kendala, NULL)) as 'duabelas_duapuluhempat'
        ,COUNT(if(durasi_jam>=24, nama_kendala, NULL)) as 'duapuluhempat_keatas'
        FROM view_maintenance_harian 
        GROUP BY nama_team");
        return $hasil;
    }   

    function cari_team(){
        $cari = $this->input->GET('cari', TRUE);
        $cari2 = $this->input->GET('cari2', TRUE);
        $hasil=$this->db->query("SELECT nama_team, nama_sto
        ,COUNT(nama_kendala) as 'total' 
        ,COUNT(IF(nama_zone='Assurance',nama_kendala, NULL)) as 'assurance'
        ,COUNT(IF(nama_zone='Provisioning',nama_kendala, NULL)) as 'provisioning'
        ,COUNT(IF(nama_zone='Remo',nama_kendala, NULL)) as 'remo'
        ,COUNT(if(nama_kendala='SPLITTER', nama_kendala, NULL)) as 'splitter'
        ,COUNT(if(nama_kendala='ODP', nama_kendala, NULL)) as 'odp'
        ,COUNT(if(nama_kendala='RETI', nama_kendala, NULL)) as 'reti'
        ,COUNT(if(nama_kendala='LOS', nama_kendala, NULL)) as 'los'
        ,COUNT(if(nama_kategori_rfo='odp', nama_kendala, NULL)) as 'odp_ar'
        ,COUNT(if(nama_kategori_rfo='odc', nama_kendala, NULL)) as 'odc_ar'
        ,COUNT(if(nama_kategori_rfo='ftm', nama_kendala, NULL)) as 'ftm_ar'
        ,COUNT(if(nama_status='OPEN', nama_kendala, NULL)) as 'open'
        ,COUNT(if(nama_status='PROGRESS', nama_kendala, NULL)) as 'progress'
        ,COUNT(if(nama_status='PENDING', nama_kendala, NULL)) as 'pending'
        ,COUNT(if(nama_status='CLOSE', nama_kendala, NULL)) as 'close'
        ,COUNT(if(durasi_jam<3, nama_kendala, NULL)) as 'tiga'
        ,COUNT(if(durasi_jam>=3 AND durasi_jam<=6 , nama_kendala, NULL)) as 'tiga_enam'
        ,COUNT(if(durasi_jam>=6 AND durasi_jam<=12, nama_kendala, NULL)) as 'enam_duabelas'
        ,COUNT(if(durasi_jam>=12 AND durasi_jam<=24, nama_kendala, NULL)) as 'duabelas_duapuluhempat'
        ,COUNT(if(durasi_jam>=24, nama_kendala, NULL)) as 'duapuluhempat_keatas'
        FROM view_maintenance_harian 
        WHERE date_lapor BETWEEN '$cari' AND '$cari2'
        GROUP BY nama_team");
        return $hasil->result();
    }  
}
