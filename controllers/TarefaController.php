<?php
    require_once('../config/config.php');
    require_once('../models/Tarefa.php');
    $action = $_REQUEST['action'];

    switch ($action) {
        case 'create':
            if (isset($_REQUEST)) {
                $tarefa = new Tarefa($_REQUEST);
                if ($tarefa->insert($pdo)) {
                    session_start();
                    $_SESSION['message'] = "Tarefa criada com sucesso!";
                    header('Location: ../views/tarefa/listar.php');
                }
            }
        break;

        case 'update':
            if (isset($_REQUEST)) {
                $tarefa = new Tarefa($_REQUEST);
                if ($tarefa->update($_REQUEST['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Tarefa atualizada com sucesso!";
                    header('Location: ../views/tarefa/listar.php');
                }
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Tarefa::delete($_GET['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Tarefa deletada com sucesso!";
                    header('Location: ../views/tarefa/listar.php');
                }
            }
        break;
        default:
            header('Location: ../views/tarefa/listar.php');
        break;
    }
?>
