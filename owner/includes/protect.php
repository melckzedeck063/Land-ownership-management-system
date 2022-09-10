<?php

session_start();

include('connect.php');

if(!$_SESSION['username']){
    header('Location: ../../login.php');
}

?>
