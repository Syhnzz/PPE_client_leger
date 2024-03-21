<?php

$host = "localhost";
$dbname = "mairieV";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);

if ($mysqli ->connect_errno){
    die("Erreur de connection :" . $mysqli->connect_error);
}

return $mysqli;

?>