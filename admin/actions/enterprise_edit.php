<?php
include '../../modal/login_security.php';

$nomEntreprise = filter_input(INPUT_POST, "eName");
$domaineEntreprise = filter_input(INPUT_POST, "eDomaine");
$descriptionEntreprise = filter_input(INPUT_POST, "eDescription");
$nomLogoEntreprise = filter_input(INPUT_POST, "eLogoName");
$nomPhoto = filter_input(INPUT_POST, "pName");
$idEntreprise = filter_input(INPUT_POST, "idEntreprise");
$idPhoto = filter_input(INPUT_POST, "idPhoto");
$idCoordonnees = filter_input(INPUT_POST, "idCoordonnees");
$addresse = filter_input(INPUT_POST, "cAddresse");
$email = filter_input(INPUT_POST, "cEmail");
$tel = filter_input(INPUT_POST, "cTel");
$url = filter_input(INPUT_POST, "cUrl");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query_brand = "update entreprise set nomEntreprise=:nomEntreprise, domaineEntreprise=:domaineEntreprise, descriptionEntreprise=:descriptionEntreprise, nomLogoEntreprise=:nomLogoEntreprise where idEntreprise=:idEntreprise";
$sql_query_photo = "update photo set nomPhoto=:nomPhoto where idPhoto=:idPhoto";
$sql_query_coordonnees = "update coordonnees set email=:email, tel=:tel, addresse=:addresse, urlSiteRedirectionCarte=:urlSiteRedirectionCarte, entreprise_idEntreprise=:idEntreprise where idCoordonnees=:idCoordonnees";

$result = $db->prepare($sql_query_brand);
$result_photo = $db->prepare($sql_query_photo);
$result_coordonnees = $db->prepare($sql_query_coordonnees);

$result->bindParam(":nomEntreprise", $nomEntreprise);
$result->bindParam(":domaineEntreprise", $domaineEntreprise);
$result->bindParam(":descriptionEntreprise", $descriptionEntreprise);
$result->bindParam(":nomLogoEntreprise", $nomLogoEntreprise);
$result->bindParam(":idEntreprise", $idEntreprise);

$result_photo->bindParam(":nomPhoto", $nomPhoto);
$result_photo->bindParam(":idPhoto", $idPhoto);

$result_coordonnees->bindParam(":email", $email);
$result_coordonnees->bindParam(":tel", $tel);
$result_coordonnees->bindParam(":addresse", $addresse);
$result_coordonnees->bindParam(":urlSiteRedirectionCarte", $url);
$result_coordonnees->bindParam(":idEntreprise", $idEntreprise);
$result_coordonnees->bindParam(":idCoordonnees", $idCoordonnees);

$result->execute();
$result_photo->execute();
$result_coordonnees->execute();

header('Location: /assolaface/admin/management/enterprise.php');
?>
