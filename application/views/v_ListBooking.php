<!-- Content Wrapper. Contains page content -->
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
					<h4 class="card-title"><i class="fa fa-list-alt mr-1"></i>Booking</h4>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="d-flex mb-4">
						<div>
							<a href="<?= base_url('Booking/create') ?>" class="btn btn-block btn-outline-info btn-sm"><i class="fa fa-plus mr-1"></i>Tambah</a>
						</div>
						<div class="ml-1">
							<button class="btn btn-block btn-outline-secondary btn-sm" title="Refresh"><i
									class="fa fa-sync-alt"></i></button>
						</div>
					</div>
					<table id="example1" class="table table-sm table-striped font-13">
						<thead class="text-center">
							<tr>
								<th>No Booking</th>
								<th>Tanggal Booking</th>
								<th>Tanggal Visit</th>
								<th>Jumlah</th>
								<th>Total Biaya</th>
								<th>Nama User</th>
								<th>Nama Pengunjung</th>
								<th>Ticket ID</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php foreach($booking as $value) : ?>
								<tr>
									<td><?= $value['tbooking_no'] ?></td>
									<td><?= date('d/m/Y', strtotime($value['tbooking_date_booking'])) ?></td>
									<td><?= date('d/m/Y', strtotime($value['tbooking_date_visited'])) ?></td>
									<td><?= $value['tbooking_jumlah'] ?></td>
									<td>Rp. <?= number_format($value['tbooking_total'],0,',',',') ?></td>
									<td><?= $value['name'] ?></td>
									<td><?= $value['rvisitors_nama'] ?></td>
									<td><?= $value['rticket_id'] ?></td>
									<td>
										<button class="btn btn-outline-info btn-sm" href="javascript:void(0)" onclick="edit_modal(<?= $value['tbooking_id'] ?>)"><i class="fa fa-edit"></i></button>
										<button class="btn btn-outline-danger btn-sm" data-toggle="modal"
											data-target="#HapusModal" title="Hapus"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<!-- Modal Edit -->
<div class="modal fade" id="EditModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title"><i class="fa fa-edit mr-1"></i>Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ico--close"></i></span>
				</button>
			</div>
			<div class="modal-body">
            	<form action="" method="POST" class="form-modal-to-content" id="editData">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">No Booking</label>
								<input type="text" class="form-control font-13" placeholder="No. Booking" id="no_booking" readonly>
							</div>
						</div>
						<div class="col-sm-8 col-md-8">
							<div class="form-group">
								<label class="font-14">Tempat Wisata</label>
								<input type="text" class="form-control font-13 title" id="rticket_id" required>
								<input type="hidden" id="id_ticket" name="rticket_id" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">Nama Pengunjung</label>
								<input type="text" class="form-control font-13" name="rvisitors_nama" id="rvisitors_nama" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">No Hp Pengunjung</label>
								<input type="text" class="form-control font-13 angka" name="rvisitors_nohp" maxlength="15" id="rvisitors_nohp" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">Email Pengunjung</label>
								<input type="text" class="form-control font-13" name="rvisitors_email" id="rvisitors_email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">Harga Ticket</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp.</span>
									</div>
									<input type="text" class="form-control font-13 angka" name="tbooking_total" id="total" readonly>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">Nama User</label>
								<input type="text" class="form-control font-13 nama_user" id="nama_user" required>
								<input type="hidden" id="id_user" name="userId">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
                        <div class="form-group">
								<label class="font-14">Tanggal Visit</label>
								<div class="input-group date" id="visitdate" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input font-13"
										data-target="#visitdate" name="tbooking_date_visited" id="date_visited" required/>
									<div class="input-group-append" data-target="#visitdate"
										data-toggle="datetimepicker">
										<div class="input-group-text font-13"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i>Simpan</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div id="HapusModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="fas fa-times" style="margin-left: 20px;">&#xE5CD;</i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a href="<?= base_url('Booking/destroy/' . $value['tbooking_id']) ?>" class="btn btn-danger"
					style="padding-top: 12px; color:#fff;">Delete</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		table = $("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$('#visitdate').datetimepicker({
			format: 'YYYY-MM-DD',
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

		$('.angka').on("keypress keyup blur", function (event) {
			$(this).val($(this).val().replace(/[^\d].+/, ""));
			if ((event.which < 48 || event.which > 57)) {
				event.preventDefault();
			}
		});
	});

	function edit_modal(tbooking_id) {
		$('#EditModal').modal('show')
		$.ajax({
			url: "<?= base_url('Booking/edit/') ?>" + tbooking_id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('#nama_user').val(data.name);
				$('#id_user').val(data.sysuser_id);
				$('#id_ticket').val(data.rticket_id);
				$('#no_booking').val(data.tbooking_no);
				$('#rvisitors_nama').val(data.rvisitors_nama);
				$('#rvisitors_nohp').val(data.rvisitors_nohp);
				$('#rvisitors_email').val(data.rvisitors_email);
				$('#total').val(data.tbooking_total);
				$('#date_visited').val(data.tbooking_date_visited);
				$('#rticket_id').val(data.rticket_id + " - " + data.mdestinasi_nama + " - " + data.rvarianticket_nama + " - " + data.rmoment_name);
				$('#editData').attr('action', "<?= base_url('Booking/update/') ?>" + data.tbooking_id);
			},
			error: function (data) {
				console.log(data);
			},
		});

		$('#rticket_id').on('change', function () {
			var id_ticket = document.getElementById('id_ticket').value;
			if(id_ticket){
				$.ajax({
					url: "<?= base_url('Booking/totalBiaya/') ?>" + id_ticket,
					type: "GET",
					dataType: "JSON",
					success: function (data) {
						var total = data.rticket_harga * 1;
						$('#total').val(total);
					},
					error: function (data) {
						console.log(data);
					}
				});
			}
		});
	}
</script>