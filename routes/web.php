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


Route::group(['middleware'=>'auth'],function(){
Route::get('/', 'BarangController@jumlah');
Route::get('barang/order','KonController@index');
Route::get('data/barang/konfirmasi','KonController@yajra_konfirmasi');
Route::get('barang/konfirmasi','KonController@konfirmasi');
Route::get('data/konfirmasi', 'KonController@yajra_index');
Route::post('data/insert/konfirmasi','KonController@update');
Route::get('get/data/pesanan/{id}', 'KonController@edit');


Route::get('/barang','BarangController@index');
Route::get('/jumlah','BarangController@jumlah');
Route::post('insert','BarangController@store');
route::get('create','BarangController@create');
Route::get('data/barang','BarangController@yajra_barang');
Route::get('edit/data/barang/{id}','BarangController@edit');

Route::get('data/pengiriman/barang', 'PengirimanController@index');
Route::get('data/pengiriman', 'PengirimanController@yajra_pengiriman');
Route::get('data/barang/kirim/{id}','PengirimanController@get_barang');
Route::get('data/paket/kirim/{id}','PengirimanController@get_paket');
Route::get('/ad', function(){
    return view('konfirmasi.konfirmasi');
});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

