<?php

 


   

Class Usuario {

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }

    }

        

    public function cadastrar($nome, $senha){

        global $pdo;

        //verificar se já existe o email cadastrado

        $sql = $pdo->prepare("SELECT id FROM tb_usuarios 
            WHERE nome = :n");
        $sql->bindValue(":n",$nome);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrado

        }
        else
        {
            //caso nao, Cadastrar
            $sql = $pdo->prepare("INSERT INTO tb_usuarios (nome, senha)
                VALUES (:n, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }

    }

    public function logar($nome, $senha)
    {
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim 
        $sql = $pdo->prepare("SELECT id FROM tb_usuarios WHERE
            nome = :n AND senha = :s");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                //entrar no sistema (sessão)
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id']= $dado['id'];
                return true;//logado com sucesso
            }
            else
            {
                return false;//nao foi possivel logar
            }

    }
    
    // public function inserir($tarefa, $descricao, $data_inicio, $data_termino){ //create
        
    //     // $query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
    //     // $stmt = $this->conexao->prepare($query);
    //     // $stmt->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
    //     // $stmt->execute();
        
    
    
    //     //caso nao, Cadastrar
    //     $sql = $tarefa->prepare("INSERT INTO tb_tarefas (tarefa, descricao, data_inicio, data_termino)
    //         VALUES (:t, :de, :di, :dt )");
    //     $sql->bindValue(":t", $tarefa);
    //     $sql->bindValue(":de", $descricao);
    //     $sql->bindValue(":di", $data_inicio);
    //     $sql->bindValue(":dt", $data_termino);
    //     $sql->execute();
    //     return true;
    


    // }

    }
?>