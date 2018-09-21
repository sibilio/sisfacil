@extends('template.base')

@section('corpo')
	@if ($parceiro->id == "")
		<h3 class="h3-destaque">Cadastro de novo parceiro</h3>
	@else
		<h3 class="h3-destaque">Edição de parceiro</h3>
	@endif

	<!-- Mensagens de erro -->
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<hr>
	@if($parceiro->id == "")
		<form class="form-horizontal" role="form" action="/sisfacil/public/parceiro/realizarcadastro" method="post">
	@else
		<form class="form-horizontal" role="form" action="/sisfacil/public/parceiro/salvar-edicao" method="post">
	@endif
		{!! csrf_field() !!}
		<input type="hidden" name="id" value="{{$parceiro->id}}">
		<div class="col-md-12">
			<div class="col-md-3">
				<div class="form-group">
					<input type="radio" id="pessoa-fisica" checked><em class="texto-botao-radio" >Pessoa física</em>
					<input type="radio" id="pessoa-juridica"><em class="texto-botao-radio">Pessoa jurídica</em>
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<label class="control-label col-md-4" for="cnpj" id="label-cnpj">CPF:</label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" id="cnpj" name="cnpj" class="form-control" value="{{old('cnpj')}}"/>
							<span class="input-group-btn">
					        	<button class="btn btn-default botao-checar-cnpj" id="botaoChecarCnpj" type="button">Verificar</button>
					      	</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-3">
				<div class="form-group">
					<input type="radio" id="tipoParceiro" name="tipoParceiro" value="c" checked disabled><em class="texto-botao-radio">Cliente</em>
					<input type="radio" id="tipoParceiro" name="tipoParceiro" value="f" disabled><em class="texto-botao-radio">Fornecedor</em>
					<input type="radio" id="tipoParceiro" name="tipoParceiro" value="a" disabled><em class="texto-botao-radio">Ambos</em>
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<label class="control-label col-md-4" for="inscricao">Inscrição Estadual:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="inscricao" id="inscricao" value="{{old('inscricao')}}" disabled>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-1" for="nome">Nome:</label>
			<div class="col-md-11">
				<input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}" disabled>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-1" for="endereco">Endereço:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="endereco" name="endereco" value="{{old('endereco')}}" disabled>
			</div>
			<div class="col-md-7">
				<label class="col-md-1 control-label" for="bairro">Bairro:</label> 
				<div class="col-md-3">
					<input type"text" class="form-control" id="bairro" name="bairro" value="{{old('bairro')}}"  disabled>
				</div>
				<label class="col-md-1 control-label" for="cidade">Cidade:</label> 
				<div class="col-md-4">
					<input type"text" class="form-control" id="cidade" name="cidade" value="{{old('cidade')}}" disabled>
				</div>
				<label class="col-md-1 control-label" for="uf">UF:</label> 
				<div class="col-md-2">
					<input type"text" class="form-control" id="uf" name="uf" value="{{old('uf')}}" disabled>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-1" for="cep" >CEP:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="cep" name="cep" value="{{old('cep')}}" disabled>
			</div>
			<label class="control-label col-md-1" for="telefone">Telefone:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="telefone"  name="telefone" value="{{old('telefone')}}" disabled>
			</div>
			<label class="control-label col-md-1" for="celular">Celular:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="celular" name="celular" value="{{old('celular')}}" disabled>
			</div>
			<label class="control-label col-md-1" for="email">Email:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" disabled>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-1" for="observacao">Observação:</label>
			<div class="col-md-11">
				<textarea class="form-control" id="observacoes" rows="10" name="observacoes" value="{{old('observacao')}}" disabled></textarea>
			</div>
		</div>

		<input type="reset" class="btn btn-warning col-md-1" style="margin-right:10px;" value="Limpar" disabled onclick="bloquearCampos()">
		<input type="submit" class="btn btn-primary col-md-1" style="margin-right:10px;" value="Salvar" disabled>
		<a href="{{action('ParceiroController@all', 'c')}}" class="btn btn-danger col-md-1">Cancelar</a>
	</form>

	<!-- Modal para avisar que o parceiro já existe -->
	<div class="modal fade" id="aviso-parceiro-existente" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-warning">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="controleModalLabel"><em>Aviso</em></h4>
	      </div>
	      <div class="modal-body">
	      	<p>Parceiro já existe em nossa base de dados</p>
	      	<div class='form-group'>
	      		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal para avisar que o CNPJ/CPF digitado é inválido -->
	<div class="modal fade" id="aviso-cnpj-invalido" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-warning">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="controleModalLabel"><em>Aviso</em></h4>
	      </div>
	      <div class="modal-body">
	      	<p>O CPF ou CPNJ digitado é inválido. Por favor digite novamente!</p>
	      	<div class='form-group'>
	      		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@stop

@section('scripts-exclusivos')
	<script src="/sisfacil/public/js/jquery.maskedinput.js"></script>

	<script type="text/javascript">
		function verificarCnpj() {
			$(document).ready(function(){
				cnpj = $("#cnpj").val();
				cnpj = cnpj.replace("/","_");
				/*
		    	$.get("/sisfacil/public/parceiro/checa-cnpj/"+cnpj, function(data){
		    		if(data.cnpjExistente == true){
		    			bloquearCampos();
		    			$("#botaoChecarCnpj").removeClass("btn-success");
		    			$("#botaoChecarCnpj").addClass("btn-default");
		    			$("#aviso-parceiro-existente").modal();
		    		}
		    		else if(data.cnpjExistente == false){
		    			$("#botaoChecarCnpj").removeClass("btn-default");
		    			$("#botaoChecarCnpj").addClass("btn-success");
		    			liberarCampos();
		    		}
		    		else if(data.cnpjExistente == 'invalido'){
		    			bloquearCampos();
		    			$("#botaoChecarCnpj").removeClass("btn-success");
		    			$("#botaoChecarCnpj").addClass("btn-default");
		    			$("#aviso-cnpj-invalido").modal();
		    		}
		    	});
				*/
				$("#botaoChecarCnpj").removeClass("btn-default");
    			$("#botaoChecarCnpj").addClass("btn-success");
    			liberarCampos();
			});
		}

		function liberarCampos(){
			$("textarea").prop("disabled", false);
			$("input").prop("disabled", false);
		}

		function bloquearCampos(){
			$("textarea").prop("disabled", true);
			$("input").prop("disabled", true);
			$("#pessoa-fisica").prop("disabled", false);
			$("#pessoa-juridica").prop("disabled", false);
			$("#cnpj").prop("disabled", false);
			//$("#cnpj").val("");
		}

		$(document).ready(function() {
		    $("#cnpj").mask("999.999.999-99");
		    $("#cep").mask("99.999-999");
		    $("#telefone").mask("(99)9999-9999");
		    $("#celular").mask("(99)99-999-9999");

		    $("#pessoa-juridica").prop("checked", false);
		    $("#pessoa-fisica").prop("checked", true);

		    $("#pessoa-fisica").click(function(){
		    	selecionaPessoaFisica();
		    });

		    $("#pessoa-juridica").click(function(){
		    	selecionaPessoaJuridica();
		    });

		    $(".botao-checar-cnpj").click(function(){
		    	verificarCnpj();
		    });

		    function editarParceiro(){
			    if($('.h3-destaque').text() == "Edição de parceiro"){
			    	$("#botaoChecarCnpj").removeClass("btn-default");
	    			$("#botaoChecarCnpj").addClass("btn-success");

	    			cnpj = "{{$parceiro->cnpj}}";
	    			if(cnpj.length == 18)
	    				selecionaPessoaJuridica();
	    			else
	    				selecionaPessoaFisica();
	    			$("#cnpj").val("{{$parceiro->cnpj}}");

	    			$("#inscricao").val("{{$parceiro->inscricao}}");
	    			
	    			if("{{$parceiro->tipoParceiro}}" == 'c')
	    				$("input:radio[name='tipoParceiro'][value='c']").prop('checked', true);
					else if("{{$parceiro->tipoParceiro}}" == 'f')
	    				$("input:radio[name='tipoParceiro'][value='f']").prop('checked', true);
					if("{{$parceiro->tipoParceiro}}" == 'a')
	    				$("input:radio[name='tipoParceiro'][value='a']").prop('checked', true);
	    			$("#nome").val("{{$parceiro->nome}}");
	    			$("#endereco").val("{{$parceiro->endereco}}");
	    			$("#bairro").val("{{$parceiro->bairro}}");
	    			$("#cidade").val("{{$parceiro->cidade}}");
	    			$("#uf").val("{{$parceiro->uf}}");
	    			$("#cep").val("{{$parceiro->cep}}");
	    			$("#telefone").val("{{$parceiro->telefone}}");
	    			$("#celular").val("{{$parceiro->celular}}");
	    			$("#email").val("{{$parceiro->email}}");
	    			$("#observacoes").val("{{$parceiro->observacoes}}");
	    			liberarCampos();
			    }
			}

			function selecionaPessoaJuridica(){
				$("#pessoa-fisica").prop("checked", false);
				$("#pessoa-juridica").prop("checked", true);
		    	$("#cnpj").mask("99.999.999/9999-99");
		    	$("#cnpj").text("");
		    	$("#label-cnpj").text("CNPJ:");
			}

			function selecionaPessoaFisica(){
				$("#pessoa-fisica").prop("checked", true);
				$("#pessoa-juridica").prop("checked", false);
		    	$("#cnpj").mask("999.999.999-99");
		    	$("#cnpj").text("");
		    	$("#label-cnpj").text("CPF:");
			}

			editarParceiro();
		});

	</script>			  
@stop