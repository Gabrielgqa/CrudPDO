<?php require_once('../../inc/head.php');
require_once('../../models/Usuario.php');

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
					<h3 class="page-header">Setores</h3>
					<?php if (isset($_SESSION['message'])): ?>
				<div class="alert alert-info" role="alert">
					<?= $_SESSION['message']; ?>
					<?php unset($_SESSION['message']); ?>
				</div>
				<?php endif; ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nome</th>
							<?php if ($_SESSION['tipo'] == Usuario::TIPO_ADMIN): ?>
									<th>Ações</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php require_once('../../includes/setores_list.php'); ?>
					</tbody>
				</table>
				<?php if ($_SESSION['tipo'] == Usuario::TIPO_ADMIN): ?>
						<a href="criar.php"><button type="button" class="btn btn-success btn-sm" style="float: right;">Criar novo</button></a>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
