<div class="sidebar" id="side_nav">
  <div class="header-box px-2 pt-5 pb-2 d-flex justify-content-center">
    <a href="{{route('admin.home')}}">
      <img src="{{asset(($logo ? 'storage/image/'.$logo->gambar : 'Assets/Img/logo-1.png'))}}"
        class="img-fluid img-logo" />
    </a>
  </div>
  <div class="list-box  d-flex flex-column justify-content-between gap-5">
    <ul class="list-unstyled px-3 pt-3 d-flex flex-column gap-2">
      <li class="rounded {{Request::segment(2) === 'home' ? 'active' : ''}} rounded-2">
        <a href="{{route('admin.home')}}"
          class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
            class="ri-dashboard-line me-2"></i>Home</a>
      </li>
      <li class="rounded {{Request::segment(2) === 'data-jam-praktik' ? 'active' : ''}} rounded-2">
        <a href="{{route('admin.data.jam-praktik')}}"
          class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
            class="ri-calendar-schedule-line me-2"></i>Data Jam Praktik</a>
      </li>
      <li class="rounded {{Request::segment(2) === 'data-cabang' ? 'active' : ''}} rounded-2">
        <a href="{{route('admin.data.cabang')}}"
          class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
            class="ri-building-2-line me-2"></i>Data Cabang</a>
      </li>
      <li class="rounded {{Request::segment(2) === 'data-transaksi' ? 'active' : ''}} rounded-2 data-transaksi">
        <a href="{{route('admin.data.transaksi')}}"
          class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
            class="ri-arrow-left-right-line me-2"></i>Data Transaksi</a>
      </li>
    </ul>
  </div>

</div>