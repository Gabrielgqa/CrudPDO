<?php
    require_once('../../config/config.php');
    require_once('../../models/Setor.php');
    require_once('../../models/Usuario.php');

    $setores = Setor::selectAll($pdo);
    $usuario = Usuario::select($_GET['id'], $pdo);
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
    <form method="POST" action="../../controllers/UsuarioController.php?id=<?= $_GET['id'] ?>">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?>" required>
      </div>
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" id="tipo" name="tipo" required>
            <option>Selecione o Tipo</option>
            <option value="1" <?= $usuario['tipo'] == 1 ? 'selected' : '' ?>>Tipo 1</option>
            <option value="2" <?= $usuario['tipo'] == 2 ? 'selected' : '' ?>>Tipo 2</option>
            <option value="3" <?= $usuario['tipo'] == 3 ? 'selected' : '' ?>>Tipo 3</option>
        </select>
      </div>
      <div class="form-group">
        <label for="setor">Setor</label>
        <select class="form-control" id="setor" name="setor" required>
            <option>Selecione o Setor</option>
            <?php foreach ($setores as $setor): ?>
                <option value="<?= $setor['id'] ?>" <?= $usuario['setor'] == $setor['id'] ? 'selected' : '' ?>><?= $setor['nome']; ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Ativo?</label>
        <label for="ativo_nao">
            <input id="ativo_nao" type="radio" name="ativo" value="0" <?= $usuario['ativo'] == 0 ? 'checked' : '' ?>> Não
        </label>

        <label for="ativo_sim">
            <input id="ativo_sim" type="radio" name="ativo" value="1" <?= $usuario['ativo'] == 1 ? 'checked' : '' ?>> Sim
        </label>
      </div>
      <input type="hidden" class="form-control" id="action" name="action" value="update">
      <input type="submit"  class="btn btn-default" value="Salvar" style="float: right;">
    </form>
  </div>
</body>
</html>
