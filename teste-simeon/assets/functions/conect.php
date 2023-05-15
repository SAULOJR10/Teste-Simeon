<?php

class ConexaoCard {

    private $con;

    public function __construct() {
        $this->getInstance();
    }

    private function getInstance() {
        try {
            $xh = "localhost";
            $xu = "root";
            $xp = "MrLiP@5";
            $xb = "simeon";

            $this->con = new PDO("mysql:host=$xh;port= 3306;dbname=$xb", $xu, $xp, array(PDO::ATTR_TIMEOUT => "15", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $this->con->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        } catch (PDOException $Exception) {
            $this->gravarLogErro("Erro CON. SIMEONTW-" . $Exception->getMessage());
            $this->con = false;
        }
    }

    public function isConnect() {
        if ($this->con) {
            return true;
        } else {
            return false;
        }
    }

    public function execQuerry($sql) {
        if ($this->con) {
            $p_sql = $this->con->prepare($sql);
            $p_sql->execute();

            try {
                return $p_sql->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                $this->gravarLogErro("ERR_CONEXAO_SERV - $sql ");
                return false;
            }
        } else {
            return false;
        }
    }

    public function execProcedure($sql, $parametos) {
        $p_sql = $this->con->prepare($sql);
        foreach ($parametos AS $column => $value) {
            $p_sql->bindValue($column, $value);
        }
        $p_sql->execute();
        $res = $p_sql->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function fecharConexao() {
        $this->con = NULL;
    }

    private function gravarLogErro($mensagem) {
        $dia = date('d/m/Y H:i:s');
        $file = fopen("Sistema_arErros.txt", 'a');
        fwrite($file, $dia . "-" . $mensagem . "\n");
        fclose($file);
    }

}
