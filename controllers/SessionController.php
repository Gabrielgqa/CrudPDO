<?php
    session_start();
    require_once('../config/config.php');
	require_once('../models/Usuario.php');
    if (empty($_POST['action']))
        header('location: ../views/login.php');
        switch ($_POST['action']) {
            case 'create':
                if(empty($_POST['email']) || empty($_POST['password']))
                    header('location: ../views/login.php');
                if($usuario = Usuario::login($_POST['email'], md5($_POST['password']), $pdo)) {
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['tipo'] = $usuario['tipo'];
                    $_SESSION['setor'] = $usuario['setor'];
                    $_SESSION['ativo'] = $usuario['ativo'];                
                    header('location: ../views/dashboard/index.php');
                } else {
                    header('location: ../views/login.php');
                }
                break;
            default:
                header('location: ../views/login.php');
                break;
        }
?>