@extends('layouts.admin')

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">
					Edit Berita
				</h1>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h2>Form Edit Berita</h2>
			</div>
			<div class="card-body">
				<form id="berita-form" action="{{ route('admin.berita.update', $berita->id) }}" method="post" enctype="multipart/form-data">
					@method('put')
					@csrf
				  <div class="form-group">
				    <label for="judul">Judul</label>
				    <input type="text" class="form-control @error('title') is-invalid @enderror" id="judul" name="title" value="{{ $berita->title }}">
				    @error('title')
				    <small class="form-text text-danger">
				    	{{ $message }}
				    </small>
				    @enderror
				  </div>
				  <div class="form-group">
				  	<label for="slug">Slug</label>
					  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $berita->slug }}">
						@error('slug')
				    <small class="form-text text-danger">
				    	{{ $message }}
				    </small>
				    @enderror
				  </div>
				  <div class="form-group">
				    <label for="deskripsi">Deskripsi</label>
				    <textarea name="description" id="deskripsi" class="form-control">{{ $berita->description }}</textarea>
				  </div>
				  <div class="form-group">
				  	<label for="konten">Konten</label>
				  	<textarea name="content" id="konten" class="form-control @error('content') is-invalid @enderror">{{ $berita->content }}</textarea>
				  	@error('content')
				    <small class="form-text text-danger">
				    	{{ $message }}
				    </small>
				    @enderror
				  </div>
				  <div class="form-group">
				  	<label for="kategori">Kategori</label>
				  	<select id="kategori" class="custom-select @error('category') is-invalid @enderror" name="category">
						  @foreach(\App\Category::all() as $key => $category)
						  	<option value="{{ $category->id }}" {{ $category->id == $berita->category->id ? 'selected' : '' }}>{{ $category->title }}</option>
						  @endforeach
						</select>
						@error('category')
				    <small class="form-text text-danger">
				    	{{ $message }}
				    </small>
				    @enderror
				  </div>
				  <div id="img-preview" class="form-group">
				  	<label>Image Preview</label>
				  	<div style="border: 1px solid #888">
				  		<img src="{{ asset('content/uploads/' . $berita->image) }}" alt="" class="img-fluid" id="image-preview">
				  	</div>
				  </div>
				  <div class="form-group">
				  	<label>Pilih Gambar Thumbnail</label>
				  	<div class="custom-file">
						  <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
						  <label class="custom-file-label" for="image">Choose file</label>
						</div>
						@error('image')
				    <small class="form-text text-danger">
				    	{{ $message }}
				    </small>
				    @enderror
				  </div>
				  <div class="clearfix">
				  	<div class="float-left"><input type="submit" class="btn btn-primary" name="publish" value="Publish"></div>
				  	<div class="float-right"><input type="submit" class="btn btn-warning" name="draft" value="Draft"></div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	let content = {!! json_encode($berita->content) !!};

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

	$(document).ready(function() {
		$('#konten').summernote({
			tabsize: 2,
      height: 400
		});
	})
	$('#konten').summernote('code', content);
	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	    	$('#img-preview').css('display', 'block');
	      $('#image-preview').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

	$("#image").change(function() {
	  readURL(this);
	});

	$('#judul').blur(function() {
		let text = $(this).val();
		text = text.toLowerCase()
							.replace(/ /g,'-')
							.replace(/ +|_/g,'-')
							.replace(/[^\w-]+/g,'');
		$('#slug').val(text)
	})
	$('#checkSlug').click(function() {
		$.ajax({
			url: '/admin/berita/check-slug',
			type: 'post',
			data: {
				_token: $('[name=_token]').val(),
				slug: $('#slug').val()
			},
			beforeSend: function() {
				$('#checkSlug').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
			},
			success: function(data) {
				Toast.fire({
					title: data.message,
					icon: 'success'
				})
				$('#checkSlug').html('Check Slug');
			},
			error: function(xhr) {
				Toast.fire({
					title: xhr.responseJSON.message,
					icon: 'error'
				})
				$('#checkSlug').html('Check Slug');
			}
		})
	})
</script>
@endpush