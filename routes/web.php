<?php

use Illuminate\Support\Facades\Route;

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




//auth
Route::post('/','auth\AuthController@login')->name('login');
Route::get('/','auth\AuthController@index')->name('login');



//route group middleware akses halaman
Route::group(['middleware'=>'auth'], function(){
// Route::group(['middleware'=>'CekLoginMiddleware','CekroleMiddleware::1'], function(){


//halaman utama/dashboard
Route::get('/dashboard', function () {
    return view('beranda.dashboard');
});

//logout
Route::get('logout','auth\AuthController@logout')->name('logout');

//route penyablonan
Route::get('index','SablonController@index')->name('index');
Route::get('ketambah','SablonController@ketambah')->name('ketambah');
Route::get('invoice','SablonController@ketambah')->name('ketambah');
Route::get('sablon/filter','SablonController@filter')->name('sablon/filter');
Route::get('cari','SablonController@cari')->name('cari');
Route::get('sablontambah','SablonController@tambah')->name('sablontambah');
Route::post('invoice-pesanan','SablonController@simpan')->name('invoice-pesanan');
Route::post('sablon-simpan','SablonController@store')->name('sablon-simpan');
//ambil kode dari daftar pesanan
Route::get('getpesanan/{kode}','SablonController@getpesanan')->name('getpesanan');
//ambil detail tipe sablon dari tipes_id dimenu tambah
Route::get('gettipe/{id}','SablonController@gettipe')->name('gettipe');
//route detail sablon
Route::get('sablondetail/{id}','SablonController@detail')->name('sablondetail');
Route::get('updatedetail/{id}','SablonController@updatedetail')->name('updatedetail');
//edit di menu cari
Route::post('editsimpan/{id}','SablonController@edit')->name('editsimpan');
Route::get('struk/{id}','SablonController@struk')->name('struk');
Route::post('sablonupdate/{id}','SablonController@update')->name('sablonupdate');
Route::get('sablonedit/{id}','SablonController@edit')->name('sablonedit');


//laporan pesanan
Route::get('caripesanan','LaporanpesananController@index')->name('caripesanan');
Route::get('cari-laporan','LaporanpesananController@cari')->name('cari-laporan');
Route::get('export/{dari}/{sampai}','LaporanpesananController@export')->name('export');

        //route jabatan
Route::get('jabatan','JabatanController@index')->name('jabatan');
Route::post('tambahjabatan','JabatanController@simpan')->name('tambahjabatan');
Route::get('editjabatan/{id}','JabatanController@edit')->name('editjabatan');
Route::post('updatejabatan/{id}','JabatanController@update')->name('updatejabatan');


    //route absensi
 Route::get('absensi','AbsensiController@index')->name('absensi');
 Route::get('tahunkehadiran','AbsensiController@tahunkehadiran')->name('tahunkehadiran');
 Route::post('laporankehadiran','AbsensiController@cetaklaporan')->name('laporankehadiran');
 Route::get('cari-absensi','AbsensiController@cari')->name('cari-absensi');
 Route::post('simpan-absensi','AbsensiController@simpan')->name('simpan-absensi');
 Route::get('cetakabsensi/{bulan}/{tahun}','AbsensiController@cetakbulanabsensi')->name('cetakabsensi');
 Route::get('tambah/{bulan}/{tahun}','AbsensiController@tambah')->name('tambahabsensi');
 Route::post('tambahabsensi','AbsensiController@simpan')->name('tambahabsensi');
 Route::get('editabsesnsi/{id}','AbsensiController@edit')->name('editabsensi');
 Route::post('updateabsensi/{id}','AbsensiController@update')->name('updateabsensi');
 Route::get('absenskaryawan','AbsensiController@absen')->name('absenskaryawan');
 Route::get('getkaryawan/{id}','AbsensiController@getkaryawan')->name('getkaryawan');

    //route gaji
Route::get('gaji','GajiController@index')->name('gaji');
Route::get('tahungaji','GajiController@tahungaji')->name('tahungaji');
Route::post('laporangajipcetak','GajiController@laporangajipcetak')->name('laporangajipcetak');
Route::get('slip','GajiController@slip')->name('slip');
Route::post('slipcetak','GajiController@apa')->name('slipcetak');
Route::get('cari-gaji','GajiController@cari')->name('cari-gaji');
Route::get('cetakgaji/{bulan}/{tahun}','GajiController@cetakbulangaji')->name('cetakgaji');
Route::get('gajitambah','GajiController@tambah')->name('gajitambah');
Route::post('gajisimpan','GajiController@simpan')->name('gajisimpan');
Route::post('gajiupdate/{id}','GajiController@update')->name('gajiupdate');
Route::get('getabsensi/{id}','GajiController@getabsensi')->name('getabsensi');


//route karyawan
Route::get('karyawan','KaryawanController@index')->name('karyawan');
Route::get('karyawancetak','KaryawanController@cetak')->name('karyawancetak');
Route::get('karyawantambah','KaryawanController@tambah')->name('karyawantambah');
Route::post('karyawansimpan','KaryawanController@simpan')->name('karyawansimpan');
Route::get('karyawanedit/{id}','KaryawanController@edit')->name('karyawanedit');
Route::post('karyawanupdate/{id}','KaryawanController@update')->name('karyawanupdate');
Route::delete('karyawandelete/{id}','KaryawanController@destroy')->name('karyawandelete');



//route tipe 
Route::get('tipe','TipeController@index')->name('tipe');
Route::get('tipetambah','TipeController@tambah')->name('tipetambah');
Route::post('tipesimpan','TipeController@simpan')->name('tipesimpan');
Route::get('edit/{id}','TipeController@edit')->name('edit');
Route::delete('tipedelete/{id}','TipeController@destroy')->name('tipedelete');
Route::post('tipeupdate/{id}','TipeController@update')->name('tipeupdate');







//route user
Route::get('user','BerandaController@user')->name('user');


//beranda
Route::get('dashboard','BerandaController@index')->name('dashboard');

});

