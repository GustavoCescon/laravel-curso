<?php

use GuzzleHttp\Middleware;
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

/* Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre-nos', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return view('welcome');
});

 */

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])
    ->name('site.index');
    //->Middleware('log.acesso');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/sobrenos', [\App\Http\Controllers\SobreController::class, 'sobreNos'])
    ->name('site.sobrenos');


Route::get('/login/{error?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    Route::get('/cliente',  [\App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');

    Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');
});


/* Route::get('/rota1', function(){
    echo 'ROTA 1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2'); 

Route::redirect('/rota2', '/rota1');
*/
Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

Route::fallback(function(){
    echo 'A rota acessada n??o existe. <a href="'.route('site.index').'" >clique aqui</a> para ir para a p??gina inicial';
});

