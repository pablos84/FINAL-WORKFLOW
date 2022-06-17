<?php
include "cabecera.inc.php";
session_start();
include "conexion.inc.php";
$sql = "select * from frentes.frente where frente='" . $_SESSION["usuario"] . "' ";
$resultado = mysqli_query($conn, $sql);
?>
<br><br><br>
<div id="contenido">
    <h3>Registro de Habilitación de Frente</h3>
    <table style="width: 80%;">
        <tr>
            <td>FRENTE</td>
            <td>NOMBRE</td>
            <td>SIGLA</td>
            <td>COLORES</td>
            <td>CANDIDATO</td>
            <td>FECHA DE HABILITACIÓN</td>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila["frente"] . "</td>";
            echo "<td>" . $fila["nombre"] . "</td>";
            echo "<td>" . $fila["sigla"] . "</td>";
            echo "<td>" . $fila["colores"] . "</td>";
            echo "<td>" . $fila["candidato"] . "</td>";
            echo "<td>" . date('Y-m-d'). "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br><br><br>
    <?php echo "<b> Usuario: " . $_SESSION["usuario"] . "</b><br>";
    echo "<b> Proceso: " . $proceso . "</b>";
    
    ?>
</div>
<br>
<?php include "pie.inc.php"; ?>