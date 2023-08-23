<?php
$mysqli = new mysqli('localhost', 'root', '', 'agrov');

if($mysqli->connect_errno){
    echo 'fallo conexion' , $mysqli->connect_error;
    exit();
}

?>