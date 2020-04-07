@extends('layouts.admin')
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css">
@endpush
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">
					Data COVID Tulungagung
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
					<li class="breadcrumb-item active">Data COVID Tulungagung</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-9">
						<h2 class="float-left">Table Data</h2>
					</div>
					<div class="col-md-3 mr-auto">
						<a href="/tambah" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newDataModal"><i class="fas fa-plus"></i> Tambah Data</a>
						<a href="/refresh" id="reload" class="btn btn-primary btn-sm"><i class="fas fa-redo"></i> Reload Table</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-striped">
						<thead>
							<th>Nama Kecamatan</th>
							<th>Jumlah Positif</th>
							<th>Jumlah Meninggal</th>
							<th>Jumlah Sembuh</th>
							<th>Jumlah ODP</th>
							<th>Jumlah PDP</th>
							<th width="120">Aksi</th>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<!-- New data modal -->
	<div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="newDataModalLabel">Tambah Data Baru</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="{{ route('admin.data.store') }}" method="post">
	        	@csrf
	          <div class="form-group">
	            <label for="nama_kecamatan" class="col-form-label">Nama Kecamatan :</label>
	            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" placeholder="Nama Kecamatan">
	          </div>
	          <div class="form-group">
	            <label for="jumlah_positif" class="col-form-label">Jumlah Positif :</label>
							<input type="text" class="form-control" id="jumlah_positif" name="jumlah_positif" placeholder="Jumlah Positif">
		        </div>
		        <div class="form-group">
	            <label for="jumlah_meninggal" class="col-form-label">Jumlah Meninggal :</label>
							<input type="text" class="form-control" id="jumlah_meninggal" name="jumlah_meninggal" placeholder="Jumlah Meninggal">
		        </div>
		        <div class="form-group">
	            <label for="jumlah_sembuh" class="col-form-label">Jumlah Sembuh :</label>
							<input type="text" class="form-control" id="jumlah_sembuh" name="jumlah_sembuh" placeholder="Jumlah Sembuh">
		        </div>
		        <div class="row">
		        	<div class="form-group col-md-6">
		            <label for="jumlah_odp" class="col-form-label">Jumlah ODP :</label>
								<input type="text" class="form-control" id="jumlah_odp" name="jumlah_odp" placeholder="Jumlah ODP">
			        </div>
			        <div class="form-group col-md-6">
		            <label for="jumlah_pdp" class="col-form-label">Jumlah PDP :</label>
								<input type="text" class="form-control" id="jumlah_pdp" name="jumlah_pdp" placeholder="Jumlah PDP">
			        </div>
		        </div>
		        <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Tambah Data</button>
			      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Edit data modal -->
	<div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/update">
	        	@csrf
	        	<input type="text" name="id" value="" style="display: none;">
	          <div class="form-group">
	            <label for="nama_kecamatan" class="col-form-label">Nama Kecamatan :</label>
	            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="">
	          </div>
	          <div class="form-group">
	            <label for="jumlah_positif" class="col-form-label">Jumlah Positif :</label>
							<input type="text" class="form-control" id="jumlah_positif" name="jumlah_positif" value="">
		        </div>
		        <div class="form-group">
	            <label for="jumlah_meninggal" class="col-form-label">Jumlah Meninggal :</label>
							<input type="text" class="form-control" id="jumlah_meninggal" name="jumlah_meninggal" value="">
		        </div>
		        <div class="form-group">
	            <label for="jumlah_sembuh" class="col-form-label">Jumlah Sembuh :</label>
							<input type="text" class="form-control" id="jumlah_sembuh" name="jumlah_sembuh" value="">
		        </div>
		        <div class="row">
		        	<div class="form-group col-md-6">
		            <label for="jumlah_odp" class="col-form-label">Jumlah ODP :</label>
								<input type="text" class="form-control" id="jumlah_odp" name="jumlah_odp" value="">
			        </div>
			        <div class="form-group col-md-6">
		            <label for="jumlah_pdp" class="col-form-label">Jumlah PDP :</label>
								<input type="text" class="form-control" id="jumlah_pdp" name="jumlah_pdp" value="">
			        </div>
		        </div>
		        <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Edit Data</button>
			      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection
@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	const table = $('#table-data').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/admin/data',
		columns: [
			{ data: 'nama_kecamatan', name: 'nama_kecamatan' },
			{ data: 'jumlah_positif', name: 'jumlah_positif' },
			{ data: 'jumlah_meninggal', name: 'jumlah_meninggal' },
			{ data: 'jumlah_sembuh', name: 'jumlah_sembuh' },
			{ data: 'jumlah_odp', name: 'jumlah_odp' },
			{ data: 'jumlah_pdp', name: 'jumlah_pdp' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		]
	});

	$('#reload').on('click', function(e) {
		e.preventDefault();
		$('#table-data').DataTable().ajax.reload()
	})
	const Toast = Swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 3000,
	  timerProgressBar: true,
	  onOpen: (toast) => {
	    toast.addEventListener('mouseenter', Swal.stopTimer)
	    toast.addEventListener('mouseleave', Swal.resumeTimer)
	  }
	})

	$('#newDataModal form button').on('click', function() {
		event.preventDefault();
		let nama_kecamatan = $('#newDataModal [name=nama_kecamatan]').val()
		let jumlah_positif = $('#newDataModal [name=jumlah_positif]').val()
		let jumlah_meninggal = $('#newDataModal [name=jumlah_meninggal]').val()
		let jumlah_sembuh = $('#newDataModal [name=jumlah_sembuh]').val()
		let jumlah_odp = $('#newDataModal [name=jumlah_odp]').val()
		let jumlah_pdp = $('#newDataModal [name=jumlah_pdp]').val()
		let _token = $('#newDataModal [name=_token]').val()

		$.ajax({
			type: 'post',
			url: '{{ route('admin.data.store') }}',
			data: {
				nama_kecamatan, jumlah_positif, jumlah_meninggal, jumlah_sembuh, jumlah_odp, jumlah_pdp, _token
			},
			beforeSend: function() {
				$('#newDataModal form button').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
			},
			success: function(data) {
				Toast.fire({
					title: 'Success',
					icon: 'success',
					text: 'Data Berhasil ditambahkan'
				})
				$('#newDataModal form button').html('Tambah Data')
				$('#newDataModal form').trigger('reset')
				$('#newDataModal').modal('hide')
				$('#table-data').DataTable().ajax.reload();
			},
			error: function(xhr) {
				$.each(xhr.responseJSON.errors, function(val) {
					Toast.fire({
						title: 'Error',
						icon: 'error',
						text: 'Perhatikan form ' + val
					})
				})
				$('#newDataModal form button').html('Tambah Data')
			}
		})
	})

	$(document).on('click', '.delete', function() {
		Swal.fire({
			title: 'Yakin ingin menghapus data ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true
		}).then((res) => {
			if(res.value) {
				let id = $(this).attr('data-id')
				$.ajax({
					url: '/data/delete/' + id,
					type: 'delete',
					data: {
						_token: $('[name=_token]').val()
					},
					beforeSend: function() {
						$(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
					},
					success: function(data) {
						Toast.fire({
							title: 'Success',
							icon: 'success',
							text: 'Success Delete data'
						})
						$('#table-data').DataTable().ajax.reload()
					}
				})
			}
		})
	});

	$(document).on('click', '#table-data .edit', function() {
		let id = $(this).data('id')
		$.get('/data/fetch/' + id, function(data) {
			$('#editDataModal').modal({
				show: true
			})
			$('#editDataModal [name=id]').val(data.id)
			$('#editDataModal #nama_kecamatan').val(data.nama_kecamatan)
			$('#editDataModal #jumlah_positif').val(data.jumlah_positif)
			$('#editDataModal #jumlah_meninggal').val(data.jumlah_meninggal)
			$('#editDataModal #jumlah_sembuh').val(data.jumlah_sembuh)
			$('#editDataModal #jumlah_odp').val(data.jumlah_odp)
			$('#editDataModal #jumlah_pdp').val(data.jumlah_pdp)
		})
		$(document).on('submit', '#editDataModal form', function(event) {
				event.preventDefault()
				let id = $('#editDataModal [name=id]').val()
				$.ajax({
					url: '/data/update/' + id,
					type: 'put',
					data: $('#editDataModal form').serialize(),
					beforeSend: function() {
						$('#editDataModal form button').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
					},
					success: function(data) {
						Toast.fire({
							title: 'Success',
							icon: 'success',
							text: 'Data berhasil diubah'
						})
						$('#editDataModal form').trigger('reset')
						$('#editDataModal').modal('hide')
						$('#table-data').DataTable().ajax.reload()
						$('#editDataModal form button').html('Edit Data')
					},
					error: function(xhr) {
						$.each(xhr.responseJSON.errors, function(val) {
							Toast.fire({
								title: 'Error',
								icon: 'error',
								text: 'Perhatikan form ' + val
							})
						})
						$('#editDataModal form button').html('Edit Data')
					}
				})
			})
		console.log(id);
	})
</script>
@endpush