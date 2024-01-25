@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-dashboard-line fs-2"></i>
  <p class="fs-3 m-0">Home</p>
</div>
<div class="breadcrumbs-box rounded rounded-2 bg-white p-2 mt-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><i class="ri-apps-line"></i>Sehat Qta</li>
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content rounded rounded-2 border border-1 p-3">
    <div class="row row-gap-3 row-cols-1 row-cols-md-2">
      <a href="{{route('admin.data.jam-praktik')}}" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body  row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Data Jam Praktik</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk mengolah data jam Praktik seperti
                menambah, memperbarui, atau menghapus data jam praktik.</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu">
              <i class="fs-1 ri-calendar-schedule-line "></i>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('admin.data.cabang')}}" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body  row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Data Cabang</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk mengolah data cabang seperti
                menambah, memperbarui, atau menghapus data cabang.</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu"><i
                class="fs-1 ri-building-2-line me-2"></i>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('admin.data.transaksi')}}" class="h-100 card-dashboard text-decoration-none">
        <div class="card h-100">
          <div class="card-body  row h-100 justify-content-between align-items-center">
            <div class="card-body-content h-100 col-9">
              <h3 class="card-title">Data Transaksi</h3>
              <p class="card-text text-secondary fw-light">Fitur ini digunakan untuk melihat kegiatan transaksi yang
                terjadi di klinik.</p>
            </div>
            <div class="col-2 col-sm-3 d-flex justify-content-center img-menu"><i
                class="fs-1 ri-arrow-left-right-line me-2"></i>
            </div>
          </div>
        </div>
      </a>

    </div>
  </div>
</div>
@endsection