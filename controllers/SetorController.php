<?php
	require_once('../config/config.php');
	require_once('../models/Setor.php');
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            if (isset($_POST)) {
                $user = new Setor($_POST);
                $user->insert($pdo);
                header('Location: ../views/setor/index.php');
            }
        break;

        case 'update':
            if (isset($_POST)) {
                $user = new Setor($_POST);
                $user->update( $_POST['id'], $pdo);
                header('Location: ../views/setor/index.php');
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Setor::delete($_GET['id'], $pdo))
                    header('Location: ../views/setor/index.php');
            }
        break;
    }	
?>