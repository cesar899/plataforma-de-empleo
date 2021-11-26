<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\VacanciesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\InitController;

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


Auth::routes(['verify' => true]);
//rutas protegidas mover al finalizar el project//
//Route::group(['middleware' => ['auth', 'verify']], function(){

//Route::prefix('vacantes')->group(function () {

// Route::get('/', [VacanciesController::class, 'index'])->name('vacantes.index');
// Route::get('/create', [VacanciesController::class, 'create'])->name('vacantes.create');
//Route::post('/', [VacanciesController::class, 'store'])->name('vacantes.store');
// Route::delete('/{vacancie}',[VacanciesController::class, 'destroy'])->name('vacantes.destroy');
// Route::get('/{vacancie}/edit', [VacanciesController::class,'edit'])->name('vacantes.edit');
//Route::put('/{vacancie}', [VacanciesController::class, 'update'])->name('vacantes.update');



// Route::post('vacantes/image',[VacanciesController::class, 'image'])->name('vacantes.image');
// Route::post('/vacantes/remove',[VacanciesController::class, 'removeImage'])->name('vacantes.remove');

// Route::post('/{vacancie}',[VacanciesController::class, 'status'])->name('vacantes.status');

  
//notificacion
//Route::get('/notifications',[NotificationsController::class,'__invoke'] )->name('notifications');
//});

//});

//routes para vacantes//
Route::prefix('vacantes')->group(function () {

Route::get('/', [VacanciesController::class, 'index'])->name('vacantes.index');
Route::get('/create', [VacanciesController::class, 'create'])->name('vacantes.create');
Route::post('/', [VacanciesController::class, 'store'])->name('vacantes.store');
Route::post('/{vacancie}',[VacanciesController::class, 'status'])->name('vacantes.status');
 
//subir imagenes
Route::post('vacantes/image',[VacanciesController::class, 'image'])->name('vacantes.image');
//borrar imagen
Route::post('vacantes/remove',[VacanciesController::class, 'removeImage'])->name('vacantes.remove');
//muestra empleos sin auteticacion
 
Route::get('/busqueda/search',[VacanciesController::class, 'result'])->name('vacantes.result');
Route::post('busqueda/search',[VacanciesController::class, 'search'])->name('vacantes.search');
//no proteger
Route::get('/{vacante}',[VacanciesController::class, 'show'])->name('vacantes.show');

Route::delete('/{vacancie}',[VacanciesController::class, 'destroy'])->name('vacantes.destroy');
Route::get('/{vacancie}/edit', [VacanciesController::class,'edit'])->name('vacantes.edit');
Route::put('/{vacancie}', [VacanciesController::class, 'update'])->name('vacantes.update');

});
 
//Pagina de inicio no proteger
Route::get('/',[InitController::class,'__invoke'])->name('inicio');

//CATEGORIAS no proteger
Route::prefix('categories')->group(function ()
{
Route::get('/{categorie}',[CategoriesController::class, 'show'])->name('categorie.show');
});

 //notificacion
Route::get('/notifications',[NotificationsController::class,'__invoke'] )->name('notifications');


//no aproteger
Route::prefix('candidatos')->group(function ()
{
 //enviar informacion para vacante no proteger 
 Route::get('/candidatos/{id}',[CandidateController::class, 'index'])->name('candidates.index');
 Route::post('/store',[CandidateController::class, 'store'])->name('candidatos.store');
});


