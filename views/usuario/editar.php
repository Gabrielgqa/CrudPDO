<?php
    require_once('../../config/config.php');
    require_once('../../models/Setor.php');
    require_once('../../models/Usuario.php');

    $setores = Setor::selectAll($pdo);
    $usuario = Usuario::select($_GET['id'], $pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php session_start(); ?>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Editar Usuário</h3>
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
                  <option value="<?= Usuario::TIPO_ADMIN ?>" <?= $usuario['tipo'] == Usuario::TIPO_ADMIN ? 'selected' : '' ?>>Administrador</option>
                  <option value="<?= Usuario::TIPO_CHEFE ?>" <?= $usuario['tipo'] == Usuario::TIPO_CHEFE ? 'selected' : '' ?>>Chefe</option>
                  <option value="<?= Usuario::TIPO_COLABORADOR ?>" <?= $usuario['tipo'] == Usuario::TIPO_COLABORADOR ? 'selected' : '' ?>>Colaborador</option>
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
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
