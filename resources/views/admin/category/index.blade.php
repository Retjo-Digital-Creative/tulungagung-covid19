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
					Kategori Berita
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
					<li class="breadcrumb-item active">Kategori Berita</li>
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
						<h2 class="float-left">Daftar Kategori</h2>
					</div>
					<div class="col-md-3 mr-auto">
						<a href="/tambah" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newCategoryModal"><i class="fas fa-plus"></i> Tambah Data</a>
						<a href="/refresh" id="reload" class="btn btn-primary btn-sm"><i class="fas fa-redo"></i> Reload Table</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="categories-table" class="table table-striped">
					<thead>
						<th>Judul Kategori</th>
						<th>Slug</th>
						<th>Tanggal Pembuatan</th>
						<th>Aksi</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- New data modal -->
	<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="newCategoryModalLabel">Tambah Kategori Baru</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="{{ route('admin.data.store') }}" method="post">
	        	@csrf
	          <div class="form-group">
	            <label for="title" class="col-form-label">Judul Kategori :</label>
	            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Kategori">
	          </div>
	          <div class="form-group">
	            <label for="slug" class="col-form-label">Slug :</label>
							<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
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
	<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/update">
	        	@csrf
	        	<input type="text" name="id" style="display: none" value="">
	          <div class="form-group">
	            <label for="nama_kecamatan" class="col-form-label">Judul Kategori :</label>
	            <input type="text" class="form-control" id="title" name="title" value="">
	          </div>
	          <div class="form-group">
	            <label for="slug" class="col-form-label">Slug :</label>
							<input type="text" class="form-control" id="slug" name="slug" value="">
		        </div>
		        <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Edit Data</button>
			      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	$(document).on('click', '#categories-table .edit', function() {
		let id = $(this).attr('data-id')
		$.get('/admin/category/fetch/' + id, function(res) {
			$('#editCategoryModal').modal({
				show: true
			})
			$('#editCategoryModal [name=id]').val(res.id)
			$('#editCategoryModal #title').val(res.title)
			$('#editCategoryModal #slug').val(res.slug)

			$('#editCategoryModal').submit(function(event) {
				event.preventDefault()

				let id = $('#editCategoryModal [name=id]').val()
				let title = $('#editCategoryModal #title').val()
				let slug = $('#editCategoryModal #slug').val()
				let _token = $('[name=_token]').val()

				$.ajax({
					url: '/admin/category/update/' + id,
					type: 'put',
					data: {
						title, slug, _token
					},
					beforeSend: function() {
						$('#editCategoryModal form button').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
					},
					success: function(res) {
						Toast.fire({
							title: 'Success',
							icon: 'success',
							text: res.message
						})
						$('#categories-table').DataTable().ajax.reload()
						$('#editCategoryModal form button').html('Edit Kategori')
					},
					error: function(xhr) {
						$.each(xhr.responseJSON.errors, function(val) {
							Toast.fire({
								title: 'Error',
								icon: 'error',
								text: 'Perhatikan form ' + val
							})
						})
						$('#editCategoryModal form button').html('Edit Data')
					}
				})
			})
		})
	})

	$('#newCategoryModal form button').on('click', function() {
		event.preventDefault()
		let title = $('#newCategoryModal #title').val()
		let slug = $('#newCategoryModal #slug').val()
		let _token = $('[name=_token]').val()

		$.ajax({
			url: '{{ route('admin.category.store') }}',
			type: 'post',
			data: {
				title, slug, _token
			},
			beforeSend: function() {
				$('#newCategoryModal form button').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
			},
			success: function(data) {
				Toast.fire({
					title: 'Success',
					icon: 'success',
					text: data.message
				})
				$('#categories-table').DataTable().ajax.reload()
				$('#newCategoryModal form button').html('Tambah Kategori')
			},
			error: function(xhr) {
				$.each(xhr.responseJSON.errors, function(val) {
					Toast.fire({
						title: 'Error',
						icon: 'error',
						text: 'Perhatikan form ' + val
					})
				})
				$('#editCategoryModal form button').html('Edit Data')
			}
		})
	})

	$(document).on('click', '#categories-table .delete', function() {
		Swal.fire({
			title: 'Yakin ingin menghapus kategori ini?',
			icon: 'warning',
			text: 'Aksi ini tidak dapat dibatalkan',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true
		}).then((res) => {
			if(res.value) {
				let id = $(this).attr('data-id')
				$.ajax({
					url: '/admin/category/delete/' + id,
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
							text: data.message
						})
						$('#categories-table').DataTable().ajax.reload()
					}
				})
			}
		})
	});

	$('#title').keyup(function() {
		let text = $(this).val();
		text = text.toLowerCase()
							.replace(/ /g,'-')
							.replace(/ +|_/g,'-')
							.replace(/[^\w-]+/g,'');
		$('#slug').val(text)
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

	$('#categories-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/admin/category',
		columns: [
			{
				data: 'title',
				name: 'title'
			},
			{
				data: 'slug',
				name: 'slug'
			},
			{
				data: 'created_at',
				name: 'created_at'
			},
			{
				data: 'action',
				name: 'action'
			}
		]
	})

	$('#reload').click(function(e) {
		e.preventDefault()
		$('#categories-table').DataTable().ajax.reload()
	})
</script>
@endpush