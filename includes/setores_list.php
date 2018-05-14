<?php
require_once('../../config/config.php');
require_once('../../models/Setor.php');

$setores = Setor::selectAll($pdo);
if (isset($setores)) {
    foreach ($setores as $setor) {
        $setor = Setor::select($setor['id'], $pdo);
        echo "
        <tr>
            <td>".$setor['nome']."</td>
            <td><a href='editar.php?id=".$setor['id']."'>Editar</a></td>
            <td><a href='../../controllers/SetorController.php?id=".$setor['id']."&action=delete'>Excluir</a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='3'>Não existem setores cadastrados.</td>

        </tr>
        ";
}

?>
