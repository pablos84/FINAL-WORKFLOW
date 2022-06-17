<?php
include "cabecera.inc.php";
session_start();
?>
<div id="contenido">
    <h3>Habilitar Frente</h3>
    <br><br>
    <div id="login">
        <?php
        echo "<h2> ¡Se enviará Notificacion de Habilitación a " . $_SESSION["usuario"] . " </h2> <br>";
        ?>
    </div>
    <br><br><br>
    <?php
    echo "<b> Usuario: " . $_SESSION["usuario"] . "</b> <br>";
    echo "<b> Proceso: " . $proceso . "</b>";
    ?>
</div>
<?php include "pie.inc.php"; ?>