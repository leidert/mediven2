<?php

//echo $dato2;


?>
<?php require_once ('../controlador/controlador.php');
	require_once ('../modelo/articulos.php');
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	session_start();
	$objusu = $_SESSION['usuario'];
?>
<html>
	<head>
		<?php include_once "menu.php"; ?>
	  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"> </script>
		</head>
<div class="lateralp">
	
    <div >
        <div >
			<CENTER><h2>registro vencidos</h2></CENTER>
        </div>		
        <table >
            <thead >
                <tr>
                    <th >expediente</th>
                    <th >producto</th>
                    <th >titular</th>
                    <th >registro sanitario</th>
					<th >fecha vencimiento</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($dato as $r): ?>
                    <tr>
                            <td><?php echo $r->expediente ?></td>
                            <td><?php echo $r->producto ?></td>
                            <td><?php echo $r->titular ?></td>	
                            <td><?php echo $r->registrosanitario ?></td>
						    <td><?php echo $r->fechavencimiento ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php
                        if($dato==null)
                        {
                            echo "<tr><td colspan='4'>No hay ningun usuario</td></tr>";
                        }
                ?>
            </tbody>
        </table>
    </div>
</div>            
</html>       