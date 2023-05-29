<?php

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

Route::get('/', function () {
    return redirect('/departments');
});

Auth::routes();

Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
Route::get('employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/{department?}', [App\Http\Controllers\EmployeeController::class, 'index'])->name('department.employees');
Route::post('employees/import', [App\Http\Controllers\EmployeeController::class, 'import'])->name('employees.import');
