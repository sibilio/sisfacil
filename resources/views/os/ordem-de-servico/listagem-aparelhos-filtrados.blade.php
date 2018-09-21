@extends('template.base')

@section('css')
<!-- CSS personalizada para a página -->
@stop

@section('corpo')
	@foreach($aparelhos as $aparelho)
		<table class='table table-bordered'>
			<tbody>
				<tr>
					<td>
						<p>Os = {{$aparelho->os->id}}</p>
						<p>Nome = {{$aparelho->os->cliente->nome}}</p>
						<p>Aparelho = {{$aparelho->aparelho}}</p>
					</td>
				</tr>
			</tbody>
		</table>
	@endforeach
@stop

@section('scripts-exclusivos')
<!-- Seção vazia -->
@stop