@extends('layouts.admin')

@section('title', 'Daftar Hak Akses')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.permissions.index') }}">Hak Akses</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Hak Akses</h4>
    <p class="mg-b-0">Daftar hak akses</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-4 mb-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("dashboard.permissions.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Hak Akses: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('akses') ? 'is-invalid' : '' }}" type="text"
                            name="akses" placeholder="Masukkan judul hak akses" value="{{ old('akses', null) }}">
                        @error('akses')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="custom-control custom-checkbox mb-2">
                            <label class="ckbox">
                                <input type="checkbox" value="lihat" id="opsi-lihat" name="opsi[]" checked>
                                <span>LIHAT</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <label class="ckbox">
                                <input type="checkbox" value="tambah" id="opsi-tambah" name="opsi[]" checked>
                                <span>TAMBAH</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <label class="ckbox">
                                <input type="checkbox" value="detail" id="opsi-detail" name="opsi[]" checked>
                                <span>DETAIL</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <label class="ckbox">
                                <input type="checkbox" value="ubah" id="opsi-ubah" name="opsi[]" checked>
                                <span>UBAH</span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <label class="ckbox">
                                <input type="checkbox" value="hapus" id="opsi-hapus" name="opsi[]" checked>
                                <span>HAPUS</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-primary col-sm-12 col-md-6">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap" data-form="deleteForm"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-permissions">
                        <thead>
                            <tr class="text-uppercase">
                                <th></th>
                                <th>No</th>
                                <th>Hak Akses</th>
                                @if(auth()->user()->can('permissions_detail') || auth()->user()->can('permissions_ubah')
                                || auth()->user()->can('permissions_hapus'))
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
        $('#datatable-permissions').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json',
            },
            ajax: "{{ route('dashboard.permissions.api') }}",
            columns: [
                { data: 'id', name: 'id', visible: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, serachable:false },
                { data: 'name', name: 'name' },
                @if(auth()->user()->can('permissions_detail') || auth()->user()->can('permissions_ubah') || auth()->user()->can('permissions_hapus'))
                { data: 'action', name: 'action', orderable:false, serachable:false }
                @endif
            ],
            columnDefs: [
                { className: 'text-center', width: 30, targets: [1] },
                @if(auth()->user()->can('permissions_detail') || auth()->user()->can('permissions_ubah') || auth()->user()->can('permissions_hapus'))
                { className: 'text-center', targets: [3] },
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
            url: 'permissions/' + id_delete,
            type: 'POST',
            data: {
                _method:'DELETE'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#confirm-delete').modal('hide');
                $('#datatable-permissions').DataTable().ajax.reload();
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