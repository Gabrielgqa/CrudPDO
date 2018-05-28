<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');
require_once('../../models/Setor.php');
require_once('../../models/Projeto.php');

$projetos = Projeto::selectAll($pdo);
if (!empty($projetos)) {
    foreach ($projetos as $projeto) {
        $usuario = Usuario::select($projeto['id_usuario'], $pdo);
        echo "
        <tr>
            <td>".$projeto['nome']."</td>
            <td>".$projeto['descricao']."</td>
            <td>".(new DateTime($projeto['data_ini']))->format('d/m/Y')."</td>
            <td>".(new DateTime($projeto['data_previsto']))->format('d/m/Y')."</td>
            <td>".(new DateTime($projeto['data_fim']))->format('d/m/Y')."</td>
            <td>".$usuario['nome']."</td>
            <td><a href='editar.php?id=".$projeto['id']."'><button type='button' class='btn btn-primary btn-sm'><i class='fa fa-pencil' aria-hidden='true'> Editar</i></button></a>
            <a href='../../controllers/ProjetoController.php?id=".$projeto['id']."&action=delete'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'> Excluir</i></button></a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='7'>Não existem projetos cadastrados.</td>

        </tr>
        ";
}

?>
