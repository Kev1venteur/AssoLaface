<?php
include '../../modal/login_security.php';

$idEvenement= filter_input(INPUT_GET, "idEvenement");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "delete from evenement where idEvenement=:idEvenement;";

$result = $db->prepare($sql_query);

$result->bindParam(":idEvenement", $idEvenement);

$result->execute();

header('Location: /assolaface/admin/management/event.php');
?>
