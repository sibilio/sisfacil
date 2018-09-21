<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SisFácil</title>

	<!--tweeter bootstrap -->
<link rel="stylesheet" href="/sisfacil/public/css/bootstrap/css/bootstrap.min.css">

	<!-- tema opcional tweeter boostrap -->
	<link rel="stylesheet" href="/sisfacil/public/css/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- CSS próprio do sistema -->
  <link rel='stylesheet' href='/sisfacil/public/css/sisfacil.css'>

  <!-- Aqui podemos acresentar regras de css que serão usadas somente na página específica -->
  @yield('css')

</head>

<body>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SisFácil</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
              	aria-haspopup="true" aria-expanded="false">
              		Cadastros
              		<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="/sisfacil/public/parceiro/all/c">Clientes</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Sair</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false">
                	Ordem de serviço
                	<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="/sisfacil/public/os/ordem-de-servico/all">Ordens de serviço</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/sisfacil/public/os/tipo-aparelho/all">Tipos de aparelho</a></li>
                <li><a href="/sisfacil/public/os/tipo-servico/all">Tipos de serviços</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false">
                	Nome do usuário
                	<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Perfil</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container-fluid">
		@yield('corpo')
	</div>

@include('template.scripts-obrigatorios')

@yield('scripts-exclusivos') <!-- somente é usado se for necessário incluir um javascript -->
							 <!-- exclusivo para a tela que estaremos tratando -->
@include('template.finish-page')