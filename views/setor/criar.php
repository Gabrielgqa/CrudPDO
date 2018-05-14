<?php require_once('../../inc/head.php'); ?>
<body>
	<?php session_start(); ?>
	<?php require_once('../../inc/header.php'); ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Criar Setor</h3>
          <form method="POST" action="../../controllers/SetorController.php">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" required>
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