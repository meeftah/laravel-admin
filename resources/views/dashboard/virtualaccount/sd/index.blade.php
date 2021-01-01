@extends('layouts.admin')

@section('title', 'Data Virtual Account SDIT')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.va.sd.index') }}">Data Virtual Account SDIT</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Data Virtual Account SDIT</h4>
    <p class="mg-b-0">Master data Virtual Account SDIT</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-4 mb-5">
        <div class="card">
            <div class="card-body">
                {{-- <form action="{{ route("dashboard.va.sd.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Virtual Account: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('va') ? 'is-invalid' : '' }}" type="text"
                            name="va" placeholder="Masukkan Virtual Account" value="{{ old('va', null) }}">
                        @error('va')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Kode Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('kode_nama') ? 'is-invalid' : '' }}" type="text"
                            name="kode_nama" placeholder="Masukkan Kode Nama"
                            value="{{ old('kode_nama', null) }}">
                        @error('kode_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text"
                            name="status" placeholder="Masukkan status VA"
                            value="{{ old('status', null) }}">
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-success col-sm-12 col-md-6">Simpan</button>
                    </div><!-- form-layout-footer -->
                </form> --}}
                <form action="{{ route("dashboard.va.sd.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Nomor Awal: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('nomor_awal') ? 'is-invalid' : '' }}" type="text"
                            name="nomor_awal" placeholder="Masukkan Nomor Awal" value="{{ old('nomor_awal', null) }}"
                            minlength="1" maxlength="4"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        @error('nomor_awal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Nomor Akhir: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('nomor_akhir') ? 'is-invalid' : '' }}" type="text"
                            name="nomor_akhir" placeholder="Masukkan Nomor Akhir" value="{{ old('nomor_akhir', null) }}"
                            minlength="1" maxlength="4"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        @error('nomor_akhir')
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
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-vasd">
                        <thead>
                            <tr class="text-uppercase">
                                <th></th>
                                <th>No</th>
                                <th>VA</th>
                                <th>KODE NAMA VA</th>
                                <th>STATUS</th>
                                @if(auth()->user()->can('vasd_detail') || auth()->user()->can('vasd_ubah')
                                ||
                                auth()->user()->can('vasd_hapus'))
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
        $('#datatable-vasd').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json',
            },
            ajax: "{{ route('dashboard.va.sd.api') }}",
            columns: [
                { data: 'id_va_sd', name: 'id_va_sd', visible: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, serachable:false },
                { data: 'va', name: 'va' },
                { data: 'kode_nama', name: 'kode_nama' },
                { data: 'status', name: 'status' },
                @if(auth()->user()->can('vasd_detail') || auth()->user()->can('vasd_ubah') || auth()->user()->can('vasd_hapus'))
                { data: 'action', name: 'action', orderable:false, serachable:false }
                @endif
            ],
            columnDefs: [
                { className: 'text-center', width: 30, targets: [1] },
                { className: 'text-center', width: 70, targets: [2] },
                { className: 'text-center', targets: [4] },
                @if(auth()->user()->can('vasd_detail') || auth()->user()->can('vasd_ubah') || auth()->user()->can('vasd_hapus'))
                { className: 'text-center', targets: [5] },
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
            url: 'sd/' + id_delete,
            type: 'POST',
            data: {
                _method:'DELETE'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#confirm-delete').modal('hide');
                $('#datatable-vasd').DataTable().ajax.reload();
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