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
<input type="hidden" value="{{ $id_info_tambahan }}" name="id_info_tambahan">