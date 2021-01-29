@extends('dashboard.layouts.admin')

@section('title', 'Detail Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Detail</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Detail Info Tambahan</h4>
    <p class="mg-b-0">Detail info tambahan {{ $infoTambahan->judul }}</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="widget-2">
            <div class="card shadow-base overflow-hidden">
                <div class="card-header p-3">
                    <h6 class="card-title tx-16-force" style="text-transform: none">
                        {{ $infoTambahan->judul }}
                    </h6>
                </div>
                <div class="card-body">
                    <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                          <div class="card-header" role="tab" id="headingOne">
                            <h6 class="mg-b-0" style="width: 100%">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                              aria-expanded="false" aria-controls="collapseOne" class="tx-gray-800 transition">
                                Making a Beautiful CSS3 Button Set
                              </a>
                            </h6>
                          </div><!-- card-header -->
                      
                          <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-block pd-20">
                              A concisely coded CSS3 button set increases...
                            </div>
                          </div>
                        </div><!-- card -->
                        <!-- ADD MORE CARD HERE -->
                      </div><!-- accordion -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection