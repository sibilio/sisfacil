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
	<div id="passo2" class="col-md-3 passo-realizado">
		<p class="passo">
			Passo 2
			<span class="glyphicon glyphicon-ok" aria-hidden="false"></span>
		</p>
		<p class="descricao-passo">Dados da Ordem de serviço</p>
	</div>
	<div id="passo3" class="col-md-3 passo-atual">
		<p class="passo">Passo 3</p>
		<p class="descricao-passo">Registro dos aparelhos</p>
	</div>
</div>
<div class="col-md-12" style="margin-top:10px;">
	<div class="col-md-12">
		<div class="form-group">
			<div class="col-md-2">
				<a href="/sisfacil/public/os/ordem-de-servico/all" class="btn btn-primary elemento-responsivo">Finalizar</a>
			</div>
			<div class="col-md-2">
				<a href="/sisfacil/public/os/ordem-de-servico/imprimir-guia-de-servico/{{$os->id}}" class="btn btn-success elemento-responsivo" target="_blank">Imprimir</a>
			</div>
			<div class="col-md-2">
				<a href="#" class="btn btn-warning elemento-responsivo" aria-label="Left Align" data-target="#modalAdicionar"
				   title="Adicionar novo aparelho" data-toggle="modal" data-placement="bottom" tooltip>
					<span class="glyphicon glyphicon-plus" aria-hidden="false"></span>Adicionar aparelho
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-12" style="margin-top: 20px;">
		<div class="col-md-2 label-simples">Código do cliente:</div>
		<div class="col-md-1 input-text-simples">{{$os->idCliente}}</div>
		<div class="col-md-1 label-simples">Nome:</div>
		<div class="col-md-4 input-text-simples">{{$os->cliente->nome}}</div>
	</div>
</div>

<div class="col-md-12 linha"></div>

<div class="col-md-12">
	@if(count($os->aparelhos)>0)
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Identificador:</th>
				<th>Aparelho:</th>
				<th>Tipo serviço:</th>
				<th>Marca:</th>
				<th>Modelo:</th>
				<th>Operações:</th>
			</tr>
		</thead>
		<tbody>
			@foreach($os->aparelhos as $aparelho)
			<tr>
				<td>{{$aparelho->identificador}}</td>
				<td>{{$aparelho->aparelho}}</td>
				<td>{{$aparelho->tipoServico->tipoServico}}</td>
				<td>{{$aparelho->marca}}</td>
				<td>{{$aparelho->modelo}}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>

<!-- Modal para o formulário de adção de aparelhos -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	    <div class="modal-header bg-primary">
	    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="controleModalLabel"><em>Cadastro de aparelhos</em></h4>
	    </div>
        <div class="modal-body">
	        <div class="col-md-12">
				<form class="form-horizontal" role="form" action="/sisfacil/public/os/ordem-de-servico/salvar-novo-aparelho" method="post" id="formAdicionar">
					{!!csrf_field()!!}
					<input type="hidden" name="idOs" value="{{$os->id}}">
					<div class="form-group">
						<label class="col-md-2 control-label" for="aparelho">Aparelho:</label>
						<div class="col-md-3">
							<input type="text" name="aparelho" class="form-control">
						</div>
						<label class="control-label col-md-1" for="marca">Marca:</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="marca"/>
						</div>
						<label class="control-label col-md-1" for="modelo">Modelo:</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="modelo"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="idTipoAparelho">Tipo aparelho:</label>
						<div class="col-md-3">
							{!!App\MyLib\Repositorio\TipoAparelhoRepositorio::comboBox()!!}
						</div>
						<label class="control-label col-md-2" for="idTipoServico">Tipo serviço:</label>
						<div class="col-md-5">
							{!!App\MyLib\Repositorio\TipoServicoRepositorio::comboBox()!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for='identificador'>Identificador</label>
						<div class="col-md-4">
							<input type='text' id='identificador' class='form-control' name='identificador'>
						</div>
						<label class="col-md-2 control-label" for='data-agendada'>Agendamento</label>
						<div class="col-md-4">
							<input type='date' id='data-agendada' class='form-control' name='dataAgendada'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="descricaoDefeito">Descrição do defeito:</label>
						<div class="col-md-10">
							<textarea class="form-control" name="descricaoDefeito" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="observacoes">Observações:</label>
						<div class="col-md-10">
							<textarea class="form-control" name="observacoes" rows="3"></textarea>
						</div>
					</div>
					
				</form>
		    </div>	
		</div>
		<div class="modal-footer" style="border-style: none;">
			<div class="form-group col-md-12">
				<div class="col-md-3">
					<input type="submit" class="btn btn-success col-md-12 elemento-responsivo" value="Confirmar" form="formAdicionar"/>
				</div>
				<div class="col-md-3">
					<input type="reset" class="btn btn-warning col-md-12 elemento-responsivo" value="Limpar" form="formAdicionar"/>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-danger col-md-12 elemento-responsivo" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div> <!-- Fim da janela modal -->

@stop

@section('scripts-exclusivos')
<!-- Seção vazia -->
@stop