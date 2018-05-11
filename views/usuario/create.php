<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Sistema Tarefas</title>
  <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
  <div class="container" style="padding-top: 40px;">
    <form method="POST" action="../../controllers/UsuarioController.php">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="cargo">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo">
      </div>
      <div class="form-group">
        <label for="idade">Idade</label>
        <input type="text" class="form-control" id="idade" name="idade">
        <input type="hidden" class="form-control" id="action" name="action">
      </div>
      <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
    </form>
  </div>
</body>
</html>