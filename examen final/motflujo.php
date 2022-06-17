	<?php
	include "conexion.inc.php";
	session_start();
	date_default_timezone_set("America/La_Paz");
	
	$usuario = $_GET["usuario"];
	$flujo=$_GET["flujo"];
	$proceso=$_GET["proceso"];
	$pantalla=$_GET["pantalla"];
	$notramite = $_GET["notramite"];
	$pregunta = $_GET["pregunta"];
	$alumno = $_GET["alumno"];

	include $pantalla.".mot.inc.php";

	if (isset($_GET["Siguiente"]))
	{
		
		$fecha = date("Y-m-d");
		$hora = date("H:i:s");

		$sql2 = "UPDATE flujoprocesoseguimiento set fechafin = '" . $fecha . "', horafin = '" . $hora . "', usuario = '" . $usuario . "'  where proceso='" . $proceso . "' and notramite ='" . $notramite . "'";
		$resultado2 = mysqli_query($conn, $sql2);

		$sql = "select * from flujoproceso where Flujo='" . $flujo . "' and Proceso='" . $proceso . "'";
		$resultado = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_array($resultado);
		$procesosiguiente = $fila["ProcesoSiguiente"];

		if ($procesosiguiente == null && $fila["Tipo"]=='C')
		{
			$sql= "select * from flujoprocesocondicionante where Flujo='".$flujo."' and Proceso='".$proceso."'";
			$resultado2=mysqli_query($conn, $sql);
			$fila2=mysqli_fetch_array($resultado2);
			if ($pregunta=='SI')
				$procesosiguiente=$fila2["ProcesoSI"];
			else 
				$procesosiguiente=$fila2["ProcesoNO"];
		}
		
		$sql3 = "INSERT INTO flujoprocesoseguimiento (flujo, proceso, notramite, usuario, fechainicio, horainicio, fechafin, horafin) VALUES ('" . $flujo . "','" . $procesosiguiente . "','" . $notramite . "','" . $usuario . "','" . $fecha . "','" . $hora . "',null,null)";
		$resultado = mysqli_query($conn, $sql3);

		header("Location: desflujo.php?flujo=".$flujo."&proceso=".$procesosiguiente."&notramite=".$notramite);
	}
	else
	{
		$sql="select * from flujoproceso where Flujo='".$flujo."' and ProcesoSiguiente='".$proceso."'";
		$resultado=mysqli_query($conn, $sql);
		$fila=mysqli_fetch_array($resultado);
		$proceso=$fila["Proceso"];
		header("Location: desflujo.php?flujo=".$flujo."&proceso=".$proceso);
	}
	
	?>
