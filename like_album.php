<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>
<?php
    like_album();

    function like_album(){
        $connect=mysqli_connect("localhost","root", "", "login_db");
        $username=$_SESSION["username"];
        $album=mysqli_real_escape_string($connect, $_POST["album"]);
        $artist=mysqli_real_escape_string($connect, $_POST["artist"]);
        $image=mysqli_real_escape_string($connect, $_POST["image"]);
        $playcount=mysqli_real_escape_string($connect, $_POST["playcount"]);
        $query = "SELECT * FROM like_album WHERE username = '$username' AND album= '$album' AND artist='$artist'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

        if(mysqli_num_rows($result) > 0) {
            echo json_encode(array(
                "Result"=>"Album già nei preferiti"
            ));
            mysqli_close($connect);
            exit;
        }

        $query = "INSERT INTO like_album(username,album,artist,img,playcount) VALUES('$username','$album','$artist','$image', '$playcount')";
        error_log($query);
        if(mysqli_query($connect, $query) or die(mysqli_error($connect))) {
            echo json_encode(array(
                'username'=>$username,
                'album'=>$album,
                'artist'=>$artist,
                'image'=>$image,
                'playcount'=>$playcount
            ));
            mysqli_close($connect);
            exit;
            
        }
        
}   
?>