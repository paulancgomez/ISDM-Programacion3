<!DOCTYPE html PUBLIC "-// W3C//DTD XHTML 1.0 Transitional//EN"
    "DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Unidad 3: AÑADIR y LISTAR registros a una base de datos</title>        
        <style type="text/css">
        div#message{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            width:40%;
            border: solid 2px green
        }
        table {
            border-collapse: collapse;
            width: 320px;
            }
        tr.heading {
        font-weight: bolder;
            }
        td {
        border: 1px solid black;
        padding: 0 0.5em;
        }
        </style> 
    </head>
    <body>
        <h2>Unidad 3: AÑADIR y LISTAR registros a una base de datos</h2>
        <h3>Añade un Nuevo Usuario</h3>
        <?php
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
                $ingresoErroneo = false;
                if (empty($_POST['usu_apenom'])) {
                    echo 'ERROR: Por favor ingrese un apellido y nombres válidos';
                    $ingresoErroneo = true;
                } else {
                    $apenom = $conexionDB->escape_string($_POST['usu_apenom']);
                }
                if ($ingresoErroneo != true && empty($_POST['usu_email'])) {
                    echo 'ERROR: Por favor ingrese un email válido';
                    $ingresoErroneo = true;
                } else {
                    $email = $conexionDB->escape_string($_POST['usu_email']);
                }
                if ($ingresoErroneo != true && empty($_POST['usu_usuario'])) {
                    echo 'ERROR: Por favor ingrese un Usuario válido';
                    $ingresoErroneo = true;
                } else {
                    $usuario = $conexionDB->escape_string($_POST['usu_usuario']);
                }
                if ($ingresoErroneo != true && empty($_POST['usu_clave'])) {
                    echo 'ERROR: Por favor ingrese una clave válida';
                    $ingresoErroneo = true;
                } else {
                    $clave = $conexionDB->escape_string($_POST['usu_clave']);
                }

                // añade valores a la base de datos utilizando el consulta INSERT
                if ($ingresoErroneo != true) {
                    $instruccionSql = "INSERT INTO Usuarios (apenom, email, usuario, clave)
                            VALUES ('$apenom', '$email', '$usuario', '$clave')";
                    if ($conexionDB->query($instruccionSql) === true) {
                        echo 'Nuevo registro de usuario añadido con ID: ' . $conexionDB
                        ->insert_id;
                    } else {
                        echo "ERROR: No fue posible ejecutar el consulta: $instruccionSql. " .
                        $conexionDB->error;
                    }
            }
            // cierra bloque de mensaje
            echo '</div>';  
         
            // cierra conexión
            // $conexionDB->close();
        }
        ?>
        </div>
        <form action="usuarios_alta_listado2.php" method="POST">
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
            <input type="password" name="usu_clave" size="40" />
            <p />

            <input type="submit" name="submit" value="Enviar" />
        </form>

        <h3>Lista de Usuarios</h3>
        <?php
            // obtiene registros
            // da formato como una tabla HTML
            $instruccionSql = "SELECT idusuario, apenom, email, usuario, clave FROM Usuarios";
            if($resultado = $conexionDB->query($instruccionSql)) {
                if ($resultado->num_rows > 0) {
                    echo "<table>\n";
                    echo " <tr class=\"heading\">\n";
                    echo " <td>idusuario</td>\n";
                    echo " <td>apenom</td>\n";
                    echo " <td>email</td>\n";
                    echo " <td>usuario</td>\n";
                    echo " <td>clave</td>\n";
                    echo " </tr>\n";
                    while ($fila = $resultado->fetch_object()) {
                        echo " <tr>\n";
                        echo " <td>" . $fila->idusuario . "</td>\n";
                        echo " <td>" . $fila->apenom . "</td>\n";
                        echo " <td>" . $fila->email . "</td>\n";
                        echo " <td>" . $fila->usuario . "</td>\n";
                        echo " <td>" . $fila->clave . "</td>\n";
                        echo " </tr>\n";
                    }
                    echo "</table>";
                    $resultado->close();
                } else {
                    echo "No hay Usuarios registrados en la base de datos!";
                }
            } else {
                echo "ERROR: No fue posible ejecutar el consulta: $instruccionSql. " .
                $mysqli->error;
            }
            // cierra conexión
            $conexionDB->close();
        ?> 
    </body>
</html>