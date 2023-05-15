<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">
    <img class="logo" src="assets/img/logo.png" alt="">
  </a>
  <?php
  if (isset($_SESSION['idUsuario'])) {
  ?>
    <div class="div-login">
      <img src="assets/img/usuarios/user1.png" alt="" class="img-user">
      <p class="nome-user cor-secundaria"><?php echo $_SESSION['login'] ?></p>
    </div>
  <?php } else { ?>
    <div class="div-login">
      <img src="assets/img/usuarios/user1.png" alt="" class="img-user">
      <p onclick="window.location.href = 'login.php'" class="nome-user cor-secundaria">Faça Login</p>
    </div>
  <?php } ?>
</nav>