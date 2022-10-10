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
            <a class="logo" href="#">Renato Azevedo</a>
            <div class="mobile-menu">
                <div class = "line1"></div>
                <div class = "line2"></div>
                <div class = "line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="#">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#" class="loja">Projetos<span    class="material-icons seta1">
                    arrow_drop_down</span></a>
                    <ul class="itensProj">
                        <li><a href="#">Proj1</a></li>
                        <li><a href="#">Proj2</a></li>
                        <li><a href="#">Proj3</a></li>
                    </ul>
                </li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main></main>
    
</body>
<script src="mobile-navbar.js"></script>
</html>