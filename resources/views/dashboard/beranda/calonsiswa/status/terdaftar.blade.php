<div class="card">
    <div class="card-body">
        <div class="text-justify">
            <div>
                <p>
                    Anda telah berhasil membuat akun {{ config('app.name') }},
                    namun untuk melanjutkan ke tahap pengisian data, Anda diwajibkan untuk membayar uang formulir
                </p>
            </div>
            <hr>
            <div>
                @if (auth()->user()->getDataVaKu()->status == 1)
                <h4 class="text-danger">PERINGATAN!</h4>
                <p>
                    <strong>Kode Virtual Account (VA)</strong>
                    Anda hanya berlaku <strong class="text-danger">{{ $masaAktif }}</strong> setelah pembuatan akun.
                    Jika telah kadaluwarsa maka VA akan langsung berstatus <strong class="text-danger">hangus</strong>
                    (VA tidak dapat lagi digunakan untuk transaksi pembayaran), jadi pastikan sebelum
                    <strong class="text-danger">waktu habis</strong> Anda telah mentransfer sesuai dengan data
                    pembayaran.
                </p>
                <p>
                    Jika dalam waktu <strong class="text-danger">30 menit</strong> terakhir sebelum
                    waktu kode VA Anda kadaluwarsa akun anda belum terverifikasi oleh Admin setelah
                    melakukan pembayaran, segera <strong>menghubungi Admin</strong> untuk
                    verifikasi pembayaran Anda. Jika Anda
                    <strong class="text-warning">mentransfer lewat dari masa aktif</strong>, maka
                    <strong class="text-danger">bukan menjadi tanggung jawab {{ config('app.nama_sekolah') }}</strong>.
                </p>
                @elseif (auth()->user()->getDataVaKu()->status == 2)
                <h4 class="text-danger">PERHATIAN!</h4>
                <p>
                    Mohon maaf <strong>Kode Virtual Account (VA)</strong>
                    Anda telah <strong class="text-danger">kedaluwarsa</strong>
                    karena telah melewati masa aktif <strong>{{ $masaAktif }}</strong> pada tanggal
                    <strong>{{ auth()->user()->getDataVaKu()->tanggal_berakhir->isoFormat('D MMMM YYYY') }}</strong>
                    pukul <strong>{{ auth()->user()->getDataVaKu()->tanggal_berakhir->isoFormat('HH:mm') }} WIB</strong>.
                    Jika Anda telah <strong class="text-warning">mentransfer lewat dari masa aktif</strong>,
                    maka <strong class="text-danger">bukan menjadi tanggung jawab {{ config('app.nama_sekolah') }}</strong>.
                </p>
                <p>
                    Silakan hubungi admin {{ config('app.nama_sekolah') }} untuk mendapatkan 
                    <strong>Virtual Account</strong> baru agar dapat melakukan pembayaran dan melanjutkan pendaftaran.
                </p>
                @endif
            </div>
        </div>
    </div>
</div>
@if (auth()->user()->getDataVaKu()->status == 1)
<div class="card mt-4 printableArea">
    <div class="card-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="fitwidth">Username</td>
                            <td width="10px">:</td>
                            <td>{{ auth()->user()->username }}</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Kode Virtual Account (VA)</td>
                            <td width="10px">:</td>
                            <td>{{ auth()->user()->getDataVaKu()->va }}</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Nama Pembayaran</td>
                            <td width="10px">:</td>
                            <td>{{ auth()->user()->getDataVaKu()->kode_nama }}</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Bank Pembayaran</td>
                            <td width="10px">:</td>
                            <td>{{ config('ppdb.va.bank.bni_syariah.nama_bank') }}</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Tanggal Terakhir Pembayaran</td>
                            <td width="10px">:</td>
                            <td class="text-danger">
                                {{ auth()->user()->getDataVaKu()->tanggal_berakhir->isoFormat('dddd, D MMMM YYYY') }}
                                pukul {{ auth()->user()->getDataVaKu()->tanggal_berakhir->isoFormat('HH:mm') }} WIB
                            </td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Total Pembayaran</td>
                            <td width="10px">:</td>
                            <td><b class="text-danger">Rp {{ number_format($biayaFormulir, 0, '', '.') }}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <h4>Melalui Transfer ATM BNI/BNI Syariah</h4>
            <ol>
                <li>Pilih <strong>Menu Lain > Transfer</strong></li>
                <li>Pilih rekening asal dan pilih rekening tujuan ke rekening BNI</li>
                <li>Masukkan nomor rekening dengan nomor Virtual Account Anda
                    {{-- <strong class="text-danger">{{ $va->kode_va }}</strong> --}}
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Masukkan jumlah pembayaran sebesar
                    <strong class="text-danger">Rp {{ number_format($biayaFormulir, 0, '', '.') }}</strong>
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Periksa data di layar. Pastikan <strong>Nama Pembayaran</strong> dan 
                    <strong>Total Pembayaran</strong> benar. Apabila data sudah benar, pilih <strong>Ya</strong>
                </li>
            </ol>
            <h4>Melalui Transfer ATM Bersama</h4>
            <ol>
                <li>Pilih <strong>Menu Lain > Transfer</strong></li>
                <li>Pilih rekening tujuan ke rekening <strong>Bank Lain</strong></li>
                <li>Masukkan nomor rekening dengan nomor Virtual Account Anda disertai kode Bank BNI
                    <strong class="text-info">009</strong>
                    {{-- <strong class="text-danger">{{ $va->kode_va }}</strong> --}}
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Masukkan jumlah pembayaran sebesar
                    <strong class="text-danger">Rp {{ number_format($biayaFormulir, 0, '', '.') }}</strong>
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Periksa data di layar. Pastikan <strong>Nama Pembayaran</strong> dan 
                    <strong>Total Pembayaran</strong> benar. Apabila data sudah benar, pilih <strong>Ya</strong>
                </li>
            </ol>
            <h4>Melalui Transfer mBanking</h4>
            <ol>
                <li>Pilih <strong>Transfer > Antar Rekening BNI</strong></li>
                <li>Pilih <strong>Rekening Tujuan > Input Rekening Baru</strong>.
                    Masukkan nomor rekening dengan nomor Virtual Account Anda
                    {{-- <strong class="text-danger">{{ $va->kode_va }}</strong> --}}
                    dan klik <strong>Lanjut</strong>, kemudian klik <strong>Lanjut</strong> lagi.
                </li>
                <li>Masukkan jumlah pembayaran sebesar
                    <strong class="text-danger">Rp {{ number_format($biayaFormulir, 0, '', '.') }}</strong>
                    lalu klik <strong>Lanjutkan</strong>
                </li>
                <li>Periksa detail konfirmasi. Pastikan <strong>Nama Pembayaran</strong> dan 
                    <strong>Total Pembayaran</strong> benar. Jika benar, masukkan password transaksi 
                    dan klik <strong>Lanjut</strong>
                </li>
            </ol>
            <hr class="printoff">
            <div class="text-right printoff">
                <button id="print" class="btn btn-default btn-outline" type="button">
                    <span><i class="fa fa-print"></i> CETAK</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endif

@push('styles')
<style>
    table {
        border: solid 1px lightgrey !important
    }

    td.fitwidth {
        width: 1px;
        white-space: nowrap;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/printarea/js/jquery.PrintArea.js') }}"></script>
<script>
    $(function () {
        $("#print").click(function () {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close,
                extraCss: "{{ asset('assets/dashboard/lib/printarea/css/noprint.css') }}"
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>
@endpush