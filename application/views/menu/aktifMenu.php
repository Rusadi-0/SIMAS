<?php
$namaControler = $menu['menu'];
	$file = fopen("F:\\xampp\\htdocs\\SIMAS\\application\\controllers\\".$namaControler.".php", "w");
	mkdir("F:\\xampp\\htdocs\\SIMAS\\application\\views\\".$namaControler);
	$fileView = fopen("F:\\xampp\\htdocs\\SIMAS\\application\\views\\".$namaControler."\\index.php", "w");


	if (!$file) {
		// echo "File sudah dibuat";
		// unlink("F:\\xampp\\\htdocs\\SIMAS\\application\\controllers\\".$namaControler.".php");		
		// rmdir("F:\\xampp\\\htdocs\\SIMAS\\application\\views\\".$namaControler);		
	} else {
		// echo "File berhasil dibuat";
		$isiFileView = '
		</header>
		<!-- End Navigation Bar=============================================================================-->
		
		<!-- ISI ================================================================================================= -->
		<div class="wrapper">
			<div class="container-fluid">
		
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<div class="page-title-box">
							<div class="btn-group pull-right">
								<ol class="breadcrumb hide-phone p-0 m-0">
									<li class="breadcrumb-item"><a href="#">'.$namaControler.'</a></li>
									<li class="breadcrumb-item active"><?= $title; ?></li>
								</ol>
							</div>
							<h4 class="page-title"><?= $title; ?></h4>
						</div>
					</div>
				</div>
		
		
		
			</div>
			<!-- /.container-fluid -->
		
		</div>
		<!-- End of Main Content -->
		';
		$isiFile = "
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class $namaControler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        \$data['title'] = '$namaControler';
        \$data['user'] = \$this->db->get_where('user', ['email' => \$this->session->userdata('email')])->row_array();

        \$data['user_sub_menu'] = \$this->db->get_where('user_sub_menu')->row_array();

        \$this->load->view('templates/header', \$data);
        \$this->load->view('templates/topbar', \$data);
        \$this->load->view('templates/sidebar', \$data);
        \$this->load->view('$namaControler/index', \$data);
        \$this->load->view('templates/footer');
    }
}
		
		
		
		
		";
		fwrite($file, $isiFile);
		fwrite($fileView, $isiFileView);
	}
	fclose($file);
	fclose($fileView);
?>

