<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>

<?php 
    $file=$_FILES["file"];
    $uploaddir="upload/";
    if($file["size"]!==0){
        if($file["size"]>7000000){
            echo("La dimensione dell'immagine è troppo grande");
        }
        else{
            $up=move_uploaded_file($file["tmp_name"], $uploaddir.$file["name"]);
            if(!$up){
                echo("Errore nel caricamento del file");
            }
            else{
                insertImg_db($uploaddir.$file["name"]);
            }
        }
        
    }else{
        header("Location: remove_img.php");
        }


    function insertImg_db($img){
        $connect=mysqli_connect("localhost","root", "", "login_db"); 
        $username=$_SESSION["username"];
        $query = "UPDATE users SET img='$img' WHERE username='$username'";
        $result = mysqli_query($connect, $query);
        header("Location: profilo.php");
        mysqli_close($connect);
    }
?>