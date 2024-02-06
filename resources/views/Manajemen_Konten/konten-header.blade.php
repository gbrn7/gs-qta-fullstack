@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-apps-line fs-2"></i>
  <p class="fs-3 m-0">Manajemen Konten Header</p>
</div>
<div class="breadcrumbs-box rounded rounded-2 bg-white p-2 mt-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><a href="{{route('admin.home')}}"
          class="text-decoration-none"> <i class="ri-dashboard-line me-2"></i>GS Sehat Qta</a>
      </li>
      <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.manajemen.konten')}}"
          class="text-decoration-none">Manajemen Konten</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manajemen Konten Header</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content rounded rounded-2 border border-1 p-3">
    <div class="row justify-content-start">
      <div class="col-12 col-md-5 h-100">
        <img
          src="{{(isset($homeBg) ? asset('storage/image/'.$homeBg->gambar) : asset('Assets/Img/relax-686392_1920.jpg'))}}"
          class="img-fluid img-thumbnail rounded-2 img-bg">
      </div>
      <div class="col-12 col-md-5 mt-3 mt-md-0">
        <form action="{{route('admin.manajemen.konten.header.update')}}" enctype="multipart/form-data" method="post">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{$headerContent->judul}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tagline</label>
            <input type="text" class="form-control" name="tagline" value="{{$headerContent->tagline}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1"
              rows="3">{{$headerContent->deskripsi}}</textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Teks Tombol</label>
            <input type="text" class="form-control" name="teks_btn" value="{{$headerContent->teks_btn}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Gambar Background</label>
            <input type="file" id="input-file" class="form-control" name="gambar">
          </div>
          <button type="submit" class="btn btn-warning">Perbarui</button>
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