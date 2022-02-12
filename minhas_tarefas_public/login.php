<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- css personalizado -->
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
</head>

<body>

    <div class="centralizar">
        <div id="conteudoForm">

            <form action="login_controller.php" method="POST">
                <input type="text" id="login_usuario" name="login_usuario" placeholder="usuário">
                <input type="password" id="login_password" name="login_password" placeholder="senha">
                <input type="submit" value="Logar">

                <?php

                if (isset($_GET['login']) && $_GET['login'] == '1') {

                ?>
                    <div class="text-danger">
                        Usuário ou senha incorretos!

                    <?php } ?>
                    <?php

                    if (isset($_GET['login']) && $_GET['login'] == '2') {

                    ?>
                        <div class="text-danger">
                            Autentique-se para acessar o sistema!

                        <?php } ?>
            </form>
        </div>
    </div>
    </div>
</body>

</html>