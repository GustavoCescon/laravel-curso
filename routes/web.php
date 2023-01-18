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

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);
Route::get('/sobrenos', [\App\Http\Controllers\SobreController::class, 'sobreNos']);
Route::get('/login', function(){ return 'login';});

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'clientes';});
    Route::get('/fornecedor', function(){ return 'fornecedor';});
    Route::get('/produtos', function(){ return 'produtos';});
});
