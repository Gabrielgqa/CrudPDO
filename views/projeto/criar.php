<?php require_once('../../inc/head.php'); ?>
<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location: ../../views/login.php');
}
?>
<body>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Criar Projeto</h3>
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
              <input type="date" class="form-control" id="data_ini" name="data_ini" required>
            </div>
            <div class="form-group">
              <label for="data_previsto">Data Final Prevista</label>
              <input type="date" class="form-control" id="data_previsto" name="data_previsto" required>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="action" name="action" value="create">
                <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
            </div>
          </form>
        </div>
      </div>
    </div>
