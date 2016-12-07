<?php 
//header('Content-Type: application/json');
require_once("../modelo/articulos.php");
require_once("../modelo/articulos_json.php");

$inst = new articulos();
$r= $inst->listar2();
//$dato2 = json_encode($r);
//$a=$_GET['nombre'];

$dato=[];
        foreach ($_GET as $key => $value) {
            //if($key=="controlador" || $key=="accion"){ ignorar gets
                //continue;
            //}  else {
                foreach ($r as $value_) {
                    if($value_[$key]==$value){
                        array_push($dato, $value_);
                    }
                }
                $r=$dato;
                $dato=[];
            }
       // }
header('Content-type: application/json');
echo $dato = json_encode($r);
require_once ('../vista/mis_json.php');
           

?>