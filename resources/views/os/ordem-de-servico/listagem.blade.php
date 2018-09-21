<!-- Apresenta uma página em branco -->

@extends('template.base')

@section('css')
<style type="text/css">
	.link-clinte:link{
		color: white;
	}
	.link-clinte:visited{
		color: white;
	}
	.link-clinte:hover{
		color: white;
		font-weight: bold;
	}
	.link-clinte:active{
		color: white;
	}
	#ordens .fechado{
		background-color: #d67171;
		color: white;
		font-weight: bold;
		height: 50px;
		font-size: 18px;
	}
</style>
@stop

@section('corpo')
<h1 class="h3-destaque">Listagem de ordens de serviço</h1>
<hr>
<div class="col-md-12">
	<div class="col-md-6">
		<div class="col-md-12 elemento-responsivo">
		    <form action="/sisfacil/public/os/ordem-de-servico/filtro/listar-os-campo" method="post">
			    {!! csrf_field() !!}
			    <input type="hidden" value="" name="opcao" id="opcao">
			    <div class="input-group">
			      <input type="text" name="criterio" class="form-control" placeholder="Digite como no exemplo: [no]me=Marcos ou os=75 ou [nu]merador=112454">
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
	<div class="col-md-2">
		<a href="/sisfacil/public/os/ordem-de-servico/tela-adicionar1" class="btn btn-info elemento-responsivo">Nova Ordem de serviço</a>
	</div>
	<div class="col-md-1">
		<a href="/sisfacil/public/os/ordem-de-servico/filtro/tela-filtro-os" class="btn btn-primary elemento-responsivo">Filtros</a>
	</div>
	<div class="col-md-2">
		<a href="/sisfacil/public/os/ordem-de-servico/all" class="btn btn-primary elemento-responsivo">Mostrar todos</a>
	</div>
</div>

<div class="pagination center"> {!!$ordens->links()!!}</div>

<table id="ordens">
	<thead>
		<tr>
			<th style="width:17.5%;">Número</th>
			<th style="width:17.5%;">Data</th>
			<th style="width:  30%;">Cliente</th>
			<th style="width:17.5%;">Telefone</th>
			<th style="width:17.5%;">Operações</th>
		</tr>
	</thead>
	<tbody>
		@foreach($ordens as $ordem)
			<tr class="{{($ordem->dataFechamento!='0000-00-00 00:00:00')?'fechado':'azul'}}">
				<td style="text-align: center;">{{$ordem->id}}</td>
				<td style="text-align: center;">{{App\MyLib\TabelaOs::dataOs($ordem->dataEntrada)}}</td>
				<td>
					<a href="{{action('ParceiroController@editar',$ordem->cliente->id)}}" class="link-clinte">
						{{$ordem->cliente->nome}}
					</a>
				</td>
				<td>{{$ordem->cliente->telefone}}</td>
				<td style="text-align: center;">
							<a href="/sisfacil/public/os/ordem-de-servico/tela-editar-os/{{$ordem->id}}" class="btn btn-success" aria-label="Left Align" title="Editar os"
								data-toggle="tooltip" data-placement="top" tooltip>
								<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
							</a>
							<a href="/sisfacil/public/os/ordem-de-servico/imprimir-guia-de-servico/{{$ordem->id}}"
								class="btn btn-primary" aria-label="Left Align"
								title="Imprimir os" data-toggle="tooltip"
								data-placement="top" tooltip target="_blank">
								<span class="glyphicon glyphicon-print" aria-hidden="false"></span>
							</a>
							<a href="/sisfacil/public/os/ordem-de-servico/imprimir-guia-de-retirada/{{$ordem->id}}"
								class="btn btn-warning" aria-label="Left Align"
								title="fechar os" data-toggle="tooltip"
								data-placement="top" tooltip target="_blank">
								<span class="glyphicon glyphicon-share" aria-hidden="false"></span>
							</a>
							<a href="/sisfacil/public/os/ordem-de-servico/excluir-os/{{$ordem->id}}"
								class="btn btn-danger botaoExcluir" aria-label="Left Align"
							    title="Excluir OS" data-placement="bottom" tooltip>
								<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
							</a>
				</td>	
			</tr>
			@foreach($ordem->aparelhos as $aparelho)
			<tr class="branco">
				<td colspan="2">
					<p><em>Numerador:</em> {{$aparelho->identificador}}</p>
					<p><em>Aparelho:</em> {{$aparelho->aparelho}}</p>
					<p><em>Ocorrência:</em> {{$aparelho->descricaoDefeito}}</p>
					<p><em>Agendamento:</em> <span {!!App\MyLib\Data::dataMenorQueHoje($aparelho->dataAgendada)?"style='color:red; font-weight: bold;'":"style='color:black;'"!!}>{{App\MyLib\TabelaOs::dataOs($aparelho->dataAgendada)}}<span></p>
				</td>
				<td>
					<p><em>Valor do orçamento:</em> {{$aparelho->valorOrcamento}}</p>
					<p><em>Orçamento passado:</em>{{$aparelho->orcamentoPassado=='s'?"Sim":"Não"}}</p>
					<p><em>Conserto avisado:</em>{{$aparelho->consertoAvisado=='s'?"Sim":"Não"}}</p>
					<p><em>Descrição do conserto:</em> {{$aparelho->descricaoConserto}}</p>
				</td>
				<td>{!!App\MyLib\TabelaOs::tagServico($aparelho->situacaoServico, $aparelho->garantia)!!}</td>
				<td style="text-align: center;">
					<a href="/sisfacil/public/os/ordem-de-servico/editar-aparelho/{{$aparelho->id}}" class="btn btn-success" aria-label="Left Align" title="Editar parceiro" data-toggle="tooltip" data-placement="top" tooltip>
						<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
					</a>
					<a href="#" class="btn btn-danger botaoExcluir" aria-label="Left Align"
						data-toggle="modal" data-target="#excluirModal" data-idExcluir="#"
					    title="Excluir parceiro" data-placement="bottom" tooltip>
						<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
					</a>
				</td>	
			</tr>
			@endforeach
		@endforeach
	</tbody>
</table>

<div class="pagination center">
	{!! $ordens->appends(['ordens' => $ordens])->links() !!}
</div>

@stop

@section('scripts-exclusivos')
<!-- Seção vazia -->
@stop