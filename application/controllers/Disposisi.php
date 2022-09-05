<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    //menampilkan data surat baru disposisi
    public function index()
    {
        $data['title'] = 'Disposisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Disposisi_model', 'disposisi');

        $data['suratTerlihat'] = $this->disposisi->getSuratTerlihat('surat_masuk');
        $data['suratMelihat'] = $this->disposisi->getSuratMelihat('surat_masuk');
        $data['suratKaban'] = $this->disposisi->getSuratKaban('surat_masuk');
        $data['suratMasuk'] = $this->disposisi->getSuratMasuk('surat_masuk');
        $data['getSurat'] = $this->disposisi->getSurat('surat_masuk');
        $data['surat'] = $this->db->get_where('surat_masuk')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('disposisi/index', $data);
        $this->load->view('templates/footer');
    }

    
//     menampilkan halaman untuk disposisi yg dipilih
    public function lihat($id)
    {
        $data['title'] = 'Lihat Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Disposisi_model', 'disposisi');

        // $data['pejabat'] = $this->disposisi->getPejabat('pejabat');
        // $data['surat'] = $this->disposisi->getSurat('surat_masuk', ['id' => $id]);
        $data['surat'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();

        $this->form_validation->set_rules('disposisi', 'Disposisi', 'required|trim');
        $this->form_validation->set_rules('dibaca', 'dibaca', 'required|trim');

        $melihat = 1;
        $this->db->set('melihat', $melihat);
        $this->db->where('id', $id);
        $this->db->update('surat_masuk');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('disposisi/lihat', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id' => $id,
                'dSatu' => htmlspecialchars($this->input->post('dSatu')),
                'dDua' => htmlspecialchars($this->input->post('dDua')),
                'dTiga' => htmlspecialchars($this->input->post('dTiga')),
                'dEmpat' => htmlspecialchars($this->input->post('dEmpat')),
                'dLima' => htmlspecialchars($this->input->post('dLima')),
                'dEnam' => htmlspecialchars($this->input->post('dEnam')),
                'dTujuh' => htmlspecialchars($this->input->post('dTujuh'))
            ];
            $this->db->insert('lembar_disposisi', $data);

            $dibaca = htmlspecialchars($this->input->post('dibaca'));
            $disposisi = htmlspecialchars($this->input->post('disposisi'));

            $this->db->set('dibaca', $dibaca);
            $this->db->set('disposisi', $disposisi);
            $this->db->where('id', $id);
            $this->db->update('surat_masuk');

            $this->session->set_flashdata('message', '<div class="alert alert-dismissible fade show notifikasi alert-success display-7" data-dismiss="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Disposisi berhasil <strong>Terkirim..!!</strong></div></div>');
            redirect('disposisi');
        }
    }
    

    //function untuk melaporkan surat harus di upload
    public function lapor($id)
    {

        $this->form_validation->run();
        $lapor = 1;
        $dibaca = 0;
        $melihat = 0;
        $this->db->set('lapor',$lapor);
        $this->db->set('dibaca',$dibaca);
        $this->db->set('melihat',$melihat);
        $this->db->where('id', $id);
        $this->db->update('surat_masuk');
        $this->session->set_flashdata('message', '<div class="alert alert-dismissible fade show notifikasi alert-success display-7" data-dismiss="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Melaporkan berhasil <strong>Terkirim..!!</strong></div></div>');
        redirect('disposisi');
    }
}
