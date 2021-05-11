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
						<li class="breadcrumb-item"><a href="#">Ticket</a></li>
						<li class="breadcrumb-item active">Layanan Ticket</li>
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
					<h4 class="card-title"><i class="fa fa-cogs mr-1"></i>Layanan Ticket</h4>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="d-flex mb-4">
						<div>
							<button class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#TambahModal"><i class="fa fa-plus mr-1"></i>Tambah</button>
						</div>
						<div class="ml-1">
							<button class="btn btn-block btn-outline-secondary btn-sm" title="Refresh"><i class="fa fa-sync-alt"></i></button>
						</div>
					</div>
					<table id="example1" class="table table-sm table-striped font-13">
						<thead class="text-center">
							<tr>
								<th>No</th>
								<th>Nama Layanan Ticket</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php if (isset($data_layanan)) : ?>
								<?php $no = 0 ?>
								<?php foreach ($data_layanan as $value) : ?>
									<tr>
										<td><?= ++$no ?></td>
										<td><?= $value['nama_service_ticket'] ?></td>
										<td class="text-center">
											<a href="javascript:;" data-id="<?= $value['id'] ?>" data-service="<?= $value['nama_service_ticket'] ?>" data-toggle="modal" data-target="#EditModal">
												<button class="btn btn-outline-info btn-sm" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button>
											</a>
											<button class="btn btn-outline-danger btn-sm" data-href="<?= site_url('Layanan/Delete/' . $value['id']); ?>" data-toggle="modal" data-target="#HapusModal" title="Hapus"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
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
			<form class="form" action="<?= site_url('Layanan/Insert'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label class="font-15">Nama Layanan Ticket</label>
						<input type="text" name="service" class="form-control" placeholder="Masukkan Nama Layanan Ticket" required autofocus>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i>Simpan</button>
				</div>
			</form>
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
			<form class="form" action="<?= site_url('Layanan/Update'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="id_service" id="id">
					<div class="form-group">
						<label class="font-15">Nama Layanan Ticket</label>
						<input type="text" class="form-control" name="service" placeholder="Masukkan Nama Layanan Ticket" id="service">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i>Update</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Modal Hapus -->
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
<!-- /Modal -->
<script>
	$(document).ready(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$('#HapusModal').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});

		$('#EditModal').on('show.bs.modal', function(event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)
			// Isi nilai pada field
			modal.find('#id').attr("value", div.data('id'));
			modal.find('#service').attr("value", div.data('service'));
		});
	});
</script>