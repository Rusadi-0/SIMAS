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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS | Lembar Disposisi</title>
    <style>
        @page {
            margin-left: 6.5%;
            margin-top: 2%;
            margin-bottom: 0%;
        }

        table,
        p {
            text-align: center;
            padding: 0;
            margin: 0;
        }

        table,
        h1 {
            text-align: center;
            padding: 0;
            margin: 0;
        }

        table,
        h3 {
            text-align: center;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <table border="">
        <tr>
            <td rowspan="4">
                <img src="var:myvariable" width="78" />
            </td>
            <td>
                <h3>PEMERINTAH KABUPATEN TABALONG</h3>
            </td>
        </tr>
        <tr>
            <td>
                <h1>BADAN PENDAPATAN DAERAH</h1>
            </td>
        </tr>
        <tr>
            <td style="width:595px;">
                <small style="font-size: 11px;">Jalan Penghulu Rasyid No.6 Telpon (0526)2021166 Tanjung Tabalong Kalimantan Selatan Kode Pos 71513</small>
            </td>
        </tr>
        <tr>
            <td>
                <small style="font-size: 11px;">Website : https://tabalongkab.go.id - Email : bapendatab@gmail.com</small>
            </td>
        </tr>
        <tr>
            <td style="width:1px;border-top: 1px solid black;" colspan="2">
                <h3><u>LEMBAR DISPOSISI</u></h3>
            </td>
        </tr>
    </table>
    <table style="text-align: left; overflow: wrap;" cellspacing="0" border="0">
        <tr>
            <td colspan="1" style="color:white;">m</td>
            <td></td>
            <td width="310px"></td>
            <td></td>
            <td width="140px"></td>
        </tr>
        <tr>
            <td style="text-align: left;">Petugas</td>
            <td>:</td>
            <td style="text-align: left;"><?= $user['name']; ?></td>
            <td style="text-align: left;">Nomor KK</td>
            <td style="text-align: left;">: <?php
                                            $input = $suratMasuk['noAgenda'];
                                            echo str_pad($input, 3, "0", STR_PAD_LEFT);  // produces "0001"
                                            ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: </td>
            <td><?= tanggal_indo(date('Y-m-d', strtotime($suratMasuk['tanggalTerimaSurat']))); ?></td>
            <td>Nomor Agenda</td>
            <td>: <?php
                    $input = $suratMasuk['noAgenda'];
                    echo str_pad($input, 3, "0", STR_PAD_LEFT);  // produces "0001"
                    ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="color: white;">m</td>
        </tr>
        <tr>
            <td>No. Tgl. Surat</td>
            <td>: </td>
            <td colspan="3"><?= $suratMasuk['nomorSurat']; ?></td>
        </tr>
        <tr>
            <td>Dari</td>
            <td>: </td>
            <td colspan="3"><?= $suratMasuk['asalSurat']; ?></td>
        </tr>
        <tr>
            <td valign="top">Prihal</td>
            <td valign="top">: </td>
            <td valign="top" rowspan="2" colspan="5"><?= $suratMasuk['prihalSurat']; ?></td>
        </tr>
        <tr>
            <td colspan="1" style="color: white;">m</td>
        </tr>
        <tr>
            <td style="border: 1px solid black;border-right:none;text-align:center;" colspan="4">Lanjutkan untuk</td>
            <td style="border: 1px solid black;text-align:center;">Tanda Terima</td>
        </tr>
        <tr>
            <td valign="top" style="border-left: 1px solid black;" colspan="4">
                <?php

                $i = 1;
                if ($disposisi['dSatu'] == 1) {
                    echo $i++ . '. Sekretaris<br>';
                }
                if ($disposisi['dDua'] == 1) {
                    echo $i++ . '. Kabid Pelayanan<br>';
                }
                if ($disposisi['dTiga'] == 1) {
                    echo $i++ . '. Kabid Pendataan<br>';
                }
                if ($disposisi['dEmpat'] == 1) {
                    echo $i++ . '. Kabid Penagihan<br>';
                }
                if ($disposisi['dLima'] == 1) {
                    echo $i++ . '. Kasubbid Umum dan Kepegawaian<br>';
                }
                if ($disposisi['dEnam'] == 1) {
                    echo $i++ . '. Kasubbid Keuangan<br>';
                }
                if ($disposisi['dTujuh'] == 1) {
                    echo $i++ . '. Kasubbid Perencanaan<br>';
                }

                ?>
            </td>
            <td style="border: 1px solid black;border-top:none; border-bottom:none;padding-bottom: 110px;"></td>
        </tr>
        <tr>
            <td style="text-align: center;border:1px solid black;border-bottom:none;border-right:none;" colspan="4">Disposisi</td>
            <td style="border-top: 1px solid black;border-right:1px solid black;border-left:1px solid black;text-align:center;">Diarsipka tgl oleh</td>
        </tr>
        <tr>
            <td valign="top" width="10px" colspan="3" style="height: 2cm;border: 1px solid black;border-right:none;">
                <?= $suratMasuk['disposisi']; ?>
            </td>
            <td valign="bottom" style="text-align: center;border-bottom: 1px solid black;border-top: 1px solid black;">
                <pre style="font-family: 'Times New Roman', Times, serif;padding:10px;">
TDD.
KEPALA BADAN
</pre>
            </td>
            <td style="border: 1px solid black; border-left: 1px solid black;"></td>
        </tr>
    </table>

    <!-- ============================== -->
    <br><br><br><br>

    <table border="">
        <tr>
            <td rowspan="4">
                <img src="var:myvariable" width="78" />
            </td>
            <td>
                <h3>PEMERINTAH KABUPATEN TABALONG</h3>
            </td>
        </tr>
        <tr>
            <td>
                <h1>BADAN PENDAPATAN DAERAH</h1>
            </td>
        </tr>
        <tr>
            <td style="width:595px;">
                <small style="font-size: 11px;">Jalan Penghulu Rasyid No.6 Telpon (0526)2021166 Tanjung Tabalong Kalimantan Selatan Kode Pos 71513</small>
            </td>
        </tr>
        <tr>
            <td>
                <small style="font-size: 11px;">Website : https://tabalongkab.go.id - Email : bapendatab@gmail.com</small>
            </td>
        </tr>
        <tr>
            <td style="width:1px;border-top: 1px solid black;" colspan="2">
                <h3><u>LEMBAR DISPOSISI</u></h3>
            </td>
        </tr>
    </table>
    <table style="text-align: left; overflow: wrap;" cellspacing="0" border="0">
        <tr>
            <td colspan="1" style="color:white;">m</td>
            <td></td>
            <td width="310px"></td>
            <td></td>
            <td width="140px"></td>
        </tr>
        <tr>
            <td style="text-align: left;">Petugas</td>
            <td>:</td>
            <td style="text-align: left;"><?= $user['name']; ?></td>
            <td style="text-align: left;">Nomor KK</td>
            <td style="text-align: left;">: <?php
                                            $input = $suratMasuk['noAgenda'];
                                            echo str_pad($input, 3, "0", STR_PAD_LEFT);  // produces "0001"
                                            ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: </td>
            <td><?= tanggal_indo(date('Y-m-d', strtotime($suratMasuk['tanggalTerimaSurat']))); ?></td>
            <td>Nomor Agenda</td>
            <td>: <?php
                    $input = $suratMasuk['noAgenda'];
                    echo str_pad($input, 3, "0", STR_PAD_LEFT);  // produces "0001"
                    ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="color: white;">m</td>
        </tr>
        <tr>
            <td>No. Tgl. Surat</td>
            <td>: </td>
            <td colspan="3"><?= $suratMasuk['nomorSurat']; ?></td>
        </tr>
        <tr>
            <td>Dari</td>
            <td>: </td>
            <td colspan="3"><?= $suratMasuk['asalSurat']; ?></td>
        </tr>
        <tr>
            <td valign="top">Prihal</td>
            <td valign="top">: </td>
            <td valign="top" rowspan="2" colspan="5"><?= $suratMasuk['prihalSurat']; ?></td>
        </tr>
        <tr>
            <td colspan="1" style="color: white;">m</td>
        </tr>
        <tr>
            <td style="border: 1px solid black;border-right:none;text-align:center;" colspan="4">Lanjutkan untuk</td>
            <td style="border: 1px solid black;text-align:center;">Tanda Terima</td>
        </tr>
        <tr>
            <td valign="top" style="border-left: 1px solid black;" colspan="4">
                <?php

                $i = 1;
                if ($disposisi['dSatu'] == 1) {
                    echo $i++ . '. Sekretaris<br>';
                }
                if ($disposisi['dDua'] == 1) {
                    echo $i++ . '. Kabid Pelayanan<br>';
                }
                if ($disposisi['dTiga'] == 1) {
                    echo $i++ . '. Kabid Pendataan<br>';
                }
                if ($disposisi['dEmpat'] == 1) {
                    echo $i++ . '. Kabid Penagihan<br>';
                }
                if ($disposisi['dLima'] == 1) {
                    echo $i++ . '. Kasubbid Umum dan Kepegawaian<br>';
                }
                if ($disposisi['dEnam'] == 1) {
                    echo $i++ . '. Kasubbid Keuangan<br>';
                }
                if ($disposisi['dTujuh'] == 1) {
                    echo $i++ . '. Kasubbid Perencanaan<br>';
                }

                ?>
            </td>
            <td style="border: 1px solid black;border-top:none; border-bottom:none;padding-bottom: 110px;"></td>
        </tr>
        <tr>
            <td style="text-align: center;border:1px solid black;border-bottom:none;border-right:none;" colspan="4">Disposisi</td>
            <td style="border-top: 1px solid black;border-right:1px solid black;border-left:1px solid black;text-align:center;">Diarsipka tgl oleh</td>
        </tr>
        <tr>
            <td valign="top" width="10px" colspan="3" style="height: 2cm;border: 1px solid black;border-right:none;">
                <?= $suratMasuk['disposisi']; ?>
            </td>
            <td valign="bottom" style="text-align: center;border-bottom: 1px solid black;border-top: 1px solid black;">
                <pre style="font-family: 'Times New Roman', Times, serif;padding:10px;">
TDD.
KEPALA BADAN
</pre>
            </td>
            <td style="border: 1px solid black; border-left: 1px solid black;"></td>
        </tr>
    </table>


</body>

</html>