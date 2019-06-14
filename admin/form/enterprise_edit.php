<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
<?php require_once '../../config/config.php';
$idEntreprise= filter_input(INPUT_GET, "idEntreprise");

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT e.nomEntreprise, e.idEntreprise, e.domaineEntreprise, e.descriptionEntreprise, e.nomLogoEntreprise, p.nomPhoto, p.idPhoto
FROM entreprise e join photo p on p.entreprise_idEntreprise=e.idEntreprise where e.idEntreprise=:idEntreprise";

$result = $db->prepare($sql_query);
$result->bindparam(":idEntreprise", $idEntreprise);
$result->execute();
$brands = $result->fetch();
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/assolaface/admin/actions/enterprise_edit.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="enterprise_name" type="text" class="validate" name="eName" value="<?php echo $brands['nomEntreprise'] ?>">
                <label for="enterprise_name">Nom de l'entreprise</label>
              </div>
              <div class="input-field col s6">
                <textarea id="enterprise_domain" class="materialize-textarea" name="eDomaine"><?php echo $brands['domaineEntreprise'] ?></textarea>
                <label for="enterprise_domain">Domaine de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="enterprise_description" class="materialize-textarea" name="eDescription"><?php echo $brands['descriptionEntreprise'] ?></textarea>
                <label for="enterprise_description">Description de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <h6><b>Photo Actuelle</b></h6>
                <img class="image-size" src="/assolaface/photos/brand_pictures/<?php echo $brands["nomPhoto"] ?>">
              </div>
              <div class="file-field input-field">
                <div class="btn">
                    <span>Importer une autre photo</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="pName" value="<?php echo $brands['nomPhoto'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <h6><b>Logo Actuel</b></h6>
                <img class="image-size" src="/assolaface/photos/brand_logos/<?php echo $brands["nomLogoEntreprise"] ?>">
              </div>
              <div class="file-field input-field">
                <div class="btn">
                    <span>Importer un autre logo</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="eLogoName" value="<?php echo $brands['nomLogoEntreprise'] ?>">
                </div>
              </div>
            </div>
            <input type="hidden" name="idEntreprise" value="<?php echo $idEntreprise ?>">
            <input type="hidden" name="idPhoto" value="<?php echo $brands['idPhoto'] ?>">
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
