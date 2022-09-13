<?php
require_once 'config/config.php';
require_once 'modules/hg-api.php';

$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quotation();
$euro = $hg->euro_quotation();
$ibovespa = $hg->ibovespa_quotation();
$dowjones = $hg->dowjones_quotation();

if($hg->is_error() == false) {
    $variation = ($dolar['variation'] < 0) ? 'danger' : 'info';
    $variation = ($euro['variation'] < 0) ? 'danger' : 'info';
    $variation = ($ibovespa['variation'] < 0) ? 'danger' : 'info';
    $variation = ($dowjones['variation'] < 0) ? 'danger' : 'info';
}

//var_dump($dolar);
//echo($dowjones['points']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COTAÇÕES</title>
         
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container-top{
            display: flex;
            justify-content: space-between;
            width:50%;
                      
        }
    </style>
    </head>
    <body>
        <div class='container-top'>
            <div class="container">
                <div style = 'display:flex' class="row-12">
                    <div class="col"></div>
                    <p>Cotação Dólar</p>

                    <?php if($hg->is_error() == false):  ?>

                        <p>USD
                            <span class="badge  badge-pill badge-<?php echo($variation); ?>">
                                <?php echo($dolar['buy']);?>
                            </span>
                        </p> 

                    <?php else: ?>
                        
                        <p>USD
                            <span class="badge  badge-pill badge-danger">Serviço Indisponível

                            </span></p> 

                    <?php endif; ?>

                </div>
            </div>
            <div class="container">
                <div style = 'display:flex' class="row-12">
                    <div class="col"></div>
                    <p>Cotação Euro</p>

                    <?php if($hg->is_error() == false):  ?>

                        <p>EUR
                            <span class="badge  badge-pill badge-<?php echo($variation); ?>">
                                <?php echo($euro['buy']);?>
                            </span>
                        </p> 

                    <?php else: ?>
                        
                        <p>EUR
                            <span class="badge  badge-pill badge-danger">Serviço Indisponível

                            </span></p> 

                    <?php endif; ?>

                </div>
            </div>
            <div class="container">
                <div style = 'display:flex' class="row-12">
                    <div class="col"></div>
                    <p>IBOVESPA</p>

                    <?php if($hg->is_error() == false):  ?>

                        <p>-Pontos
                            <span class="badge  badge-pill badge-<?php echo($variation); ?>">
                                <?php echo($ibovespa['points']);?>
                            </span>
                        </p> 

                    <?php else: ?>
                        
                        <p>-Pontos
                            <span class="badge  badge-pill badge-danger">Serviço Indisponível
                            </span>
                        </p> 

                    <?php endif; ?>

                </div>
            </div>
            <div class="container">
                <div style = 'display:flex' class="row-12">
                    <div class="col"></div>
                    <p>DOWJONES</p>
                    
                    <?php if($hg->is_error() == false): ?>
                        <p>-Pontos 
                            <span class="badge badge-pill badge-<?php echo($variation);?>" > <?php echo($dowjones['points']); ?>
                            </span>
                        </p> 

                    <?php else: ?>

                        <p>-Pontos
                            <span class="badge  badge-pill badge-danger">Serviço Indisponível
                            </span>
                        </p>                                               
                    
                    <?php endif; ?>
                    

                    

                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</html>
