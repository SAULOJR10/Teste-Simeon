<?php
include_once "assets/functions/conexao.php";

session_start();

if (isset($_POST['login']) && isset($_POST['senha'])) {
    $usr = $_POST['login'];
    $psw = $_POST['senha'];
    $sql1 = "select * from login where usuario = '$usr' and senha = '$psw'";
    $q1 =  mysqli_query($con, $sql1);
    $res = mysqli_fetch_assoc($q1);
    if ($psw == $res['senha']) {
        $num = rand(100000, 900000);
        $_SESSION['numLogin'] = $num;
        if ($res['status'] == true) {
            $_SESSION['idUsuario'] = $res['id'];
            $_SESSION['usuario'] = explode(' ', $res['usuario']);
            $_SESSION['arquivo'] = $res['imagem'];
            $_SESSION['tipo_usuario'] = $res['tipo_usuario'];
            if ($res['tipo_usuario'] == 'adm') {
                header("Location:controle.php?num1=$num");
            } else {
                header("Location:index.php?num1=$num");
            }
        }
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
            <form action="">
                <label for="user">Usuário<input type="text" name="user" id="user" placeholder="Digite seu usuário"></label>
                <label for="senha">Senha<input type="password" name="senha" id="senha" placeholder="Digite sua senha"></label>
                <a href="recuperar.php">Esqueceu sua senha?</a>
                <input class="btn-login" type="submit" value="Fazer Login">
            </form>
            <button class="btn-cadastro" onclick="window.location.href= 'cadastrar.php'">Cadastrar</button>
            <h3 class="divisor-login">_________ <span class="cor-secundaria">OU</span> _________</h3>
            <button class="login-gmail">FAÇA LOGIN COM GMAIL <img src="assets/img/icon-gmail.png" alt="" srcset=""></button>
        </div>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>