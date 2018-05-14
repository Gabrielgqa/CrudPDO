<?php
    require_once('../../config/config.php');
    require_once('../../models/Setor.php');
    $setor = Setor::select($_GET['id'], $pdo);
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
    <form method="POST" action="../../controllers/SetorController.php?id=<?= $_GET['id'] ?>">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= $setor['nome'] ?>" required>
      </div>
      <input type="hidden" class="form-control" id="action" name="action" value="update">
      <input type="submit"  class="btn btn-default" value="Salvar" style="float: right;">
    </form>
  </div>
</body>
</html>
