@extends('dashboard.layouts.admin')

@section('title', 'Ubah Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Info Tambahan</h4>
    <p class="mg-b-0">Ubah info tambahan {{ $infoTambahan->judul }}</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.info-tambahan.update', $infoTambahan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Judul: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" type="text"
                            name="judul" placeholder="Masukkan judul" value="{{ old('judul', $infoTambahan->judul) }}">
                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Deskripsi:</label>
                        <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text"
                            name="deskripsi" placeholder="Masukkan deskripsi"
                            value="{{ old('deskripsi', $infoTambahan->deskripsi) }}">
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Gambar:</label>
                        <input class="form-control {{ $errors->has('gambar') ? 'is-invalid' : '' }}" type="file"
                            name="gambar" onchange="loadPreview(this);">
                        @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img id="preview_img" src="{{ url($infoTambahan->gambar) }}" width="100%" />
                        </div>
                    </div>
                    <div class="form-layout-footer mt-4">
                        <button class="btn btn-warning col-md-3">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $(id).attr('src', e.target.result)   
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endpush