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


	<!-- CSS próprio do sistema -->
  <link rel='stylesheet' href='/sisfacil/public/css/relatorio.css'>
  @yield('css')
</head>
<body>
    <div class="cabecalho-esquerda">
        <img class="logo-relatorio" src="/sisfacil/public/images/logo-toner.png">
    </div>
    <div class="cabecalho-centro">
        <div>
            <h2 class="texto-no-centro texto-negrito">Toner Games & Informática</h2>
        </div>
    </div>
    <div class="cabecalho-direita">
        <p><span class="texto-negrito">Telefone:</span><br><span>(13)3455-1074</span></p>
        <br><br>
        {{date('d/m/Y')}}
    </div>
    <div class="linha-cabecalho"></div>

@yield('corpo')

    <div class="rodape">
        <div class="texto-negrito">Rua Guaporé, 1288 - Stella Maris - Peruíbe - SP</div>
    <div>
</body>
</html>