<?php
$_SESSION = null;
session_destroy();
header('Location: ../views/login.php');
?>
