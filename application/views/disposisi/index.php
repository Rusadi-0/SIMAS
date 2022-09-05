<?php
function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}


?>

</header>
<!-- End Navigation Bar=============================================================================-->

<!-- ISI ================================================================================================= -->
<div class="wrapper">
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Surat</a></li>
                            <li class="breadcrumb-item active">Hari ini</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card m-b-15">
                    <h6 class="card-header m-0"><i class="mdi mdi-format-list-bulleted"></i> List Surat belum disposisi <strong>
                            <script>
                                const dd1 = [<?php foreach ($suratMasuk as $sm) : ?><?php if ($sm['dibaca'] == 0) : ?><?php if (!$sm['lapor']) : ?><?= "'" . $sm["id"] . "'"; ?>, <?php endif; ?><?php endif; ?><?php endforeach; ?>];
                                const dd2 = dd1.length;
                                if (dd2 > 0) {
                                    document.writeln("(" + dd2 + ")");
                                }
                                // AUTO RELOAD
                                window.setTimeout(function() {
                                    window.location.reload();
                                }, 120000);
                            </script>
                        </strong>
                    </h6>

                    <?php $i = 1; ?>
                    <?php foreach ($suratMasuk as $sm) : ?>
                        <?php if ($sm['dibaca'] == 0) : ?>
                            <?php if (!$sm['lapor']) : ?>
                                <div class="list-group border-left-0 border-top-0 border-right-0">
                                    <a href="<?= base_url('disposisi/lihat/' . $sm['id']); ?>" class="list-group-item list-group-item-action border-left-0 border-top-0 border-right-0 ">
                                        <div class="d-flex w-100 justify-content-between  border-left-0 border-top-0 border-right-0 ">
                                            <h6 style="font-size: 18px;" class="mb-1"><strong><?= strtoupper($sm['asalSurat']); ?></strong><?php if($sm['melihat']){} else{echo ' <i style="color:#5b6be8;" class="mdi mdi-new-box"></i>';}?></h6>
                                            <small>

                                                <?php

                                                $lah = time();
                                                $babi = $sm['waktu'] + 60;

                                                $uu = $lah - $sm['waktu'];

                                                if ($uu < 60) {
                                                    echo 'baru';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 2) {
                                                    echo '1 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 3) {
                                                    echo '2 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 4) {
                                                    echo '3 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 5) {
                                                    echo '4 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 6) {
                                                    echo '5 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 16) {
                                                    echo '15 mnt';
                                                }
                                                // =====================================================================
                                                elseif ($uu < 60 * 31) {
                                                    echo '30 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60) {
                                                    echo '45 mnt';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60 * 2) {
                                                    echo '1 jam';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60 * 3) {
                                                    echo '2 jam';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60 * 5) {
                                                    echo '5 jam';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60 * 10) {
                                                    echo '10 jam';
                                                }
                                                // =====================================================================
                                                elseif ($uu < 60 * 60 * 16) {
                                                    echo '18 jam';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60 * 24) {
                                                    echo '23 jam';
                                                }
                                                // ======================================================================
                                                elseif ($uu < 60 * 60 * 26) {
                                                    echo 'kemaren';
                                                }
                                                // ======================================================================
                                                else {
                                                    echo '' . tanggal_indo(date('Y-m-d', $sm['waktu'])) . '';
                                                }

                                                ?>
                                            </small>
                                        </div>
                                        <p class="mb-1"><?= strtoupper($sm['prihalSurat']); ?></p>
                                        <small><?= tanggal_indo(date('Y-m-j', strtotime($sm['tanggalTerimaSurat']))); ?>.</small>
                                    </a>
                                </div>

                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <script>
                        const ada1 = [<?php foreach ($suratMasuk as $sm) : ?><?php if ($sm['dibaca'] == 0) : ?><?php if (!$sm['lapor']) : ?><?= "'" . $sm["id"] . "'"; ?>, <?php endif; ?><?php endif; ?><?php endforeach; ?>];
                        const ada2 = ada1.length;
                        if (ada2 < 1) {
                            document.writeln(`<h1 class='display-1 text-center'><i class="mdi mdi-email-open-outline "></i></h1><h4 class='text-center mb-4'>Belum ada Surat Masuk..</h4>`)
                        }
                    </script>
                    </table>
                    <!-- <small style="background-color: salmon; " class="pb-5 mt-0 d-flex justify-content-end"><?= tanggal_indo(date('Y-m-d', time())); ?></small> -->
                    <br>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    const byk1 = [<?php foreach ($suratKaban as $sm) : ?><?php if ($sm['melihat'] == 0) : ?><?= "'" . $sm["id"] . "'"; ?>, <?php endif; ?><?php endforeach; ?>];
    const byk2 = byk1.length;
    // document.writeln(byk2);
    if (byk2 == 0) {
        document.getElementById("hapus").remove()
    }
</script>