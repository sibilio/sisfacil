@extends('template.base')

@section('css')
<!-- CSS personalizada para a página -->
@stop

@section('corpo')
	<h1 class='h3-destaque'>Filtros para OS</h3>
	<hr>
	<div class='col-md-12'>
		<form action='/sisfacil/public/os/ordem-de-servico/filtro/listagem-os' method='post'>
			{!!csrf_field()!!}
			<div class='col-md-4'>
				<div class="panel panel-primary">
				<div class="panel-heading titulo">Orçamento</div>
				  <div class="panel-body">
				    <div class='form-gourp' style='margin-left: 20px;'>
						<label class="checkbox"><input class='marcador-checkbox' name='naoFeitoOrcamento' type="checkbox" value="s"/>Não feito</label>
						<label class="checkbox"><input class='marcador-checkbox' name='feito' type="checkbox" value="s"/>Feito</label>
						<label class="checkbox"><input class='marcador-checkbox' name='aprovado' type="checkbox" value="s"/>Aprovado</label>
						<label class="checkbox"><input class='marcador-checkbox' name='recusado' type="checkbox" value="s"/>Recusado</label>
					</div>
				  </div>
				</div>
			</div>

			<div class='col-md-4'>
				<div class="panel panel-primary">
				<div class="panel-heading titulo">Serviço</div>
				  <div class="panel-body">
				    <div class='form-gourp' style='margin-left: 20px;'>
						<label class="checkbox"><input class='marcador-checkbox' name='naoFeitoServico' type="checkbox" value="s"/>Não feito</label>
						<label class="checkbox"><input class='marcador-checkbox' name='emExecucao' type="checkbox" value="s"/>Em execução</label>
						<label class="checkbox"><input class='marcador-checkbox' name='finalizado' type="checkbox" value="s"/>Finalizado</label>
						<label class="checkbox"><input class='marcador-checkbox' name='aguardandoPeca' type="checkbox" value="s"/>Aguardando peça</label>
						<label class="checkbox"><input class='marcador-checkbox' name='emOrcamento' type="checkbox" value="s"/>Em orçamento</label>
					</div>
				  </div>
				</div>
			</div>

			<div class='col-md-4'>
				<div class="panel panel-primary">
					<div class="panel-heading titulo">Outros</div>
					  <div class="panel-body">
					  	<div class='form-gourp' style='margin-left: 20px;'>
					  		<label class="checkbox"><input class='marcador-checkbox' name='garantia' type="checkbox" value="s"/>Garantia</label>
							<label class="checkbox"><input class='marcador-checkbox' name='orcamentoNaoPassado' type="checkbox" value="s"/>Orçamento não passado</label>
							<label class="checkbox"><input class='marcador-checkbox' name='consertoNaoAvisado' type="checkbox" value="s"/>Conserto não avisado</label>
							<label class="checkbox"><input class='marcador-checkbox' name='aguardandoCliente' type="checkbox" value="s"/>Aguardando cliente</label>
					  </div>
					</div>
				</div>
			</div>
		</div>

		<div class='form-group'>
			<div class='col-md-2'>
				<input type='submit' class='btn btn-primary elemento-responsivo' value='Filtrar'>
			</div>
			<div class='col-md-2'>
				<a href="#" class='btn btn-danger elemento-responsivo'>Cancelar</a>
			</div>
		</div>
	</form>
	
</div>
@stop

@section('scripts-exclusivos')
<!-- Seção vazia -->
@stop