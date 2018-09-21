@extends('template.template-relatorio')
@section('css')
<style type="text/css">
	#dados-cliente{
		border-bottom-style: solid;
		border-bottom-color: black;
		border-bottom-width: 1px;
	}
	#dados-aparelhos{
		clear: both;	
		text-align: center;
		margin: auto;
		font-size: 30px;
		font-weight: bold;
		text-decoration: underline;
		padding-top: 30px;
		padding-bottom: 10px;
	}

	#tabela{
		border-collapse: collapse;
		margin: auto;
	}
	#tabela td{
		text-align: justify;
		border-style: dotted;
		border-width: 1px;
		padding: 10px;
	}

	#tabela th{
		border-style: dotted;
		border-width: 1px;
		padding: 10px;
		background-color: #DCDCDC;
	}

	.colunas-iguais{
		border-style: dotted;
		border-width: 1px;
		border-color: black;
		width: 240px;
	}

	.primeira-linha-tabela{
		border-top-style: solid;
		border-top-width: 4px;
		border-top-color: black;
		border-left-style: solid;
		border-left-width: 4px;
		border-left-color: black;
		border-right-style: solid;
		border-right-width: 4px;
		border-right-color: black;
	}
	.segunda-linha-tabela{
		border-left-style: solid;
		border-left-width: 4px;
		border-left-color: black;
		border-right-style: solid;
		border-right-width: 4px;
		border-right-color: black;
	}
	.terceira-linha-tabela{
		border-bottom-style: solid;
		border-bottom-width: 4px;
		border-bottom-color: black;
		border-left-style: solid;
		border-left-width: 4px;
		border-left-color: black;
		border-right-style: solid;
		border-right-width: 4px;
		border-right-color: black;
	}

	#declaracao{
		text-align: justify;
	}

	.assinaturas{
		float: left;
		text-align: center;
		width:300px;
		margin-left: 100px;
		margin-right: 100px;
		border-top-style: solid;
		border-top-width: 1px;
		border-top-color: black;
	}

</style>
@stop

@section('corpo')
<div class="relatorio-A4">
	<br><br><br><br>
	<!-- Título do relatório -->
	<h4 class="texto-no-centro texto-negrito">Fechamento de ordem de serviço - Número: {{$os->id}}</h4>
	<div id='dados-cliente'>
		<div class='col-1'>
				<br>
				<div class='label-re'>Nome:</div><div class='text-box-re'>{{$os->cliente->nome}}</div>
				<div class='label-re'>Telefone:</div><div class='text-box-re'>{{$os->cliente->telefone}}</div>
				<div class='label-re'>Celular:</div><div class='text-box-re'>{{$os->cliente->celular}}</div>	
				<br><br>
				<div class='label-re'>Endereço:</div><div class='text-box-re'>{{$os->cliente->endereco}}</div>
				<div class='label-re'>Bairro:</div><div class='text-box-re'>{{$os->cliente->bairro}}</div>
				<div class='label-re'>Cidade:</div><div class='text-box-re'>{{$os->cliente->cidade}}</div>
				<div class='label-re'>UF:</div><div class='text-box-re'>{{$os->cliente->uf}}</div>
				<br><br>
				<div class='label-re'>CEP:</div><div class='text-box-re'>{{$os->cliente->cep}}</div>
				<div class='label-re'>Total:</div><div class='text-box-re'>{!!App\MyLib\Repositorio\OrdemServicoRepositorio::totalOs($os->id)!!}</div>
				<br><br>
		</div>
	</div>
	<div id='dados-aparelhos'>Dados dos aparelhos:</div>
	<table id='tabela'>
		<thead>
			<tr class='primeira-linha-tabela'>
				<th class='colunas-iguais'>Identificador</th>
				<th class='colunas-iguais'>Aparelho</th>
				<th class='colunas-iguais'>Marca</th>
				<th class='colunas-iguais'>Modelo</th>
			</tr>
			<tr class='segunda-linha-tabela'>
				<th colspan='4'>Descrição do defeito</th>
			</tr>
			<tr class='terceira-linha-tabela'>
				<th colspan='4'>Observações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($os->aparelhos as $aparelho)
			<tr class='primeira-linha-tabela'>
				<td class='colunas-iguais'>{{$aparelho->identificador}}</td>
				<td class='colunas-iguais'>{{$aparelho->aparelho}}</td>
				<td class='colunas-iguais'>{{$aparelho->marca}}</td>
				<td class='colunas-iguais'>{{$aparelho->modelo}}</td>
			</tr>
			<tr class='segunda-linha-tabela'>
				<td colspan='4'>
					<div class="label-re" style="width:200px;">Descrição do conserto: </div>
					<div class='text-box-re'>{{$aparelho->descricaoConserto}}</div>
				</td>
			</tr>
			<tr class='terceira-linha-tabela'>
				<td colspan='4'>
					<div class="label-re" style="width:200px;">Valor:</div>
					<div class='text-box-re'>{{$aparelho->valorPago}}</div>	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div id='declaracao'>
		<br><br><br>
		<p style="text-decoration: underline;">DECLARAÇÃO:</p>
		<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Eu, acima mencionado afirmo a quem possa interessar que o(s) aparelho(s) acima mensionado(s)
			me foi (foram) entregue(s) consertados como descrito acima. Estou siente que a garantia para
			todos os aparelhos é de 3 (três meses) e que cobre somente o conserto executado, a garantia
			é perdida no caso de danos por maus usos, ou danos da natureza (tais como raios). A garantia
			também será perdida caso os lacres sejam rompidos.
		</p>
	</div>
	<br><br><br><br><br><br><br>
	<div class='assinaturas'>
		Atendente/Técnico/Responsável
	</div>
	<div class='assinaturas'>
		{{$os->cliente->nome}}
	</div>

</div>
@stop
