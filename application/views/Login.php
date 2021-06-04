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
					<?php if (isset($error_message)) : ?>
                        <div class="alert alert-danger alert-dismissible show fade font-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $error_message ?>
                        </div>
                    <?php elseif(isset($sukses)) : ?>
                        <div class="alert alert-success alert-dismissible show fade font-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $sukses ?>
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
					<h6 class="font-10 v-middle">Lupa password ? </h6><a href="#ResetModal" class="font-10 ml-1" data-toggle="modal">Reset
						Password</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ResetModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title"><i class="fa fa-sync-alt mr-1"></i>Reset Modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ico--close"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Login/reset_password') ?>" method="POST" class="form-modal-to-content">
					<div class="form-group">
						<label class="font-15">Email</label>
						<input type="email" class="form-control" name="email"
							placeholder="Masukkan Email Anda" autocomplete="off" required>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-paper-plane mr-1"></i>Send</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /Modal -->
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
