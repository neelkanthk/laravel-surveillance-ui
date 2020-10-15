<?php

use Illuminate\Support\Facades\Route;

use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiManagerController;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiLogsController;

Route::get('/manager', [SurveillanceUiManagerController::class, 'index'])->name('surveillance.manager.index');
Route::get('/manager/create', [SurveillanceUiManagerController::class, 'create'])->name('surveillance.manager.create');
Route::post('/manager', [SurveillanceUiManagerController::class, 'store'])->name('surveillance.manager.store');
Route::get('/manager/{manager}', [SurveillanceUiManagerController::class, 'show'])->name('surveillance.manager.show');
Route::get('/manager/{manager}/edit', [SurveillanceUiManagerController::class, 'edit'])->name('surveillance.manager.edit');
Route::patch('/manager/{manager}', [SurveillanceUiManagerController::class, 'update'])->name('surveillance.manager.update');
Route::put('/manager/{manager}', [SurveillanceUiManagerController::class, 'update'])->name('surveillance.manager.update');
Route::delete('/manager/{manager}', [SurveillanceUiManagerController::class, 'destroy'])->name('surveillance.manager.destroy');

Route::get('/logs', [SurveillanceUiLogsController::class, 'index'])->name('surveillance.logs.index');
Route::get('/logs/create', [SurveillanceUiLogsController::class, 'create'])->name('surveillance.logs.create');
Route::post('/logs', [SurveillanceUiLogsController::class, 'store'])->name('surveillance.logs.store');
Route::get('/logs/{log}', [SurveillanceUiLogsController::class, 'show'])->name('surveillance.logs.show');
Route::get('/logs/{log}/edit', [SurveillanceUiLogsController::class, 'edit'])->name('surveillance.logs.edit');
Route::patch('/logs/{log}', [SurveillanceUiLogsController::class, 'update'])->name('surveillance.logs.update');
Route::put('/logs/{log}', [SurveillanceUiLogsController::class, 'update'])->name('surveillance.logs.update');
Route::delete('/logs/{log}', [SurveillanceUiLogsController::class, 'destroy'])->name('surveillance.logs.destroy');