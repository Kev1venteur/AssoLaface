<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /assolaface/index.php");
    exit;
}
include '../modal/header.php';
?>
      <main>
        <a href="logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <table class="highlight table-gestion">
          <thead>
            <tr>
                <th>Catégories</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Entreprises</td>
              <td><a class="waves-effect waves-light btn"><i class="material-icons left">settings</i>Gérer</a></td>
            </tr>
            <tr>
              <td>Evénements</td>
              <td><a class="waves-effect waves-light btn"><i class="material-icons left">settings</i>Gérer</a></td>
            </tr>
            <tr>
              <td>Adhérents</td>
              <td><a class="waves-effect waves-light btn"><i class="material-icons left">settings</i>Gérer</a></td>
            </tr>
          </tbody>
        </table>
      </main>
<?php include '../modal/footer.php'; ?>
