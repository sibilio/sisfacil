@extends('template.base')

@section('css')
<link rel="stylesheet" type="text/css" href="/sisfacil/public/js/jquery-ui/jquery-ui.css">
@stop

@section('corpo')
<h1 class="h3-destaque">OS: {{$os->id}} - {{$os->cliente->nome}}</h1>
<hr>
<form action="/sisfacil/public/os/ordem-de-servico/salvar-edicao-os" method="post" class='form-horizontal' role='form'>
	{{csrf_field()}}
	<input type='hidden' value='{{$os->id}}' name='id'>
	<div class='col-md-12'>
		<div class="form-group">
			<label class="control-label col-md-2" for="outrosContatos">Outros contatos:</label>
			<div class="col-md-5">
				<textarea class="form-control" id="outrosContatos"
					name="outrosContatos" rows='5'>{{$os->outrosContatos}}</textarea>
			</div>
			<label class="control-label col-md-2">data de entrada:</label>
			<div class="col-md-2">
				<label class="form-control" for="dataEntrada">{{$os->dataEntrada}}:</label>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="observacoes">Observações:</label>
			<div class="col-md-5">
				<textarea class="form-control" id="observacoes"
					name="observacoes" rows='5'>{{$os->observacoes}}</textarea>
			</div>
			<label class="control-label col-md-2" for='dataFechamento'>data de fechamento:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="dataFechamento" name="dataFechamento" value="{{$os->dataFechamento}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="acessorios">Acessórios:</label>
			<div class="col-md-5">
				<textarea class="form-control" id="acessorios"
					name="acessorios" rows='5'>{{$os->acessorios}}</textarea>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-md-2'>
				<input type='submit' class='btn btn-success elemento-responsivo' value='Salvar e voltar'>
			</div>
			<div class='col-md-2'>
				<a href='/sisfacil/public/os/ordem-de-servico/all' class='btn btn-danger elemento-responsivo'>Cancelar</a>
			</div>
		</div>
	</div>
</form>


@stop

@section('scripts-exclusivos')
	<script src='/sisfacil/public/js/jquery-ui/jquery-ui.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#dataFechamento').datepicker();
			$val = $('#dataFechamento').val();
			$('#dataFechamento').datepicker("option", "dateFormat","dd/mm/yy");
			$('#dataFechamento').val($val);
		});
	</script>
@stop