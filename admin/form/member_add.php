<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
<?php require_once '../../config/config.php';
$idAdherent= filter_input(INPUT_GET, "idAdherent");

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query_enterprise = "SELECT e.nomEntreprise, e.idEntreprise
FROM adherent a JOIN entreprise e on e.idEntreprise=a.photo_idPhoto";

$result_2 = $db->prepare($sql_query_enterprise);
$result_2->execute();
$brands = $result_2->fetchAll();
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/assolaface/admin/actions/member_add.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="last_name" type="text" class="validate" required name="aLName">
                <label for="last_name">Nom de l'Adhérent</label>
              </div>
              <div class="input-field col s6">
                <input id="first_name" type="text" class="validate" required name="aFName">
                <label for="first_name">Prénom de l'Adhérent</label>
              </div>
            </div>
            <div class="input-field col s12">
              <select required name="aIdPhoto">
                <option disabled selected>Choisir l'Entreprise</option>
                <?php foreach($brands as $line){ ?>
                  <option value="<?php echo $line['idEntreprise'] ?>"><?php echo $line['nomEntreprise'] ?></option>
                <?php } ?>
              </select>
              <label>Entreprise de l'Adhérent</label>
            </div>
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
