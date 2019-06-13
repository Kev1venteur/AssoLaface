<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
<?php require_once '../../config/config.php';
$idEvenement= filter_input(INPUT_GET, "idEvenement");

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT ev.dateEvenement, ev.descriptionEvenement, ev.nomEvenement, ev.lieuEvenement, ev.prixEntreeEvenement, ev.idEvenement
FROM evenement ev WHERE ev.idEvenement=$idEvenement";

$result = $db->prepare($sql_query);
$result->bindparam(":idEvenement",$idEvenement);
$result->execute();
$events = $result->fetch();
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/assolaface/admin/actions/event_edit.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="event_name" type="text" class="validate" name="evName" value="<?php echo $events['nomEvenement'] ?>">
                <label for="event_name">Nom de l'évènement</label>
              </div>
              <div class="input-field col s6">
                <textarea id="event_price" class="materialize-textarea" name="evPrice"><?php echo $events['prixEntreeEvenement'] ?></textarea>
                <label for="price">Prix de l'évènement en €</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="datepicker" name="evDate" value="<?php echo $events['dateEvenement'] ?>">
                <label>Date Evènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_place" class="materialize-textarea" name="evPlace"><?php echo $events['lieuEvenement'] ?></textarea>
                <label for="event_place">Lieu de l'évènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_description" class="materialize-textarea" name="evDescription"><?php echo $events['descriptionEvenement'] ?></textarea>
                <label for="event_description">Description de l'évènement (ne pas oublier d'ajouter l'horaire si il y a)</label>
              </div>
            </div>
            <input type="hidden" name="idEvenement" value="<?php echo $idEvenement ?>">
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
