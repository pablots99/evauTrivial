<?php

include ('misFunciones.php');

function limpiaPalabra($palabra) {
    //filtro muy básico para evitar la inyeccion SQL
    $palabra = trim($palabra, "'");
    $palabra = trim($palabra, " ");
    $palabra = trim($palabra, "-");
    $palabra = trim($palabra, "`");
    $palabra = trim($palabra, '"');
    return $palabra;
}

$mysqli = conectaBBDD();
$cajaNombre = limpiaPalabra($_POST['cajaNombreCr']);

$cajaPassword = limpiaPalabra($_POST['cajaPasswordCr']);

$passwordEncriptada = password_hash($cajaPassword, PASSWORD_BCRYPT);
$resultadoQuery2 = $mysqli->query("SELECT * FROM usuario WHERE nombreUsuario='$cajaNombre' ");
$numUsuarios2 = $resultadoQuery2->num_rows;

if (!($numUsuarios2 > 0)) {

    $resultadoQuery = $mysqli->query("INSERT INTO usuario (`id_usuario`, `nombreUsuario`, `password`)  VALUES (NULL, '$cajaNombre', '$passwordEncriptada') ");
    $numUsuarios = $mysqli->affected_rows;
    if ($numUsuarios > 0) {
        echo ('<div class="alert alert-success" role="alert"> Seha añadido correctamente el usuario <b>' . $cajaNombre . '</b> </div>');
    } else {
        echo ('<div class="alert alert-danger" role="alert"> No se ha podido añadir el usuraio<b> ' . $cajaNombre . '</b> </div>');
    }
} else {
    echo ('<div class="alert alert-danger" role="alert"> El usuario <b>' . $cajaNombre . '</b> ya existe  </div>');
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

