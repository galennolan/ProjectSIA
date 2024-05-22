<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AkunController;
use App\Http\Controllers\KaskeluarController;
use App\Http\Controllers\BukubesarController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SupplierController;
use Spatie\Permission\Middlewares\RoleMiddleware;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', function () {
    return view('map.map');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function() {
    return 'This route works without middleware.';
});

Auth::routes();
Route::middleware(['check.role:admin'])->group(function() {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('/barang', App\Http\Controllers\BarangController::class);
    Route::get('/barang/hapus/{id}', [App\Http\Controllers\BarangController::class, 'destroy']);
    Route::get('/barang/edit/{id}', [App\Http\Controllers\BarangController::class, 'edit']);
    Route::post('/barang/update/{id}', [App\Http\Controllers\BarangController::class, 'update']);

    
// Supplier
Route::resource('/supplier', App\Http\Controllers\SupplierController::class);
Route::get('/supplier/hapus/{id}', [App\Http\Controllers\SupplierController::class, 'destroy']);
Route::get('/supplier/edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit']);
Route::post('/supplier/update/{id}', [App\Http\Controllers\SupplierController::class, 'update']);

// Akun
Route::get('/akun', [App\Http\Controllers\AkunController::class, 'index'])->name('akun');
    Route::get('/akun/edit/{id}', [App\Http\Controllers\AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/usakuner', [App\Http\Controllers\AkunController::class, 'store'])->name('akun.store');

Route::get('/akun/hapus/{id}', [App\Http\Controllers\AkunController::class, 'destroy']);
Route::post('/akun/update/{id}', [App\Http\Controllers\AkunController::class, 'update']);

// Setting
Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting.transaksi');
Route::post('/setting/simpan', [App\Http\Controllers\SettingController::class, 'simpan']);

// Pemesanan
Route::get('/transaksi', [App\Http\Controllers\PemesananController::class, 'index'])->name('pemesanan.transaksi');
Route::post('/sem/store', [App\Http\Controllers\PemesananController::class, 'store']);
Route::get('/transaksi/hapus/{kd_brg}', [App\Http\Controllers\PemesananController::class, 'destroy']);

// Detail Pesan
Route::post('/detail/store', [App\Http\Controllers\DetailPesanController::class, 'store']);
Route::post('/detail/simpan', [App\Http\Controllers\DetailPesanController::class, 'simpan']);

// Pembelian
Route::get('/pembelian', [App\Http\Controllers\PembelianController::class, 'index'])->name('pembelian.transaksi');
Route::get('/cetak/{id}', [App\Http\Controllers\PembelianController::class, 'pdf'])->name('cetak.order_pdf');
Route::get('/pembelian-beli/{id}', [App\Http\Controllers\PembelianController::class, 'edit']);
Route::get('/pembelian/hapus/{id}', [App\Http\Controllers\PembelianController::class, 'destroy']);
Route::post('/pembelian/simpan', [App\Http\Controllers\PembelianController::class, 'simpan']);

// Retur
Route::get('/retur', [App\Http\Controllers\ReturController::class, 'index'])->name('retur.transaksi');
Route::get('/retur-beli/{id}', [App\Http\Controllers\ReturController::class, 'edit']);
Route::post('/retur/simpan', [App\Http\Controllers\ReturController::class, 'simpan']);

// Laporan
Route::resource('/laporan', App\Http\Controllers\LaporanController::class);
Route::resource('/stok', App\Http\Controllers\LapStokController::class);

// Laporan cetak
Route::get('/laporancetak/cetak_pdf', [App\Http\Controllers\LaporanController::class, 'cetak_pdf']);
});




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