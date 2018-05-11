<?php
	require_once('../config/config.php');
	require_once('../models/User.php');
    $action = $_POST['action'];
    switch ($action) {
        case 'index':
            $users = User::selectAll($pdo);
            if (isset($users)) {
                foreach ($users as $user) {
                    echo "
                    <tr> 
                        <td>".$user['nome']."</td> 
                        <td>".$user['cargo']."</td> 
                        <td>".$user['idade']."</td> 
                        <td><a href='views/update_user.php?id=".$user['id']."'>Editar</a></td>
                        <td><a href='controllers/delete_user.php?id=".$user['id']."'>Excluir</a></td>
                    </tr> 
                    ";
                }
            } else {
                echo "
                    <tr> 
                        <td colspan='3'>Não existem infojuniores cadastrados.</td> 
                        
                    </tr> 
                    ";
            }
        break;

        case 'create':
            if (isset($_POST)) {
                $user = new User($_POST);
                $user->insert($pdo);
                header('Location: ../index.php');
            }
        break;

        case 'update':
            if (isset($_POST)) {
                $user = new User($_POST);
                $user->update( $_POST['id'], $pdo);
                header('Location: ../index.php');
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(User::delete($_GET['id'], $pdo))
                    header('Location: ../index.php');
            }
        break;

        case 'mudaAtivo':
            if (isset($_GET['id'])) {
                if(User::mudaAtivo($_GET['ativo'], $_GET['id'], $pdo))
                    header('Location: ../index.php');
            }
        break;
    }	
?>