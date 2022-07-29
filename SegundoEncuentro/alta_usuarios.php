<!DOCTYPE html PUBLIC "-// W3C//DTD XHTML 1.0 Transitional//EN"
    "DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Unidad 3: Añadir registros a una base de datos</title>        
        <style type="text/css">
        div#message{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            width:40%;
            border: solid 2px green
        }
        </style> 
    </head>
    <body>
        <h2>Unidad 3: Añadir registros a una base de datos</h2>
        <h3>Añade un Nuevo Usuario</h3>
        <?php
            //REGISTRA UN USUARIO E INSERTA SUS DATOS EN LA BD

            // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
            require('conexiondb_agenda.php');

            // si el formulario ha sido enviado procesa los datos del formulario                        
            if (isset($_POST['submit'])) {

                if ($conexionDB === false) {
                    die("ERROR: No fue posible conectarse con la base de datos. " .
                    mysqli_connect_error());
                }
                // abre bloque de mensaje
                echo '<div id="message">';
                // recupera y verifica los valores de entrada
                $inputError = false;
                if (empty($_POST['usu_apenom'])) {
                    echo 'ERROR: Por favor ingrese un apellido y nombres válidos';
                    $inputError = true;
                } else {
                    $apenom = $conexionDB->escape_string($_POST['usu_apenom']);
                }
                if ($inputError != true && empty($_POST['usu_email'])) {
                    echo 'ERROR: Por favor ingrese un email válido';
                    $inputError = true;
                } else {
                    $email = $conexionDB->escape_string($_POST['usu_email']);
                }
                if ($inputError != true && empty($_POST['usu_usuario'])) {
                    echo 'ERROR: Por favor ingrese un Usuario válido';
                    $inputError = true;
                } else {
                    $usuario = $conexionDB->escape_string($_POST['usu_usuario']);
                }
                if ($inputError != true && empty($_POST['usu_clave'])) {
                    echo 'ERROR: Por favor ingrese una clave válida';
                    $inputError = true;
                } else {
                    $clave = $conexionDB->escape_string($_POST['usu_clave']);
                }

                // añade valores a la base de datos utilizando la consulta INSERT
                if ($inputError != true) {
                    $sql = "INSERT INTO Usuarios (apenom, email, usuario, clave)
                            VALUES ('$apenom', '$email', '$usuario', '$clave')";
                    if ($conexionDB->query($sql) === true) {
                        echo 'Nuevo registro de usuario añadido con ID: ' . $conexionDB->insert_id;
                    } else {
                        echo "ERROR: No fue posible ejecutar la consulta: $sql. " . $conexionDB->error;
                    }
                }
                // cierra bloque de mensaje
                echo '</div>';  
                // cierra conexión
                $conexionDB->close();
            }
        ?>
        </div>
        <form action="alta_usuarios.php" method="POST">
            Apellido y Nombre: <br />
            <input type="text" name="usu_apenom" size="40" />
            <p />
            E-Mail: <br />
            <input type="text" name="usu_email" size="40" />
            <p />
            Usuario: <br />
            <input type="text" name="usu_usuario" size="40" />
            <p />
            Clave: <br />
            <input type="text" name="usu_clave" size="40" />
            <p />

            <input type="submit" name="submit" value="Enviar" />
        </form>
    </body>
</html>