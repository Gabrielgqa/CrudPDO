<?php
	require_once('../config/config.php');
	require_once('../models/Setor.php');
    $action = $_REQUEST['action'];

    switch ($action) {
        case 'create':
            if (isset($_REQUEST)) {
                $user = new Setor($_REQUEST);
                if ($user->insert($pdo)) {
                    session_start();
                    $_SESSION['message'] = "Setor criado com sucesso!";
                    header('Location: ../views/setor/listar.php');
                }
            }
        break;

        case 'update':
            if (isset($_REQUEST)) {
                $user = new Setor($_REQUEST);
                if ($user->update($_REQUEST['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Setor atualizado com sucesso!";
                    header('Location: ../views/setor/listar.php');
                }
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Setor::delete($_GET['id'], $pdo)) {
                    session_start();
                    $_SESSION['message'] = "Setor deletado com sucesso!";
                    header('Location: ../views/setor/listar.php');
                }
            }
        break;

        case 'mudaAtivo':
            if (isset($_GET['id'])) {
                if(Setor::mudaAtivo($_GET['ativo'], $_GET['id'], $pdo))
                    header('Location: ../index.php');
            }
        break;
        default:
            header('Location: ../views/setor/listar.php');
        break;
    }
?>
