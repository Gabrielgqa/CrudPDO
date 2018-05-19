<?php
    require_once('../../config/config.php');
    require_once('../../models/Projeto.php');
    require_once('../../models/Tarefa.php');
    require_once('../../models/Setor.php');
    require_once('../../models/Usuario.php');

    session_start();

    if (!isset($_SESSION['id'])) {
        header('location: ../../views/login.php');
        exit();
    }

    $qtd_projetos = Projeto::quantidade($pdo);
    $qtd_tarefas = Tarefa::quantidade($pdo);
    $qtd_setores = Setor::quantidade($pdo);
    $qtd_usuarios = Usuario::quantidade($pdo);
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
	<?php require_once('../../inc/header.php'); ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Dashboard</h3>
					<?php if (isset($_SESSION['message'])): ?>
				<div class="alert alert-info" role="alert">
					<?= $_SESSION['message']; ?>
					<?php unset($_SESSION['message']); ?>
				</div>
                <?php endif; ?>
                <div class="row">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-folder fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo($qtd_projetos); ?></div>
                                            <div>Quantidade de Projetos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo($qtd_tarefas); ?></div>
                                            <div>Quantidade de Tarefas</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo($qtd_setores); ?></div>
                                            <div>Quantidade de Setores</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo($qtd_usuarios); ?></div>
                                            <div>Quantidade de Usuários</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
