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
						<li class="breadcrumb-item active">Group Ticket</li>
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
					<h4 class="card-title"><i class="fa fa-list-alt mr-1"></i>Group Ticket</h4>
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
								<th>ID Group</th>
								<th>Nama Group Ticket</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php $no = 0; ?>
							<?php foreach($group as $value) : ?>
								<tr>
									<td><?= ++$no ?></td>
									<td><?= $value['rmoment_name'] ?></td>
									<td class="text-center"><button class="btn btn-outline-info btn-sm" href="javascript:void(0)" onclick="view_modal(<?= $value['rmoment_id'] ?>)"><i class="fa fa-edit"></i></button>
									<a href="#myModal" class="btn btn-outline-danger btn-sm" data-toggle="modal"  title="Hapus"><i class="fa fa-trash"></i></a></td>
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
				<form action="<?= base_url('Group/store') ?>" method="POST" class="form-modal-to-content">
					<!-- <div class="form-group">
						<label class="font-15">ID Group</label>
						<input type="text" class="form-control" placeholder="ID Group" value="<?= $idGroup ?>" readonly>
					</div> -->
					<div class="form-group">
						<label class="font-15">Nama Group Ticket</label>
						<input type="text" class="form-control" name="rmoment_name"
							placeholder="Masukkan Nama Group Ticket" autocomplete="off" required>
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
				<form action="" method="POST" id="theContent">
					<div class="form-group">
						<label class="font-15">Nama Group Ticket</label>
						<input type="text" class="form-control" name="rmoment_name" id="namaGroup" autocomplete="off"
							required>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i>Update</button>
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
				<h4 class="modal-title w-20">Apakah Anda Yakin Data Akan Dihapus?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('Group/destroy/' . $value['rmoment_id']) ?>" class="btn btn-danger"
					style="padding-top: 12px;">Ya</a>
			</div>
		</div>
	</div>
</div>
<!-- /Modal -->
<script>
	$(document).ready(function () {
		table = $("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	});

	function view_modal(id) {
		$('#EditModal').modal('show')

		$.ajax({
			url: "<?= base_url('Group/edit/') ?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {

				$('#idGroup').val(data.rmoment_id);
				$('#namaGroup').val(data.rmoment_name);
				$('#theContent').attr('action', "<?= base_url('Group/update/') ?>" + data.rmoment_id);
			},
			error: (data) => {
				console.log(data);
			}
		});
	}
</script>
