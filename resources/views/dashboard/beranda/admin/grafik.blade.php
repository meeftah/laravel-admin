<div class="row no-gutters widget-1 shadow-base">
    <div class="col-md-12 bg-gray-100 text-black-50">
        <p class="mg-b-0 p-3">
            <span class="square-10 bg-secondary mg-r-10"></span> Terdaftar
            <span class="square-10 bg-info mg-r-10 mg-l-30"></span> Terverifikasi
            <span class="square-10 bg-primary mg-r-10 mg-l-30"></span> Data Lengkap
        </p>
      </div>
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
                <div class="text-left {{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisTk::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center {{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisTk::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right {{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisTk::getDataLengkap()->count() }}</h6>
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
                <div class="text-left {{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSd::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center {{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSd::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right {{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSd::getDataLengkap()->count() }}</h6>
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
                <div class="text-left {{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSmp::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center {{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSmp::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right {{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSmp::getDataLengkap()->count() }}</h6>
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
                <div class="text-left {{ config('ppdb.status.calon_siswa.terdaftar_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSma::getTerdaftar()->count() }}</h6>
                </div>
                <div class="text-center {{ config('ppdb.status.calon_siswa.terverifikasi_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSma::getTerverifikasi()->count() }}</h6>
                </div>
                <div class="text-right {{ config('ppdb.status.calon_siswa.datalengkap_bct') }}">
                    <h6 class="tx-30">{{ App\Models\CasisSma::getDataLengkap()->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
<script>
    $(document).ready( function () {
        'use strict';
         
        $('#sparkTk').sparkline('html', {
            type: 'bar',
            barWidth: 12,
            height: 30,
            barColor: '#29B0D0',
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
            barColor: '#20C997',
            chartRangeMax: 12
        });

        $('#sparkSma').sparkline('html', {
            type: 'bar',
            barWidth: 12,
            height: 30,
            barColor: '#0866C6',
            chartRangeMax: 12
        });
    });
</script>
@endpush