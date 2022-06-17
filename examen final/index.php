<?php include "cabecera.inc.php"; ?>
<div id="contenedorcentrado">
    <div id="login">
        <form method="GET" action="controlindex.php">
            <h3>Usuario</h3>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <h3>Contraseña</h3>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <br><br>
            <button type="submit" title="Ingresar" name="Ingresar">INGRESAR</button>
            <br><br>
            <a href="formregistrar.php">¿No tienes Cuenta? Regístrate</a>
        </form>
    </div>
</div>
<?php include "pie2.inc.php"; ?>