<?php

use App\Mail\MensagemMail;
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
    return view('bem_vindo');
});

Auth::routes(['verify' => true]);

Route::get('tarefa/export/{extension}', [App\Http\Controllers\TarefaController::class, 'export'])
    ->name('tarefa.export');

Route::get('tarefa/exportPdf', [App\Http\Controllers\TarefaController::class, 'exportPdf'])
    ->name('tarefa.exportPdf');

Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
    ->middleware('verified');
