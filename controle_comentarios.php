<?php
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
        <div class="login">
            <h2>Adicionar comentário</h2>
            <form onsubmit="event.preventDefault();">
                <label for="descricao">Comentário</label>
                <textarea name="descricao" id="descricao" placeholder="Descreva a postagem" rows="10"></textarea>
                <label for="select_posts">Selecione o post</label>
                <select name="id_post" id="select_posts">
                </select>
                <input class="btn-login" type="submit" value="Enviar" onclick="cad_comentarios()">
            </form>
        </div>
        <table>
            <tr>
                <td>N°</td>
                <td>Post</td>
                <td>Comentário</td>
                <td>Data Inclusão</td>
                <td>Usuário</td>
            </tr>
            <tbody id="comentarios">
            </tbody>
        </table>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>