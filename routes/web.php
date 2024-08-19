<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InMemoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KategoriDanaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PengaturanDanaController;
use App\Http\Controllers\PenerimaZakatController;
use App\Http\Controllers\PenyaluranDanaController;
use App\Http\Controllers\PerhitunganSawController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\DanaZakatController;

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

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dana-zakat', [DanaZakatController::class, 'index']);
    Route::resource('penerimazakat', PenerimaZakatController::class);
    Route::resource('jurnal', JurnalController::class);
    Route::resource('inmemo', InMemoController::class);


    Route::get('/laporan-saw', [PerhitunganSawController::class, 'laporanSaw']);
    Route::get('/laporan-cetak', [PerhitunganSawController::class, 'laporanCetak']); 
    Route::post('penyalurandana/cetak_kwitansi', [PenyaluranDanaController::class, 'cetakKwitansi'])->name('penyalurandana.cetak_kwitansi');
    Route::get('penyalurandana/kwitansi/{id}', [PenyaluranDanaController::class, 'showKwitansi'])->name('penyalurandana.show_kwitansi');
    

});

Route::group(['middleware' => ['auth', 'leveluser:user']], function () {
    // Route::get('/proposal', [ProposalController::class, 'index']);
    Route::get('/', [DashboardController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'leveluser:admin']], function () {
    Route::resource('user', UserController::class);

    Route::resource('cabang', CabangController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('pengaturandana', PengaturanDanaController::class);
    Route::resource('kategoridana', KategoriDanaController::class);

    Route::post('/kriteriadetail/update/{id}', [KriteriaController::class, 'detailUpdate'])->name(('kriteriadetail.update'));

    Route::get('/kriteriadetail/edit/{id}', [KriteriaController::class, 'detailEdit'])->name(('kriteriadetail.edit'));

    Route::get('/penyalurandana-batalkan', [PenyaluranDanaController::class, 'batal'])->name(('penyalurandana.batal'));

    Route::resource('penyalurandana', PenyaluranDanaController::class);
    Route::resource('perhitungansaw', PerhitunganSawController::class);
    Route::post('/perhitungansaw/update/{id}', [PerhitunganSawController::class, 'update'])->name(('perhitungansaw.updatepenerima'));
});


Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name(('postlogin'));
Route::get('/logout', [LoginController::class, 'logout'])->name(('logout'));
