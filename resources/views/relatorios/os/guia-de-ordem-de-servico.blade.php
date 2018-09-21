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
	<h4 class="texto-no-centro texto-negrito">Guia de ordem de serviço - Número: {{$os->id}}</h4>
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
					<div class="label-re" style="width:200px;">Descrição do defeito: </div>
					<div class='text-box-re'>{{$aparelho->descricaoDefeito}}</div>
				</td>
			</tr>
			<tr class='terceira-linha-tabela'>
				<td colspan='4'>
					<div class="label-re" style="width:200px;">Observações:</div>
					<div class='text-box-re'>{{$aparelho->observacoes}}</div>	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div id='declaracao'>
		<br><br><br>
		<p style="text-decoration: underline;">DECLARAÇÃO:</p>
		<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Eu acima mencionado afirmo a quem possa interessar que deixei o(s) aparelho(s) acima citado,
			que estava em minha responsabilidade, para orçamento e afirmo estar ciente que após o orçamento
			me ser transmitido, seja por telefone ou pessoalmente, devo aprovar ou reprovar o orçamento
			no período máximo de 07 (sete) dias, caso não me pronuncie sobre o orçamento nesse período, o mesmo
			será considerado recusado por mim, nesse caso afirmo estar ciente que devo retirar o aparelho no
			prazo máximo de 30 (dias), e que após essa data o aparelho passará a pertencer a empresa
			Elaine Duarte Sibilio ME (Toner Games) e está poderá dispor do aparelho como desejar. Já no caso
			de aprovação do orçamento, seja pessoalmente ou por telefone, fico ciente de que tenho o prazo máximo
			máximo de retirado do aparelho de 45 (quarenta e cinco) a contar do comunicado do orçamento e que
			após essa data o referido aparelho passa a ser de propriedade da empresa Elaine Duarte Sibilio ME
			(Toner Games) que poderá dispor do aparelho como desejar. Atesto a quem possa interessar
			que estou ciente e concordo com os termos descritos acima.
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
