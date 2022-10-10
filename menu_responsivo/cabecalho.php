<?php
require_once "config/config.php";
require_once "modules/hg_api_cotacao.php";
require_once "modules/hg_api_location.php";
require_once "modules/hg_api_weather.php";

$hg_localizacao = new Hg_location(chave_hg_api);
$cidade = $hg_localizacao->codigo_cidade();

#Se o parêmetro da temperatura for $cidade, pega pela Localização automática acima;
#Se for cidade (sem o $), pega pela definição do config.php. Neste caso (abaixo) -> automática pelo "IP".

$hg_tempo = new Hg_weather(chave_hg_api,$cidade);
$hg_cotacao = new Hg_api_cotacao(chave_hg_api);

$temp = $hg_tempo->temperatura();
$vartemp = $hg_tempo->max_min();

$dolar = $hg_cotacao->cotacao_dolar();

$euro = $hg_cotacao->cotacao_euro();

echo "<div style = 'font-size:15px;background-color:red;color:white'><marquee> Temperatura: $temp[city_name] : $temp[temp]°C | Máx: $vartemp[max] | Min: $vartemp[min] | USD buy =  $dolar[buy] | USD sell =  $dolar[sell] ($dolar[variation]) |  EUR buy = $euro[buy] | sell = $euro[sell] ($euro[variation])</marquee></div>";


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Responsivo - Documentado</title>
    <link rel="stylesheet" href="style.css">
    <!--ICONES-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--JQUERY-->
    <script  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
</head>
<body>
    <header>
        <nav>
            <a href="#"><img style="max-width:100px" src="./images/renato4a.png" alt="Renato Azevedo"></a>
            <a class="logo" href="#">Renato Azevedo</a>
            <div class="mobile-menu">
                <div class = "line1"></div>
                <div class = "line2"></div>
                <div class = "line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="home">Home</a></li>
                <li><a href="linguagens">Linguagens</a></li>
                <li><a href="#" class="loja">Projetos<span    class="material-icons seta1">
                    arrow_drop_down</span></a>
                    <ul class="itensProj">
                        <li><a href="php">PHP</a></li>
                        <li><a href="python">Python</a></li>
                        <li><a href="js">JS</a></li>
                        <li><a href="react">React</a></li>
                        <li><a href="vue">Vue.js</a></li>
                    </ul>
                </li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </nav>
    </header>

        
</body>
<script src="mobile-navbar.js"></script>
</html>