<div class="row no-gutters widget-1 shadow-base">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title tx-18-force">UNIT TKIT</h4>
            </div>
            <div class="card-body">
                <span id="sparkTk">2,1,0,0,0,2,0,1</span>
                <span>{{ $casisTk->count() }}</span>
            </div>
            <div class="card-footer">
                <div class="text-left">
                    <span class="tx-11">Terdaftar</span>
                    <h6 class="tx-inverse">2</h6>
                </div>
                <div class="text-center">
                    <span class="tx-11">Terverifikasi</span>
                    <h6 class="tx-inverse">0</h6>
                </div>
                <div class="text-right">
                    <span class="tx-11">Data Lengkap</span>
                    <h6 class="tx-primary">0</h6>
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
                <span>{{ $casisSd->count() }}</span>
            </div>
            <div class="card-footer">
                <div class="text-left">
                    <span class="text-secondary tx-11">Terdaftar</span>
                    <h6 class="text-secondary">2</h6>
                </div>
                <div class="text-center">
                    <span class="text-info tx-11">Terverifikasi</span>
                    <h6 class="text-info">0</h6>
                </div>
                <div class="text-right">
                    <span class="text-primary tx-11">Data Lengkap</span>
                    <h6 class="text-primary">0</h6>
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
                <span>{{ $casisSmp->count() }}</span>
            </div>
            <div class="card-footer">
                <div class="text-left">
                    <span class="text-secondary tx-11">Terdaftar</span>
                    <h6 class="text-secondary">2</h6>
                </div>
                <div class="text-center">
                    <span class="text-info tx-11">Terverifikasi</span>
                    <h6 class="text-info">0</h6>
                </div>
                <div class="text-right">
                    <span class="text-primary tx-11">Data Lengkap</span>
                    <h6 class="text-primary">0</h6>
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
                <span>{{ $casisSma->count() }}</span>
            </div>
            <div class="card-footer">
                <div class="text-left">
                    <span class="text-secondary tx-11">Terdaftar</span>
                    <h6 class="text-secondary">2</h6>
                </div>
                <div class="text-center">
                    <span class="text-info tx-11">Terverifikasi</span>
                    <h6 class="text-info">0</h6>
                </div>
                <div class="text-right">
                    <span class="text-primary tx-11">Data Lengkap</span>
                    <h6 class="text-primary">0</h6>
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
            barWidth: 15,
            height: 30,
            barColor: '#29B0D0',
            chartRangeMax: 12
        });

        $('#sparkSd').sparkline('html', {
            type: 'bar',
            barWidth: 8,
            height: 30,
            barColor: '#6F42C1',
            chartRangeMax: 12
        });

        $('#sparkSmp').sparkline('html', {
            type: 'bar',
            barWidth: 8,
            height: 30,
            barColor: '#20C997',
            chartRangeMax: 12
        });

        $('#sparkSma').sparkline('html', {
            type: 'bar',
            barWidth: 8,
            height: 30,
            barColor: '#0866C6',
            chartRangeMax: 12
        });
    });
</script>
@endpush