@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-building-2-line fs-2"></i>
  <p class="fs-3 m-0">Data Jam Praktik</p>
</div>
<div class="breadcrumbs-box mt-2 rounded rounded-2 bg-white p-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><a href="{{route('admin.home')}}"
          class="text-decoration-none"> <i class="ri-dashboard-line me-2"></i>GS Sehat Qta</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Data Jam Praktik</li>
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

    <div id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-success"><i
        class="ri-add-box-line me-2"></i>Tambah Jam Praktik</div>

    <form action="{{route('admin.data.jam-praktik')}}" method="GET">
      @csrf
      <div class="filter-wrapper row align-items-end mt-2">
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
          <label for="keyword" class="mb-1 text-left">Tanggal :</label>
          <div class="input-group">
            <input class="form-control col-8 tanggal-filter" type="date" name="tanggal" />
          </div>
        </div>

        <div class="wrapper col-12 col-xl-2 mt-xl-0 mt-2 ">
          <button class="btn btn-primary w-100" type="submit">Terapkan</button>
        </div>

        <div class="wrapper col-12 col-xl-2 mt-xl-0 mt-2 ">
          <a href="{{route('admin.data.jam-praktik')}}" class="text-decoration-none">
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
            <th class="text-secondary">Nama Cabang</th>
            <th class="text-secondary">Jam Praktik</th>
            <th class="text-secondary">Kuota</th>
            <th class="text-secondary">Sisa</th>
            <th class="text-secondary">Status</th>
            <th class="text-secondary">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          @foreach ($times as $time)
          <tr>
            <td>{{$time->id}}</td>
            <td>{{$time->cabang->nama}}</td>
            <td>{{date('H:i' ,strtotime($time->jam_mulai)).'-'.date('H:i' ,strtotime($time->jam_selesai))}}
            <td>{{$time->kuota}}</td>
            <td>{{$time->sisa}}</td>
            <td>{{$time->status ? 'Aktif' : 'Tidak Aktif'}}</td>
            <td class="">
              <div class="btn-wrapper d-flex gap-2 flex-wrap">
                <a href="#" data-id="{{$time->id}}" data-cabang-id="{{$time->id_cabang}}"
                  data-jam-mulai="{{date('H:i' ,strtotime($time->jam_mulai))}}"
                  data-jam-selesai="{{date('H:i' ,strtotime($time->jam_selesai))}}" data-kuota="{{$time->kuota}}"
                  data-status="{{$time->status}}" class="btn edit btn-action btn-warning text-white"><i
                    class="bx bx-edit"></i></a>
                <a href="#" class="delete btn btn-action btn-danger text-white"
                  data-jam-mulai="{{date('H:i' ,strtotime($time->jam_mulai))}}"
                  data-jam-selesai="{{date('H:i' ,strtotime($time->jam_selesai))}}"
                  data-cabang-nama="{{$time->cabang->nama}}" data-id-delete="{{$time->id}}">
                  <i class="bx bx-trash"></i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$times->links('pagination::bootstrap-5')}}
    </div>
  </div>
</div>
@include('Data_Jam_Praktik.modal.data-jam-praktik-modal')
@endsection



@push('js')
<script type="text/javascript">
  let tanggal =  document.querySelector('.tanggal-filter');
  tanggal.value = (moment("{{$tanggal}}").format('YYYY-MM-DD'));

  $(document).on('click', '.edit', function (event){
          event.preventDefault();
          let id = $(this).data('id');
          let id_cabang = $(this).data('cabang-id');
          let jam_mulai = $(this).data('jam-mulai');
          let jam_selesai = $(this).data('jam-selesai');
          let kuota = $(this).data('kuota');
          let status = $(this).data('status');

          console.log(id_cabang);
          $('#editmodal').modal('show');
          $('#id-edit').val(id);
          $('#id-cabang-edit').val(id_cabang);
          $('#jam-mulai-edit').val(jam_mulai);
          $('#jam-selesai-edit').val(jam_selesai);
          $('#kuota-edit').val(kuota);
          $('#status-edit').val(status);
      });
       
      $(document).on('click', '.delete', function(event){
          event.preventDefault();
          let id = $(this).data('id-delete');
          let nama = $(this).data('cabang-nama');
          let jam_mulai = $(this).data('jam-mulai');
          let jam_selesai = $(this).data('jam-selesai');          
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.jam-praktik-modal-delete').html(`${jam_mulai}-${jam_selesai}`);
          $('.cabang-nama-delete').html(nama);
      });
</script>
@endpush