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
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Management Surat</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-3">
                    <h6 class="card-header m-0">Daftar Surat Keluar</h6>
                    <div class="card-body">
                        <table id="myUse" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bidang</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($suratKeluar as $sk) : ?>
                                    <tr data-toggle="modal" data-target="#exampleModal<?= $sk['id'] ?>">
                                        <th scope="row"><?= str_pad($sk['noAgenda'], 3, "0", STR_PAD_LEFT); ?></th>
                                        <td><?= strtoupper($sk['bidang']); ?><p style="opacity: 0;position: fixed;"><?= $sk['prihalSurat'] ?></p>
                                        </td>
                                        <td><?= tanggal_indo(date('Y-m-j', strtotime($sk['tanggalSurat']))); ?></td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $sk['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <style>
                                                        pre {
                                                            font-size: 110%;
                                                        }
                                                    </style>
                                                    <?php

                                                    echo '
<pre class="pb-3">
Nomor Agenda    : <strong>' . str_pad($sk['noAgenda'], 3, "0", STR_PAD_LEFT) . '</strong>
Nomor Surat     : <strong>' . strtoupper($sk['nomorSurat']) . '</strong>
Tanggal Surat   : <strong>' . tanggal_indo(date('Y-m-j', strtotime($sk['tanggalSurat']))) . '</strong>
Bidang Surat    : <strong>' . strtoupper($sk['bidang']) . '</strong>
Prihal Surat    : <strong>' . strtoupper($sk['prihalSurat']) . '</strong>
</pre>';











                                                    ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php if (!$sk['fileSurat'] == '') {
                                                        echo '<a target="_blank" href="' . base_url('ZpITfmvwnMrnap5Yfj5lUD6/' . $sk['fileSurat']) . '" type="button" class="btn btn-primary">Lihat Surat</a>';
                                                    } ?>

                                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" onclick="edit(<?= $sk['id']; ?>)" class="btn btn-success"><i class="mdi mdi-lead-pencil"></i></button>
                                                    <button type="button" <?php if ($sk['noAgenda'] == $total_asset) {
                                                                            } else {
                                                                                echo 'disabled';
                                                                            } ?> data-toggle="tooltip" data-placement="right" title="" data-original-title="Hapus" onclick="hapus(<?= $sk['id']; ?>)" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></button>
                                                    <script>
                                                        function edit(x) {
                                                            window.location.href = "<?= base_url('SuratKeluar/keluarEdit/') ?>" + x;
                                                        }

                                                        function hapus(x) {
                                                            var yakin = confirm('Yakin ingin hapus surat keluar nomor agenda "<?= str_pad($sk['noAgenda'], 3, "0", STR_PAD_LEFT); ?>" ??');
                                                            if (yakin) {
                                                                window.location = "<?= base_url('SuratKeluar/keluarHapus/'); ?>" + x;
                                                            }
                                                        };
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-5">
                    <h6 class="card-header m-0">Rekam Surat Keluar</h6>
                    <div class="card-body">
                        <?php echo form_open_multipart() ?>
                        <input type="hidden" name="noAgenda" value="<?= $total_asset ?>">
                        <label for="">Nomor Surat</label>
                        <input required placeholder="B-<?= str_pad($total_asset + 1, 3, "0", STR_PAD_LEFT); ?>/<?= $instansi['namaSingkat']; ?>/___/___/<?= date("m", time()); ?>/<?= date("Y", time()); ?>" name="nomorSurat" type="text" id="ff" onkeyup="kapital()" class="form-control mb-3" value="B-<?= str_pad($total_asset + 1, 3, "0", STR_PAD_LEFT); ?>/<?= $instansi['namaSingkat']; ?>/___/___/<?= date("m", time()); ?>/<?= date("Y", time()); ?>">
                        <?= form_error('nomorSurat', '<small style="color: red;"> ', '</small>'); ?>
                        <label for="">Tanggal Surat</label>
                        <input type="date" name="tanggalSurat" onkeyup="yus(this)" class="form-control mb-3" value="<?= date("Y-m-d", time()); ?>">
                        <input type="hidden" name="tgl" value="<?= date("Y-m-d", time()); ?>">
                        <div class="row">
                            <?= form_error('tanggalSurat', '<small style="color: red;"> ', '</small>'); ?>
                            <div class="col">
                                <div class="form-grup">
                                    <label for="">Bidang</label>
                                    <select required onchange="changeFunc(this.options[this.selectedIndex].text)" name="bidang" class="custom-select custom-select mb-3">
                                        <option value="" selected>/___/</option>
                                        <?php foreach ($bidang as $b) : ?>
                                            <option value="<?= $b['namaBidang']; ?>"><?= $b['bidang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('bidang', '<small style="color: red;"> ', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <label for="m">Kode Surat</label>
                                <div class="input-group mb-3">
                                    <input type="number" id="goblok" oninput="imput()" required class="form-control" placeholder="/___/" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append" id="lanji">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prihal">Prihal</label>
                            <textarea name="prihalSurat" class="form-control" placeholder="masukan prihal" id="prihal" rows="3"></textarea>
                            <?= form_error('prihalSurat', '<small style="color: red;"> ', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Surat</label>
                            <input type="file" id="input-file-now" name="fileSurat" class="dropify">
                            <p><small>Format file : PDF, max : 1 Mb</small></p>
                        </div>
                        <div id="jahh">
                            <button type="submit" id="jah" onclick="oh()" class="btn btn-primary mt-2" class="btn btn-primary mt-2"><i class="mdi mdi-content-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary mt-2">Reset</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    const k = {};
    k.bidang = '___';
    k.nmr = '___';

    var kucing = '<?= date("m", time()); ?>/<?= date("Y", time()); ?>'

    function yus(field) {
        kucing = field.value
    }


    function kapital() {
        var x = document.getElementById("ff");
        x.value = x.value.toUpperCase();
    }

    function imput() {
        k.nmr = document.getElementById('goblok').value;
        document.getElementById('ff').value = `B-<?= str_pad($total_asset + 1, 3, "0", STR_PAD_LEFT); ?>/<?= $instansi['namaSingkat']; ?>/${k.bidang}/${k.nmr}/<?= date("m", time()); ?>/<?= date("Y", time()); ?>`;
    }

    function changeFunc(x) {
        k.bidang = x;
        document.getElementById('ff').value = /*html*/ `B-<?= str_pad($total_asset + 1, 3, "0", STR_PAD_LEFT); ?>/<?= $instansi['namaSingkat']; ?>/${k.bidang}/${k.nmr}/<?= date("m", time()); ?>/<?= date("Y", time()); ?>`;

    }
</script>