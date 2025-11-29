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
        <form action="" method="post">
            <input style="background-color: #77AAFF"  type="submit" name="azul" value="azul">
            <input style="background-color: #FF7777" type="submit" name="rojo" value="rojo"><!-- comment -->
            <input style="background-color: #77FF77" type="submit" name="verde" value="verde"><!-- comment -->
            <input style="background-color: #FFFF77" type="submit" name="amarillo" value="amarillo"><br><br>
            <input type="submit" name="Jugar" value="Jugar"><br><br>
            <input type="submit" name="Reiniciar" value="Reiniciar"><!-- comment -->
        </form>
        <?php
        session_start();
        if (!isset($_SESSION["lista"]) || isset($_POST["Reiniciar"])) {     // La lista debe guardarse en $_SESSION
            $lista = array();
        } else {
            $lista = $_SESSION["lista"];        // Si existe en $_SESSION, la recuperamos
        }

        $colores = array("azul", "rojo", "verde", "amarillo");

        for ($i = 0; $i < count($colores); $i++) {    // Prefiero poner los colores en un array y recorrer el array con un bucle
            $color = $colores[$i];                // a probar uno a uno si se ha pulsado ese color

            if (isset($_POST[$color])) {     // Si hemos pulsado el color, debe ser guardado en la lista
                $lista[] = $color;
            }
        }

        if (isset($_POST["Jugar"])) {
            echo "<br>";
            for ($i = 0; $i < count($lista); $i++) { 
                echo $lista[$i]."<br>";
            }
        }

        $_SESSION["lista"] = $lista;
        ?>
    </body>
</html>
