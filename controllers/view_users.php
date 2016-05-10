<?php
	require_once('config/config.php');
	require_once('models/User.php');

	$users = User::selectAll($pdo);
	if (isset($users)) {
		foreach ($users as $user) {
			echo "
			<tr> 
				<td>".$user['nome']."</td> 
				<td>".$user['cargo']."</td> 
				<td>".$user['idade']."</td> 
				<td><a href='views/update_user.php?id=".$user['id']."'>Editar</a></td>
				<td><a href='controllers/delete_user.php?id=".$user['id']."'>Excluir</a></td>
			</tr> 
			";
		}
	} else {
		echo "
			<tr> 
				<td colspan='3'>Não existem infojuniores cadastrados.</td> 
				
			</tr> 
			";
	}
?>