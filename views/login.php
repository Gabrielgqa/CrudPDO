<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header('location: ../views/setor/listar.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Tarefas</title>

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/style.css">

</head>

<body style="background: #eee url(../assets/img/back-login.jpg)";>
    <div class="container">
        <div class="login-container" style="margin-top: 200px;">
                <div id="output"></div>
                <h1>Acesso</h1>
                <div class="form-box">
                    <form role="form" method="POST" action="../controllers/SessionController.php">
                        <input placeholder="Email" name="email" type="email">
                        <input placeholder="Senha" name="password" type="password">
                        <input type="hidden" class="form-control" id="action" name="action" value="create">
                        <input type="submit"  class="btn btn-info btn-block login" value="Entrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
