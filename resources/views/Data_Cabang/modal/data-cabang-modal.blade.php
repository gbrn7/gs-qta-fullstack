{{-- Create Modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Tambah Cabang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.data.cabang.store')}}" id="addForm" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="nama" class="mb-1">Nama</label>
            <input required class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan Nama Cabang" />
          </div>
          <div class="form-group mb-3">
            <label for="alamat" class="mb-1">Alamat</label>
            <input required class="form-control" type="text" name="alamat" id="alamat"
              placeholder="Masukkan Alamat Cabang" />
          </div>
          <div class="form-group mb-3">
            <label for="no_telepon" class="mb-1">No Telepon</label>
            <input required class="form-control" type="text" name="no_telepon" id="no_telepon"
              placeholder="Masukkan No Telepon" />
          </div>
          <div class="form-group mb-3">
            <label for="status" class="mb-1">Status</label>
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

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="{{route('admin.data.cabang.update')}}" id="editForm" method="POST">
    @csrf
    @method('put')
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Cabang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.data.cabang.update')}}" id="addForm" method="POST">
            @csrf
            @method('put')
            <div class="form-group mb-3">
              <input type="hidden" name="id" id="id-edit">
              <label for="nama" class="mb-1">Nama</label>
              <input required class="form-control" type="text" name="nama" id="nama-edit"
                placeholder="Masukkan Nama Cabang" />
            </div>
            <div class="form-group mb-3">
              <label for="alamat" class="mb-1">Alamat</label>
              <input required class="form-control" type="text" name="alamat" id="alamat-edit"
                placeholder="Masukkan Alamat Cabang" />
            </div>
            <div class="form-group mb-3">
              <label for="no_telepon" class="mb-1">No Telepon</label>
              <input required class="form-control" type="text" name="no_telepon" id="no_telepon-edit"
                placeholder="Masukkan No Telepon" />
            </div>
            <div class="form-group mb-3">
              <label for="status" class="mb-1">Status</label>
              <select name="status" class="form-select" id="status-edit">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning text-white">Update</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Hapus Cabang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Apakah anda yakin mengapus cabang <span class="cabang-nama"></span>?</h4>
      </div>
      <form action="{{route('admin.data.cabang.delete')}}" method="post">
        @method('delete')
        @csrf
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" id="deletealternative" class="btn btn-danger">Hapus</button>
      </form>
    </div>
  </div>
</div>
</div>