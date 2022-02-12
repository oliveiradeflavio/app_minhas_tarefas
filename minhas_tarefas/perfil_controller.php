<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    require "../minhas_tarefas/conexao.php";
    require "../minhas_tarefas/perfil_model.php";
    require "../minhas_tarefas/perfil_service.php";

    $perfil  = new Perfil();
    $conexao = new Conexao();
    $perfil->__set('usuario', $_SESSION['usuario']);
    $perfilService = new PerfilService($conexao, $perfil);
    $perfis = $perfilService->recuperar();


?>