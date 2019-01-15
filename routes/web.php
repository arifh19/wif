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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', function () {
    return redirect()->route('admin.transaksi');
});
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/transaksi', 'TransaksiController@index')->name('admin.transaksi');
Route::get('/admin/transaksi/create', 'TransaksiController@create')->name('admin.transaksi.create');
Route::post('/admin/transaksi/store', 'TransaksiController@store')->name('admin.transaksi.store');
Route::get('/admin/transaksi/{id}', 'TransaksiController@show')->name('admin.transaksi.show');

Route::get('/admin/barang', 'BarangController@index')->name('admin.barang');
Route::get('/admin/barang/create', 'BarangController@create')->name('admin.barang.create');
Route::get('/admin/barang/edit/{id}', 'BarangController@edit')->name('admin.barang.edit');
Route::post('/admin/barang/store', 'BarangController@store')->name('admin.barang.store');
Route::post('/admin/barang/update/{id}', 'BarangController@update')->name('admin.barang.update');
Route::get('/admin/barang/delete/{id}', 'BarangController@destroy')->name('admin.barang.destroy');

Route::get('/admin/ukuran', 'UkuranController@index')->name('admin.ukuran');
Route::get('/admin/ukuran/create', 'UkuranController@create')->name('admin.ukuran.create');
Route::get('/admin/ukuran/edit/{id}', 'UkuranController@edit')->name('admin.ukuran.edit');
Route::post('/admin/ukuran/store', 'UkuranController@store')->name('admin.ukuran.store');
Route::post('/admin/ukuran/update/{id}', 'UkuranController@update')->name('admin.ukuran.update');
Route::get('/admin/ukuran/delete/{id}', 'UkuranController@destroy')->name('admin.ukuran.destroy');



