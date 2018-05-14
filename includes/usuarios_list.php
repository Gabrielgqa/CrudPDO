<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');
require_once('../../models/Setor.php');

$users = Usuario::selectAll($pdo);
if (isset($users)) {
    foreach ($users as $user) {
        $setor = Setor::select($user['setor'], $pdo);
        echo "
        <tr>
            <td>".$user['nome']."</td>
            <td>".$user['email']."</td>
            <td>".$user['tipo']."</td>
            <td>".$setor['nome']."</td>
            <td>".($user['ativo'] == 0 ? "Inativo" : "Ativo")."</td>
            <td><a href='editar.php?id=".$user['id']."'>Editar</a></td>
            <td><a href='../../controllers/UsuarioController.php?id=".$user['id']."&action=delete'>Excluir</a></td>
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
