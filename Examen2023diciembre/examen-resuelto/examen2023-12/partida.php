
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
        <table border="1">
            <?php
            require_once 'conexion.php';

            echo "<h2>ID de la partida: " . $_POST["par_id"] . "<br>";      // Mostramos la cabecera con los datos que pedía el enunciado
            echo "Fecha de la partida: " . $_POST["par_fecha"] . "<br>";
            echo "Hora de la partida: " . $_POST["par_hora"] . "<br>";
            echo "Nombre del juego: " . $_POST["jue_nombre"] . "<br>";
            echo "Nombre de la plataforma: " . $_POST["pla_nombre"] . "</h2><br>";

            $par_id = $_POST["par_id"];

            $link = conexion();

            if (isset($_POST["insertar"])) {   // Si tenemos un petición de inserción, la realizamos antes de mostrar los datos             
                $consulta = "INSERT INTO puntuaciones VALUES (NULL," . $_POST['par_id'] . "," . $_POST['jugador'] . "," . $_POST['puntuacion'] . ")";
                mysqli_query($link, $consulta);
            }


            $consulta = "SELECT puntuaciones.pun_puntuacion, jugadores.jug_alias
                            FROM puntuaciones
                            JOIN jugadores ON jugadores.jug_id=puntuaciones.pun_jugador
                            WHERE puntuaciones.pun_partida=" . $_POST["par_id"];
            $resultado = mysqli_query($link, $consulta);

            while ($columna = mysqli_fetch_field($resultado)) {
                echo "<th>" . $columna->name . "</th>";
            }

            while ($fila = mysqli_fetch_row($resultado)) { // mysqli_fetch_row recorre fila a fila el recordset (o mysqli_result)
                echo "<tr>";    // En $fila tenemos un registro de la tabla, compuesto por diversos campos que podemos recorrer con un bucle
                for ($i = 0; $i < count($fila); $i++) {
                    echo "<td>" . $fila[$i] . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <br><!-- Es importante propagar los datos de partida, juego y plataforma para recuperarlos al volver a esta página -->
        <form action="insertar.php" method="post">
            <input type="hidden" name="par_id" value="<?php echo $_POST["par_id"] ?>">
            <input type="hidden" name="par_fecha" value="<?php echo $_POST["par_fecha"] ?>">
            <input type="hidden" name="par_hora" value="<?php echo $_POST["par_hora"] ?>">
            <input type="hidden" name="jue_nombre" value="<?php echo $_POST["jue_nombre"] ?>">
            <input type="hidden" name="pla_nombre" value="<?php echo $_POST["pla_nombre"] ?>">
            <input type="submit" value="Insertar">
        </form><br>
        <form action="index.php" method="post">
            <input type="submit" value="Volver"><!-- No lo pedía el enunciado, pero es bastante útil -->
        </form>

    </body>
</html>
