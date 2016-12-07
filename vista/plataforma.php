<?php require_once ('../controlador/controlador.php');
	require_once ('../modelo/articulos.php');
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	session_start();
	$objusu = $_SESSION['usuario'];





 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Drogueria</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	
</head>
<body onload="lista_medicamento('');">

<?php include_once "menu.php"; ?>
   <div class="container" >
   <br>
            <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">Medicamentos Existentes</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4 text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>
                                </div>
                                <div class="col-xs-4 ">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_medicamento(this.value);" placeholder="Ingrese nombre o descripcion"/>
                                </div>
                                <div class="col-xs4">
                                    <a href="javascript:void(0)"><button class="btn btn-success"  data-toggle="modal" data-target="#modalRegis">+ Registrar nuevo</button></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
           <!--modal de registro medicamento-->
           <div class="modal fade" id="modalRegis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2 class="modal-title">Datos del medicamento</h2>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-center" id="exito" style="display:none;">
                                    <span class="glyphicon glyphicon-ok"> </span><span> El medicamento ha sido registrado</span>
                                </div>
                                <form class="form-horizontal" id="formMedicamento">
                                    <input type="hidden" class="form-control" name="idm"  id="idm" autocomplete="off" required value="<?php echo rand() ;?>"><br>
                                    <div class="form-group">

                                        <label for="nom" class="control-label col-xs-5">Nombre:</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="nom" id="nom" placeholder="nombre medicamento" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descrip" class="control-label col-xs-5">Descripcion :</label>
                                        <div class="col-xs-5">
                                            <textarea placeholder="Descipcion del medicamento" cols="30" rows="5" class="form-control" name="descrip" id="descrip"required value=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="forma_apli" class="control-label col-xs-5">Modo de aplicacion :</label>
                                        <div class="col-xs-5">
                                            <select class="form-control input-small" name="forma_apli" id="forma_apli" required>
                            <option value="d" >Seleccione una opcion</option>
                            <option value="Via oral">Via oral</option>
                            <option value="Intravenosa">Intravenosa</option>
                            <option value="Inyeccion">Inyeccion</option>
                         </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="unidades" class="control-label col-xs-5">Unidades:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="unidades" id="unidades" autocomplete="off" placeholder="# de medicamento"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_ven" class="control-label col-xs-5">Fecha de vencimiento:</label>
                                        <div class="col-xs-5">
                                           <input type="date" class="form-control" name="fecha_ven" id="fecha_ven" autocomplete="off" placeholder="Año-Mes-Dia" required value="">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="registrar();">Guardar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal registro medicamento-->

         <!--Modal para editar-->
         <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2 class="modal-title">Datos del medicamento</h2>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-center" id="exitome" style="display:none;">
                                    <span class="glyphicon glyphicon-ok"> </span><span> El medicamento ha sido editado</span>
                                </div>
                                <form class="form-horizontal" id="formEditar">
                                <div class="form-group">
                                    
                                     <div class="col-xs-5">
                                    <input type="hidden" class="form-control" name="idm1"  id="idm1" autocomplete="off" required >
                                    </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="nom" class="control-label col-xs-5">Nombre:</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="nom1" id="nom1" autocomplete="off" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descrip" class="control-label col-xs-5">Descripcion :</label>
                                        <div class="col-xs-5">
                                            <textarea placeholder="Descipcion del medicamento" cols="30" rows="5" class="form-control" name="descrip1" id="descrip1"required value=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="forma_apli" class="control-label col-xs-5">Modo de aplicacion :</label>
                                        <div class="col-xs-5">
                                            <select class="form-control input-small" name="forma_apli1" id="forma_apli1" required>
                            <option value="d" >Seleccione una opcion</option>
                            <option value="Via oral">Via oral</option>
                            <option value="Intravenosa">Intravenosa</option>
                            <option value="Inyeccion">Inyeccion</option>
                         </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="unidades" class="control-label col-xs-5">Unidades:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="unidades1" id="unidades1" autocomplete="off" placeholder="# de medicamento"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_ven" class="control-label col-xs-5">Fecha de vencimiento:</label>
                                        <div class="col-xs-5">
                                           <input type="date" class="form-control" name="fecha_ven1" id="fecha_ven1" autocomplete="off" placeholder="Año-Mes-Dia" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_registro" class="control-label col-xs-5">Fecha de registro:</label>
                                        <div class="col-xs-5">
                                           <input type="date" class="form-control" name="fecha_registro" id="fecha_registro" autocomplete="off" placeholder="Año-Mes-Dia" required value="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="actualizar" value='si'>
                                </form>
                            </div>
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="actualizar();">Guardar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                    
<!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/medicamento.js"></script>
    <script src="../js/usuario.js"></script>
</body>
</html>
