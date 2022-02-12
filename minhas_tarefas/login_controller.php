<?php

    session_start();

    require "../minhas_tarefas/conexao.php";
    require "../minhas_tarefas/login_model.php";
    require "../minhas_tarefas/login_service.php";

    $login_usuario = strtolower($_POST['login_usuario']);
    $login_password = md5($_POST['login_password']);
 
    $login = new Login();
    $conexao = new Conexao();
    $login->__set('usuario', $login_usuario);
    $login->__set('senha', $login_password);
    $loginService = new LoginService($conexao, $login);
    $logins = $loginService->recuperar();
    
    if(empty($logins)){
        header("Location: login.php?login=1");
    }

    foreach ($logins as $indice => $login) {
      
        if ($login->usuario == $login_usuario && $login->senha == $login_password) {
            $_SESSION['autenticado'] = 'SIM';
            $usuario_id = $login->id;
            $_SESSION['id_usuario'] = $usuario_id;
            $_SESSION['perfil_usuario'] = $login->perfil_usuario;
            $_SESSION['usuario'] = $login->nome;
            $_SESSION['foto_perfil'] = $login->foto;
            header('Location: index.php');
        }else{
            $_SESSION['autenticado'] = 'NAO';
            header("Location: login.php?login=1");
        }
    }

?>