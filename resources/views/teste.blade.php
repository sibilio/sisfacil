@extends('template.base')

@section('corpo')
<div class='jumbotron'>
	<h1>Teste do template</h1>
</div>
@stop

<!-- deve ser usado somente para adicionar o caminho de scripts js, aqui foi colocado
	 tags html para efeito de teste mas não devem ser usadas. -->
@section('scripts-exclusivos')
<div class="bg-primary">
	<h1> Seção para scripts exclusivos </h1>
</div>
@stop