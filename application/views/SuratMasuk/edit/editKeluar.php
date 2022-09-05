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
                            <li class="breadcrumb-item"><a href="<?= base_url('surat/keluar'); ?>"><?= $title; ?></a></li>
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
                            <input type="hidden" class="form-control mb-3" id="id" value="<?= $suratKeluar['id']; ?>" name="id">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="nomorSurat">nomor Surat</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control mb-3" id="nomorSurat" value="<?= $suratKeluar['nomorSurat']; ?>" name="nomorSurat">
                                    <?= form_error('nomorSurat', '<small style="color: red;"> ', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="tanggalSurat">Tanggal Surat</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control mb-3" id="tanggalSurat" value="<?= $suratKeluar['tanggalSurat']; ?>" name="tanggalSurat">
                                    <?= form_error('tanggalSurat', '<small style="color: red;"> ', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="bidang">Bidang</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control mb-3" id="bidang" value="<?= $suratKeluar['bidang']; ?>" name="bidang">
                                    <?= form_error('bidang', '<small style="color: red;"> ', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="prihalSurat">Prihal Surat</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control mb-3" name="prihalSurat" id="prihalSurat" cols="10" rows="5"><?= $suratKeluar['prihalSurat']; ?></textarea>
                                    <?= form_error('prihalSurat', '<small style="color: red;"> ', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="prihalSurat"></label>
                                </div>
                                
                                <div class="col-sm-9">
                                    <a href="<?= base_url('surat/keluar'); ?>" class="btn btn-outline-secondary"><i class="mdi mdi-undo-variant"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mb-4">
                        <h6 class="card-header m-0">File surat</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <input type="file" id="input-file-now" name="fileSurat" class="dropify" data-height="200" data-default-file="<?= base_url('/surat/') . $suratKeluar['fileSurat']; ?>">
                                    <a id="lihatSurat" target="_blank" class="btn btn-block btn-info mt-4" href="<?= base_url('surat/') . $suratKeluar['fileSurat']; ?>"><i class="mdi mdi-eye"></i> Lihat surat</a>
                                    <script>
                                        if ('' == '<?= $suratKeluar['fileSurat']?>') {
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


