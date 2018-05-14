<?php
    require_once('../../config/config.php');
    require_once('../../models/Usuario.php');
    require_once('../../models/Tarefa.php');

    $usuarios = Usuario::selectAll($pdo);
    $tarefas = Tarefa::selectAll($pdo);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Sistema Tarefas</title>
  <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
  <div class="container" style="padding-top: 40px;">
    <form method="POST" action="../../controllers/TarefaController.php">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao">
      </div>
      <div class="form-group">
        <label for="data_ini">Data Inicial</label>
        <input type="date" class="form-control" id="data_ini" name="data_ini">
      </div>
      <div class="form-group">
        <label for="data_fim">Data Final</label>
        <input type="date" class="form-control" id="data_fim" name="data_fim">
      </div>
      <div class="form-group">
        <label for="id_usuario">Usuário</label>
        <select class="form-control" id="id_usuario" name="id_usuario">
            <option>Selecione o Usuário</option>
            <?php foreach ($usuarios as $usuario): ?>
                <option value="<?= $usuario['id'] ?>"><?= $usuario['nome']; ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="id_tarefa">Tarefa</label>
        <select class="form-control" id="id_tarefa" name="id_tarefa">
            <option>Selecione a Tarefa</option>
            <?php foreach ($tarefas as $tarefa): ?>
                <option value="<?= $tarefa['id']; ?>"><?= $tarefa['nome']; ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
          <input type="hidden" class="form-control" id="action" name="action" value="create">
          <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
      </div>
    </form>
  </div>
</body>
</html>
