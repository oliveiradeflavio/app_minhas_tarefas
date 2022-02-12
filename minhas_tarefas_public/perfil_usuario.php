<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: login.php?login=2');
}

require 'perfil_controller.php';
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


    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- css personalizado -->
    <link rel="stylesheet" href="css/estilo.css">

    <!-- favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <!--scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/paginas_controller.js"></script>
    <title>Minhas Tarefas - Perfil Usuário</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="container" style="padding-top: 60px;">


                    <h1 class="page-header">Editar Perfil</h1>
                    <div class="row">
                        <?php

                        foreach ($perfis as $indice => $perfil) {
                        }
                        ?>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="text-center">
                                <img src="../minhas_tarefas/fotos/<?= $perfil->foto ?>" width="100" height="100" class="img-circulo ">
                                <input type="file" class="text-center center-block well well-sm">
                            </div>
                        </div>

                        <!-- edit form column -->
                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                            <h3>Informações Pessoais</h3>
                            <form class="form-horizontal" role="form" action="" method="post" id="tab">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nome:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="<?= utf8_encode($perfil->nome) ?>" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="<?= $perfil->email ?>" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="<?= $perfil->usuario ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="******" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirmar password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="******" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input class="btn btn-primary" value="Salvar" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">
                                        <span></span>
                                        <input class="btn btn-danger" value="Cancelar" type="reset">
                                    </div>
                                </div>

                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="alertaMensagemPerfil">Atenção</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Opção desabilitada nesta versão de teste.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<!-- jquery / Javascript-->
<script src="js/minhas_tarefas.js"></script>

</html>