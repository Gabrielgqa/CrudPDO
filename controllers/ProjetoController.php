<?php
	require_once('../config/config.php');
	require_once('../models/Projeto.php');
    $action = $_REQUEST['action'];

    switch ($action) {
        case 'create':
            if (isset($_REQUEST)) {
                $user = new Projeto($_REQUEST);
                if ($user->insert($pdo)) {
                    session_start();
                    $_SESSION['message'] = "Projeto criado com sucesso!";
                    header('Location: ../views/setor/listar.php');
                }
            }
        break;

        case 'update':
            if (isset($_REQUEST)) {
                $user = new Projeto($_REQUEST);
                if ($user->update($_REQUEST['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Projeto atualizado com sucesso!";
                    header('Location: ../views/setor/listar.php');
                }
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Projeto::delete($_GET['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Projeto deletado com sucesso!";
                    header('Location: ../views/setor/listar.php');
                }
            }
        break;
        default:
            header('Location: ../views/setor/listar.php');
        break;
    }
?>
