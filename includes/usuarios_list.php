<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');
require_once('../../models/Setor.php');

$users = Usuario::selectAll($pdo);
if (isset($users)) {
    foreach ($users as $user) {
        $setor = Setor::select($user['setor'], $pdo);

        switch ($user['tipo']) {
            case Usuario::TIPO_ADMIN:
                $user['tipo'] = "Admin";
                break;

            case Usuario::TIPO_CHEFE:
                $user['tipo'] = "Chefe";
                break;

            case Usuario::TIPO_COLABORADOR:
                $user['tipo'] = "Colaborador";
                break;

            default:
                # code...
                break;
        }

        echo "
        <tr>
            <td>".$user['nome']."</td>
            <td>".$user['email']."</td>
            <td>".$user['tipo']."</td>
            <td>".$setor['nome']."</td>
            <td>".($user['ativo'] == 0 ? "Inativo" : "Ativo")."</td>
            <td><a href='editar.php?id=".$user['id']."'><button type='button' class='btn btn-primary btn-sm'><i class='fa fa-pencil' aria-hidden='true'> Editar</i></button></a>
            <a href='../../controllers/UsuarioController.php?id=".$user['id']."&action=delete'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'> Excluir</i></button></a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='6'>Não existem usuários cadastrados.</td>

        </tr>
        ";
}

?>
