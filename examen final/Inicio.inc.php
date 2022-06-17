<?php
include "cabecera.inc.php";
session_start();
?>
<div id="contenido">
    <h3>Cronograma de Inscripción y Requisito</h3>
    <div align="center">
        <iframe src="archivos/<?php echo 'CRONOGRAMA_INSCRIPCIONES_NUEVOSfinal.pdf'; ?>" frameborder="1"></iframe>
    </div>
    <br>
    <label> Confirme la lectura del documento -> <input type="checkbox" name="ok" required></label>
    <?php
    echo "<b> Usuario: " . $_SESSION["usuario"] . "</b> <br>";
    echo "<b> Proceso: " . $proceso . "</b>";
    ?>
</div>
<?php include "pie.inc.php"; ?>