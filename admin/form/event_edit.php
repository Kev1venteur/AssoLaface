<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/assolaface/admin/actions/event_edit.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="event_name" type="text" class="validate" name="evName">
                <label for="event_name">Nom de l'évènement</label>
              </div>
              <div class="input-field col s6">
                <textarea id="price" class="materialize-textarea" name="evPrice"></textarea>
                <label for="price">Prix de l'évènement en €</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="datepicker" name="evDate">
                <label>Date Evènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_place" class="materialize-textarea" name="evPlace"></textarea>
                <label for="event_place">Lieu de l'évènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_description" class="materialize-textarea" name="evDescription"></textarea>
                <label for="event_description">Description de l'évènement</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
