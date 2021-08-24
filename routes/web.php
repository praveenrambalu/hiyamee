<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => '/companies', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('/', [CompanyController::class, 'addCompany']);
    Route::post('/', [CompanyController::class, 'addCompanyPost']);
    Route::get('/{id}/add-admin', [CompanyController::class, 'addCompanyAdmin']);
    Route::post('/{id}/add-admin', [CompanyController::class, 'addCompanyAdminPost']);
});


Route::group(['prefix' => '/jobs', 'middleware' => ['auth']], function () {
    Route::get('/', [JobController::class, 'addJob']);
    Route::post('/', [JobController::class, 'addJobPost']);
    Route::get('/view', [JobController::class, 'viewJobs']);
    Route::get('/{id}', [JobController::class, 'viewJobDetail']);
});
Route::group(['prefix' => '/candidates', 'middleware' => ['auth']], function () {
    Route::get('/add/{id}', [CandidateController::class, 'addCandidate']);
    Route::post('/add/{id}', [CandidateController::class, 'addCandidatePost']);
    Route::post('/bulk/{id}', [CandidateController::class, 'addCandidateBulkPost']);
    Route::get('/{id}', [CandidateController::class, 'candidateDetail']);
});
