<?php include '../../modal/header.php'; ?>
<?php require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT e.nomEntreprise, e.domaineEntreprise, c.email, a.nomAdherent, a.prenomAdherent
FROM entreprise e JOIN adherent a on a.photo_idPhoto=e.idEntreprise JOIN coordonnees c on c.entreprise_idEntreprise=e.idEntreprise ORDER BY a.prenomAdherent ASC";

$result = $db->prepare($sql_query);
$result->execute();
$members = $result->fetchAll();
?>

      <main>
        <?php include '../../modal/sidenav.php'; ?>
        <table class="highlight table-gestion member-table">
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Entreprise</th>
              <th>Domaine</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($members as $line){ ?>
            <tr>
              <td><?php echo $line["prenomAdherent"] ?></td>
              <td><?php echo $line["nomAdherent"] ?></td>
              <td><?php echo $line["email"] ?></td>
              <td><?php echo $line["nomEntreprise"] ?></td>
              <td><?php echo $line["domaineEntreprise"] ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </main>
<?php include '../../modal/footer.php'; ?>
