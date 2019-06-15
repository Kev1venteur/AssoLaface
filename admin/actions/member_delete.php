<?php
include '../../modal/login_security.php';

$idAdherent= filter_input(INPUT_GET, "idAdherent");

require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "delete from adherent where idAdherent=:idAdherent";

$result = $db->prepare($sql_query);

$result->bindParam(":idAdherent", $idAdherent);

$result->execute();

header('Location: /admin/management/member.php');
?>
