<div class="form-group">
    <label class="form-control-label">Judul: <span class="tx-danger">*</span></label>
    <input class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" type="text"
        name="judul" placeholder="Masukkan judul" value="{{ old('judul', $edit ? $data->judul : null) }}">
    @error('judul')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label class="form-control-label">Deskripsi:</label>
    <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text"
        name="deskripsi" placeholder="Masukkan deskripsi" value="{{ old('deskripsi', $edit ? $data->deskripsi : null) }}">
    @error('deskripsi')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label class="form-control-label">Gambar:</label>
    <input class="form-control {{ $errors->has('gambar') ? 'is-invalid' : '' }}" type="file"
        name="gambar" id="gambar" accept="image/jpeg, image/png" onchange="loadPreview(this);">
    @error('gambar')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div id="kolom-gambar" class="row">
    <div class="col-md-5">
        <img id="preview_img" width="100%" src="{{ !$edit ? '' : ($data->gambar ? url($data->gambar) : '') }}" />
        <button type="button" id="hapus-gambar" class="btn btn-danger col-12">Hapus Gambar</button>
    </div>
</div>