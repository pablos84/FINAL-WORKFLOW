<?php 
include("conexion.inc.php");

$notramite = gmp_random_range(1000, 2000);
$Usuario = $_POST['usuario'];
$ci = $_POST['ci'];
$coddpto = $_POST['coddpto'];
$matricula = $_POST['matricula'];
$Contraseña = $_POST['contraseña'];

date_default_timezone_set("America/La_Paz");
$fechainicio = date("Y-m-d");
$horainicio = date("H:i:s");

$consulta = "INSERT INTO usuarios (usuario, contraseña, rol) VALUES ('$Usuario','$Contraseña','Alumno')";
$resultado = mysqli_query($conn, $consulta);

$consulta1 = "INSERT INTO flujoprocesoseguimiento (flujo, proceso, notramite, usuario, fechainicio, horainicio, fechafin, horafin) VALUES ('F1', 'P1', '$notramite', '$Usuario', '$fechainicio', '$horainicio', null , null)";
$resultado1 = mysqli_query($conn, $consulta1);

$consulta2 = "INSERT INTO academico.alumno (matricula, nombrecompleto, ci, coddpto) VALUES ('$matricula', '$Usuario', '$ci', '$coddpto')";
$resultado2 = mysqli_query($conn, $consulta2);

if ($resultado) {
   header("Location: index.php");
}else{
   header("Location: formregistrar.php");
   }
?>