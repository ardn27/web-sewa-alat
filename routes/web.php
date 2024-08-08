<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IklanController;

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
//home
Route::get('/',[HomeController::class, 'Index']);

//Search
Route::get('/search', [HomeController::class, 'search'])->name('autocomplete');
Route::get('/search-click', [HomeController::class, 'searchItem']);

//All Product
Route::get('/all-product', [HomeController::class, 'AllProduct'])->name('allProduct');

//All paket
Route::get('/all-paket', [HomeController::class, 'AllPaket'])->name('allPaket');
//product
Route::get('/product/{id}', [HomeController::class,'ProductById']);

//paket
Route::get('/paket', [HomeController::class, 'Pakets']);

//detail paket
Route::get('/paket/{id}', [HomeController::class, 'PaketById']);

//kategori pendingin
Route::get('/pendingin', [KategoriController::class, 'Pendingin'])->name('kategori.pendingin');

//kategori penutup ruangan
Route::get('/penutup-ruangan', [KategoriController::class, 'PenutupRuangan'])->name('kategori.penutup-ruangan');

//kategori tempat duduk
Route::get('/tempat-duduk', [KategoriController::class, 'KursiMeja'])->name('kategori.kursimeja');

//Kategori karpet
Route::get('/karpet', [KategoriController::class, 'Karpet'])->name('kategori.karpet');

//kategori panggung
Route::get('/panggung', [KategoriController::class, 'Panggung'])->name('kategori.panggung');

//kategori videotron
Route::get('/videotron', [KategoriController::class, 'Videotron'])->name('kategori.videotron');

//kategori Tenda
Route::get('/tenda', [KategoriController::class, 'Tenda'])->name('kategori.tenda');

//kategori Pengamanan
Route::get('/pengamanan', [KategoriController::class, 'Pengamanan'])->name('kategori.pengamanan');

//kategori Genset
Route::get('/genset', [KategoriController::class, 'Genset'])->name('kategori.genset');


//login Admin
Route::get('/administrator', [LoginController::class, 'login'])->name('checkAdmin');
Route::get('/admin-regis', [LoginController::class, 'register']);
Route::post('/admin-regis-action', [LoginController::class, 'registerAction']);
Route::post('/login-action', [LoginController::class, 'loginAction']);
Route::get('/logout-admin', [LoginController::class, 'logout']);

Route::middleware(['checkAdmin'])->group(function () {
    Route::get('/home-admin', [AdministratorController::class, 'HomeAdmin']);
    Route::get('/chart', [AdministratorController::class, 'PieChart']);

    //administrator produk
    Route::get('/add-post', [AdministratorController::class, 'indexAdd']);
    Route::get('/home-produk', [AdministratorController::class, 'IndexAdmin']);
    Route::get('/edit-post/{id}', [AdministratorController::class, 'EditAdmin']);

    //fungsi product
    Route::post('/add-post-action', [AdministratorController::class, 'create']);
    Route::post('/edit-post-action', [AdministratorController::class, 'update']);
    Route::get('/delete-post/{id}', [AdministratorController::class, 'delete']);

    //fungsi paket
    Route::get('/home-paket', [PaketController::class, 'HomePaket']);
    Route::get('/add-paket', [PaketController::class, 'AddPaket']);
    Route::get('/edit-paket/{id}', [PaketController::class, 'EditPaket']);
    Route::post('/add-paket-function', [PaketController::class, 'create']);
    Route::post('/edit-paket-function', [PaketController::class, 'update']);
    Route::get('/delete-paket/{id}', [PaketController::class, 'delete']);

    //iklan
    Route::get('/home-iklan', [IklanController::class, 'IndexIklan']);
    Route::get('/add-iklan-index', [IklanController::class, 'AddIklan']);
    Route::get('/edit-iklan-index/{id}', [IklanController::class, 'EditIklan']);

    //iklan function
    Route::post('/add-iklan', [IklanController::class, 'createIklan']);
    Route::post('/edit-iklan', [IklanController::class, 'updateIklan']);
    Route::get('/delete-iklan/{id}', [IklanController::class, 'deleteIklan']);
});
