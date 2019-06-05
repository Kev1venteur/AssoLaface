<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: menu.php");
    exit;
}

require_once "../config/config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    }
    else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    }
    else{
        $password = md5(trim($_POST["password"]));
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT idUtilisateur, loginUtilisateur, passwordUtilisateur FROM utilisateur WHERE loginUtilisateur = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            header("location: menu.php");
                        }
                        else{
                            $password_err = "Le mot de passe entré n'est pas valide.";
                        }
                    }
                }
                else{
                    $username_err = "Pas de compte trouvé avec ce nom d'utilisateur.";
                }
            }
            else{
                echo "Oops! Quelque chose s'est mal passé, réesaye plus tard.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
include '../modal/header.php'; ?>
  <main>
    <div class="id-form">
      <p>Rentrez vos identifiant pour vous connecter.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
          <label>Utilisateur</label>
          <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label>Mot de Passe</label>
          <input type="password" name="password" class="form-control">
          <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
          <button class="btn waves-effect waves-light red connect-button" type="submit" name="action">Se Connecter<i class="material-icons right">send</i></button>
        </div>
      </form>
    </div>
  </main>
<?php include '../modal/footer.php'; ?>
