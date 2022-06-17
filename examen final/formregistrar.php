<?php include "cabecera.inc.php"; ?>
<div id="contenedorcentrado">
    <div id="login">
        <h2>Registro</h2>
        <form method="POST" action="registrar.php">
            <h3>Usuario</h3>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            <h3>CI</h3>
            <input type="text" name="ci" placeholder="Numero de Cédula de Indentidad" required>
            <h3>Extesión</h3>
            <input type="text" name="coddpto" placeholder="Extencion de CI" required>
            <h3>Número de Matrícula</h3>
            <input type="text" name="matricula" placeholder="Número de Matricula" required>
            <h3>Contraseña</h3>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <br><br>
            <button type="submit" name="register">REGISTRAR</button>
        </form>
    </div>
</div>
<?php include "pie2.inc.php"; ?>