<?php  
    session_start();
    session_destroy();
    header ("Location: preview.php");
    exit;
    

?>