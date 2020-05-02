	<?php
		if (isset($title))
		{

			include("modal/cambiar_password.php");

	?>
<nav class="navbar navbar-default " style="background: #a94442; border: none">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/1579348200_LOGOTIPO%20INFOSS.NET.png" width="60" height="60"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">

          <li class="">
              <a href="facturas.php"><i class='glyphicon glyphicon-dashboard'></i> Dashbord</a></li>

          

          <?php if ($_SESSION['role'] == 'admin'){?>

          <li class="dropdown" id="">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false" >
                  <i class=""></i> <?php echo 'Gestão de Inventario';?> <span class="caret"></span></a>

              <ul class="dropdown-menu">
                  <li class="<?php if (isset($active_productos)){echo $active_productos;}?>"><a href="stock.php"><i class='glyphicon glyphicon-tags'> </i> &nbsp; Gestão de Bens</a></li>
                  <li class="<?php if (isset($active_bens)){echo $active_bens;}?>"><a href="categorias.php"><i class='glyphicon glyphicon-tags'> </i>&nbsp; Categorias de Bens</a></li>
                  <li class="<?php if (isset($active_gabiente)){echo $active_gabiente;}?>">
                      <a href="gabinete.php"><i class='glyphicon glyphicon-tags'> </i>&nbsp; Gestão de Gabinetes</a></li>

              </ul>

          </li>
		  
		   <li class="<?php if (isset($active_reports)){echo $active_reports;}?>"><a href="reports.php"><i class='glyphicon glyphicon-tags'> </i>&nbsp; Relatorios</a></li>
           <li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Utilizadores</a></li>
		<li class="<?php if(isset($active_perfil)){echo $active_perfil;}?>"><a href="perfil.php"><i  class='glyphicon glyphicon-cog'></i> Definições</a></li>


      </ul>
        <?php }?>

      <ul class="nav navbar-nav navbar-right">

        <li><a href="https://ecursos.herokuapp.com" target='_blank'><i class='glyphicon glyphicon-envelope'></i> SUPORTE</a></li>

          <li class="dropdown" id="">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false" >
                  <i class="glyphicon glyphicon-user"></i> (<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?>) <span class="caret"></span></a>

              <ul class="dropdown-menu">

                  <li><a href="#" onclick="get_user_id('<?php echo $_SESSION['user_id'];?>');" data-toggle="modal" data-target="#myModal3">
                          <i class="glyphicon glyphicon-cog"></i> &nbsp;&nbsp; Perfil</a></li>
                  <li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> &nbsp;&nbsp; Sair</a></li>

              </ul>
          </li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>

    <script type="text/javascript">

        function get_user_id(id){
            $("#user_id_mod").val(id);
        }

    </script>