<?php
    require_once('../../config/config.php');
    require_once('../../models/Usuario.php');
    require_once('../../models/Projeto.php');
    require_once('../../models/Tarefa.php');
    require_once('../../models/Comentario.php');

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
                Data Inicil: <?= date("d/m/Y", strtotime($tarefa['data_ini'])); ?></br>
                Data Final: <?= $tarefa['data_fim']; ?></br>
            </div>
            </div>
        </div>
        <div class="col-lg-12">
            <h5>Histórico de comentários</h5>
        </div>
        <div class="col-lg-12">
        <?php 
            $comentarios = Comentario::selectByTarefa($tarefa['id'], $pdo); 
            foreach ($comentarios as $comentario) {
                echo"<p class='bg-info' style='padding: 5px; margin-bottom: 10px;'><span style='font-size: 10px;' class='pull-right'>Autor: ".Usuario::select($comentario['id_usuario'], $pdo)['nome']." - Data: ".date("d/m/Y", strtotime($comentario['data']))."</span></br>".$comentario['comentario']."</p>";
            }
        ?>
            <form action="../../controllers/ComentarioController.php">
                <div class="form-group">
                <textarea id="comentario" name="comentario" id="" rows="2" class="form-control" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id_tarefa" name="id_tarefa" value="<?=  $tarefa['id']; ?>">
                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?= $_SESSION['id']; ?>">
                    <input type="hidden" class="form-control" id="action" name="action" value="create">
                    <input type="submit" class="btn btn-success pull-right" value="Enviar">
                </div>                
            </form>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
