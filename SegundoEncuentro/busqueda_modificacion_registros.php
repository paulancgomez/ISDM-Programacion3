<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 3: BUSQUEDA, MODIFICACION y ELIMINACION DE REGISTROS</title>
</head>
    <body>
        <h2>Unidad 3: BUSQUEDA, MODIFICACION y ELIMINACION DE REGISTROS</h2>
        <h3>Tabla Usuarios</h3>
        <form action='usuarios.php' method="GET">
            <table>
                <tr>
                    <td>
                        Datos del Usuario
                    </td>
                    <td>                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                </tr>
                <tr>
                    <td>
                        IdUsuario:
                    </td>
                    <td>         
                        <input type="text" name="nIdUsuario" id="idIdUsuario" value="">
                    </td>
                </tr>    
                <tr>
                    <td>
                        Apellido y Nombre:
                    </td>
                    <td>         
                        <input type="text" name="nApenom" id="idApenom" value="">                                                 
                    </td>
                </tr>    
                <tr>
                    <td>
                        E-mail:
                    </td>
                    <td>         
                        <input type="text" name="nEmail" id="idEmail" value="">
                    </td>
                </tr>    
            <tr>
                <td colspan="2">
                </td>
            </tr>    
            <tr>
                <td>

                </td>
                <td>
                    <input type="submit" name="nBuscar" id="idBuscar" value="Buscar" style="width:100%">
                    <input type="submit" name="nModificar" id="idModificar" value="Modificar" style="width:100%">
                    <input type="submit" name="nEliminar" id="idEliminar" value="Eliminar" style="width:100%">
                </td>
            </tr>

            </table>
        </form>
    <body>
</html>