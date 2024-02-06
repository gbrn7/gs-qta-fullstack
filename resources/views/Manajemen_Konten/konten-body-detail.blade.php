@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-pages-line fs-2"></i>
  <p class="fs-3 m-0">Manajemen Konten Body</p>
</div>
<div class="breadcrumbs-box rounded rounded-2 bg-white p-2 mt-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><a href="{{route('admin.home')}}"
          class="text-decoration-none"> <i class="ri-dashboard-line me-2"></i>GS Sehat Qta</a>
      </li>
      <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.manajemen.konten')}}"
          class="text-decoration-none">Manajemen Konten</a></li>
      <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.manajemen.konten.body')}}"
          class="text-decoration-none">Manajemen
          Konten Body</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Konten Body</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content rounded rounded-2 border border-1 p-3">
    <div class="row justify-content-start">
      <div class="col-12 col-md-5 h-100">
        <img
          src="{{(isset($content) ? asset('storage/image/'.$content->thumbnail) : asset('Assets/Img/default-thumbnail.png'))}}"
          alt="image" class="img-fluid img-thumbnail rounded-2 img-bg">
      </div>
      <div class="col-12 col-md-5 mt-3 mt-md-0">
        <form
          action="{{ isset($content) ? route('admin.manajemen.konten.body.update', $content->id) : route('admin.manajemen.konten.body.store')}}"
          enctype="multipart/form-data" method="post">
          @csrf
          @method(isset($content) ? 'put' : 'post')
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input required type="text" class="form-control" name="judul"
              value="{{ isset($content) ?  $content->judul : ''}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea required class="form-control" name="deskripsi" id="exampleFormControlTextarea1"
              rows="3">{{isset($content) ?  $content->deskripsi : ''}}</textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Gambar</label>
            <input type="file" id="input-file" @if (!isset($content)) required @endif class="form-control"
              name="thumbnail">
          </div>
          <button type="submit" @class([ 'btn' , 'btn-success'=> !isset($content), 'btn-warning' => isset($content)
            ])>{{isset($content) ? 'Perbarui' : 'Tambahkan'}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  const inputFile  = document.querySelector('#input-file');

  inputFile.addEventListener('change', function() {
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    let img = document.querySelector('.img-bg');

    img.src = imgLink;
  });
</script>
@endpush