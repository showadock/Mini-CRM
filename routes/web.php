<?php

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

// Disabling register and reset password forms
Auth::routes([
    'register'  => false,
    'reset'     => false
]);


// Dashboard
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// EMPRESA
Route::get('/empresas', [App\Http\Controllers\EmpresasController::class, 'index'])->name('empresas.list');
Route::get('/empresas/create', [App\Http\Controllers\EmpresasController::class, 'create'])->name('empresas.create');
Route::get('/empresas/{empresas}', [App\Http\Controllers\EmpresasController::class, 'show'])->name('empresas.show');
Route::post('/empresas', [App\Http\Controllers\EmpresasController::class, 'store'])->name('empresas.store');
Route::get('/empresas/{empresas}/edit', [App\Http\Controllers\EmpresasController::class, 'edit'])->name('empresas.edit');
Route::put('/empresas/{empresas}',  [App\Http\Controllers\EmpresasController::class, 'update'])->name('empresas.update');
Route::delete('/empresas/{empresas}', [App\Http\Controllers\EmpresasController::class, 'destroy'])->name('empresas.destroy');

// Empleados
Route::get('/empleados', [App\Http\Controllers\EmpleadosController::class, 'index'])->name('empleados.list');
Route::get('/empleados/create', [App\Http\Controllers\EmpresasController::class, 'create'])->name('empleados.create');
Route::get('/empleados/{empleados}', [App\Http\Controllers\EmpresasController::class, 'show'])->name('empleados.show');
Route::post('/empleados', [App\Http\Controllers\EmpresasController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{empleados}/edit', [App\Http\Controllers\EmpresasController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{empleados}',  [App\Http\Controllers\EmpresasController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{empleados}', [App\Http\Controllers\EmpresasController::class, 'destroy'])->name('empleados.destroy');