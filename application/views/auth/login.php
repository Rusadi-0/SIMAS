<?= $this->session->flashdata('message'); ?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('auth'); ?>">
					<span class="login100-form-title p-b-26">
						<h2>SIMAS</h2>
						<p style="font-size: 12px;"><u>Sistem Informasi Manajemen Arsip Surat</u></p>
					</span>
					<br>
					<!-- <span class="login100-form-title p-b-26">
						SIMAS
						<p style="font-size: 15px;"><b>S</b>istem <b>I</b>nformasi <b>M</b>anajemen <b>A</b>genda <b>S</b>urat</p>
					</span> -->
					<!-- <span class="login100-form-title">
						<img width="50px" src="<?= base_url('assets/images/')?>email.png" alt="">
					</span> -->

					<div class="wrap-input100 validate-input" data-validate = "Valid : name@mail.com">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukan password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
							login
							</button>
						</div>
					</div>

					<!-- <div class="text-center p-t-115">
						<span class="txt1">
							Lupa Password? 
						</span>

						<a class="txt2" href="<?= base_url('auth/forgotPassword')?>">
							<u>Reset</u>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>