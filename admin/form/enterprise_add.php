<?php
include '../../modal/login_security.php';
include '../../modal/header.php';
?>

      <main>
        <a href="../logout.php" class="waves-effect waves-light btn-small right btn-logout red"><i class="material-icons right">account_circle</i>Déconnexion</a>
        <div class="row form-container">
          <form class="col s12" action="/assolaface/admin/actions/enterprise_add.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input id="enterprise_name" type="text" class="validate" name="eName">
                <label for="enterprise_name">Nom de l'entreprise</label>
              </div>
              <div class="input-field col s6">
                <input id="enterprise_domain" type="text" class="validate" name="eDomaine">
                <label for="enterprise_domain">Domaine de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="enterprise_address" type="text" class="validate" name="cAddresse">
                <label for="enterprise_address">Addresse de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="cEmail">
                <label for="email">Email de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                <input id="icon_telephone" type="tel" class="validate" name="cTel" maxlength="14">
                <label for="icon_telephone">Telephone</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="enterprise_url" class="materialize-textarea" name="cUrl"></textarea>
                <label for="enterprise_url">Url pour redirection de la carte</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="enterprise_description" class="materialize-textarea" name="eDescription" maxlength="200"></textarea>
                <label for="enterprise_description">Description de l'entreprise</label>
              </div>
            </div>
            <div class="row">
              <div class="file-field input-field">
                <div class="btn">
                    <span>Importer une photo</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="pName" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="file-field input-field">
                <div class="btn">
                    <span>Importer un logo (facultatif)</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="eLogoName">
                </div>
              </div>
            </div>
            <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">Valider
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </main>
<?php include '../../modal/footer.php'; ?>
