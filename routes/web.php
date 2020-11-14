<?php

use Illuminate\Support\Facades\Route;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiDashboardController;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiManagerController;
use Neelkanth\Laravel\SurveillanceUi\Http\Controllers\SurveillanceUiLogsController;

Route::get('/', [SurveillanceUiDashboardController::class, 'index'])->name('surveillance-ui.dashboard.index');

Route::group(['as' => 'surveillance-ui.manager.'], function () {
    Route::get('/manager', [SurveillanceUiManagerController::class, 'index'])->name('index');
    Route::get('/manager/create', [SurveillanceUiManagerController::class, 'create'])->name('create');
    Route::post('/manager', [SurveillanceUiManagerController::class, 'store'])->name('store');
    Route::get('/manager/{manager}', [SurveillanceUiManagerController::class, 'show'])->name('show');
    Route::get('/manager/{manager}/edit', [SurveillanceUiManagerController::class, 'edit'])->name('edit');
    Route::patch('/manager/{manager}', [SurveillanceUiManagerController::class, 'update'])->name('update');
    Route::delete('/manager/{manager}', [SurveillanceUiManagerController::class, 'destroy'])->name('destroy');
});

Route::group(['as' => 'surveillance-ui.logs.'], function () {
    Route::get('/logs', [SurveillanceUiLogsController::class, 'index'])->name('index');
    Route::get('/logs/create', [SurveillanceUiLogsController::class, 'create'])->name('create');
    Route::post('/logs', [SurveillanceUiLogsController::class, 'store'])->name('store');
    Route::get('/logs/{log}', [SurveillanceUiLogsController::class, 'show'])->name('show');
    Route::get('/logs/{log}/edit', [SurveillanceUiLogsController::class, 'edit'])->name('edit');
    Route::patch('/logs/{log}', [SurveillanceUiLogsController::class, 'update'])->name('update');
    Route::delete('/logs/{log}', [SurveillanceUiLogsController::class, 'destroy'])->name('destroy');
});
