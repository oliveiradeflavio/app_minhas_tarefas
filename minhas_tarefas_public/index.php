<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: login.php?login=2');
}
$acao = 'recuperar';
require 'tarefa_controller.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
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

    <title>Minhas Tarefas</title>
</head>

<body>

    <!-- menu -->
    <div class="nav-side-menu">

        <div class="brand">
            <img class="img-circulo-sidebar" src="../minhas_tarefas/fotos/<?php echo $_SESSION['foto_perfil'] ?>" alt="logo">

            <a href="#" id="perfil_usuario_logado">

                <?php if (isset($_SESSION['usuario'])) {
                    echo utf8_encode($_SESSION['usuario']);
                } ?>
            </a>
        </div>
        <i class="fa fa-bars fa-2x toggle-btn" data-bs-toggle="collapse" data-bs-target="#menu-content"></i>

        <div class="menu-list">

            <li>
                <a href="#" id="dashboard"><i class="fas fa-home sidebar-icon"></i>
                    Dashboard
                </a>
            </li>

            <ul id="menu-content" class="menu-content collapse out">
                <li data-bs-toggle="collapse" data-bs-target="#tarefas" class="collapsed">
                    <a href="#"><i class="fas fa-thumbtack sidebar-icon"></i>Minhas Tarefas <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
                </li>
                <ul class="sub-menu collapse" id="tarefas">
                    <li><a href="#" id="tarefas_realizadas"><i class="fa fa-angle-right"></i>Realizadas</a></li>
                    <li><a href="index.php" id="nova_tarefa"><i class="fa fa-angle-right"></i>Nova Tarefa</a></li>
                </ul>
                <?php
                if ($_SESSION['perfil_usuario'] == 1) { ?>
                    <li>
                        <a href="#" id="configuracoes"><i class="fa fa-tools sidebar-icon"></i> Configurações</a>
                    </li>
                <?php  } ?>

                <li>
                    <a href="#" id="sobre"><i class="fas fa-info-circle sidebar-icon"></i>Sobre</a>
                </li>
                <li>
                    <a href="logoff.php"><i class="fas fa-times-circle sidebar-icon"></i> Sair</a>
                </li>
            </ul>
        </div>
    </div>

    <?php
    if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>

        <div class="container ">
            <div class="row justify-content-center" id="alerta-mensagem">
                <div class="col-md-6 mt-4">
                    <div class="alert alert-success justify-content-center d-flex" role="alert">
                        Tarefa incluída com sucesso!
                    </div>
                </div>
            </div>
        </div>
    <?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 2) { ?>
        <div class="container ">
            <div class="row justify-content-center" id="alerta-mensagem">
                <div class="col-md-6 mt-4">
                    <div class="alert alert-info justify-content-center d-flex" role="alert">
                        Preencha o campo tarefa!
                    </div>
                </div>
            </div>
        </div>

    <?php } else if (isset($_GET['cadastro']) && $_GET['cadastro'] == 1) { ?>
        <div class="container ">
            <div class="row justify-content-center" id="alerta-mensagem">
                <div class="col-md-6 mt-4">
                    <div class="alert alert-success justify-content-center d-flex" role="alert">
                        Cadastro de usuário feito com sucesso!
                    </div>
                </div>
            </div>
        </div>

    <?php } else if (isset($_GET['cadastro']) && $_GET['cadastro'] == 2) { ?>
        <div class="container ">
            <div class="row justify-content-center" id="alerta-mensagem">
                <div class="col-md-6 mt-4">
                    <div class="alert alert-danger justify-content-center d-flex" role="alert">
                        Erro ao cadastrar novo usuário
                    </div>
                </div>
            </div>
        </div>

    <?php } else if (isset($_GET['remover']) && $_GET['remover'] == 'ok') { ?>
        <div class="container ">
            <div class="row justify-content-center" id="alerta-mensagem">
                <div class="col-md-6 mt-4">
                    <div class="alert alert-success justify-content-center d-flex" role="alert">
                        Usuário removido com sucesso
                    </div>
                </div>
            </div>
        </div>

    <?php } else if (isset($_GET['editar']) && $_GET['editar'] == 'ok') { ?>
        <div class="container ">
            <div class="row justify-content-center" id="alerta-mensagem">
                <div class="col-md-6 mt-4">
                    <div class="alert alert-success justify-content-center d-flex" role="alert">
                        Usuário alterado com sucesso
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <section class="main" id="busca">

        <div class="container align-self-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Nova Tarefa</h4>

                            <form method="post" action="tarefa_controller.php?acao=inserir" class="add-itens d-flex">
                                <input type="text" class="form-control" name="tarefa" placeholder="Adicione uma nova tarefa">
                                <button class="btn btn-primary font-weight-bold">ADICIONAR</button>
                            </form>

                            <?php foreach ($tarefas as $indice => $tarefa) { ?>

                                <div class="list-wrapper " name="<?= $tarefa->status ?>">
                                    <div class="row mb-3 d-flex align-items-center tarefas">
                                        <div class="col-sm-6" id="tarefa_<?= $tarefa->id ?>">
                                            <?= $tarefa->tarefa ?>
                                        </div>
                                        <div class="col-sm-6 mt-2 d-flex justify-content-center">
                                            <i class="icones far fa-times-circle" onclick="removerTarefa(<?= $tarefa->id ?>)"></i>
                                            <i class="icones far fa-edit" onclick="editarTarefa(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
                                            <i class="icones fas fa-check" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
                                            ( <?= $tarefa->status ?> )
                                            <?php
                                            if ($_SESSION['perfil_usuario'] == 1) {
                                            ?><span class="mx-2">criado por: <?= $tarefa->nome ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- jquery / Javascript-->
<script src="js/minhas_tarefas.js"></script>

</html>