<?php

session_start();
include ('misFunciones.php');

function limpiaPalabra($palabra) {
    $palabra = trim($palabra, "'");
    $palabra = trim($palabra, " ");
    $palabra = trim($palabra, "_");
    $palabra = trim($palabra, '"');
    return $palabra;
}

$mysqli = conectaBBDD();

$cajaNombre = $_POST['cajaNombre'];

$cajaPassword = $_POST['cajaPassword'];

$elHash = '$2y$10$GyX2YE234sMxc5qT8ZwIIOHdEaBm7xzM.EIL.O44VP202Hbb4wDCa';
//filtro basico para evitar inyeccion SQL
//echo 'Has escrito el usuario: '.$cajaNombre.' y la contraseña: '.$cajaPassword; 
echo $cajaNombre, $cajaPassword;
$password_encriptada = password_hash($cajaPassword, PASSWORD_BCRYPT);

if (password_verify($cajaPassword, $elHash)) {
    echo 'contraseña correcta';
} else {
    echo 'contraseña Incorrecta';
}
$resultadoQuery = $mysqli->query("SELECT * FROM usuario WHERE nombreUsuario='$cajaNombre' AND password='$cajaPassword'");

$numnUsuariosd = $resultadoQuery->num_rows;

//for ( $i = 0; $i < $numPreguntas; $i++){/////////////
//    $r = $resultadoQuery -> fetch_array();
//    ech o $r['nombreUsuario'] .'<br/>';
//}

//if ($numnUsuariosd > 0) {
//    //muesta applicacion
//    $r = $resultadoQuery -> fetch_array();
//    $_SESSION['nombreUsuario']= $cajaNombre;
//    $_SESSION['id_usuario']= $r['id_usuario'];
//    
//    require 'aplicacion.php';
//} else {
//    //muesta error
//    require 'error.php';
//}