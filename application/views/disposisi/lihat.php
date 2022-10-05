</header>
<!-- End Navigation Bar=============================================================================-->

<!-- ISI ================================================================================================= -->
<div class="wrapper">
    <form action="<?= base_url('disposisi/lihat/') . $surat['id']; ?>" method="POST">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url('disposisi') ?>">Surat Masuk</a></li>
                                <li class="breadcrumb-item active">Lihat Surat</li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <?= form_error('disposisi', '<div class="alert alert-dismissible fade show coy alert-danger display-7" data-dismiss="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button><div class="display-3 m-3 animate__animated animate__bounceIn animate__delay-1s"><i class="mdi mdi-close-octagon"></i></div>', '<p>jika melanjutkan <strong>KIRIM..!!</p></strong></div>'); ?>

            <div class="row">
                <div class="col-sm">
                    <div class="card m-b-15">
                        <h6 class="card-header m-0">File Surat</h6>
                        <div class="card-body">
                            <script>
                                if ("<?= $surat['fileSurat']; ?>" == "") {
                                    document.writeln( /*html*/ `<button type="button" onclick="lapor(<?= $surat['id']; ?>)" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik Laporkan" class="btn btn-block py-3 btn-danger">
                                                                    <h1 class="display-1"><i class="mdi mdi-close-octagon  "></i></h1>
                                                                        <h6>Surat Tidak di Upload oleh petugas</h6>
                                                                        <h4>Laporkan..!!</h4>
                                                                </button>`)
                                } else {
                                    document.writeln( /*html*/ `<button type="button" onclick="lihatFile()" class="btn btn-block btn-danger">
                                                                    <i style="font-size: 120px;" class="py-3 mdi mdi-file-pdf text-center"></i>
                                                                        <p>Lihat Surat</p>
                                                                        <p><strong><?= strtoupper($surat['asalSurat']); ?></strong></p>
                                                                </button>`);
                                }

                                function lihatFile() {
                                    window.open(
                                        '<?= base_url('ZpITfmvwnMrnap5Yfj5lUD6/') . $surat['fileSurat'] ?>',
                                        '_blank' // <- This is what makes it open in a new window.
                                    );
                                }

                                function lapor() {
                                    window.location.href = "<?= base_url('disposisi/lapor/') . $surat['id'] ?>"
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-sm">

                    <div class="card m-b-30">
                        <h6 class="card-header m-0">Disposisi anda</h6>
                        <div class="card-body ">
                            <?= form_error('disposisi', '<small class="text-danger pl-3">', ', jika ingin di <strong>Kirim</strong></small>'); ?>
                            <textarea name="disposisi" placeholder="Ketik untuk diposisi anda.." class="form-control animate__animated fadeIn" id="" cols="30" rows="9"></textarea>
                            <?= form_error('dibaca', '<small class="text-danger pl-3">', ', jika ingin di <strong>Kirim</strong></small>'); ?>
                            <input type="hidden" value="1" name="dibaca">
                            <div class="row">
                                <div class="col">
                                    <a href="" class="btn btn-success btn-block mt-2" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-arrow-down-drop-circle"></i> Pilih</a>
                                </div>
                                <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tindak lanjuti untuk?..</h5>
                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                                            </div>
                                            <div class="modal-body">
                                                <div id="tbl1" class="mb-2">
                                                    <input type="hidden" name="dSatu" value="0">
                                                    <button id="dSatu" name="dSatu" value="0" onclick="yes1()" class="btn-block btn btn-primary">Sekretaris</button>
                                                </div>
                                                <div id="tbl2" class="mb-2">
                                                    <input type="hidden" name="dDua" value="0">
                                                    <button id="dDua" name="dDua" value="0" onclick="yes2()" class="btn-block btn btn-primary">Kabid Pelayanan</button>
                                                </div>
                                                <div id="tbl3" class="mb-2">
                                                    <input type="hidden" name="dTiga" value="0">
                                                    <button id="dTiga" name="dTiga" value="0" onclick="yes3()" class="btn-block btn btn-primary">Kabid Pendataan</button>
                                                </div>
                                                <div id="tbl4" class="mb-2">
                                                    <input type="hidden" name="dEmpat" value="0">
                                                    <button id="dEmpat" name="dEmpat" value="0" onclick="yes4()" class="btn-block btn btn-primary">Kabid Penagihan</button>
                                                </div>
                                                <div id="tbl5" class="mb-2">
                                                    <input type="hidden" name="dLima" value="0">
                                                    <button id="dLima" name="dLima" value="0" onclick="yes5()" class="btn-block btn btn-primary">Kasubbag Umum dan Kepegawaian</button>
                                                </div>
                                                <div id="tbl6" class="mb-2">
                                                    <input type="hidden" name="dEnam" value="0">
                                                    <button id="dEnam" name="dEnam" value="0" onclick="yes6()" class="btn-block btn btn-primary">Kasubbag Keuangan</button>
                                                </div>
                                                <div id="tbl7" class="mb-2">
                                                    <input type="hidden" name="dTujuh" value="0">
                                                    <button id="dTujuh" name="dTujuh" value="0" onclick="yes7()" class="btn-block btn btn-primary">Kasubbag Perencanaan</button>
                                                </div>
                                            </div>
                                            <div class="modal-footer" id="baba">
                                                <button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="syg" class="col">
                                    <div id="hantu" class="">
                                        <a href="<?= base_url('disposisi')?>" class="btn btn-secondary btn-block mt-2"><i class="mdi mdi-undo-variant"></i> KEMBALI</a>
                                    </div>

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

<!-- Button trigger modal -->


<!-- Modal -->

</form>

<script>
    var fuck = [];
    var plp = "<i class='fa fa-spin fa-spinner'></i> loading";

    function okk() {
        if (!fuck.length == 0) {
            document.getElementById('syg').innerHTML = /*html*/ `
            <div id="hantu" class="">
                <button type="submit" id="jahu" onclick="ohy()" class="btn btn-primary btn-block mt-2 animate__animated animate__bounceIn"><i class="mdi mdi-content-save"></i> KIRIM</button>
            </div>
            `;
        } else {
            document.getElementById('syg').innerHTML = /*html*/ `
            <div id="hantu" class="">
                <a href="<?= base_url('disposisi')?>" class="btn btn-secondary btn-block mt-2"><i class="mdi mdi-undo-variant"></i> KEMBALI</a>
            </div>
            `;
            // document.getElementById('hantu').remove()

        }
    }

    function ohy() {
                // document.getElementById('jahu').innerHTML = `<i class='jak fa fa-spin fa-spinner'></i> Lanjut <i class="mdi mdi-arrow-right"></i>`;

                window.setTimeout(function() {
                    $("#jahu").fadeTo(10, 0).slideUp(10, function() {
                        $(this).remove();
                        document.getElementById('hantu').innerHTML = `<button type="submit" disabled class="btn btn-primary btn-block mt-2"><i class='fa fa-spin fa-spinner'></i> KIRIM</button>`
                    });
                }, 1);
            }   
</script>
<script>
    // ! ============= dSatu ===================
    function yes1() {
        document.getElementById('dSatu').remove()
        document.getElementById('tbl1').innerHTML = /*html*/ `<button id="dSatu" name="dSatu" onclick="no1()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Sekretaris</button> <input type="hidden" name="dSatu" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no1() {
        document.getElementById('dSatu').remove()
        document.getElementById('tbl1').innerHTML = /*html*/ `<button id="dSatu" name="dSatu" onclick="yes1()" class="btn-block btn btn-primary">Sekretaris</button><input type="hidden" name="dSatu" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }

    // ! =============== dDua =================
    function yes2() {
        document.getElementById('dDua').remove()
        document.getElementById('tbl2').innerHTML = /*html*/ `<button id="dDua" name="dDua" onclick="no2()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Kabid Pelayanan</button> <input type="hidden" name="dDua" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no2() {
        document.getElementById('dDua').remove()
        document.getElementById('tbl2').innerHTML = /*html*/ `<button id="dDua" name="dDua" onclick="yes2()" class="btn-block btn btn-primary">Kabid Pelayanan</button><input type="hidden" name="dDua" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }

    // ! =============== dTiga =================
    function yes3() {
        document.getElementById('dTiga').remove()
        document.getElementById('tbl3').innerHTML = /*html*/ `<button id="dTiga" name="dTiga" onclick="no3()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Kabid Pendataan</button> <input type="hidden" name="dTiga" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no3() {
        document.getElementById('dTiga').remove()
        document.getElementById('tbl3').innerHTML = /*html*/ `<button id="dTiga" name="dTiga" value onclick="yes3()" class="btn-block btn btn-primary">Kabid Pendataan</button><input type="hidden" name="dTiga" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }

    // ! =============== dEmpat =================
    function yes4() {
        document.getElementById('dEmpat').remove()
        document.getElementById('tbl4').innerHTML = /*html*/ `<button id="dEmpat" name="dEmpat" onclick="no4()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Kabid Penagihan</button> <input type="hidden" name="dEmpat" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no4() {
        document.getElementById('dEmpat').remove()
        document.getElementById('tbl4').innerHTML = /*html*/ `<button id="dEmpat" name="dEmpat" onclick="yes4()" class="btn-block btn btn-primary">Kabid Penagihan</button><input type="hidden" name="dEmpat" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }

    // ! =============== dLima =================
    function yes5() {
        document.getElementById('dLima').remove()
        document.getElementById('tbl5').innerHTML = /*html*/ `<button id="dLima" name="dLima" onclick="no5()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Kasubbag Umum dan Kepegawaian</button> <input type="hidden" name="dLima" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no5() {
        document.getElementById('dLima').remove()
        document.getElementById('tbl5').innerHTML = /*html*/ `<button id="dLima" name="dLima" onclick="yes5()" class="btn-block btn btn-primary">Kasubbag Umum dan Kepegawaian</button><input type="hidden" name="dLima" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }

    // ! =============== dEnam =================
    function yes6() {
        document.getElementById('dEnam').remove()
        document.getElementById('tbl6').innerHTML = /*html*/ `<button id="dEnam" name="dEnam" onclick="no6()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Kasubbag Keuangan</button> <input type="hidden" name="dEnam" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no6() {
        document.getElementById('dEnam').remove()
        document.getElementById('tbl6').innerHTML = /*html*/ `<button id="dEnam" name="dEnam" onclick="yes6()" class="btn-block btn btn-primary">Kasubbag Keuangan</button><input type="hidden" name="dEnam" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }

    // ! =============== dTujuh =================
    function yes7() {
        document.getElementById('dTujuh').remove()
        document.getElementById('tbl7').innerHTML = /*html*/ `<button id="dTujuh" name="dTujuh" onclick="no7()" class="btn-block btn btn-success"><i class="mdi mdi-check-circle"></i>Kasubbag Perencanaan</button> <input type="hidden" name="dTujuh" value="1">`;
        fuck.push(1);
        if (fuck.length > 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-info" data-dismiss="modal">Lanjut <i class="mdi mdi-arrow-right"></i></button>`;
        }
    }

    function no7() {
        document.getElementById('dTujuh').remove()
        document.getElementById('tbl7').innerHTML = /*html*/ `<button id="dTujuh" name="dTujuh" onclick="yes7()" class="btn-block btn btn-primary">Kasubbag Perencanaan</button><input type="hidden" name="dTujuh" value="0">`;
        fuck.pop();
        if (fuck.length == 0) {
            document.getElementById('baba').innerHTML = /*html*/ `<button type="button" id="bubu" onclick="okk()" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-undo-variant"></i> Kembali</button>`;
        }
    }
</script>