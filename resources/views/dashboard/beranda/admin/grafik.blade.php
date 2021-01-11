<div class="col-md-12 bg-gray-100 text-black-50 no-gutters shadow-base">
    <p class="mg-b-0 p-3">
        <span class="square-10 bg-{{ config('ppdb.status.calon_siswa.terdaftar_bct') }} mg-r-10"></span> Terdaftar
        <span class="square-10 bg-{{ config('ppdb.status.calon_siswa.terverifikasi_bct') }} mg-r-10 mg-l-30"></span>
        Terverifikasi
        <span class="square-10 bg-{{ config('ppdb.status.calon_siswa.datalengkap_bct') }} mg-r-10 mg-l-30"></span>
        Data Lengkap
        <span class="square-10 bg-{{ config('ppdb.status.calon_siswa.siaptes_bct') }} mg-r-10 mg-l-30"></span> Siap
        Tes
    </p>
</div>
<div class="row no-gutters widget-1 shadow-base">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title tx-18-force">UNIT TKIT</h4>
            </div>
            <div class="card-body">
                <span id="sparkTk">10,12,5,2,40,3,38,78</span>
                <span class="mg-r-10 tx-black" style="font-size: 30pt">{{ $casisTk->count() }}</span>
                <p style="position: absolute; right: 30px; top: 95px;">Jumlah Siswa</p>
            </div>
            <div class="card-footer">
                <div class="text-left text-{{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6>{{ App\Models\CasisTk::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6>{{ App\Models\CasisTk::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right text-{{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6>{{ App\Models\CasisTk::getDataLengkap()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.siaptes_bct') }}">
                    <h6>{{ App\Models\CasisTk::getSiapTes()->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title tx-18-force">UNIT SDIT</h4>
            </div>
            <div class="card-body">
                <span id="sparkSd">5,3,9,6,5,9,7,3,5,2</span>
                <span class="mg-r-10 tx-black" style="font-size: 30pt">{{ $casisSd->count() }}</span>
                <p style="position: absolute; right: 30px; top: 95px;">Jumlah Siswa</p>
            </div>
            <div class="card-footer">
                <div class="text-left text-{{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6>{{ App\Models\CasisSd::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6>{{ App\Models\CasisSd::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right text-{{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6>{{ App\Models\CasisSd::getDataLengkap()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.siaptes_bct') }}">
                    <h6>{{ App\Models\CasisSd::getSiapTes()->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title tx-18-force">UNIT SMPIT</h4>
            </div>
            <div class="card-body">
                <span id="sparkSmp">5,3,9,6,5,9,7,3,5,2</span>
                <span class="mg-r-10 tx-black" style="font-size: 30pt">{{ $casisSmp->count() }}</span>
                <p style="position: absolute; right: 30px; top: 95px;">Jumlah Siswa</p>
            </div>
            <div class="card-footer">
                <div class="text-left text-{{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6>{{ App\Models\CasisSmp::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6>{{ App\Models\CasisSmp::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right text-{{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6>{{ App\Models\CasisSmp::getDataLengkap()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.siaptes_bct') }}">
                    <h6>{{ App\Models\CasisSmp::getSiapTes()->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title tx-18-force">UNIT SMAIT</h4>
            </div>
            <div class="card-body">
                <span id="sparkSma">5,3,9,6,5,9,7,3,5,2</span>
                <span class="mg-r-10 tx-black" style="font-size: 30pt">{{ $casisSma->count() }}</span>
                <p style="position: absolute; right: 30px; top: 95px;">Jumlah Siswa</p>
            </div>
            <div class="card-footer">
                <div class="text-left text-{{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6>{{ App\Models\CasisSma::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6>{{ App\Models\CasisSma::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right text-{{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6>{{ App\Models\CasisSma::getDataLengkap()->count() }}</h6>
                </div>
                <div class="text-center text-{{ config('ppdb.status.calon_siswa.siaptes_bct') }}">
                    <h6>{{ App\Models\CasisSma::getSiapTes()->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row tx-center">
    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
        <div class="pd-y-20 bd">
            <div id="morrisDonut2" class="ht-200 ht-sm-250"></div>
        </div>
    </div>
</div>

@push('styles')
<link href="{{ asset('assets/dashboard/lib/morris.js/morris.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
{{-- <script src="{{ asset('assets/dashboard/lib/morris.js/morris.js') }}"></script> --}}
<script>
    $(document).ready( function () {
        'use strict';

        $('#sparkTk').sparkline('html', {
            type: 'bar',
            barWidth: 12,
            height: 30,
            barColor: '#6F42C1',
            chartRangeMax: 12
        });

        $('#sparkSd').sparkline('html', {
            type: 'bar',
            barWidth: 12,
            height: 30,
            barColor: '#6F42C1',
            chartRangeMax: 12
        });

        $('#sparkSmp').sparkline('html', {
            type: 'bar',
            barWidth: 12,
            height: 30,
            barColor: '#6F42C1',
            chartRangeMax: 12
        });

        $('#sparkSma').sparkline('html', {
            type: 'bar',
            barWidth: 12,
            height: 30,
            barColor: '#6F42C1',
            chartRangeMax: 12
        });

        // new Morris.Donut({
        //     element: 'morrisDonut2',
        //     data: [
        //     {label: "Men", value: 12},
        //     {label: "Women", value: 30},
        //     {label: "Kids", value: 20},
        //     {label: "Infant", value: 25}
        //     ],
        //     colors: ['#3D449C','#268FB2','#2DC486','#74DE00'],
        //     resize: true
        // });
    });
</script>
@endpush