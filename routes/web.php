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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
//     ->name('home')
//     ->middleware('verified');  // A rota só será liberada se o usuário estiver com o email verificado

Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
    ->middleware('verified');

// Route::get('/mensagem-teste', function () {
//     return new MensagemMail();

//     // Enviando um email passando a instancia de MensagemMail
//     // Mail::to('jorgearagao8888@gmail.com')->send(new MensagemMail());
//     // return 'Email enviado com sucesso!';
// });
