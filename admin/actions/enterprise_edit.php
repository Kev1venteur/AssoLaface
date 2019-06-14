<?php
include '../../modal/login_security.php';

$nomEntreprise = filter_input(INPUT_POST, "eName");
$domaineEntreprise = filter_input(INPUT_POST, "eDomaine");
$descriptionEntreprise = filter_input(INPUT_POST, "eDescription");
$nomLogoEntreprise = filter_input(INPUT_POST, "eLogoName");
$nomPhoto = filter_input(INPUT_POST, "pName");
$idEntreprise = filter_input(INPUT_POST, "idEntreprise");
$idPhoto = filter_input(INPUT_POST, "idPhoto");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query_brand = "update entreprise set nomEntreprise=:nomEntreprise, domaineEntreprise=:domaineEntreprise, descriptionEntreprise=:descriptionEntreprise, nomLogoEntreprise=:nomLogoEntreprise where idEntreprise=:idEntreprise";
$sql_query_photo = "update photo set nomPhoto=:nomPhoto where idPhoto=:idPhoto";

$result = $db->prepare($sql_query_brand);
$result_photo = $db->prepare($sql_query_photo);

$result->bindParam(":nomEntreprise", $nomEntreprise);
$result->bindParam(":domaineEntreprise", $domaineEntreprise);
$result->bindParam(":descriptionEntreprise", $descriptionEntreprise);
$result->bindParam(":nomLogoEntreprise", $nomLogoEntreprise);
$result->bindParam(":idEntreprise", $idEntreprise);

$result_photo->bindParam(":nomPhoto", $nomPhoto);
$result_photo->bindParam(":idPhoto", $idPhoto);

$result->execute();
$result_photo->execute();

header('Location: /assolaface/admin/management/enterprise.php');
?>
