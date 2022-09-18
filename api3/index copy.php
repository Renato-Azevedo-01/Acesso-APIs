<?php
require_once "config.php";
require_once "hg_api.php";

$hg = new HG_api(chave_api);


if($hg->deu_erro() == false) {
    $dolar = $hg->cotacao_dolar();
    $euro = $hg->cotacao_euro();
    $variation = $dolar['variation'] ;
    echo "variação dolar :" . $variation ;
    $variation1 = $euro['variation'] ;
    echo "   variação euro :" . $variation1 ;
}

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso API</title>
</head>
<body>
    <header>
            <?php echo "<marquee 
                behavior='scroll'direction='left' scrollamount='8' 
                onmouseover='this.setAttribute('scrollamount', 3, 0);'
                onmouseout='this.setAttribute('scrollamount', 8, 0);'>
            <i>
            <span style='font-family: arial; background-color:red;color: #ffffff; font-size: 15px;'>Cotações: Dólar: $dolar[buy] Euro: $euro[buy]
            </span>
            </i>
            </marquee>" ?>
    </header>
       
    <div>
        <h1>Cotações</h1>
        
        <h2>Dolar : 
            <?php 
            #echo "$dolar[buy]";
                if($variation >= 0) {echo "<span style = 'color:blue'>$dolar[buy] </span>"; }
                else{echo "<span style = 'color:red'>$dolar[buy] </span>"; }?></h2>

        <h2>Euro : 
                    <?php 
                    #echo "$euro[buy]";
                        if($variation1 >= 0) {echo "<span style = 'color:blue'>$euro[buy] </span>"; }
                else{echo "<span style = 'color:red'>$euro[buy] </span>"; }?></h2>
    </div>
</body>
</html>