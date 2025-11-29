<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function conectar () {
    $link = mysqli_connect("localhost", "super", "alumno", "tienda_examen");
    return $link;
}