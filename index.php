<?php include 'modal/header.php'; ?>
<?php require_once 'config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT e.nomEntreprise, e.idEntreprise, e.domaineEntreprise, e.descriptionEntreprise, p.nomPhoto, c.urlSiteRedirectionCarte, c.tel, c.addresse
FROM entreprise e JOIN photo p on p.entreprise_idEntreprise=e.idEntreprise JOIN coordonnees c on c.entreprise_idEntreprise=e.idEntreprise";

$result = $db->prepare($sql_query);
$result->execute();
$brand = $result->fetchAll();
?>

      <main>
        <?php include 'modal/sidenav.php'; ?>
        <div class="row">
          <?php foreach ($brand as $card){ ?>
          <div id="modal<?php echo $card["idEntreprise"] ?>" class="modal">
           <div class="modal-content">
             <h4>Prendre Contact</h4>
             <p>Tel: <?php echo $card["tel"] ?></p>
             <p>Adresse: <?php echo $card["addresse"] ?></p>
           </div>
           <div class="modal-footer">
             <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK</a>
           </div>
         </div>
          <div class="col s12 m3">
            <div class="card">
              <div class="card-image">
                <img src="/assolaface/photos/brand_pictures/<?php echo $card["nomPhoto"] ?>">
                <span class="card-title orange-text"><b><?php echo $card["nomEntreprise"] ?> <?php echo $card["domaineEntreprise"] ?></b></span>
                <a class="btn-floating btn-small waves-effect waves-light blue modal-trigger left" href="#modal<?php echo $card["idEntreprise"] ?>"><i class="material-icons">info</i></a>
                <a href="<?php echo $card["urlSiteRedirectionCarte"] ?>" class="btn-floating halfway-fab waves-effect waves-light red" target="_blank"><i class="material-icons">chevron_right</i></a>
              </div>
              <div class="card-content">
                <p>&emsp;<?php echo $card["descriptionEntreprise"] ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </main>
<?php include 'modal/footer.php'; ?>
