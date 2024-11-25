<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Rétrogaming</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Consoles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publishCommentaire.php">Publier un commentaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mesCommentaires.php">Mes Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Les Commentaires</a>
        </li>
        <?php 
          if(isset($_SESSION['auth'])){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
            </li>
            <?php
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>