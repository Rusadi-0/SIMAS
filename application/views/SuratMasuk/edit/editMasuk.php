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
                            <li class="breadcrumb-item"><a href="<?= base_url('surat'); ?>">Management Surat</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('surat/masuk'); ?>"><?= $title; ?></a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Management Surat</h4>
                </div>
            </div>
        </div>
        <?php echo form_open_multipart() ?>
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-4">
                    <h6 class="card-header m-0">Edit Agenda</h6>
                    <div class="card-body">
                        <input type="hidden" class="form-control mb-3" id="id" value="<?= $suratMasuk['id']; ?>" name="id">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="nomorSurat">nomor Surat</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mb-3" id="nomorSurat" value="<?= $suratMasuk['nomorSurat']; ?>" name="nomorSurat">
                                <?= form_error('nomorSurat', '<small style="color: red;"> ', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="asalSurat">Asal Surat</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mb-3" id="asalSurat" value="<?= $suratMasuk['asalSurat']; ?>" name="asalSurat">
                                <?= form_error('asalSurat', '<small style="color: red;"> ', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="tanggalTerimaSurat">Tanggal Terima Surat</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" class="form-control mb-3" id="tanggalTerimaSurat" value="<?= $suratMasuk['tanggalTerimaSurat']; ?>" name="tanggalTerimaSurat">
                                <?= form_error('tanggaTerimaSurat', '<small style="color: red;"> ', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="prihalSurat">Prihal Surat</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control mb-3" name="prihalSurat" id="prihalSurat" cols="10" rows="5"><?= $suratMasuk['prihalSurat']; ?></textarea>
                                <?= form_error('prihalSurat', '<small style="color: red;"> ', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="prihalSurat"></label>
                            </div>
                            
                            <div class="col-sm-9">
                                <a href="<?= base_url('SuratMasuk'); ?>" class="btn btn-outline-secondary"><i class="mdi mdi-undo-variant"></i> Kembali</a>
                                <?php

                                if ($suratMasuk['dibaca'] && $suratMasuk['melihat'] == true) {
                                    echo '<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-repeat-once "></i>Kirim Ulang Disposisi</button>';
                                }

                                ?>
                            </div>
                        </div>
                        <input type="hidden" class="form-control mb-3" id="disposisi" value="<?= $suratMasuk['disposisi']; ?>" name="disposisi">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-4">
                    <h6 class="card-header m-0">File surat</h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input type="file" id="input-file-now" name="fileSurat" class="dropify" data-height="200" data-default-file="<?= base_url('/surat/') . $suratMasuk['fileSurat']; ?>">
                                <a id="lihatSurat" target="_blank" class="btn btn-block btn-info mt-4" href="<?= base_url('ZpITfmvwnMrnap5Yfj5lUD6/') . $suratMasuk['noAgenda'] .'/'. $suratMasuk['fileSurat']; ?>"><i class="mdi mdi-eye"></i> Lihat surat</a>
                                <script>
                                    if ('' == '<?= $suratMasuk['fileSurat']?>') {
                                        document.getElementById('lihatSurat').remove();
                                    }
                                </script>
                                <button type="submit" onclick="this.innerHTML=plp" class="btn btn-block btn-primary mt-1"><i class="mdi mdi-content-save"></i> Simpan</button>
                                <script>
                                    var plp = "<i class='fa fa-spin fa-spinner'></i> loading";
                                    
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan..!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin kirim ulang disposisi ke kepala badan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('suratmasuk/ulang_disposisi/') . $suratMasuk['id']?>" class="btn btn-danger">YAKIN</a>
            </div>
        </div>
    </div>
</div>