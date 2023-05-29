<?php 
    if(!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["us_name"])
    && !empty($_POST["email"]) && !empty($_POST["new_password"] &&!empty($_POST["confirm_new_password"]))
    && !empty($_POST["gg"]) && !empty($_POST["mm"]) && !empty($_POST["yy"]))
    {
        $errori = array();
        $connect=mysqli_connect("localhost","root", "", "login_db");
        if(isset($_POST["us_name"]))
        {
            $username=mysqli_real_escape_string($connect, $_POST["us_name"]);
            $query = "SELECT * FROM users WHERE username = '".$username."'";
            $result=mysqli_query($connect, $query);
            if(mysqli_num_rows($result)>0)
            {
                $errori[]="Username già esistente";
            }
        }
            
            if (strlen($_POST["new_password"]) < 8) 
            {
                $errori[] = "Caratteri password insufficienti";
            }else
            {
                $checkspecial=false;
                $specialchar = array('!', '"', '?' ,'$', '%', '^', '&' ,'*','(',')' ,'_' ,'-', '+' ,'=' ,'{' ,'[','}' ,']' ,':' ,';' ,'@' ,"'", '~' ,'#' ,'|' ,' \ ','<',',' ,'>' ,'.' ,'?' ,'/');
                for($i=0;$i<(count($specialchar));$i++)
                {
                    if (strpos($_POST["new_password"],$specialchar[$i])!==false) {
                        $checkspecial=true;
                    }
                }
                $checkmin=false;
                $checkmaiu=false;
                $min= array ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i','j','k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w','x','y','z');
                for($i=0;$i<(count($min));$i++)
                {
                    if (strpos($_POST["new_password"],$min[$i])!==false) {
                        $checkmin=true;
                    }
                }
                $maiu=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                for($i=0;$i<(count($maiu));$i++)
                {
                    if (strpos($_POST["new_password"],$maiu[$i])!==false){
                        $checkmaiu=true;
                    }
                }
                if($checkmin===false || $checkmaiu===false && $checkspecial===false)
                {
                        $errori[]="La password deve contenere almeno un 
                        carattere maiuscolo e uno minuscolo e un carattere speciale";
                }
            }
            
            if (strcmp($_POST["new_password"], $_POST["confirm_new_password"]) !== 0) 
            {
                
                $errori[] = "Le password non coincidono";
            }

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
            {
                $errori[] = "Email non valida";
                echo("<p id='email_nvalida'>Email non valida!</p>");
            }else{
                $email = mysqli_real_escape_string($connect, strtolower($_POST['email']));
                $result = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email'");
                if (mysqli_num_rows($result) > 0) 
                {
                    $errori[] = "Email già utilizzata";
                }
            }
            $currentyear=date("Y");
            $chooseyear=trim($_POST["yy"]);
            if(($currentyear-$chooseyear)<14){
                $errori[]="Eta minima:14 anni";
            }
        if(count($errori)==0)
        {
            $name=mysqli_real_escape_string($connect, $_POST["name"]);
            $surname=mysqli_real_escape_string($connect, $_POST["surname"]);
            $username=mysqli_real_escape_string($connect, $_POST["us_name"]);
            $email=mysqli_real_escape_string($connect, $_POST["email"]);
            $password=mysqli_real_escape_string($connect, $_POST["new_password"]);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $day=mysqli_real_escape_string($connect, $_POST["gg"]);
            $month=mysqli_real_escape_string($connect, $_POST["mm"]);
            $year=mysqli_real_escape_string($connect, $_POST["yy"]);
            $date=$day."/".$month."/".$year;
            $query = "INSERT INTO users(namee,surname,username,email,pass,data_nascita) VALUES (\"$name\",\"$surname\",\"$username\",\"$email\",\"$password\",\"$date\")";
            $result=mysqli_query($connect,$query);
            mysqli_close($connect);
            if($result){
                header("Location:login.php");
                exit;
            }else{
                $errori[]="Connessione fallita";
            }
        }
    }else if(isset($_POST["name"])){
        echo("<p id='empty'>Inserire tutti i campi!</p>");
    }
    
?>
<html>
    <head>
        <title>hw1</title>
        <link rel="stylesheet" type="text/css" href="signup.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <script src="signup.js" defer="true"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>
    <body>
        <h1 id="Speace">SpeaceSonG</h1>
        <div class="signup">
                <h1>Iscriviti adesso</h1>
                <a id="link_x" href="login.php"><img src=x.png id="x"></a>
                <form name="registration_form" class="iscrizione" action="signup.php" method="post">
                    <input id="name" type="text" name="name" placeholder="Nome">
                    <input id="surname"type="text" name="surname" placeholder="Cognome">
                    <input id="us_name" type="text" name="us_name" placeholder="Nome utente">
                    <img class="warn_usernameOff" src="warning.png">
                    <div class="usernameOff">
                        <p id="username_exist">Username già in uso</p>
                    </div>
                    <input id="email" type="text" name="email" placeholder="Email">
                    <img class="warn_emailOff" src="warning.png">
                    <div class="emailOff">
                        <p id="email_exist">Email già in uso.</p>
                    </div>
                    <input id="newpass" type="password" name="new_password" placeholder="Nuova password">
                    <img class="warn_passOff" src="warning.png">
                    <div class="passwOff">
                        <p id="pass_exist">
                            La password deve contenere:
                            <br/>1. Almeno 8 caratteri.
                            <br/>2. Almeno una lettera maiuscola.
                            <br/>3. Almeno una lettera minuscola.
                            <br/>4. Almeno un carattere speciale.</p>
                    </div>
                    <input id="confirm_newpass" type="password" name="confirm_new_password" placeholder="Conferma password">
                    <img class="warn_confirm_passOff" src="warning.png">
                    <div class="confirm_passwOff">
                        <p id="confirm_pass_exist">Le password non coincidono.</p>
                    </div>
                    <label>
                        <p class="dateOff">L'età minima richiesta è di 14 anni.</p>
                        <h3 id="date">Data di nascita</h3>
                        <select name='gg' id="gg">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select name='mm' id="mm">
                            <option value="1">gen</option>
                            <option value="2">feb</option>
                            <option value="3">mar</option>
                            <option value="4">apr</option>
                            <option value="5">mag</option>
                            <option value="6">giu</option>
                            <option value="7">lug</option>
                            <option value="8">ago</option>
                            <option value="9">set</option>
                            <option value="10">ott</option>
                            <option value="11">nov</option>
                            <option value="12">dic</option>
                        </select>
                        <select name='yy' id="yy">
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                        </select>
                    </label>
                    <br>
                    <input type="submit" id="iscriviti" value="Iscriviti">
                    
                </form>
        </div>
    </body>
</html>