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
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <script>
            const dd1 = [<?php foreach ($suratMasuk as $sm) : ?><?php if (date('Y-m', strtotime($sm['tgl'])) === date('Y-m',time())) : ?><?= "'" . $sm["id"] . "'"; ?>, <?php endif; ?><?php endforeach; ?>];
            const dd2 = dd1.length;

            const do1 = [<?php foreach ($suratKeluar as $sk) : ?><?php if (date('Y-m', strtotime($sk['tgl'])) === date('Y-m',time())) : ?><?= "'" . $sk["id"] . "'"; ?>, <?php endif; ?><?php endforeach; ?>];
            const do2 = do1.length;
        </script>
        <?php if($user['role_id'] == 181):?>
        <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <a href="<?= base_url('SuratMasuk')?>">
                            <div class="card-body uhuy">
                                <div class="d-flex flex-row">
                                    <div class="col-2 align-self-center">
                                        <div class="round">
                                            <i class="mdi mdi-email-variant"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center text-center">
                                        <div class="m-l-10">
                                            <h3 class="mt-0 mb-0 round-inner">
                                                <strong>
                                                    <script>
                                                        document.writeln(dd2);
                                                    </script>
                                                </strong>
                                            </h3>
                                            <p style="font-size: 18px;" class="mb-0 text-muted">Surat Masuk</p>                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <a href="<?= base_url('SuratKeluar')?>">
                            <div class="card-body uhuy">
                                <div class="d-flex flex-row">
                                    <div class="col-2 align-self-center">
                                        <div class="round">
                                            <i class="mdi mdi-send"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 text-center align-self-center">
                                        <div class="m-l-10 ">
                                            <h3 class="mt-0 mb-0 round-inner">
                                                <strong>
                                                    <script>
                                                        document.writeln(do2);
                                                    </script>
                                                </strong>
                                            </h3>
                                            <p style="font-size: 18px;" class="mb-0 text-muted">Surat Keluar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
<script>

if(<?= $total_disposisi?> > 0){
   document.writeln(/*html*/`<!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <?php if($total_disposisi):?>
                            <a href="<?= base_url('SuratMasuk')?>">
                            <?php endif;?>
                            <div style="background-color: #f9fffa;" class="card-body uhuy">
                                <div class="d-flex flex-row">
                                <div class="col-2 align-self-center">
                                        <div style="background-color: #c4ffd9;" class="round">
                                            <i style="color: #23ce67;" class="mdi mdi-file-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center text-center">
                                        <div class="m-l-10 ">
                                            <h3 class="mt-0 mb-0 round-inner"><strong><?= $total_disposisi;?></strong></h3>
                                            <p style="font-size: 18px;" class="mb-0 text-muted">Disposisi baru</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->`); 
} else{
    document.writeln(/*html*/`<!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <?php if($total_disposisi):?>
                            <a href="<?= base_url('SuratMasuk')?>">
                            <?php endif;?>
                            <div class="card-body uhuy">
                                <div class="d-flex flex-row">
                                <div class="col-2 align-self-center">
                                        <div class="round">
                                            <i class="mdi mdi-file-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center text-center">
                                        <div class="m-l-10 ">
                                            <h3 class="mt-0 mb-0 round-inner"><strong><?= $total_disposisi;?></strong></h3>
                                            <p style="font-size: 18px;" class="mb-0 text-muted">Disposisi baru</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->`);
}

if(<?= $total_belum?> > 0){
    document.writeln(/*html*/`<!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                        <?php if($total_belum):?>
                            <a href="<?= base_url('SuratMasuk')?>">
                            <?php endif;?>
                            <div  style="background-color: #fffcfc;" class="card-body uhuy">
                                <div class="d-flex flex-row">
                                    <div class="col-2 align-self-center">
                                        <div style="background-color: #ffcece;" class="round ">
                                            <i style="color: #e02c2c;" class="mdi mdi-eye-off"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center text-center">
                                        <div class="m-l-10">
                                            <h3 class="mt-0 mb-0 round-inner"><strong><?= $total_belum?></strong></h3>
                                            <p style="font-size: 18px;" class="mb-0 text-muted">Dibaca Saja</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->`);
} else {
    document.writeln(/*html*/`<!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                        <?php if($total_belum):?>
                            <a href="<?= base_url('SuratMasuk')?>">
                            <?php endif;?>
                            <div class="card-body uhuy">
                                <div class="d-flex flex-row">
                                    <div class="col-2 align-self-center">
                                        <div class="round ">
                                            <i class="mdi mdi-eye-off"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center text-center">
                                        <div class="m-l-10">
                                            <h3 class="mt-0 mb-0 round-inner"><strong><?= $total_belum?></strong></h3>
                                            <p style="font-size: 18px;" class="mb-0 text-muted">Belom dibaca</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->`);
}


</script>

                </div>
<?php endif;?>
                <script>
                    if (<?= $user['role_id'] == 185 ?>) {
                        window.location.href = "<?php base_url('')?>disposisi";
                    }
                </script>


                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h5 class="header-title pb-3 mt-0">Overview</h5>
                                <div id="multi-line-chart" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <a href="" class="btn btn-primary btn-sm float-right">More Info</a>
                                <h5 class="header-title mt-0 pb-3">Revenue By Country</h5>
                                                                                
                                <ul class="list-unstyled list-inline text-center">
                                    <li class="list-inline-item">
                                        <p><i class="mdi mdi-checkbox-blank-circle text-primary mr-2"></i>Canada</p> 
                                    </li>
                                    <li class="list-inline-item">
                                        <p><i class="mdi mdi-checkbox-blank-circle text-info mr-2"></i>USA</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p><i class="mdi mdi-checkbox-blank-circle text-greylight mr-2"></i>London</p>    
                                    </li>
                                </ul> 
                                <div id="morris-donut-chart" style="height:345px;"></div>
                            </div>
                        </div>
                    </div>
                </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->