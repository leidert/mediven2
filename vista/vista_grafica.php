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
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
			
			
          ['hoteles', 'habitaciones'],
			<?php
			foreach ($dato as $deco) {
		    ?>
			
          ['<?php echo $deco->hotel ?>', '<?php echo $deco->camas ?>' ],
			
          <?php } ?>
        ]);

        var options = {
          width: 1470,
          chart: {
            title: 'habitaciones por hoteles',
            subtitle: 'distance on the left, brightness on the right'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="dual_y_div" style="width: 98%; height: 70%;"></div>
  </body>
</html>