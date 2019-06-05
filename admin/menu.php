<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include '../modal/header.php';
?>
      <main>
        <a class="waves-effect waves-light btn-large">Button</a>
        <a class="waves-effect waves-light btn-large"><i class="material-icons left">cloud</i>button</a>
        <a class="waves-effect waves-light btn-large"><i class="material-icons right">cloud</i>button</a>
      </main>
<?php include '../modal/footer.php'; ?>
