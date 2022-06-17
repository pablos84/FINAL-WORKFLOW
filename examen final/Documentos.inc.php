<?php
include "cabecera.inc.php";
include "conexion.inc.php";
session_start();
$nombre = $_SESSION["usuario"];
$sql = "select * from academico.alumno where nombrecompleto = '" . $nombre . "' ";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($resultado);
?>
<div id="contenido">
    <h3>Verifíca tus Datos Personales</h3>
    <div id="login">
        <h3>Nombre</h3>
        <input type="text" name="nombres" value="<?php echo $fila["nombrecompleto"]; ?>" />
        <h3>Matrícula</h3>
        <input type="text" name="matricula" value="<?php echo $fila["matricula"]; ?>" />
        <h3>Número de Cedula de Identidad</h3>
        <input type="text" name="ci" value="<?php echo $fila["ci"]; ?>" />
        <h3>Codigo de Departamento</h3>
        <input type="text" name="coddpto" value="<?php echo $fila["coddpto"]; ?>" />
    </div>
    <?php echo "<b> Usuario: " . $_SESSION["usuario"] . "</b><br>";
    echo "<b> Proceso: " . $proceso . "</b>";
    ?>
</div>
<?php include "pie.inc.php";
?>