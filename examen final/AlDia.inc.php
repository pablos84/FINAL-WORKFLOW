<?php
include "cabecera.inc.php";
session_start();

if ($_SESSION["usuario"] == 'Kardex') {

    $usuario = $_GET['usuario'];
    $tramite = $_GET['notramite'];
    include "conexion.inc.php";
    $sql0 = "select * from academico.alumno where nombrecompleto = '" . $usuario . "'";
    $resultado0 = mysqli_query($conn, $sql0);
    $fila0 = mysqli_fetch_array($resultado0);
    $matricula = $fila0["matricula"];

?>
    <div id="contenido">
        <h3>Recepción de documentación</h3>
        <?php
        include "conexion.inc.php";
        $sql = "select * from academico.archivos where matricula = '" . $matricula . "' and noramiite ='" . $tramite . "'";
        $resultado = mysqli_query($conn, $sql);
        ?>
        <input type="hidden" name="notramite" value="<?php $tramite; ?>" />
        <table style="width: 80%;">
            <tr>
                <td>Matrícula</td>
                <td>No. de Trámite</td>
                <td>Archivo</td>
                <td>Observación</td>
                <td>Fecha de presentacion</td>
                <td>Observaciones Kardex</td>
            </tr>
            <?php
            $i = 1;
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $matricula . "</td>";
                echo "<td>" . $fila["noramiite"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["observaciones"] . "</td>";
                echo "<td>" . $fila["fechasubida"] . "</td>";
                if ($i == 1) {
            ?> <td><input style="border: 1px solid #39c; padding: 5px; width: 250px; outline:none;" type="text" name="requisito1"></td> <?php
}
                              if ($i == 2) {
                                  ?> <td><input style="border: 1px solid #39c; padding: 5px; width: 250px; outline:none;" type="text" name="requisito2"></td> <?php }
                                                    if ($i == 3) {
?> <td><input style="border: 1px solid #39c; padding: 5px; width: 250px; outline:none;" type="text" name="requisito3"></td> <?php }
if ($i == 4) {?> <td><input style="border: 1px solid #39c; padding: 5px; width: 250px; outline:none;" type="text" name="requisito4"></td> <?php
}
echo "</tr>";
$i = $i + 1;
} ?>

<?php
            $sql = "UPDATE academico.archivos SET observaciones = 'Revisado Kardex' where noramiite ='" . $tramite . "' and requisito ='requisito1'";
            $resultado = mysqli_query($conn, $sql);

            $sql = "UPDATE academico.archivos SET observaciones = 'Falta (Kardex)' where noramiite ='" . $tramite . "' and requisito ='requisito2'";
            $resultado = mysqli_query($conn, $sql);

            $sql = "UPDATE academico.archivos SET observaciones = ''Falta (Kardex)'' where noramiite ='" . $tramite . "' and requisito ='requisito3'";
            $resultado = mysqli_query($conn, $sql);

            $sql = "UPDATE academico.archivos SET observaciones = ''Falta (Kardex)'' where noramiite ='" . $tramite . "' and requisito ='requisito4'";
            $resultado = mysqli_query($conn, $sql);
?>
        </table>
        <br>
        <p>¿El alumno tiene todos los requisitos?</p>
        <input type="text" name="pregunta" value="" />
        <input type="hidden" value="<?php $usuario; ?>" name="alumno" />
        <br>

        <script>
            function test() {
                let a;
                a = document.getElementById('requisito1').value;
                return (a);
            }
        </script>

        <?php
        echo "<b> Usuario: " . $_SESSION["usuario"] . "</b> <br>";
        echo "<b> Proceso: " . $proceso . "</b>";
        ?>
    </div>
<?php } else { ?>
    <div id="contenido">
        <br><br><br><br>
        <h3>Su Documentacion fue recepcionada ! </h3>
        <p>Ingrese al Sistema en 24 Horas para verificar las observaciones</p>
        <hr style="width: 70%; border-top: 2px solid black;">
        <br>
        <?php
        echo "<b> Usuario: " . $_SESSION["usuario"] . "</b> <br>";
        echo "<b> Proceso: " . $proceso . "</b>";
        ?>
    </div>
<?php
};
include "pie.inc.php";
?>