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

            $link = conexion();

            // Al ser una consulta algo compleja es recomendable construirla y probarla en PHPMyAdmin previamente
            $consulta = "SELECT partidas.par_id,partidas.par_fecha,partidas.par_hora,juegos.jue_nombre,plataformas.pla_nombre,COUNT(puntuaciones.pun_jugador) AS jugadores
                            FROM partidas
                            JOIN puntuaciones ON puntuaciones.pun_partida=partidas.par_id
                            JOIN juegos ON juegos.jue_id=partidas.par_juego
                            JOIN plataformas ON plataformas.pla_id=partidas.par_plataforma
                            GROUP BY partidas.par_id";
            $resultado = mysqli_query($link, $consulta);

            while ($columna = mysqli_fetch_field($resultado)) { // Esto rara vez se usará pues el programador suele conocer la 
                echo "<th>" . $columna->name . "</th>";
            }

            while ($fila = mysqli_fetch_row($resultado)) { // mysqli_fetch_row recorre fila a fila el recordset (o mysqli_result)
                echo "<tr>";    // En $fila tenemos un registro de la tabla, compuesto por diversos campos que podemos recorrer con un bucle
                for ($i = 0; $i < count($fila); $i++) {
                    echo "<td>" . $fila[$i] . "</td>";
                }
                echo '<td><form method="post" action="partida.php">';
                echo '<input type="hidden" name="par_id" value="' . $fila[0] . '">';
                echo '<input type="hidden" name="par_fecha" value="' . $fila[1] . '">';
                echo '<input type="hidden" name="par_hora" value="' . $fila[2] . '">';
                echo '<input type="hidden" name="jue_nombre" value="' . $fila[3] . '">';
                echo '<input type="hidden" name="pla_nombre" value="' . $fila[4] . '">';                
                echo '<input type="submit" value="Ver">';
                echo '</form></td>';
                echo "</tr>";                
            }
            ?>
        </table>

    </body>
</html>
