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

// Auth::routes(['verify => true']);
Auth::routes();


//rutas protegidas mover al finalizar el project//
// Route::group(['middleware' => ['auth', 'verified']], function() {

//  //ver vacantes//
//  Route::get('/', [VacanciesController::class, 'index'])->name('vacantes.index');
//  //crear una vacante
//  Route::get('/create', [VacanciesController::class, 'create'])->name('vacantes.create');
    //sube una vacante
//  Route::post('/', [VacanciesController::class, 'store'])->name('vacantes.store');
    //elimina una vacante
//  Route::delete('/{vacancie}',[VacanciesController::class, 'destroy'])->name('vacantes.destroy');
    //edita una vacante
//	Route::get('/{vacancie}/edit', [VacanciesController::class,'edit'])->name('vacantes.edit');
    //Actualiza una vacante
//	Route::put('/{vacancie}', [VacanciesController::class, 'update'])->name('vacantes.update');
    //cambiar estado de la vacantes
//  Route::post('/{vacancie}',[VacanciesController::class, 'status'])->name('vacantes.status');

    //subir imagenes//
//  Route::post('/image',[VacanciesController::class, 'image'])->name('vacantes.image');
//  //borrar imagen
//  Route::post('/remove',[VacanciesController::class, 'removeImage'])->name('vacantes.remove');

    //notificacion
//  Route::get('/notifications',[NotificationsController::class,'__invoke'] )->name('notifications');

// });

//routes para vacantes//
Route::prefix('vacantes')->group(function ()
{
 //ver vacantes
 Route::get('/', [VacanciesController::class, 'index'])->name('vacantes.index');
 //crear una vacante
 Route::get('/create', [VacanciesController::class, 'create'])->name('vacantes.create');
 Route::post('/', [VacanciesController::class, 'store'])->name('vacantes.store');

 //muestra empleos sin auteticacion
 Route::get('/busqueda/search',[VacanciesController::class, 'result'])->name('vacantes.result');
 Route::post('busqueda/search',[VacanciesController::class, 'search'])->name('vacantes.search');
 Route::get('/{vacante}',[VacanciesController::class, 'show'])->name('vacantes.show');
 Route::delete('/{vacancie}',[VacanciesController::class, 'destroy'])->name('vacantes.destroy');
 Route::get('/{vacancie}/edit', [VacanciesController::class,'edit'])->name('vacantes.edit');
 Route::put('/{vacancie}', [VacanciesController::class, 'update'])->name('vacantes.update');
 //subir imagenes
 Route::post('/image',[VacanciesController::class, 'image'])->name('vacantes.image');
 //borrar imagen
 Route::post('/remove',[VacanciesController::class, 'removeImage'])->name('vacantes.remove');
 //cambiar estado de la vacantes
  Route::post('/{vacancie}',[VacanciesController::class, 'status'])->name('vacantes.status');

});
 
//Pagina de inicio
Route::get('/',[InitController::class,'__invoke'])->name('inicio');

//CATEGORIAS
Route::prefix('categories')->group(function ()
{
Route::get('/{categorie}',[CategoriesController::class, 'show'])->name('categorie.show');
});
 //notificacion
Route::get('/notifications',[NotificationsController::class,'__invoke'] )->name('notifications');



Route::prefix('candidatos')->group(function ()
{
 //enviar informacion para vacante
 Route::get('/candidatos/{id}',[CandidateController::class, 'index'])->name('candidatos.index');
 Route::post('/store',[CandidateController::class, 'store'])->name('candidatos.store');
});
