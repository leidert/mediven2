<?php 
require_once 'conexion.php';

class articulos_json{

	
	public function PorNombre($valor){
		//$a = $_GET['nombre'];
		$con = new Conexion();
		
			$senten = $con->query("SELECT * FROM medicamento WHERE (nombre = '%".$valor."%'");
		
            $arreglo = array();
		return $senten->fetchAll(PDO::FETCH_ASSOC);
            
           
            $con=null;
		
	}
}
?>