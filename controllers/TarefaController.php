<?php
	require_once('../config/config.php');
	require_once('../models/Tarefa.php');
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            if (isset($_POST)) {
                $user = new Tarefa($_POST);
                $user->insert($pdo);
                header('Location: ../views/tarefa/index.php');
            }
        break;

        case 'update':
            if (isset($_POST)) {
                $user = new Tarefa($_POST);
                $user->update( $_POST['id'], $pdo);
                header('Location: ../views/tarefa/index.php');
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Tarefa::delete($_GET['id'], $pdo))
                    header('Location: ../views/tarefa/index.php');
            }
        break;
    }	
?>