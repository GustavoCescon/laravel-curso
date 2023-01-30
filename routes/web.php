<?php

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

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/sobrenos', [\App\Http\Controllers\SobreController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/login', function(){ return 'login';});

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'clientes';})->name('app.clientes');
    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produtos', function(){ return 'produtos';})->name('app.produtos');
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
    echo 'A rota acessada não existe. <a href="'.route('site.index').'" >clique aqui</a> para ir para a página inicial';
});

