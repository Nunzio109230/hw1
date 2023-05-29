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
        <link rel="stylesheet" type="text/css" href="profilo.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
        <script src="profilo.js" defer="true"></script>
        <title>Profilo</title>
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
        <header>
        <div class="overlayOff"></div>
        <div class="img_profile">
            <form name="form_upload"  action="upload_img.php" method="post" enctype="multipart/form-data">
                    <input type='file' name='file' accept='.jpg, .jpeg, image/gif, image/png' id="upload_file"> 
                    <input type='submit' value='Conferma' class="submitOff">
            </form>
            <img id="img_user" src="user.png">
            <div class="fotoOff">
            <img id="edit" src="edit.png">
            <h3>Scegli foto</h3>
            </div>
        </div>
        <p>Profilo</p>
        <h1><?php echo($_SESSION["username"]);?></h1>
        <button class="removeOff" href="remove_img.php"><a href="remove_img.php">Elimina immagine</a></button>
        </header>
        <h1 id="txt">Top artisti per <?php echo($_SESSION["username"]);?></h1>
        <div class="album">
            
        </div>
    </body>
</html>