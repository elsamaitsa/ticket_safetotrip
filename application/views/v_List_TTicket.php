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
						<li class="breadcrumb-item active">Transaksi Ticket</li>
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
					<h4 class="card-title"><i class="fa fa-list-alt mr-1"></i>Transaksi Ticket</h4>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="d-flex mb-4">
						<div class="ml-1">
							<button class="btn btn-block btn-outline-secondary btn-sm" title="Refresh"><i
									class="fa fa-sync-alt"></i></button>
						</div>
						<div class="ml-auto">
							<button type="button" class="btn btn-sm btn-success" data-toggle="modal"
								data-target="#modal-default">
								<i class="fas fa-tags mr-1"></i>Check Ticket
							</button>
						</div>
					</div>
					<table id="example1" class="table table-sm table-striped font-13">
						<thead class="text-center">
							<tr>
								<th>Ticket ID</th>
								<th>Booking No</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php $no = 0 ?>
							<?php foreach ($data_Tticket as $value) : ?>
							<tr>
								<td><?= ++$no ?></td>
								<td><?= $value['tbooking_no'] ?></td>
								<td>
									<?php if ($value['tticket_status'] == 'dipesan') : ?>
									<div class="box-label bg-box-dark">Dipesan</div>
									<?php elseif ($value['tticket_status'] == 'digunakan') : ?>
									<div class="box-label bg-box-blue">Digunakan</div>
									<?php elseif ($value['tticket_status'] == 'refund') : ?>
									<div class="box-label bg-box-green">Refund</div>
									<?php else : ?>
									<div class="box-label bg-box-gray">Hangus</div>
									<?php endif ?>
								</td>
								<td>
									<a class="btn btn-outline-success btn-sm" href="javascript:void(0)"
										onclick="view_modal(<?= $value['tticket_id'] ?>)"><i
											class="fas fa-info-circle"></i></a>
									<a class="btn btn-outline-info btn-sm" data-id="<?= $value['tticket_id'] ?>"
										data-nobook="<?= $value['tbooking_no'] ?>"
										data-stat="<?= $value['tticket_status'] ?>" data-toggle="modal"
										data-target="#EditModal"><i class="fa fa-edit"></i></a>
									<button class="btn btn-outline-danger btn-sm"
										data-href="<?= site_url('T_Ticket/Delete/' . $value['tticket_id']); ?>"
										data-toggle="modal" data-target="#HapusModal" title="Hapus"><i
											class="fa fa-trash"></i></button>
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

<!-- Modal Detail -->
<div class="modal fade" id="DetailModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ico--close"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-sm font-14" cellspacing="0" cellpadding="0" style="border:none">
						<tr>
							<td width="100px">Booking No</td>
							<td id="tbooking_no"></td>
						</tr>
						<tr>
							<td>Date Booking</td>
							<td id="date_booking"></td>
						</tr>
						<td>Date Visited</td>
						<td id="date_visit"></td>
						<tr>
						</tr>
						<tr>
							<td>Status</td>
							<td id="stat">
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Modal Edit -->
<div class="modal fade" id="EditModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title"><i class="fa fa-edit mr-1"></i>Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ico--close"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('T_Ticket/Update'); ?>" method="POST" class="form-modal-to-content">
					<input type="hidden" name="id_Tticket" id="id">
					<div class="form-group">
						<label class="font-14">Booking No</label>
						<input type="text" class="form-control font-13" style="background-color: #fff;" name="nobook"
							id="nobook" placeholder="Booking No" required>
					</div>
					<div class="form-group">
						<label class="font-14">Status</label>
						<select class="form-control font-13" name="status" id="stat" required>
							<option value="digunakan">Digunakan</option>
							<option value="dipesan">Dipesan</option>
							<option value="refund">Refund</option>
							<option value="hangus">Hangus</option>
						</select>
					</div>

					<div class=" modal-footer justify-content-between">
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
				<a class="btn btn-danger btn-ok" style="padding-top: 12px; color:#fff;">Delete</a>
			</div>
		</div>
	</div>
</div>


<!-- Modal Check Ticket -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 80%; margin: auto;">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="text-center">
					<h4 class="font-weight-bold">Checking Ticket</h4>
					<img src="<?=base_url()?>assets/image/scan-data.jpg" style="width:60%;">
					<div classs="form-group">
						<h6 class="text-left font-13">Masukan Nomor Ticket</h6>
						<input type="text" class="form-control font-13" placeholder="Enter Your Ticket Number">
					</div>

				</div>
				<div class="box-note" id="note">
					<div class="row">
						<div class="col-sm-6">
							<h6 class="font-13">ID Ticket</h6>
						</div>
						<div class="col-sm-6">
							<h6 class="font-13"><span class="mr-1">:</span>898989998989</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<h6 class="font-13">User ID</h6>
						</div>
						<div class="col-sm-6">
							<h6 class="font-13"><span class="mr-1">:</span>898989998989</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<h6 class="font-13">Nama Pengunjung</h6>
						</div>
						<div class="col-sm-6">
							<h6 class="font-13"><span class="mr-1">:</span>Nama Visitor</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<h6 class="font-13">Tempat Destinasi</h6>
						</div>
						<div class="col-sm-6">
							<h6 class="font-13"><span class="mr-1">:</span>Labuan Bajo, NTT</h6>
						</div>
					</div>
					<div class="row">''
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-sm btn-success" id="btn-cek"><i
						class="fa fa-check mr-1"></i>Cek</button>
				<button type="button" class="btn btn-sm btn-info" id="btn-cetak"><i
						class="fa fa-print mr-1"></i>Cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
	$(document).ready(function () {
		table = $("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$('#HapusModal').on('show.bs.modal', function (e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});


		$('#EditModal').on('show.bs.modal', function (event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)
			// Isi nilai pada field
			modal.find('#id').attr("value", div.data('id'));
			modal.find('#nobook').attr("value", div.data('nobook'));
			var val = div.data('stat');
			document.querySelector('#stat [value="' + val + '"]').selected = true;
			document.getElementById("nobook").readOnly = true;
		});

		$('#note').hide();
		$('#btn-cetak').hide();
		$('#btn-cek').click(function () {
			$('#btn-cetak').show();
			$('#btn-cek').hide();
			$('#note').show();
		});

		$('#btn-cetak').click(function () {
			$('#btn-cetak').hide();
			$('#btn-cek').show();
		});

	});

	function view_modal(tticket_id) {
		$('#DetailModal').modal('show')
		$.ajax({
			url: "<?= site_url('T_Ticket/Detail/') ?>" + tticket_id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('#tbooking_no').html(data.tbooking_no);
				$('#date_booking').html(data.tbooking_date_booking);
				$('#date_visit').html(data.tbooking_date_visited);
				$('#stat').html(data.tticket_status);
			},
			error: (response) => {
				console.log(response);
			}
		});
	}


	setInterval(function () {
		$.ajax({
			url: "<?= base_url('T_Ticket/CheckTicket') ?>",
			type: "GET",
			success: function () {
				console.log("success");
			},
		});
	}, 60000);

</script>
