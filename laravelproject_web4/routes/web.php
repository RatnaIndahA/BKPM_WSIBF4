<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Acontroller;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PengalamanKerjaController;
use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;


//route dasar menampilkan view
// Route::get('/', function () {
//     return view('welcome');
// }); 

// Route::get('/foo', function () {
//     return view('Hello Word');
//     return view('heloo');
// });
// Route::get('/blog', function () {
//     //ambil data dari database
//     $profil = "saya sedang mengembangakan website dengan framework laravel";
//     return view('word', ['data'=> $profil ]);
// });

// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Indah']);

// //route parameter
// Route::get('/user/{id}', function ($id) {
//     return 'User '.$id;
// });

// Route::get('posts/{post}/comments/{comment}', function($postId, $commentsId){
//     return 'post '.$postId. ' komen '.$commentsId;
// });

// // Route::get('/user', 'UserController@index');
// // Route::get('/user', [UserController::class, 'index']);

// //Route::match(['get', 'post'], '/', function(){

// Route::get('/blog/{$id}', function(Request $request){
//     return 'ini adalah blog '.$request->id;
// });

// //Route::any( '/', function(){
// //named route
// //redirect ke halaman lain
// Route::get('/blog', function () {
//     $profil = "aku seorang programmer";
//     return view('word', ['data'=> $profil ]);
// })->name('redir');

// // Route::redirect('/here', '/there');
// // Route::redirect('/here', '/there', 301);
// Route::get('/blog/{$id}', function(Request $request){
//     Route::redirect()->route('redir');
// });

// // Route::view('/welcome', 'welcome');
// // Route::view('/welcome', 'welcome', ['name' => 'Indah']);

// Route::get('user/{name?}', function($name=null){
//     return $name;
// });
// Route::get('pengguna/{name?}', function($name='Ratna'){
//     return $name;
// });

// Route::get('user/{name}', function($name){
//     //
// })->where('name', '[A-Za-z]+');
// Route::get('user/{id}', function($id){
//     //
// })->where('id', '[0-9]+');
// Route::get('user/{id}/{name}', function($id,$name){
//     //
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
// Route::prefix('/user')->group(function(){

//     Route::get('/pendaftaran',function(){
//         return 'HALAMAN PENDAFTARAN';
//     })->name('mhs.pendaftaran');

//     Route::get('/profile',function(){
//         return 'HALAMAN PROFILE';
//     })->name('mhs.profile');

//     Route::get('/nilai',function(){
//         return 'HALAMAN NILAI';
//     })->name('mhs.nilai');
// });
// Route::group(['prefix' => '/mahasiswa', 'as' => 'mhs.', 'middleware'=>"auth"],function(){

//     Route::get('/pendaftaran',function(){
//         return 'HALAMAN PENDAFTARAN';
//     })->name('pendaftaran');

//     Route::get('/profile',function(){
//         return 'HALAMAN PROFILE';
//     })->name('profile');

//     Route::get('/nilai',function(){
//         return 'HALAMAN NILAI';
//     })->name('nilai');
// });
// Route::get('/home', function () {
//     return view('home');
// }); 

// Route::get('/login', function () {
//     return 'ANDA BELUM LOGIN';
// })->name('login');

//Controller
Route::get('/profil', [ProfileController::class, 'index']);

//acara 6
Route::get('/dashboard', [ProfileController::class, 'index']);
// Route::get("/dashboard", function(){
//     return view('dashboard');
// });

Route::get('/template', function () {
    return view('frontend.layouts.template');
}); 
// Route::group(['namespace'=>'Backend'], function () {
    Route::resource('dashboard', DashboardController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
// });
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// Route::get('/pengalaman', [PengalamanKerjaController::class, 'index'])->name('pengalaman.index');
// Route::get('/pengalaman/create', [PengalamanKerjaController::class, 'create'])->name('pengalaman.create');
// Route::post('/pengalaman', [PengalamanKerjaController::class, 'store'])->name('pengalaman.store');
// Route::get('/pengalaman/{id}/edit', [PengalamanKerjaController::class, 'edit'])->name('pengalaman.edit');
// Route::put('/pengalaman/{id}', [PengalamanKerjaController::class, 'update'])->name('pengalaman.update');
// Route::delete('/pengalaman/{id}', [PengalamanKerjaController::class, 'destroy'])->name('pengalaman.destroy');
// Route::get('/dashboard', [DashboardController::class, 'index']);
Route::group(['namespace' => 'App\Http\Controllers\backend'], function() 
{
    Route::resource('dashboard', 'DashboardController');
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
    Route::delete('/pengalaman-kerja/{id}', [PengalamanKerjaController::class, 'destroy'])
    ->name('pengalaman_kerja.destroy');
    Route::get('/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->name('pendidikan.edit');
    Route::delete('/pendidikan/{id}', [PendidikanController::class, 'destroy'])
    ->name('pendidikan.destroy');
});
Route::get('/session', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);
Route::get('/cobaerror/{nama}', [CobaController::class, 'index']);
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');