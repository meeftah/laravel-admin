@extends('dashboard.layouts.admin')

@section('title', 'Tambah Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.users.index') }}">Info Tambahan</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Tambah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Tambah Info Tambahan</h4>
    <p class="mg-b-0">Tambah info tambahan baru</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.info-tambahan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.infotambahan.form', ['edit' => false])
                    <div class="form-layout-footer mt-4">
                        <button type="submit" class="btn btn-success col-md-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#deskripsi').summernote({
            height: 250
        });

        $('#kolom-ikon').hide();

        $('#hapus-ikon').click(function(){
            $('#ikon').val('');
            $('#kolom-ikon').hide();
        });
    });

   function loadIkonPreview(input, id) {
      id = id || '#preview_ikon';
      if (input.files && input.files[0]) {
        $('#kolom-ikon').show();
          var reader = new FileReader();
          reader.onload = function (e) {
              $(id).attr('src', e.target.result)
          };
          reader.readAsDataURL(input.files[0]);
      } else {
          $('#kolom-ikon').hide();
      }
   }
</script>
@endpush