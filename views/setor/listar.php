<?php require_once('../../inc/head.php'); ?>
<body>
	<?php session_start(); ?>
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
							<th colspan="2">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php require_once('../../includes/setores_list.php'); ?>
					</tbody>
				</table>
				<div class="container">
					<a href="criar.php"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Criar novo</button></a>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
