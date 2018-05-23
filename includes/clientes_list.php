<?php
require_once('../../config/config.php');
require_once('../../models/Cliente.php');

$clientes = Cliente::selectAll($pdo);
if (!empty($clientes)) {
    foreach ($clientes as $cliente) {
        if($cliente['tipo'] == 1)
            $documento = $cliente['cnpj'];
        else
            $documento = $cliente['cpf'];
        echo "
        <tr>
            <td>".$cliente['nome']."</td>
            <td>".$cliente['email']."</td>
            <td>".$cliente['tipo']."</td>
            <td>".$documento."</td>
            <td><a href='editar.php?id=".$cliente['id']."'><button type='button' class='btn btn-primary btn-sm'><i class='fa fa-pencil' aria-hidden='true'> Editar</i></button></a>
            <a href='../../controllers/ClienteController.php?id=".$cliente['id']."&action=delete'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'> Excluir</i></button></a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='6'>Não existem clientes cadastrados.</td>

        </tr>
        ";
}

?>
