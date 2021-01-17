<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::redirect('/', '/dashboard/home');
    Route::get('/home', 'DashboardController@index')->name('home');

    // Route Hak Akses
    Route::get('permissions/api', 'PermissionsController@datatablePermissionsAPI')->name('permissions.api');
    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);

    // Route Peran
    Route::get('roles/api', 'RolesController@datatableRolesAPI')->name('roles.api');
    Route::resource('roles', 'RolesController');


    // Route Users
    Route::get('users/api', 'UsersController@datatableUsersAPI')->name('users.api');
    Route::resource('users', 'UsersController');

    // Route Calon Siswa TK
    Route::get('calon-siswa/tk/api', 'CasisTkController@datatableCasistkAPI')->name('calon-siswa.tk.api');
    Route::resource('calon-siswa/tk', 'CasisTkController', ['names' => 'calon-siswa.tk']);
    Route::post('calon-siswa/tk/update/status', 'CasisTkController@updateStatus')->name('calon-siswa.tk.update.status');

    // Route Calon Siswa SD
    Route::get('calon-siswa/sd/api', 'CasisSdController@datatableCasissdAPI')->name('calon-siswa.sd.api');
    Route::resource('calon-siswa/sd', 'CasisSdController', ['names' => 'calon-siswa.sd']);
    Route::post('calon-siswa/sd/update/status', 'CasisSdController@updateStatus')->name('calon-siswa.sd.update.status');

    // Route Calon Siswa SMP
    Route::get('calon-siswa/smp/api', 'CasisSmpController@datatableCasissmpAPI')->name('calon-siswa.smp.api');
    Route::resource('calon-siswa/smp', 'CasisSmpController', ['names' => 'calon-siswa.smp']);
    Route::post('calon-siswa/smp/update/status', 'CasisSmpController@updateStatus')->name('calon-siswa.smp.update.status');

    // Route Calon Siswa SMA
    Route::get('calon-siswa/sma/api', 'CasisSmaController@datatableCasissmaAPI')->name('calon-siswa.sma.api');
    Route::resource('calon-siswa/sma', 'CasisSmaController', ['names' => 'calon-siswa.sma']);
    Route::post('calon-siswa/sma/update/status', 'CasisSmaController@updateStatus')->name('calon-siswa.sma.update.status');

    // Route Penghasilan
    Route::get('penghasilan/api', 'PenghasilanController@datatablePenghasilanAPI')->name('penghasilan.api');
    Route::resource('penghasilan', 'PenghasilanController')->except(['create', 'show']);

    // Route Pekerjaan
    Route::get('pekerjaan/api', 'PekerjaanController@datatablePekerjaanAPI')->name('pekerjaan.api');
    Route::resource('pekerjaan', 'PekerjaanController')->except(['create', 'show']);

    // Route Pendidikan
    Route::get('pendidikan/api', 'PendidikanController@datatablePendidikanAPI')->name('pendidikan.api');
    Route::resource('pendidikan', 'PendidikanController')->except(['create', 'show']);

    // Route Agama
    Route::get('agama/api', 'AgamaController@datatableAgamaAPI')->name('agama.api');
    Route::resource('agama', 'AgamaController')->except(['create', 'show']);

    // Route Alamat
    Route::get('jarak/api', 'JarakController@datatableJarakAPI')->name('jarak.api');
    Route::resource('jarak', 'JarakController')->except(['create', 'show']);

    // Route kondisibelajar
    Route::get('kondisibelajar/api', 'KondisibelajarController@datatableKondisibelajarAPI')->name('kondisibelajar.api');
    Route::resource('kondisibelajar', 'KondisibelajarController')->except(['create', 'show']);

    // Route bcquran
    Route::get('bcquran/api', 'BcquranController@datatableBcquranAPI')->name('bcquran.api');
    Route::resource('bcquran', 'BcquranController')->except(['create', 'show']);

    // Route waktutmph
    Route::get('waktutmph/api', 'WaktutmphController@datatableWaktutmphAPI')->name('waktutmph.api');
    Route::resource('waktutmph', 'WaktutmphController')->except(['create', 'show']);

    // Route jenis dokumen
    Route::get('jenisdokumen/api', 'JenisdokumenController@datatableJenisdokumenAPI')->name('jenisdokumen.api');
    Route::resource('jenisdokumen', 'JenisdokumenController')->except(['create', 'show']);

    // Route transportasi
    Route::get('transportasi/api', 'TransportasiController@datatableTransportasiAPI')->name('transportasi.api');
    Route::resource('transportasi', 'TransportasiController')->except(['create', 'show']);

    // Route tempattinggal
    Route::get('tempattinggal/api', 'tempattinggalController@datatableTempattinggalAPI')->name('tempattinggal.api');
    Route::resource('tempattinggal', 'TempattinggalController')->except(['create', 'show']);

    // Route slidefrontend
    Route::get('slidefrontend/api', 'SlidefrontendController@datatableSlidefrontendAPI')->name('slidefrontend.api');
    Route::resource('slidefrontend', 'SlidefrontendController');

    // Route tkva
    Route::get('va/tk/api', 'VaTkController@datatableVaTkAPI')->name('va.tk.api');
    Route::resource('va/tk', 'VaTkController', ['names' => 'va.tk'])->except(['create', 'show']);

    // Route sdva
    Route::get('va/sd/api', 'VaSdController@datatableVaSdAPI')->name('va.sd.api');
    Route::resource('va/sd', 'VaSdController', ['names' => 'va.sd'])->except(['create', 'show']);

    // Route smpva
    Route::get('va/smp/api', 'VaSmpController@datatableVaSmpAPI')->name('va.smp.api');
    Route::resource('va/smp', 'VaSmpController', ['names' => 'va.smp'])->except(['create', 'show']);

    // Route smava
    Route::get('va/sma/api', 'VaSmaController@datatableVaSmaAPI')->name('va.sma.api');
    Route::resource('va/sma', 'VaSmaController', ['names' => 'va.sma'])->except(['create', 'show']);

    // Pengaturan
    Route::get('pengaturan', 'PengaturanController@index')->name('pengaturan.index');

    // ------------------------------------- PROFIl SISWA
    Route::get('calon-siswa/profil/', 'ProfilCalonSiswaController@profil')->name('calonsiswa.profil');
    Route::post('calon-siswa/profil/update/biodata', 'ProfilCalonSiswaController@updateBiodata')->name('calonsiswa.profil.update.biodata');
    Route::post('calon-siswa/profil/update/data-orang-tua', 'ProfilCalonSiswaController@updateDataOrtu')->name('calonsiswa.profil.update.dataortu');
    Route::post('calon-siswa/profil/update/dokumen', 'ProfilCalonSiswaController@updateDokumen')->name('calonsiswa.profil.update.dokumen');
    Route::get('calon-siswa/profil/update/lengkapi-data', 'ProfilCalonSiswaController@lengkapiDataCasis')->name('calonsiswa.profil.update.lengkapidata');

    // wilayah
    Route::get('wilayah/kabkota/{id}', 'WilayahController@getKabKotaAPI')->name('wilayah.kabkota');
    Route::get('wilayah/kecamatan/{id}', 'WilayahController@getKecamatanAPI')->name('wilayah.kecamatan');
    Route::get('wilayah/desalurah/{id}', 'WilayahController@getDesaLurahAPI')->name('wilayah.desalurah');

});


Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'FrontController@index')->name('frontend.beranda');
    Route::get('/pendaftaran', 'FrontController@registerForm')->name('frontend.register.form');
    Route::post('/pendaftaran', 'FrontController@register')->name('frontend.register');
});
