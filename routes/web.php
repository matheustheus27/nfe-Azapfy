<?php

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

use App\Http\Controllers\PessoaController;
use App\Models\Pessoa;
use Symfony\Component\HttpFoundation\Request;

Route::get('/salvar', function () {
    return view('salvar');
});
Route::post('/salvar/nfe', 'NFeController@save')->name('salvar.nfe');

Route::get('/danfe', function(){
    return view('danfe');
});
Route::post('/danfe/renderizar', 'NFeController@render')->name('danfe.renderizar');

Route::get('/buscar', function(){
    return view('buscar');
});
Route::get('/buscar/nfe', 'NFeController@find')->name('buscar.nfe');

Route::get('/deletar', function(){
    return view('deletar');
});
Route::get('/deletar/nfe', 'NFeController@delete')->name('deletar.nfe');

Route::get('/atualizar', function(){
    return view('atualizar');
});
Route::post('/atualizar/nfe', 'NFeController@update')->name('atualizar.nfe');