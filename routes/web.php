<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArtikelsController;
use App\Http\Controllers\LeveranciersController;
use App\Http\Controllers\VoorraadsController;
use App\Http\Controllers\LocatiesController;
use App\Http\Controllers\MedewerkersController;

//dit zijn voor de cruds  
use App\Models\Article;
use App\Models\Store;

//dit is voor de zoekfunctie
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


// Route::any ( '/voorraad', function () {
//     $q = Request::get ( 'q' );
//     $article = Article::where ( 'product', 'LIKE', '%' . $q . '%' )->get ();
//     if (count ( $article ) > 0)
//         return view ( 'dashboard' )->withDetails ( $article )->withQuery ( $q );
//     else
//         return view ( 'dashboard' )->withMessage ( 'No Details found. Try to search again !' );
// } );

Route::any ( '/voorraad', function () {

	$q = Request::get('q');
	$rows = DB::table('voorraad')
			->join('artikel', 'artikel.id', '=', 'voorraad.artikel_id')
			->join('locatie', 'locatie.id', '=', 'voorraad.locatie_id')
			->select('artikel.product', 'voorraad.aantal', 'locatie.locatie')
			->where ( 'product', 'LIKE', '%' . $q . '%' , 'OR', 'locatie', 'LIKE', '%' . $q . '%' )->get ();
	if (count ( $rows ) > 0)
        return view ( 'dashboard' )->withDetails ( $rows )->withQuery ( $q );
    else
        return view ( 'dashboard' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::view('/welcome', 'welcome');
Route::view('/contact', 'contact')->name("contact");
Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('voorraad', [VoorraadsController::class, 'index'])->name('voorraad');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {

	Route::get('artikel', [ArtikelsController::class, 'index'])->name('artikel');
	Route::get('artikel/create', [ArtikelsController::class, 'create'])->name('artikel.create');
	Route::post('artikel/store', [ArtikelsController::class, 'store'])->name('artikel.store');
	// Route::get('artikel/{id}', [ArtikelsController::class, 'show'])->name('artikel.show');
	Route::get('artikel/{id}/edit', [ArtikelsController::class, 'edit']);
	Route::post('artikel/update', [ArtikelsController::class, 'update'])->name('artikel.update');
	Route::get('artikel/{id}/destroy', [ArtikelsController::class, 'destroy']);

	
	Route::get('voorraad/create', [VoorraadsController::class, 'create'])->name('voorraad.create');
	Route::post('voorraad/store', [VoorraadsController::class, 'store'])->name('voorraad.store');
	Route::get('voorraad/{id}/edit', [VoorraadsController::class, 'edit']);
	Route::post('voorraad/update', [VoorraadsController::class, 'update'])->name('voorraad.update');
	Route::get('voorraad/{id}/destroy', [VoorraadsController::class, 'destroy']);


	Route::group(['middleware' => ['admin']], function () {
 
		Route::get('leverancier', [LeveranciersController::class, 'index'])->name('leverancier');
		Route::get('leverancier/create', [LeveranciersController::class, 'create'])->name('leverancier.create');
		Route::post('leverancier/store', [LeveranciersController::class, 'store'])->name('leverancier.store');
		Route::get('leverancier/{id}', [LeveranciersController::class, 'show'])->name('leverancier.show');
		Route::get('leverancier/{id}/edit', [LeveranciersController::class, 'edit']);
		Route::post('leverancier/update', [LeveranciersController::class, 'update'])->name('leverancier.update');
		Route::get('leverancier/{id}/destroy', [LeveranciersController::class, 'destroy']);

		Route::get('locatie', [LocatiesController::class, 'index'])->name('locatie');
		Route::get('locatie/create', [LocatiesController::class, 'create'])->name('locatie.create');
		Route::post('locatie/store', [LocatiesController::class, 'store'])->name('locatie.store');
		Route::get('locatie/{id}/edit', [LocatiesController::class, 'edit']);
		Route::post('locatie/update', [LocatiesController::class, 'update'])->name('locatie.update');
		Route::get('locatie/{id}/destroy', [LocatiesController::class, 'destroy']);

		Route::get('medewerkers', [MedewerkersController::class, 'index'])->name('medewerkers');
		Route::get('medewerkers/create', [MedewerkersController::class, 'create'])->name('medewerkers.create');
		Route::post('medewerkers/store', [MedewerkersController::class, 'store'])->name('medewerkers.store');
		Route::get('medewerkers/{id}/edit', [MedewerkersController::class, 'edit']);
		Route::post('medewerkers/update', [MedewerkersController::class, 'update'])->name('medewerkers.update');
		Route::get('medewerkers/{id}/destroy', [MedewerkersController::class, 'destroy']);
	});
});