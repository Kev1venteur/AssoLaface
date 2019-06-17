<?php include '../../modal/header.php'; ?>
<?php require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT ev.dateEvenement, ev.descriptionEvenement, ev.nomEvenement, ev.lieuEvenement, ev.prixEntreeEvenement, ev.idEvenement
FROM evenement ev WHERE ev.dateEvenement < CURRENT_DATE() ORDER BY ev.dateEvenement ASC";

$result = $db->prepare($sql_query);
$result->execute();
$events = $result->fetchAll();
?>

      <main>
        <?php include '../../modal/sidenav.php'; ?>
        <?php foreach ($events as $modal){ ?>
          <div id="modal<?php echo $modal["idEvenement"] ?>" class="modal">
           <div class="modal-content">
             <h4>Informations Supplémentaires</h4>
             <p><?php echo $modal["descriptionEvenement"] ?></p>
           </div>
           <div class="modal-footer">
             <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK</a>
           </div>
          </div>
        <?php } ?>
        <table class="highlight table-gestion member-table responsive-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Nom</th>
              <th>Lieu</th>
              <th>Prix</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($events as $line){ ?>
            <tr>
              <td><?php echo $line["dateEvenement"] ?></td>
              <td><?php echo $line["nomEvenement"] ?></td>
              <td><?php echo $line["lieuEvenement"] ?></td>
              <td><?php echo $line["prixEntreeEvenement"] ?>&nbsp;€</td>
              <td><a class="btn-floating waves-effect waves-light blue modal-trigger" href="#modal<?php echo $line["idEvenement"] ?>"><i class="material-icons">info</i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </main>
<?php include '../../modal/footer.php'; ?>
