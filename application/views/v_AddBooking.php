<!-- Content Wrapper. Contains page content -->
<!-- <style>
	.ui-autocomplete {
		z-index: 2147483647;
		display: inline-block;
		min-height: 100%;
		max-height: 200px;
		padding: 10px 20px;
		outline: none;
		color: #74646e;
		border: 1px solid #C8BFC4;
		border-radius: 4px;
		box-shadow: inset 1px 1px 2px #ddd8dc;
		background: #fff;
		overflow-y: scroll;
		list-style-type: none;
	}

</style> -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<!-- <h1 class="m-0 text-dark">Type Ticket</h1> -->
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Ticketing</a></li>
						<li class="breadcrumb-item active">Booking</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="card card-primary">
				<div class="card-header header-cust">
					<h4 class="card-title">Add Booking</h4>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action="<?= base_url('Booking/create') ?>" method="POST">
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label class="font-14">Tempat Wisata</label>
									<input type="text" class="form-control font-13 title" id="rticket_id"
										placeholder="Ticket" required>
									<input type="text" id="id_ticket" name="rticket_id" hidden>
								</div>
							</div>
							<div class="col-sm-3 col-md-3">
								<div class="form-group">
									<label class="font-14">Jumlah Ticket</label>
									<!-- <input type="text" name="tbooking_jumlah" class="form-control font-13 angka"
										id="jumlah" autocomplete="off" required> -->
									<input tjumlah" name="tbooking_jumlah" min="1" max="32" class="form-control font-13 angka"
										id="jumlah" autocomplete="off" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Jumlah" required tabindex="6">
								</div>
							</div>
							<div class="col-sm-3 col-md-3">
								<div class="form-group">
									<label class="font-14">Total Biaya</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="text" class="form-control font-13 angka" name="tbooking_total"
											id="total" readonly>
									</div>
								</div>
							</div>
						</div>
						<div id="container"></div>
						<!-- <div class="form-group">
							<label class="font-14">No Booking</label>
							<input type="text" name="tbooking_no" id="no_booking" class="form-control font-13"
								value="<?= set_value('tbooking_no') ?>" autocomplete="off">
						</div> -->
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label class="font-14">Nama User</label>
									<input type="text" class="form-control font-13 nama_user" id="nama_user" required>
									<input type="hidden" id="id_user" name="userId">
								</div>
							</div>
							<div class="col-sm-3 col-md-3">
								<div class="form-group">
									<label class="font-14">Tanggal Booking</label>
									<div class="input-group date" id="bookingdate" data-target-input="nearest">
										<input type="text" name="tbooking_date_booking"
											class="form-control datetimepicker-input font-13" data-target="#bookingdate"
											required autocomplete="off" />
										<div class="input-group-append" data-target="#bookingdate"
											data-toggle="datetimepicker">
											<div class="input-group-text font-13"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-3">
								<div class="form-group">
									<label class="font-14">Tanggal Visit</label>
									<div class="input-group date" id="visitdate" data-target-input="nearest">
										<input type="text" name="tbooking_date_visited"
											class="form-control datetimepicker-input font-13" data-target="#visitdate" required autocomplete="off" />
										<div class="input-group-append" data-target="#visitdate"
											data-toggle="datetimepicker">
											<div class="input-group-text font-13"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<a href="<?= base_url('Booking') ?>" class="btn btn-sm btn-default">Close</a>
							<button type="submit" class="btn btn-sm btn-info float-right"><i
									class="fa fa-save mr-1"></i>Simpan</button>
						</div>
					</form>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<script>
	$(document).ready(function () {
		$.ajax({
			url: "<?= base_url('Booking/create_id/') ?>",
		});
		$('#jumlah').on('change keyup', function () {
			let inputs = '';
			let value = parseInt($(this).val());
			for (let i = 1; i <= value; i++) {
				// inputs += '<input autocomlete="off" type="text" id="server_name${i+1}" value="' + i +
				// 	'" name="server_name${i+1}" maxlength="8" tabindex="${i+6+1}" required /></br>';
				// let id="203032032";
								
				inputs +=  '<div class="row mb-3">' +
			'<div class="col-sm-3 col-md-3"><input type="text" class="form-control font-13" name="tbooking_no[input][]" value="20210521'+i+'" placeholder="No. Booking"></div>' +
			'<div class="col-sm-3 col-md-3"><input type="text" class="form-control font-13" name="visitors_id[input][]" value="VST001'+ i + '"><input type="text" class="form-control font-13" name="visitors_nama[input][]" placeholder="Nama Pengunjung" required></div>' +
			'<div class="col-sm-3 col-md-3"><input type="text" class="form-control font-13" name="visitors_nohp[input][]" placeholder="Nomor HP" required ></div>' +
			'<div class="col-sm-3 col-md-3"><input type="email" class="form-control font-13" name="visitors_email[input][]" placeholder="Email (ex: ex@wisata.com)" required ></div>' +
			'</div>';
			}
			$('#container').html(inputs);
		});


		$('#bookingdate').datetimepicker({
			defaultDate: new Date(),
			format: 'YYYY-MM-DD',
		})
		$('#visitdate').datetimepicker({
			format: 'YYYY-MM-DD',
		});

		$('.angka').on("keypress keyup blur", function (event) {
			$(this).val($(this).val().replace(/[^\d].+/, ""));
			if ((event.which < 48 || event.which > 57)) {
				event.preventDefault();
			}
		});

		$('.title').autocomplete({
			source: "<?php echo site_url('Booking/get_autocomplete/?');?>",
			select: function (event, ui) {
				$('#title').val(ui.item.label);
				$('#id_ticket').val(ui.item.rticket_id);
			},

			search: function (event, ui) {
				$(this).addClass('loader');
			},

			response: function (event, ui) {
				if (ui.content.length === 0) {
					console.log('No result loaded!');
				} else {
					console.log('success!');
				}

				$(this).removeClass('loader');
			}
		});

		// autocomplete nama
		$('#nama_user').autocomplete({
 			source: "<?php echo site_url('Booking/get_autocomplete_nama');?>",
 			select: function (event, ui) {
 				$('[name="nama_user"]').val(ui.item.label);
 				$('[name="userId"]').val(ui.item.userId);
 			},

 			search: function (event, ui) {
 				$(this).addClass('loader');
 			},

 			response: function (event, ui) {
 				if (ui.content.length === 0) {
 					console.log('No result loaded!');
 				} else {
 					console.log('success!');
 				}

 				$(this).removeClass('loader');
 			}
 		});

		$("#jumlah, #rticket_id").on('change keyup', function () {
			var id_ticket = document.getElementById('id_ticket').value;
			var jumlah = document.getElementById('jumlah').value;

			if (id_ticket && jumlah) {
				$.ajax({
					url: "<?= base_url('Booking/totalBiaya/') ?>" + id_ticket,
					type: "GET",
					dataType: "JSON",
					success: (response) => {
						var total = jumlah * (response.rticket_harga);
						$('#total').val(total);

					},
					error: (response) => {
						console.log(response);
					}
				});
			}
		});
	});

</script>
