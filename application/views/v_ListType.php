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
 						<li class="breadcrumb-item active">Type Ticket</li>
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
 					<h4 class="card-title"><i class="fa fa-tag mr-1"></i>Type Ticket</h4>
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
 					<table id="example1" class="table table-sm table-striped">
 						<thead class="text-center">
 							<tr>
 								<th>ID Type</th>
 								<th>Type Ticket</th>
 								<th>Nama Type Ticket</th>
 								<th>Action</th>
 							</tr>
 						</thead>
 						<tbody class="text-center">
                            <tr>
                            <td>1</td>
 								<td>Varian 1</td>
 								<td>Nama Type Ticket</td>
                                <td class="text-center"><button class="btn btn-outline-info btn-sm"  data-toggle="modal" data-target="#EditModal" title="Edit"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button></td>
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
 				<form>
 					<div class="form-group">
 						<label class="font-15">ID Type</label>
 						<input type="email" class="form-control" placeholder="ID Type">
 					</div>
 					<div class="form-group">
 						<label class="font-15">Type Ticket</label>
 						<input type="text" class="form-control" placeholder="Masukkan Type Ticket">
 					</div>
 					<div class="form-group">
 						<label class="font-15">Nama Type Ticket</label>
 						<input type="text" class="form-control" placeholder="Masukkan Nama Type Ticket">
 					</div>
 				</form>
 			</div>
 			<div class="modal-footer justify-content-between">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 				<button type="button" class="btn btn-info"><i class="fa fa-save mr-1"></i>Simpan</button>
 			</div>
 		</div>
 		<!-- /.modal-content -->
 	</div>
 	<!-- /.modal-dialog -->
 </div>
 <!-- /Modal -->

  <!-- Modal Tambah -->
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
 				<form>
 					<div class="form-group">
 						<label class="font-15">ID Type</label>
 						<input type="email" class="form-control" placeholder="ID Type">
 					</div>
 					<div class="form-group">
 						<label class="font-15">Type Ticket</label>
 						<input type="text" class="form-control" placeholder="Masukkan Type Ticket">
 					</div>
 					<div class="form-group">
 						<label class="font-15">Nama Type Ticket</label>
 						<input type="text" class="form-control" placeholder="Masukkan Nama Type Ticket">
 					</div>
 				</form>
 			</div>
 			<div class="modal-footer justify-content-between">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 				<button type="button" class="btn btn-info"><i class="fa fa-save mr-1"></i>Update</button>
 			</div>
 		</div>
 		<!-- /.modal-content -->
 	</div>
 	<!-- /.modal-dialog -->
 </div>
 <!-- /Modal -->
 <script>
 	$(document).ready(function () {
 		$("#example1").DataTable({
 			"responsive": true,
 			"autoWidth": false,
 		});
 	});

 </script>
