<?php
include '../../modal/login_security.php';

$nomAdherent = filter_input(INPUT_POST, "aLName");
$prenomAdherent = filter_input(INPUT_POST, "aFName");
$idPhoto = filter_input(INPUT_POST, "aIdPhoto");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "insert into adherent set nomAdherent=:nomAdherent, prenomAdherent=:prenomAdherent, photo_idPhoto=(select idPhoto from photo where entreprise_idEntreprise=:photo_idPhoto)";

$result = $db->prepare($sql_query);

$result->bindParam(":nomAdherent", $nomAdherent);
$result->bindParam(":prenomAdherent", $prenomAdherent);
$result->bindParam(":photo_idPhoto", $idPhoto);

$result->execute();

header('Location: /admin/management/member.php');
?>
