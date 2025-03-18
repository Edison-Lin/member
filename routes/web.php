<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\memberController;
// Route::get('/' ,[LoginController::class, 'welcome'])->name('welcome');
// Route::get('index' ,[LoginController::class, 'index'])->name('index');
Route::get('/' ,[LoginController::class, 'index'])->name('index');
Route::get('logout' ,[LoginController::class, 'logout'])->name('logout');
Route::get('index' ,[LoginController::class, 'welcome'])->name('welcome')->middleware('manage');
Route::resource('member' ,memberController::class)->middleware('manage');
Route::post('login' ,[LoginController::class, 'checkId'])->name('checkId');
