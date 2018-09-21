<!-- Apresenta uma página em branco -->

@extends('template.base')

@section('corpo')
<h1 class="h3-destaque">Listagem de tipos de serviços</h1>
<div class="col-md-12">
	<a href="/sisfacil/public/os/tipo-servico/tela-adicionar" class="btn btn-info">Novo Tipo de serviço</a>
	<div class="col-lg-7 pull-right">
	    <form action="/sisfacil/public/os/tipo-servico/procurar" method="post">
		    {!! csrf_field() !!}
		    <input type="hidden" value="" name="opcao" id="opcao">
		    <div class="input-group">
		      <input type="text" name="criterio" class="form-control" placeholder="Procurar por tipo de serviço...">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="submit">
		        	<span class="glyphicon glyphicon-search" aria-hidden="false"></span>
		        	Procurar
		        </button>
		      </span>
		    </div><!-- /input-group -->
	    </form>
	</div><!-- /.col-lg-6 -->
</div>

<div class="pagination center"> {!!$tiposServicos->render()!!}</div>

<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Tipo de serviço</th>
				<th>Preço</th>
				<th>Prazo de entrega<br/>(em dias)</th>
				<th>Custo-hora</th>
				<th>Grau de<br/>dificuldade</th>
				<th>Observações</th>
				<th>Operações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tiposServicos as $tipoServico)
				<tr>
					<td>{{$tipoServico->id}}</td>
					<td>{{$tipoServico->tipoServico}}</td>
					<td class="text-center">{{$tipoServico->preco}}</td>
					<td class="text-center">{{$tipoServico->prazoEntrega}}</td>
					<td class="text-center">{{$tipoServico->custo}}</td>
					<td class="text-center">{{$tipoServico->grauDificuldade}}</td>
					<td>{{$tipoServico->observacoes}}</td>
					<td style="text-align: center;">
							<a href="/sisfacil/public/os/tipo-servico/tela-edicao/{{$tipoServico->id}}" class="btn btn-success" aria-label="Left Align" title="Editar parceiro" data-toggle="tooltip" data-placement="top" tooltip>
								<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
							</a>
							<a href="#" class="btn btn-danger botaoExcluir" aria-label="Left Align"
								data-toggle="modal" data-target="#excluirModal" data-idExcluir="{{$tipoServico->id}}"
							    title="Excluir parceiro" data-placement="bottom" tooltip>
								<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
							</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination"> {!!$tiposServicos->render()!!} </div>

	<!-- Modal para confirmação de exclusão de registro -->
	<div id="excluirModal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Confirmação de exclusão</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente excluir esse tipo de serviço?</p>
				</div>
				<div class="modal-footer">
					<a id="botaoSimExcluir" href="#" class="btn btn-danger"data-dismiss="modal">Sim</a>
					<button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('scripts-exclusivos')
<script type="text/javascript">
	$(document).ready(function(){
		//Funções para exclusão de registro através de janela modal
		$(".botaoExcluir").click(function(event){
				idExcluir = $(this).data('idexcluir');
		});

		$("#botaoSimExcluir").click(function(){
			window.location.href = "/sisfacil/public/os/tipo-servico/delete/"+idExcluir;
		});
		//fim funções para exclusão
	});
</script>
@stop