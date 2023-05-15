<?php
include_once "assets/functions/conexao.php";

session_start();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "assets/comuns/head.php" ?>

<body id="body-pd" onload="postagens()">
    <?php require_once "assets/comuns/navbar.php" ?>
    <?php require_once "assets/comuns/menu.php" ?>

    <div class="height-100">
        <div class="login">
            <h2>Cadastrar postagem</h2>
            <form action="">
                <label for="titulo">Titulo<input type="text" name="titulo" id="titulo" placeholder="Digite um titulo para a postagem"></label>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" placeholder="Descreva a postagem" rows="10"></textarea>
                <input class="btn-login" type="submit" value="Enviar">
            </form>
        </div>
        <table>
            <tr>
                <td>N°</td>
                <td>Titulo</td>
                <td>Data Inclusão</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
            <tbody id="postagens">
            </tbody>
        </table>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>