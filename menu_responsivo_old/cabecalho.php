<?php
require './config/config.php';
require_once './modules/hg_api_location.php';
require_once './modules/hg_api_weather.php';
require_once './modules/hg_api_cotacao.php';

$hg_localizacao = new Hg_location(chave_hg_api);
$cidade = $hg_localizacao->codigo_cidade();

#Se o parêmetro da temperatura for $cidade, pega pela Localização automática acima;
#Se for cidade (sem o $), pega pela definição do config.php. Neste caso (abaixo) -> automática pelo "IP".

$hg_tempo = new Hg_weather(chave_hg_api,cidade);
$hg_cotacao = new Hg_api_cotacao(chave_hg_api);

$tempsp = $hg_tempo->temperatura_sao_paulo();
$vartemp = $hg_tempo->max_min();

$dolar = $hg_cotacao->cotacao_dolar();

$euro = $hg_cotacao->cotacao_euro();

echo "<div style = 'font-size:15px;background-color:red;color:white'><marquee> Temperatura: $tempsp[city_name] : $tempsp[temp]°C | Máx: $vartemp[max] | Min: $vartemp[min] | USD buy =  $dolar[buy] | USD sell =  $dolar[sell] (var $dolar[variation]) |  EUR buy = $euro[buy] | sell = $euro[sell] (var $euro[variation])</marquee></div>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Responsivo - Documentado</title>
    <link rel="stylesheet" href="style4.css">
    <!--ICONES-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
</head>
<body>
    <header>
        <nav>
            <img style="max-width:100px" src="./images/renato4a.png" alt="imagem renato">
            <div class="mobile-menu">
                <div class = "line1"></div>
                <div class = "line2"></div>
                <div class = "line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="home">Home</a></li>
                <li><a class="proj" href="#">Linguagens<span    class="material-icons seta1">
                    arrow_drop_down</span></a>
                    <ul class="itens-proj">
                        <li><a href="php">PHP</a></li>
                        <li><a href="js">Js</a></li>
                        <li><a href="python">Python</a></li>
                        <li><a href="react">React</a></li>
                        <li><a href="vue">Vue JS</a></li>
                    </ul>
                </li>
                <li><a href="projetos">Projetos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </nav>
    </header>
</body>
<script src="mobile-navbar.js"></script>
</html>

