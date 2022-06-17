<?php
session_start();
include "conexion.inc.php";
$usuario = $_SESSION["usuario"];
$archivo = $_FILES['requisito1']['tmp_name'];
$nombre  = $_FILES['requisito1']['name'];
$peso = $_FILES['requisito1']['size'];
$tipo = $_FILES['requisito1']['type'];
$ruta = "archivos/". $nombre;
@move_uploaded_file($archivo, $ruta); // mueve acrhivo temporal


if ($archivo != "none") {

    $sql = "INSERT INTO frentes.archivos (frente,contenido,nombre,peso,tipo,fecha) VALUES ('" . $usuario . "',null,'" . $nombre . "',null,null,'" . date('Y-m-d') . "')";
    $resultado = mysqli_query($conn, $sql);

    fclose($fp);
} else {
    $sql = "INSERT INTO frentes.archivos (frente, contenido, nombre, peso, tipo, fecha) VALUES ('" . $_SESSION["usuario"] . "', null,'sin registro', null, null,'" . date('Y-m-d') . "')";
    $resultado = mysqli_query($conn, $sql);
};

header("Location: desflujo.php?flujo=F1&proceso=P3");
?>