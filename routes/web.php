



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LayananKunjunganController;
use App\Http\Controllers\LayananTabunganController;
use App\Http\Controllers\LayananSampahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormulirKunjunganController;
use App\Http\Controllers\BerandaLoginController;
use App\Http\Controllers\DetailPengajuanController;
use App\Http\Controllers\LayKunjunganController;
use App\Http\Controllers\DetailFormulirController;
use App\Http\Controllers\CobaErorController;
// use App\Http\Controllers\FormKunjunganController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PembelianPupukController;
use App\Http\Controllers\PenjemputanSampahController;












/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/layanankunjungan', [LayananKunjunganController::class, 'index'])->name('layanankunjungan');
Route::get('/layanantabungan', [LayananTabunganController::class, 'index'])->name('layanantabungan');
Route::get('/layanansampah', [LayananSampahController::class, 'index'])->name('layanansampah');
Route::get('/pembelianpupuk', [PembelianPupukController::class, 'index'])->name('pembelianpupuk');
Route::get('/penjemputansampah', [PenjemputanSampahController::class, 'index'])->name('penjemputansampah');
Route::get('/home', [HomeController::class, 'index']) ->name('home');
Route::get('/tentangkami', [TentangKamiController::class, 'index']) ->name('tentangkami');


Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/layanankunjungan', [LayananKunjunganController::class, 'index'])->name('layanankunjungan');
Route::get('/layanantabungan', [LayananTabunganController::class, 'index'])->name('layanantabungan');
Route::get('/layanansampah', [LayananSampahController::class, 'index'])->name('layanansampah');
Route::get('/pembelianpupuk', [PembelianPupukController::class, 'index'])->name('pembelianpupuk');
Route::get('/penjemputansampah', [PenjemputanSampahController::class, 'index'])->name('penjemputansampah');
Route::get('/home', [HomeController::class, 'index']) ->name('home');

Route::get('/berandalogin', [BerandaLoginController::class, 'index']) ->name('berandalogin');

Route::get('/detailpengajuan', [DetailPengajuanController::class, 'index']) ->name('detailpengajuan');
Route::get('/laykunjungan', [LayKunjunganController::class, 'index']) ->name('laykunjungan');
Route::get('/detailpengajuan', [DetailPengajuanController::class, 'index'])->name('detailpengajuan');
Route::get('/tentangkami', [TentangKamiController::class, 'index']) ->name('tentangkami');

Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan');




// Route::group(['prefix' => 'user', 'middleware' =>['auth'], 'as' =>'user.'] , function () {
//     Route::get('/berandalogin', [BerandaLoginController::class, 'index']) ->name('berandalogin');
//     Route::get('/detailpengajuan', [DetailPengajuanController::class, 'index']) ->name('detailpengajuan');
    
//     Route::get('/formulirkunjungan', [FormulirKunjunganController::class, 'index']) ->name('formulirkunjungan');
//     Route::get('/create', [FormulirKunjunganController::class, 'create']) ->name('create');
//     Route::post('/store', [FormulirKunjunganController::class, 'store'])->name('store');
//     Route::get('formulirkunjungan/{id}/edit', [FormulirKunjunganController::class, 'edit']) ->name('edit');
//     Route::put('formulirkunjungan/{id}', [FormulirKunjunganController::class, 'update']) ->name('update');
//     Route::get('/show', [FormulirKunjunganController::class, 'show'])->name('show');
//     Route::get('formulirkunjungan/{id}/delete', [FormulirKunjunganController::class, 'destroy']) ->name('destroy');
//     Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan');
//     Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
// });
// CRUD FORMULIR KUNJUNGAN
// Route::get('/formulirkunjungan', [FormulirKunjunganController::class, 'index']) ->name('formulirkunjungan');
// Route::get('/create', [FormulirKunjunganController::class, 'create']) ->name('create');
// Route::post('/store', [FormulirKunjunganController::class, 'store'])->name('store');
// Route::get('formulirkunjungan/{id}/edit', [FormulirKunjunganController::class, 'edit']) ->name('edit');
// Route::put('formulirkunjungan/{id}', [FormulirKunjunganController::class, 'update']) ->name('update');
// Route::get('/show', [FormulirKunjunganController::class, 'show'])->name('show');

Route::get('/cobaerror', [CobaErorController::class, 'index'])->name('index');




// Route::get('formulirkunjungan/{id}/delete', [FormulirKunjunganController::class, 'destroy']) ->name('destroy');

// Route::get('/show', [FormulirKunjunganController::class, 'show'])->name('show');

// Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan');



Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login-post');

Route::get('/register', [AuthenticatedSessionController::class, 'register'])->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register_post'])->name('register-post');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth.user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/berandalogin', [BerandaLoginController::class, 'index']) ->name('berandalogin');
    Route::get('/detailpengajuan', [DetailPengajuanController::class, 'index']) ->name('detailpengajuan');
    
    Route::get('/formulirkunjungan', [FormulirKunjunganController::class, 'index']) ->name('formulirkunjungan');
    Route::get('/create', [FormulirKunjunganController::class, 'create']) ->name('create');
    Route::post('/store', [FormulirKunjunganController::class, 'store'])->name('store');
    Route::get('formulirkunjungan/{id}/edit', [FormulirKunjunganController::class, 'edit']) ->name('edit');
    Route::put('formulirkunjungan/{id}', [FormulirKunjunganController::class, 'update']) ->name('update');
    Route::get('/show', [FormulirKunjunganController::class, 'show'])->name('show');
    Route::get('formulirkunjungan/{id}/delete', [FormulirKunjunganController::class, 'destroy']) ->name('destroy');
    Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
});
Route::post('/logout',[AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('forgot-password');
});
// require DIR.'/auth.php';