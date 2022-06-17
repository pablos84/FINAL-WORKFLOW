<?php
include "cabecera.inc.php";
session_start();
include "conexion.inc.php";
$sql = "select * from flujoprocesoseguimiento where fechafin is null and proceso = 'P4'";
$resultado = mysqli_query($conn, $sql);

?>
<h3>Alumnos con preocesos en espera</h3>
<div id="contenido">
	<table style="width: 50%;">
		<tr>
			<td>Tramite</td>
			<td>Alumno</td>
			<td>Flujo</td>
			<td>Proceso</td>
			<td>Fecha de Inicio</td>
			<td>Hora de Inicio</td>
			<td>Acción</td>
		</tr>
		<?php
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
			echo "<td>" . $fila["notramite"] . "</td>";
			echo "<td>" . $fila["usuario"] . "</td>";
			echo "<td>" . $fila["flujo"] . "</td>";
			echo "<td>" . $fila["proceso"] . "</td>";
			echo "<td>" . $fila["fechainicio"] . "</td>";
			echo "<td>" . $fila["horainicio"] . "</td>";
			echo "<td><a ";
			echo "href='desflujo.php?flujo=$fila[flujo]&proceso=$fila[proceso]&notramite=$fila[notramite]&usuario=$fila[usuario]'"; 
			echo ">Verificar<a/></td>";
			echo "</tr>";
		}
		?>
	</table>
	<?php echo "<b> Usuario: " . $_SESSION["usuario"] . "</b>"; ?>
</div>
<br>
<?php include "pie.inc.php"; ?>