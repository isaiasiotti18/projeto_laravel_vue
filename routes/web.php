<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\ContatoController;


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

Route::get('/principal', [PrincipalController::class, 'principal']);

Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos']);

Route::get('/contato', [ContatoController::class, 'contato']);

Route::get('/contato/{nome}/{email}/{telefone?}', function (
    string $nome = '', 
    string $email = '', 
    string $telefone = '') {
    echo "Estamos aqui ${nome} | email: ${email} | fone: ${telefone}";
});
