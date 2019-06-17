<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
<?php require_once '../../config/config.php';
$idEntreprise= filter_input(INPUT_GET, "idEntreprise");

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT e.nomEntreprise, e.idEntreprise, e.domaineEntreprise, e.descriptionEntreprise, e.nomLogoEntreprise, p.nomPhoto, p.idPhoto, c.addresse, c.email, c.tel, c.urlSiteRedirectionCarte, c.idCoordonnees
FROM entreprise e join photo p on p.entreprise_idEntreprise=e.idEntreprise join coordonnees c on c.entreprise_idEntreprise=e.idEntreprise where e.idEntreprise=:idEntreprise";

$result = $db->prepare($sql_query);
$result->bindparam(":idEntreprise", $idEntreprise);
$result->execute();
$brands = $result->fetch();
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" enctype="multipart/form-data" action="/admin/actions/enterprise_edit.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="enterprise_name" type="text" class="validate" name="eName" required value="<?php echo $brands["nomEntreprise"] ?>">
                <label for="enterprise_name">Nom de l'entreprise</label>
              </div>
              <div class="input-field col s6">
                <textarea id="enterprise_domain" class="materialize-textarea" name="eDomaine"><?php echo $brands["domaineEntreprise"] ?></textarea>
                <label for="enterprise_domain">Domaine de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="enterprise_address" type="text" class="validate" required name="cAddresse" value="<?php echo $brands["addresse"] ?>">
                <label for="enterprise_address">Addresse de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="cEmail" value="<?php echo $brands["email"] ?>">
                <label for="email">Email de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                <input id="icon_telephone" type="tel" class="validate" name="cTel" value="<?php echo $brands["tel"] ?>" maxlength="14">
                <label for="icon_telephone">Telephone</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="enterprise_description" class="materialize-textarea" required name="eDescription" maxlength="200"><?php echo $brands["descriptionEntreprise"] ?></textarea>
                <label for="enterprise_description">Description de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="enterprise_url" class="materialize-textarea" required name="cUrl"><?php echo $brands["urlSiteRedirectionCarte"] ?></textarea>
                <label for="enterprise_url">Url pour redirection de la carte</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <h6><b>Photo Actuelle</b></h6>
                <img class="image-size" src="/photos/brand_pictures/<?php echo $brands["nomPhoto"] ?>" alt="Photo non chargée">
              </div>
              <div class="file-field input-field">
                <div class="btn">
                    <span>Importer une autre photo</span>
                    <input name="ePhoto" type="file"  value="<?php echo $brands["nomPhoto"] ?>">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" required name="pName" value="<?php echo $brands["nomPhoto"] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <h6><b>Logo Actuel</b></h6>
                <img class="image-size" src="/photos/brand_logos/<?php echo $brands["nomLogoEntreprise"] ?>" alt="Pas de logo">
              </div>
              <div class="file-field input-field">
                <div class="btn">
                    <span>Importer un autre logo</span>
                    <input name="eLogo" type="file" value="<?php echo $brands["nomLogoEntreprise"] ?>">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="eLogoName" value="<?php echo $brands["nomLogoEntreprise"] ?>">
                </div>
              </div>
            </div>
            <input type="hidden" name="idEntreprise" value="<?php echo $idEntreprise ?>">
            <input type="hidden" name="idPhoto" value="<?php echo $brands["idPhoto"] ?>">
            <input type="hidden" name="idCoordonnees" value="<?php echo $brands["idCoordonnees"] ?>">
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
