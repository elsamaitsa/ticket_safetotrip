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
						<div>
							<button class="btn btn-block btn-outline-info btn-sm" data-toggle="modal"
								data-target="#TambahModal"><i class="fa fa-plus mr-1"></i>Tambah</button>
						</div>
						<div class="ml-1">
							<button class="btn btn-block btn-outline-secondary btn-sm" title="Refresh"><i
									class="fa fa-sync-alt"></i></button>
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
							<tr>
								<td>12323</td>
								<td>12323</td>
								<td>
									<div class="box-label bg-box-blue">Digunakan</div>
								</td>
								<td>
									<a class="btn btn-outline-info btn-sm" data-toggle="modal"
										data-target="#EditModal"><i class="fa fa-edit"></i></a>
									<button class="btn btn-outline-danger btn-sm" data-toggle="modal"
										data-target="#HapusModal" title="Hapus"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>12323</td>
								<td>12323</td>
								<td>
									<div class="box-label bg-box-dark">Dipesan</div>
								</td>
								<td>
									<a class="btn btn-outline-info btn-sm" data-toggle="modal"
										data-target="#EditModal"><i class="fa fa-edit"></i></a>
									<button class="btn btn-outline-danger btn-sm" data-toggle="modal"
										data-target="#HapusModal" title="Hapus"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>12323</td>
								<td>12323</td>
								<td>
									<div class="box-label bg-box-green">Refund</div>
								</td>
								<td>
									<a class="btn btn-outline-info btn-sm" data-toggle="modal"
										data-target="#EditModal"><i class="fa fa-edit"></i></a>
									<button class="btn btn-outline-danger btn-sm" data-toggle="modal"
										data-target="#HapusModal" title="Hapus"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							<tr>
								<td>12323</td>
								<td>12323</td>
								<td>
									<div class="box-label bg-box-gray">Hangus</div>
								</td>
								<td>
									<a class="btn btn-outline-info btn-sm" data-toggle="modal"
										data-target="#EditModal"><i class="fa fa-edit"></i></a>
									<button class="btn btn-outline-danger btn-sm" data-toggle="modal"
										data-target="#HapusModal" title="Hapus"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
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
<!-- Modal Tambah -->
<div class="modal fade" id="TambahModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title"><i class="fa fa-plus-circle mr-1"></i>Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="ico--close"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" class="form-modal-to-content">
					<div class="form-group">
						<label class="font-14">Ticket ID</label>
						<input type="text" class="form-control font-13" placeholder="Ticket ID">
					</div>
					<div class="form-group">
						<label class="font-14">Booking No</label>
						<input type="text" class="form-control font-13" placeholder="Booking No">
					</div>
					<div class="form-group">
						<label class="font-14">Status</label>
						<select class="form-control font-13">
                            <option value="digunakan">Digunakan</option>
                            <option value="dipesan">Dipesan</option>
                            <option value="refund">Refund</option>
                            <option value="hangus">Hangus</option>
						</select>
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
<!-- /Modal -->

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
					<div class="form-group">
						<label class="font-14">Ticket ID</label>
						<input type="text" class="form-control font-13" placeholder="Ticket ID">
					</div>
					<div class="form-group">
						<label class="font-14">Booking No</label>
						<input type="text" class="form-control font-13" placeholder="Booking No">
					</div>
					<div class="form-group">
						<label class="font-14">Status</label>
						<select class="form-control font-13">
                            <option value="digunakan">Digunakan</option>
                            <option value="dipesan">Dipesan</option>
                            <option value="refund">Refund</option>
                            <option value="hangus">Hangus</option>
						</select>
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
		$('#bookingdate').datetimepicker({
			format: 'L'
		});
		$('#visitdate').datetimepicker({
			format: 'L'
		});
	});

</script>
