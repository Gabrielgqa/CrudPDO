<?php
    require_once('../../config/config.php');
    require_once('../../models/Usuario.php');
    require_once('../../models/Projeto.php');

    $usuarios = Usuario::selectAll($pdo);
    $projetos = Projeto::selectAll($pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php session_start(); ?>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Criar Tarefa</h3>
          <form method="POST" action="../../controllers/TarefaController.php">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="form-group">
              <label for="data_ini">Data Inicial</label>
              <input type="date" class="form-control" id="data_ini" name="data_ini" required>
            </div>
            <div class="form-group">
              <label for="data_fim">Data Final</label>
              <input type="date" class="form-control" id="data_fim" name="data_fim" required>
            </div>
            <div class="form-group">
              <label for="id_usuario">Usuário</label>
              <select class="form-control" id="id_usuario" name="id_usuario" required>
                  <option value="">Selecione o Usuário</option>
                  <?php foreach ($usuarios as $usuario): ?>
                      <option value="<?= $usuario['id'] ?>"><?= $usuario['nome']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_projeto">Projeto</label>
              <select class="form-control" id="id_projeto" name="id_projeto">
                  <option value="">Selecione o Projeto</option>
                  <?php foreach ($projetos as $projeto): ?>
                      <option value="<?= $projeto['id']; ?>"><?= $projeto['nome']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="action" name="action" value="create">
                <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
