<div class="sidebar" id="side_nav">
  <div class="header-box px-2 pt-5 pb-2 d-flex justify-content-center">
    <h1 class="header-text rounded rounded-3 ">
      <span class="me-2 text-white"><i class="ri-hospital-line"></i>
        Sehat Qta
      </span>
    </h1>
  </div>
  <div class="list-box  d-flex flex-column justify-content-between gap-5">
    <ul class="list-unstyled px-3 pt-3 d-flex flex-column gap-2">
      <li class="rounded {{Request::segment(2) === 'home' ? 'active' : ''}} rounded-2">
        <a href="{{route('admin.home')}}"
          class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
            class="ri-dashboard-line me-2"></i>Home</a>
      </li>
      <li class="rounded {{Request::segment(2) === 'criteria' ? 'active' : ''}} rounded-2">
        <a href="#" class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
            class="ri-calendar-schedule-line me-2"></i>Data Jam Praktik</a>
      </li>
      <li class="rounded {{Request::segment(2) === 'alternatives' ? 'active' : ''}} rounded-2">
        <a href="#" class="text-decoration-none px-3 py-3 rounded rounded-2 d-flex align-items-baseline"><i
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