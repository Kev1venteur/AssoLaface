<?php
include '../../modal/login_security.php';

$nomEntreprise = filter_input(INPUT_POST, "eName");
$domaineEntreprise = filter_input(INPUT_POST, "eDomaine");
$descriptionEntreprise = filter_input(INPUT_POST, "eDescription");
$nomLogoEntreprise = filter_input(INPUT_POST, "eLogoName");
$nomPhoto = filter_input(INPUT_POST, "pName");
$addresse = filter_input(INPUT_POST, "cAddresse");
$email = filter_input(INPUT_POST, "cEmail");
$tel = filter_input(INPUT_POST, "cTel");
$urlSiteRedirectionCarte = filter_input(INPUT_POST, "cUrl");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query_get_latest_enterprise_id = "select max(idEntreprise) as max from entreprise";
$get_latest_e_id = $db->prepare($sql_query_get_latest_enterprise_id);
$get_latest_e_id->execute();
$id = $get_latest_e_id->fetch();
$idEntreprise = $id["max"] + 1;

$sql_query_brand = "insert entreprise set nomEntreprise=:nomEntreprise, domaineEntreprise=:domaineEntreprise, descriptionEntreprise=:descriptionEntreprise, nomLogoEntreprise=:nomLogoEntreprise";
$sql_query_photo = "insert photo set entreprise_idEntreprise=:idEntreprise, nomPhoto=:nomPhoto";
$sql_query_coordonnees = "insert coordonnees set entreprise_idEntreprise=:idEntreprise, email=:email, tel=:tel, addresse=:addresse, urlSiteRedirectionCarte=:urlSiteRedirectionCarte";

$result = $db->prepare($sql_query_brand);
$result_photo = $db->prepare($sql_query_photo);
$result_coordonnees = $db->prepare($sql_query_coordonnees);

$result->bindParam(":nomEntreprise", $nomEntreprise);
$result->bindParam(":domaineEntreprise", $domaineEntreprise);
$result->bindParam(":descriptionEntreprise", $descriptionEntreprise);
$result->bindParam(":nomLogoEntreprise", $nomLogoEntreprise);

$result_photo->bindParam(":nomPhoto", $nomPhoto);
$idEntreprise = (int)$idEntreprise;
$result_photo->bindParam(":idEntreprise", $idEntreprise, PDO::PARAM_INT);

$result_coordonnees->bindParam(":email", $email);
$result_coordonnees->bindParam(":tel", $tel);
$result_coordonnees->bindParam(":addresse", $addresse);
$result_coordonnees->bindParam(":urlSiteRedirectionCarte", $urlSiteRedirectionCarte);
$result_coordonnees->bindParam(":idEntreprise", $idEntreprise, PDO::PARAM_INT);

$result->execute();
$result_photo->execute();
$result_coordonnees->execute();

header('Location: /assolaface/admin/management/enterprise.php');
?>
