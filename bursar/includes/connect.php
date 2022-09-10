
<?php

$SERVERNAME  = "localhost";
$USER = "root";
$PASS = "";
$DB_NAME = "gros";

$conn =  mysqli_connect($SERVERNAME, $USER, $PASS, $DB_NAME);

if(!$conn) {
    echo  "connection failed";
}



?>