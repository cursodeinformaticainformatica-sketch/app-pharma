<?php
    //Realizamos la conexion con la base de datos utilizando la extension mysqli
    //Declaramos las variables que se necesitan para declarar la informacion de nuestra base de datos
    $host = 'localhost';
    $user = 'root';
    $pass = 'admin';
    $db = 'farmaceuticadb';

    //Guardamos en una variable el objeto de la conexion
    $conn = new mysqli($host, $user, $pass, $db);

    //Verificamos si
    if($conn->connect_error)
        die('Conexion fallida: '. $conn->connect_error);
?>