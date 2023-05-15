<header class="header" id="header">
    <div class="header_toggle btn-menu" id="btn-menu">
        <img class='bx bx-menu' id="header-toggle" src="assets/img/icon-menu.svg" alt="">
    </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="controle_postagens.php" class="nav_logo">
                <span class="nav_logo-name">
                    <img class="logo" src="assets/img/logo_footer.svg" style="width: 40px;" alt="">
                </span>
            </a>
            <div class="nav_list">
                <a href="controle_postagens.php" class="nav_link active">
                    <span class="nav_name"> <img src="assets/img/icon-post.svg" alt=""> Postagens</span>
                </a>
                <?php if($_SESSION['tipo_usuario'] == 'adm'){ ?>
                <a href="controle_usuarios.php" class="nav_link">
                    <span class="nav_name"> <img src="assets/img/icon-user.svg" alt=""> Usuários</span>
                </a>
                <a href="controle_comentarios.php" class="nav_link">
                    <span class="nav_name"> <img src="assets/img/icon-coment.svg" alt=""> Comentários</span>
                </a>
                <?php } ?>
            </div>
        </div>
        <a href="logout.php" class="nav_link">
            <span class="nav_name"> <img src="assets/img/icon-logout.svg" alt=""> Logout</span>
        </a>
    </nav>
</div>