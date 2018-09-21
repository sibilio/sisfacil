<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::auth();
/*
Route::controllers([
’auth’ => ’Auth\AuthController’,
’password’ => ’Auth\PasswordController’,
]);*/



Route::group(['middleware' => ['web']], function () {
    
	Route::get('/', function () {
	    return view('inicio');
	});

	Route::group(['prefix' => 'parceiro'], function(){
		Route::get('all/{tipoParceiro}', 'ParceiroController@all');
		Route::get('delete/{id}', 'ParceiroController@delete');
		Route::get('adicionarparceiro','ParceiroController@adicionarParceiro');
		Route::get('checa-cnpj/{cnpj}','ParceiroController@checaCnpj');
		Route::get('editar/{id}', 'ParceiroController@editar');
		Route::get('conversao', 'ParceiroController@converter');
		Route::get('procurar','ParceiroController@procurar');
		Route::post('salvar-edicao','ParceiroController@salvarEdicao');
		Route::post('realizarcadastro','ParceiroController@realizarCadastro');
		//as rotas serão chamadas da seguinte forma,
		//ex.: /sisfacil/public/parceiro/delete/'id'
	});

	Route::group(['prefix' => 'os/tipo-aparelho'], function () {
		Route::get('all', 'TipoAparelhoController@all');
		Route::get('delete/{id}', 'TipoAparelhoController@delete');
		Route::get('preparar-edicao/{id}', 'TipoAparelhoController@prepararEdicao');
		Route::post('acao', 'TipoAparelhoController@acao');
    });

    Route::group(['prefix' => 'os/tipo-servico'], function(){
    	Route::get('all', 'TipoServicoController@all');
    	Route::get('delete/{id}', 'TipoServicoController@delete');
    	Route::get('tela-adicionar', 'TipoServicoController@telaAdicionar');
    	Route::get('tela-edicao/{id}', 'TipoServicoController@telaEdicao');
    	Route::post('adicionar','TipoServicoController@adicionar');
    	Route::post('editar','TipoServicoController@editar');
    	Route::post('procurar', 'TipoServicoController@procurar');
    });

    Route::group(['prefix' => 'os/ordem-de-servico'], function(){
    	Route::get('all', 'OrdemDeServicoController@all');
    	Route::get('tela-adicionar1', 'OrdemDeServicoController@telaAdicionar1');
    	Route::get('tela-adicionar2/{id}', 'OrdemDeServicoController@telaAdicionar2');
        Route::get('tela-editar-os/{idOs}', 'OrdemDeServicoController@telaEdicaoOs');
    	Route::get('excluir-os/{idOs}', 'OrdemDeServicoController@excluirOs');
    	Route::get('procurar-adicionar1', 'OrdemDeServicoController@procurarAdicionar1');
    	Route::get('imprimir-guia-de-servico/{idOs}', 'OrdemDeServicoController@imprimirGuiaDeServico');
        Route::get('imprimir-guia-de-retirada/{idOs}', 'OrdemDeServicoController@imprimirRetiradaOs');
        Route::get('editar-aparelho/{idAparelho}', 'OrdemDeServicoController@editarAparelho');
        Route::get('excluir-laudo/{idLaudo}', 'OrdemDeServicoController@excluirLaudo');
        Route::post('salvar-laudo', 'OrdemDeServicoController@salvarLaudo');
        Route::post('confirmar-os', 'OrdemDeServicoController@confirmarOs');
        Route::post('salvar-novo-aparelho', 'OrdemDeServicoController@salvarNovoAparelho');
        Route::post('salvar-edicao-aparelho','OrdemDeServicoController@salvarEdicaoAparelho');
        Route::post('salvar-edicao-os', 'OrdemDeServicoController@salvarEdicaoOs');
        Route::group(['prefix' => 'filtro'], function(){
            Route::get('tela-filtro-os', 'FiltroOsController@telaFiltrarOs');
            Route::post('listagem-os', 'FiltroOsController@filtrarOs');
            Route::post('listar-os-campo', 'FiltroOsController@filtrarOsCampo');
        });
    });
});
