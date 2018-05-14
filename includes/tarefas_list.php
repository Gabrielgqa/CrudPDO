<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');
require_once('../../models/Tarefa.php');
require_once('../../models/Setor.php');
require_once('../../models/Projeto.php');

$tarefas = Tarefa::selectAll($pdo);
if (!empty($tarefas)) {
    foreach ($tarefas as $tarefa) {
        $usuario = Usuario::select($tarefa['id_usuario'], $pdo);
        $projeto = Projeto::select($tarefa['id_projeto'], $pdo);

        echo "
        <tr>
            <td>".$tarefa['nome']."</td>
            <td>".$tarefa['descricao']."</td>
            <td>".(new DateTime($tarefa['data_ini']))->format('d/m/Y')."</td>
            <td>".(new DateTime($tarefa['data_fim']))->format('d/m/Y')."</td>
            <td>".$usuario['nome']."</td>
            <td>".$projeto['nome']."</td>
            <td><a href='editar.php?id=".$tarefa['id']."'>Editar</a></td>
            <td><a href='../../controllers/TarefaController.php?id=".$tarefa['id']."&action=delete'>Excluir</a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='7'>Não existem tarefas cadastradas.</td>

        </tr>
        ";
}

?>
