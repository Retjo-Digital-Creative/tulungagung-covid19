@extends('layouts.admin')
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
				<a href="{{ route('admin.berita.tambah') }}" class="btn btn-success float-right" data-toggle="modal" data-target="#newDataModal"><i class="fas fa-add"></i> Tambah Data</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="news-table" class="table table-striped">
						<thead>
							<th>Judul Berita</th>
							<th>Pembuat</th>
							<th>Kategori</th>
							<th>Tanggal Terbit</th>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	const table = $('#news-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/admin/berita',
		columns : [
			{ data: 'title', name: 'title' },
			{ data: 'author', name: 'author.name' },
			{ data: 'category', name: 'category.title' },
			{ data: 'published_at', name: 'published_at' }
		]
	})
</script>
@endpush