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
        <script src="home.js" defer="true"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <title>Home</title>
    </head>
    <body>
        <nav>
            <div class="nav_left">
            <a href="">Home</a>
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

        <header class="header_search">
                <form autocomplete="off">
                    <div class="search_content">
                    <input type='text' name="search" class="searchbar" placeholder="Artista...">
                    <input type="submit" value="Cerca">
                    </div>
                    <div class="no_result_off">
                        <h2>Non sono stati trovati album per questo artista.</h2>
                    </div>
                </form>
        </header>
        <div id="album">
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