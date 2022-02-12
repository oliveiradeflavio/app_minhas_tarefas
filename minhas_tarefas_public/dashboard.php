<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: login.php?login=2');
}
$acao = 'contagem';
require 'tarefa_controller.php';
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
    <title>Minhas Tarefas - Dashboard</title>
</head>

<body>

    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Tarefas Concluídas
                </div>
                <div class="card-body">
                    <h5 class="contagemNumerosTarefas" id="tarefasConcluidas">
                        <?php
                        echo $tarefasConcluidas;
                        ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Tarefas Pendentes
                </div>
                <div class="card-body">
                    <h5 class="contagemNumerosTarefas" id="tarefasPendentes">
                        <?php
                        echo $tarefasPendentes;
                        ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>