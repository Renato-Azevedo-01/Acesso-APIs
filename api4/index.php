<?php
include 'cabecalho.php';

var_dump($_GET);

if (isset($_GET['pagina'])){
    require_once "pages/" . $_GET['pagina']. ".php";
}

include 'footer.php';
?>