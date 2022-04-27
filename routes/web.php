<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;


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

//Routes non-admin

Route::get('/',[FrontController::class,'onepage'])->name("onepage");

Route::get('inscription',[FrontController::class,'inscription'])->name("inscription");

Route::get('inscription/moelle',[FrontController::class,'inMoelle'])->name("inMoelle");
Route::get('inscription/sang',[FrontController::class,'inSang'])->name("inSang");
Route::get('uninscription/moelle',[FrontController::class,'unMoelle'])->name("unMoelle");
Route::get('uninscription/sang',[FrontController::class,'unSang'])->name("unSang");

Route::get("contact",[FrontController::class,'contact'])->name("contact");

Route::get('evenement',[FrontController::class, 'evenement'])->name("evenement");


//Routes admin

Route::get('administrateur',[AdminController::class,'administrateur'])->name("administrateur");
Route::get('admin/contenus',[AdminController::class,'contenuIndex'])->name("contenu.index");
Route::post('admin/contenu',[AdminController::class,'contenuSelected'])->name("contenu.selected");
Route::post('admin/contenu/edit',[AdminController::class,'contenuEdit'])->name("contenu.edit");


Route::get("admin/photos",[AdminController::class, 'photoIndex'])->name("photo.index");
Route::post("admin/photo/upload",[AdminController::class, 'photoUpload'])->name("photo.upload");



Route::get("admin/evenement/statistique",[AdminController::class, 'eventStat'])->name("event.stats");
Route::get("admin/evenement/gestion",[AdminController::class, 'eventGest'])->name("event.gestion");
Route::get("admin/evenement/creation",[AdminController::class, 'eventCrea'])->name("event.crea");
Route::post('admin/evenement',[AdminController::class,'eventSelected'])->name("event.selected");
Route::post('admin/evenement/gest',[AdminController::class,'eventSelectedGes'])->name("event.selectedGes");
Route::post('admin/evenement/edit',[AdminController::class,'eventEdit'])->name("event.edit");

Route::get("admin/import",[AdminController::class, 'importCSV'])->name("import.csv");
Route::post("admin/import/upload",[AdminController::class, 'importUpload'])->name("import.upload");

Route::get("ou-donner",[FrontController::class, 'ouDonner'])->name("ouDonner");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
