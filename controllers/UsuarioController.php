<?php
	require_once('../config/config.php');
	require_once('../models/Usuario.php');
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            if (isset($_POST)) {
                $user = new Usuario($_POST);
                $user->insert($pdo);
                header('Location: ../index.php');
            }
        break;

        case 'update':
            if (isset($_POST)) {
                $user = new Usuario($_POST);
                $user->update( $_POST['id'], $pdo);
                header('Location: ../index.php');
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Usuario::delete($_GET['id'], $pdo))
                    header('Location: ../index.php');
            }
        break;

        case 'mudaAtivo':
            if (isset($_GET['id'])) {
                if(Usuario::mudaAtivo($_GET['ativo'], $_GET['id'], $pdo))
                    header('Location: ../index.php');
            }
        break;
    }	
?>