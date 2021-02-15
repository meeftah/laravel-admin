@extends('dashboard.layouts.admin')

@section('title', 'Daftar Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Daftar {{ App\Models\InfoTambahan::getDataById($id) ? App\Models\InfoTambahan::getDataById($id)->judul : '' }}</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Daftar {{ App\Models\InfoTambahan::getDataById($id) ? App\Models\InfoTambahan::getDataById($id)->judul : '' }}</h4>
    <p class="mg-b-0">Daftar info tambahan <b>{{ App\Models\InfoTambahan::getDataById($id) ? App\Models\InfoTambahan::getDataById($id)->judul : '' }}</b></p>
</div>
@endsection

@section('content')
<div class="row">
    @can('info-tambahan-daftar_tambah')
    <div class="col-12 mb-3">
        <a href="{{ route('dashboard.info-tambahan-daftar.create', $id) }}" class="btn btn-success btn-with-icon">
            <div class="ht-40">
                <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                <span class="pd-x-15">Tambah Daftar</span>
            </div>
        </a>
    </div>
    @endcan
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive" data-form="deleteForm"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-dit">
                        <thead>
                            <tr class="text-uppercase">
                                <th>No</th>
                                <th>JUDUL</th>
                                @if(auth()->user()->can('info-tambahan-daftar-detail_tambah') ||
                                auth()->user()->can('info-tambahan-daftar_detail') ||
                                auth()->user()->can('info-tambahan-daftar_ubah') ||
                                auth()->user()->can('info-tambahan-daftar_hapus'))
                                <th width="150">AKSI</th>
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.modals.delete')
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#datatable-dit').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json',
            },
            ajax: "{{ url('dashboard/info-tambahan/daftar/api') }}" + '/' + '{{ $id }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, serachable:false },
                { data: 'judul', name: 'judul' },
                @if(auth()->user()->can('info-tambahan-daftar-detail_tambah') || auth()->user()->can('info-tambahan-daftar_detail') || auth()->user()->can('info-tambahan-daftar_ubah') || auth()->user()->can('info-tambahan-daftar_hapus'))
                { data: 'action', name: 'action', orderable:false, serachable:false }
                @endif
            ],
            columnDefs: [
                { className: 'text-center', width: 30, targets: [0] },
                @if(auth()->user()->can('info-tambahan-daftar-detail_tambah') || auth()->user()->can('info-tambahan-daftar_detail') || auth()->user()->can('info-tambahan-daftar_ubah') || auth()->user()->can('info-tambahan-daftar_hapus'))
                { className: 'text-center', targets: [2] },
                @endif
            ],
            order: [],
        });
    });

    $('body').tooltip({selector: '[data-toggle="tooltip"]'});
</script>
<script>
    var id_delete;
    $(document).on('click', '.delete', function(){
        id_delete = $(this).attr('id');
        $('#confirm-delete').modal('show');
    });

    $('#delete-btn').click(function(){
        $.ajax({
            url: "{{ url('dashboard/info-tambahan/daftar') }}" + '/' + id_delete,
            type: 'POST',
            data: {
                _method:'DELETE'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#confirm-delete').modal('hide');
                $('#datatable-dit').DataTable().ajax.reload();
                if (data.status == 'success') {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            },
        })
    });
</script>
@endpush