<?php include '../modal/header.php'; ?>
      <main>
        <div class="row id-form">
          <form class="col s12" action="login.php" method="post">
            <div class="row">
              <div class="input-field col s12">
                <textarea id="username" class="materialize-textarea" name="username"></textarea>
                <label for="username">Utilisateur</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Mot de Passe</label>
              </div>
            </div>
            <button class="btn waves-effect red waves-light" type="submit" name="submit">Connexion<i class="material-icons right">send</i></button>
          </form>
        </div>
      </main>
<?php include '../modal/footer.php'; ?>
