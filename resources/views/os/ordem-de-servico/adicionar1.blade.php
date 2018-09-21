<!-- Apresenta uma página em branco -->

@extends('template.base')

@section('corpo')
<h1 class="h3-destaque">Registro de nova ordem de serviço</h1>
<div id="wizard-form" class="col-md-12">
	<div id="passo1" class="col-md-3 passo-atual">
		<p class="passo">Passo 1</p>
		<p class="descricao-passo">Selecione o cliente</p>
	</div>
	<div id="passo2" class="col-md-3 passo-nao-realizado">
		<p class="passo">Passo 2</p>
		<p class="descricao-passo">Dados da Ordem de serviço</p>
	</div>
	<div id="passo3" class="col-md-3 passo-nao-realizado">
		<p class="passo">Passo 3</p>
		<p class="descricao-passo">Registro dos aparelhos</p>
	</div>
</div>
<div class="col-md-12">
	<form class="form-horizontal" role="form" action="/sisfacil/public/os/ordem-de-servico/procurar-adicionar1" method="get" style="margin-top: 20px;">
		<div class="form-group">
			<label class="control-label col-md-2" for="idCliente">Código:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="idCliente" name="idCliente">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="nome">Nome:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="nome" name="nome">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="telefone">Telefone:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="telefone" name="telefone">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6">
				<div class="col-md-4">
					<input type="submit" class="btn btn-primary elemento-responsivo" value="Procurar...">
				</div>
				<div class="col-md-4">
					<a href="#" class="btn btn-success elemento-responsivo">Novo cliente</a>
				</div>
				<div class="col-md-4">
					<a href="/sisfacil/public/os/ordem-de-servico/all" class="btn btn-danger elemento-responsivo">Cancelar</a>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="col-md-12">{!! $parceiros->appends(['idCliente' => $idCliente, 'nome' => $nome, 'telefone' => $telefone])->links() !!}</div>
<div class="col-md-12">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome:</th>
				<th>Telefone:</th>
				<th>Endereço:</th>
				<th>Selecionar:</th>
			</tr>
		</thead>
		<tbody>
			@foreach($parceiros as $parceiro)
				<tr>
					<td>{{$parceiro->id}}</td>
					<td>{{$parceiro->nome}}</td>
					<td>{{$parceiro->telefone}}</td>
					<td>{{$parceiro->endereco}}</td>
					<td class="text-center">
						<a href="/sisfacil/public/os/ordem-de-servico/tela-adicionar2/{{$parceiro->id}}" class="btn btn-success">
							<span class="glyphicon glyphicon-ok" aria-hidden="false"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="col-md-12">{!! $parceiros->appends(['idCliente' => $idCliente, 'nome' => $nome, 'telefone' => $telefone])->links() !!}</div>
@stop


@section('scripts-exclusivos')
<!-- Seção vazia -->
@stop