<?php include 'head.php'; ?>
  <body>
    <div class="header">
      <nav>
        <div class="nav-wrapper blue lighten-2">
          <a href="/index.php"><img class="brand-logo" src="/pictures/head_only.png" alt="face-logo"></img></a>
          <a href="#" class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
          <a href="/index.php" class="brand-logo center hide-on-med-and-down">
            <img class="brand-name-image" src="/pictures/text_only.png" alt="text-logo"></img>
          </a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/user/page/members_view.php">Adhérents &nbsp;&nbsp;&nbsp;<span class="material-icons">people</span></a></li>
            <li><a href="/user/page/events_view.php">Evénements à venir &nbsp;&nbsp;&nbsp;<span class="material-icons">date_range</span></a></li>
          </ul>
        </div>
      </nav>
      <ul class="sidenav" id="mobile-links">
        <li><a href="/index.php"><i class="material-icons">home</i>Accueil</a></li>
        <li><a href="/user/page/members_view.php"><i class="material-icons">people</i>Membres</a></li>
        <li><a href="/user/page/events_view.php"><i class="material-icons">date_range</i>Calendrier</a></li>
        <li><a href="/user/page/event-history_view.php"><i class="material-icons">import_contacts</i>Historique Evénementiel</a></li>
        <li><a href="/admin/login.php"><i class="material-icons">account_circle</i>Connexion - Gestion</a></li>
      </ul>
    </div>
