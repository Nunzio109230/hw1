<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        header("Location: home.php");
        exit;
    }
        
        if (!empty($_POST["username"]) && !empty($_POST["password"]) )
        {
            $connect=mysqli_connect("localhost","root", "", "login_db");
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $query = "SELECT * FROM users WHERE username = '".$username."'";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                $record = mysqli_fetch_assoc($result);
                if (password_verify($_POST['password'], $record['pass'])) {
                    $_SESSION["username"] = $record['username'];
                    header("Location: home.php");
                    mysqli_free_result($result);
                    mysqli_close($connect);
                    exit;
                }
            }
            $errore=true;
        }
    
        
            
        
    


?>
<?php
    if(isset($errore))
    {
        echo "<p class='errore'>";
        echo "Username e/o password errati.";
        echo "</p>";
    }
?>

<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <script src="login.js" defer="true"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>
    <body>
        <h1 id="Speace">SpeaceSonG</h1>
        <main>
            <h1 id="titolo">Per continuare, accedi a SpeaceSonG.</h1>
            <div>
                <a href="preview.php" id="link_x"><img src="x.png" id="image_x"></a>
                <form name="login_form" action="login.php" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                     <div class="credenzialiOff">
                        <h4>Inserire username e password.</h4>
                    </div>
                    <input type="submit" id="submit" value="Accedi">
                </form>
                <a id="new_account" href="signup.php">Non hai un account?</a>
                <a href="signup.php"><button class="new_account">Crea nuovo account</button></a>
            </div>
        </main>
    </body>
</html>
