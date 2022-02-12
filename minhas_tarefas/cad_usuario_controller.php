<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    require "../minhas_tarefas/conexao.php";
    require "../minhas_tarefas/cad_usuario_model.php";
    require "../minhas_tarefas/cad_usuario_service.php";

    $acao = $_GET['acao'];
    #print_r($acao);
  
    if ($acao == 'remover'){
        $id = $_GET['id'];
        $conexao = new Conexao();
        $usuario = new CadastroUsuario();
        $usuario->__set('id', $id);
        $usuarioService = new CadastroUsuarioService($conexao, $usuario);
        $usuarioService->remover();
        header('Location: index.php?remover=ok');
    }
    if ($acao == 'editar'){
        $conexao = new Conexao();
        $usuario = new CadastroUsuario();
        $usuario->__set('id', $_GET['id']);
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('usuario', $_POST['username']);
        $usuario->__set('senha', $_POST['senha']);

        $usuarioService = new CadastroUsuarioService($conexao, $usuario);
        $usuarioService->editarUsuario();
        header('Location: index.php?editar=ok');
    }
    else {

    $foto = $_FILES['foto'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $senha = md5($_POST['senha']);
    // $novasenha = $_POST['nome'];
 
    
    // print_r($nome . "<br>". $email ."<br>".  $username . "<br>" . $senha);
    if($nome == '' || $email == '' || $username == '' || $senha == '')
    {
        header('Location: index.php?cadastro=2');
    }
    else
    {

        if(empty($foto['name']))
        {
            $novo_nome = "avatar_padrao.png";
        }
        else{

            $tamanho = 2048;
            $error = array();
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso não é uma imagem.";
                }
            if(count($error) == 0){
    
            $extensao = strtolower(substr($foto['name'], -4));
            $novo_nome = md5(time()) . $extensao;
            $diretorio = "../minhas_tarefas/fotos/";
            move_uploaded_file($foto['tmp_name'], $diretorio.$novo_nome);
            }
       
        } 
        $cad_usuario = new CadastroUsuario();
        $conexao = new Conexao();
        $cad_usuario->__set('nome', $nome);
        $cad_usuario->__set('email', $email);
        $cad_usuario->__set('usuario', $username);
        $cad_usuario->__set('senha', $senha);
        $cad_usuario->__set('foto', $novo_nome);
        $cad_usuarioService = new CadastroUsuarioService($conexao, $cad_usuario);
        $cad_usuarioService->inserir();
        header('Location: index.php?cadastro=1');
    }
  
}



?>