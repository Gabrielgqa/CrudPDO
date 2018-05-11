<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');

$users = Usuario::selectAll($pdo);
if (isset($users)) {
    foreach ($users as $user) {
        echo "
        <tr> 
            <td>".$user['nome']."</td> 
            <td>".$user['email']."</td> 
            <td>".$user['tipo']."</td>
            <td>".$user['setor']."</td>
            <td>".$user['ativo']."</td> 
            <td><a href='views/update_user.php?id=".$user['id']."'>Editar</a></td>
            <td><a href='controllers/delete_user.php?id=".$user['id']."'>Excluir</a></td>
        </tr> 
        ";
    }
} else {
    echo "
        <tr> 
            <td colspan='3'>Não existem usuarios cadastrados.</td> 
            
        </tr> 
        ";
}

?>