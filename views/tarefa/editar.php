<?php
    require_once('../../config/config.php');
    require_once('../../models/Usuario.php');
    require_once('../../models/Projeto.php');
    require_once('../../models/Tarefa.php');

    session_start();

    if (!isset($_SESSION['id'])) {
        header('location: ../../views/login.php');
    }

    $projetos = Projeto::selectAll($pdo);
    $tarefa = Tarefa::select($_GET['id'], $pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Editar Tarefa</h3>
          <form method="POST" action="../../controllers/TarefaController.php?id=<?= $tarefa['id']; ?>">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?= $tarefa['nome'] ?>" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $tarefa['descricao'] ?>" required>
            </div>
            <div class="form-group">
              <label for="data_ini">Data Inicial</label>
              <input type="date" class="form-control" id="data_ini" name="data_ini" value="<?= $tarefa['data_ini'] ?>" required>
            </div>
            <div class="form-group">
              <label for="id_projeto">Projeto</label>
              <select class="form-control" id="id_projeto" name="id_projeto">
                  <option value="">Selecione o Projeto</option>
                  <?php foreach ($projetos as $projeto): ?>
                      <option value="<?= $projeto['id']; ?>" <?= $tarefa['id_projeto'] == $projeto['id'] ? 'selected' : '' ?>><?= $projeto['nome']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="action" name="action" value="update">
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?= $_SESSION['id']; ?>">
                <input type="hidden" class="form-control" id="data_fim" name="data_fim" value="<?= $tarefa['data_fim']; ?>">
                <input type="submit"  class="btn btn-default" value="Salvar" style="float: right;">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
