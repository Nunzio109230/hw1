<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>

<?php
    removeImg_db();
    function removeImg_db(){
        $connect=mysqli_connect("localhost","root", "", "login_db"); 
        $username=$_SESSION["username"];
        $query = "UPDATE users SET img=NULL WHERE username='$username'";
        $result = mysqli_query($connect, $query);
        mysqli_close($connect);  
        header("Location: profilo.php");
        }
        
?>
