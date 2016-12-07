<?php 
	require_once("../modelo/persona.php");
	require_once("../modelo/session.php");
	require_once("../modelo/articulos.php");
	require_once("../modelo/ValidarUser.php");

	#$boton = $_GET['boton'];

	if(isset($_POST['valor']))
	{
		$valor=$_POST['valor'];
		$inst = new articulos();
		$r=$inst ->listar($valor);
		//print_r($r);
		echo json_encode($r);
		
	}
	if(isset($_POST['boton']) && $_POST['boton']=='ingresar'){
		$obj = new session();
		$array = $obj->acceso($_POST['nombre'],$_POST['passq']);
		if($array[0]==0){
			echo '0';
		}else{
			session_start();
			$_SESSION['ingresar'] = 'Si';
			echo $_SESSION['usuario']=$array[3];
			echo $_SESSION['nombre']=$array[1];
			echo $_SESSION['apellido']=$array[2];
		}
		
		
	}
	if (isset($_POST['boton']) && $_POST['boton']=='cerrar') {
		
            	
			session_start();
			session_destroy();
			echo '0'; 
		
	}
	if(isset($_POST['idn']) && isset($_POST['nom']) && isset($_POST['ape'])&& isset($_POST['usuario'])&&isset($_POST['ced'])&&isset($_POST['edad'])&&isset($_POST['correo'])&&isset($_POST['pass'])&&isset($_POST['sexo'])){
	$id=$_POST['idn'];
	$nom = $_POST['nom'];
	$ape = $_POST['ape'];
	$usu = $_POST['usuario'];
	$ced = $_POST['ced'];
	$edad = $_POST['edad'];
	$correo = $_POST['correo'];
	$pass = md5($_POST['pass']);
	$sexo = $_POST['sexo'];
	
		
	$objpersona = new persona($id,$nom,$ape,$usu,$ced,$edad,$correo,$pass,$sexo);
		
	if ($objpersona->guardar())
	{
						echo "exito";
					}
					else{
						echo "No se registro";
					}
    }
		
	
	if(isset($_POST['idm']) && isset($_POST['nom']) && isset($_POST['descrip']) && isset($_POST['forma_apli'])&&isset($_POST['unidades']) && isset($_POST['fecha_ven'])){
		$idm = $_POST['idm'];
		$nom = $_POST['nom'];
		$desc = $_POST['descrip'];
		$forma = $_POST['forma_apli'];
		$unidades = $_POST['unidades'];
		$fecha_ven = $_POST['fecha_ven'];

		$objMedi = new articulos();
		 $objMedi->agregar($idm,$nom,$desc,$forma,$unidades,$fecha_ven);
		
		
	}
	if(isset($_POST['actualizar']) and $_POST['actualizar']=='si'){
		$idm = $_POST['idm1'];
		$nom = $_POST['nom1'];
		$desc = $_POST['descrip1'];
		$unidades = $_POST['unidades1'];
		$fecha_ven = $_POST['fecha_ven1'];
		$fecha_registro= $_POST['fecha_registro'];
		$objMedi = new articulos();
		
		if($objMedi->editar($idm,$nom,$desc,$unidades,$fecha_ven,$fecha_registro)){
			echo 'exito';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}
		if(isset($_POST['idm'])){
			$idmm = $_POST['idm'];
					$objeliminar = new articulos();
					if($objeliminar->eliminar($idmm)){
				echo 'exito';
			}else{
				echo 'No se pudo eliminar el dato';
			}
				}
				
         
			
			
		
		
		
	
	
	
	
 ?>