@extends('template.base')

@section('css')
<link rel="stylesheet" type="text/css" href="/sisfacil/public/js/jquery-ui/jquery-ui.css">
<style type="text/css">
	#valorOrcamento{
		font-size: 20px;
		background-color: #FCD9D9;
		color: red;
		font-weight: bold;
		text-align: center;
	}
	.marcador-checkbox{
		/* Usado somento para chamar função jquery */
	}
	.label-text-input{
		text-align: left;
		font-weight: bold;
		left: -13px;
	}
	.grupo-text-input{
		margin-top: 10px;
	}
</style>
@stop

@section('corpo')
<h1>Edição de aparelho:</h1>
<hr>
<form class="form-horizontal" role="form" action="/sisfacil/public/os/ordem-de-servico/salvar-edicao-aparelho" method="post">
	{!!csrf_field()!!}
	<input type="hidden" name='id' value='{{$aparelho->id}}'>
	<div class="form-group">
		<div class="col-md-2">
			<input type='submit' class='btn btn-success elemento-responsivo' value='Savar e voltar'>
		</div>
		<div class='col-md-2'>
			<a href='/sisfacil/public/os/ordem-de-servico/all' class='btn btn-danger elemento-responsivo'>Cancelar</a>
		</div>
		<div class='col-md-2'>
			<button type="button" class="btn btn-info elemento-responsivo" data-toggle="modal" data-target="#modalAdicionar">Incluir laudo</button>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-1" for='identificador'>Identificador:</label>
		<div class="col-md-1">
			<input type="text" class="form-control" name='identificador' id='identificador' value='{{$aparelho->identificador}}'>
		</div>
		<label class="control-label col-md-1">OS:</label>
		<div class="col-md-1">
			<input type="text" class="form-control" value='{{$aparelho->os->id}}'>
		</div>
		<label class="control-label col-md-1">Cliente:</label>
		<div class="col-md-7">
			<input type="text" class="form-control" value='{{$aparelho->os->cliente->nome}}'>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-1" for='numeroSerie'>N/S:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" name='numeroSerie' id='numeroSerie' value='{{$aparelho->numeroSerie}}'>
		</div>
		<label class="control-label col-md-2" for="idTipoAparelho">Tipo aparelho:</label>
		<div class="col-md-2">
			{!!App\MyLib\Repositorio\TipoAparelhoRepositorio::comboBox($aparelho->idTipoAparelho)!!}
		</div>
		<label class="control-label col-md-2" for="idTipoServico">Tipo serviço:</label>
		<div class="col-md-3">
			{!!App\MyLib\Repositorio\TipoServicoRepositorio::comboBox($aparelho->idTipoServico)!!}
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-1" for='aparelho'>Aparelho:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id='aparelho' name='aparelho' value='{{$aparelho->aparelho}}'>
		</div>
		<label class="control-label col-md-1" for='marca'>Marca:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id='marca' name='marca' value='{{$aparelho->marca}}'>
		</div><label class="control-label col-md-1" for='modelo'>Modelo:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" name='modelo' id='modelo' value='{{$aparelho->modelo}}'>
		</div>
		<label class="control-label col-md-1" for='dataAgendada'>Agendamento:</label>
		<div class="col-md-2">
			<input id='dataAgendada' type="text" class="form-control" name='dataAgendada' value='{{App\MyLib\Data::mySqlToData($aparelho->dataAgendada)}}'>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-1" for='situacaoOrcamento'>Orçamento:</label>
		<div class="col-md-2">
			<div class='selectContainer'>
	  			<select class='form-control' id='situacaoOrcamento' name='situacaoOrcamento' value='{{$aparelho->situacaoOrcamento}}'>
	  				<option  class='form-control' value='1' {{($aparelho->situacaoOrcamento=='1'?'selected':'')}}>Não feito</option>
	  				<option  class='form-control' value='2' {{($aparelho->situacaoOrcamento=='2'?'selected':'')}}>Feito</option>
	  				<option  class='form-control' value='3' {{($aparelho->situacaoOrcamento=='3'?'selected':'')}}>Aprovado</option>
	  				<option  class='form-control' value='4' {{($aparelho->situacaoOrcamento=='4'?'selected':'')}}>Recusado</option>
	  			</select>
	  		</div>
		</div>
		<div class='col-md-1'></div>
		<label class="control-label col-md-1" for='situacaoServico'>Serviço:</label>
		<div class="col-md-2">
			<div class='selectContainer'>
	  			<select class='form-control' id='situacaoServico' name='situacaoServico' value='{{$aparelho->situacaoServico}}'>
	  				<option  class='form-control' value='1' {{($aparelho->situacaoServico=='1'?'selected':'')}}>Não feito</option>
	  				<option  class='form-control' value='2' {{($aparelho->situacaoServico=='2'?'selected':'')}}>Em execução</option>
	  				<option  class='form-control' value='3' {{($aparelho->situacaoServico=='3'?'selected':'')}}>Finalizado</option>
	  				<option  class='form-control' value='4' {{($aparelho->situacaoServico=='4'?'selected':'')}}>Aguardando peça</option>
	  				<option  class='form-control' value='5' {{($aparelho->situacaoServico=='5'?'selected':'')}}>Em orçamento</option>
	  			</select>
	  		</div>
		</div>
		<div class='col-md-1'></div>
		<label class='control-label col-md-2' for='valorOrcamento'>Valor do orçamento:</label>
		<div class="col-md-2">
			<input id='valorOrcamento' type="text" class="form-control" name='valorOrcamento' value='{{$aparelho->valorOrcamento}}'>
		</div>
	</div>
	<div class='col-md-12'>
		<div class='col-md-6'>
			<div class='form-gourp'>
				<label class="checkbox-inline"><input id='aguardarCliente' class='marcador-checkbox' name='aguardarCliente' type="checkbox" value="{{$aparelho->aguardarCliente}}"/>Aguardar Cliente</label>
				<label class="checkbox-inline"><input id='orcamentoPassado' class='marcador-checkbox' name='orcamentoPassado' type="checkbox" value="{{$aparelho->orcamentoPassado}}"/>Orçamento passado</label>
				<label class="checkbox-inline"><input id='consertoAvisado' class='marcador-checkbox' name='consertoAvisado' type="checkbox" value="{{$aparelho->consertoAvisado}}"/>Conserto avisado</label>
				<label class="checkbox-inline"><input id='garantia' class='marcador-checkbox' name='garantia' type="checkbox" value="{{$aparelho->garantia}}"/>Garantia</label>
			</div>
		</div>
		<div class='col-md-3'>
			<div class="form-group">
				<label class="control-label col-md-4" for='dataRetirada'>Retirada:</label>
				<div class="col-md-8">
					<input id='dataRetirada' type="text" class="form-control" name='dataRetirada' value='{{App\MyLib\Data::mySqlToData($aparelho->dataRetirada)}}'>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class="form-group">
				<label class="control-label col-md-4" for='valorPago'>Valor pago:</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id='valorPago' name='valorPago' value='{{$aparelho->valorPago}}'>
				</div>
			</div>
		</div>
	</div>
	<div class='form-group grupo-text-input'>
		<div class='col-md-4'>
			<label for='observacoes' class='col-md-12 label-text-input'>Observações:</label>
			<textarea class='col-md-12 form-control' id='observacoes' name='observacoes' rows='5'>{{$aparelho->observacoes}}</textarea>
		</div><div class='col-md-4'>
			<label for='descricaoDefeito' class='col-md-12 label-text-input'>Descrição do defeito:</label>
			<textarea class='col-md-12 form-control' id='descricaoDefeito' name='descricaoDefeito' rows='5'>{{$aparelho->descricaoDefeito}}</textarea>
		</div><div class='col-md-4'>
			<label for='descricaoConserto' class='col-md-12 label-text-input'>Descricao do conserto:</label>
			<textarea class='col-md-12 form-control' id='descricaoConserto' name='descricaoConserto' rows='5'>{{$aparelho->descricaoConserto}}</textarea>
		</div>
	</div>
</form>
<!-- Listagem dos laudos -->
@if (count($aparelho->laudos)>0)
<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Data:</th>
			<th>Laudo:</th>
			<th>Operações:</th>
		</tr>
	</thead>
	<tbody>
		@foreach($aparelho->laudos as $laudo)
		<tr>
			<td>{{$laudo->data}}</td>
			<td>{{$laudo->laudo}}</td>
			<td style="text-align: center;">
				<a href="#" class="btn btn-success" aria-label="Left Align" title="Editar laudo"
					data-toggle="tooltip" data-placement="top" tooltip>
					<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
				</a>
				<a href="/sisfacil/public/os/ordem-de-servico/excluir-laudo/{{$laudo->id}}"
					class="btn btn-danger botaoExcluir" aria-label="Left Align"
				    title="Excluir laudo" data-placement="bottom" tooltip>
					<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

<!-- Modal para o formulário de adição de laudos -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
	    <div class="modal-header bg-primary">
	    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="controleModalLabel"><em>Cadastro de laudo</em></h4>
	    </div>
        <div class="modal-body">
        	<form action='/sisfacil/public/os/ordem-de-servico/salvar-laudo' id='formAdicionar' method="post">
        		{!!csrf_field()!!}
        		<input type='hidden' name='idOsAparelho' value='{{$aparelho->id}}'>
        		<label for='laudo' class='col-md-12 label-text-input'>Laudo:</label>
        		<textarea class="form-control" rows='6' name='laudo' id='laudo'></textarea>
        	</form>
		</div>
		<div class="modal-footer" style="border-style: none;">
			<div class="form-group col-md-12">
				<div class="col-md-6">
					<input type="submit" class="btn btn-success col-md-12 elemento-responsivo" value="Confirmar" form="formAdicionar"/>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-danger col-md-12 elemento-responsivo" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div> <!-- Fim da janela modal -->
@endsection

@section('scripts-exclusivos')
	<script src='/sisfacil/public/js/jquery-ui/jquery-ui.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#dataAgendada').datepicker();
			$val = $('#dataAgendada').val();
			$('#dataAgendada').datepicker("option", "dateFormat","dd/mm/yy");
			$('#dataAgendada').val($val);

			$('#dataRetirada').datepicker();
			$val = $('#dataRetirada').val();
			$('#dataRetirada').datepicker("option", "dateFormat","dd/mm/yy");
			$('#dataRetirada').val($val);

			$('#aguardarCliente').prop('checked',$("#aguardarCliente").val()=='s'?true:false);
			$('#orcamentoPassado').prop('checked',$("#orcamentoPassado").val()=='s'?true:false);
			$('#consertoAvisado').prop('checked',$("#consertoAvisado").val()=='s'?true:false);
			$('#garantia').prop('checked',$("#garantia").val()=='s'?true:false);

			$('.marcador-checkbox').click(function(){
				$(this).val($(this).prop('checked')==false?'n':'s');
			});
		});
	</script>
@stop


