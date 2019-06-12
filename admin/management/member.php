<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
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
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <table class="highlight table-gestion member-table responsive-table">
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Entreprise</th>
              <th>Domaine</th>
              <th>Action</th>
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
              <td><a href="/assolaface/admin/form/member_edit.php" class="btn-floating waves-effect waves-light blue"><i class="material-icons">edit</i></a>&nbsp;
                  <a href="/assolaface/admin/actions/member_delete.php" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
            </tr>
            <?php } ?>
            <tr>
              <td><a href="/assolaface/admin/form/member_add.php" class="btn-floating waves-effect waves-light green"><i class="material-icons">add</i></a></td>
            </tr>
          </tbody>
        </table>
      </main>
<?php include '../../modal/footer.php'; ?>
