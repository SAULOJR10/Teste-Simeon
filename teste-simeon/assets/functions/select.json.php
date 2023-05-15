<?php
require_once 'conect.php';
$conect = new Conexao;

if (isset($_POST['acao'])) {
    $acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
    switch ($acao) {
        case "login":
            $select = new Select();
            $select->login();
            break;
        case "postagens":
            $select = new Select();
            $select->postagens();
            break;
        case "usuarios":
            $select = new Select();
            $select->usuarios();
            break;
        case "comentarios":
            $select = new Select();
            $select->comentarios();
            break;
        case "postagens_inicial":
            $select = new Select();
            $select->postagens_inicial();
            break;
    }
}

class Select
{
    function login()
    {
        global $conect;
        $login = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM `usuarios` WHERE email = '$login' AND senha = '$senha'";
        $query = $conect->execQuerry($sql);
        $conect->fecharConexao();
        if ($query != null) {
            session_start();
            $_SESSION['login'] = $query[0]['email'];
            $_SESSION['idUsuario'] = $query[0]['id'];
            $_SESSION['tipo_usuario'] = $query[0]['tipo_usuario'];
            if ($query[0]["tipo_usuario"] == "adm") {
                $controle = "adm";
            } else {
                $controle = "user";
            }
            echo json_encode($controle);
            return true;
        } else {
            echo json_encode("E-mail ou senha incorretos, verifique se digitou corretamente e tente novamente!");
            return false;
        }
    }

    function postagens()
    {
        global $conect;
        $sql = "SELECT * FROM `posts`";
        $query = $conect->execQuerry($sql);
        $conect->fecharConexao();
        if ($query != null) {
            $conteudo = "";
            $num = 1;
            foreach ($query as $result) {
                $titulo = $result["titulo"];
                $data = $result["data_inclusao"];
                $conteudo .=
                    "<tr>
                    <td>$num</td>
                    <td>$titulo</td>
                    <td>$data</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>";
                $num++;
            }
            echo json_encode($conteudo);
            return true;
        } else {
            echo json_encode("<tr><td colspan='5'><center><span style='color: red; padding: 20px;'>Ainda não há nenhuma Postagem cadastrado!</span></center>");
            return false;
        }
    }

    function usuarios()
    {
        global $conect;
        $sql = "SELECT * FROM `usuarios` WHERE tipo_usuario = 'user'";
        $query = $conect->execQuerry($sql);
        $conect->fecharConexao();
        if ($query != null) {
            $conteudo = "";
            $num = 1;
            foreach ($query as $result) {
                $nome = $result["nome"];
                $data = $result["data_inclusao"];
                $conteudo .=
                    "<tr>
                    <td>$num</td>
                    <td>$nome</td>
                    <td>$data</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>";
                $num++;
            }
            echo json_encode($conteudo);
            return true;
        } else {
            echo json_encode("<tr><td colspan='5'><center><span style='color: red; padding: 20px;'>Ainda não há nenhuma usuário cadastrado!</span></center>");
            return false;
        }
    }

    function comentarios()
    {
        global $conect;
        $sql = "SELECT * FROM `comentarios`";
        $query = $conect->execQuerry($sql);
        $conect->fecharConexao();
        if ($query != null) {
            $conteudo = "";
            $num = 1;
            foreach ($query as $result) {
                $descricao = $result["descricao"];
                $data = $result["data_inclusao"];
                $conteudo .=
                    "<tr>
                    <td>$num</td>
                    <td>$descricao</td>
                    <td>$data</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>";
                $num++;
            }
            echo json_encode($conteudo);
            return true;
        } else {
            echo json_encode("<tr><td colspan='6'><center><span style='color: red; padding: 20px;'>Ainda não há nenhuma comentário cadastrado!</span></center>");
            return false;
        }
    }

    function postagens_inicial()
    {
        global $conect;
        $sql = "SELECT * FROM `posts`";
        $query = $conect->execQuerry($sql);
        $conect->fecharConexao();
        if ($query != null) {
            $conteudo = "
            <h2 class='center'>Nosso Blog.</h2>
            <h4 class='center cor-secundaria'>Conteúdos relevantes para impulsionar sua gestão estratégica</h4>";
            $num = 1;
            foreach ($query as $result) {
                $titulo = $result["titulo"];
                $descricao = substr($result["descricao"], -80);
                $conteudo .=
                    " <div class='col-sm-8 order-1 padding'>
                        <div class='row sessions postagens'>
                            <div class='col-sm-5'>
                                <img src='assets/img/posts/post1.png' alt='' class='images-post'>
                            </div>
                            <div class='col-sm-7 text-postagem'>
                                <h4>$titulo</h4>
                                <p>$descricao</p>
                                <button class='veja-mais'>VEJA MAIS</button>
                            </div>
                        </div>
                    </div>";

                if ($num == 1) {
                    $conteudo .= "
                    <div class='col-sm-4 order-12 padding'>
                        <div class='sessions padding'>
                            <form class='form-inline'>
                                <h4>Busque seu conteúdo</h4>
                                <label>
                                    <input class='form-control mr-sm-2 search' type='search' placeholder='digite e busque' aria-label='Search'>
                                    <button class='btn btn-outline-success my-2 my-sm-0 btn-search' type='submit'>
                                        BUSCAR
                                    </button>
                                </label>
                            </form>
                        </div>
                    </div>";
                }
                $num++;
            }
            echo json_encode($conteudo);
            return true;
        } else {
            echo json_encode("<tr><td colspan='6'><center><span style='color: red; padding: 20px;'>Ainda não há nenhuma comentário cadastrado!</span></center>");
            return false;
        }
    }
}
