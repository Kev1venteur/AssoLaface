<?php
include '../../modal/login_security.php';

$nomEntreprise = filter_input(INPUT_POST, "eName");
$domaineEntreprise = filter_input(INPUT_POST, "eDomaine");
$descriptionEntreprise = filter_input(INPUT_POST, "eDescription");
$addresse = filter_input(INPUT_POST, "cAddresse");
$email = filter_input(INPUT_POST, "cEmail");
$tel = filter_input(INPUT_POST, "cTel");
$urlSiteRedirectionCarte = filter_input(INPUT_POST, "cUrl");

try {

    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['ePhoto']['error']) ||
        is_array($_FILES['ePhoto']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['ePhoto']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here.
    if ($_FILES['ePhoto']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['ePhoto']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }
    $nomPhoto = sha1_file($_FILES['ePhoto']['tmp_name']);
    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['ePhoto']['tmp_name'],
        sprintf(__DIR__.'/../../photos/brand_pictures/%s.%s',
            $nomPhoto,
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    echo 'File is uploaded successfully.';
}
catch (RuntimeException $e) {
    echo $e->getMessage();
}
$point = ".";
$nomPhoto= $nomPhoto . $point . $ext;

//script pour logo
try {

  // Undefined | Multiple Files | $_FILES Corruption Attack
  // If this request falls under any of them, treat it invalid.
  if (
      !isset($_FILES['eLogo']['error']) ||
      is_array($_FILES['eLogo']['error'])
  ) {
      throw new RuntimeException('Invalid parameters.');
  }

  // Check $_FILES['upfile']['error'] value.
  switch ($_FILES['eLogo']['error']) {
      case UPLOAD_ERR_OK:
          break;
      case UPLOAD_ERR_NO_FILE:
          throw new RuntimeException('No file sent.');
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
          throw new RuntimeException('Exceeded filesize limit.');
      default:
          throw new RuntimeException('Unknown errors.');
  }

  // You should also check filesize here.
  if ($_FILES['eLogo']['size'] > 1000000) {
      throw new RuntimeException('Exceeded filesize limit.');
  }

  // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
  // Check MIME Type by yourself.
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  if (false === $ext = array_search(
      $finfo->file($_FILES['eLogo']['tmp_name']),
      array(
          'jpg' => 'image/jpeg',
          'png' => 'image/png',
          'gif' => 'image/gif',
      ),
      true
  )) {
      throw new RuntimeException('Invalid file format.');
  }
  $nomLogoEntreprise = sha1_file($_FILES['eLogo']['tmp_name']);
  // You should name it uniquely.
  // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
  // On this example, obtain safe unique name from its binary data.
  if (!move_uploaded_file(
      $_FILES['eLogo']['tmp_name'],
      sprintf(__DIR__.'/../../photos/brand_logos/%s.%s',
          $nomLogoEntreprise,
          $ext
      )
  )) {
      throw new RuntimeException('Failed to move uploaded file.');
  }
  echo 'File is uploaded successfully.';
}
catch (RuntimeException $e) {
    echo $e->getMessage();
}
$nomLogoEntreprise= $nomLogoEntreprise . $point . $ext;


require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query_brand = "insert into entreprise set nomEntreprise=:nomEntreprise, domaineEntreprise=:domaineEntreprise, descriptionEntreprise=:descriptionEntreprise, nomLogoEntreprise=:nomLogoEntreprise";
$sql_query_photo = "insert into photo set entreprise_idEntreprise=:idEntreprise, nomPhoto=:nomPhoto";
$sql_query_coordonnees = "insert into coordonnees set entreprise_idEntreprise=:idEntreprise, email=:email, tel=:tel, addresse=:addresse, urlSiteRedirectionCarte=:urlSiteRedirectionCarte";

$result = $db->prepare($sql_query_brand);
$result_photo = $db->prepare($sql_query_photo);
$result_coordonnees = $db->prepare($sql_query_coordonnees);

$result->bindParam(":nomEntreprise", $nomEntreprise);
$result->bindParam(":domaineEntreprise", $domaineEntreprise);
$result->bindParam(":descriptionEntreprise", $descriptionEntreprise);
$result->bindParam(":nomLogoEntreprise", $nomLogoEntreprise);

$result->execute();

$sql_query_get_latest_enterprise_id = "select max(idEntreprise) as max from entreprise";
$get_latest_e_id = $db->prepare($sql_query_get_latest_enterprise_id);
$get_latest_e_id->execute();
$id = $get_latest_e_id->fetch();
$idEntreprise = $id["max"];

$result_photo->bindParam(":nomPhoto", $nomPhoto);
$result_photo->bindParam(":idEntreprise", $idEntreprise, PDO::PARAM_INT);

$result_coordonnees->bindParam(":email", $email);
$result_coordonnees->bindParam(":tel", $tel);
$result_coordonnees->bindParam(":addresse", $addresse);
$result_coordonnees->bindParam(":urlSiteRedirectionCarte", $urlSiteRedirectionCarte);
$result_coordonnees->bindParam(":idEntreprise", $idEntreprise, PDO::PARAM_INT);

$result_photo->execute();
$result_coordonnees->execute();

header('Location: /assolaface/admin/management/enterprise.php');
?>
