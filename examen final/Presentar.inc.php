<?php
include "cabecera.inc.php";
session_start();
?>
<div id="contenido">
    <h3> Presentacion de Requisitos </h3>
    <table style="width: 90%;">
        <!--form action="Presentaguarda.php" method="POST" enctype="multipart/form-data"-->
        <thead>
            <tr>
                <td>No.</td>
                <td>Requisito</td>
                <td>Archivo</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td>Fotografia fondo celeste claro 3x3.</td>
                <td><input type="file" name="requisito1" value="requisito1"></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Certificado de Nacimiento original, actualizado.</td>
                <td><input type="file" name="requisito2" value="requisito"></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Fotocopia simple de la Cédula de Identidad.</td>
                <td><input type="file" name="requisito3" value="requisito"></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Fotocopia legalizada Titulo de Bachiller (Anverso y reverso).</td>
                <td><input type="file" name="requisito4" value="requisito"></td>
            </tr>
        </tbody>
    </table>
    <!--/form-->
    <?php echo "<b> Usuario: " . $_SESSION["usuario"] . "</b><br>";
    echo "<b> Proceso: " . $proceso . "</b>"; ?>
</div>
<?php include "pie.inc.php"; ?>