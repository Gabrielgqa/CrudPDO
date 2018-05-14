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
            <td>".(new DateTime($projeto['data_fim']))->format('d/m/Y')."</td>
            <td>".$usuario['nome']."</td>
            <td>".$projeto['nome']."</td>
            <td><a href='editar.php?id=".$projeto['id']."'>Editar</a></td>
            <td><a href='../../controllers/ProjetoController.php?id=".$projeto['id']."&action=delete'>Excluir</a></td>
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
