<?php
	require_once('../config/config.php');
	require_once('../models/Cliente.php');
    $action = $_REQUEST['action'];
    session_start();

    switch ($action) {
        case 'create':
            if (isset($_REQUEST)) {
                $cliente = new Cliente($_REQUEST);
                if ($cliente->insert($pdo)) {
                    session_start();
                    $_SESSION['message'] = "Cliente criado com sucesso!";
                    header('Location: ../views/cliente/listar.php');
                }
            }
        break;

        case 'update':
            if (isset($_REQUEST)) {
                $cliente = new Cliente($_REQUEST);
                if ($cliente->update($_REQUEST['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Cliente atualizado com sucesso!";
                    header('Location: ../views/cliente/listar.php');
                }
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Cliente::delete($_GET['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Cliente deletado com sucesso!";
                    header('Location: ../views/cliente/listar.php');
                }
            }
        break;
        default:
            header('Location: ../views/projeto/listar.php');
        break;
    }
?>
