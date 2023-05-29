<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HrController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/hrhome',[HrController::class,'index']);
Route::resource('/Emp',EmployeeController::class);

Route::get('/empsalary/{id}',[EmployeeController::class,'salaryAssign'])->name('salaryadd');
Route::get('/getsalary',[EmployeeController::class,'getSalarayByempid'])->name('getsalary');

Route::post('salarystore',[EmployeeController::class,'salaryStore'])->name('salarystore');

Route::get('/client',[ClientController::class,'index']);

Route::post('/clientlogin',[ClientController::class,'login'])->name('clogin');

Route::get('/clienthome',[ClientController::class,'home']);