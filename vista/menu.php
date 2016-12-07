
<div id="wrapper ">

	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  

            <div class="navbar-header">
                <a class="navbar-brand" href="plataforma.php">Principal </a>
                <a class="navbar-brand" href="lista_vencidos.php">Vencidos </a>
				<a class="navbar-brand" href="lista_json.php">api </a>
				<a class="navbar-brand" href="llamar_grafica.php">grafica </a>
				
            </div>

		<!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                   <!-- <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dorpdown-toggle">
                            Editar datos<i class="fa fa-file-text fa-fw"></i><i class="fa fa-caret-down"></i>
                        </a>  
                        <ul class="dropdown-menu dropdown-tasks">
                            <li>
                                <a href="php/modificar_notas.php">
                                    <div>
                                        <i class="fa fa-edit fa-fw"></i>Editar notas
                                    </div>
                                </a>
                            </li>
                        </ul>                      
                    </li>-->
                
              <!--  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Clases<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="notas.php">
                                <div>
                                    <i class="fa fa-pencil fa-fw"></i> Ingresar notas
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="lista_estudiantes.php">
                                <div>
                                    <i class="fa fa-list-alt fa-fw"></i> Lista de estudiantes
                                    
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                     /.dropdown-alerts
                </li>-->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']." (".$_SESSION['usuario'].")";?> <i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </a>
                    <ul class="dropdown-menu ">
                        
                        <li><a href="javascript: void(0)" onclick='cerrar();'><i class="glyphicon glyphicon-off"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
</div>