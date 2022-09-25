<?php
require './config/config.php';
require_once './modules/hg_api_location.php';
require_once './modules/hg_api_weather.php';
require_once './modules/hg_api_cotacao.php';

$hg_localizacao = new Hg_location(chave_hg_api);
$cidade = $hg_localizacao->codigo_cidade();

#Se o parêmetro da temperatura for $cidade, pega pela Localização automática acima;
#Se for cidade (sem o $), pega pela definição do config.php. Neste caso (abaixo) -> automática pelo "IP".

$hg_tempo = new Hg_weather(chave_hg_api,$cidade);
$hg_cotacao = new Hg_api_cotacao(chave_hg_api);

$tempsp = $hg_tempo->temperatura_sao_paulo();
$dolar = $hg_cotacao->cotacao_dolar();

$euro = $hg_cotacao->cotacao_euro();

echo "<div style = 'font-size:15px;background-color:red;color:white'><marquee> Temperatura: $tempsp[city_name] : $tempsp[temp]°C | USD buy =  $dolar[buy] | USD sell =  $dolar[sell] (var $dolar[variation]) |  EUR buy = $euro[buy] | sell = $euro[sell] (var $euro[variation])</marquee></div>";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='./images/renato4.ico' type='image/x-icon'>
    <title>Teste API</title>  
    
    <link rel="stylesheet" type="text/css"  href="./style/style1.css"/>
</head>
<body>
    <div id="container">
        <img src="./images/renato4a.png" alt="imagem renato">
        <nav>
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="linguagens">Linguagens</a>
                    <ul>
                            <li>
                                <a href="linguagens_de_jogos">Linguagens de jogos</a>
                            </li>
                    </ul>
                </li>
                <li><a href="projetos">Projetos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>


