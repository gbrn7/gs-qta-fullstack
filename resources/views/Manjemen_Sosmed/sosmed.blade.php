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
      <li class="breadcrumb-item active" aria-current="page">Manajemen Sosmed</li>
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
      <a href="#" data-bs-toggle="modal" data-bs-target="#addSosmed" class="btn btn-success text-decoration-none"><i
          class="ri-add-box-line"></i>
        Tambah Sosmed
      </a>

    </div>
    <div class="Produk mt-2 mb-2">
      <table id="jqTableSosmed" class="table table-striped mt-3 table-hover" style="width: 100%">
        <thead>
          <tr>
            <th class="text-secondary">Nomor</th>
            <th class="text-secondary">Nama</th>
            <th class="text-secondary">Link</th>
            <th class="text-secondary">Status</th>
            <th class="text-secondary">Icon</th>
            <th class="text-secondary">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          @foreach ($sosmed as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->link}}</td>
            <td>{{$item->status ? 'Aktif' : 'Tidak Aktif'}}</td>
            <td><img alt="img" src="{{ asset('storage/image/'.$item->icon)}}" class="img-icon"></td>
            <td class="">
              <div class="btn-wrapper d-flex gap-2 flex-wrap">
                <a href="#" data-id="{{$item->id}}" data-nama="{{$item->nama}}" data-status="{{$item->status}}"
                  data-link-edit="{{$item->link}}" class="btn edit btn-action btn-warning text-white"><i
                    class="bx bx-edit"></i></a>
                <a href="#" class="delete btn btn-action btn-danger text-white" data-nama="{{$item->nama}}"
                  data-judul="{{$item->judul}}" data-id="{{$item->id}}">
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

<!-- Create Judul Modal -->
<div class="modal fade" id="addSosmed" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Tambah Sosmed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.manajemen.sosmed.create')}}" id="addForm" method="POST"
          enctype="multipart/form-data">
          @csrf
          @method('post')
          <div class="form-group mb-3">
            <label for="nama" class="mb-1">Nama Sosmed</label>
            <input type="text" name="nama" required class="form-control" id="nama" placeholder="Masukkan nama sosmed">
          </div>
          <div class="form-group mb-3">
            <label for="link" class="mb-1">Link Sosmed</label>
            <input type="text" name="link" required class="form-control" id="link" placeholder="Masukkan link sosmed">
          </div>
          <div class="form-group mb-3">
            <label for="icon" class="mb-1">Icon</label>
            <input type="file" name="icon" required class="form-control" id="icon" placeholder="Masukkan icon sosmed">
          </div>
          <div class="form-group mb-3">
            <label for="icon" class="mb-1">Status</label>
            <select name="status" class="form-select">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Judul Modal -->
<div class="modal fade" id="editSosmed" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Sosmed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.manajemen.sosmed.edit')}}" id="addForm" method="POST"
          enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" name="id" id="id-edit">
          <div class="form-group mb-3">
            <label for="nama" class="mb-1">Nama Sosmed</label>
            <input type="text" name="nama" required class="form-control" id="nama-edit"
              placeholder="Masukkan nama sosmed">
          </div>
          <div class="form-group mb-3">
            <label for="link" class="mb-1">Link Sosmed</label>
            <input type="text" name="link" required class="form-control" id="link-edit"
              placeholder="Masukkan link sosmed">
          </div>
          <div class="form-group mb-3">
            <label for="icon" class="mb-1">Perbarui Icon</label>
            <input type="file" name="icon" class="form-control" id="icon" placeholder="Masukkan icon sosmed">
          </div>
          <div class="form-group mb-3">
            <label for="icon" class="mb-1">Status</label>
            <select name="status" id="status-edit" class="form-select">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning text-white">Perbarui</button>
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
        <h5 class="modal-title" id="myModalLabel">Hapus Sosmed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Apakah anda yakin mengapus info sosmed <span class="item-body-sosmed"></span>?</h4>
      </div>
      <form action="{{route('admin.manajemen.sosmed.delete')}}" method="post">
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
  $(document).on('click', '.edit', function (event){
          event.preventDefault();
          let id = $(this).data('id');
          let nama = $(this).data('nama');
          let link = $(this).data('link-edit');
          let status = $(this).data('status');
          $('#editSosmed').modal('show');
          $('#id-edit').val(id);
          $('#nama-edit').val(nama);
          $('#link-edit').val(link);
          $('#status-edit').val(status);
      });

  $(document).on('click', '.delete', function(event){
          event.preventDefault();
          let id = $(this).data('id');
          let nama = $(this).data('nama');
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.item-body-sosmed').html(nama);
      });
</script>
@endpush