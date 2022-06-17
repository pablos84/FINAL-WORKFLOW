<?php
session_start();
include "conexion.inc.php";
$nombre = $_SESSION["usuario"];
//$nombre = $_REQUEST["nombres"];
$matricula = $_REQUEST["matricula"];
$ci = $_REQUEST["ci"];
$coddpto = $_REQUEST["coddpto"];
$sql0 = "UPDATE academico.alumno SET nombrecompleto = '".$nombre."', ci = '".$ci."', coddpto = '".$coddpto."' WHERE matricula = '".$matricula."'";
$resultado = mysqli_query($conn, $sql0);
?>
 