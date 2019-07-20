<?php

class Config {
  const DB_SERVER="lafacesilxlaface.mysql.db";
  const DB_NAME="lafacesilxlaface";
  const DB_USERNAME="lafacesilxlaface";
  const DB_PASSWORD="Lafacefroidfond1";
}

define('DB_SERVER', 'lafacesilxlaface.mysql.db');
define('DB_USERNAME', 'lafacesilxlaface');
define('DB_PASSWORD', 'Lafacefroidfond1');
define('DB_NAME', 'lafacesilxlaface');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
