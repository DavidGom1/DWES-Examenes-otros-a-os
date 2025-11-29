<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Examen 12/12/2024 - Ejercicio 1</h1>
        <h3>Base de datos de la tienda</h3>
        <?php
        require_once 'conexion.php';
        
        session_start();
        
        if (isset($_POST['cliente'])) {
            $_SESSION['cliente'] = $_POST['cliente']; // Pasamos el cliente a la sesión, para no perder ese valor
            //echo $_POST['cliente'];
            //echo $_SESSION['cliente'];
        }
        
        $link = conectar();

// Apartado 1, mostrar la lista de clientes

        if (isset($_SESSION["cliente"])) {
            $seleccionado=$_SESSION["cliente"];
        }
        
        $consulta = "SELECT * FROM clientes";
        $resultado = mysqli_query($link, $consulta);
        echo '<form action="" method="post">';
        echo '<select name="cliente">';   // Lista desplegable
        
        while ($fila = mysqli_fetch_row($resultado)) {
            if ($fila[0]==$seleccionado) {  // Si el cliente se corresponde con el que hemos seleccionado
                $sel=" selected";   
            } else {
                $sel="";
            }
            echo '<option value="' . $fila[0] . '"'.$sel.'>' . $fila[1] . '</option>';
        }
        echo "</select>";

        echo '<input type="submit" value="Seleccionar cliente"><br>';
        echo '</form>';
        mysqli_free_result($resultado);

// Apartado 2, mostrar la lista de artículos



        if (isset($_SESSION['cliente'])) {
            $cliente = $_SESSION['cliente'];

            if (isset($_POST["favorito"])) {    // Apartado 4, poner/quitar de favoritos
                $fav = $_POST["favorito"];

                //echo $_POST["poner"];
                if ($_POST["poner"] == 0) {     // Si no está en favoritos, hay que ponerlo
                    $consulta = "INSERT INTO favoritos VALUES (NULL,$cliente,$fav)";
                    //echo $consulta;
                    $resultado = mysqli_query($link, $consulta);
                } else {        // y si está, hay que eliminarlo de favoritos
                    $consulta = "DELETE FROM favoritos WHERE fav_cliente=$cliente AND fav_articulo=$fav";
                    $resultado = mysqli_query($link, $consulta);
                }
            }


            $consulta = "SELECT * FROM clientes WHERE cli_id=$cliente";
            $resultado = mysqli_query($link, $consulta);
            $fila = mysqli_fetch_row($resultado);
            echo "<h3>Cliente: " . $fila[0] . " - " . $fila[1] . "</h3>";

            $consulta = "SELECT art_id,art_nombre,art_precio_venta,"
                    . "(SELECT COUNT(fav_id) FROM favoritos WHERE fav_articulo=A1.art_id AND fav_cliente=$cliente) "
                    . "FROM articulos A1";
            $resultado = mysqli_query($link, $consulta);

            echo '<table border="1">';
            echo "<tr><th>ID</th><th>Nombre</th><th>Precio venta</th></tr>";
            while ($fila = mysqli_fetch_row($resultado)) {
                if ($fila[3] > 0) {     // Apartado 3, los favoritos aparecen marcados en otro color
                    echo '<tr style="background-color:cyan">';
                } else {
                    echo "<tr>";
                }
                echo '<td>' . $fila[0] . '</td><td>' . $fila[1] . '</td><td>' . $fila[2] . '</td>';

                echo '<td><form action="" method="post">';      // Botón de poner/quitar de favoritos, apartado 4
                echo '<input type="hidden" name="favorito" value="' . $fila[0] . '">';
                echo '<input type="hidden" name="poner" value="' . $fila[3] . '">';
                echo '<input type="submit" value="Fav. Sí/No">';
                echo "</form></td>";

                echo "</tr>";
            }

            echo '</table>';
            mysqli_free_result($resultado);
        }

        mysqli_close($link);
        ?>
    </body>
</html>
