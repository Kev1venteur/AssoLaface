<?php
include '../../modal/login_security.php';

$idEntreprise= filter_input(INPUT_GET, "idEntreprise");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query1 = "delete from entreprise where idEntreprise=:idEntreprise";
$sql_query2 = "delete from photo where entreprise_idEntreprise=:idEntreprise";
$sql_query3 = "delete from coordonnees where entreprise_idEntreprise=:idEntreprise";

$result1 = $db->prepare($sql_query1);
$result2 = $db->prepare($sql_query2);
$result3 = $db->prepare($sql_query3);



$result1->bindParam(":idEntreprise", $idEntreprise);
$result2->bindParam(":idEntreprise", $idEntreprise);
$result2->bindParam(":idEntreprise", $idEntreprise);

$result1->execute();
$result2->execute();
$result3->execute();

var_dump($result1);
var_dump($result2);
var_dump($result3);

//header('Location: /assolaface/admin/management/enterprise.php');
?>
