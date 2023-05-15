<?php
include_once "assets/functions/conexao.php";

session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<?php include_once "assets/comuns/head.php" ?>

<body onload="postagens_inicial()">
    <?php include_once "assets/comuns/navbar.php" ?>
    <?php include_once "assets/comuns/menu.php" ?>
    <div class="conteudo">
        <div class="row postagem" id="postagens_inicial">
        </div>
    </div>
    <?php include_once "assets/comuns/footer.php" ?>
</body>

</html>