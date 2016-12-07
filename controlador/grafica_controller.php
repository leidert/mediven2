<?php
        
     $json = file_get_contents('http://hotelsuit.esy.es/vista/llamar_datos.php?');
        $dato = json_decode($json);
        $dato2 = array();
        $dato2 = json_encode($json);
        
        require_once '../vista/vista_grafica.php';
echo ('



');

/*if($_SERVER['REQUEST_METHOD'] == "GET"){
	$json = file_get_contents('https://www.datos.gov.co/resource/6nr4-fx8r.json'); 
	
	$dato = json_decode($json);
	require_once '../vista/json_vencidos.php';
//}*/
?>