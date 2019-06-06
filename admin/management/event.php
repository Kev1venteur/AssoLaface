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
  
</main>
<?php include '../modal/footer.php'; ?>
