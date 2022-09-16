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
                            <li class="breadcrumb-item"><a href="#">Profile</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="mx-auto card mb-3 shadows" style="max-width: 700px;">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <a href="<?= base_url('profile/edit'); ?>"><img style="" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img-top img-fluid"></a>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?= ucwords($user['name']); ?></h5>
                                <p class="card-text">
                                    <?php foreach ($userRole as $sr) {
                                    if ($sr['id'] == $user['role_id']) {
                                    echo $sr['role'];
                                    }
                                    } ?>
                                </p>
                                <p class="card-text"><small class="text-muted">Terdaftar dari <?= date('d F Y', $user['date_created']); ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->