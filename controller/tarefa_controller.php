<?php
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    require "../model/tarefa.model.php";
    require "../model/tarefa.service.php";
    require "conexao.php";
    require_once 'usuarios.php';

    $u = new Usuario;
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


    if($acao == 'inserir' ){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header('location: nova_tarefa.php?inclusao=1');
    } else if ($acao == 'recuperar'){
 
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    } else if ($acao == 'atualizar'){
        
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id'])
            ->__set('tarefa', $_POST['tarefa']);//so é possivel isso, pq o metodo set retornou this
    
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->atualizar()) {
            if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('location: index.php');
            } else {
                header('location: todas_tarefas.php');
            }
        }
        
    } else if($acao == 'remover'){

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();

        if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('location: index.php');
            } else {
                header('location: todas_tarefas.php');
            }

    } else if($acao == 'marcarRealizada') {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();

        if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('location: index.php');
            } else {
                header('location: todas_tarefas.php');
            }

    } else if($acao == 'recuperarTarefasPendentes'){

        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarTarefasPendentes();

    } else if($acao == 'login'){
    
    
        $nome = addslashes($_POST['NOME']);
        $senha = addslashes($_POST['SENHA']);
        //verificar se esta preenchido
        if (!empty($nome) && !empty($senha) ) 
        {
            $u->conectar("database","localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($nome,$senha))
                {
                    header("location: index.php");
                }
                else 
                {
                    header("location: login.php");
                    echo "Nome e/ou senha estão incorretos!";    
                }
            }
            else
            {
                header("location: login.php");
                echo "Erro: ".$u->msgErro;    
            }

        }else
        {
            header("location: login.php");
            echo "Preencha todos os campos!";
        }

    }else if($acao == 'cadastrar'){

    $nome = addslashes($_POST['NOME']);
    $senha = addslashes($_POST['SENHA']);
    $confsenha = addslashes($_POST['CONFSENHA']);
    //verificar se esta preenchido
    if (!empty($nome) && !empty($senha) && !empty($confsenha)) 
    {
      $u->conectar("database","localhost","root","");
       if ($u->msgErro =="") 
       {

            if($senha == $confsenha)
            {

                if($u->cadastrar($nome,$senha))
                {
                    header("location: cadastrarUsuario.php?acao=cadastrado");
                }
                else
                {
                    header("location: cadastrarUsuario.php?acao=jatemcadastro");
                }

            }
            else 
            {
                    header("location: cadastrarUsuario.php?acao=erroform");
            }
       }

    }
}

?>