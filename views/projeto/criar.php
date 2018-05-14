<?php require_once('../../inc/head.php'); ?>
<body>
  <?php session_start(); ?>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Criar projeto</h3>
          <form method="POST" action="../../controllers/ProjetoController.php">
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
                <input type="text" class="form-control" id="data_ini" name="data_ini" required>
              </div>
              <div class="form-group">
                <label for="data_previsto">Data Final Prevista</label>
                <input type="text" class="form-control" id="data_previsto" name="data_previsto" required>
              </div>
              <input type="hidden" class="form-control" id="action" name="action" value="create">
              <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>

<?php
    require_once('../../config/config.php');
    require_once('../../models/Setor.php');

    $setores = Setor::selectAll($pdo);
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

  </div>
</body>
</html>
