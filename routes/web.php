<?php

use App\Http\Controllers\TaskController;
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

Route::get('/data', [TaskController::class, 'data'])->name('task.data');
Route::get('/task', [TaskController::class, 'index'])->name('task.task');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::put('/status/{id_task}', [TaskController::class, 'updateStatus'])->name('task.updateStatus');
Route::put('/task/{id_task}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{id_task}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/task/{id_task}', [TaskController::class, 'show'])->name('task.show');
