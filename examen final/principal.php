<?php
include "conexion.inc.php";
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$sql = "select * from flujoproceso where flujo = '$flujo' and proceso = '$proceso'";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($resultado);
$pantalla = $fila['pantalla'];
$pantalla .= ".inc.php";
$procesoanterior = $proceso;
$proceso = $fila['procesosiguiente'];
//print_r($fila);
//print_r($pantalla);
?>

<html>

<body>
    Contenido <br>
    <form action="motor.php" method="GET">
        <!--iframe src="pantalla.php" frameborder="1"></iframe-->
        <input type="hidden" name="flujo" value="<?php echo $flujo; ?>" />
        <input type="hidden" name="proceso" value="<?php echo $proceso; ?>" />
        <input type="hidden" name="procesoanterior" value="<?php echo $procesoanterior; ?>" />
        <!--guarda el proceso siguiente-->
        <?php
        //echo $proceso;
        include $pantalla;
        ?>
        <input type="submit" name="Anterior" value="Anterior" />
        <input type="submit" name="Siguiente" value="Siguiente" />
    </form>
</body>

</html>