<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Api\DepartmentController as ApiDepartmentController;
use App\Http\Controllers\Api\UnitController as ApiUnitController;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* Unit Routes */
    Route::get('/units/create', [UnitController::class, 'create'])->name('create.unit');
    Route::post('/units/store', [UnitController::class, 'store'])->name('store.unit');
    Route::get('/units/{slug}/edit', [UnitController::class, 'edit'])->name('edit.unit');
    Route::put('/units/{slug}/update', [UnitController::class, 'update'])->name('update.unit');
    Route::delete('/units/{slug}/delete', [UnitController::class, 'destroy'])->name('destroy.unit');
    /* End Unit Routes */

    /* Department Routes */
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('create.department');
    Route::post('/departments/store', [DepartmentController::class, 'store'])->name('store.department');
    Route::get('/departments/{slug}/edit', [DepartmentController::class, 'edit'])->name('edit.department');
    Route::put('/departments/{slug}/update', [DepartmentController::class, 'update'])->name('update.department');
    Route::delete('/departments/{slug}/delete', [DepartmentController::class, 'destroy'])->name('destroy.department');
    /* End Department Routes */

    /* API Routes */
    Route::prefix('units')->group(function () {
        Route::get('/', [ApiUnitController::class, 'index']);
        Route::get('/select', [ApiUnitController::class, 'show']);
        Route::get('/{id}', [ApiUnitController::class, 'getUnitById'])->name('get.unit');
        Route::post('/unit', [ApiUnitController::class, 'searchUnit'])->name('search.unit');
    });
    Route::get('/search-unit', [ApiUnitController::class, 'search']);

    Route::prefix('departments')->group(function () {
        Route::get('/', [ApiDepartmentController::class, 'index']);
        Route::get('/select', [ApiDepartmentController::class, 'show']);
        Route::get('/{id}', [ApiDepartmentController::class, 'getDepartmentById'])->name('get.department');
        Route::post('/department', [ApiDepartmentController::class, 'searchDepartment'])->name('search.department');
    });
    Route::get('/search-department', [ApiDepartmentController::class, 'search']);
    /* End API Routes */

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});