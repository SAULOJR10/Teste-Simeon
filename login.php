<?php
session_start();

if (isset($_SESSION['idUsuario'])) {
    if ($_SESSION['tipo_usuario'] == 'adm') {
        header("Location:controle_postagens.php");
    } else {
        header("Location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "assets/comuns/head.php" ?>

<body>
    <?php require_once "assets/comuns/navbar.php" ?>

    <div class="conteudo-login">
        <div class="login">
            <h2>Faça seu login ou cadastre-se</h2>
            <form onsubmit="event.preventDefault();">
                <label for="user">Usuário<input type="text" name="user" id="user" placeholder="Digite seu usuário" value=""></label>
                <label for="senha">Senha<input type="password" name="senha" id="senha" placeholder="Digite sua senha" value=""></label>
                <a href="recuperar.php">Esqueceu sua senha?</a>
                <input class="btn-login" onclick="login()" type="submit" value="Fazer Login">
            </form>
            <button class="btn-cadastro" onclick="window.location.href= 'cadastrar.php'">Cadastrar</button>
            <h3 class="divisor-login">_________ <span class="cor-secundaria">OU</span> _________</h3>
            <button class="login-gmail">FAÇA LOGIN COM GMAIL <img src="assets/img/icon-gmail.png" alt="" srcset=""></button>
        </div>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>