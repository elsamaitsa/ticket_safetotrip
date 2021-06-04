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
				<h3 class="font-weight-bold text-center mb-5">Reset Password</h3>
				<!-- Login Form -->
				<form action="<?= base_url('Login/changePassword') ?>" method="POST">
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
                    <?php endif; ?>
					<div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukan Password Baru" value= "<?= set_value('password1') ?>">
						<i class="fa fa-fw fa-eye field-icon hide-pass toggle-password" toggle="#password1"></i>
						<?php if (!empty(form_error('password1'))) : ?>
                            <small class="error text-danger"><?= form_error('password1') ?></small>
                        <?php endif; ?>
					</div>
					<div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password" value= "<?= set_value('password2') ?>">
						<i class="fa fa-fw fa-eye field-icon hide-pass toggle-password" toggle="#password2"></i>
						<?php if (!empty(form_error('password2'))) : ?>
                            <small class="error text-danger"><?= form_error('password2') ?></small>
                        <?php endif; ?>
					</div>
					<div class="text-center">
						<input type="submit" class="btn btn-sm btn-info btn-custom" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<script>
$(document).ready(function () {
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    // $(".toggle-password2").click(function() {
    //     $(this).toggleClass("fa-eye fa-eye-slash");
    //     var input = $($(this).attr("toggle"));
    //     if (input.attr("type") == "password") {
    //         input.attr("type", "text");
    //     } else {
    //         input.attr("type", "password");
    //     }
    // });
});
</script>
