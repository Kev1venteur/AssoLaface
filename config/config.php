<?php

class Config {
  const DB_SERVER="localhost";
  const DB_NAME="assolaface";
  const DB_USERNAME="assolaface";
  const DB_PASSWORD="lafacefroidfond";
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'assolaface');
define('DB_PASSWORD', 'lafacefroidfond');
define('DB_NAME', 'assolaface');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
