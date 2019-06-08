<?php include 'modal/header.php'; ?>
      <main>
        <!--Début sidenav marron-->
        <ul id="slide-out" class="sidenav">
          <li>
            <div class="user-view">
              <div class="background">
                <img src="/assolaface/pictures/notebook.jpg">
              </div>
              <a href="#user"><img class="circle" src="/assolaface/pictures/head_only.png"></a>
              <a href="#name"><span class="white-text name">Association Froidfondaise</span></a>
              <a href="#email"><span class="white-text email">associationlaface@gmail.com</span></a>
            </div>
          </li>
          <li><a href="/assolaface/user/page/event-history_view.php"><i class="material-icons">import_contacts</i>Historique Evénementiel</a></li>
          <li><div class="divider"></div></li>
          <li><a class="subheader">Administration</a></li>
          <li><a href="/assolaface/admin/login.php"><i class="material-icons">account_circle</i>Connexion - Gestion</a></li>
        </ul>
        <a href="/assolaface/index.php" data-target="slide-out" class="sidenav-trigger waves-effect waves-light btn brown lighten-2 hoverable hide-on-med-and-down"><i class="material-icons">arrow_forward_ios</i></a>
        <!--Fin sidenav marron et début des cartes-->
        <div class="row">
          <div class="col s12 m3">
            <div class="card">
              <div class="card-image">
                <img src="/assolaface/photos/brand_pictures/zig-zag_1.jpg">
                <span class="card-title orange-text"><b>Zig-Zag Coiffure</b></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">chevron_right</i></a>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m3">
            <div class="card">
              <div class="card-image">
                <img src="/assolaface/photos/brand_pictures/symbiose_1.jpg">
                <span class="card-title orange-text"><b>Symbiose Coiffure</b></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">chevron_right</i></a>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include 'modal/footer.php'; ?>
