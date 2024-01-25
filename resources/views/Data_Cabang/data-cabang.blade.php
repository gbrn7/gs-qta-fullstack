@extends('layouts.base')
@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-building-2-line fs-2"></i>
  <p class="fs-3 m-0">Data Cabang</p>
</div>
<div class="breadcrumbs-box mt-2 rounded rounded-2 bg-white p-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><i class="ri-arrow-left-right-line"></i>Sehat Qta
      </li>
      <li class="breadcrumb-item active" aria-current="page">Data Cabang</li>
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
        class="ri-add-box-line me-2"></i>Tambah Cabang</div>

    <form action="{{route('admin.data.cabang')}}" method="POST">
      @csrf
      <div class="filter-wrapper row align-items-end mt-2">

        <div class="form-group col-12 mt-2 col-md-2">
          <label for="keyword" class="mb-1 text-left">Cari Nama :</label>
          <div class="input-group">
            <input class="form-control col-8" type="text" name="nama" value="@isset($nama) {{$nama}} @endisset" />
          </div>
        </div>

        <div class="wrapper col-12 col-xl-2 mt-xl-0 mt-2 ">
          <button class="btn btn-primary w-100" type="submit">Terapkan</button>
        </div>

        <div class="wrapper col-12 col-xl-2 mt-xl-0 mt-2 ">
          <a href="{{route('admin.data.cabang')}}" class="text-decoration-none">
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
            <th class="text-secondary">Nama</th>
            <th class="text-secondary">Alamat</th>
            <th class="text-secondary">No Telepon</th>
            <th class="text-secondary">Status</th>
            <th class="text-secondary">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          @foreach ($branchs as $branch)
          <tr>
            <td>{{$branch->id}}</td>
            <td>{{$branch->nama}}</td>
            <td>{{$branch->alamat}}</td>
            <td>{{$branch->no_telepon}}</td>
            <td>{{$branch->status ? 'Aktif' : 'Tidak Aktif'}}</td>
            <td class="">
              <div class="btn-wrapper d-flex gap-2 flex-wrap">
                <a href="#" data-id="{{$branch->id}}" data-nama="{{$branch->nama}}" data-alamat="{{$branch->alamat}}"
                  data-no-telepon="{{$branch->no_telepon}}" data-status="{{$branch->status}}"
                  class="btn edit btn-action btn-warning text-white"><i class="bx bx-edit"></i></a>
                <a href="#" class="delete btn btn-action btn-danger text-white" data-nama="{{$branch->nama}}"
                  data-id="{{$branch->id}}">
                  <i class="bx bx-trash"></i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$branchs->links('pagination::bootstrap-5')}}
    </div>
  </div>
</div>
@endsection
@include('Data_Cabang.modal.data-cabang-modal')

@push('js')
<script type="text/javascript">
  $(document).on('click', '.edit', function (event){
          event.preventDefault();
          let id = $(this).data('id');
          let nama = $(this).data('nama');
          let alamat = $(this).data('alamat');
          let no_telepon = $(this).data('no-telepon');
          let status = $(this).data('status');
          $('#editmodal').modal('show');
          $('#id-edit').val(id);
          $('#nama-edit').val(nama);
          $('#alamat-edit').val(alamat);
          $('#no_telepon-edit').val(no_telepon);
          $('#status-edit').val(status);
      });
       
      $(document).on('click', '.delete', function(event){
          event.preventDefault();
          let id = $(this).data('id');
          let nama = $(this).data('nama');
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.cabang-nama').html(nama);
      });
</script>
@endpush