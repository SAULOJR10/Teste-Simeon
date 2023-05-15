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

<body id="body-pd" onload="comentarios()">
    <?php require_once "assets/comuns/navbar.php" ?>
    <?php require_once "assets/comuns/menu.php" ?>

    <div class="height-100">
        <div class="login" style="display: none;">
            <h2>Adicionar comentário</h2>
            <form action="">
                <label for="descricao">Comentário</label>
                <textarea name="descricao" id="descricao" placeholder="Descreva a postagem" rows="10"></textarea>
                <input class="btn-login" type="submit" value="Enviar">
            </form>
        </div>
        <table>
            <tr>
                <td>N°</td>
                <td>Descrição</td>
                <td>Data Inclusão</td>
                <td>Add Comentário</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
            <tbody id="comentarios">
            </tbody>
        </table>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>