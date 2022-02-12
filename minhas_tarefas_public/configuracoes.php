<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: login.php?login=2');
}
require "../minhas_tarefas/conexao.php";
require "../minhas_tarefas/cad_usuario_model.php";
require "../minhas_tarefas/cad_usuario_service.php";

$cad_usuario = new CadastroUsuario();
$conexao = new Conexao();
$cad_usuarioService = new CadastroUsuarioService($conexao, $cad_usuario);
$cad_usuarios = $cad_usuarioService->recuperar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- cdn swetalert1 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- css personalizado -->
    <link rel="stylesheet" href="css/estilo.css">

    <!-- favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <!--scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/paginas_controller.js"></script>
    <title>Minhas Tarefas - Novo Usuário</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="container">

                    <h4 class="page-header mb-5 mt-5">Cadastro Usuários</h4>
                    <div class="row">


                        <!-- edit form column -->
                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                            <form class="form-horizontal" role="form" action="cad_usuario_controller.php" method="post" enctype="multipart/form-data" name='form_usuario' id='form_usuario'>
                                <div class="form-group mb-3">
                                    Foto de exibição: <br>
                                    <input type="file" name='foto' class="text-center center-block well well-sm">
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nome:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="" name='nome' type="text" id="nome" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="" name='email' type="text" id="email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="" name='username' type="text" id="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="" name='senha' type="password" id="senha" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-md-3 control-label">Confirmar password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value='' name='novasenha' type="password" required>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input class="btn btn-primary" value="Salvar" type="submit">
                                        <span></span>
                                        <input class="btn btn-danger" value="Cancelar" type="reset">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>



                    <h4 class="page-header mb-5 mt-5">Usuários Cadastrados</h4>

                    <table class="table table-borderles table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cad_usuarios as $indice => $usuario) { ?>
                                <tr>
                                    <td><?= utf8_encode($usuario->nome) ?></td>
                                    <td><?= $usuario->email ?></td>
                                    <td>
                                        <i class="text-info far fa-edit" onclick="editarUsuario(<?= $usuario->id ?>, '<?= $usuario->nome ?>', '<?= $usuario->email ?>', '<?= $usuario->usuario ?>', '<?= $usuario->senha ?>')"></i>
                                        <i class="text-danger far fa-times-circle" onclick="removerUsuario(<?= $usuario->id ?>)"></i>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


</body>
<!-- jquery / Javascript-->
<script>
    function removerUsuario(id) {
        swal({
                title: "Tem certeza?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Usuário removido com sucesso!", {
                        icon: "success",
                    });
                    window.location.href = "cad_usuario_controller.php?acao=remover&id=" + id;
                } else {
                    swal("Operação cancelada!");
                }
            });
    }

    function editarUsuario(id, nome, email, username, senha) {

        $("#nome").val(nome);
        $("#email").val(email);
        $("#id").val(id);
        $("#username").val(username);
        $("#senha").val(senha);
        // $("#novasenha").val(novasenha);
        // $("#foto").val(foto);
        $("#form_usuario").attr("action", "cad_usuario_controller.php?acao=editar&id=" + id);
    }
</script>

</html>