
<?php 
	require_once 'conexion.php';

	class articulos{
	var $idm;  var $nom;	var $des; var $modo; var $unidades; var $fecha_ven; var $fecha_ing;
	//nombre, idmedi,descripcion,modoapli,unidades,fecha_vencimiento,fecha_ingreso
		var $id ;
		public function agregar($idm,$nom, $des,$modo,$unidades,$fecha_ven){
			$con = new Conexion();
			
			$sentencia = "INSERT INTO medicamento(nombre, idmedi,descripcion,modoapli,unidades,fecha_vencimiento,fecha_ingreso) VALUES ('$nom','$idm','$des','$modo','$unidades','$fecha_ven',now())";
			$sent = $con->query($sentencia);
			$resp="";
			if ($sent) {
				foreach ($sent as $k => $val) {
					$resp = $val;
				}
			}
			if ($resp != "") {
				echo '<div id="Success" align="center">Registro exitoso del medicamento </div>';
			}else{
				echo '<div id="Error">No se pudo registrar el medicamento </div>';
				
			}

		}
		
		
		public function listar($val){
			$con = new Conexion();
			$senten = $con->query("SELECT * FROM medicamento WHERE (nombre  like '%".$val."%' or descripcion like '%".$val."%' or modoapli like '%".$val."%') order by fecha_vencimiento");
			
            $arreglo = array();
            
            while($re = $senten->fetch()){
                $arreglo[]=$re;
        
        }
            return $arreglo;
            $con=null;
            
		}
		//esto es una prueba
		public function listar2(){
			$con = new Conexion();
			$consulta=$con->query("select * from medicamento;");
		
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
            
		}
		public function editar($idm,$nom, $des,$unidades,$fecha_ven,$fecha_ing){
			$con = new Conexion();
			$sql="UPDATE medicamento set nombre='$nom', idmedi='$idm',descripcion='$des',unidades='$unidades',fecha_vencimiento='$fecha_ven',fecha_ingreso='$fecha_ing' where idmedi='$idm'";
			
			if($senten = $con->query($sql)){
					
					return true;

				}else{
					
					 
					 return false ;
				}
					$con=null;
		}
		public function eliminar($idm){
			$con = new Conexion();
			$sql = "DELETE from medicamento where idmedi='$idm'";
			if($senten = $con->query($sql)){
					
					return true;

				}else{
					
					 
					 return false ;
				}
					$con=null;

		}
			
		
		
		
	


	}




 ?>		
