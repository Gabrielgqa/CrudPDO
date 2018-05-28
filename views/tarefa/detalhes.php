<?php
    require_once('../../config/config.php');
    require_once('../../models/Usuario.php');
    require_once('../../models/Projeto.php');
    require_once('../../models/Tarefa.php');

    session_start();

    if (!isset($_SESSION['id'])) {
        header('location: ../../views/login.php');
    } else {
        switch ($_SESSION['tipo']) {
            case Usuario::TIPO_ADMIN:
                $projetos = Projeto::selectAll($pdo);
                break;

            case Usuario::TIPO_CHEFE:
                $projetos = Projeto::selectAllBySetor($_SESSION['setor'], $pdo);
                break;

            case Usuario::TIPO_COLABORADOR:
                $projetos = Projeto::selectAllByUsuario($_SESSION['id'], $pdo);
                break;

            default:
                # code...
                break;
        }

        $tarefa = Tarefa::select($_GET['id'], $pdo);
    }
?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Detalhes da Tarefa</h3>
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tarefa</h3>
            </div>
            <div class="panel-body">
                Nome: <?= $tarefa['nome']; ?></br>
                Descrição: <?= $tarefa['descricao']; ?></br>
                Data Inicil: <?= $tarefa['data_ini']; ?></br>
                Data Final: <?= $tarefa['data_fim']; ?></br>
            </div>
            </div>
        </div>
        <div class="col-lg-12">
            <h5>Histórico de comentários</h5>
        </div>
        <div class="col-lg-12">
            <p class="bg-info">Teste</p>
            <p class="bg-info">Teste</p>
            <p class="bg-info">Teste</p>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
