<?php

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



use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'series']);
Route::get('/series', [DashboardController::class, 'series']);
Route::get('/genres', [DashboardController::class, 'genre']);
Route::get('/serieByGenre/{genre_id}', [DashboardController::class, 'serieByGenre']);
Route::get('/serie/{serie_id}', [DashboardController::class, 'seizoen'])->middleware(['auth', 'verified'])->name('series');
Route::get('/searchSeries', [DashboardController::class, 'searchSeries']);
Route::get('/aflBySeizoenId/{seizoen_id}/{serie_id}', [DashboardController::class, 'aflBySeizoenId'])->middleware(['auth', 'verified'])->name('aflBySeizoenId/{seizoen_id}/{serie_id}');
Route::get('/videoByAflSeizoen_id/{aflevering_id}/{seizoen_id}', [DashboardController::class, 'videoByAflSeizoen_id'])->middleware(['auth', 'verified'])->name('videoByAflSeizoen_id/{aflevering_id}/{seizoen_id}');


Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/manage_klanten', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.manage_klanten');
Route::get('/dashboard/manage_klanten/showKlantById/{id}', [AdminController::class, 'KlantById'])->middleware(['auth', 'verified'])->name('dashboard.edit.edit_klant_per_id');
Route::post('/dashboard/manage_klanten/editKlantById/{id}', [AdminController::class, 'EditKlantById'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_klanten/deleteKlantById/{id}', [AdminController::class, 'deleteKlantById'])->middleware(['auth', 'verified']);

Route::get('/dashboard/manage_content', [ManagerController::class, 'manageTable'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/getAllseizoenBySerieId/{id}', [ManagerController::class, 'getAllSeizoenBySerieId'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/getAllAlfBySeizoenId/{id}', [ManagerController::class, 'getAllAlfBySeizoenId'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/showEditSerie/{id}', [ManagerController::class, 'showEditSerie'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/showSeizoenBySerieId/{seizoen_id}/{serie_id}', [ManagerController::class, 'showSeizoenBySerieId'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/showAflBySeizoenId/{aflevering_id}/{seizoen_id}', [ManagerController::class, 'showAflBySeizoenId'])->middleware(['auth', 'verified']);

Route::get('/dashboard/manage_content/createSerieView', [ManagerController::class, 'createSerieView'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/createSeizoenView/{id}', [ManagerController::class, 'createSeizoenView'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/createAflView/{id}', [ManagerController::class, 'createAflView'])->middleware(['auth', 'verified']);

Route::post('/dashboard/manage_content/createSerie', [ManagerController::class, 'createSerie'])->middleware(['auth', 'verified']);
Route::post('/dashboard/manage_content/createSeizoen', [ManagerController::class, 'createSeizoen'])->middleware(['auth', 'verified']);
Route::post('/dashboard/manage_content/createAfl', [ManagerController::class, 'createAfl'])->middleware(['auth', 'verified']);

Route::post('/dashboard/manage_content/editSerieById/{id}', [ManagerController::class, 'editSerieById'])->middleware(['auth', 'verified']);
Route::post('/dashboard/manage_content/editSeizoenBySerieId/{id}', [ManagerController::class, 'editSeizoenBySerieId'])->middleware(['auth', 'verified']);
Route::post('/dashboard/manage_content/editAflBySeizoenId/{id}', [ManagerController::class, 'editAflBySeizoenId'])->middleware(['auth', 'verified']);

Route::get('/dashboard/manage_content/deleteSerieById/{id}', [ManagerController::class, 'deleteSerieById'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/deleteSeizoenBySerieId/{seizoen_id}/{serie_id}', [ManagerController::class, 'deleteSeizoenBySerieId'])->middleware(['auth', 'verified']);
Route::get('/dashboard/manage_content/deleteAflBySeizoenId/{aflevering_id}/{seizoen_id}', [ManagerController::class, 'deleteAflBySeizoenId'])->middleware(['auth', 'verified']);

Route::get('/user_history', [ProfileController::class, 'userHistory'])->middleware(['auth', 'verified']);

Route::post('/update-genre', [ProfileController::class, 'updateGenre'])->name('update.genre');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
