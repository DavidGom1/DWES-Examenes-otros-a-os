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
        <h1>Examen 12/12/2024 - Ejercicio 2</h1>        
        <h1>Tablero de ajedrez</h1>

        <table border="1">
            <?php
            session_start();
            if (isset($_SESSION["tablero"]) && !isset($_POST["reiniciar"])) {
                $tablero = $_SESSION["tablero"];
            } else {
                $tablero = array();     // El tablero es un array bidimensional de 8x8
                for ($i = 0; $i < 8; $i++) {
                    $fila = array();
                    for ($j = 0; $j < 8; $j++) {
                        $fila[] = "-";
                    }
                    $tablero[] = $fila;
                }
            }

            //var_dump($tablero);
            if (isset($_POST["escaque"])) { // Al clicar, vamos cambiando el valor de este según la serie descrita en el enunciado
                $f=$_POST["fila"];
                $c=$_POST["columna"];
                switch ($tablero[$f][$c]) {
                    case "-":
                        $tablero[$f][$c]="P";
                        break;
                    case "P":
                        $tablero[$f][$c]="C";
                        break;
                    case "C":
                        $tablero[$f][$c]="A";
                        break;
                    case "A":
                        $tablero[$f][$c]="T";
                        break;
                    case "T":
                        $tablero[$f][$c]="D";
                        break;
                    case "D":
                        $tablero[$f][$c]="R";
                        break;
                    case "R":
                        $tablero[$f][$c]="-";
                        break;
                    
                }
            }

            $_SESSION["tablero"]=$tablero;
            
            for ($i = 0; $i < 8; $i++) {        // Por último mostramos el tablero
                echo '<tr height="30">';
                for ($j = 0; $j < 8; $j++) {    // Cada escaque será un formulario que almacena la fila y columna
                    echo '<td  width="30" style="text-align:center;"><form action="" method="post">';
                    echo '<input type="hidden" name="fila" value="' . $i . '">';
                    echo '<input type="hidden" name="columna" value="' . $j . '">';
                    echo '<input type="submit" name="escaque" value="' . $tablero[$i][$j] . '">';
                    echo "</form></td>";
                }
                echo "</tr>";
            }
            ?>
        </table><br>

        <form action="" method="post">
            <input type="submit" value="Reiniciar" name="reiniciar"><!-- comment -->        
        </form>
    </body>
</html>
