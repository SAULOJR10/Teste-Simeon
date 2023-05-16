<?php
require_once 'conect.php';
$conect = new Conexao;

if (isset($_POST['acao'])) {
    $acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
    switch ($acao) {
        case "cad_usuario":
            $select = new Insert();
            $select->cad_usuario();
            break;
        case "cad_postagens":
            $select = new Insert();
            $select->cad_postagens();
            break;
    }
}

class Insert
{
    function cad_usuario()
    {
        global $conect;
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $e_mail = filter_input(INPUT_POST, 'e_mail', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $data = date("Y/m/d");
        $sql_teste_email = "SELECT * FROM `usuarios` WHERE email = '$e_mail'";
        $query_teste = $conect->execQuerry($sql_teste_email);
        if (!empty($query_teste)) {
            echo json_encode("E-mail já cadastrado");
            return false;
            exit;
        }
        $sql = "INSERT INTO `usuarios`(`nome`, `email`, `senha`, `data_inclusao`, `tipo_usuario`) VALUES ('$nome','$e_mail','$senha','$data','user')";
        if ($conect->execQuerry($sql)) {
            $conect->fecharConexao();
            return true;
        } else {
            echo json_encode("Erro ao cadastrar a o usurário, recarregue a página e tente novamente!");
            return false;
        }
    }

    function cad_postagens()
    {
        global $conect;
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        session_start();
        $id_user = $_SESSION['idUsuario'];
        $data = date("Y/m/d");
        $sql = "INSERT INTO `posts`(`titulo`, `descricao`, `id_usuario`, `data_inclusao`) VALUES ('$titulo','$descricao','$id_user','$data')";
        $conect->execQuerry($sql);
        $conect->fecharConexao();
        echo json_encode("Postagem cadastrada com sucesso!");
    }

    function cad_comentarios()
    {
        global $conect;
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $select_posts = filter_input(INPUT_POST, 'select_posts', FILTER_SANITIZE_STRING);
        session_start();
        $id_user = $_SESSION['idUsuario'];
        $data = date("Y/m/d");
        $sql = "INSERT INTO `comentarios`(`comentario`, `data_inclusao`, `id_usuario`, `id_post`) VALUES ('$descricao','$data','$id_user','$select_posts')";
        if ($conect->execQuerry($sql)) {
            $conect->fecharConexao();
            echo json_encode("Comentário cadastrada com sucesso!");
            return true;
        } else {
            echo json_encode("Erro ao cadastrar a o comentario, recarregue a página e tente novamente!");
            return false;
        }
    }
}
