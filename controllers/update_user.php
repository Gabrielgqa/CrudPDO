<?php
	require_once('../config/config.php');
	require_once('../models/User.php');

	if (isset($_POST)) {
		$user = new User($_POST);
		$user->update( $_POST['id'], $pdo);
		header('Location: ../index.php');
	}
?>