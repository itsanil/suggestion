<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;

echo "<pre>"; print_r('sdd'); echo "</pre>"; die('anil');
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



Route::get('/terms', function () {
    $title = 'Terms & Conditions';
    return view('terms',compact('title'));
});

Route::get('/', function () {
    return redirect('login');
    // return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::post('/socity-login', [LoginController::class, 'socityLogin'])->name('socity-login');
  
Route::group(['middleware' => ['auth','role:SuperAdmin']], function() {
    Route::resource('plant', PlantController::class);
    Route::resource('application', ApplicationController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('type', TypeController::class);
    Route::resource('score', ScoreController::class);
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['auth'],'role'=>['Zone User','Plant Coordinator','Admin']], function() {
    Route::resource('users', UserController::class);
    Route::get('/dashboard-data', [SuggestionController::class, 'getDashboardData']);
    Route::get('/filters', [SuggestionController::class, 'applyFilters']);
    Route::get('/top-score', [SuggestionController::class, 'topScore']);
    Route::resource('suggestion', SuggestionController::class);
    Route::delete('/upload/{id}', [SuggestionController::class, 'deleteImage'])->name('delete.image');
    Route::get('/get-suggestion-data', [SuggestionController::class, 'getData'])->name('get-suggestion-data');
    Route::get('/upload', [SuggestionController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload', [SuggestionController::class, 'uploadImage'])->name('upload.image');
    // Route::resource('application', ApplicationController::class);
    // Route::resource('department', DepartmentController::class);
    // Route::resource('type', TypeController::class);
    // // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
});

