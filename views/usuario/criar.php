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
    <form method="POST" action="../../controllers/UsuarioController.php">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" id="tipo" name="tipo" required>
            <option>Selecione o Tipo</option>
            <option value="1">Tipo 1</option>
            <option value="2">Tipo 2</option>
            <option value="3">Tipo 3</option>
        </select>
      </div>
      <div class="form-group">
        <label for="setor">Setor</label>
        <select class="form-control" id="setor" name="setor" required>
            <option>Selecione o Setor</option>
            <?php foreach ($setores as $setor): ?>
                <option value="<?= $setor['id'] ?>"><?= $setor['nome']; ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Ativo?</label>
        <label for="ativo_nao">
            <input id="ativo_nao" type="radio" name="ativo" value="0" checked> Não
        </label>

        <label for="ativo_sim">
            <input id="ativo_sim" type="radio" name="ativo" value="1"> Sim
        </label>
      </div>
      <input type="hidden" class="form-control" id="action" name="action" value="create">
      <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
    </form>
  </div>
</body>
</html>
