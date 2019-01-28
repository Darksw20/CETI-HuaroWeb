<!DOCTYPE html>
<html>
<head>
	<title>Agregar Participante Foraneo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/proyecto/css/el_staff.css">
</head>
<body>
	<?php
		include 'barra.php';
	?>
	<div id="parF">
		<h4>Agregar participante Foraneo</h4>
		<br>
		<form action="agParti.php" method="POST">
			<div class="partiF">
				<input required="" type="text" name="CUM" placeholder="Cum..">
				<input required type="text" name="Vigencia" placeholder="Vigencia..">
				<input required type="text" name="F_naci" placeholder="aaaa-mm-dd nacimiento..">
				<br></br>
				<input required type="text" name="Sexo" placeholder="Sexo..">
				<input required type="text" name="seccion" placeholder="Seccion..">
				<input required type="text" name="Grupo_s" placeholder="Grupo_s..">	
				<br></br>
				<input required type="text" name="Nombre" placeholder="Nombre..">
				<input required type="text" name="A_Pat" placeholder="Apellido paterno..">
				<input required type="text" name="A_Mat" placeholder="Apellido materno..">
				<br></br>
				<input required type="Password" name="Password" placeholder="Contraseña..">	
				<input required type="text" name="Equipo" placeholder="Equipo..">
				<br></br>
				
				<br></br>
				<input type="submit" name="Agregar" value="Agregar" id= "but1">
			</div>
		</form>
	</div>
	<div>
		<form action="Login.php">
			<input type="submit" name="Login" value="Login">
		</form>
	</div>
		<?PHP
			if(isset($_POST['Agregar']))
			{
				$cUM= $_POST["CUM"];
				$nombre= $_REQUEST['Nombre'];
				$f_naci= $_REQUEST['F_naci'];
				$sexo= $_REQUEST['Sexo'];
				$Seccion= $_REQUEST['seccion'];
				$grupo_s= $_REQUEST['Grupo_s'];
				$vigencia = $_REQUEST['Vigencia'];
				$a_Pat= $_REQUEST['A_Pat'];
				$a_Mat= $_REQUEST['A_Mat'];
				$password= $_REQUEST['Password'];
				$equipo = $_REQUEST['Equipo'];
					
				$connection = mysqli_connect('localhost', 'root', '', 'huaro');
				$connect=mysqli_connect('localhost','root','','huaro');
		   		if($connection) 
		   		{

					$sqlQuery="INSERT INTO participante VALUES('$cUM','$nombre','$f_naci','$sexo','$Seccion','$grupo_s','$vigencia','$a_Pat','$a_Mat','$password','$equipo','$cUM')";
					$result = mysqli_query($connection,$sqlQuery);
					if($connect)
					{

					$sqlQuerys="INSERT INTO tabla_s VALUES('$cUM','$sexo','$nombre','$a_Pat','$a_Mat','$vigencia','$f_naci')";
					$resultado = mysqli_query($connect,$sqlQuerys);
					}
				}
			}
		?>
</body>
</html>
