<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Info SQL/PDO</title>
	<link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
	<div class="container" style="padding-top: 40px;">
		<table class="table table-bordered"> 
			<thead> 
				<tr> 
					<th>Nome</th> 
					<th>Cargo</th> 
					<th>Idade</th> 
					<th colspan="2">Ações</th>
				</tr> 
			</thead> 
			<tbody> 
				<?php require_once('controllers/view_users.php'); ?>
			</tbody> 
		</table>
		<div class="container">
			<a href="views/create_user.php"><button type="button" class="btn btn-primary btn-sm" style="float: right;">Criar novo</button></a>
		</div>
	</div>
</body>
</html>