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
 						<li class="breadcrumb-item active">Reference Ticket</li>
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
 					<h4 class="card-title"><i class="fa fa-tags mr-1"></i>Reference Ticket</h4>
 				</div>
 				<!-- /.card-header -->
 				<div class="card-body">
 					<div class="d-flex mb-4">
 						<div>
 							<button class="btn btn-block btn-outline-info btn-sm" data-toggle="modal"
 								data-target="#modal_ticket"><i class="fa fa-plus mr-1"></i>Tambah</button>
 						</div>
 						<div class="ml-1">
 							<button class="btn btn-block btn-outline-secondary btn-sm" title="Refresh"><i
 									class="fa fa-sync-alt"></i></button>
 						</div>
 					</div>
 					<!-- <div class="table-responsive"> -->
 						<table id="example1" class="table table-sm table-striped font-13 w-100">
 							<thead class="text-center">
 								<tr>
 									<th>ID Ticket</th>
 									<th>Harga Ticket</th>
 									<th>Nama Type Ticket</th>
 									<th>Group Days</th>
 									<th>Wisata</th>
 									<th>Action</th>
 								</tr>
 							</thead>
 							<tbody class="text-center">

 							</tbody>

 						</table>
 					<!-- </div> -->
 				</div>
 				<!-- /.card-body -->
 			</div>

 			<!-- /.card -->
 		</div><!-- /.container-fluid -->
 	</section>
 	<!-- /.content -->
 </div>

 <!-- Modal Tambah -->
 <div class="modal fade" id="modal_ticket">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header bg-info">
 				<h5 class="modal-title"><i class="fa fa-plus-circle mr-1"></i>Tambah Data</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true"><i class="ico--close"></i></span>
 				</button>
 			</div>
 			<div class="modal-body font-13">
 				<form id="form_ticket">
 					<div class="form-group">
 						<label class="font-15">ID Ticket</label>
 						<input type="text" class="form-control font-13" value="<?php echo $id;?>" name="rticket_id" readonly>
 						<span class="help-block"></span>
 					</div>
 					<div class="form-group">
 						<label class="font-15">Harga Ticket</label>
 						<input type="text" class="form-control font-13" placeholder="ex: 30000" name="rticket_harga">
 						<span class="help-block"></span>
 					</div>
 					<div class="form-group">
 						<label class="font-15">Nama Type Ticket</label>
 						<select class="form-control font-13" name="rvarianticket_id">
 							<option value="">No Selected</option>
 							<?php foreach($type as $row):?>
 							<option value="<?php echo $row->rvarianticket_id;?>"><?php echo $row->rvarianticket_nama;?>
 							</option>
 							<?php endforeach;?>
 						</select>
 						<span class="help-block"></span>
 					</div>
 					<div class="form-group">
 						<label class="font-15">Group Days</label>
 						<select class="form-control font-13" name="rmoment_id">
 							<option value="">No Selected</option>
 							<?php foreach($group as $row):?>
 							<option value="<?php echo $row->rmoment_id;?>"><?php echo $row->rmoment_name;?>
 							</option>
 							<?php endforeach;?>
 						</select>
 						<span class="help-block"></span>
 					</div>
 					<div class="form-group">
 						<label class="font-15">Wisata</label>
 						<input type="hidden" name="mdestinasi_id">
 						<input type="text" class="form-control font-13" name="mdestinasi_nama" id="nama_destinasi"
 							placeholder="Cari Jadwal">
 					</div>
 					<div class="form-group">
 						<label>Multiple</label>
 						<select class="select2" multiple="multiple" data-placeholder="Select a State"
 							style="width: 100%;">
 							<option>Alabama</option>
 							<option>Alaska</option>
 							<option>California</option>
 							<option>Delaware</option>
 							<option>Tennessee</option>
 							<option>Texas</option>
 							<option>Washington</option>
 						</select>
 					</div>
 				</form>
 				<span id="cek_result"></span>
 			</div>
 			<div class="modal-footer justify-content-between">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 				<button type="button" id="btn_simpan" class="btn btn-info"><i
 						class="fa fa-save mr-1"></i>Simpan</button>
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
 				<form>
 					<div class="form-group">
 						<label class="font-15">ID Ticket</label>
 						<input type="email" class="form-control">
 					</div>
 					<div class="form-group">
 						<label class="font-15">Harga Ticket</label>
 						<input type="email" class="form-control" placeholder="ex: 30000">
 					</div>
 					<div class="form-group">
 						<label class="font-15">Nama Type Ticket</label>
 						<select class="form-control">
 							<option>Dewasa</option>
 							<option>Anak-anak</option>
 						</select>
 					</div>
 					<div class="form-group">
 						<label class="font-15">Group Days</label>
 						<select class="form-control">
 							<option>Weekdays</option>
 							<option>Weekend</option>
 						</select>
 					</div>
 					<div class="form-group">
 						<label class="font-15">Wisata</label>
 						<input type="email" class="form-control" placeholder="Cari Jadwal">
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

	function reload_table() {
		table.ajax.reload(null, false); //reload datatable ajax 
	}

 	var save_method; //for save method string
 	var table;
 	$(document).ready(function () {
 		$('.select2').select2();
 		//datatables
 		table = $('#example1').DataTable({
 			// "lengthMenu": [
 			// 	[5, 10, 50, -1],
 			// 	[10, 25, 50, "All"]
 			// ],

 			"processing": true, //Feature control the processing indicator.
 			"serverSide": true, //Feature control DataTables' server-side processing mode.
 			"order": [], //Initial no order.

 			// Load data for the table's content from an Ajax source
 			"ajax": {
 				"url": "<?php echo base_url('Ticket/list_ticket')?>",
 				"type": "POST"
 			},

 			//Set column definition initialisation properties.
 			"columnDefs": [{
 				"targets": [-1], //last column
 				"orderable": false, //set not orderable
 			}, ],

 		});

 		// autocomplete nama
 		$('#nama_destinasi').autocomplete({
 			source: "<?php echo site_url('Ticket/get_autocomplete_destinasi');?>",
 			select: function (event, ui) {
 				$('[name="mdestinasi_nama"]').val(ui.item.label);
 				$('[name="mdestinasi_id"]').val(ui.item.mdestinasi_id);
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

 		$('#btn_simpan').click(function () {
 			$.ajax({
 				type: "POST",
 				url: "<?php echo base_url('Ticket/cek_ticket')?>",
 				data: $('#form_ticket').serialize(),
 				success: function (data) {
 					if (data === "ok") {
 						$('#cek_result').html(
 							'<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle"></i> Data Sudah ada, Input Indikator yg lain ya<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
 						);
 					} else {
 						var url_add = "<?php echo base_url('Ticket/add_ticket')?>";
 						// ajax adding data to database
 						$.ajax({
 							url: url_add,
 							type: "POST",
 							data: $('#form_ticket').serialize(),
 							dataType: "JSON",
 							success: function (data) {

 								if (data
 									.status
 								) //if success close modal and reload ajax table
 								{
 									$('#modal_ticket').modal('hide');
 									reload_table();
 								} else {
 									for (var i = 0; i < data.inputerror
 										.length; i++) {
 										$('[name="' + data.inputerror[i] + '"]')
 											.parent().parent().addClass(
 												'has-error'
 											); //select parent twice to select div form-group class and add has-error class
 										$('[name="' + data.inputerror[i] + '"]')
 											.next().text(data.error_string[
 												i
 											]); //select span help-block class set text error string
 									}
 								}
 								$('#btn_simpan').html(
 									'<i class="fa fa-floppy-o mr-1"></i>Saving...'
 								); //change button text
 								$('#btn_simpan').attr('disabled',
 									false); //set button enable 
 								window.location.reload();
 								stay_tab();

 							},
 							error: function (jqXHR, textStatus, errorThrown) {
 								alert('Error adding / update data');
 								$('#btn_simpan').text(
 									'save'); //change button text
 								$('#btn_simpan').attr('disabled',
 									false); //set button enable 

 							}
 						});
 					}
 					// console.log("tuk tuk tuk");
 				}
 			})
 		});


 	});

 </script>
