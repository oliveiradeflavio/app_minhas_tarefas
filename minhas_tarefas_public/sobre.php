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

    <title>Minhas Tarefas - Sobre</title>
</head>

<body>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white">App Minhas Tarefas</span>

                        <div class='px-4 mt-3'>
                            <p class="fontes">App Minhas Tarefas foi desenvolvido com HTML, CSS, BOOTSTRAP, PHP, Javascript e MySQL.
                                <br>Adicione, edite, altere e exclua tarefas. Crie usuários com permissões administrativas ou padrões.
                            </p>
                        </div>
                        <div class="px-4 mt-5">
                            <p>Desenvolvido por Flávio Oliveira</p>

                            <ul class="social-list">
                                <li>
                                    <a href="https://www.linkedin.com/in/fladoliveira" target="_blank" class="fab fa-linkedin"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/oliveiradeflavio" target="_blank" class="fab fa-github"></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>
<!-- jquery / Javascript-->
<script src="js/minhas_tarefas.js"></script>

</html>