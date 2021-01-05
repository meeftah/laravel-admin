@extends('layouts.admin')

@section('title', 'Data Siswa SMPIT')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.calon-siswa.smp.index') }}">Data Siswa SMPIT</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Data Siswa SMPIT</h4>
    <p class="mg-b-0">Daftar Data Siswa SMPIT</p>
</div>
@endsection

@section('content')
<div class="row">
    @can('casissmp_tambah')
    <div class="col-12 mb-3">
        <div class="pull-right">
            <a href="{{ route('dashboard.calon-siswa.smp.create') }}" class="btn btn-success btn-with-icon">
                <div class="ht-40">
                    <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                    <span class="pd-x-15">Tambah</span>
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
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-casissmp">
                        <thead>
                            <tr class="text-uppercase">
                                <th></th>
                                <th>No</th>
                                <th>NAMA</th>
                                <th>KODE VIRTUAL ACCOUNT</th>
                                <th>TGL DAFTAR</th>
                                <th>STATUS</th>
                                @if(auth()->user()->can('casissmp_detail') ||
                                auth()->user()->can('casissmp_ubah') ||
                                auth()->user()->can('casissmp_hapus') || 
                                auth()->user()->can('casissmp_verifikasi'))
                                <th width="200">AKSI</th>
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
@include('modals.ubah-status')
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<style>
    .select2-container{
        z-index:100000;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#datatable-casissmp').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json',
            },
            ajax: "{{ route('dashboard.calon-siswa.smp.api') }}",
            columns: [
                { data: 'id_casis_smp', name: 'id_casis_smp', visible: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, serachable:false },
                { data: 'nm_siswa', name: 'nm_siswa' },
                { data: 'va', name: 'va' },
                { data: 'created_at', name: 'created_at' },
                { data: 'statuscasis', name: 'statuscasis' },
                @if(auth()->user()->can('casissmp_detail') || auth()->user()->can('casissmp_ubah') || auth()->user()->can('casissmp_hapus') || auth()->user()->can('casissmp_verifikasi'))
                { data: 'action', name: 'action', orderable:false, serachable:false }
                @endif
            ],
            columnDefs: [
                { className: 'text-center', width: 30, targets: [1] },
                { className: 'text-center', width: 180, targets: [3] },
                { className: 'text-center', width: 100, targets: [4] },
                { className: 'text-center', width: 200, targets: [5] },
                @if(auth()->user()->can('casissmp_detail') || auth()->user()->can('casissmp_ubah') || auth()->user()->can('casissmp_hapus') || auth()->user()->can('casissmp_verifikasi'))
                { className: 'text-center', targets: [6] },
                @endif
            ],
            order: [],
        });
    });
</script>
<script>
    var id_update;
    $(document).on('click', '.btn-update-status', function(){
        id_update = $(this).attr('id');
        $('#update-status').modal('show');
    });

    $('#btn-update').click(function(){
        if (!$.trim($('#id_status_casis').val())) {
            console.log('kosong');
        } else {
            $.ajax({
                type: 'POST',
                url: "{{ route('dashboard.calon-siswa.smp.update.status') }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                cache: false,
                dataType: 'json',
                data: {
                    id_casis_smp: id_update,
                    id_status_casis: $('#id_status_casis').val(),
                },
                beforeSend: function(){
                    $("#overlay").fadeIn(300);
                },
                complete: function(){
                    $("#overlay").fadeOut(300);
                },
                success:function(data){
                    $('#update-status').modal('hide');
                    $('#id_status_casis').val(1).trigger('change.select2');
                    $('#datatable-casissmp').DataTable().ajax.reload();
                    if (data.status == 'success') {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                },
            })
        }
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
            url: 'smp/' + id_delete,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            data: {_method:'DELETE'},
            beforeSend: function(){
                $("#overlay").fadeIn(300);
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            success:function(data){
                $('#confirm-delete').modal('hide');
                $('#datatable-casissmp').DataTable().ajax.reload();
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