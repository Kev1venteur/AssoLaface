<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/assolaface/admin/actions/event_add.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="event_name" type="text" required class="validate" name="evName">
                <label for="event_name">Nom de l'évènement</label>
              </div>
              <div class="input-field col s6">
                <textarea id="event_price" required class="materialize-textarea" name="evPrice"></textarea>
                <label for="event_price">Prix de l'évènement en €</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="datepicker" required name="evDate">
                <label>Date Evènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_place" class="materialize-textarea" required name="evPlace"></textarea>
                <label for="event_place">Lieu de l'évènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_description" class="materialize-textarea" required name="evDescription"></textarea>
                <label for="event_description">Description de l'évènement (ne pas oublier d'ajouter l'horaire si il y a)</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
