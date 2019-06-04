<?php
session_start();

class Config {
  const SERVEUR="localhost";
  const BASE="assolaface";
  const USER="assolaface";
  const MDP="lafacefroidfond";
}
?>
<?php
$link = mysqli_connect('localhost', 'assolaface','assolaface', 'lafacefroidfond');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
