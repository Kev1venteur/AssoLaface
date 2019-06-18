<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
<?php require_once '../../config/config.php';

$db = new PDO("mysql:host=" . Config::DB_SERVER . ";dbname=" . Config::DB_NAME
, Config::DB_USERNAME, Config::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql_query = "SELECT e.nomEntreprise, e.idEntreprise, e.domaineEntreprise
FROM entreprise e ORDER BY e.nomEntreprise";

$result = $db->prepare($sql_query);
$result->execute();
$brands = $result->fetchAll();
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <table class="highlight table-gestion member-table responsive-table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Domaine</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($brands as $line){ ?>
            <tr>
              <td><?php echo $line["nomEntreprise"] ?></td>
              <td><?php echo $line["domaineEntreprise"] ?></td>
              <td><a href="/admin/form/enterprise_edit.php?idEntreprise=<?php echo $line["idEntreprise"] ?>" class="btn-floating waves-effect waves-light blue"><i class="material-icons">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="/admin/actions/enterprise_delete.php?idEntreprise=<?php echo $line["idEntreprise"] ?>" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
            </tr>
            <?php } ?>
            <tr>
              <td><a href="/admin/form/enterprise_add.php" class="btn-floating waves-effect waves-light green"><i class="material-icons">add</i></a></td>
            </tr>
          </tbody>
        </table>
      </main>
<?php include '../../modal/footer.php'; ?>
