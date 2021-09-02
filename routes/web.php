<?php

use App\Http\Controllers\AdditionalFieldsController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RecruiterController;
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

Route::group(['prefix' => '/companies', 'middleware' => ['auth']], function () {
    Route::get('/', [CompanyController::class, 'addCompany']);
    Route::post('/', [CompanyController::class, 'addCompanyPost']);
    Route::get('/{id}/add-admin', [CompanyController::class, 'addCompanyAdmin']);
    Route::post('/{id}/add-admin', [CompanyController::class, 'addCompanyAdminPost']);
    Route::post('/{id}/edit-admin', [CompanyController::class, 'editCompanyAdminPost']);
    Route::get('/view', [CompanyController::class, 'viewCompanies']);
    Route::get('/edit/{id}', [CompanyController::class, 'editCompany']);
    Route::post('/edit/{id}', [CompanyController::class, 'editCompanyPost']);
});


Route::group(['prefix' => '/jobs', 'middleware' => ['auth']], function () {
    Route::get('/', [JobController::class, 'addJob']);
    Route::post('/', [JobController::class, 'addJobPost']);
    Route::get('/view', [JobController::class, 'viewJobs']);
    Route::get('/view/{id}', [JobController::class, 'viewJobsCompany']);
    Route::get('/{id}', [JobController::class, 'viewJobDetail']);
    Route::post('/{id}', [JobController::class, 'allocateCandidates']);
    Route::get('/add/{id}', [JobController::class, 'addJobBySuperadmin']);
    Route::post('/add/{id}', [JobController::class, 'addJobBySuperadminPost']);
    Route::get('/edit/{id}', [JobController::class, 'editJob']);
    Route::post('/edit/{id}', [JobController::class, 'editJobPost']);
});
Route::group(['prefix' => '/candidates', 'middleware' => ['auth']], function () {
    Route::get('/add/{id}', [CandidateController::class, 'addCandidate']);
    Route::post('/add/{id}', [CandidateController::class, 'addCandidatePost']);
    Route::post('/bulk/{id}', [CandidateController::class, 'addCandidateBulkPost']);
    Route::get('/{id}', [CandidateController::class, 'candidateDetail']);
    Route::post('/{id}', [CandidateController::class, 'candidateStatusUpdate']);
    Route::get('/', [CandidateController::class, 'viewAllCandidates']);
    Route::post('/allocate/update', [JobController::class, 'allocateCandidates']);
    Route::post('/bulk-status/update', [JobController::class, 'BulkStatusUpdate']);
    Route::get('/view/{id}', [CandidateController::class, 'viewCandidatesbyUser']);
});


Route::group(['prefix' => '/recruiter', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('/', [RecruiterController::class, 'addRecruiter']);
    Route::post('/', [RecruiterController::class, 'addRecruiterPost']);
    Route::get('/view', [RecruiterController::class, 'viewRecruiter']);
});
Route::group(['prefix' => '/employees', 'middleware' => ['auth']], function () {
    Route::get('/', [EmployeeController::class, 'addEmployee']);
    Route::post('/', [EmployeeController::class, 'addEmployeePost']);
    Route::get('/view', [EmployeeController::class, 'viewEmployee']);
});

Route::group(['prefix' => '/fields', 'middleware' => ['auth']], function () {
    Route::get('/', [AdditionalFieldsController::class, 'addFields']);
    Route::post('/', [AdditionalFieldsController::class, 'addFieldsPost']);
});
