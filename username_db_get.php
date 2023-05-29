<?php
    $users=array();
    $connect=mysqli_connect("localhost","root", "", "login_db");
    $query = "SELECT * FROM users";
    $result=mysqli_query($connect, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $users[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($connect);
    $data=json_encode($users);
    echo $data;
?>