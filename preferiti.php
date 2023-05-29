<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="preferiti.css">
    <script src="preferiti.js" defer="true"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <title>Preferiti</title>
    <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <div id="back">
            <a href="home.php"><img src="icon_indietro.png"></a>
            </div>
            <div class="music">
                <img src="music.jpeg">
            </div>
            <h1>Album che ti piacciono.</h1>
            <a id="user"href="profilo.php"><?php echo($_SESSION["username"])?> </a><p id="p_user">•</p>
            
        </header>
        <div class="colonne">
        <p id="alb_col">Album</p>
        <p id="art_col">Artista</p>
        <p id="rip_col">Riproduzioni (last fm)</p>
        </div>
        <div class="lista">
        </div>
    </body>
</html>