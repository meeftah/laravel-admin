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
    <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" id="deskripsi" name="deskripsi">
        {{ old('deskripsi', $edit ? $data->deskripsi : null) }}
    </textarea>
    @error('deskripsi')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label class="form-control-label">Ikon:</label>
    <input class="form-control {{ $errors->has('ikon') ? 'is-invalid' : '' }}" type="file"
        name="ikon" id="ikon" accept="image/jpeg, image/png" onchange="loadIkonPreview(this);">
    @error('ikon')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div id="kolom-ikon" class="row">
    <div class="col-md-5">
        <img id="preview_ikon" width="100%" src="{{ !$edit ? '' : ($data->ikon ? url($data->ikon) : '') }}" />
        <button type="button" id="hapus-ikon" class="btn btn-danger col-12">Hapus Ikon</button>
    </div>
</div>
<input type="hidden" value="{{ $id_info_tambahan }}" name="id_info_tambahan">