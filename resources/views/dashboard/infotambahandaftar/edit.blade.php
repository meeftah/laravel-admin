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
                    @include('dashboard.infotambahan.form', ['edit' => true, 'data' => $infoTambahan])
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
    $(document).ready( function () {
        var dataGambar = {{ $infoTambahan->gambar ? 1 : 0 }};
        if (!dataGambar) {
            $('#kolom-gambar').hide();
        }

        $('#hapus-gambar').click(function(){
            if (!dataGambar) {
                $('#gambar').val('');
                $('#kolom-gambar').hide();
            } else {
                var form_data = new FormData();
                form_data.append('id', {{ $infoTambahan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ url('dashboard/info-tambahan/delete/gambar') }}" +,
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: form_data,
                    dataType: 'json',
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);
                    },
                    complete: function(){
                        $("#overlay").fadeOut(300);
                    },
                    success: function (result) {
                        if (result.status) {
                            $('#kolom-gambar').hide();
                        } else {
                            toastr.error('Gagal menghapus gambar');
                        }
                    },
                    error: function (result) {
                        console.log('An error occurred.');
                        console.log(result);
                    }
                });
            }
        });
    });

    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
        $('#kolom-gambar').show();
          var reader = new FileReader();
          reader.onload = function (e) {
              $(id).attr('src', e.target.result)
          };
          reader.readAsDataURL(input.files[0]);
      } else {
          $('#kolom-gambar').hide();
      }
   }
</script>
@endpush