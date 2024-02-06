@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-pages-line fs-2"></i>
  <p class="fs-3 m-0">Manajemen Konten</p>
</div>
<div class="breadcrumbs-box rounded rounded-2 bg-white p-2 mt-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><a href="{{route('admin.home')}}"
          class="text-decoration-none"> <i class="ri-dashboard-line me-2"></i>GS Sehat Qta</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Manajemen Konten</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content rounded rounded-2 border border-1 p-3">
    <div class="row row-gap-3 row-cols-1 row-cols-md-2 mt-3">
      <a href="{{route('admin.manajemen.konten.header')}}" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Manajemen Konten Header</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk mengolah konten header homepage,
                seperti mengedit gambar dan teks konten header homepage</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu">
              <i class="fs-1 ri-window-line"></i>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('admin.manajemen.konten.body')}}" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body  row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Manajemen Konten Body</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk mengolah konten body homepage
                seperti menambah, memperbarui, atau menghapus konten body homepage.</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu"><i
                class="fs-1 ri-window-2-line me-2"></i>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body  row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Manajemen Konten Informasi</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk mengolah konten informasi homepage
                seperti menambah, memperbarui konten informasi homepage.</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu"><i
                class="fs-1 ri-file-info-line me-2"></i>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body  row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Edit Logo</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk memperbarui logo.</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu"><i
                class="fs-1 ri-trademark-line me-2"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection