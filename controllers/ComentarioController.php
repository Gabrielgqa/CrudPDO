<?php
    require_once('../config/config.php');
    require_once('../models/Comentario.php');
    $action = $_REQUEST['action'];
    session_start();

    switch ($action) {
        case 'create':
            if (isset($_REQUEST)) {
                $_REQUEST['data'] = date("Y-m-d");
                $_REQUEST['id_usuario'] =$_SESSION['id'];
                $comentario = new Comentario($_REQUEST);
                if ($comentario->insert($pdo)) {
                    session_start();
                    header('Location: ../views/tarefa/listar.php');
                }
            }
        break;
    }
?>
