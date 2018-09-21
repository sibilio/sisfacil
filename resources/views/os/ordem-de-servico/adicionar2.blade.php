@extends('template.base')

@section('corpo')
<h1 class="h3-destaque">Registro de nova ordem de serviço</h1>
<div id="wizard-form" class="col-md-12">
	<div id="passo1" class="col-md-3 passo-realizado">
		<p class="passo">
			Passo 1 
			<span class="glyphicon glyphicon-ok" aria-hidden="false"></span>
		</p>
		<p class="descricao-passo">Selecione o cliente</p>
	</div>
	<div id="passo2" class="col-md-3 passo-atual">
		<p class="passo">Passo 2</p>
		<p class="descricao-passo">Dados da Ordem de serviço</p>
	</div>
	<div id="passo3" class="col-md-3 passo-nao-realizado">
		<p class="passo">Passo 3</p>
		<p class="descricao-passo">Registro dos aparelhos</p>
	</div>
</div>
<div class="col-md-12">
	<form class="form-horizontal" role="form" action="/sisfacil/public/os/ordem-de-servico/confirmar-os" method="post" style="margin-top: 15px;">
		{!!csrf_field()!!}
		<div class="form-group">
			<label class="control-label col-md-2" for="idCliente">Código do cliente:</label>
			<div class="col-md-1">
				<input type="text" class="form-control" id="idCliente" name="idCliente" value="{{$parceiro->id}}">
			</div>
			<label class="control-label col-md-1" for="nome">Nome:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="nome" name="nome" value="{{$parceiro->nome}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="outrosContatos">Outros contatos:</label>
			<div class="col-md-5">
				<textarea class="form-control" id="outrosContatos" name="outrosContatos" rows="3"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="acessorios">Acessórios:</label>
			<div class="col-md-5">
				<textarea class="form-control" id="acessorios" name="acessorios" rows="3"></textarea>		
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="observacoes">Observação:</label>
			<div class="col-md-5">
				<textarea class="form-control" id="obaservacoes" name="observacoes" rows="3"></textarea>		
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<a href="/sisfacil/public/os/ordem-de-servico/all" class="btn btn-danger elemento-responsivo">Cancelar</a>
			</div>
			<div class="col-md-2">
				<input type="submit" class="col-mod-1 btn btn-success elemento-responsivo" value="Confirmar"/>
			</div>
		</div>
	</form>
</div>
@stop

@section('scripts-exclusivos')
<!-- Seção vazia -->
@stop