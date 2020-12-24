@extends('layouts.admin')

@section('title', 'Daftar Data Jenis Dokumen')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.jenisdokumen.index') }}">Data Jenis Dokumen</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Data Jenis Dokumen</h4>
    <p class="mg-b-0">Master data Jenis Dokumen</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-4 mb-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("dashboard.jenisdokumen.store") }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-control-label">jenisdokumen: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('jenisdokumen') ? 'is-invalid' : '' }}" type="text"
                            name="jenisdokumen" placeholder="Masukkan data jenisdokumen"
                            value="{{ old('jenisdokumen', null) }}">
                        @error('jenisdokumen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Unit: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="text"
                            name="unit" placeholder="Masukkan unit" value="{{ old('unit', null) }}">
                        @error('unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-layout-footer">
                        <button class="btn btn-success col-sm-12 col-md-6">Simpan</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap" data-form="deleteForm"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-jenisdokumen">
                        <thead>
                            <tr class="text-uppercase">
                                <th></th>
                                <th>No</th>
                                <th>JENIS DOKUMEN</th>
                                <th>UNIT</th>
                                @if(auth()->user()->can('jenisdokumen_detail') || auth()->user()->can('jenisdokumen_ubah')
                                ||
                                auth()->user()->can('jenisdokumen_hapus'))
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
        $('#datatable-jenisdokumen').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json',
            },
            ajax: "{{ route('dashboard.jenisdokumen.api') }}",
            columns: [
                { data: 'id_jenisdokumen', name: 'id_jenisdokumen', visible: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, serachable:false },
                { data: 'unit', name: 'unit' },
                { data: 'jenisdokumen', name: 'jenisdokumen' },
                @if(auth()->user()->can('jenisdokumen_detail') || auth()->user()->can('jenisdokumen_ubah') || auth()->user()->can('jenisdokumen_hapus'))
                { data: 'action', name: 'action', orderable:false, serachable:false }
                @endif
            ],
            columnDefs: [
                { className: 'text-center', width: 30, targets: [1] },
                { className: 'text-center', width: 60, targets: [2] },
                @if(auth()->user()->can('jenisdokumen_detail') || auth()->user()->can('jenisdokumen_ubah') || auth()->user()->can('jenisdokumen_hapus'))
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
            url: 'jenisdokumen/' + id_delete,
            type: 'POST',
            data: {
                _method:'DELETE'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#confirm-delete').modal('hide');
                $('#datatable-jenisdokumen').DataTable().ajax.reload();
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