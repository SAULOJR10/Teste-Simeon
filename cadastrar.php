<!DOCTYPE html>
<html lang="en">
<?php require_once "assets/comuns/head.php" ?>

<body>
    <?php require_once "assets/comuns/navbar.php" ?>

    <div class="conteudo-login">
        <div class="login">
            <h2>Faça seu login ou cadastre-se</h2>
            <form onsubmit="event.preventDefault();">
                <label for="nome">Nome<input type="text" name="nome" id="nome" placeholder="Digite seu usuário"></label>
                <label for="e_mail">E-mail<input type="text" name="e_mail" id="e_mail" placeholder="Digite sua e-mail"></label>
                <label for="senha">Senha<input type="password" name="senha" id="senha" placeholder="Digite sua senha"></label>
                <label for="confirm-senha">Confirmar Senha<input type="password" name="confirm-senha" id="confirm-senha" placeholder="Digite sua senha novamente."></label>
                <input class="btn-login" type="submit" onclick="cad_usuario()" value="Cadastra-se">
            </form>
            <button class="btn-cadastro" onclick="window.location.href= 'login.php'">Já tenho login.</button>
        </div>
    </div>

    <?php require_once "assets/comuns/footer.php" ?>
</body>

</html>