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
										<a href="javascript:void(0)" onclick="view_modal(<?= $value['tbooking_id'] ?>)"class="btn btn-outline-info btn-sm"><i
												class="fa fa-edit"></i></a>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title"><i class="fa fa-edit mr-1"></i>Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ico--close"></i></span>
				</button>
			</div>
			<div class="modal-body">
            <form action="" method="POST" class="form-modal-to-content">
					<!-- <div class="form-group">
						<label class="font-14">Booking ID</label>
						<input type="text" class="form-control font-13" placeholder="ID Group">
					</div> -->
                    <div class="form-group">
						<label class="font-14">No Booking</label>
						<input type="text" class="form-control font-13" placeholder="No. Booking">
					</div>
                    <div class="form-group">
						<label class="font-14">Nama User</label>
						<input type="text" class="form-control font-13" placeholder="Ketikkan Nama User">
					</div>
                    <div class="form-group">
						<label class="font-14">Tiket Wisata</label>
						<input type="text" class="form-control font-13" placeholder="Ticket">
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="font-14">Tanggal Booking</label>
								<div class="input-group date" id="bookingdate" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input font-13"
										data-target="#bookingdate" />
									<div class="input-group-append" data-target="#bookingdate"
										data-toggle="datetimepicker">
										<div class="input-group-text font-13"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
                        <div class="form-group">
								<label class="font-14">Tanggal Visit</label>
								<div class="input-group date" id="visitdate" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input font-13"
										data-target="#visitdate" />
									<div class="input-group-append" data-target="#visitdate"
										data-toggle="datetimepicker">
										<div class="input-group-text font-13"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-14">Jumlah Ticket</label>
								<input type="text" class="form-control font-13" placeholder="Jumlah Ticket">
							</div>
						</div>
						<div class="col-sm-8 col-md-8">
							<div class="form-group">
								<label class="font-14">Total Biaya</label>
                                <input type="text" class="form-control font-13" placeholder="Total">
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

<div id="myModal" class="modal fade">
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
				<a href="<?= base_url('Group/destroy/' . $value['rmoment_id']) ?>" class="btn btn-danger"
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
	});

	function view_modal(tbooking_id) {
		$('#EditModal').modal('show');
		$.ajax({
			url: "<?= base_url('Booking/edit/') ?>" + tbooking_id,
			type: "GET",
			dataType: "JSON",
			succes: (response) => {
				console.log(response);
			},
			error: (response) => {
				console.log(response);
			}
		});
	}
</script>