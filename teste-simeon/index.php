<?php
include_once "assets/functions/conexao.php";

session_start();

if (isset($_SESSION['idUsuario'])) {
    if ($_SESSION['tipo_usuario'] == 'adm') {
        header("Location:controle.php?num1=$num");
    } else {
        header("Location:inicio.php?num1=$num");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<?php include_once "assets/comuns/head.php" ?>

<body>
    <?php include_once "assets/comuns/navbar.php" ?>
    <?php include_once "assets/comuns/menu.php" ?>
    <div class="conteudo">
        <div class="row postagem">
            <h2 class="center">Nosso Blog.</h2>
            <h4 class="center cor-secundaria">Conteúdos relevantes para impulsionar sua gestão estratégica</h4>
            <div class="col-sm-8 order-1 padding">
                <div class="row sessions postagens">
                    <div class="col-sm-5">
                        <img src="assets/img/posts/post1.png" alt="" class="images-post">
                    </div>
                    <div class="col-sm-7 text-postagem">
                        <h4>Pesquisa de Satisfação: quando aplicá-la?</h4>
                        <p>A Pesquisa de Satisfação é uma ótima ferramenta para medir e entender como o cliente considera...</p>
                        <button class="veja-mais">VEJA MAIS</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 order-12 padding">
                <div class="sessions padding">
                    <form class="form-inline">
                        <h4>Busque seu conteúdo</h4>
                        <label>
                            <input class="form-control mr-sm-2 search" type="search" placeholder="digite e busque" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 btn-search" type="submit">
                                BUSCAR
                            </button>
                        </label>
                    </form>
                </div>
            </div>
            <div class="col-sm-8 order-1 padding">
                <div class="row sessions postagens">
                    <div class="col-sm-5">
                        <img src="assets/img/posts/post1.png" alt="" class="images-post">
                    </div>
                    <div class="col-sm-7 text-postagem">
                        <h4>Pesquisa de Satisfação: quando aplicá-la?</h4>
                        <p>A Pesquisa de Satisfação é uma ótima ferramenta para medir e entender como o cliente considera estar sendo o relacionamento com você. Te dá a oportunidade de recolher...</p>
                        <button class="veja-mais">VEJA MAIS</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 order-1 padding">
                <div class="row sessions postagens">
                    <div class="col-sm-5">
                        <img src="assets/img/posts/post1.png" alt="" class="images-post">
                    </div>
                    <div class="col-sm-7 text-postagem">
                        <h4>Pesquisa de Satisfação: quando aplicá-la?</h4>
                        <p>A Pesquisa de Satisfação é uma ótima ferramenta para medir e entender como o cliente considera estar sendo o relacionamento com você. Te dá a oportunidade de recolher...</p>
                        <button class="veja-mais">VEJA MAIS</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 order-1 padding">
                <div class="row sessions postagens">
                    <div class="col-sm-5">
                        <img src="assets/img/posts/post1.png" alt="" class="images-post">
                    </div>
                    <div class="col-sm-7 text-postagem">
                        <h4>Pesquisa de Satisfação: quando aplicá-la?</h4>
                        <p>A Pesquisa de Satisfação é uma ótima ferramenta para medir e entender como o cliente considera estar sendo o relacionamento com você. Te dá a oportunidade de recolher...</p>
                        <button class="veja-mais">VEJA MAIS</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 order-1 padding">
                <div class="row sessions postagens">
                    <div class="col-sm-5">
                        <img src="assets/img/posts/post1.png" alt="" class="images-post">
                    </div>
                    <div class="col-sm-7 text-postagem">
                        <h4>Pesquisa de Satisfação: quando aplicá-la?</h4>
                        <p>A Pesquisa de Satisfação é uma ótima ferramenta para medir e entender como o cliente considera estar sendo o relacionamento com você. Te dá a oportunidade de recolher...</p>
                        <button class="veja-mais">VEJA MAIS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "assets/comuns/footer.php" ?>
</body>

</html>