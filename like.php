<?php
    $like=array();
    $connect=mysqli_connect("localhost","root", "", "login_db");
    $query = "SELECT * FROM like_album";
    $result=mysqli_query($connect, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $like[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($connect);
    $data=json_encode($like);
    echo $data;
?>