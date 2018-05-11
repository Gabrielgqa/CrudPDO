<?php 
  require_once('../config/config.php');
  require_once('../models/User.php');
  $user = User::select($_GET['id'], $pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Info SQL/PDO</title>
  <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
  <div class="container" style="padding-top: 40px;">
    <form method="POST" action="../controllers/update_user.php">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $user['nome'];?>">
      </div>
      <div class="form-group">
        <label for="cargo">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $user['cargo'];?>">
      </div>
      <div class="form-group">
        <label for="idade">Idade</label>
        <input type="hidden" name="id" value="<?php echo $user['id'];?>">
        <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $user['idade'];?>">
      </div>
      <input type="submit"  class="btn btn-default" value="Editar" style="float: right;">
    </form>
  </div>
</body>
</html>