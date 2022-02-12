<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: login.php?login=2');
}

$acao = 'recuperaTarefasRealizadas';
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
    <link rel="stylesheet" href="css/estilo_todas_tarefas.css">

    <!-- favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <script>
        //excluir tarefa
        function removerTarefa(id) {
            location.href = "todas_tarefas.php?pag=todas_tarefas&acao=remover&id=" + id
        }
    </script>

    <title>Minhas Tarefas - Todas Tarefas</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Tarefas Realizadas</h4>


                            <?php foreach ($tarefas as $indice => $tarefa) { ?>

                                <div class="list-wrapper " name="<?= $tarefa->status ?>">
                                    <div class="row mb-3 d-flex align-items-center tarefas">
                                        <div class="col-sm-7" id="tarefa_<?= $tarefa->id ?>">
                                            <?= $tarefa->tarefa ?>
                                        </div>
                                        <div class="col-sm-5 mt-2">
                                            <!-- <i class="icones far fa-times-circle " onclick="removerTarefa(<?= $tarefa->id ?>)"></i> -->
                                            <i class="fw-bold"><?= $tarefa->status ?> em <?= $data_brasil = date('d/m/Y H:i:s', strtotime($tarefa->data_modificado)); ?>
                                                <?php

                                                if ($_SESSION['perfil_usuario'] == 1) {
                                                ?><span>por: <?= $tarefa->nome ?></span>
                                                <?php
                                                }

                                                ?>

                                            </i>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>