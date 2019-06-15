<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
<?php require_once '../../config/config.php';
$idAdherent= filter_input(INPUT_GET, "idAdherent");

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT a.nomAdherent, a.prenomAdherent, a.idAdherent, e.nomEntreprise, e.idEntreprise
FROM adherent a JOIN entreprise e on e.idEntreprise=a.photo_idPhoto WHERE a.idAdherent=:idAdherent";

$sql_query_enterprise = "SELECT e.nomEntreprise, e.idEntreprise
FROM adherent a JOIN entreprise e on e.idEntreprise=a.photo_idPhoto";

$result = $db->prepare($sql_query);
$result_2 = $db->prepare($sql_query_enterprise);

$result->bindparam(":idAdherent",$idAdherent);

$result->execute();
$result_2->execute();

$members = $result->fetch();
$brands = $result_2->fetchAll();
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/admin/actions/member_edit.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="last_name" type="text" class="validate" required name="aLName" value="<?php echo $members['nomAdherent'] ?>">
                <label for="last_name">Nom de l'Adhérent</label>
              </div>
              <div class="input-field col s6">
                <input id="first_name" type="text" class="validate" required name="aFName" value="<?php echo $members['prenomAdherent'] ?>">
                <label for="first_name">Prénom de l'Adhérent</label>
              </div>
            </div>
            <div class="input-field col s12">
              <select required name="aIdPhoto">
                <option value="<?php echo $members['idEntreprise'] ?>" selected><?php echo $members['nomEntreprise'] ?></option>
                <?php foreach($brands as $line){ ?>
                  <option value="<?php echo $line['idEntreprise'] ?>"><?php echo $line['nomEntreprise'] ?></option>
                <?php } ?>
              </select>
              <label>Entreprise de l'Adhérent</label>
            </div>
            <input type="hidden" name="idAdherent" value="<?php echo $idAdherent ?>">
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
