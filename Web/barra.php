<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/proyecto/css/el_dash.css">
</head>
<body>
	<nav>
		<h1><a id="logo" href="dashboard.php">Bienvenido organizador</a></h1>
			
		<div class="dropdown">
			<a class="dropbtn" href="Resumen.php">Resumen</a>
		</div>
		<div class="dropdown">	
			<a class="dropbtn" href="Staff.php">Opciones Staff</a>
			<div class="dropdown-content">
				<a href="agStaff.php">Agregar Staff</a>
				<a href="Staff.php">Editar Staff</a>
				<a href="crear_Partido.php">Crear Partido</a>

			</div>
		</div>
		<div class="dropdown">
			<a class="dropbtn" href="Participantes.php">Opciones Participante</a>
			<div class="dropdown-content">
				<a href="agParti.php">Agregar Participante</a>
				<a href="Participantes.php">Editar Participante</a>
				<a href="Equipo.php">Crear Equipo</a>
			</div>
		</div>
		<div class="dropdown">
			<a class="dropbtn" href="Login.php">Cerrar Sesion</a>
		</div>
				
	</nav>

</body>
</html>


