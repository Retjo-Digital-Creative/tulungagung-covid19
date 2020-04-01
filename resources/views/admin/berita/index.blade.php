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
				<h2 class="float-left">Daftar Berita Terbaru</h2>
				<a href="{{ route('admin.berita.tambah') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</a>
			</div>
			<div class="card-body">
				<table id="news-table" class="table table-striped">
					<thead>
						<th>Judul Berita</th>
						<th>Pembuat</th>
						<th>Kategori</th>
						<th>Tanggal Terbit</th>
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
	const table = $('#news-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/admin/berita',
		responsive: true,
		columns : [
			{ data: 'title', name: 'title' },
			{ data: 'author', name: 'author' },
			{ data: 'category', name: 'category' },
			{ data: 'published_at', name: 'published_at' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		]
	})
</script>
@endpush