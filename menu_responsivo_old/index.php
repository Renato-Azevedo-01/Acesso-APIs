
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
    <script  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
</head>
<body>
<?php

require_once 'cabecalho.php';

if($_GET){

    $url = explode('/', $_GET['url']);
    require "pages/" . $url[0] . ".php";
}

require_once 'footer.php';
?>
</body>

</html>


