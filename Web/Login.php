<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Organizador</title>
	<link rel="stylesheet" type="text/css" href="css/el_log.css">
</head>
<body>
	<!-- Este formulario envia por metodo post los datos
		para su posterior verificacion
		-Falta todavia seguridad en el inicio
		-Sesiones
		-Limites en forma de la contraseña tamaño y caracteristicas
		-Diseño atractivo
		- -->
	<form id="main"  action="main_Logueado.php" method="POST"> 
		<div id="formulario">
			
			<div id="datos">
				<div><img src="css/guia_estilos-08.png"></div>
				<div><INPUT type="text" Required name="codigo" placeholder="CUM..."></div>
				<div><INPUT type="password" Required name="nombre" placeholder="Contraseña..."></div>
				<div><INPUT TYPE="submit" VALUE="Iniciar sesion"></div>
			</div>
		</div>
	</form>
</body>
</html>
