@extends('template.base')

@section('corpo')
	<h1 class="enunciado-listagem">Listagem de parceiros</h1>
	<div class="controles-abaixo-enunciado">
		<div class="btn-group">
			<a id="botaoClientes" href="{{action('ParceiroController@all', 'c')}}" class="{{($tipoParceiro=='c')?'btn btn-primary':'btn btn-default'}}">Clientes</a>
			<a id="botaoFornecedores" href="{{action('ParceiroController@all', 'f')}}" class="{{($tipoParceiro=='f')?'btn btn-primary':'btn btn-default'}}">Fornecedores</a>
			<a id="botaoAmbos" href="{{action('ParceiroController@all', 'a')}}" class="{{($tipoParceiro=='a')?'btn btn-primary':'btn btn-default'}}">Ambos</a>
		</div>
		<a href="/sisfacil/public/parceiro/adicionarparceiro" class="btn btn-info pull-right">Novo parceiro</a>
		<div class="col-lg-6 pull-right">
		    <form action="{{action('ParceiroController@procurar')}}" method="get">
			    <div class="input-group">
			      <input type="hidden" name="tipo_parceiro" value="{{$tipoParceiro}}">
			      <input type="text" name="criterio" class="form-control" placeholder="Procurar por nome, telefone, celular ou e-mail...">
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
	<div class="pagination center"> {!! $parceiros->appends(['criterio' => $criterio,'tipo_parceiro' => $tipoParceiro])->links() !!} </div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Celular</th>
				<th>E-mail</th>
				<th>Operação</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($parceiros as $parceiro)
				<tr>
					<td>{{$parceiro->id}}</td>
					<td>{{$parceiro->nome}}</td>
					<td>{{$parceiro->telefone}}</td>
					<td>{{$parceiro->celular}}</td>
					<td>{{$parceiro->email}}</td>
					<td style="text-align: center;">
							<a href="#" class="btn btn-primary" aria-label="Left Align" title="Visualizar parceiro" data-toggle="tooltip" data-placement="top" tooltip>
								<span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="false"></span>
							</a>
							<a href="{{action('ParceiroController@editar',$parceiro->id)}}" class="btn btn-success" aria-label="Left Align" title="Editar parceiro" data-toggle="tooltip" data-placement="top" tooltip>
								<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
							</a>
							<a href="#" class="btn btn-danger botaoExcluir" aria-label="Left Align" data-target="#confirmaExclusao"
							   title="Excluir parceiro" data-toggle="modal" data-placement="bottom" tooltip
							   data-idExcluir="{{$parceiro->id}}">
								<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
							</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination"> {!! $parceiros->appends(['criterio' => $criterio,'tipo_parceiro' => $tipoParceiro])->links() !!} </div>

<!-- Modal para confirmação da exclusão de registro -->
	<div class="modal fade" id="confirmaExclusao" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-danger">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="controleModalLabel"><em>Confirmação de exclusão</em></h4>
	      </div>
	      <div class="modal-body">
	      	<p>Deseja realmente exluir esse parceiro?</p>
	      	<div class='form-group'>
	      		<a id="botaoSimExcluir" href="#" class="btn btn-danger"data-dismiss="modal">Sim</a>
	      		<button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@stop

@section('scripts-exclusivos')
<script type="text/javascript">
		var idExcluir;
		$(document).ready(function(){
			$(".botaoExcluir").click(function(event){
				idExcluir = $(this).data('idexcluir');
			});

			$("#botaoSimExcluir").click(function(){
				window.location.href = "/sisfacil/public/parceiro/delete/"+idExcluir;
			});
		});
</script>
@stop