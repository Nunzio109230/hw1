<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>

<?php
    session_start();
    if(isset($_SESSION["username"])){
        $login=1;
    }else $login=0;
?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="classifiche.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sora">
    <script src="classifiche.js" defer="true"></script>
    <title>Classifiche</title>
    <meta charset="UTF-8">
    </head>
    <body>
    <nav>
        <div class="nav_left">
            <a href="home.php">Home</a>
        </div>      
        <div class="nav_right">
            <a href="classifiche.php">Classifiche</a>
            <a href="preferiti.php">Preferiti</a>
            <div class=login_nav>
                <a href="login.php" id="user" value="$login">
                    <?php 
                        if($login===1)
                            echo($_SESSION["username"]);
                        else echo("Accedi");
                        ?>
                    </a>
                    <div class="div_userOff">
                        <a id="profilo" href="profilo.php">Profilo</a>
                        <a id="exit" href="logout.php">Esci</a>
                    </div>
            </div>      
        </div>
    </nav>
        <header id="brani">
            <h1>25 Brani più ascoltati in</h1>
                <div class="country">
                    <form autocomplete="off">
                    <input type='text' name="search_country" class="searchbar_country" placeholder="Spain/Italy/Germany...">
                    <input type="submit" value="Cerca">
                    </form>
                </div>
                    <div class="no_result_off">
                        <h2>Non sono stati trovati artisti per questo paese.</h2>
                    </div>
                
            <div class="lista_brani"></div>
        </header>
        <div id="lista_brani">

        </div>
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
