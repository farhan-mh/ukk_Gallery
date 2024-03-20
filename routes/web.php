<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\profilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uploadController;

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
route::get('/home', [Controller::class,'home'])->name('/home');

Route::get('/lihatPost',[controller::class,'lihatPost'])->name('lihatPost');
route::get('/postingan/{id}', [Controller::class,'lihat'])->name('lihat');
route::get('/cari',[Controller::class,'cari'])->name('/cari');
route::get('/userLain/{id}',[Controller::class,'userLain'])->name('userLain');
// Route::get('/moreButoon/{idl}', [Controller::class, 'moreButoon'])->name('moreButoon');

// Route::get('/home', function(){
//     return view('index');
// })->name('/home');

// ==== Middleware ==== //
Route::group(['middleware' => 'auth'], function(){
    route::get('/author', [Controller::class,'author'])->name('/author');
    Route::resource('/up', uploadController::class);
    Route::resource('/upProfil', profilController::class);
    Route::post('/hapusProfil/{email}', [profilController::class, 'hpsProfil'])->name('hapusProfil');
    Route::post('/uploads/{like}', [LikeController::class, 'like'])->name('uploads.like');
    Route::delete('/uploads/{like}', [LikeController::class, 'unlike'])->name('uploads.unlike');

});

Route::get('/loginn', function(){
    return view('livewire.home');
})->name('/loginn');
// Route::view('login','livewire.home');