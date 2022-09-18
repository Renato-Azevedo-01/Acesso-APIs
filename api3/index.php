<?php
require_once 'config.php';
require_once 'hg_api.php';

$hg = new Hg_api(chave_api);

$validacao = $hg->validacao();

if($validacao == 1){
    echo "Validação realizada com sucesso !";
}
else{
    echo "Dados indisponíveis no momento !";
}


$dolar = $hg->cotacao_dolar();

echo "<br>$dolar[name] =  $dolar[buy]";

$euro = $hg->cotacao_euro();

echo "<br>$euro[name] = $euro[buy] ";

$foxbit = $hg->cotacao_bitcoin_foxbit();

echo "<br>$foxbit[name] = $foxbit[last] e variação =  $foxbit[variation]";

$dolar_canadense = $hg->cotacao_dolar_canadense();

echo "<br>$dolar_canadense[name] = $dolar_canadense[buy] e variação = $dolar_canadense[variation]";
?>