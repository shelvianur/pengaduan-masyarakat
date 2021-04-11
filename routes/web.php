<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/tes', function () {
//     return view('masyarakat.home');
// });
Route::get('/home', function () {
    return view('masyarakat.home');
})->name('user.pengaduan.home');

// hanya untuk tamu yg belum auth
Route::get('/', 'LoginController@getLogin')->name('login')->middleware('guest');
Route::post('/', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/registrasi', 'Admin\MasyarakatController@create')->name('registrasi');
Route::post('/regis', 'Admin\MasyarakatController@store')->name('regis');

Route::prefix('admin')->middleware(['auth:petugas'])->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.index');

    Route::prefix('masyarakat')->group(function () {
        Route::get('/', 'Admin\MasyarakatController@index')->name('admin.masyarakat.index');
        Route::post('/create', 'Admin\MasyarakatController@create')->name('admin.masyarakat.create');
        Route::post('/create-admin', 'Admin\MasyarakatController@createadmin')->name('admin.masyarakat.createadmin');
        Route::get('/edit/{id}', 'Admin\MasyarakatController@edit')->name('admin.masyarakat.edit');
        Route::post('/update/{id}', 'Admin\MasyarakatController@update')->name('admin.masyarakat.update');
        Route::get('/delete/{id}', 'Admin\MasyarakatController@destroy')->name('admin.masyarakat.delete');
    });

    Route::prefix('petugas')->group(function () {
        Route::get('/', 'Admin\PetugassController@index')->name('admin.petugas.index');
        Route::post('/create', 'Admin\PetugassController@create')->name('admin.petugas.create');
        Route::get('/edit/{id}', 'Admin\PetugassController@edit')->name('admin.petugas.edit');
        Route::post('/update/{id}', 'Admin\PetugassController@update')->name('admin.petugas.update');
        Route::get('/delete/{id}', 'Admin\PetugassController@destroy')->name('admin.petugas.delete');
    });

    Route::prefix('pengaduan')->group(function () {
        Route::get('/', 'Admin\PengaduanController@index')->name('admin.pengaduan.index');
        Route::get('/sedang-diproses/{id}', 'Admin\PengaduanController@proses')->name('admin.pengaduan.proses');
        Route::get('/selesai/{id}', 'Admin\PengaduanController@selesai')->name('admin.pengaduan.selesai');
        Route::get('/tidak-valid/{id}', 'Admin\PengaduanController@tidakvalid')->name('admin.pengaduan.tidakvalid');
        Route::post('/kirim-pesan/{id}', 'Admin\PengaduanController@kirim')->name('admin.pengaduan.kirim');
        Route::get('/user/{id}', 'Admin\PengaduanController@user')->name('admin.pengaduan.user');
        Route::get('/tanggapan/{id}', 'Admin\PengaduanController@getTanggapan')->name('admin.pengaduan.tanggapan');
        Route::get('/cetak_pdf/{id}', 'Admin\PengaduanController@cetak_pdf')->name('admin.pengaduan.cetak');
    });

    Route::prefix('tanggapan')->group(function () {
        Route::get('/', 'Admin\TanggapanController@index')->name('admin.tanggapan.index');
    });

    Route::prefix('laporan')->group(function () {
        Route::get('/', 'Admin\LaporanController@tanggal')->name('admin.laporan.tanggal');
        Route::post('/hari', 'Admin\LaporanController@hari')->name('admin.laporan.hari');
        Route::post('/minggu', 'Admin\LaporanController@minggu')->name('admin.laporan.minggu');
        Route::post('/bulan', 'Admin\LaporanController@bulan')->name('admin.laporan.bulan');

        Route::get('/status', 'Admin\LaporanController@status')->name('admin.laporan.status');
        Route::post('/status-laporan', 'Admin\LaporanController@statuslaporan')->name('admin.laporan.status_laporan');
    });
});

Route::prefix('user')->middleware(['auth:masyarakat'])->group(function () {
    Route::get('/pengaduan', 'Masyarakat\PengaduanController@pengaduan')->name('user.pengaduan.saya');
    Route::get('/create', 'Masyarakat\PengaduanController@create')->name('user.pengaduan.create');
    Route::post('/store', 'Masyarakat\PengaduanController@store')->name('user.pengaduan.store');
    Route::get('/pengaduan-saya/{id}', 'Masyarakat\PengaduanController@pengaduanid')->name('user.pengaduan.id');
    Route::post('/kirim-pesanm/{id}', 'Masyarakat\PengaduanController@kirim')->name('user.pengaduan.kirim');
    Route::get('/tanggapan-user/{id}', 'Masyarakat\PengaduanController@getTanggapan')->name('user.pengaduan.tanggapan');
    Route::get('/delete/{id}', 'Masyarakat\PengaduanController@hapus')->name('user.pengaduan.hapus');

    // gajadi
    Route::get('/', 'Masyarakat\PengaduanController@index')->name('user.pengaduan.index');
    Route::get('/edit/{id}', 'Masyarakat\PengaduanController@edit')->name('user.pengaduan.edit');
    Route::post('/update/{id}', 'Masyarakat\PengaduanController@update')->name('user.pengaduan.update');
});
