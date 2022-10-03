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