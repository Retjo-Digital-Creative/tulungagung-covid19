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
					Berita Terbaru COVID-19
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
					<li class="breadcrumb-item active">Berita Terbaru COVID-19</li>
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
						<h2 class="float-left">Daftar Berita Terbaru</h2>
					</div>
					<div class="col-md-3 mr-auto">
						<a href="{{ route('admin.berita.tambah') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
						<a href="/refresh" id="reload" class="btn btn-primary btn-sm"><i class="fas fa-redo"></i> Reload Table</a>
					</div>
				</div>
			</div>
			<div class="container mt-4">
				@if(session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
				@endif
			</div>
			<div class="card-body">
				<table id="news-table" class="table table-striped">
					<thead>
						<th>Judul Berita</th>
						<th>Pembuat</th>
						<th>Kategori</th>
						<th>Status</th>
						<th>Aksi</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
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

	const table = $('#news-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/admin/berita',
		responsive: true,
		columns : [
			{ data: 'title', name: 'title' },
			{ data: 'author', name: 'author' },
			{ data: 'category', name: 'category' },
			{ data: 'status', name: 'status' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		]
	})

	$(document).on('click', '.delete', function() {
		Swal.fire({
			title: 'Yakin ingin menghapus data ini?',
			text: 'Tindakan ini tidak dapat dibatalkan!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true
		}).then(res => {
			if(res.value) {
				let id = $(this).attr('data-id')
				$.ajax({
					url: '/admin/berita/delete/' + id,
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
						$('#news-table').DataTable().ajax.reload()
					}
				})
			}
		})
	})

	$('#reload').click(function(e) {
		e.preventDefault();
		$('#news-table').DataTable().ajax.reload()
	})
</script>
@endpush