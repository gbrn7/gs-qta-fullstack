@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-arrow-left-right-line fs-2"></i>
  <p class="fs-3 m-0">Data Transaksi</p>
</div>
<div class="breadcrumbs-box mt-2 rounded rounded-2 bg-white p-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><i class="ri-arrow-left-right-line"></i>Sehat Qta
      </li>
      <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content rounded rounded-2 border border-1 p-3">
    <div class="btn-wrapper mt-2">

      {{-- Error Alert --}}
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

    </div>


    <form action="{{route('admin.data.transaksi.filter')}}" method="POST">
      @csrf
      <div class="filter-wrapper row align-items-end">
        <div class=" form-group col-12 mt-2 col-md-1">
          <label class="mb-1 text-left">Show :</label>
          <select name="paginate" class="form-select">
            <option @isset($paginate) @if ($paginate==10) selected @endif @endisset value="10">10</option>
            <option @isset($paginate) @if ($paginate==25) selected @endif @endisset value="25">25</option>
            <option @isset($paginate) @if ($paginate==50) selected @endif @endisset value="50">50</option>
            <option @isset($paginate) @if ($paginate==100) selected @endif @endisset value="100">100</option>
          </select>
        </div>

        <div class=" form-group col-12 mt-2 col-md-2">
          <label class="mb-1 text-left">Cabang :</label>
          <select name="branchId" class="form-select">
            <option value="">semua</option>
            @foreach ($branchs as $branch)
            <option value="{{$branch->id}}" @isset($selectedBranch) @if ($branch->id == $selectedBranch) selected @endif
              @endisset>
              {{$branch->nama}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-12 mt-2 col-md-2">
          <label for="keyword" class="mb-1 text-left">Cari Nama :</label>
          <div class="input-group">
            <input class="form-control col-8" type="text" name="nama" value="@isset($nama) {{$nama}} @endisset" />
          </div>
        </div>

        <div class="form-group col-12 mt-2 mt-xl-0 col-md-3">
          <label class="mb-1 text-left">Tanggal :</label>
          <div class="input-group">
            <select class="form-select" name="dateColumn">
              <option value="created_at" @isset($dateColumn) @if ($dateColumn==='created_at' ) selected @endif
                @endisset>
                Transaksi</option>
              <option value="tanggal_reservasi" @isset($dateColumn) @if ($dateColumn==='tanggal_reservasi' ) selected
                @endif @endisset>Reservasi</option>
            </select>
            <input type="text" class="form-control" id="daterange" name="dateRange" />
          </div>
        </div>

        <div class="wrapper col-12 col-xl-2 mt-xl-0 mt-2 ">
          <button class="btn btn-primary w-100" type="submit">Terapkan</button>
        </div>

        <div class="wrapper col-12 col-xl-2 mt-xl-0 mt-2 ">
          <a href="{{route('admin.data.transaksi')}}" class="text-decoration-none">
            <div class="btn btn-success w-100">Reset</div>
          </a>
        </div>
      </div>
    </form>

    <div class="table-wrapper mt-2 mb-2 overflow-auto">
      <table id="" class="table table-striped table-borderless mt-3 table-hover">
        <thead>
          <tr>
            <th class="text-secondary">ID</th>
            <th class="text-secondary">Cabang</th>
            <th class="text-secondary">Nama Pasien</th>
            <th class="text-secondary">Jam Reservasi</th>
            <th class="text-secondary">Alamat</th>
            <th class="text-secondary">No Telepon</th>
            <th class="text-secondary">Tanggal Reservasi</th>
            <th class="text-secondary">Tanggal Transaksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          @foreach ($transactions as $transaction)
          <tr>
            <td>{{$transaction->id}}</td>
            <td>{{$transaction->cabang->nama}}</td>
            <td>{{$transaction->nama_pasien}}</td>
            <td>{{date('H:i' ,strtotime($transaction->jam_mulai)).'-'.date('H:i'
              ,strtotime($transaction->jam_selesai))}}
            </td>
            <td>{{$transaction->alamat}}</td>
            <td>{{$transaction->no_telepon}}</td>
            <td>{{$transaction->tanggal_reservasi}}</td>
            <td>{{date('Y-m-d' ,strtotime($transaction->created_at))}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$transactions->links('pagination::bootstrap-5')}}
    </div>
  </div>
</div>


@endsection

@push('js')
<script>
  $(document).ready(function () {
    $(function() {
            $('#daterange').daterangepicker({
              timePicker: true,
              autoUpdateInput: @if(isset($startDate) && isset($endDate)) true @else false @endif,
              @if (isset($startDate) && isset($endDate))
              startDate: "{{$startDate}}",          
              endDate: "{{$endDate}}",  
              @endif
              locale: {
                format: 'YY-MM-DD',
                cancelLabel: 'Clear'
              }
            }, function(start, end, label) {
              console.log(start);
              console.log(end);
          });

          $('#daterange').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
          });

          $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
          });


        });
});

</script>

@endpush