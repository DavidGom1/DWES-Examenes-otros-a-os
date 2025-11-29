<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function conexion() {
    $link = mysqli_connect("localhost", "super", "alumno", "videojuegos");
    if ($link) {
        return $link;
    } else {
        echo "Error conectando a la base de datos";
        exit;
    }
}
