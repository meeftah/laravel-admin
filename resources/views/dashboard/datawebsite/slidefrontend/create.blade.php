@extends('layouts.admin')

@section('title', 'Tambah Slide')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.slidefrontend.index') }}">Data Slide</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Tambah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Tambah Data Slide</h4>
    <p class="mg-b-0">Tambah slide baru</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.slidefrontend.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5 mb-3" style="margin-top: 30px">
                    <img id="previewimage" style="display:none;" class="col-12 mb-3" />
                    <label class="custom-file col-12" for="slideImage">
                        <input type="file" id="slideImage" name="slideImage"
                            class="custom-file-input {{ $errors->has('slideImage') ? 'is-invalid' : '' }}"
                            accept="image/png, image/jpeg">
                        <span class="custom-file-control custom-file-control-primary"></span>
                    </label>
                    @error('slideImage')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="alert alert-warning alert-block mt-3">
                        <p>
                            jenis JPG / PNG, maksimal 4MB & dimentions 1920 X 857
                        </p>
                    </div>
                    <input type="hidden" name="x1" value="" />
                    <input type="hidden" name="y1" value="" />
                    <input type="hidden" name="w" value="" />
                    <input type="hidden" name="h" value="" />
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Judul:</label>
                        <input class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" type="text"
                            name="judul" placeholder="Masukkan judul slide" value="{{ old('judul', null) }}">
                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Deskripsi:</label>
                        <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text"
                            name="deskripsi" placeholder="Masukkan deskripsi slide"
                            value="{{ old('deskripsi', null) }}">
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">URL:</label>
                        <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url"
                            placeholder="Masukkan url slide" value="{{ old('url', null) }}">
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Teks URL:</label>
                        <input class="form-control {{ $errors->has('url_teks') ? 'is-invalid' : '' }}" type="text" name="url_teks"
                            placeholder="Masukkan url_teks slide" value="{{ old('url_teks', null) }}">
                        @error('url_teks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                        <select
                            class="form-control select2-show-search {{ $errors->has('status') ? 'is-invalid' : '' }}"
                            id="status" name="status" data-placeholder="Pilih Status" style="width: 100%">
                            <option></option>
                            <option value="0">TIDAK AKTIF</option>
                            <option value="1">AKTIF</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-layout-footer text-center mt-4">
                        <button class="btn btn-success">Tambah</button>
                    </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/imgareaselect/css/imgareaselect.css') }}" rel="stylesheet">
<style>
    .input-validation-error~.select2 .select2-selection {
        border: 1px solid red;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/imgareaselect/js/jquery.imgareaselect.dev.js') }}"></script>
<script>
    $(document).ready(function () {
        'use strict';

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        var p = $("#previewimage");

        $("body").on("change", "#slideImage", function(){
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector("#slideImage").files[0]);

            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        $('#previewimage').imgAreaSelect({
            aspectRatio : '16:7',
            onSelectEnd: function (img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="w"]').val(selection.width);
                $('input[name="h"]').val(selection.height);
            }
        });
    });
</script>
@endpush