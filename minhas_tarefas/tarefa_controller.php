<?php

require "../minhas_tarefas/tarefa.model.php";
require "../minhas_tarefas/tarefa_service.php";
require "../minhas_tarefas/conexao.php";

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//capturar o parametro ação que esta sendo passado como parametro via GET
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if ($acao == 'inserir') {

        if($_POST['tarefa'] == '') {
            header('Location: index.php?inclusao=2'); //redicionando para a pagina index com parametro de 2, significando que não tem nada digitado
       
        } else {
            //salvando a data de modificação que no caso nesse momento é a data de criação da tarefa
            $data = new DateTime( 'now', new DateTimeZone('America/Sao_Paulo'));
            $data = $data->format('Y-m-d H:i:s');
            
            $tarefa = new Tarefa();
            $tarefa->__set('id_usuarios', $_SESSION['id_usuario'] );
            $tarefa->__set('tarefa', $_POST['tarefa']); //setando o valor do campo tarefa com o que estou recebendo via POST
            $tarefa->__set('data_modificado', $data); //setando o valor do campo data_modificado com a data atual

            $conexao = new Conexao(); //importando a classe conexao

            $tarefaService = new TarefaService($conexao, $tarefa); //importando a classe tarefa service e passando a conexao e a tarefa
            #print_r($tarefaService);
            $tarefaService->inserir(); //chamando o metodo inserir da classe tarefa service
            header('Location: index.php?inclusao=1'); //redirecionando para a pagina index.php
        }
     
    }else if($acao == 'recuperar'){
       $tarefa = new Tarefa();
       $conexao = new Conexao();

       $tarefa->__set('id_usuarios', $_SESSION['id_usuario']);
       $tarefa->__set('perfil_usuario', $_SESSION['perfil_usuario']);
       $tarefaService = new TarefaService($conexao, $tarefa);
       $tarefas = $tarefaService->recuperar();
    
    }else if($acao == 'atualizar'){
        $data = new DateTime( 'now', new DateTimeZone('America/Sao_Paulo'));
        $data = $data->format('Y-m-d H:i:s');

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id'])
               ->__set('tarefa', $_POST['tarefa']);
        $tarefa->__set('data_modificado', $data);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->atualizar();
       
        header('Location: index.php');
   
    }else if($acao == 'remover'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
       
        if (isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('Location: index.php');
        }else{
           header('Location: todas_tarefas.php');
        }
        
    
    }else if($acao == 'marcarRealizada'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();
       
        header('Location: index.php');
    
    }else if($acao == 'recuperaTarefasRealizadas'){ //recupera todas as tarefas (realizadas)
        $tarefa = new Tarefa();
        $tarefa->__set('id_usuarios', $_SESSION['id_usuario']);
        $tarefa->__set('perfil_usuario', $_SESSION['perfil_usuario']);
        $tarefa->__set('id_status', 2); //tarefa realizada
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarTarefasRealizadas();
        
        if(isset($_GET['pag']) && $_GET['pag'] == 'todas_tarefas'){
            header('Location: index.php');
        }

    }else if($acao == 'contagem'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefa->__set('id_usuarios', $_SESSION['id_usuario']);
        $tarefa->__set('perfil_usuario', $_SESSION['perfil_usuario']);
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefasPendentes = $tarefaService->totalPendentes();
        $tarefasConcluidas = $tarefaService->totalConcluidos();
    }
