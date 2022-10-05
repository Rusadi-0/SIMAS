
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Surat_model', 'surat');

        $data['total_asset'] = $this->surat->hitungJumlahAsset();

        $data['suratKeluar'] = $this->db->get('surat_keluar')->result_array();
        $data['suratK'] = $this->db->get_where('surat_keluar')->row_array();
        $data['bidang'] = $this->db->get('bidang')->result_array();
        $data['instansi'] = $this->db->get_where('nama-instansi')->row_array();

        $this->form_validation->set_rules('nomorSurat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tanggalSurat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('bidang', 'Bidang', 'required');
        $this->form_validation->set_rules('prihalSurat', 'Prihal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('SuratKeluar/index', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './ZpITfmvwnMrnap5Yfj5lUD6/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 1244;
            $config['encrypt_name']         = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('fileSurat');
            $datas = [
                'noAgenda' => $this->input->post('noAgenda') + 1,
                'nomorSurat' => htmlspecialchars($this->input->post('nomorSurat')),
                'tanggalSurat' => date($this->input->post('tanggalSurat')),
                'bidang' => htmlspecialchars($this->input->post('bidang')),
                'prihalSurat' => htmlspecialchars($this->input->post('prihalSurat')),
                'tgl' => htmlspecialchars($this->input->post('tgl')),
                'fileSurat' => htmlspecialchars($this->upload->data('file_name'))
            ];
            if ($this->upload->data('file_ext') == '.pdf' && $this->upload->data('file_size') < 1300) {
                $this->db->insert('surat_keluar', $datas);
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Rekam surat keluar...<br><strong>Berhasil..!</strong></div>');
                redirect('SuratKeluar');
            // } elseif ($this->upload->data('file_ext') == '') {
            //     $this->db->insert('surat_keluar', $datas);
            //     $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Rekam berhasil dan Surat berhasil Terkirim Ke <br><strong>Kepala Badan</strong></div>');
            //     redirect('SuratKeluar');
            } else {
                if ($this->upload->data('file_ext') != '.pdf') {
                    $this->session->set_flashdata('tidak', '<small style="color: red;"> <strong>UPLOAD GAGAL..!!</strong> File diupload bukan berformat PDF  </small>');
                    redirect('SuratKeluar');
                } elseif ($this->upload->data('file_size') > 1300) {
                    $this->session->set_flashdata('tidak', '<small style="color: red;"> <strong>UPLOAD GAGAL..!!</strong> File diupload melebih 1 MB  </small>');
                    redirect('SuratKeluar');
                }
            }
        }
    }

    public function keluarHapus($id)
    {


        $this->db->delete('surat_keluar', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Surat dipilih berhasil <strong>Terhapus..!!</strong></div>');
        redirect('SuratKeluar');
    }

    //function untuk edit surat masuk


    //function untuk edit surat keluar
    public function keluarEdit($id)
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suratKeluar'] = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
        $data['bidang'] = $this->db->get('bidang')->result_array();

        $this->form_validation->set_rules('nomorSurat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tanggalSurat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('bidang', 'Bidang', 'required');
        $this->form_validation->set_rules('prihalSurat', 'Prihal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('suratKeluar/edit/editKeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $nomorSurat = htmlspecialchars($this->input->post('nomorSurat'));
            $tanggalSurat = date($this->input->post('tanggalSurat'));
            $bidang = htmlspecialchars($this->input->post('bidang'));
            $prihalSurat = htmlspecialchars($this->input->post('prihalSurat'));

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['fileSurat']['name'];

            if ($upload_image) {
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1244;
                $config['upload_path']          = './ZpITfmvwnMrnap5Yfj5lUD6/';
                $config['encrypt_name']         = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('fileSurat')) {
                    $old_image = $data['suratKeluar']['fileSurat'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './ZpITfmvwnMrnap5Yfj5lUD6/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('fileSurat', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('nomorSurat', $nomorSurat);
            $this->db->set('tanggalSurat', $tanggalSurat);
            $this->db->set('bidang', $bidang);
            $this->db->set('prihalSurat', $prihalSurat);
            $this->db->where('id', $id);
            $this->db->update('surat_keluar');

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Surat dipilih berhasil <strong>Teredit..!!</strong></div>');
            redirect('SuratKeluar');
        }
    }


    //function untuk menampilkan halaman data surat keluar

}
