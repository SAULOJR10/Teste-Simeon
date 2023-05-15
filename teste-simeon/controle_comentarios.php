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

<body id="body-pd">
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
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Teste</td>
                    <td>15/05/2023</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>