@extends('layouts.admin')

@section('title', 'Data Gambar')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.slidefrontend.index') }}">Gambar Slide</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Gambar Slide</h4>
    <p class="mg-b-0">Daftar Gambar Slide</p>
</div>
@endsection

@section('content')
<div class="row">
    @can('slidefrontend_tambah')
    <div class="col-12 mb-3">
        <div class="pull-right">
            <a href="{{ route('dashboard.slidefrontend.create') }}" class="btn btn-success btn-with-icon">
                <div class="ht-40">
                    <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                    <span class="pd-x-15">Tambah Slide</span>
                </div>
            </a>
        </div>
    </div>
    @endcan
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive" data-form="deleteForm"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-slidefrontend">
                        <thead>
                            <tr class="text-uppercase">
                                <th></th>
                                <th>No</th>
                                <th>GAMBAR</th>
                                <th>STATUS</th>
                                @if(auth()->user()->can('slidefrontend_detail') || auth()->user()->can('slidefrontend_ubah')
                                ||
                                auth()->user()->can('slidefrontend_hapus'))
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
@include('modals.delete')
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
        $('#datatable-slidefrontend').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json',
            },
            ajax: "{{ route('dashboard.slidefrontend.api') }}",
            columns: [
                { data: 'id_slidefrontend', name: 'id_slidefrontend', visible: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, serachable:false },
                { data: 'gambar', name: 'gambar' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'status', name: 'status' },
                @if(auth()->user()->can('slidefrontend_detail') || auth()->user()->can('slidefrontend_ubah') || auth()->user()->can('slidefrontend_hapus'))
                { data: 'action', name: 'action', orderable:false, serachable:false }
                @endif
            ],
            columnDefs: [
                { className: 'text-center', width: 30, targets: [1] },
                @if(auth()->user()->can('slidefrontend_detail') || auth()->user()->can('slidefrontend_ubah') || auth()->user()->can('slidefrontend_hapus'))
                { className: 'text-center', targets: [4] },
                @endif
            ],
            order: [],
        });
    });
</script>
<script>
    var id_delete;
    $(document).on('click', '.delete', function(){
        id_delete = $(this).attr('id');
        $('#confirm-delete').modal('show');
    });

    $('#delete-btn').click(function(){
        $.ajax({
            url: 'slidefrontend/' + id_delete,
            type: 'POST',
            data: {
                _method:'DELETE'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#confirm-delete').modal('hide');
                $('#datatable-slidefrontend').DataTable().ajax.reload();
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