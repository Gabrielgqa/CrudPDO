<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="../dashboard/index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="../projeto/listar.php"><i class="fa fa-folder fa-fw"></i> Projetos</a>
                </li>
                <li>
                    <a href="../tarefa/listar.php"><i class="fa fa-tasks fa-fw"></i> Tarefas</a>
                </li>
                <?php if($_SESSION['tipo'] == 1){ ?>
                <li>
                    <a href="../setor/listar.php"><i class="fa fa-sitemap fa-fw"></i> Setores</a>
                </li>                
                <li>
                    <a href="../usuario/listar.php"><i class="fa fa-users fa-fw"></i> Usuários</a>
                </li>
                <li>
                    <a href="../cliente/listar.php"><i class="fa fa-building fa-fw"></i> Clientes</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
