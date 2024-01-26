{{-- Create Modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Tambah Jam Praktik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.data.jam-praktik.store')}}" id="addForm" method="POST">
          @csrf
          <div class=" form-group">
            <label class="mb-1 text-left">Cabang :</label>
            <select name="id_cabang" class="form-select">
              <option value="">semua</option>
              @foreach ($branchs as $branch)
              <option value="{{$branch->id}}">
                {{$branch->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="keyword" class="mb-1 text-left">Jam Mulai :</label>
            <div class="input-group">
              <input class="form-control col-8 tanggal" type="time" name="jam_mulai"
                placeholder="Masukkan jam mulai praktik" required />
            </div>
          </div>
          <div class="form-group">
            <label for="keyword" class="mb-1 text-left">Jam Selesai :</label>
            <div class="input-group">
              <input class="form-control col-8 tanggal" type="time" name="jam_selesai"
                placeholder="Masukkan jam selesai praktik" required />
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="no_telepon" class="mb-1">Kuota</label>
            <input required min="0" class="form-control" type="number" name="kuota" id="kuota"
              placeholder="Masukkan kuota jam praktik" required />
          </div>
          <div class="form-group mb-3">
            <label for="status" class="mb-1">Status</label>
            <select name="status" class="form-select" required>
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
  <form action="{{route('admin.data.jam-praktik.update')}}" id="editForm" method="POST">
    @csrf
    @method('put')
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Cabang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.data.jam-praktik.store')}}" id="addForm" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="id" id="id-edit">
            <div class=" form-group">
              <label class="mb-1 text-left">Cabang :</label>
              <select name="id_cabang" id="id-cabang-edit" class="form-select" required>
                @foreach ($branchs as $branch)
                <option value="{{$branch->id}}">
                  {{$branch->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="keyword" class="mb-1 text-left">Jam Mulai :</label>
              <div class="input-group">
                <input class="form-control col-8 tanggal" id="jam-mulai-edit" type="time" name="jam_mulai"
                  placeholder="Masukkan jam mulai praktik" required />
              </div>
            </div>
            <div class="form-group">
              <label for="keyword" class="mb-1 text-left">Jam Selesai :</label>
              <div class="input-group">
                <input class="form-control col-8 tanggal" id="jam-selesai-edit" type="time" name="jam_selesai"
                  placeholder="Masukkan jam selesai praktik" required />
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="no_telepon" class="mb-1">Kuota</label>
              <input required min="0" class="form-control" type="number" name="kuota" id="kuota-edit"
                placeholder="Masukkan kuota jam praktik" required />
            </div>
            <div class="form-group mb-3">
              <label for="status" class="mb-1">Status</label>
              <select name="status" class="form-select" id="status-edit" required>
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
        <h5 class="modal-title" id="myModalLabel">Hapus Jam Praktik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Apakah anda yakin mengapus Jam Praktik <span class="jam-praktik-modal-delete"></span>
          pada cabang <span class="cabang-nama-delete"></span>?</h4>
      </div>
      <form action="{{route('admin.data.jam-praktik.delete')}}" method="post">
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