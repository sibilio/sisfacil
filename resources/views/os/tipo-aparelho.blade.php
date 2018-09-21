
<!-- Apresenta uma página em branco -->

@extends('template.base')

@section('corpo')
	<h1 class="h3-destaque">Listagem de tipos de aparelhos</h1>
	<form id="form" class="form-horizontal" role="form" action="/sisfacil/public/os/tipo-aparelho/acao" method="post">
		{!!csrf_field()!!}
		<input type="hidden" name="opcao" id="opcao" value="{{$opcao}}" />
		<input type="hidden" name="id" id="id" value="{{$id}}" />
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3" for="inscricao">Tipo aparelho:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="tipo-aparelho" id="tipo-aparelho" value="{{$tipo}}">
					</div>
					<input type="submit" class="btn btn-success botaoGravar" id="botao-submit" value="Gravar">
				</div>
			</div>
		</div>
	</form>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Tipo aparelho</th>
				<th>Operação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipoAparelho as $tipo)
				<tr>
					<td>{{$tipo->id}}</td>
					<td>{{$tipo->tipoAparelho}}</td>
					<td class="text-center">
						<a href="/sisfacil/public/os/tipo-aparelho/preparar-edicao/{{$tipo->id}}" class="btn btn-success botaoEditar" aria-label="Left Align"
							   title="Excluir parceiro" data-placement="bottom" tooltip>
								<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
						</a>
						<a href="/sisfacil/public/os/tipo-aparelho/delete/{{$tipo->id}}" class="btn btn-danger botaoExcluir" aria-label="Left Align"
							   title="Excluir parceiro" data-placement="bottom" tooltip>
								<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('scripts-exclusivos')
<script type="text/javascript">
	$(document).ready(function(){
		$(".botaoGravar").click(function(){
			if($("#opcao").val()=="2")
				$("#opcao").val("2");
			else
				$("#opcao").val("1");
		});

	});
</script>

@stop