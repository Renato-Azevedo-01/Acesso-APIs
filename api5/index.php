<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
require_once 'cabecalho.php';

#var_dump($_GET);
if($_GET){

    $url = explode('/', $_GET['url']);
    #echo "<br>$url[1]";

        require "pages/" . $url[0] . ".php";
    }

require_once 'footer.php';
?>