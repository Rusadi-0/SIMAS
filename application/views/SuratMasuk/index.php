</header>
<!-- End Navigation Bar=============================================================================-->

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
<!-- ISI ================================================================================================= -->
<div class="wrapper">
	<div class="container-fluid">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-box">
					<div class="btn-group pull-right">
						<ol class="breadcrumb hide-phone p-0 m-0">
							<li class="breadcrumb-item"><a href="">Management Surat</a></li>
							<li class="breadcrumb-item active"><?= $title; ?></li>
						</ol>
					</div>
					<h4 class="page-title"><?= $title; ?></h4>
				</div>
			</div>
		</div>
		<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="col-md-8">
				<div class="card mb-4">
					<h6 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Daftar Surat Masuk</h6>
					<div class="card-body">
						<table id="myUse" class="table">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th style="padding-right: 70px;" scope="col">Asal<small style="opacity:0;">Asal_Surat_Masuk</small></th>
									<th scope="col">Nomor</th>
									<th scope="col">Tanggal Terima</th>
									<!-- <th scope="col">Prihal</th> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach ($suratMasuk as $sk) : ?>
									<tr class="<?php
												if ($sk['dibaca']) {
													echo "dibaca";
												} elseif ($sk['melihat']) {
													echo "melihat";
												} elseif ($sk['lapor']) {
													echo "lapor";
												} else {
													echo "kosong";
												}

												?>">
										<th scope="row"><?= str_pad($sk['noAgenda'], 3, "0", STR_PAD_LEFT); ?></th>
										<td <?php if (!$sk['lapor']) {
												echo 'data-toggle="modal" data-target="#modal';
											} ?><?= $sk["id"]; ?>">
											<?php

											if (!$sk['lapor']) {
												echo strtoupper($sk['asalSurat']);
												if ($sk['melihat'] == 0 && $sk['dibaca'] == 0) {
													echo '<small style="color:blue;"> (new)</small>';
												}
											} else {
												echo '<a href="' . base_url('SuratMasuk/laporEdit/') . $sk['id'] . '"><strong data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Perlu UPLOAD SURAT">SURAT GAGAL..!!</strong></a>';
											}
											?>
											<?php
											if ($sk['dibaca'] && $sk['baruDisposisi'] == 0) {
												echo '<i data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sudah DISPOSISI" style="color: green;" class="mdi mdi-check-circle"><small>Disposisi baru</small></i>';
											}

											if ($sk['dibaca']) {
											} elseif ($sk['melihat']) {

												echo ' <i data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Belom DISPOSISI" style="color: red;"class="fa fa-exclamation-circle "><small>Dibaca saja</small></i>';
											}
											?></td>
										<td <?php if (!$sk['lapor']) {
												echo 'data-toggle="modal" data-target="#modal';
											} ?><?= $sk["id"]; ?>"><?php

																	if (!$sk['lapor']) {
																		echo strtoupper($sk['nomorSurat']);
																	} else {
																		echo '<strong>SURAT PERLU DI UPLOAD..!!</strong>';
																	}


																	?></td>
										<td <?php if (!$sk['lapor']) {
												echo 'data-toggle="modal" data-target="#modal';
											} ?><?= $sk["id"]; ?>">
											<?= tanggal_indo(date('Y-m-j', strtotime($sk['tanggalTerimaSurat']))); ?>
										</td>
										<div class="modal fade" id="modal<?= $sk["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div <?php if (!$sk['lapor']) {
															} else {
																echo 'style="background-color: rgb(236, 83, 108);color:white;"';
															} ?> class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">
															<?php
															if (!$sk['lapor']) {
																echo 'Detail Surat';
																if ($sk['melihat'] == 0 && $sk['dibaca'] == 0) {
																	echo '<small style="color:blue;"> (new)</small>';
																}
																if ($sk['dibaca']) {
																} elseif ($sk['melihat']) {

																	echo ' <i style="color: red;"class="fa fa-exclamation-circle "><small style="color: red;">Dibaca saja</small></i>';
																}
																if ($sk['dibaca'] && $sk['baruDisposisi'] == 0) {
																	echo ' <i style="color: green;" class="mdi mdi-check-circle"><small style="color: green;">Disposisi</small></i>';
																}
															} else {
																echo 'Peringatan..!!';
															}
															?>
														</h5>
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

														if (!$sk['lapor']) {
															echo '<pre class="pb-3">
Nomor Agenda    : <strong>' . str_pad($sk['noAgenda'], 3, "0", STR_PAD_LEFT) . '</strong>
Nomor Surat     : <strong>' . strtoupper($sk['nomorSurat']) . '</strong>
Asal Surat      : <strong>' . strtoupper($sk['asalSurat']) . '</strong>
Tanggal Terima  : <strong>' . tanggal_indo(date('Y-m-j', strtotime($sk['tanggalTerimaSurat']))) . '</strong>
Prihal Surat    : <strong>' . strtoupper($sk['prihalSurat']) . '</strong>
</pre>';
														} else {
															echo '<h4>Surat Perlu di UPLOAD..!!</h4>';
														}
														?>
													</div>
													<div class="modal-footer">
														<?php
														if ($sk['dibaca'] == 1) {
															echo '<a target="_blank" href="' . base_url('SuratMasuk/lembar/') . $sk['id'] . '%5FNomor%5FAgenda%3D' . str_pad($sk['noAgenda'], 3, "0", STR_PAD_LEFT) . '" class="btn btn-primary"><i class="mdi mdi-checkbox-multiple-marked"></i> Disposisi</a>';
														}

														if (!$sk['fileSurat'] == NULL) {
															echo '<a target="_blank" href="' . base_url('./ZpITfmvwnMrnap5Yfj5lUD6/'). $sk['fileSurat'] . '" class="btn btn-info"><i class="mdi mdi-eye"></i> Lihat Surat</a>';
														}

														?>
														<a href="<?php if (!$sk['lapor']) {
																		echo base_url('SuratMasuk/masukEdit/') . $sk['id'];
																	} else {
																		echo base_url('SuratMasuk/laporEdit/') . $sk['id'];
																	} ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" class="btn btn-success"><i class="mdi mdi-lead-pencil"></i></a>
														<script>
															if (!<?= $sk['lapor'] ?> && !<?= $sk['dibaca'] ?>) {
																document.writeln( /*html*/ `<button onclick="hapus<?= $sk['id']; ?>()" data-toggle="tooltip" data-placement="right" title="" data-original-title="Hapus" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></button>`);
															}

															function hapus<?= $sk['id']; ?>() {
																var yakin = confirm('Yakin ingin hapus surat dari "<?= $sk['asalSurat']; ?>" ??');
																if (yakin) {
																	window.location = "<?= base_url('SuratMasuk/masukHapus/') . $sk['noAgenda']; ?>";
																}
															};
														</script>
													</div>
												</div>
											</div>
										</div>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4"><a href=""></a>
				<div class="card mb-4">
					<h6 class="card-header mt-0"><i class="mdi mdi-email"></i> Rekam Surat Baru Masuk</h6>
					<div class="card-body">
						<?php echo form_open_multipart() ?>
						<input id="myText" type="hidden" name="noAgenda" value="">
						<input type="hidden" name="namaFolder" value="<?php if($bykSrt == 0){echo "1";}else{foreach($namaFolder as $nf){echo $nf;}}?>">


						<script>
							const ada1 = [<?php foreach ($suratMasuk as $sm) : ?><?= "'" . $sm["id"] . "'"; ?>, <?php endforeach; ?>];
							const ada2 = ada1.length;
							if (!ada2 == 0) {
								document.getElementById("myText").value = `<?= $surat['noAgenda'] ?>`;

							}
						</script>
						<?= form_error('nomorSurat', '<small style="color: red;"> ', '</small>'); ?>
						<input type="text" name="nomorSurat" class="form-control mb-2" placeholder="Nomor Surat..">
						<?= form_error('asalSurat', '<small style="color: red;"> ', '</small>'); ?>
						<input type="text" name="asalSurat" class="form-control mb-2" placeholder="Asal Surat..">
						<?= form_error('tanggaTerimaSurat', '<small style="color: red;"> ', '</small>'); ?>
						<input type="date" name="tanggalTerimaSurat" class="form-control mb-2" value="<?= date("Y-m-d", time()); ?>">
						<input type="hidden" name="tgl" class="form-control mb-2" value="<?= date("Y-m-d", time()); ?>">
						<?= form_error('prihalSurat', '<small style="color: red;"> ', '</small>'); ?>
						<textarea class="form-control mb-2" name="prihalSurat" id="" cols="20" rows="4" placeholder="Prihal Surat.."></textarea>
						<?= $this->session->flashdata('tidak'); ?>
						<input type="file" id="input-file-now" name="fileSurat" class="dropify">
						<input type="hidden" value="0" name="disposisi">
						<p><small>Format file : PDF, max : 1 Mb</small></p>
						<!-- <button type="submit" onclick="this.innerHTML=plp" class="btn btn-primary mt-2" class="btn btn-primary mt-2">Simpan</button> -->
						<div id="jahh">
							<button type="submit" id="jah" onclick="oh()" class="btn btn-primary mt-2" class="btn btn-primary mt-2"><i class="mdi mdi-content-save"></i> Simpan</button>
							<button type="reset" class="btn btn-secondary mt-2">Reset</button>
						</div>
						<?php echo form_close() ?>
						<!-- <script>
                            var plp = "<i class='fa fa-spin fa-spinner'></i> loading";
                        </script> -->
					</div>
				</div>
			</div>
		</div>




	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->