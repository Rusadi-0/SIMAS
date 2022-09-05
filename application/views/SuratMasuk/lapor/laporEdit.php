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
                                <a href="<?= base_url('surat/masuk'); ?>" class="btn btn-outline-secondary"><i class="mdi mdi-undo-variant"></i> Kembali</a>
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
                                <small style="color: red;">Wajib, MAX 1MB</small>
                                <?= form_error('fileSurat', '<small style="color: red;"> ', '</small>'); ?>
                                <input autofocus required type="file" id="input-file-now" name="fileSurat" class="dropify" data-height="200" data-default-file="<?= base_url('/surat/') . $suratMasuk['fileSurat']; ?>">
                                <small>Upload format </small>PDF / JPG / PNG
                                <div id="jahpp">
                                    <button type="submit" onclick="ohp()" id="jahp" class="btn btn-block btn-primary mt-1"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                                <script>
                                    function ohp() {
                                        document.getElementById('jahp').innerHTML = `<i class='jak fa fa-spin fa-spinner'></i> Simpan`;

                                        window.setTimeout(function() {
                                            $("#jahp").fadeTo(10, 0).slideUp(10, function() {
                                                $(this).remove();
                                                // document.getElementById('jah').innerHTML = `<i class="mdi mdi-content-save"></i> Simpan`
                                                document.getElementById('jahpp').innerHTML = `<button type="submit" onclick="ohp()" disabled id="jahp" class="btn btn-block btn-primary mt-1"><i class="fa fa-spin fa-spinner"></i> Simpan</button>`
                                            });
                                        }, 1);
                                        window.setTimeout(function() {
                                            $("#jahp").fadeTo(10, 0).slideUp(10, function() {
                                                $(this).remove();
                                                document.getElementById('jahpp').innerHTML = `<button type="submit" onclick="ohp()" id="jahp" class="btn btn-block btn-primary mt-1"><i class="mdi mdi-content-save"></i> Simpan</button>`;
                                            });
                                        }, 5000);
                                    }
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