<?php
    require_once('../../config/config.php');
    require_once('../../models/Setor.php');
    require_once('../../models/Usuario.php');

    session_start();

    if (!isset($_SESSION['id']) || $_SESSION['tipo'] != Usuario::TIPO_ADMIN) {
        header('location: ../../views/login.php');
    }

    $setores = Setor::selectAll($pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Criar Usuário</h3>
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
                    <option value="">Selecione o Tipo</option>
                    <option value="1">Administrador</option>
                    <option value="2">Chefe</option>
                    <option value="3">Colaborador</option>
                </select>
              </div>
              <div class="form-group">
                <label for="setor">Setor</label>
                <select class="form-control" id="setor" name="setor" required>
                    <option value="">Selecione o Setor</option>
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
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
