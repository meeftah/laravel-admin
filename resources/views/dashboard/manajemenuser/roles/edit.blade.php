@extends('dashboard.layouts.admin')

@section('title', 'Ubah Peran')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.roles.index') }}">Peran</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Peran</h4>
    <p class="mg-b-0">Ubah peran {{ $role->name }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.roles.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">Peran: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" placeholder="Masukkan nama peran" value="{{ old('name', $role->name) }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">Peran: <span class="tx-danger">*</span></label>
                        <select name="permissions[]" id="permissions" class="form-control select2 select2-multiple"
                            multiple="multiple" data-placeholder="Pilih Hak Akses" style="width: 100%">
                            @foreach($permissions as $id => $permissions)
                            <option value="{{ $id }}"
                                {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>
                                {{ $permissions }}</option>
                            @endforeach
                        </select>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mg-t-10">
                    <div class="form-layout-footer">
                        <button class="btn btn-warning col-12">
                            Ubah
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#role').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>
@endpush