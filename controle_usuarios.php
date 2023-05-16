<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "assets/comuns/head.php" ?>

<body id="body-pd" onload="usuarios()">
    <?php require_once "assets/comuns/navbar.php" ?>
    <?php require_once "assets/comuns/menu.php" ?>

    <div class="height-100">
        <table>
            <tr>
                <td>N°</td>
                <td>Nome</td>
                <td>Data Inclusão</td>
                <td>Tipo de usuário</td>
            </tr>
            <tbody id="usuarios">
            </tbody>
        </table>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>