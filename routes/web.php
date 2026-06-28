<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\Admin::class, 'index'])->name('admin.index')->middleware('auth');

// Rutas para Ajustes
Route::get('/admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])
    ->name('admin.ajustes.index')
    ->middleware('auth');

Route::post('/admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])
    ->name('admin.ajustes.store')
    ->middleware('auth');

