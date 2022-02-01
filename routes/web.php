<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;


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
    return view('index');
})->name("home");

Route::get('/newtemplate',[AdminController::class,'newtemplate'])->name("newtemplate");

Route::get('administrateur',[AdminController::class,'administrateur'])->name("administrateur");
Route::get('admin/contenus',[AdminController::class,'contenuIndex'])->name("contenu.index");
Route::post('admin/contenu',[AdminController::class,'contenuSelected'])->name("contenu.selected");
Route::post('admin/contenu/edit',[AdminController::class,'contenuEdit'])->name("contenu.edit");


Route::get("admin/photos",[AdminController::class, 'photoIndex'])->name("photo.index");
Route::post("admin/photo/upload",[AdminController::class, 'photoUpload'])->name("photo.upload");



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
