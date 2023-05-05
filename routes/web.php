<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use app\Http\Controllers\ProfesseurController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/prof', [App\Http\Controllers\HomeController::class, 'prof'])->name('prof');

Auth::routes();

// les route de admin index et emploi
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/emploi', [App\Http\Controllers\HomeController::class, 'emploi'])->name('emploi');


Route::get('/assign-emploi/{id}', [App\Http\Controllers\EmploiController::class, 'assignEmploi'])->name('emploi.assign');
Route::post('/assign-emploi', [App\Http\Controllers\EmploiController::class, 'updateClasse'])->name('update.classe');

Route::get('/emploi-generate/{id}', [App\Http\Controllers\EmploiController::class, 'emploiGenerate'])->name('emploi.generate');

// le route acceil
Route::get('/acceil', [App\Http\Controllers\HomeController::class, 'acceil'])->name('acceil');

// les route modufie et supperimer les informations
Route::post('/professeur', [App\Http\Controllers\ProfesseurController::class, 'store'])->name('professeur.store');
Route::get('/profe', [App\Http\Controllers\ProfesseurController::class, 'index'])->name('professeur.index');
Route::delete('delete-row/{id}', [App\Http\Controllers\ProfesseurController::class, 'deleteRow'])->name('delete.row');

// les route de desponibilite

Route::get('/despo', [App\Http\Controllers\HomeController::class, 'despo'])->name('despo');
Route::get('/despo/edit/{prof}', [App\Http\Controllers\DesponibiliteController::class, 'edit'])->name('despo.edit');
Route::post('/despo/edit', [App\Http\Controllers\DesponibiliteController::class, 'update'])->name('dispo.update');
Route::post('/disponibilites', [App\Http\Controllers\DesponibiliteController::class, 'store'])->name('desponibilites.store');

// les route de emplois

//Route::get('/emploi', [App\Http\Controllers\EmploiController::class, 'index1'])->name('emploi');


// Route::get('/emploi', [App\Http\Controllers\EmploiController::class, 'index']);

// Route::get('/emploidutemps', [EmploiDuTempsController::class, 'index'])->name('emploidutemps.index');
// Route::get('/emploidutemps/{filiere}', [EmploiDuTempsController::class, 'show'])->name('emploidutemps.show');
//Route::get('/emplois/{professeurId}', [EmploiController::class, 'index'])->name('emplois.index');

Route::get('/horaires/{id}/edit', 'HorairesController@edit')->name('horaires.edit');
Route::put('/horaires/{id}', 'HorairesController@update')->name('horaires.update');

Route::delete('/professeurs/{id}', 'desponibiliteController@destroy');


