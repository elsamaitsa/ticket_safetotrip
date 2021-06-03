<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>

<body>
	<div class="box-login">
		<div class="row">
			<div class="col-md-6 col-sm-6 text-center">
				<img src="<?=base_url()?>assets/image/3071357.jpg" style="width: 67%;">
				<div class="box-text">
                    <h6 class="font-weight-bold">Halo,</h6>
                    <h6 class="font-12">Selamat Datang di Aplikasi Admin Wisata, Silahkan login sistem sebagai admin sesuai dengan wisata yang anda kelola</h6>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 f-poppins box-2">
				<h3 class="font-weight-bold text-center mb-5">Login</h3>
				<!-- Login Form -->
				<form action="<?= base_url('Login/check_login') ?>" method="POST">
					<?php if ($pesan = $this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade font-12">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $pesan ?>
                    </div>
                <?php endif ?>
					<div class="form-group">
						<label class="label-custom">Username</label>
						<input type="email" id="login" class="form-control input-custom" name="email"
							placeholder="ex : admin@admin.co.id" value="<?= set_value('email') ?>" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label class="label-custom">Password</label>
						<input type="password" id="password" class="form-control input-custom" name="password"
							placeholder="Enter Your Password" value="<?= set_value('password') ?>" required>
						<i class="fa fa-eye hide-pass toggle-password" toggle="#password"></i>
					</div>
					<div class="form-group">
						<?= $captcha ?>
					</div>
					<div class="text-center">
						<input type="submit" class="btn btn-sm btn-info btn-custom" value="Log In">
					</div>
				</form>
				<div class="text-center d-flex mt-5 jc-center">
					<h6 class="font-10 v-middle">Lupa password ? </h6><a href="modal_lupa" class="font-10 ml-1">Reset
						Password</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function () {
		$(".toggle-password").click(function () {

			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	});

</script>

</html>
