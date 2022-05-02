<?php 

$host = "localhost";
$username = "root";
$password = "";
$_db = "login";

$connection = new mysqli($host, $username, $password, $_db);

if($connection === FALSE){
    echo $connection -> error;  
}else{
}

?>