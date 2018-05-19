<?php
require_once('../../config/config.php');
require_once('../../models/Setor.php');
require_once('../../models/Usuario.php');

$setores = Setor::selectAll($pdo);
if (isset($setores)) {
    foreach ($setores as $setor) {
        $setor = Setor::select($setor['id'], $pdo);
        echo "
        <tr>
            <td>".$setor['nome']."</td>".
            ($_SESSION['tipo'] != Usuario::TIPO_ADMIN ? '' : "<td><a href='editar.php?id=".$setor['id']."'><button type='button' class='btn btn-primary btn-sm'><i class='fa fa-pencil' aria-hidden='true'> Editar</i></button></a>
            <a href='../../controllers/SetorController.php?id=".$setor['id']."&action=delete'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'> Excluir</i></button></a></td>").
        "</tr>";
    }
} else {
    echo "
        <tr>
            <td colspan='3'>Não existem setores cadastrados.</td>

        </tr>
        ";
}

?>
