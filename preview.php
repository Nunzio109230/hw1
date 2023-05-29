<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        header("Location: home.php");
        exit;
    }

?>
<html>
    <head>
        <img id="logo" src="logo.png">
        <link rel="stylesheet" type="text/css" href="preview.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <script src="preview.js" defer="true"></script>
        <title>Preview</title>
    </head>
    <body>
        <heder>
            <h1 id="s">S</h1></div>
            <h1 id="peace">peace</h1>
            <h1 id="ss">S</h1>
            <h1 id="on">on<h1>
            <h1 id="g">G</h1>
        <h1>ESPLORA LA MUSICA CHE TI PIACE</h1>
        <nav>
            <div class="nav_left">
            <a href="">HOME</a>
            <a href="">PROMO</a>
            <a href="">CONTATTI</a>
            </div>      
            <div class="nav_right">
                <a href="signup.php">REGISTRATI</a>
                <div class=login_nav>
                    <a href="login.php" id="user" value="$login">
                        ACCEDI
                    </a>
                </div>      
            </div>
        </nav>
        <header>
        <footer>
            <h1 id="h1_footer">SpeaceSonG</h1>
            <div class="footer_container">
                <div class="div_footer">
                    <h4>Azienda</h4>
                    <p>Chi siamo</p>
                    <p>Opportunità di lavoro</p>
                </div>
                <div class="div_footer">
                    <h4>Community</h4>
                    <p>Per artisti</p>
                    <p>Sviluppatori</p>
                    <p>Pubblicità</p>
                </div>
                <div class="div_footer">
                    <h4>Link Utili</h4>
                    <p>Assistenza</p>
                    <p>Diritti del consumatore</p>
                </div>
            </div>
            <p class="NB">©2023 SpeaceSonG NB 1000014523</p>
        </footer>
    </body>
</html>
