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


// Route::get('/', function () {
//     return view('admin.dashboard');
// });

// hanya untuk tamu yg belum auth
Route::get('/', 'LoginController@getLogin')->name('login')->middleware('guest');
Route::post('/', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');
Route::get('/registrasi', 'Admin\MasyarakatController@create')->name('registrasi');
Route::post('/regis', 'Admin\MasyarakatController@store')->name('regis');

Route::prefix('admin')->middleware(['auth:petugas'])->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.index');

    Route::prefix('masyarakat')->group(function () {
        Route::get('/', 'Admin\MasyarakatController@index')->name('admin.masyarakat.index');
        Route::post('/create', 'Admin\MasyarakatController@create')->name('admin.masyarakat.create');
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
        Route::get('/user/{id}', 'Admin\PengaduanController@user')->name('admin.pengaduan.user');
    });

    Route::prefix('tanggapan')->group(function () {
        Route::get('/', 'Admin\TanggapanController@index')->name('admin.tanggapan.index');
    });
});

Route::prefix('user')->middleware(['auth:masyarakat'])->group(function () {
    Route::get('/', 'Masyarakat\PengaduanController@index')->name('user.pengaduan.index');
    Route::get('/create', 'Masyarakat\PengaduanController@create')->name('user.pengaduan.create');
    Route::post('/store', 'Masyarakat\PengaduanController@store')->name('user.pengaduan.store');
    // Route::get('/edit/{id}', 'Admin\PetugassController@ed it')->name('admin.petugas.edit');
    // Route::post('/update/{id}', 'Admin\PetugassController@update')->name('admin.petugas.update');
    // Route::get('/delete/{id}', 'Admin\PetugassController@destroy')->name('admin.petugas.delete');
});
