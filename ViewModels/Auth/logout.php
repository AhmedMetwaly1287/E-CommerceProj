<?php
if (session_start()){
    session_destroy();
    header("location:login.php");
}
else{
    header("location:login.php");
}
?>