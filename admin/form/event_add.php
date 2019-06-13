<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>
      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="event_name" type="text" class="validate">
                <label for="event_name">Nom de l'évènement</label>
              </div>
              <div class="input-field col s6">
                <textarea id="price" class="materialize-textarea"></textarea>
                <label for="price">Prix de l'évènement en €</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="datepicker">
                <label>Date Evènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_place" class="materialize-textarea"></textarea>
                <label for="event_place">Lieu de l'évènement</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="event_description" class="materialize-textarea"></textarea>
                <label for="event_description">Description de l'évènement</label>
              </div>
            </div>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
