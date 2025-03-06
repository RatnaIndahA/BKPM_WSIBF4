<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Acontroller;
use App\Http\Controllers\ProfileController; 

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
Route::prefix('/user')->group(function(){

    Route::get('/pendaftaran',function(){
        return 'HALAMAN PENDAFTARAN';
    })->name('mhs.pendaftaran');

    Route::get('/profile',function(){
        return 'HALAMAN PROFILE';
    })->name('mhs.profile');

    Route::get('/nilai',function(){
        return 'HALAMAN NILAI';
    })->name('mhs.nilai');
});
Route::group(['prefix' => '/mahasiswa', 'as' => 'mhs.', 'middleware'=>"auth"],function(){

    Route::get('/pendaftaran',function(){
        return 'HALAMAN PENDAFTARAN';
    })->name('pendaftaran');

    Route::get('/profile',function(){
        return 'HALAMAN PROFILE';
    })->name('profile');

    Route::get('/nilai',function(){
        return 'HALAMAN NILAI';
    })->name('nilai');
});
Route::get('/home', function () {
    return view('home');
}); 

Route::get('/login', function () {
    return 'ANDA BELUM LOGIN';
})->name('login');

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
Route::group(['namespace'=>'Backend'], function () {
    Route::resource('dashboard', 'DashboardController');
}); 
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});