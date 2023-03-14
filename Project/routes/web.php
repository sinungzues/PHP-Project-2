<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class,'index'])->middleware('auth');
Route::get('/home', [DashboardController::class,'index'])->middleware('auth');
Route::get('/pegawai', [DashboardController::class,'index'])->middleware('auth');
Route::get('/pejabat', [PejabatController::class, 'index'])->middleware('auth');
Route::get('/kantor', [KantorController::class, 'index'])->middleware('auth');
Route::get('/cetak', [CetakController::class, 'index'])->middleware('auth');

Route::get('/pegawai/tambah',[PegawaiController::class, 'create']);
Route::post('/pegawai/store',[PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{nip_pegawai}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{nip_pegawai}', [PegawaiController::class, 'destroy']);

Route::get('/kantor/tambah', [KantorController::class, 'create']);
Route::post('/kantor/store', [KantorController::class,'store']);
Route::get('/kantor/edit/{id}', [KantorController::class,'edit']);
Route::post('/kantor/update', [KantorController::class,'update']);

Route::get('/pejabat/tambah', [PejabatController::class, 'create']);
Route::post('/pejabat/store', [PejabatController::class, 'store']);
Route::get('/pejabat/edit/{nip_pejabat}', [PejabatController::class, 'show']);
Route::post('/pejabat/update',[PejabatController::class, 'update']);
Route::get('/pejabat/hapus/{nip_pejabat}',[PejabatController::class, 'destroy']);

Route::get('/cetak/cetak_kartu', [CetakController::class, 'cetak']);
Route::get('/cetak/cetak_kartu/{nip_pegawai}', [CetakController::class, 'cetakByNip']);
Route::get('/cetak/kode_cetak', [CetakController::class, 'cetakKode']);
Route::get('/cetak/kode_cetak/{kode_cetak}', [CetakController::class, 'cetakByKode']);
Route::get('/cetak/nama_kantor', [CetakController::class, 'cetakNamaKantor']);
Route::get('/cetak/nama_kantor/{nama_kantor}', [CetakController::class, 'cetakByKantor']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);
