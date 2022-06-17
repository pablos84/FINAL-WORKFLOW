<?php
session_start();
date_default_timezone_set("America/La_Paz");
include "conexion.inc.php";
$usuario = $_SESSION['usuario'];
$tramite = $_GET['notramite'];
$sql = "SELECT * FROM academico.alumno WHERE nombrecompleto ='" .$usuario. "'";
$resultado = mysqli_query($conn,$sql);
$fila = mysqli_fetch_array($resultado);
$fecha = date('Y-m-d H:i:s');

if ($_REQUEST["requisito1"]==""){
    $doc = "Falta requisto Foto" ;
} else {
    $doc = "Se presentó Foto";
};
$sql = "INSERT INTO academico.archivos (matricula, requisito,noramiite,nombre,observaciones,fechasubida) VALUES ('" . $fila["matricula"] . "', 'requisito1', '" . $tramite . "','" . $_REQUEST["requisito1"] . "','" . $doc . "','" . $fecha . "')";
$resultado = mysqli_query($conn, $sql);

if ($_REQUEST["requisito2"]=="") {
    $doc = "Falta requisito Certificado de Nacimiento";
} else {
    $doc = "Se presentó Certificado de Nacimiento";
};
$sql = "INSERT INTO academico.archivos (matricula, requisito,noramiite,nombre,observaciones,fechasubida) VALUES ('" . $fila["matricula"] . "', 'requisito2', '" . $tramite . "','" . $_REQUEST["requisito2"] . "','" . $doc . "','" . $fecha . "')";
$resultado = mysqli_query($conn, $sql);
if ($_REQUEST["requisito3"]=="") {
    $doc = "Falta requisito Cédula de Identidad";
} else {
    $doc = "Se presentó Cédula de Identidad";
};
$sql = "INSERT INTO academico.archivos (matricula, requisito,noramiite,nombre,observaciones,fechasubida) VALUES ('" . $fila["matricula"] . "',  'requisito3','" . $tramite . "','" . $_REQUEST["requisito3"] . "','" . $doc . "','" . $fecha . "')";
$resultado = mysqli_query($conn, $sql);

if($_REQUEST["requisito4"] == "") {
    $doc = "Falta requisito Título de Bachiller";
} else {
    $doc = "Se presentó Título de Bachiller" ;
};
$sql = "INSERT INTO academico.archivos (matricula, requisito,noramiite,nombre,observaciones,fechasubida) VALUES ('" . $fila["matricula"] . "',  'requisito4','" . $tramite . "','" . $_REQUEST["requisito4"] . "','" . $doc . "','" . $fecha . "')";
$resultado = mysqli_query($conn, $sql);
?>