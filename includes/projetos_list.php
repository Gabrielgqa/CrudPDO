<?php
require_once('../../config/config.php');
require_once('../../models/Projeto.php');
require_once('../../models/Usuario.php');

$projetos = Projeto::selectAll($pdo);
if (isset($projetos)) {
    foreach ($projetos as $projeto) {
        //pegar da session id_user
        $usuario = Usuario::select($projeto['id_usuario'], $pdo);
        echo "
        <tr>
            <td>".$projeto['nome']."</td>
            <td>".$projeto['descricao']."</td>
            <td>".$projeto['data_ini']."</td>
            <td>".$projeto['data_previsto']."</td>
            <td>".$projeto['data_fim']."</td>
            <td>".$usuario['nome']."</td>
            <td><a href='editar.php?id=".$projeto['id']."'>Editar</a></td>
            <td><a href='../../controllers/UsuarioController.php?id=".$projeto['id']."&action=delete'>Excluir</a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='3'>Não existem projetos cadastrados.</td>

        </tr>
        ";
}

?>
