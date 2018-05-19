<?php
    require_once('../../config/config.php');
    require_once('../../models/Setor.php');
    require_once('../../models/Usuario.php');

    session_start();

    if (!isset($_SESSION['id']) || $_SESSION['tipo'] != Usuario::TIPO_ADMIN) {
        header('location: ../../views/login.php');
    }

    $setor = Setor::select($_GET['id'], $pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
	<?php session_start(); ?>
	<?php require_once('../../inc/header.php'); ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Editar Setor</h3>
					<form method="POST" action="../../controllers/SetorController.php?id=<?= $_GET['id'] ?>">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?= $setor['nome'] ?>" required>
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

