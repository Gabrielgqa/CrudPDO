<?php
	require_once('../config/config.php');
	require_once('../models/Usuario.php');
    $action = $_REQUEST['action'];

    switch ($action) {
        case 'create':
            if (isset($_REQUEST)) {
                $user = new Usuario($_REQUEST);
                if ($user->insert($pdo)) {
                    session_start();
                    $_SESSION['message'] = "Usuário criado com sucesso!";
                    header('Location: ../views/usuario/listar.php');
                }
            }
        break;

        case 'update':
            if (isset($_REQUEST)) {
                $user = new Usuario($_REQUEST);
                if ($user->update($_REQUEST['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Usuário atualizado com sucesso!";
                    header('Location: ../views/usuario/listar.php');
                }
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Usuario::delete($_GET['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Usuário deletado com sucesso!";
                    header('Location: ../views/usuario/listar.php');
                }
            }
        break;

        case 'mudaAtivo':
            if (isset($_GET['id'])) {
                if(Usuario::mudaAtivo($_GET['ativo'], $_GET['id'], $pdo))
                    header('Location: ../index.php');
            }
        break;
        default:
            header('Location: ../views/usuario/listar.php');
        break;
    }
?>
