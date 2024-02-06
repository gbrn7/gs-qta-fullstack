@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-file-info-line fs-2"></i>
  <p class="fs-3 m-0">Manajemen Konten Informasi</p>
</div>
<div class="breadcrumbs-box rounded rounded-2 bg-white p-2 mt-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><a href="{{route('admin.home')}}"
          class="text-decoration-none"> <i class="ri-dashboard-line me-2"></i>GS Sehat Qta</a>
      </li>
      <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.manajemen.konten')}}"
          class="text-decoration-none">Manajemen Konten</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manajemen Konten Informasi</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content rounded rounded-2 border border-1 p-3">
    <div class="row justify-content-start">
      <div class="col-12 mt-3 mt-md-0">
        <form action="{{route('admin.manajemen.konten.informasi.update')}}" method="post">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input required type="text" class="form-control" name="judul" value="{{$informasi->judul}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea required class="form-control" name="deskripsi" id="exampleFormControlTextarea1"
              rows="3">{{$informasi->deskripsi}}</textarea>
          </div>
          <div class="form-group mb-3">
            <label for="status" class="mb-1">Status</label>
            <select name="status" class="form-select" value={{$informasi->status}}>
              <option {{$informasi->status ? 'selected' : '' }} value="1">Aktif</option>
              <option {{!$informasi->status ? 'selected' : '' }} value="0">Tidak Aktif</option>
            </select>
          </div>
          <button type="submit" class="btn btn-warning">Perbarui</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection