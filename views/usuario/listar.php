<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Sistema Tarefas</title>
	<link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
	<div class="container" style="padding-top: 40px;">
		<?php session_start(); ?>
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
					<th>Email</th>
					<th>Tipo</th>
					<th>Setor</th>
					<th>Ativo</th>
					<th colspan="2">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php require_once('../../includes/usuarios_list.php'); ?>
			</tbody>
		</table>
		<div class="container">
			<a href="criar.php"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Criar novo</button></a>
		</div>
	</div>
</body>
</html>
