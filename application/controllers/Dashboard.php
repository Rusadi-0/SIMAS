<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Surat_model', 'surat');
        $data['gsm'] = $this->surat->getSM();
        $data['total_masuk'] = $this->surat->hitungJumlahMasuk();
        $data['total_keluar'] = $this->surat->hitungJumlahAsset();
        $data['total_disposisi'] = $this->surat->hitungJumlahDisposisi();
        $data['total_belum'] = $this->surat->hitungJumlahBelum();
        $data['suratMasuk'] = $this->db->get('surat_Masuk')->result_array();
        $data['suratKeluar'] = $this->db->get('surat_Keluar')->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}