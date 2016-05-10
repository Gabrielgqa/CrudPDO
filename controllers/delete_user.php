<?php
	require_once('../config/config.php');
	require_once('../models/User.php');

	if (isset($_GET['id'])) {
		if(User::delete($_GET['id'], $pdo))
			header('Location: ../index.php');
	}
?>