<?php
include "cabecera.inc.php";
session_start();
$usuario = $_GET['usuario'];
$notramite = $_GET['notramite'];
$alumno = $_GET['alumno'];
include "conexion.inc.php";

$sql0 = "select * from academico.alumno where nombrecompleto = '" . $alumno . "'";
$resultado0 = mysqli_query($conn, $sql0);
$fila0 = mysqli_fetch_array($resultado0);
$matricula = $fila0["matricula"];


?>
<div id="contenido">
    <h3>Observaciones</h3>
    <?php
    echo $alumno;
    include "conexion.inc.php";
    $sql = "select * from academico.archivos where noramiite ='" . $notramite . "'";
    $resultado = mysqli_query($conn, $sql);
    ?>
    <table style="width: 80%;">
        <tr>
            <td>Matrícula</td>
            <td>No. de Trámite</td>
            <td>Archivo</td>
            <td>Observación</td>
            <td>Fecha de presentacion</td>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila["matricula"] . "</td>";
            echo "<td>" . $fila["noramiite"] . "</td>";
            echo "<td>" . $fila["nombre"] . "</td>";
            echo "<td>" . $fila["observaciones"] . "</td>";
            echo "<td>" . $fila["fechasubida"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <?php
    echo "<b> Usuario: " . $_SESSION["usuario"] . "</b> <br>";
    echo "<b> Proceso: " . $proceso . "</b>";
    ?>
</div>
<?php
include "pie.inc.php";
?>