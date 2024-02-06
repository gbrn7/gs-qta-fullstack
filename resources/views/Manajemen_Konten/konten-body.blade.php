@extends('layouts.base')

@section('content')
<div class="title-box  d-flex gap-2 align-items-baseline"><i class="ri-window-2-line fs-2"></i>
  <p class="fs-3 m-0">Manajemen Konten Body</p>
</div>
<div class="breadcrumbs-box rounded rounded-2 bg-white p-2 mt-2">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item d-flex gap-2 align-items-center"><a href="{{route('admin.home')}}"
          class="text-decoration-none"> <i class="ri-window-2-line me-2"></i>GS Sehat Qta</a>
      </li>
      <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.manajemen.konten')}}"
          class="text-decoration-none">Manajemen Konten</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manajemen Konten Body</li>
    </ol>
  </nav>
</div>
<div class="content-box p-3 mt-3 rounded rounded-2 bg-white">
  <div class="content overflow-auto rounded rounded-2 border border-1 p-3">
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
      <a href="{{route('admin.manajemen.konten.body.create')}}" class="btn btn-success text-decoration-none"><i
          class="ri-add-box-line"></i> Tambah Konten Body
      </a>
      <div id="edit" data-bs-toggle="modal" data-bs-target="#editJudulBody" class="btn btn-warning"><i
          class="bx bx-edit me-2"></i>Edit Judul</div>
    </div>
    <div class="Produk mt-2 mb-2">
      <table id="jqTable" class="table table-striped mt-3 table-hover" style="width: 100%">
        <thead>
          <tr>
            <th class="text-secondary">Nomor</th>
            <th class="text-secondary">Judul</th>
            <th class="text-secondary">Deskripsi</th>
            <th class="text-secondary">Thumbnail</th>
            <th class="text-secondary">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          @foreach ($kontenPelayanan as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->judul}}</td>
            <td>{{$item->deskripsi}}</td>
            <td><img alt="img" src="{{ asset('storage/image/'.$item->thumbnail)}}" class="img-fluid"></td>
            <td class="">
              <div class="btn-wrapper d-flex gap-2 flex-wrap">
                <a href="{{route('admin.manajemen.konten.body.edit', $item->id)}}"
                  class="btn edit btn-action btn-warning text-white"><i class="bx bx-edit"></i></a>
                <a href="#" class="delete btn btn-action btn-danger text-white" data-judul="{{$item->judul}}"
                  data-id="{{$item->id}}">
                  <i class="bx bx-trash"></i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Edit Judul Modal -->
<div class="modal fade" id="editJudulBody" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Judul</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.manajemen.konten.body.judul.update')}}" id="addForm" method="POST">
          @csrf
          @method('put')
          <div class="form-group mb-3">
            <label for="nama" class="mb-1">Judul</label>
            <input required class="form-control" value="{{$judulKontenPelayanan->judul}}" name="judul"
              placeholder="Masukkan judul konten body" />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Hapus Alternatif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Apakah anda yakin mengapus informasi <span class="item-body-judul"></span>?</h4>
      </div>
      <form action="{{route('admin.manajemen.konten.body.delete')}}" method="post">
        @method('delete')
        @csrf
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" id="deleteitem-body" class="btn btn-danger">Hapus</button>
      </form>
    </div>
  </div>
</div>


@endsection

@push('js')
<script type="text/javascript">
  $(document).on('click', '.delete', function(event){
          event.preventDefault();
          var id = $(this).data('id');
          var judul = $(this).data('judul');
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.item-body-judul').html(judul);
      });
</script>
@endpush