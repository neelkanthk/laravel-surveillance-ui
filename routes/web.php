<?php

use Illuminate\Support\Facades\Route;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiDashboardController;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiManagerController;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiLogsController;

Route::get('/dashboard', [SurveillanceUiDashboardController::class, 'index'])->name('surveillance-ui.dashboard.index');

Route::get('/manager', [SurveillanceUiManagerController::class, 'index'])->name('surveillance-ui.manager.index')->middleware(['surveillance']);
Route::get('/manager/create', [SurveillanceUiManagerController::class, 'create'])->name('surveillance-ui.manager.create')->middleware(['surveillance']);
Route::post('/manager', [SurveillanceUiManagerController::class, 'store'])->name('surveillance-ui.manager.store')->middleware(['surveillance']);
Route::get('/manager/{manager}', [SurveillanceUiManagerController::class, 'show'])->name('surveillance-ui.manager.show')->middleware(['surveillance']);
Route::get('/manager/{manager}/edit', [SurveillanceUiManagerController::class, 'edit'])->name('surveillance-ui.manager.edit')->middleware(['surveillance']);
Route::patch('/manager/{manager}', [SurveillanceUiManagerController::class, 'update'])->name('surveillance-ui.manager.update')->middleware(['surveillance']);
Route::delete('/manager/{manager}', [SurveillanceUiManagerController::class, 'destroy'])->name('surveillance-ui.manager.destroy')->middleware(['surveillance']);

Route::get('/logs', [SurveillanceUiLogsController::class, 'index'])->name('surveillance-ui.logs.index');
Route::get('/logs/create', [SurveillanceUiLogsController::class, 'create'])->name('surveillance-ui.logs.create');
Route::post('/logs', [SurveillanceUiLogsController::class, 'store'])->name('surveillance-ui.logs.store');
Route::get('/logs/{log}', [SurveillanceUiLogsController::class, 'show'])->name('surveillance-ui.logs.show');
Route::get('/logs/{log}/edit', [SurveillanceUiLogsController::class, 'edit'])->name('surveillance-ui.logs.edit');
Route::patch('/logs/{log}', [SurveillanceUiLogsController::class, 'update'])->name('surveillance-ui.logs.update');
Route::delete('/logs/{log}', [SurveillanceUiLogsController::class, 'destroy'])->name('surveillance-ui.logs.destroy');