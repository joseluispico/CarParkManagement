<?php
//TOMO VARIABLES DE SESION SOBRE LA AUTENTIFICACION
session_start();
//session_register("autentificado");
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("location: index.php");
    exit;
} 
?>