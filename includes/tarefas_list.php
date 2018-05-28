<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');
require_once('../../models/Tarefa.php');
require_once('../../models/Setor.php');
require_once('../../models/Projeto.php');

if (!isset($_SESSION['id'])) {
    header('location: ../../views/login.php');
} else {
    switch ($_SESSION['tipo']) {
        case Usuario::TIPO_ADMIN:
            $tarefas = Tarefa::selectAll($pdo);
            break;

        case Usuario::TIPO_CHEFE:
            $tarefas = Tarefa::selectAllBySetor($_SESSION['setor'], $pdo);
            break;

        case Usuario::TIPO_COLABORADOR:
            $tarefas = Tarefa::selectAllByUsuario($_SESSION['id'], $pdo);
            break;

        default:
            # code...
            break;
    }
}

if (!empty($tarefas)) {
    foreach ($tarefas as $tarefa) {
        $usuario = Usuario::select($tarefa['id_usuario'], $pdo);
        $projeto = Projeto::select($tarefa['id_projeto'], $pdo);

        echo "
        <tr>
            <td>".$tarefa['nome']."</td>
            <td>".$tarefa['descricao']."</td>
            <td>".(new DateTime($tarefa['data_ini']))->format('d/m/Y')."</td>
            <td>".(empty($tarefa['data_fim']) ? '-' : (new DateTime($tarefa['data_fim']))->format('d/m/Y'))."</td>
            <td>".$usuario['nome']."</td>
            <td>".$projeto['nome']."</td>".

            (empty($tarefa['data_fim']) ? "<td> <a href='../../controllers/TarefaController.php?id=".$tarefa['id']."&action=complete'><button type='button' class='btn btn-warning btn-sm' style='margin-right: 5px'><i class='fa fa-check' aria-hidden='true'> Finalizar</i></button></a>" : "<td>").
            "<a href='detalhes.php?id=".$tarefa['id']."'><button type='button' class='btn btn-sm' style='background-color: #9b59b6; color: white;'><i class='fa fa-search' aria-hidden='true'> Detalhes</i></button></a>
            <a href='editar.php?id=".$tarefa['id']."'><button type='button' class='btn btn-primary btn-sm'><i class='fa fa-pencil' aria-hidden='true'> Editar</i></button></a>
            <a href='../../controllers/TarefaController.php?id=".$tarefa['id']."&action=delete'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'> Excluir</i></button></a></td>
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
