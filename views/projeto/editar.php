<?php
    require_once('../../config/config.php');
    require_once('../../models/Projeto.php');

    session_start();

    if (!isset($_SESSION['id'])) {
        header('location: ../../views/login.php');
    }

    $projeto = Projeto::select($_GET['id'], $pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php session_start(); ?>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Editar Projeto</h3>
          <form method="POST" action="../../controllers/ProjetoController.php?id=<?= $projeto['id']; ?>">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?= $projeto['nome'] ?>" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $projeto['descricao'] ?>" required>
            </div>
            <div class="form-group">
              <label for="data_previsto">Data Final Prevista</label>
              <input type="date" class="form-control" id="data_previsto" name="data_previsto" value="<?= $projeto['data_previsto'] ?>" required>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="action" name="action" value="update">
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
