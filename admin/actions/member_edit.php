<?php
include '../../modal/login_security.php';

$nomAdherent = filter_input(INPUT_POST, "aLName");
$prenomAdherent = filter_input(INPUT_POST, "aFName");
$idPhoto = filter_input(INPUT_POST, "aIdPhoto");
$idAdherent = filter_input(INPUT_POST, "idAdherent");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "update adherent set nomAdherent=:nomAdherent, prenomAdherent=:prenomAdherent, photo_idPhoto=(select idPhoto from photo where entreprise_idEntreprise=:idEntreprise), adherent_idEntreprise=:idEntreprise where idAdherent=:idAdherent";

$result = $db->prepare($sql_query);

$result->bindParam(":nomAdherent", $nomAdherent);
$result->bindParam(":prenomAdherent", $prenomAdherent);
$result->bindParam(":idEntreprise", $idPhoto);
$result->bindParam(":idAdherent", $idAdherent);

$result->execute();

header('Location: /admin/management/member.php');
?>
