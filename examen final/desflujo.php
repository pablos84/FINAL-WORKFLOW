<html>

<head>
	<title>Tabla BD</title>
</head>

<body>
	<?php
	session_start();
	date_default_timezone_set("America/La_Paz");
	include "conexion.inc.php";
	$flujo = $_GET["flujo"];
	$proceso = $_GET["proceso"];

	$sql = "select * from flujoproceso where Flujo='" . $flujo . "' and Proceso='" . $proceso . "'";
	$resultado = mysqli_query($conn, $sql);
	$fila = mysqli_fetch_array($resultado);
	include $fila['Pantalla'] . '.cab.inc.php';
	
	$sql1 = "select * from usuarios where usuario = '" . $_GET["usuario"] . "'";
	$resultado1 = mysqli_query($conn, $sql1);
	$fila1 = mysqli_fetch_array($resultado1);
	$rol = $fila1['rol'];

	if ($_SESSION["usuario"] == 'Kardex') {
		$rol = 'Kardex';
	} else {
		$rol = 'Alumno';
	}

	$sql2 = "select * from flujoprocesoseguimiento where flujo='" . $flujo . "' and proceso='" . $proceso . "' and usuario = '" . $fila1['usuario'] . "'";
	$resultado2 = mysqli_query($conn, $sql2);
	$fila2 = mysqli_fetch_array($resultado2);
	?>
	<form action="motflujo.php" method="GET">
		<?php include $fila['Pantalla'] . '.inc.php'; ?>
		<br>
		<input type="hidden" value="<?php echo $fila['Pantalla']; ?>" name="pantalla" />
		<input type="hidden" value="<?php echo $flujo ?>" name="flujo" />
		<input type="hidden" value="<?php echo $proceso ?>" name="proceso" />
		<input type="hidden" value="<?php echo $fila1['usuario']; ?>" name="usuario" />
		<input type="hidden" value="<?php echo $fila2['notramite']; ?>" name="notramite" />
		<?php

		if (($proceso == 'P4' and $rol == 'Kardex') or $proceso == 'P1') { ?>
			<input type="submit" value="Siguiente" name="Siguiente" />
			<?php
		} else {
			if ($proceso == 'P4' and $rol == 'Alumno') {
				echo 'Fecha de Inscripción: ' . date('Y-m-d H:i:s', strtotime('+3 day', strtotime(date('Y-m-d H:i:s'))));
			} else {
				if ($proceso == 'P5') {
					echo '¡Se enviaron las observaciones!';
				} else {
			?>
					<input type="submit" value="Anterior" name="Anterior" />
					<input type="submit" value="Siguiente" name="Siguiente" />
				<?php
				};
			};
		}
		?>
	</form>
</body>

</html>