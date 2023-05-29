<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>
<?php
    remove_like_album();

    function remove_like_album(){
        $connect=mysqli_connect("localhost","root", "", "login_db");
        $username=$_SESSION["username"];
        $album=mysqli_real_escape_string($connect, $_POST["album"]);
        $artist=mysqli_real_escape_string($connect, $_POST["artist"]);
        $query = "SELECT * FROM like_album WHERE username = '$username' AND album= '$album' AND artist='$artist'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

        if(mysqli_num_rows($result) > 0) {
            $delete = "DELETE FROM like_album WHERE album='$album' AND username='$username'";
            if(mysqli_query($connect, $delete) or die(mysqli_error($connect))) {
                echo json_encode(array(
                    "Result"=>"Rimosso dai preferiti"
                ));
                mysqli_close($connect);
                exit;
            }
        }
        
}   
?>