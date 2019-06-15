<?php
include '../../modal/login_security.php';

$nomEvenement = filter_input(INPUT_POST, "evName");
$prixEvenement = filter_input(INPUT_POST, "evPrice");
$dateEvenement = filter_input(INPUT_POST, "evDate");
$lieuEvenement = filter_input(INPUT_POST, "evPlace");
$descriptionEvenement = filter_input(INPUT_POST, "evDescription");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "insert into evenement set nomEvenement=:nomEvenement, prixEntreeEvenement=:prixEntreeEvenement, dateEvenement=:dateEvenement, lieuEvenement=:lieuEvenement, descriptionEvenement=:descriptionEvenement";

$result = $db->prepare($sql_query);

$result->bindParam(":nomEvenement", $nomEvenement);
$result->bindParam(":prixEntreeEvenement", $prixEvenement);
$result->bindParam(":dateEvenement", $dateEvenement);
$result->bindParam(":lieuEvenement", $lieuEvenement);
$result->bindParam(":descriptionEvenement", $descriptionEvenement);

$result->execute();

header('Location: /assolaface/admin/management/event.php');
?>
