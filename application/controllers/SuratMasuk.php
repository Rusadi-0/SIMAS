
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Surat_model', 'surat');

        $data['suratMasuk'] = $this->surat->getSuratMasuk('surat_masuk');
        $data['surat'] = $this->surat->getSurat('surat_masuk');

        $this->form_validation->set_rules('nomorSurat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('asalSurat', 'Asal Surat', 'required');
        $this->form_validation->set_rules('tanggalTerimaSurat', 'Tanggal Terima Surat', 'required');
        $this->form_validation->set_rules('prihalSurat', 'Prihal Surat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('SuratMasuk/index', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './surat/';
            $config['allowed_types']        = 'pdf|jpg|png';
            $config['max_size']             = 1244;
            // $config['encrypt_name']         = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('fileSurat');
            $datas = [
                'noAgenda' => $this->input->post('noAgenda') + 1,
                'nomorSurat' => strtoupper(htmlspecialchars($this->input->post('nomorSurat'))),
                'asalSurat' => strtoupper(htmlspecialchars($this->input->post('asalSurat'))),
                'tanggalTerimaSurat' => date($this->input->post('tanggalTerimaSurat')),
                'prihalSurat' => ucfirst(htmlspecialchars($this->input->post('prihalSurat'))),
                'fileSurat' => htmlspecialchars($this->upload->data('file_name')),
                'tgl' => strtoupper(htmlspecialchars($this->input->post('tgl'))),
                'waktu' => time()
            ];
            if ($this->upload->data('file_ext') == '.pdf') {
                $this->db->insert('surat_masuk', $datas);
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Rekam berhasil dan Surat berhasil Terkirim Ke <br><strong>Kepala Badan</strong></div>');
                redirect('SuratMasuk');
            } elseif ($this->upload->data('file_ext') == '.jpg') {
                $this->db->insert('surat_masuk', $datas);
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Rekam berhasil dan Surat berhasil Terkirim Ke <br><strong>Kepala Badan</strong></div>');
                redirect('SuratMasuk');
            } elseif ($this->upload->data('file_ext') == '.png') {
                $this->db->insert('surat_masuk', $datas);
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Rekam berhasil dan Surat berhasil Terkirim Ke <br><strong>Kepala Badan</strong></div>');
                redirect('SuratMasuk');
            } elseif ($this->upload->data('file_ext') == '') {
                $this->db->insert('surat_masuk', $datas);
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Rekam berhasil dan Surat berhasil Terkirim Ke <br><strong>Kepala Badan</strong></div>');
                redirect('SuratMasuk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-danger " data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>
                 GAGAL, file terupload berformat<strong> Salah..!!</strong>
                </div>');
                $this->session->set_flashdata('tidak', '<small style="color: red;">File yang di Upload harus format <strong>PDF / JPG / PNG</strong></small>');
                redirect('SuratMasuk');
            }
        }
    }

    //function untuk hapus surat masuk
    public function masukHapus($id)
    {
        $path = './surat/' . $id;
        chmod($path, 0777);
        unlink($path);
        $this->db->delete('surat_masuk', ['id' => $id]);
        $this->db->delete('lembar_disposisi', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Surat dipilih berhasil <strong>Terhapus..!!</strong></div>');
        redirect('SuratMasuk');
    }

    public function masukEdit($id)
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suratMasuk'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nomorSurat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('asalSurat', 'Asal Surat', 'required');
        $this->form_validation->set_rules('tanggalTerimaSurat', 'Tanggal Terima Surat', 'required');
        $this->form_validation->set_rules('prihalSurat', 'Prihal Surat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('SuratMasuk/edit/editMasuk', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = htmlspecialchars($this->input->post('id'));
            $nomorSurat = htmlspecialchars($this->input->post('nomorSurat'));
            $asalSurat = htmlspecialchars($this->input->post('asalSurat'));
            $tanggalTerimaSurat = date($this->input->post('tanggalTerimaSurat'));
            $prihalSurat = htmlspecialchars($this->input->post('prihalSurat'));
            // $fileSurat = htmlspecialchars($this->input->post('fileSurat'));
            $disposisi = htmlspecialchars($this->input->post('dibaca'));

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['fileSurat']['name'];

            if ($upload_image) {
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 1244;
                $config['upload_path']          = './surat/';
                $config['encrypt_name']         = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('fileSurat')) {
                    $old_image = $data['suratMasuk']['fileSurat'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './surat/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('fileSurat', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('nomorSurat', $nomorSurat);
            $this->db->set('asalSurat', $asalSurat);
            $this->db->set('tanggalTerimaSurat', $tanggalTerimaSurat);
            $this->db->set('prihalSurat', $prihalSurat);
            // $this->db->set('fileSurat', $fileSurat);
            // $this->db->set('dibaca', $disposisi);
            $this->db->where('id', $id);
            $this->db->update('surat_masuk');

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Surat dipilih berhasil <strong>Teredit..!!</strong></div>');
            redirect('SuratMasuk');
        }
    }
    public function laporEdit($id)
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suratMasuk'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nomorSurat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('asalSurat', 'Asal Surat', 'required');
        $this->form_validation->set_rules('tanggalTerimaSurat', 'Tanggal Terima Surat', 'required');
        $this->form_validation->set_rules('prihalSurat', 'Prihal Surat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('SuratMasuk/lapor/laporEdit', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = htmlspecialchars($this->input->post('id'));
            $nomorSurat = htmlspecialchars($this->input->post('nomorSurat'));
            $asalSurat = htmlspecialchars($this->input->post('asalSurat'));
            $tanggalTerimaSurat = date($this->input->post('tanggalTerimaSurat'));
            $prihalSurat = htmlspecialchars($this->input->post('prihalSurat'));
            // $fileSurat = htmlspecialchars($this->input->post('fileSurat'));
            // $disposisi = htmlspecialchars($this->input->post('dibaca'));

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['fileSurat']['name'];

            if ($upload_image) {
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 1244;
                $config['upload_path']          = './surat/';
                $config['encrypt_name']         = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('fileSurat')) {
                    $old_image = $data['suratMasuk']['fileSurat'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './surat/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('fileSurat', $new_image);
                } else {
                    // echo $this->upload->dispay_errors();
                    echo $this->upload->dispay_errors();
                }
            }
            $lapor = 0;
            $this->db->set('nomorSurat', $nomorSurat);
            $this->db->set('asalSurat', $asalSurat);
            $this->db->set('tanggalTerimaSurat', $tanggalTerimaSurat);
            $this->db->set('prihalSurat', $prihalSurat);
            $this->db->set('lapor', $lapor);
            $this->db->where('id', $id);
            $this->db->update('surat_masuk');

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Surat dipilih berhasil <strong>Terupload..!!</strong></div>');
            redirect('SuratMasuk');
        }
    }


    //function untuk mengubah status dari "0" menjadi "1" pada "baruDisposisi"
    public function lembar($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $baruDisposisi = 1;
        $this->db->set('baruDisposisi', $baruDisposisi);
        $this->db->where('id', $id);
        $this->db->update('surat_masuk');
        redirect('SuratMasuk/lembar_disposisi/' . $id);
    }



    //function untuk cetak lembar disposisi
    public function lembar_disposisi($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratMasuk'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
        $this->load->model('Disposisi_model', 'disposisi');

        $data['disposisi'] = $this->disposisi->getDisposisi($id);



        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 330]]);
        $data = $this->load->view('SuratMasuk/disposisi/lembarDisposisi', $data, TRUE);
        $mpdf->imageVars['myvariable'] = file_get_contents(base_url('/assets/img/logo.png'));
        $mpdf->SetWatermarkText('           copy', 0.1);
        $mpdf->showWatermarkText = true;
        $mpdf->WriteHTML($data);
        $mpdf->Output($id . '.pdf', 'I');
        // $mpdf->Output($id . '.pdf', 'D');
        // $mpdf->Output($id . '.pdf', 'F');
        // $mpdf->Output($id . '.pdf', 'S');
    }


    //function untuk reset disposisi surat
    public function ulang_disposisi($id)
    {
        $this->db->delete('lembar_disposisi', ['id' => $id]);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratMasuk'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
        $waktu = time();
        $dibaca = 0;
        $melihat = 0;
        $lapor = 0;
        $baruDisposisi = 0;
        $this->db->set('dibaca', $dibaca);
        $this->db->set('waktu', $waktu);
        $this->db->set('melihat', $melihat);
        $this->db->set('lapor', $lapor);
        $this->db->set('baruDisposisi', $baruDisposisi);
        $this->db->where('id', $id);
        $this->db->update('surat_masuk');

        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Disposisi kirim ulang.. <strong>Berhasil..!!</strong></div>');
        redirect('SuratMasuk');
    }
}
		
		
		
		
		