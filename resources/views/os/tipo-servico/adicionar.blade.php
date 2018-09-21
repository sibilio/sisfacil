<!-- Apresenta uma página em branco -->

@extends('template.base')

@section('corpo')
<h1 class="h3-destaque">Cadastro de novo tipo de serviço</h1>
<hr>
<form class="form-horizontal" role="form" action="/sisfacil/public/os/tipo-servico/adicionar" method="post">
	{!! csrf_field() !!}
	<!-- acao=1 (salvar) / acao=2 (editar)-->
	<div class="form-group">
		<label class="control-label col-md-2 text-right" for="tipo-servico">Tipo de serviço:</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="tipo-servico" id="tipo-servico" value="{{old('tipoServico')}}">
		</div>
		<label class="control-label col-md-2" for="tipo-servico">Prazo de entrega:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" name="prazo-entrega" id="prazo-entrega" value="{{old('prazoEntrega')}}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2" for="preco">Preço:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" name="preco" id="preco" value="{{old('preco')}}">
		</div>
		<label class="control-label col-md-1" for="custo">Custo:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" name="custo" id="custo" value="{{old('custo')}}">
		</div>
		<label class="control-label col-md-2" for="preco">Grau de dificuldade:</label>
		<div class="col-md-3">
			<input type="text" class="form-control" name="grau-dificuldade" id="grau-dificuldade" value="{{old('grauDificuldade')}}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2" for="observacoes">Observações:</label>
		<div class="col-md-5">
			<textarea name="observacoes" id="observacoes" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="button-group">
			<input type="reset" class="btn btn-warning" value="Limpar" style="margin-left:15px;"/>
			<input type="submit" class="btn btn-success" value="Salvar"/>
			<a href="/sisfacil/public/os/tipo-servico/all" class="btn btn-danger">Cancelar</a>
		</div>			
	</div>
</form>
@stop

@section('scripts-exclusivos')
<script type="text/javascript" charset="UTF-8">
	
</script>
@stop