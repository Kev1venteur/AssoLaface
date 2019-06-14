<?php
include '../../modal/login_security.php';

$nomEntreprise = filter_input(INPUT_POST, "eName");
$domaineEntreprise = filter_input(INPUT_POST, "eDomaine");
$descriptionEntreprise = filter_input(INPUT_POST, "eDescription");
$nomLogoEntreprise = filter_input(INPUT_POST, "eLogoName");
$nomPhoto = filter_input(INPUT_POST, "pName");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query_get_latest_enterprise_id = "select max(e.idEntreprise) from entreprise e"
$get_latest_e_id = $db->prepare($sql_query_get_latest_enterprise_id);
$get_latest_e_id->execute();
$idEntreprise = $get_latest_e_id + 1;

$sql_query_brand = "insert entreprise set nomEntreprise=:nomEntreprise, domaineEntreprise=:domaineEntreprise, descriptionEntreprise=:descriptionEntreprise, nomLogoEntreprise=:nomLogoEntreprise";
$sql_query_photo = "insert photo set nomPhoto=:nomPhoto, entreprise_idEntreprise=:idEntreprise";

$result = $db->prepare($sql_query_brand);
$result_photo = $db->prepare($sql_query_photo);

$result->bindParam(":nomEntreprise", $nomEntreprise);
$result->bindParam(":domaineEntreprise", $domaineEntreprise);
$result->bindParam(":descriptionEntreprise", $descriptionEntreprise);
$result->bindParam(":nomLogoEntreprise", $nomLogoEntreprise);

$result_photo->bindParam(":nomPhoto", $nomPhoto);
$result_photo->bindParam(":idEntreprise", $idEntreprise);

$result->execute();
$result_photo->execute();

header('Location: /assolaface/admin/management/enterprise.php');
?>
