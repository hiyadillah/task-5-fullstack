<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary mt-5 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Article
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Silahkan Tambah Article</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form onsubmit="ambilData()">
            @csrf
            <div class="row mb-3">
                <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Nama Artikel') }}</label>

                <div class="col-md-6">
                    <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="isi" class="col-md-4 col-form-label text-md-end">{{ __('Isi') }}</label>

                <div class="col-md-6">
                    <input id="isi" type="text" class="form-control" name="isi" value="{{ old('isi') }}" required autocomplete="isi" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Link Gambar') }}</label>

                <div class="col-md-6">
                    <input id="image" type="text" class="form-control" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
                </div>
            </div>
            <div class=" d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
