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


        <?php
        require_once 'conexion.php';

        echo "<h2>ID de la partida: " . $_POST["par_id"] . "<br>";
        echo "Fecha de la partida: " . $_POST["par_fecha"] . "<br>";
        echo "Hora de la partida: " . $_POST["par_hora"] . "<br>";
        echo "Nombre del juego: " . $_POST["jue_nombre"] . "<br>";
        echo "Nombre de la plataforma: " . $_POST["pla_nombre"] . "</h2><br>";

        $link = conexion();

        $consulta = "SELECT * FROM jugadores"; // Consulta para mostrar los jugadores en la lista desplegable
        $resultado = mysqli_query($link, $consulta);
        $fila = mysqli_fetch_row($resultado);

        echo '<form method="post" action="partida.php">';

        echo 'Jugador<select name="jugador">';
        while ($fila = mysqli_fetch_row($resultado)) {      // En $fila[0] tenemos el id del jugador, y en $fila[2] el alias
            echo '<option value="' . $fila[0] . '">' . $fila[2] . "</option>";
        }
        echo '</select><br>';
        echo 'Puntuación<select name="puntuacion">';
        for ($i=0;$i<=2000;$i+=50) {        // Para la puntuación nos valemos de un bucle desde 0 a 2000 y aumentando en 50 el contador
            echo '<option value="' . $i . '">' . $i . "</option>";
        }
        echo '</select>';        
        ?>

        <!-- Volvemos a propagar los datos de partida, juego y plataforma hacia la página anterior -->
        <input type="hidden" name="par_id" value="<?php echo $_POST["par_id"] ?>">
        <input type="hidden" name="par_fecha" value="<?php echo $_POST["par_fecha"] ?>">
        <input type="hidden" name="par_hora" value="<?php echo $_POST["par_hora"] ?>">
        <input type="hidden" name="jue_nombre" value="<?php echo $_POST["jue_nombre"] ?>">
        <input type="hidden" name="pla_nombre" value="<?php echo $_POST["pla_nombre"] ?>"><br>
        <input type="submit" name="insertar" value="Aceptar">
        <input type="submit" name="cancelar" value="Cancelar">
    </form><!-- comment -->
</body>
</html>
