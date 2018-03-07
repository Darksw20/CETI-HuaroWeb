<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#info{
			display: inline-block;
			background-color: black;
			color: white;
			padding: 1%;
			border-radius: 5px;
		}
		div #info{
			font-family: monospace;
			text-align: center;
			font-size: 16px;
			margin-top: 10%;
			margin-left: 40%;
		}
	</style>
	<meta charset="utf-8">
</head>
<body>

	<div id="info">
		<h4>Participantes registrados</h4>
		<h4> actualmente:</h4>
		<?php 
			$conexion = mysqli_connect("localhost", "root","","huaro");
				$esql="SELECT numero from notas where titulo='personas'";
				$Resultado=mysqli_query($conexion,$esql);
				while($row=mysqli_fetch_assoc($Resultado))
				{
					$cantidad=$row["numero"];
				}
				echo $cantidad;
		?>
	</div>	
</body>
</html>
